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
            ->where('phone',$appointment->patient_phone)
            ->first();

        if ($patient !== null ) {

            $appointment->patient()->associate($patient);
            return view('clinic.doctor.patient.create')
                ->with('patient',$patient)
                ->with('appointment',$appointment);
        }

        return view('clinic.doctor.patient.create')
                ->with('appointment',$appointment);

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
