<?php

namespace App\Http\Requests\doctor;

use App\Models\Clinic\Doctor;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Http\FormRequest;

class DoctorUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user('admin')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_id = User::where('username',$this->username)->first()->id ?? User::where('email',$this->email)->first()->id ?? '' ;
        $doctor_id = Doctor::where('phone_number',$this->phone)->first()->id ?? '';
        return [
            'username'=>"nullable|min:5|max:50|string|unique:App\Models\User,username,".$user_id,
            'email'=>"nullable|max:100|string|unique:App\Models\User,email,".$user_id ,
            'password'=>"nullable|string",
            'name'=>"required|min:5|max:50|string",
            'phone'=>"nullable|min:5|max:50|string|unique:App\Models\Clinic\Doctor,phone_number,".$doctor_id,
        ];
    }
}
