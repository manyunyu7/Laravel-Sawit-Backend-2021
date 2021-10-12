<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RequestSell extends Model
{
    use HasFactory;


    protected $appends = [
        'rs_code',
        'photo_path', 'photo_list', 'truck_name', 'result_est_price_now', 'result_est_price_old', 'margin_in_percentage',
        'driver_name', 'status_desc', 'staff_name', 'user_name', 'user_photo', 'truck',
        'created_at_idn', 'updated_at_idn', 'final_price', 'final_weight'
    ];

    public function getCreatedAtIdnAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d H:i:s');
    }

    public function getRsCodeAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('YmdHis');
        $code = "#SAWIT-" . $date . "-" . $this->id;
        return $code;
    }

    public function getUpdatedAtIdnAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('Y-m-d H:i:s');
    }

    function getMarginInPercentageAttribute()
    {
        return $this->est_margin * 100;
    }

    function getFinalPriceAttribute()
    {
        return $this->est_margin * 100;
    }

    function getFinalWeightAttribute()
    {
        return $this->est_margin * 100;
    }

    function getResultEstPriceOldAttribute()
    {
        return number_format(($this->est_price) *
            ($this->est_weight - ($this->est_weight * $this->est_margin)),
            2, ',', '.');
    }

    function getResultEstPriceNowAttribute()
    {
        $priceObject = Price::latest()->first();
        return number_format(($priceObject->price) *
            ($this->est_weight - ($this->est_weight * $priceObject->est_price)),
            2, ',', '.');
    }

    function getPhotoPathAttribute()
    {
        return asset($this->photo);
    }

    function getPhotoListAttribute()
    {
        return MappingRSPhoto::where('request_sell_id', '=', $this->id)->get();
    }

    function getDriverNameAttribute()
    {
        $user = User::find($this->driver_id);
        if ($user != null)
            return $user->name;
        else return "Belum Ada Driver";
    }

    function getTruckNameAttribute()
    {
        $truck = Truck::find($this->truck_id);
        if ($truck != null)
            return $truck->name;
        else return "";
    }

    function getTruckAttribute()
    {
        return Truck::find($this->truck_id);
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

    public function getStatusDescAttribute()
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
            case "5" :
                return "Proses Timbang";
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

    public function getStatusDesc($status)
    {
        switch ($status) {
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
