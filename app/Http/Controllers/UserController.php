<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request, $id){
        return view('user-management.user', ['id' => $id]);
    }

    public function show(){
        return view('user-management.index'); 
    }
}
