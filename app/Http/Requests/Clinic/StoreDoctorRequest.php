<?php

namespace App\Http\Requests\Clinic;

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
            'username'=>'required|max:50|string',
            'email'=>'required|max:100|string',
            'password'=>'required|string',
            'name'=>'required|max:50|string',
            'phone'=>'required|max:50|string',
        ];
    }
}
