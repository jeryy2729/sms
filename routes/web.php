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
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ Protect everything inside this group
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UsersController::class);
    Route::resource('subjects', SubjectsController::class);
    Route::resource('classes', ClassesController::class);
        Route::resource('students', StudentsController::class);

    Route::resource('sections', SectionsController::class);
    Route::resource('courses', CoursesController::class);
    Route::resource('teachers', TeachersController::class);
    Route::resource('enrollments', EnrollmentsController::class);
    Route::get('enrollments/promote/form', [EnrollmentsController::class, 'promoteForm'])->name('enrollments.promote.form');
    Route::post('enrollments/promote', [EnrollmentsController::class, 'promote'])->name('enrollments.promote');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::resource('students', StudentsController::class);
        Route::resource('attendances', AttendancesController::class, );
    Route::post('/load-students', [AttendancesController::class, 'loadStudents'])->name('attendance.load');
// Route::get('/get-students/{class}', [AttendancesController::class, 'getStudents']);
Route::get('/get-students/{class}/{section}', [AttendancesController::class, 'getStudents']);
// Route::get('/attendances/class/{class}', [AttendancesController::class, 'showClassAttendance'])
//     ->name('attendances.class');
// Show attendance sheet for a specific class + section
Route::get('/attendances/class/{class}/{section}', [AttendancesController::class, 'showClassAttendance'])
    ->name('attendances.class');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// Student-only routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/profile', [StudentsController::class, 'myProfile'])->name('student.profile');
});

// Auth routes
Auth::routes();
