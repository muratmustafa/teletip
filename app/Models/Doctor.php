<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $guard = 'doctor';

    protected $fillable = [
        'name', 'email', 'password', 'branch',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
