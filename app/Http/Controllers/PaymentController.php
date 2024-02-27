<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Milon\Barcode\DNS2D;
use App\Models\Reservation;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserReservationAuthorizedDirect;
use App\Mail\UserReservationAuthorizedPaypal;
use App\Mail\CompanyReservationAuthorized;
use Illuminate\Support\Facades\Storage;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{
    public function success(Request $request)
    {   
        if (!Arr::has(session('routeAndReservationData'), [
            'route_id',
            'departure',
            'destination',
            'distance',
            'duration',
            'total_price',
            'departure-date',
            'passengers',
            'roundTrip',
            'vehicle',
            'first_name',
            'last_name',
            'email',
            'phone',
            'pick_up_address',
            'destination_address',
            'passengers',
            'pickup-time',
            'payment_option',
        ])){
            return redirect()->route('home');
        }

        $routeAndReservationData = session('routeAndReservationData');
        $departure_date = Carbon::createFromFormat('F-d-Y', $routeAndReservationData['departure-date'])->format('Y-m-d');

        // Check if email in session already matches a customer in the database
        $customer = Customer::where('email', $routeAndReservationData['email'])->first();

        // If customer doesn't exist, create a new customer
        if (!$customer) {
            $customerData = [
                'first_name' => ucfirst(strtolower($routeAndReservationData['first_name'])), 
                'last_name' => ucfirst(strtolower($routeAndReservationData['last_name'])),
                'phone' => ucfirst(strtolower($routeAndReservationData['phone'])),
                'email' => $routeAndReservationData['email'],
            ];
            $customer = Customer::create($customerData);
        } else {
            // Customer exists, check and update full name if necessary
            $fullNameInSession = $routeAndReservationData['first_name'] . ' ' . $routeAndReservationData['last_name'];
            $fullNameInDatabase = $customer->first_name . ' ' . $customer->last_name;

            if (strtolower($fullNameInSession) !== strtolower($fullNameInDatabase)) {
                // Update full name in the database
                $customer->update([
                    'first_name' => ucfirst(strtolower($routeAndReservationData['first_name'])), 
                    'last_name' => ucfirst(strtolower($routeAndReservationData['last_name'])),
                ]);
            }
        }    

        // Store data to reservations
        $reservation = Reservation::create([
            'customer_id' => $customer->id,
            'route_id' =>   $routeAndReservationData['route_id'],
            'departure' => $routeAndReservationData['departure'],
            'destination' => $routeAndReservationData['destination'],
            'distance' => $routeAndReservationData['distance'],
            'duration' => $routeAndReservationData['duration'],
            'total_price' => $routeAndReservationData['total_price'],
            'round_trip' => $routeAndReservationData['roundTrip'],
            'vehicle' => $routeAndReservationData['vehicle'],
            'passengers' => $routeAndReservationData['passengers'],
            'pick_up_address' => $routeAndReservationData['pick_up_address'],
            'destination_address' => $routeAndReservationData['destination_address'],
            'departure_date' => $departure_date,
            'pickup_time' => $routeAndReservationData['pickup-time'],
            'payment_option' => $routeAndReservationData['payment_option'],
            // 'stripe_transaction_id' => null, // You may need to modify this based on your Stripe implementation
            // 'paypal_transaction_id' => null, // You may need to modify this based on your PayPal implementation
        ]);

        if($routeAndReservationData['payment_option'] === 'direct-bank-transfer'){
            // Generate and attach invoice
            $invoice = $this->generateInvoice($routeAndReservationData);
            $invoice_number = $invoice[0];
            $pdfFilePath = $invoice[1];

            // Send confirmation email to the user and company
            // Send the email with the attached invoice
            Mail::to($routeAndReservationData['email'])->send(new UserReservationAuthorizedDirect($routeAndReservationData, $invoice_number, $pdfFilePath));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new CompanyReservationAuthorized($routeAndReservationData, $invoice_number));
            session()->flush();
            return view('payment.success');

        } elseif($routeAndReservationData['payment_option'] === 'paypal'){
            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            // Retrieve the order ID from the session
            $orderId = session('paypal_order_id');
            $response = $provider->showOrderDetails($request->token);
            // Capture the payment
            $captureResponse = $provider->authorizePaymentOrder($orderId);

            if(isset($response['status']) && $response['status'] == 'APPROVED'){
                // Update the reservation with the Stripe transaction ID
                $reservation->update(['paypal_order_id' => $orderId]);
                // Send confirmation email to the user
                $invoice_number = $orderId;
                Mail::to($routeAndReservationData['email'])->send(new UserReservationAuthorizedPaypal($routeAndReservationData, $invoice_number));
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new CompanyReservationAuthorized($routeAndReservationData, $invoice_number));
                session()->flush();
                return view('payment.success');
            } else {
                return view('payment.cancel');
            }
        } else {
            return view('payment.cancel');
        }
    }


    // CANCEL
    public function cancel()
    {
        if (!Arr::has(session('routeAndReservationData'), [
            'route_id',
            'departure',
            'destination',
            'distance',
            'duration',
            'total_price',
            'departure-date',
            'passengers',
            'roundTrip',
            'vehicle',
            'first_name',
            'last_name',
            'email',
            'phone',
            'pick_up_address',
            'destination_address',
            'pickup-time',
            'payment_option',
        ])){
            return redirect()->route('home');
        }
        return view('payment.cancel');
    }

    protected function generateInvoice($routeAndReservationData)
    {
        $customerName = ucfirst($routeAndReservationData['first_name']) . ' ' . ucfirst($routeAndReservationData['last_name']);

        // Get the last reservation record
        $reservation = Reservation::latest()->first();

        // Get the number of records already containing invoice_id
        $existingInvoiceCount = Reservation::whereNotNull('invoice_id')->count();
        $existingInvoiceCount += 1;
        $currentYear = date("Y");
        $price = $routeAndReservationData['total_price'] * 100;
        $invoice_id = $existingInvoiceCount .'-1-' . $currentYear;
        $description = 'Ponuda ' . $invoice_id;

        $reservation->update([
            'invoice_id' =>  $invoice_id,
        ]);
        
        $data = [
            'HRVHUB30',
            'EUR',
            $price,
            '',
            '',
            '',
            'LUKA PREDOVAN, GLOBUS, VL. LUKA PREDOVAN',
            'ULICA DR. FRANJE TUĐMANA 85',
            '23235 VRSI',
            'HR2924840081135365524',
            'HR00',
            $invoice_id,
            '',
            $description,
        ];

        // Combine the data into a single string
        $barCodeData = implode("\n", $data);

        // Generate the QR code
        $barcode = new DNS2D();

        // Get the barcode image data
        $barcodeImageData = $barcode->getBarcodePNG($barCodeData, 'PDF417');

        $fileName = $invoice_id . '.png';
        
        // Store the barcode image in the storage/app directory
        $filePath = storage_path('app/private/' . $fileName);
        File::put($filePath, base64_decode($barcodeImageData));

        // Return the base64-encoded image data
        $base64ImageData = base64_encode(file_get_contents($filePath));

        // Calculate base_price with a 25% discount
        $base_price = $routeAndReservationData['total_price'] * 0.75;

        // Format the price with two decimal places and a comma as the decimal separator
        $formatted_total_price = number_format($routeAndReservationData['total_price'], 2, ',', '.');
        $formatted_base_price = number_format($base_price, 2, ',', '.');
        $vat = number_format($routeAndReservationData['total_price'] - $base_price, 2, ',', '.');

        $pdf = app('dompdf.wrapper')->loadView('invoices.custom', [
            'base64ImageData' => $base64ImageData,
            'customerName' => $customerName,
            'routeAndReservationData' => $routeAndReservationData,
            'invoice_id' => $invoice_id,
            'invoice_date' => now()->format('d.m.Y. / H:i:s'),
            'invoice_expiration_date' => now()->addDays(7)->format('d.m.Y.'),
            'formatted_total_price' => $formatted_total_price,
            'formatted_base_price' => $formatted_base_price,
            'vat' => $vat
        ]);

        // Save the PDF to storage
        $pdfFilePath  = 'invoices/' . $customerName . '_' . now()->format('Ymd_His') . '.pdf';
        Storage::put($pdfFilePath, $pdf->output());

        return [$invoice_id, $pdfFilePath];
    }
}
