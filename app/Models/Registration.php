<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'attendee_id',
        'ticket_id',
        'registration_time',
    ];

    public function ticket()
    {
        return $this->belongsTo(EventTicket::class, 'ticket_id');
    }
}
