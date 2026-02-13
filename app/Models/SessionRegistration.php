<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionRegistration extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'registration_id',
        'session_id',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
