<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlayerController;

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

/************************************************
 *  アプリ側ルーティング(ログイン)
 ************************************************/
Route::middleware('auth:sanctum')->group(function () {
    /********** 初期値管理(initials) **********/
    // Route::get('/initials/{user_id}/info',          'Api\InitialController@info')->name('initials.info');
    
    /********** ユーザ管理(users) **********/
    // Route::post('/users/validate',                  'Api\UserController@validate')->name('users.validate');
    // Route::post('/users/update',                    'Api\UserController@update')->name('users.update');
});


/************************************************
 *  アプリ側ルーティング(非ログイン)
 ************************************************/

/********** プレイヤー管理(players) **********/
Route::get('/players/info',                     [PlayerController::class, 'info'])->name('players.info');

/********** 反則管理(rules) **********/
// Route::get('/rules/info',                     'Api\PlayerController@info')->name('players.info');