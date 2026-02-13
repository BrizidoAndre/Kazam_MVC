<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventTicketRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_id' => ['exists:events'],
            'name' => ['required'],
            'cost' => ['required', 'numeric'],
            'special_validity' => [],
            'valid_until' => [Rule::requiredIf(function () {
                return request('special_validity') === 'date';
            })],
            'amount' => [Rule::requiredIf(function(){
                return request('special_validity','') === 'amount';
            })]
        ];
    }

    public function authorize()
    {
        return true;
    }
}
