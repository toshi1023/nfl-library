<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

/************************************************
 *  アプリ側ルーティング(非ログイン)
 ************************************************/
Route::group(['middleware' => 'cors'], function() {
    /********** ユーザ管理(auth) **********/
    // Route::post('/auth/validate',                        'Api\AuthController@validate')->name('auth.validate');
    // Route::post('/auth/register',                        'Api\AuthController@store')->name('auth.register');
    
    /********** ログイン管理(auth) **********/
    Route::post('/auth/login',                           [AuthController::class, 'login'])->name('auth.login');
    // Route::post('/auth/forgot-password',                 'Api\AuthController@forgotPassword')->name('auth.forgotPassword');
    // Route::post('/auth/reset-password/{email}/{token}',  'Api\AuthController@passwordReset')->name('auth.passwordReset');
    // Route::post('/auth/logout',                          'Api\AuthController@logout')->name('auth.logout');
});
