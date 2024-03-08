<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Error page 400</title>
    <!-- Add any additional styles or scripts if needed -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-md shadow-md text-center text-gray-500">
        <div class="mb-8">
            <img src="{{asset('images/globus_test_logo.jpg')}}" class="logo w-24 md:w-32 mx-auto" alt="Globus Transfers Logo">
            <p class="mt-[-1rem] font-semibold text-gray-600"><span class="lg:text-2xl">GLOBUS </span><span>Transfers</span></p>
        </div>
        <h1 class="text-2xl font-semibold text-red-600 mb-4">ERROR 400</h1>
        <p class="mb-8">
            Some data is missing. Please perform a new search and make a new reservation. To return to the homepage, click the Back button.
        </p>
        
        <!-- You can add more content or customization here if needed -->
        <a href="{{ route('home') }}" class="text-indigo-700 underline text-lg">Back to Home</a>
    </div>
</body>
</html>