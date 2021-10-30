<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/template/home', 'template');
Route::view('/download/', 'download');

Auth::routes();


Route::redirect('/', '/login');

Route::get('/registerz', 'CustomAuthController@register');
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin']);
    Route::get('/staff', [App\Http\Controllers\HomeController::class, 'index']);

    Route::prefix('outbond')->group(function () {
        Route::get('/history', 'OutbondController@viewManage');
    });

    Route::prefix('landing-notif')->group(function () {
        Route::get('/manage', 'LandingNotifController@viewManage');
        Route::post('/store', 'LandingNotifController@store');
        Route::get('/{id}/delete', [App\Http\Controllers\LandingNotifController::class, 'destroy']);

    });


    Route::post('/user/store', [App\Http\Controllers\StaffController::class, 'store']);
    Route::post('/user/update', [App\Http\Controllers\StaffController::class, 'update']);
    Route::get('/user/{id}/delete', [App\Http\Controllers\StaffController::class, 'destroy']);


    Route::get('/material/create', [App\Http\Controllers\MaterialController::class, 'viewCreate']);
    Route::get('/material/{id}/delete', [App\Http\Controllers\MaterialController::class, 'destroy']);
    Route::post('/material/store', 'MaterialController@store');
    Route::get('/material/{id}/edit', 'MaterialController@edit');
    Route::post('/material/update', 'MaterialController@update');
    Route::get('/material/{id}/delete', 'MaterialController@destroy');
    Route::get('/material/manage', 'MaterialController@viewManage');


    Route::prefix('price')->group(function () {
        $cr = "PriceController";
        Route::get('create', "$cr@viewCreate");
        Route::post('create', "$cr@store");
        Route::post('store', "$cr@store");
        Route::get('{id}/edit', 'MaterialController@edit');
        Route::post('update', 'MaterialController@update');
        Route::get('{id}/delete', 'PriceController@destroy');
        Route::get('manage', "$cr@viewManage");
    });

    Route::prefix('armada')->group(function () {
        $cr = "ArmadaController";
        Route::get('create', "$cr@viewCreate");
        Route::post('store', "$cr@store");
        Route::get('{id}/edit', "$cr@viewUpdate");
        Route::post('{id}/update', "$cr@update");
        Route::get('{id}/delete', "$cr@delete");
        Route::get('manage', "$cr@viewManage");
    });


    Route::prefix('news')->group(function () {
        $cr = "NewsController";
        Route::get('create', "$cr@viewCreate");
        Route::post('store', "$cr@store");
        Route::get('{id}/edit', "$cr@viewUpdate");
        Route::post('{id}/update', "$cr@update");
        Route::get('{id}/delete', "$cr@delete");
        Route::get('manage', "$cr@viewManage");
    });

    Route::get('/admin/user/create', [App\Http\Controllers\StaffController::class, 'viewAdminCreate']);
    Route::get('/admin/user/manage', [App\Http\Controllers\StaffController::class, 'viewAdminManage']);
    Route::get('/admin/user/{id}/edit', [App\Http\Controllers\StaffController::class, 'viewAdminEdit']);
});

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('mobile_raz/request-sell/{id}/edit/', "RequestSellController@viewDetail");

Route::prefix('rs')->group(function () {
    $cr = "RequestSellController";
    Route::get('create', "$cr@viewCreate");
    Route::post('store', "$cr@store");
    Route::get('{id}/edit', "$cr@viewUpdate");
    Route::get('{id}/detail', "$cr@viewDetail");
    Route::post('{id}/update', "$cr@update");
    Route::post('{id}/deleteAJAX', "$cr@deleteAJAX");
    Route::post('change-driver', "$cr@changeDriver");
    Route::post('change-staff', "$cr@changeStaff");
    Route::post('change-status', "$cr@changeStatus");
    Route::post('change-truck', "$cr@changeTruck");
    Route::post('change-major', "$cr@changeMajor");
    Route::get('manage', "$cr@viewManage");

    // for scaling
    $cr2 = "RsScaleController";
    Route::post('{id}/scale/store', "$cr2@store");
    Route::get('{id}/scale/get', "$cr2@store");
    Route::post('{id}/scale/{id_scale}/delete', "$cr2@delete");
});
