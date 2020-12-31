<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Models\Admin\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clinics');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clinic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicRequest $request)
    {
        $clinic = new Clinic ;

        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->admin()->associate($request->user('admin'));

        $clinic->save();

        $message = "successfully created";

        return redirect()->back()->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
    $doctors = $clinic->doctors()->paginate(5);
    $receptionists = $clinic->receptionists()->paginate(5);
    return view('admin.clinic.show',compact('clinic','doctors','receptionists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        return view('admin.clinic.update')->with('clinic',$clinic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic)
    {
        $clinic->name = $request->name;
    $clinic->address = $request->address;

    $clinic->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        $Message = 'entry successfully deleted';
    }
}
