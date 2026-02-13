<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Event extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'organizer_id',
        'name',
        'slug',
        'date',
    ];
    protected $hidden = [
        'organizer_id'
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function channels()
    {
        return $this->hasMany(Channel::class, 'event_id');
    }

    public function eventTickets()
    {
        return $this->hasMany(EventTicket::class, 'event_id');
    }

    public function rooms(): HasManyThrough
    {
        return $this->hasManyThrough(Room::class, Channel::class, 'event_id', 'channel_id');
    }

    public function registrations(): HasManyThrough
    {
        return $this->hasManyThrough(Registration::class, EventTicket::class, 'event_id', 'ticket_id');
    }

    public function sessions()
    {
        return Session::whereHas('room.channel', function ($query) {
            $query->where(['event_id' => $this->id]);
        });
    }

    protected function casts()
    {
        return [
            'date' => 'date',
        ];
    }
}
