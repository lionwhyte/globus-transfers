<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    
    public function getDepartureLocationsSuggestions(Request $request)
    {
        $query = $request->input('query');

        $locations = Location::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('location_name', 'like', $query . '%')
                         ->orWhere('location_name', 'like', '% ' . $query . '%')
                         ->whereNot('location_name', 'like', '%, ' . $query . '%');
            })
            ->pluck('location_name');
           
        
            return response()->json($locations);
    }

    public function getDestinationLocationsSuggestions(Request $request)
    {
        $queryDeparture = $request->input('queryDeparture');
        $queryDestination = $request->input('queryDestination');

        $routes = Route::where(function ($queryBuilder) use ($queryDestination) {
            $queryBuilder->where('destination_location_name', 'like', $queryDestination . '%')
                         ->orWhere('destination_location_name', 'like', '% ' . $queryDestination . '%')
                         ->whereNot('destination_location_name', 'like', '%, ' . $queryDestination . '%');
        })
        ->where('departure_location_name', $queryDeparture)
        ->pluck('destination_location_name');

        return response()->json($routes);
    }
}
