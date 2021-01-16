<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\Clinic\PatientController;
use App\Http\Controllers\Clinic\ServiceController;
use App\Http\Controllers\Clinic\SpecialityController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;




Route::resource('patients', PatientController::class)->except('create');
Route::resource('Services', ServiceController::class);
Route::resource('Speciality',SpecialityController::class);

Route::group(['as' => 'appointment.','Middleware'=> 'auth'], function () {
    Route::get('appointments/start/{appointment}',[ActionController::class,'MakeAppointment'])
    ->middleware('auth')
    ->name('start');

Route::post('appointments/delay/{appointment}',[ActionController::class,'PostopneAppointment'])
    ->middleware('auth')
    ->name('delay');

Route::post('appointments/cancel/{appointment}',[ActionController::class,'CancelAppointment'])
    ->middleware('auth')
    ->name('cancel');

});
