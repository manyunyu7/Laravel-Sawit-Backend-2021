<?php

namespace App\Helper;


use Illuminate\Support\Facades\DB;

class RazkyFeb
{

    public static function hello(){
        return "hello";
    }

    public static function isAPI()
    {
        $url = url()->current();
        if (str_contains($url, 'api/')){
            return true;
        }else{
            return false;
        }
    }

    public static function responseSuccessWithData(
        $http_code,$status_code,$api_code,$message_id,$message_en,$res_data
    ){
        $response = [
            'http_response' => $http_code,
            'status_code' => $status_code,
            'api_code' => $api_code,
            'message_id' =>  $message_id,
            'message_en' => $message_en,
            'res_data' => $res_data,
        ];

        return response($response,$http_code);
    }

    public static function responseErrorWithData(
        $http_code,$status_code,$api_code,$message_id,$message_en,$res_data
    ){
        $response = [
            'http_response' => $http_code,
            'status_code' => $status_code,
            'api_code' => $api_code,
            'message_id' =>  $message_id,
            'message_en' => $message_en,
            'res_data' => $res_data,
        ];

        return response($response,$http_code);
    }

    public static function checkApiKey($key)
    {
        $check = DB::table('api_key')
            ->where('key', '=', "$key")
            ->count();

        if ($check == 0) {
            return response()->json([
                'message' => "Unauthorized, Api Key Mismatch",
                'http_response' => 401,
                'status_code' => 0,
            ], 401);
        }
        return null;
    }

    public static function profileImgPath()
    {
        return "photo/profile";
    }

    public static function newsImgPath()
    {
        return "photo/news";
    }
    public static function reqSellImgPath()
    {
        return "photo/profile";
    }

}



