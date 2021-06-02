<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard()->check() === false){
            return redirect('/login');
        }

        else if(Auth::user()->hasVerifiedEmail() == false) {
            return redirect('/email/verify');
        }
        return $next($request);
    }
}
