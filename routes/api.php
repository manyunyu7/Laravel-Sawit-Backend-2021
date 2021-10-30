<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', 'CustomAuthController@login');
    Route::post('/logout', 'CustomAuthController@logout');
    Route::post('/refresh', 'CustomAuthController@refresh');
    Route::get('/user-profile', 'CustomAuthController@me');
});

Route::post('auth/register', 'CustomAuthController@register');

Route::group(['middleware' => ['auth:api']], function () {
    Route::prefix('user')->group(function () {
        Route::get('/{id}/profile', 'StaffController@getUserByID');
        Route::post('/update-photo', 'StaffController@updateProfilePhoto');
        Route::post('/update-data', 'StaffController@update');
        Route::post('/change-password', 'StaffController@updatePassword');
    });


    Route::prefix('armada')->group(function () {
        Route::get('/get', 'ArmadaController@get');
    });

    Route::prefix('request-sell')->group(function () {
        Route::post('/store', 'RequestSellController@store');
        Route::get('/{id}/detail', 'RequestSellController@viewDetail');
        Route::post('/update-status', "RequestSellController@changeStatus");
        Route::post('/{id}/store-signature', "RequestSellController@storeSignature");
        Route::post('/{id}/store-final', "RequestSellController@storeFinal");

        // for scaling
        $cr2 = "RsScaleController";
        Route::post('{id}/scale/store', "$cr2@store");
        Route::get('{id}/scale/get', "$cr2@getByID");
        Route::post('scale/{id_scale}/delete', "$cr2@destroy");
        Route::get('scale/all', "$cr2@getAll");

    });


    Route::prefix('news')->group(function () {
        Route::get('/get', 'NewsController@get');
    });

    Route::prefix('landing-notif')->group(function () {
        Route::get('/get', 'LandingNotifController@get');
    });

    Route::prefix('mnotification')->group(function () {
        Route::get('get', 'MNotificationController@getByUser');
        Route::get('user/{id}', 'MNotificationController@getByUser');
    });

    Route::prefix('price')->group(function () {
        Route::get('/', 'PriceController@getAll');
    });

    Route::prefix('rs-chat')->group(function () {
        Route::post('/store', 'RSChatController@store');
        Route::delete('/{id}/delete', 'RSChatController@delete');
        Route::get('/get', 'RSChatController@getAll');
        Route::get('topic/{id}/get', 'RSChatController@getByTopic');
    });


    Route::post('save-user', 'UserController@saveUser');
    Route::put('edit-user', 'UserController@editUser');
});


Route::prefix('user')->group(function () {
    Route::get('{id}/request-sell', 'RequestSellController@getByUser');
});

Route::prefix('staff')->group(function () {
    Route::get('{id}/request-sell', 'RequestSellController@getByUser');
});






