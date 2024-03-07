<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\LactureTiming;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Models\ClassRoom;
use App\Models\Subject;
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

Route::get('verify-email', [AuthController::class, 'verifyEmail'])->name('email-verify');
Route::middleware('auth')->group(function(){
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('institute/profile', [InstituteController::class,'profile'])->name('institute.profile');
    Route::get('institute/password', [InstituteController::class,'password'])->name('institute.password');
    Route::get('institute/user-management/{id?}', [UserController::class,'create'])->name('user-management.user');
    Route::get('institute/user-management-index', [UserController::class,'show'])->name('user-management.index');
    Route::get('institute/user-management/{id}/assign-subject', [UserController::class, 'createSubject'])->name('assign-user-subject.index');
    Route::get('institute/role-permission',[RoleController::class,'create'])->name('role-management.index');
    Route::get('institute/class-manaegement',[ClassRoomController::class,'create'])->name('class-management.index');
    Route::get('institute/class-management/{id}/assign-subject', [ClassRoomController::class, 'createSubject'])->name('assign-subject.index');
    Route::get('institute/batch-manaegement',[BatchController::class,'create'])->name('batch-management.index');
    Route::get('institute/student-manaegement',[StudentController::class,'show'])->name('student-management.index');
    Route::get('institute/student-manaegement-create/{id?}',[StudentController::class,'create'])->name('student-management.student');
    Route::get('institute/subject-management',[SubjectController::class,'create'])->name('subject-management.index');
    Route::get('institute/lacture-management',[LactureTiming::class,'show'])->name('lacture-management.index');
    Route::get('institute/lacture-management/create-lacture/{id?}',[LactureTiming::class,'create'])->name('lacture-management.create');
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});
