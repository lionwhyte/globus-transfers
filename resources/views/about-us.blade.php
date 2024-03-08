@extends('layout')
@section('content')

@php
    $breadcrumbs = [
    ['title' => 'HOME', 'url' => '/'],
    ['title' => 'ABOUT', 'url' => '']
];
@endphp

@section('content')

<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">About us</h1>
        @include('partials.breadcrumbs')
    </div>
</section>


<div class="mx-auto container px-6 md:px-4 lg:px-20 text-gray-600 xl:grid xl:grid-cols-7">
    <div class="col-span-5">
        <section class="pt-16 pb-8">
            <p class="mb-10">We, <span class="font-bold">GLOBUS Transfers</span>, specialize in passenger transportation and on-demand passenger transfers. Our operations cover the regions of Dalmatia, Zadar, and Zagreb. Additionally, we offer vehicle rentals.</p>
            <img src="{{asset('images/globus-transfers-1.jpg.webp')}}" alt="globus-transfers-1" class="w-full rounded">
        </section>
        
        <section class="py-8">
            <h2 class="text-cyan-700 text-xl font-bold mb-4">Passenger Transfers in Zadar</h2>
            <p class="mb-4">Established in 2023, <span class="font-bold">GLOBUS from Zadar</span> is located at DR. FRANJO TUĐMANA 85, VRSI. We provide affordable <span class="font-bold">passenger transfers in Zadar</span> with a guaranteed balance of cost and quality.</p>
            <p class="mb-4">Our <span class="font-bold">passenger transfers in Zadar</span> involve organized transportation services from one point to another, usually between different transportation hubs such as airports, ferry ports or bus stations.</p>
            <p class="mb-4">If you have any questions regarding <span class="font-bold">passenger transfers in Zadar</span>, feel free to reach out. Our friendly staff will gladly answer your queries and ensure a pleasant journey with us.</p>
            <p class="mb-4">When you need <span class="font-bold">passenger transfers in Zadar</span>, you can rely on <span class="font-bold">GLOBUS</span> for a comfortable and dependable service.</p>
        </section>
        
        <section class="py-8">
            <h2 class="text-cyan-700 text-xl font-bold mb-4">Affordable Passenger Transportation</h2>
            <p class="mb-4">When you require <span class="font-bold">passenger transfers in Zadar</span>, turn to <span class="font-bold">GLOBUS</span>. Through dedicated work, we have gained numerous satisfied clients who appreciate our pleasant service and affordable prices.</p>
            <p class="mb-4">Our friendly drivers ensure a comfortable journey, and the cost of transportation is very reasonable. We prioritize prompt arrivals to your desired location.</p>
            <p class="mb-4"><span class="font-bold">Passenger transfers</span> are available for individuals, families, groups, or business travelers seeking organized transportation between different locations.</p>
            <p class="mb-4">Count on <span class="font-bold">GLOBUS</span> when you need <span class="font-bold">passenger transfers in Zadar</span>. Your satisfaction is guaranteed with us!</p>
        </section>
        
        <section class="py-8">
            <h2 class="text-cyan-700 text-xl font-bold mb-4">Fast and Secure Transfers in Zadar</h2>
            <img src="{{asset('images/globus-transfers-3.jpg.webp')}}" alt="globus-transfers-1" class="w-full md:w-1/2 rounded mb-4">
            <p class="mb-4"><span class="font-bold">Passenger transfers</span> involve transporting individuals from point A to B, typically from airports, ferry ports, or bus terminals. Our services also include luggage transportation for your convenience.</p>
            <p class="mb-4">For quality and secure <span class="font-bold">passenger transfers in Zadar</span>, choose <span class="font-bold">GLOBUS</span>. Contact us to experience our professionalism and affordable rates. Trust us for a pleasant journey!</p>
            <p class="mb-4">When you need <span class="font-bold">passenger transfers in Zadar</span>, rely on <span class="font-bold">GLOBUS</span> for a prompt and safe transportation service.</p>
            <p class="mb-4">For any additional questions, call the provided contact information.</p>
        </section>
    </div>
    <div class="col-span-2">
        <div class="xl:ml-12 border-2 rounded h-fit xl:sticky top-20 my-8">
            @include('partials.contact-aside')
        </div>
    </div>
</div>



@endsection