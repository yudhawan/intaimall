<?php

namespace App\Http\Middleware;
use Closure;

class Userauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard=null)
    {
        if(auth()->guest()){
            return redirect()->back()->with('modal', true);
        }
        
        return $next($request);
    }
}
