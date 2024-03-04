@extends('layout')
@section('content')


@php
    $breadcrumbs = [
    ['title' => 'HOME', 'url' => '/'],
    ['title' => "FAQ - Croatia Transfers FAQ's", 'url' => '']
];
@endphp

@section('content')

<section class="bg-cyan-700 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">FAQ - Croatia Transfers FAQ's</h1>
        @include('partials.breadcrumbs')
    </div>
</section>
<section class="mx-auto container px-6 md:px-4 lg:px-20 text-gray-600 my-8">
    @include('partials.faq')
</section>
<section class="mx-auto container px-6 md:px-4 lg:px-20 text-gray-600 mb-12">
    @include('partials.contact-aside')
</section>

@endsection