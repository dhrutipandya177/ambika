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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::namespace('Api')->group(function() {
    Route::post('login', 'LoginController@login');
    Route::post('registration', 'LoginController@registration');
    Route::post('registrationverify', 'LoginController@registrationVerify');
    Route::post('socialLogin', 'LoginController@socialLogin');
    Route::post('forgotpassword', 'LoginController@forgotPassword');
    Route::post('recoverpassword', 'LoginController@recoverPassword');

    Route::group(['middleware' => ['auth:api']], function() {
        Route::post('verify', 'LoginController@verify');
        Route::get('resendotp', 'LoginController@reSendOtp');
        Route::get('getuser', 'UserController@getuser');
        Route::post('editaccountinfo', 'UserController@editAccountInfo');
        Route::post('changepassword', 'LoginController@changePassword');
        Route::get('logout', 'LoginController@logout');

        /*Rouet for notification */
        Route::group(['prefix'=>'notification'],function(){
            Route::get('list','NotificationController@getNotification');
            Route::post('read','NotificationController@readNotification');
            Route::post('delete','NotificationController@deleteNotification');
        });

        //Orders API, Get Orders of login user, Add Order
        Route::group(['prefix'=>'order'],function(){
            Route::post('storeorder','ApiController@storeOrder');
            Route::get('getuserorderlist', 'ApiController@getuserorderlist');
        });    
    });

    /*Home Slider API*/
    Route::get('gethomeslider', 'ApiController@getHomeSlider')->name('front.slider');
    Route::get('getgallery', 'ApiController@getGallery')->name('front.gallery');
    Route::post('inquirystore', 'ApiController@inquiryStore')->name('front.inquirystore');

    /*Product related APIs*/
    Route::get('getcategories', 'ApiController@getCategories')->name('front.getcategories');
    Route::get('getsubcategories/{id}', 'ApiController@getSubCategories')->name('front.getsubcategories');
    Route::get('getcategoryinfo/{catid}', 'ApiController@getCategoryInfo')->name('front.getcategoryinfo');
    Route::get('getcategoryproducts/{id}', 'ApiController@getCategoryProducts')->name('front.getcategoryproducts');
    Route::get('getproductlist', 'ApiController@getproductList')->name('front.getproductlist');
    Route::get('getproductinfo/{id}', 'ApiController@getProductInfo')->name('front.getproductinfo');
    Route::get('getproductwithcatmenu', 'ApiController@getProductWithCatMenu')->name('front.getproductwithcatmenu');
	Route::get('getsettings', 'ApiController@getSettingsInfo');
	
});
