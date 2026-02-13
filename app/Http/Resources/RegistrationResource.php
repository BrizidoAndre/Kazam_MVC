<?php

namespace App\Http\Resources;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Registration */
class RegistrationResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'attendee_id' => $this->attendee_id,
            'registration_time' => $this->registration_time,

            'ticket_id' => $this->ticket_id,

            'ticket' => new EventTicketResource($this->whenLoaded('ticket')),
        ];
    }
}
