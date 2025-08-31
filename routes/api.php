<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Mobile\PlayerController;
use App\Http\Controllers\Api\Mobile\AuthController;
use App\Http\Controllers\Api\Mobile\InitialController;
use App\Http\Controllers\Api\Mobile\FoulRuleController;
use App\Http\Controllers\Api\Mobile\SearchController;
use App\Http\Controllers\Api\Admin\PlayerController as AdminPlayerController;

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

    /********** ログアウト管理(auth) **********/
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

/********** 検索管理 **********/
Route::get('/search/team/index',                  [SearchController::class, 'teamIndex'])->name('search.team.index');
Route::get('/search/season/index',                  [SearchController::class, 'seasonIndex'])->name('search.season.index');


/************************************************
 *  管理画面側ルーティング
 ************************************************/
Route::prefix('admin')->group(function() {

    /********** プレイヤー管理(players) **********/
    Route::resource('/players', AdminPlayerController::class);

});