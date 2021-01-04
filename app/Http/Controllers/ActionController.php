<?php

namespace App\Http\Controllers;

use App\Models\Clinic\Patient;
use App\Models\Reception\Appointment;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function MakeAppointment(Appointment $appointment)
    {


       $patient = Patient::where('name',$appointment->patient_name)
            ->where('age',$appointment->patient_age)
            ->where('address',$appointment->patient_address)->first();

        if ($patient) {
            return $patient;
        }

        return $appointment;
        //return view('clinic.doctor.patient.create');
    }
    public function PostopneAppointment(Appointment $appointment)
    {
        # code...
    }
    public function CancelAppointment(Appointment $appointment)
    {
        # code...
    }
}
