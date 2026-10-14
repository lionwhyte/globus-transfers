<section class="hero text-gray-600 pb-20 pt-12 md:pt-20">
        <div class="container mx-auto flex flex-col lg:flex-row align-center space-x-20 px-4 sm:px-16">
            
            <div>
                <div class="text-center xl:hidden mb-16 animate-top-hero">
                    <h1 class="text-2xl lg:text-3xl text-gray-200 font-light my-4">
                        @lang('content.h1')
                    </h1>
                    <h2 class="inline-block border-t-2 border-amber-500 text-amber-300 text-lg lg:text-xl py-2 px-4 uppercase mt-2">
                        @lang('content.h2')
                    </h2>
                </div>
                <form action={{ route('search', ['locale'=>app()->getLocale()]) }} method="get" class="flex flex-col space-y-2 text-lg animate-left-hero" id="mapForm">
                    <div class="relative flex items-center">
                        <i class="fa-solid fa-location-dot absolute left-2 text-2xl z-[60]"></i>
                        <button type="button" aria-label="Clear input" class="absolute right-3 text-2xl px-1 cursor-pointer clear-input-button hidden z-[60]" onclick="clearInput('departure')">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <input required
                            class="pl-10 pr-4 py-3 rounded w-full border z-50" 
                            type="text" id="departure" name="departure" autocomplete="off" placeholder="{{__('content.pickup_location')}}" oninput="getDepartureSuggestions(this.value)"> 
                        <div id="departureSuggestions" class="absolute top-11 z-40 w-full max-h-60 overflow-y-scroll pt-2 bg-white border-2"
                            style="display: none;">
                            <ul id="departureSuggestionList"></ul>
                        </div>
                    </div>
                
                    <div class="relative flex items-center">
                        <i class="fa-solid fa-location-crosshairs absolute left-2 text-2xl z-30"></i>
                        <button type="button" aria-label="Clear input" class="absolute right-3 text-2xl px-1 cursor-pointer clear-input-button hidden z-30" onclick="clearInput('destination')"> 
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <input required
                            class="pl-10 pr-4 py-3 rounded w-full border z-20" 
                            type="text" id="destination" name="destination" autocomplete="off" placeholder="{{__('content.destination')}}" oninput="getDestinationSuggestions(departure.value, this.value)">
                        <div id="destinationSuggestions" class="absolute top-11 z-10 w-full max-h-52 overflow-y-scroll pt-2 bg-white border-2" style="display: none;">
                            <ul id="destinationSuggestionList"></ul>
                        </div>
                    </div>
                    <div class="relative flex items-center">
                        <i class="fa-regular fa-calendar-days absolute left-2 text-2xl"></i>
                        <input required autocomplete="off" type="text" id="datepicker" name="departure-date" class="pl-10 pr-4 py-3 rounded w-full border" placeholder="{{__('content.select_date')}}">
                    </div>
                
                    <div class="relative flex items-center">
                        <i class="fas fa-user absolute left-2 text-2xl"></i>
                        <input class="pl-10 pr-4 py-3 rounded w-1/2 mr-2 border" type="number" min="1" name="passengers" id="passengers" placeholder="{{__('content.passengers')}}" required>
                        <div class="px-4 py-2 rounded bg-gray-200 w-1/2 space-x-1">
                            <input type="checkbox" name="round-trip" id="round-trip" class="scale-125">
                            <label for="round-trip">@lang('content.round_trip')</label>
                        </div>
                    </div>
                    <button type="submit" class="p-4 rounded bg-amber-500 transition hover:bg-amber-600 text-white text-lg">@lang('content.see_prices')</button>
                </form>
                <div class="text-white font-semibold text-center mt-4 animate-left-hero">
                    @lang('content.need_help') <a href="/contact" class="underline transition hover:text-amber-500">@lang('content.click_here')</a>
                </div>
            </div>
            
            <div class="text-center max-w-96 hidden xl:block animate-top-hero">
                <h1 class="text-2xl lg:text-3xl font-light my-4 text-white">
                    @lang('content.h1')
                </h1>
                <h2 class="inline-block border-t-2 border-amber-500 text-lg lg:text-xl py-2 px-4 uppercase mt-2 text-amber-300">
                    @lang('content.h2')
                </h2>
            </div>
        </div>
</section>
