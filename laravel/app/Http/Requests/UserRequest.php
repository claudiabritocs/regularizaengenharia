<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\User;

class UserRequest extends Request
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
        $rules = [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ];

        if ($this->method() != 'POST') {
            $rules['email'] = 'required|email|max:255|unique:users,email,'.$this->route('usuarios')->id;
            $rules['password'] = 'confirmed|min:6';
        }

        return $rules;
    }
}
