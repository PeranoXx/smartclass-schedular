<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LactureTiming extends Controller
{
    public function show(){
        return view('lacture-management.index');
    }

    public function create(Request $request, $id = NULL){
        return view('lacture-management.create', ['id' => $id]);
    }
}
