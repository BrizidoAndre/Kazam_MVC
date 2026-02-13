<?php

namespace App\Http\Resources;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Session */
class SessionResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "speaker" => $this->speaker,
            "start" => $this->start,
            "end" => $this->end,
            "type" => $this->type,
            "cost" => $this->cost,
        ];
    }
}
