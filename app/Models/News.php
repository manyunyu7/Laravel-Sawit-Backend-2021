<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $appends = ['photo_path'];

    function getPhotoPathAttribute(){
        return asset($this->photo);
    }

}
