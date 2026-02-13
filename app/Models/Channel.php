<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Channel extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'name',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function sessions(): HasManyThrough
    {
        return $this->hasManyThrough(Session::class, Room::class, 'channel_id', 'room_id');
    }
}
