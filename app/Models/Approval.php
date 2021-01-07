<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $fillable = [
        'room_id', 'user_approval', 'parent_degree', 'parent_name', 'parent_approval', 'other_parent_degree', 'other_parent_name', 'other_parent_approval',
    ];
}
