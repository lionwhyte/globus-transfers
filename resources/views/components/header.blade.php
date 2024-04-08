<header class="text-gray-600 taxi-squares-border" id="top">
    <div class="mx-auto container pb-4 px-6 md:px-4 lg:px-20 flex justify-between bg-white relative z-50" id="header-section">
        <div class="logo flex items-center">
            <a href="/" aria-label="Globus Transfers Homepage">
                <div>
                    <img src="{{asset('images/globus-transfers-logo.jpg')}}" class="logo w-52 lg:w-64 xl:w-96 pt-8 md:pt-4" alt="Globus Transfers Logo">
                </div>
            </a>
        </div>
        {{-- Navigation Bar --}}
        <nav role="navigation" class="main-nav">
            <div class="hidden md:flex flex-col items-end space-y-6">
                <div class="space-x-8 py-4" id="top-contact-info-section">
                    <a href="tel:+385955261413" class="contact-data space-x-1 transition hover:text-cyan-600 group" aria-label="Call Globus Transfers at +385 95 526 1413">
                        <span class="icon icon-themeenergy_call"><i class="fa-solid fa-phone duration-300 group-hover:scale-125"></i></span>
                        <span>+385 95 526 1413</span>
                    </a>
                    <a href="mailto:luka.predovan01@gmail.com" class="contact-data space-x-1 transition hover:text-cyan-600 group" aria-label="Email Globus Transfers at luka.predovan01@gmail.com">
                        <span class="icon icon-themeenergy_mail-2"><i class="fa-solid fa-envelope duration-300 group-hover:scale-125"></i></span>
                        <span>luka.predovan01@gmail.com</span>
                    </a>
                </div>
                <ul class="nav-list flex space-x-8 py-4">
                    <li>
                        <a href="/" 
                            class="p-1 border-b-2 {{ request()->is('/') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('/') ? 'aria-current="page"' : ''}}>HOME
                        </a>
                    </li>
                    <li>
                        <a href="/about-us" 
                            class="p-1 border-b-2 {{ request()->is('about-us') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('about-us') ? 'aria-current="page"' : ''}}>ABOUT US
                        </a>
                    </li>
                    <li>
                        <a href="/destinations/cities" 
                            class="p-1 border-b-2 {{ request()->is('destinations/*') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('destinations/cities') ? 'aria-current="page"' : ''}}>DESTINATIONS
                        </a>
                    </li>
                    <li>
                        <a href="/faq" 
                            class="p-1 border-b-2 {{ request()->is('faq') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('faq') ? 'aria-current="page"' : ''}}>FAQ
                        </a>
                    </li>
                    <li>
                        <a href="/contact" 
                            class="p-1 border-b-2 {{ request()->is('contact') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('contact') ? 'aria-current="page"' : ''}}>CONTACT
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center h-full inline-block md:hidden">
                {{-- HAMBURGER --}}
                <button type="button"
                    class="relative py-5 px-6 w-8 h-8 mt-8"
                    id="hamburger">
                    <span
                        class="absolute left-[50%] translate-x-[-50%] top-[25%] translate-y-[-50%] block w-8 h-0.5 rounded bg-cyan-600"></span>
                    <span
                        class="absolute left-[50%] translate-x-[-50%] top-[50%] translate-y-[-50%] block w-8 h-0.5 rounded bg-cyan-600"></span>
                    <span
                    class="absolute left-[50%] translate-x-[-50%] top-[75%] translate-y-[-50%] block w-8 h-0.5 rounded bg-cyan-600"></span>
                </button>
            </div>
        </nav>

        {{-- Mobile nav --}}
        <nav class="w-full px-2 bg-white md:hidden h-0 overflow-hidden absolute left-0 top-[89px] z-50 shadow-xl" id="mobile-nav">
            <ul class="text-white mt-2">
                <li>
                    <a href="/"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500"
                        {{ request()->is('/') ? 'aria-current="page"' : ''}}>HOME
                    </a>   
                </li>
                <li>
                    <a href="/about-us"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500"
                        {{ request()->is('about-us') ? 'aria-current="page"' : ''}}>ABOUT US
                    </a>   
                </li>
                <li>
                    <a href="/destinations/cities"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500"
                        {{ request()->is('destinations/cities') ? 'aria-current="page"' : ''}}>DESTINATIONS
                    </a>   
                </li>
                <li>
                    <a href="/faq"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500"
                        {{ request()->is('faq') ? 'aria-current="page"' : ''}}>FAQ
                    </a>   
                </li>
                <li>
                    <a href="/contact"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500"
                        {{ request()->is('contact') ? 'aria-current="page"' : ''}}>CONTACT
                    </a>   
                </li>
                <li>
                    <address>
                        <a href="tel:+385955261413"
                            class="block mb-0.5 py-1 px-4 bg-cyan-700">
                            <span class="icon icon-themeenergy_call"><i class="fa-solid fa-phone"></i></span>
                            <span>+385 99 387 5710</span>
                        </a>
                    </address>
                </li>
                <li>
                    <address>
                        <a href="mailto:luka.predovan01@gmail.com"
                            class="block mb-0.5 py-1 px-4 bg-cyan-700">
                            <span class="icon icon-themeenergy_mail-2"><i class="fa-solid fa-envelope"></i></span>
                            <span>info@globustransfers.com</span>
                        </a>
                    </address>
                </li>
            </ul>
        </nav>
    </div>
    

    
</header>