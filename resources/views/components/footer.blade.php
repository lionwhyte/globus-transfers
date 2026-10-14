

<footer class="bg-gradient-to-br from-slate-600 to-slate-800 text-gray-300 py-8 mt-20">
    <h2 class="text-2xl text-red-600 text-center">@lang('content.disclaimer')</h2>
    <div class="container px-6 md:px-4 lg:px-20 mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
        <!-- Contact Information -->
        <div class="mb-8 space-y-2">
            <h2 class="text-xl font-semibold mb-4 text-sky-400">@lang('content.footer_hdg1')</h2>
            <p>@lang('content.footer_contact'):</p>
            <p>
                <a href="#" class="contact-data space-x-1 transition hover:text-cyan-600" aria-label="Call Globus Transfers at +123456789">
                    <span class="icon icon-themeenergy_call"><i class="fa-solid fa-phone"></i></span>
                    <span>+123456789</span>
                </a>
            </p>
            <p>
                <a href="#" class="contact-data space-x-1 transition hover:text-cyan-600" aria-label="Email Globus Transfers at someone@mail.com">
                    <span class="icon icon-themeenergy_mail-2"><i class="fa-solid fa-envelope"></i></span>
                    <span>someone@mail.com</span>
                </a>
            </p>
        </div>
        <!-- Follow Us & Secure Payment -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4 text-sky-400">@lang('content.footer_hdg2')</h2>
            <p>@lang('content.footer_social')</p>
            <div class="flex space-x-4 mt-2">
                <!-- Add your social media icons and links here -->
                <a href="#" aria-label="Follow Globus Transfers on Facebook" class="text-3xl  hover:text-white transition duration-300">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" aria-label="Follow Globus Transfers on Instagram" class="text-3xl  hover:text-white transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <p class=" mt-4">@lang('content.footer_payments')</p>
            <p class=" mt-2">
                <img class="w-12 inline" src="{{asset('images/american-express.jpg')}}" alt="American Express"> | 
                <img class="w-12 inline" src="{{asset('images/visa.gif')}}" alt="Visa"> | 
                <img class="w-12 inline" src="{{asset('images/master-card.gif')}}" alt="Master Card"> | 
                <img class="w-12 inline" src="{{asset('images/maestro.gif')}}" alt="Maestro">
            </p>
        </div>
        <!-- About Us -->
        <div class="mb-8 md:col-span-2">
            <h2 class="text-xl font-semibold mb-4 text-sky-400">@lang('content.footer_hdg3')</h2>
            @lang('content.footer_about')
        </div>
    </div>
    <!-- Copyright -->
    <div class="container px-6 md:px-4 lg:px-20 mx-auto text-center mt-8 px-4 xl:flex xl:justify-between">
        <p>@lang('content.footer_copyright')</p>
        <div>
            <a class="transition hover:text-cyan-600" href={{ "/" . $locale . "/cookie-policy" }}>@lang('content.footer_cookie')</a> | 
            <a class="transition hover:text-cyan-600" href={{ "/" . $locale . "/terms-and-conditions" }}>@lang('content.footer_terms')</a> | 
            <a class="transition hover:text-cyan-600" href={{ "/" . $locale . "/privacy-policy" }}>@lang('content.footer_privacy')</a>
        </div>
    </div>
</footer>