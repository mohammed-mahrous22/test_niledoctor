<?php

namespace App\Http\Requests\receptionist;

use App\Models\Reception\Receptionist;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReceptionistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
        $recep_id = Receptionist::where('phone_number',$this->phone)->first()->id ?? '';
        return [
            'username'=>'nullable|min:5|max:50|string|unique:App\Models\User,username,'.$user_id,
            'email'=>'nullable|max:100|string|unique:App\Models\User,email,'.$user_id,
            'password'=>'nullable|string',
            'name'=>'required|min:5|max:50|string|unique:App\Models\Reception\Receptionist,name,'.$recep_id,
            'phone'=>'nullable|min:5|max:50|string|unique:App\Models\Reception\Receptionist,phone_number,'.$recep_id,
        ];
    }
}
