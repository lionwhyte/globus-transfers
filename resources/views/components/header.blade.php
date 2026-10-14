<header class="text-gray-600 taxi-squares-border" id="top">
    <div class="mx-auto container pb-4 px-6 md:px-4 lg:px-20 flex justify-between bg-white relative z-[100]" id="header-section">
        <div class="logo flex items-center">
            <a href="{{ url($locale) }}" aria-label="Globus Transfers Homepage">
                <div>
                    <img src="{{asset('images/globus-transfers-logo.jpg')}}" class="logo w-52 lg:w-64 xl:w-96 pt-8 md:pt-4" alt="Globus Transfers Logo">
                </div>
            </a>
        </div>
        {{-- Navigation Bar --}}
        <nav role="navigation" class="main-nav">
            <div class="hidden lg:flex flex-col items-end space-y-6">
                <div class="space-x-8 py-4" id="top-contact-info-section">
                    <a href="#" class="contact-data space-x-1 transition hover:text-cyan-600 group" aria-label="Call Globus Transfers at +12345789">
                        <span class="icon icon-themeenergy_call"><i class="fa-solid fa-phone duration-300 group-hover:scale-125"></i></span>
                        <span>+12345789</span>
                    </a>
                    <a href="#" class="contact-data space-x-1 transition hover:text-cyan-600 group" aria-label="Email Globus Transfers at someone@mail.com">
                        <span class="icon icon-themeenergy_mail-2"><i class="fa-solid fa-envelope duration-300 group-hover:scale-125"></i></span>
                        <span>someone@mail.com</span>
                    </a>
                    @if ($locale == "en")
                    <a href="{{ url('hr') }}" class="pl-3" aria-label="Croatian language">
                        <span class="underline">HR</span>
                        <img class="inline-block" src="{{asset('images/hr.png')}}" alt="Croatian flag icon" width="25">
                    </a>
                    @else
                    <a href="{{ url('en') }}" class="pl-3" aria-label="English language">
                        <span class="underline">EN</span>
                        <img class="inline-block" src="{{asset('images/gb.png')}}" alt="English flag icon" width="25">
                    </a>
                    @endif
                    
                </div>
                <ul class="nav-list flex space-x-7 py-4">
                    <li>
                        <a href="{{ url($locale) }}" 
                            class="p-1 border-b-2 {{ request()->is($locale) || request()->is('/') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('/') ? 'aria-current="page"' : ''}}>@lang('content.home')
                        </a>
                    </li>
                    <li>
                        <a href="{{ url($locale . '/about-us') }}" 
                            class="p-1 border-b-2 {{ request()->is($locale . '/about-us') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is($locale . '/about-us') ? 'aria-current="page"' : ''}}>@lang('content.about-us')
                        </a>
                    </li>
                    <li>
                        <a href="{{ url($locale . '/destinations/cities') }}" 
                            class="p-1 border-b-2 {{ request()->is($locale . '/destinations/*') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('destinations/cities') ? 'aria-current="page"' : ''}}>@lang('content.destinations')
                        </a>
                    </li>
                    <li>
                        <a href="{{ url($locale . '/faq') }}" 
                            class="p-1 border-b-2 {{ request()->is($locale . '/faq') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('faq') ? 'aria-current="page"' : ''}}>@lang('content.faq')
                        </a>
                    </li>
                    <li>
                        <a href="{{ url($locale . '/contact') }}" 
                            class="p-1 border-b-2 {{ request()->is($locale . '/contact') ? 'border-cyan-600' : 'transition hover:border-cyan-600' }}" 
                            {{ request()->is('contact') ? 'aria-current="page"' : ''}}>@lang('content.contact')
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center h-full inline-block lg:hidden">
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
        <nav class="w-full px-2 bg-white lg:hidden h-0 overflow-hidden absolute left-0 top-[89px] shadow-xl" id="mobile-nav">
            <ul class="text-white mt-2">
                <li>
                    <a href="{{ url($locale . '/') }}"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500 {{ request()->is($locale . '/') ? 'aria-current="page"' : '' }}">HOME
                    </a>   
                </li>
                <li>
                    <a href="{{ url($locale . '/about-us') }}"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500 {{ request()->is($locale . '/about-us') ? 'aria-current="page"' : '' }}">ABOUT US
                    </a>   
                </li>
                <li>
                    <a href="{{ url($locale . '/destinations/cities') }}"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500 {{ request()->is($locale . '/destinations/*') ? 'aria-current="page"' : '' }}">DESTINATIONS
                    </a>   
                </li>
                <li>
                    <a href="{{ url($locale . '/faq') }}"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500 {{ request()->is($locale . '/faq') ? 'aria-current="page"' : '' }}">FAQ
                    </a>   
                </li>
                <li>
                    <a href="{{ url($locale . '/contact') }}"
                        class="block mb-0.5 py-1 px-4 bg-cyan-500 {{ request()->is($locale . '/contact') ? 'aria-current="page"' : '' }}">CONTACT
                    </a>   
                </li>
                <li>
                    <address>
                        <a href="#"
                            class="block mb-0.5 py-1 px-4 bg-cyan-700">
                            <span class="icon icon-themeenergy_call"><i class="fa-solid fa-phone"></i></span>
                            <span>+123456789</span>
                        </a>
                    </address>
                </li>
                <li>
                    <address>
                        <a href="#"
                            class="block mb-0.5 py-1 px-4 bg-cyan-700">
                            <span class="icon icon-themeenergy_mail-2"><i class="fa-solid fa-envelope"></i></span>
                            <span>someone@mail.com</span>
                        </a>
                    </address>
                </li>
                <li>
                    @if ($locale == "en")
                    <a href="{{ url('hr') }}" class="pl-3 text-gray-600" aria-label="Croatian language">
                        <span class="underline">HR</span>
                        <img class="inline-block" src="{{asset('images/hr.png')}}" alt="Croatian flag icon" width="25">
                    </a>
                    @else
                    <a href="{{ url('en') }}" class="pl-3 text-gray-600" aria-label="English language">
                        <span class="underline">EN</span>
                        <img class="inline-block" src="{{asset('images/gb.png')}}" alt="English flag icon" width="25">
                    </a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</header>