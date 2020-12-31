<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinic\StoreDoctorRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Models\Admin\Clinic;
use App\Models\Clinic\Doctor;
use App\Models\Clinic\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();

       $user = auth('admin')->user();
       $clinics = $user->clinics;

        return view('admin.doctors.create')
            ->with('clinics',$clinics)
            ->with('specialities',$specialities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
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

        $succses = 'Doctor was created successfully';
        return back()->with('message' , $succses);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clinic\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctors.profile')->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clinic\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.update')->with('doctor',$doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clinic\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor)
    {
        return view('admin.doctors.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clinic\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        $Message = 'entry successfully deleted';

        return view('admin.doctors.update',$Message);
    }
}
