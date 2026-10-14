<!DOCTYPE html>
@php
    $locale = app()->getLocale();
@endphp
<html lang="{{ $locale }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('favicon.ico')}}" title="Globus Transfers" />
    <meta property="og:image" content="{{ asset('images/logo-facebook.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3.1.1/build/cookieconsent.min.css" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/moment"></script> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @if(request()->is('search') || request()->routeIs('destinations.show'))
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqRlLaoJ3wLxYVElQwCQCqFelRvievnO8&callback=initMap"></script>
    @endif
    @yield('meta')
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
    const locale = "{{ $locale }}";
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {"background": "#1d1b1b"},
                "button": {"background": "#f8e71c"}
            },
            "content": {
                "message": "We use cookies to improve your experience. By continuing to use this site, you agree to our Cookie Policy",
                "dismiss": "Accept", // Customize the button text for acceptance
                "link": "Read more",
                "href": "/" + locale + "/cookie-policy", // Link to your cookie policy page
            },
            "type": "opt-in", // Add this line to enable user choice
            "elements": {
                "dismiss": "<button aria-label=\"dismiss cookie message\" tabindex=\"0\" class=\"cc-btn cc-dismiss\">Accept</button>",
                "deny": "<button aria-label=\"deny cookies\" tabindex=\"0\" class=\"cc-btn cc-deny\">Decline</button>",
                "allow": "<button aria-label=\"allow cookies\" tabindex=\"0\" class=\"cc-btn cc-allow\">Accept</button>"
            },
            "cookie": {
                "domain": location.hostname,
                "path": "/",
                "secure": true,
                "sameSite": "None"
            },
            "onInitialise": function(status) {
                if (status === "allow") {
                    loadGoogleAnalytics();
                }
            },
            "onStatusChange": function(status) {
                if (status === "allow") {
                    loadGoogleAnalytics();
                }
            }
        });

        function loadGoogleAnalytics() {
            // Load Google Analytics script asynchronously if user accepts cookies
            var gtagScript = document.createElement('script');
            gtagScript.src = 'https://www.googletagmanager.com/gtag/js?id=G-P7YNNLF8BH';
            gtagScript.async = true;
            document.head.appendChild(gtagScript);

            gtagScript.onload = function() {
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'G-P7YNNLF8BH');
            }
        }
    });
</script>

    @if(request()->is("/") || request()->is($locale) || request()->is($locale . '/search') || Route::is('reservation.create'))
    <script src="{{ asset('js/fetch.js') }}"></script>
    @endif
    @if(Route::is('reservation.create') || request()->is($locale . '/contact'))
    <script src="{{ asset('js/submit.js') }}"></script>
    @endif
    @include('components.flash-message') 
</body>

</html>