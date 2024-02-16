<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\InstituteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function(){
    return redirect('sign-up');
});

Route::middleware('guest:institute')->group(function(){  
    Route::get('sign-up', [AuthController::class, 'signUp'])->name('sign-up');
    Route::get('sign-in', [AuthController::class, 'signIn'])->name('sign-in');
});

Route::middleware('auth')->group(function(){
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('institute/profile', [InstituteController::class,'profile'])->name('institute.profile');
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});
