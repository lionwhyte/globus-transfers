@extends('layout')
@section('content')

@include('components.route-finder')


<section class="container px-6 md:px-4 lg:px-20 mx-auto text-gray-600">
    <h2 class="mt-10 mb-16 text-2xl">Select transfer type for your trip from {{ $departureLocationName }} to {{ $destinationLocationName }}</h2>
    <div class="space-y-6">
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-2 items-center text-center border rounded py-4">
            @if ($distance && $duration)
            <div class="col-span-2 sm:col-span-4 lg:col-span-1 lg:border-r px-2 h-full flex items-center">
                <img src="{{asset('images/globus-standard.png')}}" alt="Standard Taxi Vehicle">
            </div>
            
            <div class="col-span-2 sm:col-span-1 sm:border-r border-b sm:border-b-0 pb-8 sm:pb-0 px-2 h-full flex flex-col justify-center">
                <p class="font-semibold">STANDARD</p>
                <p>Max 3 passengers</p>
            </div>
            
            <div class="col-span-1 border-r px-2 h-full flex flex-col justify-center">
                <p class="col-span-1"><i class="fa-regular fa-map text-4xl"></i><br>{{ $distance }} km</p>
            </div>
            
            <div class="col-span-1 sm:border-r px-2 h-full flex flex-col justify-center">
                <p class="col-span-1"><i class="fa-regular fa-clock text-4xl"></i><br>{{ $duration }}</p>
            </div>
            
            <div class="col-span-2 sm:col-span-1 border-t sm:border-t-0 pt-8 sm:pt-0 px-2">
                <p class="text-4xl text-cyan-700">{{ $standardPrice }} €</p>
                @if ($roundTrip)
                <p>Round trip included</p>
                @else
                <p>Oneway trip</p>
                @endif
                <a href="{{ route('reservation.create') }}?vehicle=standard" 
                    class="w-full inline-block p-4 rounded bg-amber-500 transition hover:bg-amber-600 text-white mt-4">SELECT</a>
                @else
                <p>Failed to calculate distance and time.</p>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-2 items-center text-center border rounded py-4">
            @if ($distance && $duration)
            <div class="col-span-2 sm:col-span-4 lg:col-span-1 lg:border-r px-2 h-full flex items-center">
                <img src="{{asset('images/globus-minivan.png')}}" alt="Minivan Taxi Vehicle">
            </div>
            <div class="col-span-2 sm:col-span-1 sm:border-r border-b sm:border-b-0 pb-8 sm:pb-0 px-2 h-full flex flex-col justify-center">
                <p class="font-semibold">MINIVAN</p>
                <p>Max 8 passengers</p>
            </div>
            <div class="col-span-1 border-r px-2 h-full flex flex-col justify-center">
                <p class="col-span-1"><i class="fa-regular fa-map text-4xl"></i><br>{{ $distance }} km</p>
            </div>
            <div class="col-span-1 sm:border-r px-2 h-full flex flex-col justify-center">
                <p class="col-span-1"><i class="fa-regular fa-clock text-4xl"></i><br>{{ $duration }}</p>
            </div>
            
            
            <div class="col-span-2 sm:col-span-1 border-t sm:border-t-0 pt-8 sm:pt-0 px-2">
                <p class="text-4xl text-cyan-700">{{ $minivanPrice }} €</p>
                @if ($roundTrip)
                <p>Round trip included</p>
                @else
                <p>Oneway trip</p>
                @endif
                <a href="{{ route('reservation.create') }}?vehicle=minivan" 
                    class="w-full inline-block p-4 rounded bg-amber-500 transition hover:bg-amber-600 text-white mt-4">SELECT</a>
                @else
                <p>Failed to calculate distance and time.</p>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-2 items-center text-center border rounded py-4">
            @if ($distance && $duration)
            <div class="col-span-2 sm:col-span-4 lg:col-span-1 lg:border-r px-2 h-full flex items-center">
                <img src="{{asset('images/globus-minibus.png')}}" alt="Minibus Taxi Vehicle">
            </div>
            <div class="col-span-2 sm:col-span-1 sm:border-r border-b sm:border-b-0 pb-8 sm:pb-0 px-2 h-full flex flex-col justify-center">
                <p class="font-semibold">MINIBUS</p>
                <p>Max 16 passengers</p>
            </div>
            <div class="col-span-1 border-r px-2 h-full flex flex-col justify-center">
                <p class="col-span-1"><i class="fa-regular fa-map text-4xl"></i><br>{{ $distance }} km</p>
            </div>
            <div class="col-span-1 sm:border-r px-2 h-full flex flex-col justify-center">
                <p class="col-span-1"><i class="fa-regular fa-clock text-4xl"></i><br>{{ $duration }}</p>
            </div>
            <div class="col-span-2 sm:col-span-1 border-t sm:border-t-0 pt-8 sm:pt-0 px-2">
                <p class="text-4xl text-cyan-700">{{ $minibusPrice }} €</p>
                @if ($roundTrip)
                <p>Round trip included</p>
                @else
                <p>Oneway trip</p>
                @endif
                <a href="{{ route('reservation.create') }}?vehicle=minibus" 
                    class="w-full inline-block p-4 rounded bg-amber-500 transition hover:bg-amber-600 text-white mt-4">SELECT</a>
                @else
                <p>Failed to calculate distance and time.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="container px-6 md:px-4 lg:px-20 mx-auto text-gray-600 my-20 flex flex-col justify-around lg:flex-row gap-16">
    <div class="w-full">
        <h2 class="text-xl font-semibold mb-4">FAQ</h2>
        @include('partials.faq')
    </div>
    <div class="h-80 w-full md:h-96">
        <h2 class="text-xl font-semibold mb-4">Map</h2>
        <div class="w-full h-full" id="map" aria-label="Map showing route from {{ $departureLocationName }} to {{ $destinationLocationName }}"></div>
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