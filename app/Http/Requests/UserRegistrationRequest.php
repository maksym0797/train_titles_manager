<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required',
            'country_id' => 'required',
            'language_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => \Lang::get('validation.custom.email.unique'),
            'phone_number.unique' => \Lang::get('validation.custom.phone_number.unique')
        ];
    }
}
