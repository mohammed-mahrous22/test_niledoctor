<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinic\StoreDoctorRequest;
use App\Models\Admin\Clinic;
use App\Models\Clinic\Doctor;
use App\Models\Clinic\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        return view('admin.doctors.index');
    }
    public function create()
    {
        $specialities = Speciality::all();

       $user = auth('admin')->user();
       $clinics = $user->clinics;

        return view('admin.doctors.create')->with('clinics',$clinics)->with('specialities',$specialities);
    }
    public function store(StoreDoctorRequest $request )
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 'doctor';
        $user->clinic()->associate(Clinic::find($request->clinic));
        $user->save();

        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->phone_number = $request->phone;
        $doctor->clinic()->associate(Clinic::find($request->clinic));
        $doctor->user()->associate($user);
        $doctor->speciality()->associate(Speciality::find($request->specialization));
        $doctor->save();

        if(! $user && $doctor ){
           $error = 'Doctor could not be created';
           return redirect()->route('clinics.doctors.create')->with('message' , $error);
        }

        $succses = 'Doctor was created successfully';


        return back()->with('message' , $succses);
    }
    public function show()
    {
        return view('admin.doctors.profile');
    }
    public function update()
    {
        return view('admin.doctors.update');
    }
}
