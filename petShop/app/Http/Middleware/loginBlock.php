<?php

namespace App\Http\Middleware;

use Closure;

class loginBlock
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
        User::guest()
        return $next($request);
    }
}
