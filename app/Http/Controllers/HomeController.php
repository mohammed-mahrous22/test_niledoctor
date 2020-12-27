<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {

        if (auth()->user()->type == 'doctor') {
            return view('doctor.dashboard');
        }
        if (auth()->user()->type == 'receptionist') {
            return view('receptionist.dashboard');
        }

    }
}
