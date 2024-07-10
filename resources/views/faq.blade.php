@extends('layout')

@section('meta')
<meta name="description" content="Frequently Asked Questions - 
What happens in the case of a delay?
Why is using a private transfer a good service?
Where will the Driver wait at the airport?
What does the price include?
What vehicles are available?
Can I cancel my reservation?">
<link rel="canonical" href="{{ url()->current() }}">
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
    {
        "@type": "Question",
        "name": "What happens in the case of a delay?",
        "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our drivers monitor inbound flights for any schedule changes, ensuring awareness of delays. In most cases, we can still provide the transfer service. If you anticipate a delay from the departure destination, please contact us so we can make necessary adjustments."
        }
    },
    {
        "@type": "Question",
        "name": "Why is using a private transfer a good service?",
        "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our private transfers are affordable, convenient, reliable, and safe. We ensure a quick, hassle-free journey, providing local knowledge and tips. All our drivers speak English and are happy to assist you in any way."
        }
    },
    {
        "@type": "Question",
        "name": "Where will the driver wait at the airport?",
        "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our driver will greet you in the airport arrivals hall, holding a sign with your name on it, unless otherwise agreed. This makes it easy for you to locate us!"
        }
    },
    {
        "@type": "Question",
        "name": "What does the price include?",
        "acceptedAnswer": {
        "@type": "Answer",
        "text": "Your transfer includes all associated costs, such as freeway tolls and fuel. The price also covers the transport of your luggage. The quoted price includes all costs to avoid any surprise expenses."
        }
    },
    {
        "@type": "Question",
        "name": "What vehicles are available?",
        "acceptedAnswer": {
        "@type": "Answer",
        "text": "We offer three classes of modern, well-equipped vehicles: standard cars (up to 4 passengers), minivans (up to 8 passengers), and minibuses (up to 16 passengers). If you have specific requests or need a different vehicle type, we can accommodate your needs."
        }
    },
    {
        "@type": "Question",
        "name": "Can I cancel my reservation?",
        "acceptedAnswer": {
        "@type": "Answer",
        "text": "If you need to cancel or modify your reservation, please contact us immediately, and we'll do our best to accommodate your changes. While we strive to assist, short notice changes may pose challenges. Insufficient notice may result in charges for part or the full amount of your booking."
        }
    }
    ]
}
</script>
<title>FAQ | Globus Transfers Croatia</title>
@endsection

@section('content')


@php
    $breadcrumbs = [
    ['title' => 'HOME', 'url' => '/'],
    ['title' => "FAQ - Croatia Transfers FAQ's", 'url' => '']
];
@endphp

@section('content')

<section class="bg-gradient-to-br from-cyan-600 to-cyan-800 text-white">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex space-y-1 md:space-y-0 flex-col md:flex-row md:justify-between md:items-center py-10">
        <h1 class="text-2xl">FAQ - Croatia Transfers FAQ's</h1>
        @include('partials.breadcrumbs')
    </div>
</section>
<section class="mx-auto container px-6 md:px-4 lg:px-20 text-gray-600 my-8">
    @include('partials.faq')
</section>
<section class="mx-auto container px-6 md:px-4 lg:px-20 text-gray-600 mb-12">
    @include('partials.contact-aside')
</section>

@endsection