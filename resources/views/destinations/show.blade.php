@extends('layout')

<?php
// Assuming $location->location_description contains the HTML content
$htmlContent = htmlspecialchars($location->location_description);
$htmlContent = $location->location_description;

// Create a DOMDocument instance to parse the HTML
$dom = new DOMDocument();
$dom->loadHTML($htmlContent);

// Get all <p> (paragraph) elements from the parsed HTML
$paragraphs = $dom->getElementsByTagName('p');

// Check if there are paragraphs present
if ($paragraphs->length > 0) {
    // Get the last paragraph (index is zero-based)
    $lastParagraph = $paragraphs->item($paragraphs->length - 1)->nodeValue;

} else {
    // No paragraphs found
    echo 'No paragraphs found in the HTML content.';
}
?>

@section('meta')
<meta name="description" content="{{ $lastParagraph }}">
<link rel="canonical" href="{{ url()->current() }}">
<title>{{ $location->location_name }} | Globus Transfers Croatia | Destinations</title>
@endsection

@php
    $breadcrumbs = [
    ['title' => 'HOME', 'url' => '/'],
    ['title' => "DESTINATIONS", 'url' => '/destinations/cities'],
    ['title' => strtoupper($location->location_name), 'url' => '']
];
$images = explode(",",$location->location_images);
@endphp



@section('content')

<section class="bg-cyan-700 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">{{ $location->location_name }}</h1>
        @include('partials.breadcrumbs')
    </div>
</section>
<section class="sm:container sm:px-6 md:px-4 lg:px-20 mx-auto">
    <img src="{{asset('images/locations/' . $images[0])}}" alt="{{ $location->location_name }}" class="w-full">
</section>
<section class="container px-6 md:px-4 lg:px-20 mx-auto grid lg:grid-cols-2 gap-16 mt-16">
    <article class="space-y-4">
        {!! $htmlContent !!}
    </article>
    <div class="w-full mx-auto">
        <div class="w-full rounded h-80" id="map" aria-label="Location Map" role="application"></div>
        <table class="w-full border my-20" aria-describedby="table-summary">
            <caption id="table-summary" class="mb-2">List of Destinations and Prices for One-way and Return Transfers</caption>
            <thead>
                <tr class="border bg-gray-100">
                    <th scope="col" class="py-4">Destinations</th>
                    <th scope="col" class="py-4">Oneway</th>
                    <th scope="col" class="py-4">Return</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                <tr class="text-center border transition hover:text-white hover:bg-cyan-600">
                    <td class="py-2">{{ explode(",", $route->destination_location_name)[0] }}</td>
                    <td class="py-2">{{ $route->standardPrice }}€</td>
                    <td class="py-2">{{ $route->standardPrice + ($route->standardPrice - ($route->standardPrice * 0.2)) }}€</td>
                </tr>
                @endforeach
            </tbody>  
        </table>
        <div class="border rounded">
            @include('partials.contact-aside')
        </div>
        
    </div>
</section>

<script>
    function initMap() {
        var location = { lat: {{ $location->location_lat }}, lng: {{ $location->location_lng }} };

        // Create a new map centered at the location coordinates
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: location
        });

        // Create a marker at the location coordinates
        var locationMarker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Location'
        });
    }

    // Call the initMap function after the Google Maps API is loaded
    window.initMap = initMap;
</script>
@endsection
