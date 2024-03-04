@extends('layout')
@section('content')

@php
    $breadcrumbs = [
    ['title' => 'HOME', 'url' => '/'],
    ['title' => "DESTINATIONS", 'url' => '']
];
@endphp

@section('content')

<section class="bg-cyan-700 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">TRANSFER DESTINATIONS</h1>
        @include('partials.breadcrumbs')
    </div>
</section>

<nav class="mx-auto container px-6 md:px-4 lg:px-20 text-sm text-center text-gray-600">
    <ul class="lg:flex lg:justify-between">
        <li class="border w-full">
            <a href="{{ route('destinations.cities') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/cities') ? 'bg-cyan-400' : 'bg-cyan-300' }}">
                CITIES
            </a>
        </li>
        <li class="border w-full">
            <a href="{{ route('destinations.airports') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/airports') ? 'bg-cyan-400' : 'bg-cyan-300' }}">AIRPORTS</a>
        </li>
        <li class="border w-full">
            <a href="{{ route('destinations.ports') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/ports') ? 'bg-cyan-400' : 'bg-cyan-300' }}">PORTS</a>
        </li>
        <li class="border w-full">
            <a href="{{ route('destinations.parks') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/national-parks') ? 'bg-cyan-400' : 'bg-cyan-300' }}">NATIONAL PARKS</a>
        </li>
        <li class="border w-full">
            <a href="{{ route('destinations.marinas') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/marinas') ? 'bg-cyan-400' : 'bg-cyan-300' }}">MARINAS</a>
        </li>
        <li class="border w-full">
            <a href="{{ route('destinations.hotels') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/hotels') ? 'bg-cyan-400' : 'bg-cyan-300' }}">HOTELS</a>
        </li>
        <li class="border w-full">
            <a href="{{ route('destinations.towns') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/towns') ? 'bg-cyan-400' : 'bg-cyan-300' }}">TOWNS</a>
        </li>
        <li class="border w-full">
            <a href="{{ route('destinations.beaches') }}" 
                class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ request()->is('destinations/beaches') ? 'bg-cyan-400' : 'bg-cyan-300' }}">BEACHES</a>
        </li>
    </ul>
</nav>

<section class="mx-auto container px-6 md:px-4 lg:px-20 my-10 text-gray-600">

    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @forelse($locations as $location)
            @php
                $images = explode(",",$location->location_images);
            @endphp
            <div class="border-2 rounded p-4 rounded bg-gray-100 flex flex-col">
                <a class="inline-block" href="/destinations/{{$location->location_slug}}">
                    <img src="{{asset('images/locations/' . $images[1])}}" alt="{{ $location->location_name }}" 
                        class="w-full rounded transition duration-1000 ease-in-out hover:scale-105">
                </a>
                
                <a class="ml-1 mt-2 font-semibold inline-block transition hover:text-cyan-700 underline" href="/destinations/{{$location->location_slug}}">{{ $location->location_name }}</a>
            </div>
        @empty
            <p>No city locations found.</p>
        @endforelse
    </div>
</section>

@endsection