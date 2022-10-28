<?php

namespace App\Http\Middleware;

use App\GeneralSetting;
use Closure;

class AllowRegistration
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
        if (GeneralSetting::first()->registration == 0) {
            $notify[] = ['error', 'Registration is currently disabled.'];
            return back()->withNotify($notify);
        }
        return $next($request);
    }
}
