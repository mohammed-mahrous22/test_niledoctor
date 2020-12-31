<?php

namespace App\Http\Requests\doctor;

use App\Models\Clinic\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth('admin')->user()) {
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
        return [
            'username'=>'required|min:5|max:50|string|unique:App\Models\User,username',
            'email'=>'required|max:100|string|unique:App\Models\User,email',
            'password'=>'required|string',
            'name'=>'required|min:5|max:50|string|unique:App\Models\Clinic\Doctor,name',
            'phone'=>'required|min:5|max:50|string|unique:App\Models\Clinic\Doctor,phone_number',
        ];
    }
}
