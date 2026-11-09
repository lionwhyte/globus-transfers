@extends('layout')

@section('meta')
<meta name="{{ __('content.description') }}" content="{{ __('content.about_meta') }}">
<link rel="canonical" href="{{ url()->current() }}">
<title>@lang('content.about_title')</title>
@endsection

@section('content')
@php
    $breadcrumbs = [
    ['title' => __('content.home'), 'url' => '/'],
    ['title' => __('content.about-us'), 'url' => '']
];
@endphp

@section('content')

<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">@lang('content.about_hdg1')</h1>
        @include('partials.breadcrumbs')
    </div>
</section>


<div class="mx-auto container px-6 md:px-4 lg:px-20 text-gray-600 xl:grid xl:grid-cols-7">
    <div class="col-span-5">
        <section class="pt-16 pb-8">
            @lang('content.about_part1')
            <img src="{{asset('images/globus-transfers-1.jpg.webp')}}" alt="@lang('content.about_hdg1')" class="w-full rounded">
        </section>
        
        @lang('content.about_part2')
        
        @lang('content.about_part3')
        
        @lang('content.about_part4')
    </div>
    <div class="col-span-2">
        <div class="xl:ml-12 border-2 rounded h-fit xl:sticky top-28 my-8">
            @include('partials.contact-aside')
        </div>
    </div>
</div>



@endsection