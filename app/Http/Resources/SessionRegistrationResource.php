<?php

namespace App\Http\Resources;

use App\Models\SessionRegistration;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin SessionRegistration */
class SessionRegistrationResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,

            'registration_id' => $this->registration_id,
            'session_id' => $this->session_id,

            'registration' => new RegistrationResource($this->whenLoaded('registration')),
            'session' => new SessionResource($this->whenLoaded('session')),
        ];
    }
}
