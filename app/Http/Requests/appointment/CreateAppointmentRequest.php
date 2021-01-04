<?php

namespace App\Http\Requests\appointment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ( Gate::allows('make-appointment') ) {
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
            'price'=> 'required|string',
            'doctor_id'=> 'required|string',
            'patient_name'=> 'required|string|max:50|min:5',
            'patient_address'=> 'required|string|min:5',
            'patient_phone'=> 'required|string|max:20|min:10',
            'patient_age'=> 'required|numeric|max:50|min:5',
            'date'=> 'required|date',
            'time'=> 'required',
        ];

    }
}
