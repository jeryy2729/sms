<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\EnrollmentsController;

use App\Http\Controllers\SubjectsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
Route::Resource('users', UsersController::class);
Route::Resource('subjects', SubjectsController::class);
Route::Resource('classes', ClassesController::class);
Route::resource('sections', SectionsController::class);

Route::Resource('courses', CoursesController::class);
Route::Resource('students', StudentsController::class);
Route::Resource('teachers', TeachersController::class);
Route::resource('enrollments', EnrollmentsController::class);
Route::get('enrollments/promote/form', [EnrollmentsController::class, 'promoteForm'])->name('enrollments.promote.form');
Route::post('enrollments/promote', [EnrollmentsController::class, 'promote'])->name('enrollments.promote');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

