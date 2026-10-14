@extends('layout')

@php
    $locale = app()->getLocale();

    $breadcrumbs = [
        ['title' => __('content.home'), 'url' => '/' . $locale],
        ['title' => __('content.destinations'), 'url' => '']
    ];
@endphp

@section('meta')
<meta name="{{ __('content.description') }}" content="{{ __('content.destinations_meta') }}">
<link rel="canonical" href="{{ url()->current() }}">
<title>@lang('content.destinations_title')</title>
@endsection

@section('content')

<section class="bg-cyan-700 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">@lang('content.destinations_hdg1')</h1>
        @include('partials.breadcrumbs')
    </div>
</section>

<nav class="mx-auto container px-6 md:px-4 lg:px-20 text-sm text-center text-gray-600">
    <ul class="lg:flex lg:justify-between">
        @php
            $destinationTypes = [
                'cities' => __('content.destinations_cities'),
                'airports' => __('content.destinations_airports'),
                'ports' => __('content.destinations_ports'),
                'national-parks' => __('content.destinations_parks'),
                'marinas' => __('content.destinations_marinas'),
                'hotels' => __('content.destinations_hotels'),
                'towns' => __('content.destinations_towns'),
                'beaches' => __('content.destinations_beaches'),
            ];
        @endphp

        @foreach($destinationTypes as $typeKey => $typeName)
            @php
                $url = url("/{$locale}/destinations/{$typeKey}");
                $isActive = request()->is("*/destinations/{$typeKey}");
            @endphp
            <li class="border w-full">
                <a href="{{ $url }}" 
                    class="flex items-center justify-center py-4 px-1 w-full h-full inline-block transition hover:text-gray-800 font-semibold {{ $isActive ? 'bg-cyan-400' : 'bg-cyan-300' }}">
                    {{ $typeName }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>

<section class="mx-auto container px-6 md:px-4 lg:px-20 my-10 text-gray-600">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @forelse($locations as $location)
            @php
                $images = explode(",", $location->location_images);
                $locationUrl = url("/{$locale}/destinations/{$location->location_slug}");
            @endphp
            <div class="border-2 rounded p-4 bg-gray-100 flex flex-col">
                <a class="inline-block" href="{{ $locationUrl }}">
                    <img src="{{ asset('images/locations/' . $images[1]) }}" alt="{{ $location->location_name }}" 
                        class="w-full rounded transition duration-1000 ease-in-out hover:scale-105">
                </a>
                
                <a class="ml-1 mt-2 font-semibold inline-block transition hover:text-cyan-700 underline" href="{{ $locationUrl }}">
                    {{ $location->location_name }}
                </a>
            </div>
        @empty
            <p>No locations found.</p>
        @endforelse
    </div>
</section>

@endsection