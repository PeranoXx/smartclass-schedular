<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if(Auth::guard('institute')->check()){
            if(empty(authUser()->email_verified_at)){
                return redirect()->route('email-verify');
            }
        }

        if(Auth::guard('web')->check() || Auth::guard('institute')->check() || Auth::guard('student')->check()){
            return $next($request);
        }else{
            return redirect('sign-in');
            // return $next($request);
        }

        // if (!Auth::guard('institute')->check()) {
        //     return redirect('sign-in');
        // }else{
        //     return $next($request);
        // }

        // if (!Auth::guard('student')->check()) {
        //     dd('here');
        //     return redirect('student-sign-in');
        // }else{
        //     dd('helloo');
        //     return $next($request);
        // }
    }
}
