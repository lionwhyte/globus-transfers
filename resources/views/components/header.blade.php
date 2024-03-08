<header class="text-gray-600 taxi-squares-border pb-6" id="top">
    <div class="mx-auto container px-6 md:px-4 lg:px-20 flex justify-between">
        <div class="logo">
            <a href="/">
                <div>
                    <img src="{{asset('images/globus_test_logo.jpg')}}" class="logo w-24 md:w-32 mx-auto" alt="Globus Transfers Logo">
                    <p class="mt-[-1rem] font-semibold text-gray-600"><span class="lg:text-2xl">GLOBUS </span><span>Transfers</span></p>
                </div>
            </a>
        </div>
        {{-- Navigation Bar --}}
        <nav role="navigation" class="main-nav">
            <div class="hidden md:flex flex-col items-end space-y-6">
                <div class="topbar-links space-x-8 py-4">
                    <a href="tel:+385955261413" class="contact-data space-x-1 transition hover:text-cyan-600">
                        <span class="icon icon-themeenergy_call"><i class="fa-solid fa-phone"></i></span>
                        <span>+385 95 526 1413</span>
                    </a>
                    <a href="mailto:luka.predovan01@gmail.com" class="contact-data space-x-1 transition hover:text-cyan-600">
                        <span class="icon icon-themeenergy_mail-2"><i class="fa-solid fa-envelope"></i></span>
                        <span>luka.predovan01@gmail.com</span>
                    </a>
                </div>
                <ul class="nav-list flex space-x-8 py-4">
                    <li><a href="/" class="p-1 border-b-2 {{ request()->is('/') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}">HOME</a></li>
                    <li><a href="/about-us" class="p-1 border-b-2 {{ request()->is('about-us') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}">ABOUT US</a></li>
                    <li><a href="/destinations/cities" class="p-1 border-b-2 {{ request()->is('destinations/*') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}">DESTINATIONS</a></li>
                    <li><a href="/faq" class="p-1 border-b-2 {{ request()->is('faq') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}">FAQ</a></li>
                    <li><a href="/contact" class="p-1 border-b-2 {{ request()->is('contact') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}">CONTACT</a></li>
                </ul>
            </div>
            <div class="flex items-center h-full">
                {{-- HAMBURGER --}}
                <button type="button"
                    class="relative py-5 px-6 w-8 h-8 mt-4 inline-block md:hidden bg-cyan-600 rounded focus:outline-none"
                    id="hamburger">
                    <span
                        class="absolute left-[50%] translate-x-[-50%] top-[25%] translate-y-[-50%] block w-6 h-0.5 rounded bg-white"></span>
                    <span
                        class="absolute left-[50%] translate-x-[-50%] top-[50%] translate-y-[-50%] block w-6 h-0.5 rounded bg-white"></span>
                    <span
                    class="absolute left-[50%] translate-x-[-50%] top-[75%] translate-y-[-50%] block w-6 h-0.5 rounded bg-white"></span>
                </button>
            </div>
        </nav>
    </div>
    

    {{-- Mobile nav --}}
    <nav class="container mx-auto px-4 md:hidden h-0 mt-0 mb-4 overflow-hidden" id="mobile-nav">
        <ul class="text-white">
            <li>
                <a href="/"
                    class="block mb-0.5 py-1 px-4 bg-cyan-500">HOME</a>
            </li>
            <li>
                <a href="/about-us"
                    class="block mb-0.5 py-1 px-4 bg-cyan-500">ABOUT US</a>
            </li>
            <li>
                <a href="/destinations/cities"
                    class="block mb-0.5 py-1 px-4 bg-cyan-500">DESTINATIONS</a>
            </li>
            <li>
                <a href="/faq"
                    class="block mb-0.5 py-1 px-4 bg-cyan-500">FAQ</a>
            </li>
            <li>
                <a href="/contact"
                    class="block mb-0.5 py-1 px-4 bg-cyan-500">CONTACT</a>
            </li>
            <li>
                <address>
                    <a href="/blog/dizalica-topline"
                        class="block mb-0.5 py-1 px-4 bg-cyan-700">
                        <span class="icon icon-themeenergy_call"><i class="fa-solid fa-phone"></i></span>
                        <span>+385 99 387 5710</span>
                    </a>
                </address>
            </li>
            <li>
                <address>
                    <a href="/"
                        class="block mb-0.5 py-1 px-4 bg-cyan-700">
                        <span class="icon icon-themeenergy_mail-2"><i class="fa-solid fa-envelope"></i></span>
                        <span>info@globustransfers.com</span>
                    </a>
                </address>
            </li>
        </ul>
    </nav>
</header>