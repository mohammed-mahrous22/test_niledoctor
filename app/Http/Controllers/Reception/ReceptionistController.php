<?php

namespace App\Http\Controllers\Reception;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReceptionistRequest;
use App\Models\Admin\Clinic;
use App\Models\Reception\Receptionist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.receptionists.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReceptionistRequest $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function show(Receptionist $receptionist)
    {
        return view('reception.receptionist.profile')->with('receptionist',$receptionist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptionist $receptionist)
    {
       return view('reception.receptionist.update')->with('receptionist',$receptionist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reception\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receptionist $receptionist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptionist $receptionist)
    {
        $receptionist->delete();
        $Message = 'entry successfully deleted';

    return redirect()->back()-> with('delete',$Message);
    }
}
