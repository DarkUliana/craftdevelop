<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!Cookie::get('locale')) {

            return $next($request)->withCookie(Cookie::make('locale', 'en'));
        }

        return $next($request);
    }
}
