@extends('layout')

@php
$breadcrumbs = [
['title' => 'HOME', 'url' => '/'],
['title' => "Cookie Policy", 'url' => '']
];
@endphp

@section('content')

<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
    <div
        class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">Cookie Policy</h1>
        @include('partials.breadcrumbs')
    </div>
</section>

<div class="mx-auto container px-6 md:px-4 lg:px-20 py-10 mt-10 border rounded space-y-4">
    <h1 class="text-2xl font-semibold mb-6">Cookie Policy</h1>

    <p>Welcome to Globus! This cookie policy is designed to inform you about the use of cookies on our website.</p>

    <h2 class="text-lg font-semibold text-sky-700 mt-6 mb-2">What are Cookies?</h2>
    <p>Cookies are small text files stored on your device that allow us to recognize and remember you. 
        Cookies are essential for the proper functioning of our website and help us improve your experience.</p>

    <h2 class="text-lg font-semibold text-sky-700 mt-6 mb-2">Types of Cookies Used:</h2>
    <ol>
        <li><strong>XSRF-TOKEN:</strong> This cookie is necessary for protection against Cross-Site Request Forgery (CSRF) attacks. 
            It helps ensure the security of your interaction with our website.</li>

        <li><strong>laravel_session:</strong> This cookie manages your session on our website, 
            allowing us to authenticate you and provide a seamless experience as you navigate through our web store.</li>
    </ol>

    <h2 class="text-lg font-semibold text-sky-700 mt-6 mb-2">Managing Cookies:</h2>
    <p>You can manage and delete cookies through your browser settings. 
        However, please note that disabling essential cookies may impact the functionality of our website.</p>
</div>

@endsection