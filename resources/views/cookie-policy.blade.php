@extends('layout')


@section('meta')
<meta name="{{ __('content.description') }}" 
    content="{{ __('cookie.cookie_meta') }}">
<title>@lang('cookie.cookie_title')</title>
@endsection

@php
$breadcrumbs = [
['title' => __('content.home'), 'url' => '/'],
['title' => __('cookie.cookie_hdg'), 'url' => '']
];
@endphp

@section('content')

<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
    <div
        class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">@lang('cookie.cookie_hdg')</h1>
        @include('partials.breadcrumbs')
    </div>
</section>

@lang('cookie.cookie_content')

@endsection