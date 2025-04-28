<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.index');
});

Route::get('login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('/news', [NewsController::class, 'index'])->name('guest.news.index');

Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.index');
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::resource('users', UserController::class, [
        'names' => [
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]
    ]);

    Route::resource('classrooms', ClassroomController::class, [
        'names' => [
            'index' => 'admin.classrooms.index',
            'create' => 'admin.classrooms.create',
            'store' => 'admin.classrooms.store',
            'edit' => 'admin.classrooms.edit',
            'update' => 'admin.classrooms.update',
            'destroy' => 'admin.classrooms.destroy',
        ]
    ]);

    Route::resource('majors', MajorController::class, [
        'names' => [
            'index' => 'admin.majors.index',
            'create' => 'admin.majors.create',
            'store' => 'admin.majors.store',
            'edit' => 'admin.majors.edit',
            'update' => 'admin.majors.update',
            'destroy' => 'admin.majors.destroy',
        ]
    ]);

    Route::resource('enrollments', EnrollmentController::class, [
        'names' => [
            'index' => 'admin.enrollments.index',
            'create' => 'admin.enrollments.create',
            'store' => 'admin.enrollments.store',
            'show' => 'admin.enrollments.show',
            'edit' => 'admin.enrollments.edit',
            'update' => 'admin.enrollments.update',
            'destroy' => 'admin.enrollments.destroy',
        ]
    ]);

    Route::resource('subjects', SubjectController::class, [
        'names' => [
            'index' => 'admin.subjects.index',
            'create' => 'admin.subjects.create',
            'store' => 'admin.subjects.store',
            'show' => 'admin.subjects.show',
            'edit' => 'admin.subjects.edit',
            'update' => 'admin.subjects.update',
            'destroy' => 'admin.subjects.destroy',
        ]
    ]);

    Route::get('students', [StudentController::class, 'index'])->name('admin.students.index');
    Route::get('student/{student}', [StudentController::class, 'show'])->name('admin.students.show');
    Route::get('teacher', [TeacherController::class, 'index'])->name('admin.teachers.index');
});
