<?php

namespace App\Http\Controllers\Reception;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReceptionistRequest;
use App\Models\Admin\Clinic;
use App\Models\Clinic\Doctor;
use App\Models\Reception\Receptionist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReceptionistController extends Controller
{
    public function index()
    {
        return view('admin.receptionists.index');
    }
    public function create()
    {
       if ($user = auth('admin')->user())
         {

           $clinics = $user->clinics;
           return view('reception.receptionists.create')->with('clinics',$clinics);
       }

       $user = auth()->user();
       $clinic = $user->clinic;

        return view('admin.receptionists.create')->with('clinic',$clinic);
    }
    public function store(CreateReceptionistRequest $request )
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 'receptionist';
        $user->clinic()->associate(Clinic::find($request->clinic));
        $user->save();
        $receptionist = new Receptionist;
        $receptionist->name = $request->name;
        $receptionist->phone_number = $request->phone;
        $receptionist->clinic()->associate(Clinic::find($request->clinic));
        $receptionist->user()->associate($user);
        $receptionist->save();



        $succses = 'Receptionist was created successfully';


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
