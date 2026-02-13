<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'room_id' => ['required', 'exists:rooms,id'],
            'title' => ['required'],
            'description' => ['required'],
            'speaker' => ['required'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'type' => ['required'],
            'cost' => ['nullable', 'numeric'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
