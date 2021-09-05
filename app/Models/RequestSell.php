<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSell extends Model
{
    use HasFactory;

    public function getSomething(){
        return "something";
    }
}
