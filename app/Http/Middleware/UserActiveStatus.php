<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserActiveStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user=false;
        
        if (auth()->user()->active) {
            return $next($request);
        }else{
            abort(404);
        }
    }
}
