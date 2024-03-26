<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(){
        return view('student-management.index');
    }

    public function create(Request $request, $id = NULL){
        return view('student-management.student', ['id' => $id]);
    }

    public function profile(){
        return view('student-management.student-profile');
    }
    public function password(){
        return view('student-management.student-password');
    }
}
