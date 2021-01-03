<?php

namespace App\Http\Controllers\Reception;

use App\Http\Controllers\Controller;
use App\Http\Requests\appointment\CreateAppointmentRequest;
use App\Http\Requests\appointment\UpdateAppointmentRequest;
use App\Models\Clinic\Speciality;
use App\Models\Reception\Appointment;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Appointments = Appointment::all();

        return view('reception.appointments.index')
            ->with('appointments',$Appointments);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $specs = Speciality::has('doctors')->get();
        return view('reception.appointments.create')
            ->with('specs',$specs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAppointmentRequest $request)
    {

       Appointment::create($request->validated());
        $message = 'Appointment created';
        return redirect('reception.appointments.index')
            ->with('success',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('reception.appointments.show')
            ->with('appointment',$appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {

        $specs = Speciality::has('doctors')->get();
        return view('reception.appointments.edit')
            ->with('appointment',$appointment)
            ->with('specs',$specs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reception\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {

        $data = [];
        foreach ($request->validated() as $key => $value) {
            if ($value !== null) {
                $data[$key] = $value;
            }
            $appointment->update($data);
        }

        $message = 'updated';
        return $appointment;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        $message = 'deleted';
        return redirect('reception.appointments.index')
            ->with('success',$message);
    }
}
