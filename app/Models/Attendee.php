<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'registration_code',
        'login_token',
    ];
}
