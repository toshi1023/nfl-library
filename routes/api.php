<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Mobile\PlayerController;
use App\Http\Controllers\Api\Mobile\AuthController;
use App\Http\Controllers\Api\Mobile\InitialController;
use App\Http\Controllers\Api\Mobile\FoulRuleController;

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
    Route::get('/initials/{user_id}/info',          [InitialController::class, 'info'])->name('initials.info');
    
    /********** ユーザ管理(users) **********/
    // Route::post('/users/update',                    'Api\UserController@update')->name('users.update');

    /********** ログイン管理(auth) **********/
    Route::post('/auth/logout',                     [AuthController::class, 'logout'])->name('logout');
});


/************************************************
 *  アプリ側ルーティング(非ログイン)
 ************************************************/

/********** ログイン管理(auth) **********/
Route::post('/auth/login',                      [AuthController::class, 'login'])->name('login');
// Route::post('/auth/logout',                     [AuthController::class, 'logout'])->name('logout');

/********** プレイヤー管理(players) **********/
Route::get('/players/info',                     [PlayerController::class, 'info'])->name('players.info');

/********** 反則管理(foul_rules) **********/
Route::get('/foul_rules/info',                  [FoulRuleController::class, 'info'])->name('foul_rules.info');