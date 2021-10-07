<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMNotification extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at'  => 'date:Y-m-d h:i:s',
        // 'joined_at' => 'datetime:Y-m-d H:00',
    ];
}
