@extends('layout')

@section('meta')
<meta name="{{ __('content.description') }}" 
    content="{{ __('privacy.meta') }}">
<title>@lang('privacy.title')</title>
@endsection

@section('content')

@php
$breadcrumbs = [
['title' => __('content.home'), 'url' => '/'],
['title' => __('privacy.hdg'), 'url' => '']
];
@endphp

@section('content')

<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
    <div
        class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">@lang('privacy.hdg')</h1>
        @include('partials.breadcrumbs')
    </div>
</section>

@lang('privacy.content')
@endsection