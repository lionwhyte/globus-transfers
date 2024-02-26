@extends('layout')
@section('content')

@include('components.route-finder')


<section class="container px-6 md:px-4 lg:px-20 mx-auto text-gray-600">
    <h2 class="mb-6">Select transfer type for your trip from {{ $departureLocationName }} to {{ $destinationLocationName }}</h2>
    <div class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-2 items-center text-center">
            @if ($distance && $duration)
            <img src="{{asset('images/standard.png')}}" alt="Standard Taxi Vehicle" class="col-span-1">
            <p class="col-span-1">Max 3 passengers</p>
            <p class="col-span-1">Distance <br>{{ $distance }}</p>
            <p class="col-span-1">Duration <br>{{ $duration }}</p>
            <div class="col-span-1">
                <p>{{ $standardPrice }} €</p>
                @if ($roundTrip)
                <p>Round trip included</p>
                @endif
                <a href="{{ route('reservation.create') }}?vehicle=standard" 
                    class="inline-block p-4 rounded bg-amber-500 transition hover:bg-amber-600 text-white col-span-1">SELECT</a>
                @else
                <p>Failed to calculate distance and time.</p>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-2 items-center text-center">
            @if ($distance && $duration)
            <img src="{{asset('images/minivan.png')}}" alt="Minivan Taxi Vehicle" class="col-span-1">
            <p class="col-span-1">Max 8 passengers</p>
            <p class="col-span-1">Distance <br>{{ $distance }}</p>
            <p class="col-span-1">Duration <br>{{ $duration }}</p>
            <div class="col-span-1">
                <p>{{ $minivanPrice }} €</p>
                @if ($roundTrip)
                <p>Round trip included</p>
                @endif
                <a href="{{ route('reservation.create') }}?vehicle=minivan" 
                    class="inline-block p-4 rounded bg-amber-500 transition hover:bg-amber-600 text-white col-span-1">SELECT</a>
                @else
                <p>Failed to calculate distance and time.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<hr class="my-4">

<section class="container px-6 md:px-4 lg:px-20 mx-auto text-gray-600 mb-20">
    <div class="w-full h-80 md:w-96 md:h-96 mx-auto">
        <h2 class="text-center text-xl font-semibold mb-4">Map</h2>
        <div class="w-full h-full" id="map"></div>
    </div>
</section>


<script>
    function initMap() {
        var departure = { lat: {{ $departureLocationLat }}, lng: {{ $departureLocationLng }} };
        var destination = { lat: {{ $destinationLocationLat }}, lng: {{ $destinationLocationLng }} };

        // Create a new map centered at the departure coordinates
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: departure
        });

        // Create a marker at the departure coordinates
        var departureMarker = new google.maps.Marker({
            position: departure,
            map: map,
            title: 'Departure'
        });

        // Create a marker at the destination coordinates
        var destinationMarker = new google.maps.Marker({
            position: destination,
            map: map,
            title: 'Destination'
        });

        // Calculate and display the route
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

        var request = {
            origin: departure,
            destination: destination,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function (response, status) {
            if (status === 'OK') {
                directionsRenderer.setDirections(response);
            } else {
                console.error('Directions request failed:', status);
            }
        });
    }

    // Call the initMap function after the Google Maps API is loaded
    window.initMap = initMap;
    
</script>

@endsection