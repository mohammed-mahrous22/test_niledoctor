<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {

        if (auth()->user()->type == 'doctor') {

            $user = auth()->user();
            $doctor = $user->gettype;
            return view('doctor.dashboard',compact(['user','doctor']));
        }
        if (auth()->user()->type == 'receptionist') {
            $user = auth()->user();
            $receptionist = $user->gettype;
            return view('receptionist.dashboard',compact(['user','receptionist']));
        }

    }
}
