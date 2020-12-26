<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Clinic\DoctorController;
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
});



Route::group(['prefix' => 'admin/clinics','as'=>'clinics.','middleware'=>'auth:admin'], function () {
    route::get('/', [ClinicController::class, 'index']);
    route::get('/create', [ClinicController::class, 'create'])->name('create clinic');
    route::post('/create', [ClinicController::class, 'store'])->name('store clinic');
    route::get('/{Clinic}', [ClinicController::class, 'show'])->name('show clinic');
    route::delete('/{Clinic}/delete', [ClinicController::class, 'delete'])->name('delete clinic');
    route::put('/{Clinic}/update', [ClinicController::class, 'update'])->name('update clinic');

    Route::group(['prefix' => 'doctors','as'=>'doctors.'], function () {
        route::get('/', [DoctorController::class, 'index']);
        route::get('/create', [DoctorController::class, 'create']);
        route::post('/create', [DoctorController::class, 'store'])->name('store');
        route::put('/update/{Doctor}', [DoctorController::class, 'update']);
        route::delete('/delete/{Doctor}', [DoctorController::class, 'delete']);
        route::get('/doctor/{Doctor}', [DoctorController::class, 'show']);
        //route::get('/', [DoctorController::class, 'index']);

    });
});

