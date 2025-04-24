<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
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
});
