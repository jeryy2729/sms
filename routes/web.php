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
use App\Http\Controllers\MarksController;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

// List all addresses
Route::get('addresses', [AddressesController::class, 'index'])->name('addresses.index');

// Create address form for a specific user
Route::get('addresses/create/{type}/{userId}', [AddressesController::class, 'create'])->name('addresses.create');

// Store address
Route::post('addresses/store', [AddressesController::class, 'store'])->name('addresses.store');

// Edit address form
Route::get('addresses/{address}/edit', [AddressesController::class, 'edit'])->name('addresses.edit');

// Update address
Route::put('addresses/{address}', [AddressesController::class, 'update'])->name('addresses.update');

// Delete address
Route::delete('addresses/{address}', [AddressesController::class, 'destroy'])->name('addresses.destroy');

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
     Route::get('/{class_id}/{section_id}/{student_id}/mark', [AttendancesController::class, 'mark'])->name('attendances.mark'); // mark single

        Route::resource('attendances', AttendancesController::class, );
    Route::post('/load-students', [AttendancesController::class, 'loadStudents'])->name('attendance.load');
Route::get('/get-students/{class}/{section}', [AttendancesController::class, 'getStudents']);
Route::get('/attendances/class/{class}/{section}', [AttendancesController::class, 'showClassAttendance'])
    ->name('attendances.class');
    Route::get('/marksheet/{class}/{section}/{student}', [MarksController::class, 'show'])->name('marksheet.show');
Route::get('marks/create/{student}/{class}/{section}', [MarksController::class, 'create'])->name('marks.create');
Route::post('marks/store', [MarksController::class, 'store'])->name('marks.store');
    Route::resource('subjects', SubjectsController::class);

    Route::resource('grades', GradesController::class);

});
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// Student-only routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/profile', [StudentsController::class, 'myProfile'])->name('student.profile');
});

// Auth routes
Auth::routes();
