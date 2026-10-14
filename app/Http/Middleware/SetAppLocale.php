<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route()->parameter('locale');

        // Set the application locale
        App::setLocale($locale);

        // Pass the locale to the request attributes
        $request->attributes->set('locale', $locale);

        return $next($request);
    }
}
