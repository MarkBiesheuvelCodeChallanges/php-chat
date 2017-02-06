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

// Get list of all the users
Route::get('/users', [
    'as'   => 'user.index',
    'uses' => 'UserController@index',
]);

// Receive all messages
Route::get('/messages', [
    'as'   => 'messages.receive',
    'uses' => 'MessageController@receive',
]);

// Send message to a user
Route::post('/users/{userId}/messages', [
    'as'   => 'messages.send',
    'uses' => 'MessageController@send',
]);