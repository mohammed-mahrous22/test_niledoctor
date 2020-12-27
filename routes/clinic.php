<?php

use App\Http\Controllers\Clinic\PatientController;
use Illuminate\Support\Facades\Route;




Route::group(['prefix' => 'patients'], function () {
    Route::get('/', [PatientController::class, 'index'] );
    Route::get('/create', [PatientController::class, 'create'] );
    Route::post('/create', [PatientController::class, 'store'] );
    Route::get('/{patient}', [PatientController::class, 'show'] );
    Route::put('/{patient}/edit', [PatientController::class, 'update'] );
    Route::delete('/{patient}', [PatientController::class, 'delete'] );

});
