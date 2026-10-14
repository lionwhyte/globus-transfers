@extends('layout')
@php
    $locale = app()->getLocale();
@endphp

@section('meta')
<meta name="{{ __('content.description') }}" 
    content="{{ __('content.reservation_meta') }}">
<title>@lang('content.reservation_title')</title>
@endsection

@section('content')

@include('components.route-finder')

<section class="container px-6 md:px-4 lg:px-20 mx-auto text-gray-600">
    <h2 class="text-2xl mt-8 mb-4">@lang('content.reservation_hdg')</h2>
    <p class="mb-2">
        @lang('content.reservation_para')</p>
</section>



<section class="container px-6 md:px-4 lg:px-20 mx-auto text-gray-600 mb-10">
    @if ($errors->any())
    <div class="alert alert-danger mt-8">
        <ul class="space-y-2">
            @foreach ($errors->all() as $error)
            <li class="border-2 border-red-500 p-4 rounded w-fit"><i class="fa-solid fa-triangle-exclamation"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2 class="text-2xl text-red-600">This is a demo form, not functional</h2>
    <form
        method="POST" action="{{ route('reservation.store', ['locale' => app()->getLocale()]) }}" id="orderForm" class="container mx-auto my-8 p-4 lg:grid lg:grid-cols-10 space-y-6 lg:space-y-0">
        @csrf
        {{-- PODACI KUPCA --}}
        <div class="col-span-6 pr-10">
            <div class="space-y-4">
                <p>
                    <label for="billing_first_name">@lang('content.reservation_label1')<abbr class="required text-red-500"
                            title="Required">*</abbr></label><br><input type="text"
                        class="input-text w-full border-2 p-2 rounded" name="first_name" id="billing_first_name"
                        value="{{old('first_name')}}" autocomplete="given-name">
                </p>
                @error('first_name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p>
                    <label for="billing_last_name">@lang('content.reservation_label2')<abbr class="required text-red-500"
                            title="Required">*</abbr></label><br><input type="text"
                        class="input-text w-full border-2 p-2 roundedborder-2 p-2 rounded" name="last_name"
                        id="billing_last_name" value="{{old('last_name')}}" autocomplete="family-name">
                </p>
                @error('last_name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p id="billing_email_field">
                    <label for="billing_email">@lang('content.reservation_label3')<abbr class="required text-red-500"
                            title="Required">*</abbr></label><br><input type="text"
                        class="input-text w-full border-2 p-2 rounded" name="email" id="billing_email" placeholder=""
                        value="{{old('email')}}" autocomplete="email username">
                </p>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p>
                    <label for="email_confirmation">@lang('content.reservation_label4')<abbr class="required text-red-500"
                            title="Required">*</abbr></label><br><input type="text"
                        class="input-text w-full border-2 p-2 rounded" name="email_confirmation" id="email_confirmation"
                        placeholder="" value="{{old('email_confirmation')}}" autocomplete="email username">
                </p>
                @error('email_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p id="billing_phone_field">
                    <label for="billing_phone">@lang('content.reservation_label5')<abbr
                            class="required text-red-500" title="Required">*</abbr></label><br><input type="tel"
                        class="input-text w-full border-2 p-2 rounded" name="phone" id="billing_phone" placeholder=""
                        value="{{old('phone')}}" autocomplete="tel">
                </p>
                @error('phone')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p>
                    <label for="passengers2">@lang('content.reservation_label6') @if ($vehicle == 'standard')
                        (Max:3)
                        @elseif($vehicle == 'minivan')
                        (Max:8)
                        @elseif($vehicle == 'minibus')
                        (Max:16)
                        @endif
                        <abbr class="required text-red-500" title="Required">*</abbr></label><br><input type="number"
                        class="w-full border-2 p-2 rounded" name="passengers" id="passengers2" placeholder=""
                        value="{{ old('passengers') ? old('passengers') : $passengers }}">
                </p>
                @error('passengers')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <h2 class="text-2xl">@lang('content.reservation_extras')</h2>

                <p>
                    <label for="infant_seat">@lang('content.reservation_label7')</label><br>
                    <input type="number"
                        class="w-full border-2 p-2 rounded" name="infant_seat" id="infant_seat"
                        value="{{old('infant_seat')}}">
                </p>

                <p>
                    <label for="child_seat">@lang('content.reservation_label8')</label><br>
                    <input type="number"
                        class="w-full border-2 p-2 rounded" name="child_seat" id="child_seat"
                        value="{{old('child_seat')}}">
                </p>

                <p>
                    <label for="booster_seat">@lang('content.reservation_label9')</label><br>
                    <input type="number"
                        class="w-full border-2 p-2 rounded" name="booster_seat" id="booster_seat"
                        value="{{old('booster_seat')}}">
                </p>

                <p>
                    <label for="luggage">@lang('content.reservation_label10')</label><br>
                    <input type="number"
                        class="w-full border-2 p-2 rounded" name="luggage" id="luggage" value="{{old('luggage')}}">
                </p>
                @error('luggage')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <h2 class="text-2xl">@lang('content.reservation_details')</h2>

                <p>
                    <label for="date">@lang('content.reservation_label11')
                        <abbr class="required text-red-500" title="Required">*</abbr></label><br><input type="text"
                        class="w-full border-2 p-2 rounded" name="departure-date" id="date"
                        value="{{ $departureDate }}" readonly>
                </p>
                @error('departure-date')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p>
                    <label for="pickup-time">@lang('content.reservation_label12')
                        <abbr class="required text-red-500" title="Required">*</abbr></label><br><input type="time"
                        class="w-full border-2 p-2 rounded" name="pickup-time" id="pickup-time"
                        value="{{old('pickup-time')}}">
                </p>
                @error('pickup-time')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p>
                    <label for="billing_address_1">@lang('content.reservation_label13')<abbr class="required text-red-500"
                            title="Required">*</abbr></label><br><input type="text"
                        class="input-text w-full border-2 p-2 rounded" name="pick_up_address" id="billing_address_1"
                        value="{{old('pick_up_address')}}">
                </p>
                @error('pick_up_address')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p><label for="billing_address_2" class="screen-reader-text">@lang('content.reservation_label14')
                    <abbr class="required text-red-500"
                    title="Required">*</abbr></label><br><input
                        type="text" class="input-text w-full border-2 p-2 rounded" name="destination_address"
                        id="billing_address_2" value="{{old('destination_address')}}"></p>
                @error('destination_address')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <p><label for="flight_number" class="screen-reader-text">@lang('content.reservation_label15')<span
                            class="optional"> ( @lang('content.reservation_optional') )</span></label><br><input type="text"
                        class="input-text w-full border-2 p-2 rounded" name="flight_number" id="flight_number"
                        value="{{old('flight_number')}}"></p>

                <p><label for="order_message">@lang('content.reservation_label16')<span
                            class="optional"> ( @lang('content.reservation_optional') )</span></label><br><textarea name="order_message"
                        class="input-text w-full border-2 p-2 rounded" id="order_message" rows="5" cols="50">{{old('order_message')}}
                </textarea></p>
            </div>
        </div>

        {{-- UVJETI PLAĆANJA --}}
        <div class="col-span-4">
            <div class="sticky top-32">
                <div class="border rounded border-gray-300 p-8">
                    <h3 class="text-xl font-bold text-gray-700">@lang('content.reservation_order')</h3>
                    <div class="p-4 border-2 my-4 rounded">
                        <h5 class="mb-2 font-semibold text-lg">@lang('content.reservation_departure')</h5>
                        <p class="flex justify-between items-center"><span>@lang('content.reservation_from')</span><span>{{ $departureLocationName }}</span></p>
                        <p class="flex justify-between items-center"><span>@lang('content.reservation_to')</span><span>{{ $destinationLocationName }}</span> </p>
                        <p class="flex justify-between items-center"><span>@lang('content.reservation_vehicle')</span><span>{{ strtoupper($vehicle) }}</span></p>
                    </div>

                    <div class="py-2 rounded font-semibold bg-cyan-600 text-white text-center">
                        <p class="text-sm">{{ $roundTrip ? __('content.roundtrip_included') : __('content.oneway_trip') }}</p>
                        <p class="flex justify-center items-center">
                            <span class="text-lg mr-2 mt-1">@lang('content.reservation_total')</span>
                            <span class="text-3xl">{{ $total_price }},00 €</span>
                        </p>
                    </div>


                    @lang('content.reservation_para2')
                    <h4 class="text-lg font-bold mt-8 py-2 text-gray-700 border-t-2">@lang('content.reservation_payments')</h4>
                    <div class="space-y-4 border-b-2 py-4">
                        <div>
                            <input type="radio" class="input-text border-2 p-2 rounded" name="payment_option"
                                id="direct-bank-transfer" value="direct-bank-transfer" @if (old('payment_option')==="direct-bank-transfer" ) checked @endif checked>
                            <label for="direct-bank-transfer" class="font-semibold text-cyan-700">@lang('content.reservation_payment1') <i class="fa-solid fa-building-columns"></i></label>
                            <p class="text-sm ml-6"></p>
                        </div>
                    </div>

                    @error('payment_option')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="text-center mt-10">
                        <button type="submit" id="orderSubmitButton" onclick="submitButtonDisable('orderSubmitButton', 'orderForm')"
                            class="px-4 py-2 mt-4 md:mt-0 w-full rounded bg-amber-500 transition hover:bg-amber-600 text-white text-lg">
                            <span>@lang('content.reservation_book')</span>
                            <span>
                                <div role="status">
                                    <svg aria-hidden="true" id="submissionSpinner" class="hidden inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection