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
Route::middleware('api')->post('/register' , 'API\UserController@register');
Route::middleware('api')->post('/login' , 'API\UserController@login');
Route::middleware('api')->post('/forgot_password' , 'API\UserController@forgotPassword');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->post('/update_password' , 'API\UserController@updatePassword');