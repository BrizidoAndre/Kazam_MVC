<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Session extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'room_id',
        'title',
        'description',
        'speaker',
        'start',
        'end',
        'type',
        'cost',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function sessionsRegistrations()
    {
        return $this->hasMany(SessionRegistration::class, 'session_id');
    }

    protected function casts()
    {
        return [
            'start' => 'datetime',
            'end' => 'datetime'
        ];
    }
}
