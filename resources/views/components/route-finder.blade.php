<section class="flex flex-col justify-center align-center text-gray-600 bg-gradient-to-br from-cyan-600 to-cyan-800 mb-4 py-8 px-6">
    
    <form action="/search" method="get" class="container flex flex-col my-6 space-y-4 mx-auto text-lg" id="mapForm">
        <div class="flex flex-col xl:flex-row xl:mx-auto space-y-2 xl:space-y-0 xl:space-x-8">
            <div class="relative flex flex-col w-full">
                <i class="fa-solid fa-location-dot absolute left-2 top-2 text-xl z-30"></i>
                <i class="fa-solid fa-xmark absolute right-3 top-2 text-xl z-30 px-1 cursor-pointer clear-input-button" onclick="clearInput('departure')"></i>
                <input required
                    class="pl-9 pr-4 py-2 rounded w-full xl:w-80 z-20" 
                    type="text" id="departure" name="departure" autocomplete="off" placeholder="Pick-up location" 
                    value="{{ $departureLocationName}}" oninput="getDepartureSuggestions(this.value)"> 
                <div id="departureSuggestions" class="absolute top-10 z-10 w-full pt-2 bg-white border-2"
                    style="display: none;">
                    <ul id="departureSuggestionList"></ul>
                </div>
            </div>
            
            <div class="relative flex flex-col w-full">
                <i class="fa-solid fa-location-crosshairs absolute left-2 top-2 text-xl"></i>
                <i class="fa-solid fa-xmark absolute right-3 top-2 text-xl px-1 cursor-pointer clear-input-button" onclick="clearInput('destination')"></i>
                <input required
                    class="pl-9 pr-4 py-2 rounded w-full xl:w-80" 
                    type="text" id="destination" name="destination" autocomplete="off" placeholder="Destination" 
                    value="{{ $destinationLocationName }}" oninput="getDestinationSuggestions(departure.value, this.value)">
                <div id="destinationSuggestions" class="absolute top-10 z-10 w-full pt-2 bg-white border-2" style="display: none;">
                    <ul id="destinationSuggestionList"></ul>
                </div>
            </div>
    
            <div class="relative flex flex-col w-full">
                <i class="fa-regular fa-calendar-days absolute left-2 top-2 text-xl"></i>
                <input required
                    type="text" id="datepicker" name="departure-date" class="pl-9 pr-4 py-2 rounded w-full xl:w-80" placeholder="Select a date" value="{{ $departureDate }}">
            </div>
        </div>
    
        <hr>
    
        <div class="relative md:flex md:mx-auto">
            <div class="flex items-center w-full md:w-auto">
                <i class="fas fa-user absolute left-2 text-xl"></i>
                <input class="pl-9 pr-4 py-2 rounded md:mr-8 w-full md:w-80" required
                    type="number" name="passengers" id="passengers" placeholder="Passengers (Including Children)" 
                    value="{{ old('passengers') ? old('passengers') : $passengers }}">
            </div>
            <div class="px-4 py-2 mt-2 md:mt-0 rounded bg-gray-200 space-x-1 md:mr-8">
                <input type="checkbox" name="round-trip" id="round-trip" class="scale-125" {{ $roundTrip ? 'checked' : '' }}>
                <label for="round-trip">Round trip</label>
            </div>
            <button type="submit" class="px-4 py-2 mt-4 md:mt-0 rounded bg-amber-500 transition hover:bg-amber-600 text-white text-lg">SEE TRANSFERS</button>
        </div>
    </form>    
            
</section>