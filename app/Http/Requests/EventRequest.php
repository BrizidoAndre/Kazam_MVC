<?php

namespace App\Http\Requests;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
{
    public function rules()
    {
        $id = request('model', false);
        return [
            'organizer_id' => ['nullable', 'exists:organizers'],
            'name' => ['required'],
            'slug' => ['required', 'regex:/[a-z0-9\-]+/'],
            'date' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'Slug is already used',
        ];
    }

    public function authorize()
    {
        $id = request('model', false);
        if ($id) {
            return $id->organizer_id === auth()->id();
        } else {
            return true;
        }
    }
}
