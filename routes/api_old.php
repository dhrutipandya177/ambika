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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){
    Route::post('user/avatar', 'UserController@uploadProfile');
    Route::get('commonSettings','CommonController@commonSettings');
});

Route::namespace('Api')->middleware('decrypt_req')->group(function(){
    #Auth Routes
    Route::post('register', 'UserAuthController@register');
    Route::post('login', 'UserAuthController@login');
    Route::post('social/login', 'UserAuthController@sociallogin');
    Route::post('social/phone/register', 'UserAuthController@phoneregister');
    #forgot password
    Route::post('password/forgot', 'UserAuthController@forgotPassword');
    Route::patch('password/recover', 'UserAuthController@recoverPassword');
    Route::middleware('auth:api')->group(function() {
        #Sub Topic List
        Route::get('getTopic', 'TopicController@getTopic');
        Route::get('getQuestion/{id}', 'TopicController@getQuestion');
    });
});
