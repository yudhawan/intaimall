<?php

namespace App\Http\Middleware;

use Closure;

class Admn
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
        if(auth()->guard('mimin')){
            return redirect('administratorim');
        }
        return $next($request);
    }
}
