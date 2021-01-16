<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\CreatePatientRequest;
use App\Models\Clinic\Doctor;
use App\Models\Clinic\Patient;
use App\Models\Reception\Appointment;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clinic.doctor.patient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePatientRequest $request)
    {

        $doctor = Doctor::find($request->user()->gettype->id);
        $data = [];
        foreach ($request->validated() as $key => $value) {
            if ($value !== null) {
                $data[$key] = trim(strip_tags($value));
            }
        }
        $appointment = Appointment::find($data['appoint_id']);
        $patient = Patient::where('name',$data['name'])->where('phone',$data['phone'])->first() ?? new patient;
        $patient->name=$data['name'];
        $patient->age=$data['age'];
        $patient->phone=$data['phone'];
        $patient->address=$data['address'];
        $patient->weight=$data['weight'] ?? $patient->weight;
        $patient->BP=$data['BP'] ?? $patient->BP;
        $patient->treatment=$data['treatment'] ?? $patient->treatment ;
        $patient->diagnoses=$data['diagnoses'] ?? $patient->diagnoses ;
        $patient->medical_history=$data['medical_history'] ?? $patient->medical_history ;
        $patient->Doctor()->associate($doctor);
        $patient->save();
        $appointment->patient()->associate($patient);
        $appointment->save();

        return $patient->appointments;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('clinic.doctor.patient.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('clinic.doctor.patient.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
