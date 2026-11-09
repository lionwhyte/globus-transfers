<!DOCTYPE html>
@php
    $locale = app()->getLocale();
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Payment Canceled</title>
    <!-- Add any additional styles or scripts if needed -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-md shadow-md text-center text-gray-500">
        <div class="mb-8">
            <img src="{{asset('images/globus-transfers-logo.jpg')}}" class="logo w-80 mx-auto" alt="Globus Transfers Logo">
        </div>
        <h1 class="text-2xl font-semibold text-red-600 mb-4">@lang('content.payment_cancel_hdg')</h1>
        <p>
            @lang('content.payment_cancel_para')
        </p>
        <address class="my-2 text-lg">
            <a href="mailto:luka.predovan01@gmail.com" class="contact-data space-x-1 transition hover:text-cyan-600">
                <span>luka.predovan01@gmail.com</span>
            </a>
        </address>
        <span>@lang('content.payment_cancel_para2')</span>
        <address class="mt-2 mb-4 text-lg">
            <a href="tel:+385955261413" class="contact-data space-x-1 transition hover:text-cyan-600">
                <span>+385 95 526 1413.</span>
            </a>
        </address>
        
        <!-- You can add more content or customization here if needed -->
        <a href="{{ '/' . $locale }}" class="text-indigo-700 underline text-lg">@lang('content.error_back')</a>
    </div>
</body>
</html>