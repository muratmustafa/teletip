<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guard = 'user';

    protected $fillable = [
        'name', 'tckimlik', 'password', 'phone', 'birthdate', 'diagnostic',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
