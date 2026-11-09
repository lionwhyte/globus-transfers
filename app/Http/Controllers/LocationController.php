<?php
namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    /**
     * Shows locations filtered by a given type.
     */
    private function getLocationByType($type)
    {
        $locations = Location::where('location_type', $type)->orderBy('location_name', 'asc')->get();
        return view('destinations.index', ['locations' => $locations]);
    }

    public function cities() { return $this->getLocationByType('city'); }
    public function airports() { return $this->getLocationByType('airport'); }
    public function ports() { return $this->getLocationByType('port'); }
    public function parks() { return $this->getLocationByType('park'); }
    public function marinas() { return $this->getLocationByType('marina'); }
    public function hotels() { return $this->getLocationByType('hotel'); }
    public function towns() { return $this->getLocationByType('town'); }
    public function beaches() { return $this->getLocationByType('beach'); }

    /**
     * It shows a single page of selected locations and a price list to the nearest airports.
     */
    public function show($locale, $slug)
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
    
    /**
     * Returns JSON suggestions of starting locations for AJAX autocomplete on the home page.
     */
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

    /**
     * Returns JSON suggestions of destinations for AJAX autocomplete on the home page.
     */
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
