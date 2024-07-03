<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
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

    // Admin Routes
     Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

        // Users
        // Route::resource('users', UsersController::class);
        // Route::get('/Users/Admins', [AdminController::class, 'data'])->name('users.Admins');
        // Route::get('/Users/Students', [StudentController::class, 'data'])->name('users.Students');
        // Route::get('/Users/Employers', [EmployerController::class, 'data'])->name('users.Employers');
        // Route::get('/Users/verification', [UsersController::class, 'verification'])->name('users.verification');
    });

    // Employer Routes
    Route::middleware(['auth', 'isEmployer'])->group(function () {
        Route::get('/employer/dashboard', [EmployerController::class, 'index'])->name('employer.dashboard');
        Route::get('/employer/profile', [EmployerController::class, 'profile'])->name('employer.profile');
    });

    // Student Routes
    Route::middleware(['auth', 'isStudent'])->group(function () {
        Route::get('student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
        Route::get('student/profile', [StudentController::class, 'profile'])->name('student.profile');
    });

    // Profile and Dashboard Routes
    // Route::resource('profile', ProfileController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
