<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function __Construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $clinics = auth('admin')->user()->Clinics;

        return view('admin.dashboard')->with('clinics',$clinics);
    }
}
