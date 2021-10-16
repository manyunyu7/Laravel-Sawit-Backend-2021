<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RsScale extends Model
{
    use HasFactory;

    protected $appends = ['staff_data', 'staff_name'];

    function getStaffDataAttribute()
    {
        return User::find($this->created_by);
    }

    function getStaffNameAttribute()
    {
        $data = User::find($this->created_by);
        if ($data != null)
            return $data->name;
        else return "";
    }

    protected $casts = [
        'created_at' => 'date:Y-m-d h:i:s',
        // 'joined_at' => 'datetime:Y-m-d H:00',
    ];
}
