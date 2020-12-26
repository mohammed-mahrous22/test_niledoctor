<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clinic;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function __Construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('auth');

    }


    public function index()
    {
        $id = auth('admin')->user()->id;
        $clinics = Clinic::where('admin_id',$id)->paginate(10);

        return view('admin.dashboard')->with('clinics',$clinics);
    }
}
