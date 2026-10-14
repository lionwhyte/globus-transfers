<!DOCTYPE html>
@php
    $locale = app()->getLocale();
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@lang('content.error_500_title')</title>
    <!-- Add any additional styles or scripts if needed -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-md shadow-md text-center text-gray-500">
        <div class="mb-8">
            <img src="{{asset('images/globus-transfers-logo.jpg')}}" class="logo w-64 md:w-72 mx-auto" alt="Globus Transfers Logo">
        </div>
        <h1 class="text-2xl font-semibold text-red-600 mb-4">@lang('content.error_500_hdg1')</h1>
        <p class="mb-8">
            @lang('content.error_500_para')
        </p>
        
        <!-- You can add more content or customization here if needed -->
        <a href="{{ '/' . $locale }}" class="text-indigo-700 underline text-lg">@lang('content.error_back')</a>
    </div>
</body>
</html>