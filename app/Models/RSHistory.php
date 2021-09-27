<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RSHistory extends Model
{
    use HasFactory;

    protected $appends = ['truck','driver','staff','status_desc'];

    function getTruckAttribute()
    {
        return Truck::find($this->id_truck);
    }
    function getDriverAttribute()
    {
        return User::find($this->id_driver);
    }
    function getStaffAttribute()
    {
        return User::find($this->id_staff);
    }
    function getStatusDescAttribute()
    {
        $obj = new RequestSell();
        return $obj->getStatusDesc($this->status);
    }

}
