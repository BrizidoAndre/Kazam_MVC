<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRegistrationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'registration_id' => ['required', 'exists:registrations'],
            'session_id' => ['required', 'exists:sessions'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
