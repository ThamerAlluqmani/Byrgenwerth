<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Request;
use Illuminate\Support\Facades\App;


class ChangeLang
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('locale')) {
            app()->setLocale(session('locale'));
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
