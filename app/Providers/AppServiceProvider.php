<?php

// app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Set the application locale based on the request
        $this->app->bind('locale', function () {
            // Replace with your logic to determine the locale
            $locale = request()->segment(1);

            // Check if the locale is supported
            $supportedLocales = ['en', 'hr']; // Add more locales if needed
            if (!in_array($locale, $supportedLocales)) {
                // Default to 'en' if the locale is not supported
                $locale = 'en';
            }

            return $locale;
        });

        // Set the application locale based on the resolved 'locale' value
        App::setLocale($this->app->make('locale'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

