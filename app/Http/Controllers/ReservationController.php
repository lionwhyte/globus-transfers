<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Http\Requests\StoreReservationRequest;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        // Checking the existence of the necessary data in the session
        if (!Arr::has(session('routeAndReservationData'), [
            'route_id', 'departure', 'destination', 'distance', 'duration',
            'roundTrip', 'standardPrice', 'minivanPrice', 'minibusPrice',
            'departureDate', 'passengers',
        ]) || !$request->input('vehicle')) {
            return view('errors.400');
        }

        $vehicle = $request->input('vehicle');
        $routeData = session('routeAndReservationData', []);

        // Price determination based on the selected vehicle
        if ($vehicle === 'standard') {
            $total_price = $routeData['standardPrice'];
        } elseif ($vehicle === 'minivan') {
            $total_price = $routeData['minivanPrice'];
        } elseif ($vehicle === 'minibus') {
            // Minibus preusmjerava direktno na kontakt
            return redirect()->route('contact.show', ['locale' => app()->getLocale()]);
        } else {
            return view('errors.500');
        }

        // Updating the session with the vehicle and total price
        $routeData['vehicle'] = $vehicle;
        $routeData['total_price'] = $total_price;
        session(['routeAndReservationData' => $routeData]);

        // Preparing data for the view
        return view('reservation.create', [
            'departureLocationName' => $routeData['departure'],
            'destinationLocationName' => $routeData['destination'],
            'departureDate' => $routeData['departureDate'],
            'passengers' => $routeData['passengers'],
            'roundTrip' => $routeData['roundTrip'],
            'vehicle' => $vehicle,
            'total_price' => $total_price,
        ]);
    }

    public function store(StoreReservationRequest $request)
    {   
        // Check if the order has already been confirmed
        if (session()->has('order_confirmed')) {
            return response()->json(['error' => 'Order has already been confirmed.'], 400);
        }

        // Checking the existence of data in the session
        if (!Arr::has(session('routeAndReservationData'), [
            'route_id', 'departure', 'destination', 'distance', 'duration',
            'roundTrip', 'standardPrice', 'minivanPrice', 'minibusPrice',
            'total_price', 'departureDate', 'passengers', 'vehicle'
        ])) {
            return view('errors.400');
        }

        // Mark the order as confirmed in the session
        session(['order_confirmed' => true]);

        // Merging validated data with existing data in the session
        $mergedData = array_merge(Session::get('routeAndReservationData', []), $request->all());
        Session::put('routeAndReservationData', $mergedData);

        // Redirect to successful payment if bank transfer is selected
        if ($request->input('payment_option') === 'direct-bank-transfer') {
            return redirect()->route('payment.success', ['locale' => app()->getLocale()]);
        }
    }
}