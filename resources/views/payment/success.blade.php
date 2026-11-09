<!DOCTYPE html>
@php
    $locale = app()->getLocale();
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Payment Success</title>
    <!-- Add any additional styles or scripts if needed -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-md shadow-md text-center text-gray-500">
        <div class="mb-8">
            <img src="{{asset('images/globus-transfers-logo.jpg')}}" class="logo w-80 mx-auto" alt="Globus Transfers Logo">
        </div>
        <h1 class="text-3xl font-semibold text-teal-700 mb-4">@lang('content.payment_success_hdg')</h1>
        <p class="mb-4">
            @lang('content.payment_success_para')
            <span class="font-bold">{{ $email }}</span>. @lang('content.payment_success_para2').
        </p>
        <!-- You can add more content or customization here if needed -->
        <a href="{{ '/' . $locale }}" class="text-indigo-700 underline text-lg">@lang('content.error_back')</a>
    </div>
</body>
</html>