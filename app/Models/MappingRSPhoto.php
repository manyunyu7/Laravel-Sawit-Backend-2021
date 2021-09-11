<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingRSPhoto extends Model
{
    use HasFactory;
    protected $table = "mapping_request_sell_photos";
    protected $appends = ['photo_path'];

    function getPhotoPathAttribute(){
        return asset($this->path);
    }

}
