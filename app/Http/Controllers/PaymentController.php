<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\InvoiceService;
use App\Mail\UserReservationAuthorizedDirect;
use App\Mail\UserReservationAuthorizedPaypal;
use App\Mail\CompanyReservationAuthorized;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    // Injektiramo InvoiceService kroz konstruktor (Dependency Injection)
    public function __construct(
        protected InvoiceService $invoiceService
    ) {}

    public function success(Request $request)
    {   
        if (!Arr::has(session('routeAndReservationData'), [
            'route_id', 'departure', 'destination', 'distance', 'duration',
            'total_price', 'departure-date', 'passengers', 'roundTrip',
            'vehicle', 'first_name', 'last_name', 'email', 'phone',
            'pick_up_address', 'destination_address', 'pickup-time', 'payment_option',
        ])) {
            return redirect()->route('home', ['locale' => app()->getLocale()]);
        }

        $routeAndReservationData = session('routeAndReservationData');
        $departure_date = Carbon::createFromFormat('F-d-Y', $routeAndReservationData['departure-date'])->format('Y-m-d');

        // Pronađi ili kreiraj kupca
        $customer = Customer::firstOrCreate(
            ['email' => $routeAndReservationData['email']],
            [
                'first_name' => ucfirst(strtolower($routeAndReservationData['first_name'])), 
                'last_name' => ucfirst(strtolower($routeAndReservationData['last_name'])),
                'phone' => ucfirst(strtolower($routeAndReservationData['phone'])),
            ]
        );

        // Ažuriraj ime ako se promijenilo
        $fullNameInSession = $routeAndReservationData['first_name'] . ' ' . $routeAndReservationData['last_name'];
        $fullNameInDatabase = $customer->first_name . ' ' . $customer->last_name;
        if (strtolower($fullNameInSession) !== strtolower($fullNameInDatabase)) {
            $customer->update([
                'first_name' => ucfirst(strtolower($routeAndReservationData['first_name'])), 
                'last_name' => ucfirst(strtolower($routeAndReservationData['last_name'])),
            ]);
        }

        // Spremi podatke u rezervacije
        $reservation = Reservation::create([
            'customer_id' => $customer->id,
            'route_id' => $routeAndReservationData['route_id'],
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
            // 'stripe_transaction_id' => null, 
            // 'paypal_transaction_id' => null, 
        ]);

        $companyEmail = config('mail.from.address'); // Sigurnije od env()

        // Grana za direktnu bankovnu doznaku
        if ($routeAndReservationData['payment_option'] === 'direct-bank-transfer') {
            
            // Pozivamo naš servis za generiranje računa i PDF-a
            [$invoice_number, $pdfFilePath] = $this->invoiceService->generate($routeAndReservationData);

            // Slanje mailova
            Mail::to($routeAndReservationData['email'])->send(new UserReservationAuthorizedDirect($routeAndReservationData, $invoice_number, $pdfFilePath));
            Mail::to($companyEmail)->send(new CompanyReservationAuthorized($routeAndReservationData, $invoice_number));

            $email = $routeAndReservationData['email'];
            session()->flush();
            return view('payment.success', ['email' => $email]);

        } elseif ($routeAndReservationData['payment_option'] === 'paypal') {
            // (Zadržan izvorni PayPal kod netaknut)
            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $orderId = session('paypal_order_id');
            $response = $provider->showOrderDetails($request->token);
            $captureResponse = $provider->authorizePaymentOrder($orderId);

            if (isset($response['status']) && $response['status'] == 'APPROVED') {
                $reservation->update(['paypal_order_id' => $orderId]);
                $invoice_number = $orderId;

                Mail::to($routeAndReservationData['email'])->send(new UserReservationAuthorizedPaypal($routeAndReservationData, $invoice_number));
                Mail::to($companyEmail)->send(new CompanyReservationAuthorized($routeAndReservationData, $invoice_number));

                $email = $routeAndReservationData['email'];
                session()->flush();
                return view('payment.success', ['email' => $email]);
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
            'route_id', 'departure', 'destination', 'distance', 'duration',
            'total_price', 'departure-date', 'passengers', 'roundTrip',
            'vehicle', 'first_name', 'last_name', 'email', 'phone',
            'pick_up_address', 'destination_address', 'pickup-time', 'payment_option',
        ])) {
            return redirect()->route('home', ['locale' => app()->getLocale()]);
        }
        return view('payment.cancel');
    }
}