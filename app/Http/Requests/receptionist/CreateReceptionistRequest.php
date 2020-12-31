<?php

namespace App\Http\Requests\receptionist;

use Illuminate\Foundation\Http\FormRequest;

class CreateReceptionistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        if (auth('admin')->user() || auth()->user()->type == 'doctor') {
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
            'name'=>'required|min:5|max:50|string|unique:App\Models\Reception\Receptionist,name',
            'phone'=>'required|min:5|max:50|string|unique:App\Models\Reception\Receptionist,phone_number',
        ];
    }
}
