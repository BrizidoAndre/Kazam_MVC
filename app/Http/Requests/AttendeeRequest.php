<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'registration_code' => ['required'],
            'login_token' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
