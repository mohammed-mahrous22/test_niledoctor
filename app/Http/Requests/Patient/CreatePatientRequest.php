<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreatePatientRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ( Gate::allows('make-patient') ) {
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
            'name'=>'required|max:50|string',
            'address'=>'required|max:100|string',
            'phone'=>'required|max:20|string',
            'age'=>'required|max:200|numeric',
            'medical_history'=>'required|max:255|string',
            'diagnoses'=>'required|max:255|string',
            'treatment'=>'required|max:255|string',
            'weight'=>'required|numeric',
            'BP'=>'sometimes|required|max:255|string',
            'HR'=>'sometimes|required|max:255|string',
            'appoint_id'=>'required|numeric',

        ];
    }
}
