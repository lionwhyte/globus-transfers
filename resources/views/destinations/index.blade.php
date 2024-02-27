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

<nav class="bg-gray-300 p-4">
    <ul class="flex space-x-4">
        <li class="{{ Request::is('destinations.cities') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.cities') }}" class="text-gray-700 hover:text-gray-900">CITIES</a>
        </li>
        <li class="{{ Request::is('destinations.airports') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.airports') }}" class="text-gray-700 hover:text-gray-900">AIRPORTS</a>
        </li>
        <li class="{{ Request::is('destinations.ports') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.ports') }}" class="text-gray-700 hover:text-gray-900">PORTS</a>
        </li>
        <li class="{{ Request::is('destinations.parks') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.parks') }}" class="text-gray-700 hover:text-gray-900">NATIONAL PARKS</a>
        </li>
        <li class="{{ Request::is('destinations.marinas') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.marinas') }}" class="text-gray-700 hover:text-gray-900">MARINAS</a>
        </li>
        <li class="{{ Request::is('destinations.hotels') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.hotels') }}" class="text-gray-700 hover:text-gray-900">HOTELS</a>
        </li>
        <li class="{{ Request::is('destinations.towns') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.towns') }}" class="text-gray-700 hover:text-gray-900">TOWNS</a>
        </li>
        <li class="{{ Request::is('destinations.beaches') ? 'border-b-2 border-blue-500' : '' }}">
            <a href="{{ route('destinations.beaches') }}" class="text-gray-700 hover:text-gray-900">BEACHES</a>
        </li>
        
    </ul>
</nav>

<div class="container mx-auto mt-8">

    <div class="grid grid-cols-3 gap-4">
        @forelse($locations as $location)
            <div class="bg-gray-200 p-4 rounded">
                <p class="font-semibold">{{ $location->location_name }}</p>
            </div>
        @empty
            <p>No city locations found.</p>
        @endforelse
    </div>
</div>

@endsection