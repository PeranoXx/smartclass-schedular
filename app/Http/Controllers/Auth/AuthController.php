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
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect()->route('faculty-sign-in');
        }
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
            return redirect()->route('student-sign-in');
        }
    }

    public function verifyEmail(){
        return view('verify');
    }

    public function facultySignin(){
        return view('auth.institute.faculty-sign-in');
    }

    public function studentSignin(){
        return view('auth.institute.student-sign-in');
    }
}
