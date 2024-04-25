@extends('layout')

@section('meta')
<meta name="description" 
    content="Octopus Transfers Croatia links travelers throughout Croatia and nearby nations using our extensive network of skilled drivers and vehicles.">
<title>GLOBUS TRANSFERS | Passenger Shuttle Transportation Services in Croatia</title>
@endsection

@section('content')

{{-- HERO --}}
@include('components.hero')


<section class="py-8 bg-gray-100 rounded mb-20">
    <div class="container px-6 md:px-4 lg:px-20 mx-auto grid space-y-12 md:space-y-0 md:grid-cols-3 justify-center">
        <div class="max-w-96 px-4 text-center animate-left-vehicles">
            <img src="{{asset('images/globus-standard.png')}}" alt="Standard Taxi Vehicle">
            <p class="font-semibold">STANDARD</p>
            <p>Max <strong>3</strong> passengers</p>
        </div>
        <div class="max-w-96 px-4 text-center animate-left-vehicles">
            <img src="{{asset('images/globus-minivan.png')}}" alt="Minivan Taxi Vehicle">
            <p class="font-semibold">MINIVAN</p>
            <p>Max <strong>8</strong> passengers</p>
        </div>
        <div class="max-w-96 px-4 text-center animate-left-vehicles">
            <img src="{{asset('images/globus-minibus.png')}}" alt="Minibus Taxi Vehicle">
            <p class="font-semibold">MINIBUS</p>
            <p>Max <strong>16</strong> passengers</p>
        </div>
    </div>
</section>

<!-- Section 3: Why Choose Globus Transfers -->
<section class="mb-16">
    <div class="container px-6 md:px-4 lg:px-20 mx-auto">
        <h2 class="text-3xl font-semibold mb-2 text-center uppercase text-cyan-500 mt-8">Why Choose Globus Transfers?</h2>
        <h3 class="text-2xl text-center mb-20">Explore Croatia with Globus Transfers</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Professional Drivers -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-regular fa-id-card text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">Professional Drivers</h3>
                <p class="text-gray-400 text-lg">
                    Our drivers at Globus Transfers hold professional qualifications and are highly experienced, English-speaking professionals. Need local insights? Feel free to ask our friendly drivers.
                </p>
            </div>
            <!-- All-Inclusive Rates -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-coins text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">All-Inclusive Rates</h3>
                <p class="text-gray-400 text-lg">
                    Experience transparent pricing with Globus Transfers. Your Croatian transfer is secured in advance with all costs included – tolls, taxes, and any other fees.
                </p>
            </div>
            <!-- Free Cancellation -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-ban text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">Free Cancellation</h3>
                <p class="text-gray-400 text-lg">
                    Change of plans? No worries. Get a 100% refund for cancellations made 12 hours prior to the transfer with Globus Transfers.
                </p>
            </div>
            <!-- Simple Payment Process -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-money-bill text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">Simple Payment Process</h3>
                <p class="text-gray-400 text-lg">
                    Our straightforward payment process ensures the security of your money. Make direct bank transfer with ease for a hassle-free payment experience.
                </p>
            </div>
            <!-- Complimentary Wait Time -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-hourglass-start text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">Complimentary Wait Time</h3>
                <p class="text-gray-400 text-lg">
                    Flight delayed? No problem. Globus Transfers has you covered with complimentary wait time. We monitor all flights and will be there to collect you upon arrival.
                </p>
            </div>
            <!-- Quality Vehicles -->
            <div class="mb-8 fade-in">
                <div class="text-center bg-gradient-to-br from-teal-600 to-teal-300 rounded-xl py-6 px-6 inline-block mb-6"><i class="fa-solid fa-car text-3xl text-white w-12"></i></div>
                <h3 class="text-xl font-semibold mb-4 uppercase">Quality Vehicles</h3>
                <p class="text-gray-400 text-lg">
                    Enjoy a comfortable and enjoyable transfer with Globus Transfers. Our modern, air-conditioned vehicles are spotlessly clean and fully equipped, including WiFi.
                </p>
            </div>
        </div>
    </div>
</section>

 <!-- Section 2: Book Your Transfer Now -->
 <section class="py-16 mb-16 bg-gradient-to-r from-cyan-500 to-cyan-600 text-white">
    <div class="container px-6 md:px-4 lg:px-20 mx-auto lg:flex lg:justify-between">
        <h2 class="text-3xl font-semibold mb-6 lg:mb-0 animate-left-banner">Are you prepared for a voyage through Croatia?</h2>
        <a href="#top" class="bg-amber-500 text-2xl px-10 py-3 rounded-full hover:bg-amber-600 transition duration-300 text-center animate-right-banner" aria-label="Book Your Transfer Now">Book Now</a>
    </div>
</section>

<!-- Section 1: How We Work -->
<section>
    <div class="container px-6 md:px-4 lg:px-20 mx-auto">
        <h2 class="text-3xl font-semibold mb-12 text-center">The Way We Work</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Book Your Transfer -->
            <div class="p-4 border-2 border-amber-500 rounded bg-gray-100 shadow-lg fade-in">
                <h3 class="text-xl font-semibold mb-4 text-cyan-600">1. Book Your Transfer</h3>
                <ul class="text-gray-600 list-disc space-y-2 pl-8">
                    <li>Simply enter your departure and destination locations.</li>
                    <li>Enter your departure time and date, and the number of passengers.</li>
                    <li>Click on "See Prices" button.</li>
                    <li>Select your transfer vehicle and complete the booking form.</li>
                </ul>
            </div>
            <!-- Your Transfer -->
            <div class="p-4 border-2 border-amber-500 rounded bg-gray-100 shadow-lg fade-in">
                <h3 class="text-xl font-semibold mb-4 text-cyan-600">2. Your Transfer</h3>
                <ul class="text-gray-600 list-disc space-y-2 pl-8">
                    <li>On the day of your arrival, Globus Transfers will pick you up from your arrival airport at the agreed time.</li>
                    <li>When it comes to airport transfers, our driver will be stationed at the airport arrivals area, displaying a sign bearing your name as you emerge from customs. Upon locating our driver, they will assist you with your luggage, ensuring a smooth and prompt departure.</li>
                </ul>
            </div>
            <!-- Rate Our Ride -->
            <div class="p-4 border-2 border-amber-500 rounded bg-gray-100 shadow-lg fade-in">
                <h3 class="text-xl font-semibold mb-4 text-cyan-600">3. Rate Our Ride</h3>
                <ul class="text-gray-600 list-disc space-y-2 pl-8">
                    <li>After your transfer concludes, hop onto TripAdvisor to share your feedback and rate our services. We greatly value input and continually seek ways to enhance our Croatian transfer company based on your suggestions.</li>
                </ul>
                <div class="space-y-2 mt-6 text-center">
                    <a href="#">
                        <img src="{{asset('images/tripadvisor_logo.svg')}}" alt="tripAdvisor Logo" class="max-w-44 mx-auto">
                    </a>
                    <a href="https://www.tripadvisor.com/UserReviewEdit-g1190833-d27700791-Globus_Transfers-Vrsi_Zadar_County_Dalmatia.html" class="inline-block p-2 bg-amber-500 text-white transition hover:bg-amber-600 rounded">REVIEW US</a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection