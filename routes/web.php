<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\Admin\InternshipController;
use App\Http\Controllers\InternshipsController;


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
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/manageusers', [AdminController::class, 'index'])->name('admin.manageUsers');


    // Route to show the create user form
    Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');

    // Route to store a new user
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');

    // Route to show a specific user
    Route::get('admin/{user}', [AdminController::class, 'show'])->name('admin.show');

    // Route to show the edit user form
    Route::get('admin/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit');

    // Route to update a user
    Route::put('admin/{user}', [AdminController::class, 'update'])->name('admin.update');

    // Route to delete a user
    Route::delete('admin/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');

    //Manage Internships routes
    Route::prefix('admin')->group(function () {
        Route::get('/manageInternships', [InternshipController::class, 'index'])->name('admin.manageInternships');
        Route::get('/internships/{id}', [InternshipController::class, 'show'])->name('admin.internships.show');
        Route::get('/internships/create', [InternshipController::class, 'create'])->name('admin.internships.create');
        Route::post('/internships', [InternshipController::class, 'store'])->name('admin.internships.store');
        Route::get('/internships/{id}/edit', [InternshipController::class, 'edit'])->name('admin.internships.edit');
        Route::put('/internships/{id}', [InternshipController::class, 'update'])->name('admin.internships.update');
        Route::delete('/internships/{id}', [InternshipController::class, 'destroy'])->name('admin.internships.destroy');
    });


    //Student Routes
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');

    //Employer Routes
    Route::get('/employer/dashboard', [EmployerController::class, 'index'])->name('employer.dashboard');



    Route::get('internships', [InternshipsController::class, 'index'])->name('internships.index');

    Route::resource('internships', InternshipsController::class)->names([
        'index' => 'internships.index',
        'create' => 'internships.create',
        'store' => 'internships.store',
        'show' => 'internships.show',
        'edit' => 'internships.edit',
        'update' => 'internships.update',
        'destroy' => 'internships.destroy',
    ]);

    
});

