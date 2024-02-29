<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(){
        return view('student-management.index');
    }

    public function create(){
        return view('student-management.student');
    }
}
