<?php

namespace App\Http\Resources;

use App\Models\EventTicket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin EventTicket */
class EventTicketResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cost' => $this->cost,
            'special_validity' => $this->special_validity,

            'event_id' => $this->event_id,

            'event' => new EventResource($this->whenLoaded('event')),
        ];
    }
}
