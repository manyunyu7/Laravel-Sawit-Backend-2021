<?php

namespace App\Http\Controllers;

use App\Models\UserMNotification;
use Illuminate\Http\Request;

class MNotificationController extends Controller
{
    public function getByUser($id){
        $data = UserMNotification::where('user_id','=',$id)->orderBy('id','desc')->get();
        return $data;
    }
}
