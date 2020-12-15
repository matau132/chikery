<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
use Closure;

class CustomerAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
    public function handle($request, Closure $next, $guard = 'customer')
    {
        if(!Auth::guard($guard)->check()){
            return redirect()->route('user.login');
        }

        return $next($request);
    }
}
