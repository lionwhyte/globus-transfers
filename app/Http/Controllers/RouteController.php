<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class RouteController extends Controller
{
    public function search(Request $request)
    {
        $departureLocationName = $request->input('departure');
        $destinationLocationName = $request->input('destination');
        $departureDate = $request->input('departure-date');
        $passengers = $request->input('passengers');
        $roundTrip = $request->input('round-trip') == true;
        
        // Validate date
        $validator = Validator::make($request->all(), [
            'departure' => 'required',
            'destination' => 'required',
            'departure-date' => 'required|date_format:"F-d-Y"|after_or_equal:tomorrow',
            'passengers' => 'required|integer|min:1|max:19',
        ]);
        
        if ($validator->fails()) {
            return redirect('contact');
        }

        // Search for routes with matching departure and destination
        $routes = Route::where('departure_location_name', 'like', $departureLocationName . '%')
            ->where('destination_location_name', 'like', $destinationLocationName . '%')
            ->first();
        

        if ($routes !== null) {
            $route_id = $routes->id;
            $departureLocationName = $routes->departure_location_name;
            $destinationLocationName = $routes->destination_location_name;

            $departureLocationLat = $routes->departure_location_lat;
            $departureLocationLng = $routes->departure_location_lng;
            $destinationLocationLat = $routes->destination_location_lat;
            $destinationLocationLng = $routes->destination_location_lng;
            
            $distance = $routes->distance_km;
            $duration = $routes->duration;

            $standardPrice = $roundTrip ? $routes->standardPrice * 2 : $routes->standardPrice;
            $minivanPrice = $roundTrip ? $routes->minivanPrice * 2 : $routes->minivanPrice;
            $minibusPrice = $roundTrip ? $routes->minibusPrice * 2 : $routes->minibusPrice;
            
            //Store calculated data in the session
            Session::put('routeAndReservationData', [
                'route_id' => $route_id,
                'departure' => $departureLocationName,
                'destination' => $destinationLocationName,
                'distance' => $distance,
                'duration' => $duration,
                'standardPrice' => $standardPrice,
                'minivanPrice' => $minivanPrice,
                'minibusPrice' => $minibusPrice,
                'departureDate' => $departureDate,
                'passengers' => $passengers,
                'roundTrip' => $roundTrip,
            ]);

            // Display the route view
            return view('route', [
                'departureLocationLat' => $departureLocationLat,
                'departureLocationLng' => $departureLocationLng,
                'destinationLocationLat' => $destinationLocationLat,
                'destinationLocationLng' => $destinationLocationLng,
                'distance' => $distance,
                'duration' => $duration,
                'departureLocationName' => $departureLocationName,
                'destinationLocationName' => $destinationLocationName,
                'standardPrice' => $standardPrice,
                'minivanPrice' => $minivanPrice,
                'minibusPrice' => $minibusPrice,
                'departureDate' => $departureDate,
                'passengers' => $passengers,
                'roundTrip' => $roundTrip,
                // 'apiKey' => env('GOOGLE_MAPS_API_KEY')
            ]);
        } else {
            return redirect('contact');
        }
    }       
}

