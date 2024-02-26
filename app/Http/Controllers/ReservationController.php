<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Arr;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        // Check if any data is missing
        if (!Arr::has(session('routeAndReservationData'), [
            'route_id',
            'departure',
            'destination',
            'distance',
            'duration',
            'roundTrip',
            'standardPrice',
            'minivanPrice',
            'minibusPrice',
            'departureDate',
            'passengers',
        ]) || !$request->input('vehicle')) {
            // Redirect back to the search page with an error message
            return response()->json(['error' => 'Some data is missing. Please perform a new search.'], 400);
        }
        // Retrieve data needed for the reservation form
        $departureLocationName = session('routeAndReservationData.departure');
        $destinationLocationName = session('routeAndReservationData.destination');
        $departureDate = session('routeAndReservationData.departureDate');
        $passengers = session('routeAndReservationData.passengers');
        $roundTrip = session('routeAndReservationData.roundTrip');
        $vehicle = $request->input('vehicle');
        // Retrieve the current 'routeAndReservationData' from the session
        $routeAndReservationData = session('routeAndReservationData', []);
        if($vehicle === 'standard'){
            $total_price = session('routeAndReservationData.standardPrice');
        } elseif($vehicle === 'minivan'){
            $total_price = session('routeAndReservationData.minivanPrice');
        } elseif($vehicle === 'minibus'){
            $total_price = session('routeAndReservationData.minibusPrice');
        } else {
            abort(500, 'Something went wrong!');
        }
        
        $routeAndReservationData['vehicle'] = $vehicle;
        $routeAndReservationData['total_price'] = $total_price;

        // Store the updated 'routeAndReservationData' back in the session
        session(['routeAndReservationData' => $routeAndReservationData]);
        
        // Pass data to the reservation view
        return view('reservation.create', compact('departureLocationName', 'destinationLocationName', 'departureDate', 'passengers', 'roundTrip', 'vehicle', 'total_price'));
    }

    public function store(Request $request)
    {   
        // Check if the order has already been confirmed
        if (session()->has('order_confirmed')) {
            return response()->json(['error' => 'Order has already been confirmed.'], 400);
        }

        // Check if any data is missing
        if (!Arr::has(session('routeAndReservationData'), [
            'route_id',
            'departure',
            'destination',
            'distance',
            'duration',
            'roundTrip',
            'standardPrice',
            'minivanPrice',
            'minibusPrice',
            'total_price',
            'departureDate',
            'passengers',
            'vehicle'
        ])) {
            // Redirect back to the search page with an error message
            return response()->json(['error' => 'Some data is missing. Please perform a new search and make a new reservation.'], 400);
        }

        if(session('routeAndReservationData.vehicle') == 'standard'){
            $passengers_rules = 'required|integer|between:1,3';
        } elseif(session('routeAndReservationData.vehicle') == 'minivan'){
            $passengers_rules = 'required|integer|between:1,8';
        } else {
            $passengers_rules = 'required|integer|between:1,19';
        }

        // Validate reservation details
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'email_confirmation' => 'required|email|same:email',
            'phone' => 'required|string|max:20',
            'pick_up_address' => 'required|string|max:255',
            'destination_address' => 'required|string|max:255',
            'passengers' => $passengers_rules,
            'departure-date' => 'required|date_format:"F-d-Y"|after_or_equal:tomorrow',
            'pickup-time' => 'required|date_format:H:i|',
            'payment_option' => 'required|in:direct-bank-transfer',
        ]);

        // Mark the order as confirmed in the session
        session(['order_confirmed' => true]);
        
        // If validation passes, merge the new data with existing data in the session
        $existingData = Session::get('routeAndReservationData', []);
        $newData = $request->all();
        $mergedData = array_merge($existingData, $newData);

        // Store the merged data back in the session
        Session::put('routeAndReservationData', $mergedData);

        $vehicle = session('routeAndReservationData.vehicle');
        $departureLocationName = session('routeAndReservationData.departure'); 
        $destinationLocationName = session('routeAndReservationData.destination'); 
        $email = session('routeAndReservationData.email'); 
        $name = ucfirst(strtolower(session('routeAndReservationData.first_name'))) . " " . ucfirst(strtolower(session('routeAndReservationData.last_name')));
        $price = session('routeAndReservationData.total_price');
       
        // Payment method condition
        if($request->input('payment_option') === 'direct-bank-transfer'){
            return redirect()->route('payment.success');
        } 
    }
}
