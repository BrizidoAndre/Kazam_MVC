<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function rules()
    {
        return [
            'channel_id' => ['required', 'exists:channels,id'],
            'name' => ['required'],
            'capacity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
