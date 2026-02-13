<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'attendee_id' => ['required', 'integer'],
            'ticket_id' => ['required', 'exists:event_tickets'],
            'registration_time' => ['nullable', 'date'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
