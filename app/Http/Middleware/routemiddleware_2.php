<?php

namespace App\Http\Middleware;

use Closure;

class routemiddleware_2
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
        echo "hi routemiddleware2";
        return $next($request);
    }
}
