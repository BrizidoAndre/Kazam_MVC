<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventTicket extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'name',
        'cost',
        'special_validity',
    ];

    protected function casts(): array
    {
        return [
            'special_validity' => 'json',
        ];
    }

    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function registrations(): EventTicket|HasMany
    {
        return $this->hasMany(Registration::class, 'ticket_id');
    }
}
