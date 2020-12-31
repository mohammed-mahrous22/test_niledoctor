<?php

use App\Http\Controllers\Clinic\PatientController;
use App\Http\Controllers\Clinic\ServiceController;
use App\Http\Controllers\Clinic\SpecialityController;
use Illuminate\Support\Facades\Route;




Route::resource('patients', PatientController::class);
Route::resource('Services', ServiceController::class);
Route::resource('Speciality',SpecialityController::class);
