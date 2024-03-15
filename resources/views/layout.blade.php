<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('images/favicon.ico')}}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3.1.1/build/cookieconsent.min.css" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/moment"></script> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @if(request()->is('search') || request()->routeIs('destinations.show'))
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig8jAYR_NW_T5DwHw2j5SWehUI91o-SI&callback=initMap"></script>
    @endif
    <title>GLOBUS TRANSFERS | Passenger Transportation Services</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('components.header')

    {{-- Main Content --}}
    <main id="main-content" class="text-gray-600">
        @yield('content')
    </main>
    @include('components.footer')
    @include('components.back-to-top')

    <script src="{{ asset('js/transitions.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3.1.1/build/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {"background": "#1d1b1b"},
                    "button": {"background": "#f8e71c"}
                },
                "content": {
                    "message": "We use cookies to improve your experience. By continuing to use this site, you agree to our Cookie Policy",
                    "dismiss": "I agree",
                    "link": "Read more",
                    "href": "{{ route('cookie.policy') }}" // Link to your cookie policy page
                }
            });
        });
    </script>

    @if(request()->is('/') || request()->is('search') || Route::is('reservation.create') || request()->is('contact'))
    <script src="{{ asset('js/fetch.js') }}"></script>
    @endif
    @include('components.flash-message') 
</body>

</html>