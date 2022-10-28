<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdvertiser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'advertiser')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('advertiser.dashboard');
        }
        return $next($request);
    }
}
