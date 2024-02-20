<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signUp(){
        return view('auth.institute.sign-up');
    }

    public function signIn(){
        return view('auth.institute.sign-in');
    }

    public function logout(){
        if (Auth::guard('institute')->check()) {
            Auth::guard('institute')->logout();
            return redirect()->route('sign-in');
        }
    }
}
