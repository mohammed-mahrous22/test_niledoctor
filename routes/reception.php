<?php

use App\Http\Controllers\Reception\AppointmentController;
use App\Http\Controllers\Reception\InvoiceController;
use Illuminate\Support\Facades\Route;





Route::resource('appointments', AppointmentController::class);
Route::resource('invoices', InvoiceController::class);
