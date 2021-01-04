<?php

namespace App\Http\Controllers;

use App\Models\Admin\Clinic;
use App\Models\Clinic\Doctor;
use App\Models\Reception\Appointment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {

        if (auth()->user()->type == 'doctor') {

            $user = auth()->user();
            $doctor = $user->gettype;
            $appointments = $doctor->appointments()->paginate();

            return view('clinic.doctor.dashboard',compact(['user','doctor','appointments']));
        }
        if (auth()->user()->type == 'receptionist') {
            $user = auth()->user();
            $receptionist = $user->gettype;
            $clinic_id = $receptionist->clinic->id;
            //return $clinic;
            $appointments = Appointment::whereHas('doctor', function(Builder $query) use ($clinic_id){
                $query->where('clinic_id','=', $clinic_id);
            })->paginate(10);

            return view('reception.receptionists.dashboard',compact(['user','receptionist','appointments']));
        }

    }
}
