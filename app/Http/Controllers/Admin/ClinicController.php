<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinic\StoreClinicRequest;
use App\Models\Admin\Clinic;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
   public function index()
   {
       return view('admin.clinics');
   }
   public function create()
   {
       return view('admin.clinic.create');
   }
   public function store(StoreClinicRequest $request)
   {
        $val = $request->validated();

        $clinic = new Clinic ;

        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->admin()->associate($request->user('admin'));

        $clinic->save();

        $message = "successfully created";

        return redirect()->back()->with('message',$message);
   }
   public function update(Clinic $Clinic ,StoreClinicRequest $request)
   {

    $Clinic->name = $request->name;
    $Clinic->address = $request->address;

    $Clinic->save();



   }
   public function delete(Clinic $Clinic)
   {
        $Clinic->delete();
        $Message = 'entry successfully deleted';

    return redirect()->back()-> with('delete',$Message);
   }
   public function show(Clinic $Clinic)
   {

    //return $Clinic;

         return view('admin.clinic.show',)
        ->with('clinic',$Clinic);
   }
}
