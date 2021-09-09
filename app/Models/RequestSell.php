<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSell extends Model
{
    use HasFactory;

    protected $appends = [
        'photo_path',
        'driver_name', 'status_desc','staff_name','user_name','user_photo'];

    function getPhotoPathAttribute()
    {
        return asset($this->photo);
    }

    function getDriverNameAttribute()
    {
        $user = User::find($this->driver_id);
        if ($user != null)
            return $user->name;
        else return "";
    }

    function getUserNameAttribute()
    {
        $user = User::find($this->user_id);
        if ($user != null)
            return $user->name;
        else return "";
    }

    function getStaffNameAttribute()
    {
        $user = User::find($this->staff_id);
        if ($user != null)
            return $user->name;
        else return "";
    }

    function getUserPhotoAttribute()
    {
        $user = User::find($this->user_id);
        if ($user != null)
            return $user->photo_path;
        else return "";
    }

    function getStatusDescAttribute()
    {
        $retVal = "";
        switch ($this->status) {
            case "3" :
                return "Menunggu Diproses";
                break;
            case "2" :
                return "Diproses";
                break;
            case "4" :
                return "Dalam Penjemputan";
                break;
            case "1" :
                return "Sukses";
                break;
            case "0" :
                return "Dibatalkan";
                break;
            case "" :
                break;
        }
        $user = User::find($this->id);
        if ($user != null)
            return $user->name;
        else return "";
    }

}
