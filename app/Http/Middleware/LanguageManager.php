<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;



class LanguageManager
{

    public function handle(Request $request, Closure $next): mixed
    {
        if (session()->has('locale')) {

            \App::setLocale(session()->get('locale'));

        }

        return $next($request);
    }
}
