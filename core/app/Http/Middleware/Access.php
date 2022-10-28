<?php

namespace App\Http\Middleware;

use Closure;

class Access
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
        if(auth()->guard('admin')->user()->access == null || in_array(\Route::currentRouteName(),auth()->guard('admin')->user()->access)){
            return $next($request);
        }
        abort(403);
    }
}
