<?php

namespace App\Http\Requests\appointment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ( Gate::allows('update-appointment') ) {
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
                'price'=> 'nullable|string',
                'doctor_id'=> 'nullable|string',
                'patient_name'=> 'required|string|max:50|min:5',
                'patient_address'=> 'nullable|string|min:5',
                'patient_phone'=> 'nullable|string|max:20|min:10',
                'patient_age'=> 'nullable|numeric|max:50|min:5',
                'date'=> 'nullable|date',
                'time'=> 'nullable',
            ];

    }
}
