<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function create(Request $request, $id = NULL){
        return view('class-management.index', ['id' => $id]);  
    }

    public function createSubject(Request $request, $id = NULL){
        return view('class-management.assign-subject', ['id' => $id]);
    }
}
