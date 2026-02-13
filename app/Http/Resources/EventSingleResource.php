<?php

namespace App\Http\Resources;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Event */
class EventSingleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'date' => $this->date,
            'channels_count' => $this->channels_count,
            'event_tickets_count' => $this->event_tickets_count,
            'registrations_count' => $this->registrations_count,
            'rooms_count' => $this->rooms_count,

            'organizer_id' => $this->organizer_id,

            'channels' => ChannelResource::collection($this->whenLoaded('channels')),
        ];
    }
}
