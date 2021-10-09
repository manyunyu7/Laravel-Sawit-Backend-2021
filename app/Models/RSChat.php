<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSChat extends Model
{
    use HasFactory;

    protected $appends = ["sender_photo","sender_name"];

    public function getSenderPhotoAttribute()
    {
        $user = User::find($this->id_sender);
        return $user->photo_path;
    }

    public function getSenderNameAttribute()
    {
        $user = User::find($this->id_sender);
        return $user->name;
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:00',
    ];
}
