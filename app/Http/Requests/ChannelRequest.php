<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChannelRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_id' => ['exists:events'],
            'name' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
