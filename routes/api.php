<?php

use Illuminate\Http\Request;

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

Route::get('/users', [
    'as'   => 'user.index',
    'uses' => 'UserController@index',
]);

Route::get('/users/{user_id}/messages', [
    'as'   => 'user.index',
    'uses' => 'MessageController@index',
]);