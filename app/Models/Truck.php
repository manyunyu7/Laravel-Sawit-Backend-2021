<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;
    protected $appends = ['image_full_path'];

    function getImageFullPathAttribute(){
        return url(asset($this->photo));
    }
}
