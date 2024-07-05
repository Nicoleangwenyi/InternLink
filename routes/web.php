<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployerController;


Route::get('/', function () {
    return view('home');
})->name('home');

// About Us
Route::get('/aboutUs', [DashboardController::class, 'about'])->name('about');

// Contact Us
Route::get('/ContactUs', [DashboardController::class, 'contact'])->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


});

Route::middleware(['auth'])->group(function(){

     //Admin Routes
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/manageusers', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');

    Route::get('/admin/manageusers', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    
    Route::get('/admin/createuser', [AdminController::class, 'createUser'])->name('admin.createUser');

    Route::post('/admin/createuser', [AdminController::class, 'storeUser'])->name('admin.storeUser');

    Route::get('/admin/edituser/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');

    Route::post('/admin/edituser/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');

    Route::delete('/admin/deleteUser/{user}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');;


    //Student Routes
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

    //Employer Routes
    Route::get('/employer/dashboard', [EmployerController::class, 'index'])->name('employer.dashboard');

    Route::get('/employer/postInternships', [EmployerController::class, 'internships'])->name('employer.postInternships');

});

