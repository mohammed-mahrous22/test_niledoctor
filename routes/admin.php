<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;






Route::get('/admin/login', [AdminAuthController::class, 'create'])
     ->middleware('guest')
     ->name('Adminlogin');
Route::get('/admin/dashboard', [AdminController::class, 'index'])
     ->name('Adminhome');

Route::post('/admin/login', [AdminAuthController::class, 'store'])
     ->middleware('guest');

Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('Adminlogout');

