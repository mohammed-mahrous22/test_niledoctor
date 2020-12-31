<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Clinic\DoctorController;
use App\Http\Controllers\Reception\ReceptionistController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;






Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('/login', [AdminAuthController::class, 'create'])
    //->middleware('guest')
        ->name('login');
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('home');

    Route::post('/login', [AdminAuthController::class, 'store'])
        ->middleware('guest');

    Route::post('/logout', [AdminAuthController::class, 'destroy'])
        ->middleware('auth:admin')
        ->name('logout');
    Route::get('/{admin}/profile', [AdminController::class, 'show'])
        ->middleware('auth:admin')
        ->name('profile');

    Route::get('clinics',[ClinicController::class, 'index'])->name('clinics');
    Route::group(['prefix' => 'clinics','as'=>'clinics.','middleware'=>'auth:admin'], function () {
        Route::resource('clinic',ClinicController::class)->except('index');

        route::resource('receptionists',ReceptionistController::class);

        route::resource('doctors',DoctorController::class);

    });
});





