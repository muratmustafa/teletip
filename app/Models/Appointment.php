<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id', 'user_id', 'room_name', 'room_password', 'appt_date', 'appt_status', 'appt_detail',
    ];
}
