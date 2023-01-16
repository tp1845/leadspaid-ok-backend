<?php

namespace App\Http\Middleware;

use Closure;
class RedirectIfNotPublisherAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard)
    {
        if(auth()->guard($guard)->check()){
            $user = auth()->guard($guard)->user();
                if ($user->role === 1 || $user->role === 2 || $user->role === 3) {
                    return $next($request);
                }  else {
                    return redirect()->route('authorization',$guard);
                }
            }
       abort(403);
    }
}
