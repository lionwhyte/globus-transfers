<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function cities()
    {
        $locations = Location::where('location_type', 'city')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function airports()
    {
        $locations = Location::where('location_type', 'airport')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function ports()
    {
        $locations = Location::where('location_type', 'port')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function marinas()
    {
        $locations = Location::where('location_type', 'marina')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function parks()
    {
        $locations = Location::where('location_type', 'park')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function hotels()
    {
        $locations = Location::where('location_type', 'hotel')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function towns()
    {
        $locations = Location::where('location_type', 'town')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function beaches()
    {
        $locations = Location::where('location_type', 'beach')->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }


    public function show($slug)
    {
        $location = Location::where('location_slug', $slug)->firstOrFail();
        $allowedLocations = [
            "Split, Croatia", 
            "Zadar, Croatia", 
            "Novalja, Croatia", 
            "Zagreb, Croatia", 
            "Dubrovnik, Croatia", 
            "Pula, Croatia",
            "Split Airport, Croatia", 
            "Zadar Airport, Croatia", 
            "Zagreb Airport, Croatia", 
            "Dubrovnik Airport, Croatia", 
            "Pula Airport, Croatia",
            "Ljubljana Airport, Slovenia",
            "Venice Treviso Airport, Italy",
            "Podgorica Airport, Montenegro",
        ];

        $routes = Route::where('departure_location_name', $location->location_name)
            ->whereIn('destination_location_name', $allowedLocations)
            ->orderBy('destination_location_name', 'asc')
            ->get();
        return view('destinations.show', ['location' => $location, 'routes' => $routes]);
    }
    
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
