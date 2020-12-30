<?php

use App\Http\Controllers\Clinic\PatientController;
use App\Http\Controllers\Clinic\ServiceController;
use Illuminate\Support\Facades\Route;




Route::resource('patients', PatientController::class);
Route::resource('Services', ServiceController::class);
