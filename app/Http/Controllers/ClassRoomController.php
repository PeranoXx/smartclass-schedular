<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function create(){
        return view('class-management.index');  
    }
}
