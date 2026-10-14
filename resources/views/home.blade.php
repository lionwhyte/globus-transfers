@extends('layout')

@section('meta')
<meta name="{{ __('content.description') }}" 
    content="{{ __('content.home_meta') }}">


<title>@lang('content.home_title')</title>
@endsection

@section('content')
{{-- HERO --}}
@include('components.hero')


<section class="py-8 bg-gray-100 rounded mb-20">
    <div class="container px-6 md:px-4 lg:px-20 mx-auto grid space-y-12 md:space-y-0 md:grid-cols-3 justify-center">
        <div class="max-w-96 px-4 text-center animate-left-vehicles">
            <img src="{{asset('images/globus-standard.png')}}" alt="Standard Taxi Vehicle">
            <p class="font-semibold">STANDARD</p>
            <p>Max <strong>3</strong> @lang('content.max_passengers')</p>
        </div>
        <div class="max-w-96 px-4 text-center animate-left-vehicles">
            <img src="{{asset('images/globus-minivan.png')}}" alt="Minivan Taxi Vehicle">
            <p class="font-semibold">MINIVAN</p>
            <p>Max <strong>8</strong> @lang('content.max_passengers')</p>
        </div>
        <div class="max-w-96 px-4 text-center animate-left-vehicles">
            <img src="{{asset('images/globus-minibus.png')}}" alt="Minibus Taxi Vehicle">
            <p class="font-semibold">MINIBUS</p>
            <p>Max <strong>16</strong> @lang('content.max_passengers')</p>
        </div>
    </div>
</section>

<!-- Section 3: Why Choose Globus Transfers -->
<section class="mb-16">
    <div class="container px-6 md:px-4 lg:px-20 mx-auto">
        <h2 class="text-3xl font-semibold mb-2 text-center uppercase text-cyan-500 mt-8">@lang('content.why_globus_heading')</h2>
        <h3 class="text-2xl text-center mb-20">@lang('content.why_globus_sub')</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Professional Drivers -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-regular fa-id-card text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">@lang('content.pro_drivers_heading')</h3>
                <p class="text-gray-400 text-lg">
                    @lang('content.pro_drivers')
                </p>
            </div>
            <!-- All-Inclusive Rates -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-coins text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">@lang('content.all_inclusive_rates_heading')</h3>
                <p class="text-gray-400 text-lg">
                    @lang('content.all_inclusive_rates')
                </p>
            </div>
            <!-- Free Cancellation -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-ban text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">@lang('content.free_cancellation_heading')</h3>
                <p class="text-gray-400 text-lg">
                    @lang('content.free_cancellation')
                </p>
            </div>
            <!-- Simple Payment Process -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-money-bill text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">@lang('content.simple_payment_heading')</h3>
                <p class="text-gray-400 text-lg">
                    @lang('content.simple_payment')
                </p>
            </div>
            <!-- Complimentary Wait Time -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-hourglass-start text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">@lang('content.wait_time_heading')</h3>
                <p class="text-gray-400 text-lg">
                    @lang('content.wait_time')
                </p>
            </div>
            <!-- Quality Vehicles -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-car text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">@lang('content.quality_vehicles_heading')</h3>
                <p class="text-gray-400 text-lg">
                    @lang('content.quality_vehicles')
                </p>
            </div>
        </div>
    </div>
</section>

 <!-- Section 2: Book Your Transfer Now -->
 <section class="py-16 mb-16 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white">
    <div class="container px-6 md:px-4 lg:px-20 mx-auto lg:flex lg:justify-between lg:items-center text-center">
        <h2 class="text-2xl lg:text-3xl font-light mb-10 lg:mb-0 animate-left-banner lg:w-1/2 mx-auto lg:mx-0">@lang('content.call_to_action')</h2>
        <a href="#top" class="bg-amber-500 text-2xl px-10 py-3 rounded-full hover:bg-amber-600 transition duration-300 text-center animate-right-banner" aria-label="Book Your Transfer Now">@lang('content.call_to_action_button')</a>
    </div>
</section>

<!-- Section 1: How We Work -->
<section>
    <div class="container px-6 md:px-4 lg:px-20 mx-auto">
        <h2 class="text-3xl font-semibold mb-12 text-center">@lang('content.how_we_work_heading')</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Book Your Transfer -->
            @lang('content.card1')
            <!-- Your Transfer -->
            @lang('content.card2')
            <!-- Rate Our Ride -->
            <div class="p-4 border-2 border-amber-500 rounded bg-gray-100 shadow-lg fade-in">
                @lang('content.card3')
                <div class="space-y-2 mt-6 text-center">
                    <a href="#">
                        <img src="{{asset('images/tripadvisor_logo.svg')}}" alt="tripAdvisor Logo" class="max-w-44 mx-auto">
                    </a>
                    <a href="#" class="inline-block p-2 bg-amber-500 text-white transition hover:bg-amber-600 rounded">@lang('content.review_us')</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection