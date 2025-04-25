<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.index');
});

Route::get('login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

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

    Route::get('students', [StudentController::class, 'index'])->name('admin.students.index');
    Route::get('teacher', [TeacherController::class, 'index'])->name('admin.teachers.index');
});
