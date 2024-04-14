@extends('layout')

@section('meta')
<meta name="description" content="Frequently Asked Questions - 
What happens in the case of a delay?
Why is using a private transfer a good service?
Where will the Driver wait at the airport?
What does the price include?
What vehicles are available?
Can I cancel my reservation?">
<title>FAQ | Globus Transfers Croatia</title>
@endsection

@section('content')


@php
    $breadcrumbs = [
    ['title' => 'HOME', 'url' => '/'],
    ['title' => "FAQ - Croatia Transfers FAQ's", 'url' => '']
];
@endphp

@section('content')

<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
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