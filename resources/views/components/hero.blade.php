<section class="hero text-gray-600 pb-20 pt-12 md:pt-20">
    {{-- <div class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-center bg-cover rounded"
        style="background-image: url('images/klima-uredaji-hero-banner.webp')"></div> --}}
        <div class="container mx-auto flex flex-col lg:flex-row align-center space-x-20 px-4 sm:px-16">
            
            <div>
                <div class="z-10 text-center xl:hidden mb-16">
                    <h1 class="text-2xl lg:text-3xl text-gray-200 font-bold my-4">
                        Elevate Your Journey with the Best in the Business!
                    </h1>
                    <h2 class="inline-block border-2 border-amber-500 text-white text-lg lg:text-xl py-2 px-4 rounded-xl uppercase mt-2">
                        Journey with Confidence, Arrive with Panache – Globus Transfers, Croatia's Finest
                    </h2>
                </div>
                <form action="/search" method="get" class="flex flex-col space-y-2 text-lg" id="mapForm">
                    <div class="relative flex items-center">
                        <i class="fa-solid fa-location-dot absolute left-2 text-xl z-30"></i>
                        <i class="fa-solid fa-xmark absolute right-3 text-xl z-30 px-1 cursor-pointer clear-input-button hidden" onclick="clearInput('departure')"></i>
                        <input required
                            class="pl-9 pr-4 py-2 rounded w-full z-20" 
                            type="text" id="departure" name="departure" autocomplete="off" placeholder="Pick-up location" oninput="getDepartureSuggestions(this.value)"> 
                        <div id="departureSuggestions" class="absolute top-10 z-10 w-full pt-2 bg-white border-2"
                            style="display: none;">
                            <ul id="departureSuggestionList"></ul>
                        </div>
                    </div>
                
                    <div class="relative flex items-center">
                        <i class="fa-solid fa-location-crosshairs absolute left-2 text-xl"></i>
                        <i class="fa-solid fa-xmark absolute right-3 text-xl px-1 cursor-pointer clear-input-button hidden" onclick="clearInput('destination')"></i>
                        <input required
                            class="pl-9 pr-4 py-2 rounded w-full" 
                            type="text" id="destination" name="destination" autocomplete="off" placeholder="Destination" oninput="getDestinationSuggestions(departure.value, this.value)">
                        <div id="destinationSuggestions" class="absolute top-10 z-10 w-full pt-2 bg-white border-2" style="display: none;">
                            <ul id="destinationSuggestionList"></ul>
                        </div>
                    </div>
                    <div class="relative flex items-center">
                        <i class="fa-regular fa-calendar-days absolute left-2 text-xl"></i>
                        <input required autocomplete="off" type="text" id="datepicker" name="departure-date" class="pl-9 pr-4 py-2 rounded w-full" placeholder="Select a date">
                    </div>
                
                    <div class="relative flex items-center">
                        <i class="fas fa-user absolute left-2 text-xl"></i>
                        <input class="pl-9 pr-4 py-2 rounded w-1/2 mr-2" type="number" name="passengers" id="passengers" placeholder="Passengers" required>
                        <div class="px-4 py-2 rounded bg-gray-200 w-1/2 space-x-1">
                            <input type="checkbox" name="round-trip" id="round-trip" class="scale-125">
                            <label for="round-trip">Round trip</label>
                        </div>
                    </div>
                    <button type="submit" class="p-4 rounded bg-amber-500 transition hover:bg-amber-600 text-white text-lg">SEE PRICES</button>
                </form>
                <div class="text-white font-semibold text-center mt-4">
                    Need help finding your route or any additional info? <a href="/contact" class="underline transition hover:text-amber-500">Click here</a>
                </div>
            </div>
            
            <div class="z-10 text-center max-w-96 hidden xl:block">
                <h1 class="text-2xl lg:text-3xl text-gray-200 font-bold my-4 ">
                    Elevate Your Journey with the Best in the Business!
                </h1>
                <h2 class="inline-block border-2 border-amber-500 text-white text-lg lg:text-xl py-2 px-4 rounded-xl uppercase mt-2">
                    Journey with Confidence, Arrive with Panache – Globus Transfers, Croatia's Finest
                </h2>
            </div>
        </div>
        

        
</section>
