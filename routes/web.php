<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\Admin\InternshipController;
use App\Http\Controllers\InternshipsController;
use App\Http\Controllers\StatisticsController;


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
   
    //route for displaying the charts
    Route::get('admin/statistics', [StatisticsController::class, 'index'])->name('admin.stats');;

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

    Route::patch('admin/suspend/{id}', [AdminController::class, 'suspend'])->name('admin.suspend');
    Route::patch('admin/activate/{id}', [AdminController::class, 'activate'])->name('admin.activate');

    //Manage Internships routes---by the admin
    Route::get('/manageInternships', [InternshipsController::class, 'manageInternships'])->name('admin.manageInternships');
    Route::patch('/internships/{id}/status', [InternshipsController::class, 'updateStatus'])->name('internships.updateStatus');
    Route::get('internships/{internship}/admin/edit',[InternshipsController::class,'edit_admin'])->name('internships.edit.admin');
    Route::patch('internships/{internship}/update',[InternshipsController::class,'update_admin'])->name('internships.update.admin');


    //Student Routes
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/internships', [StudentController::class, 'internships'])->name('internships');
    Route::get('/student/{internship}/apply', [StudentController::class, 'apply'])->name('internships.apply');
    Route::get('/student/{id}/show', [StudentController::class, 'show'])->name('student.show');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');


    //Employer Routes
    Route::get('/employer/dashboard', [EmployerController::class, 'index'])->name('employer.dashboard');
   //routes for getting the applcation s info
   Route::get('/student/applications', [StudentController::class, 'application_info'])->name('applications.info');
   Route::post('/student/applications/{id}/update-status', [StudentController::class, 'updateStatus'])->name('applications.updateStatus');
   Route::get('internships', [InternshipsController::class, 'index'])->name('internships.index');


    Route::get('/student/internship/applications', [InternshipsController::class, 'student_applications'])->name('applications.student');
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

