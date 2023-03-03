<?php

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

Route::get('/', 'Front\HomeController@index');

Auth::routes();

#Front End
//Route::get('/', 'HomeController@index')->name('index');
Route::get('home', 'HomeController@index')->name('home');
Route::get('home/users', 'HomeController@users')->name('home.users');
Route::get('home/createuser', 'HomeController@createUser')->name('home.createuser');
Route::post('home/storeuser', 'HomeController@storeUser')->name('home.storeuser');
Route::get('home/getusers', 'HomeController@getUsers')->name('home.getusers');
Route::get('home/{id}/viewuser', 'HomeController@viewUser')->name('home.viewuser');
Route::get('home/{id}/deleteuser', 'HomeController@deleteUser')->name('home.deleteuser');
#Route::get('/apply-now/{course?}','Front\ApplyController@index')->name('apply-now');
#Route::post('/submitapplication','Front\ApplyController@store')->name('submitapplication');
#Route::get('/thankyou','Front\ApplyController@thankyou')->name('thankyou');

#Front End CMS Pages
Route::get('/contact-us','Front\HomeController@contactus')->name('contact-us');
Route::get('/about-us','Front\HomeController@aboutus')->name('about-us');
Route::post('/inquiry-store','Front\HomeController@inquiryStore')->name('inquiry-store');
Route::get('/category/{catid}','Front\HomeController@getCategoryProductsList')->name('get-category-products-list');
Route::get('/product/{pid}','Front\HomeController@getProductDetails')->name('get-product-details');

Route::get('/gallery','Front\HomeController@gallery')->name('gallery');
Route::get('/terms-and-condition','Front\HomeController@termsandcondition')->name('terms-and-condition');
Route::get('/privacy-policy','Front\HomeController@privacypolicy')->name('privacy-policy');
/*Route::get('/why-us','Front\HomeController@whyus')->name('why-us');
Route::get('/leadership-team','Front\HomeController@leadershipteam')->name('leadership-team');
Route::get('/pricing','Front\HomeController@pricing')->name('pricing');
Route::get('/faqs','Front\HomeController@faqs')->name('faqs');
Route::get('/careers','Front\HomeController@careers')->name('careers');
*/



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::post('/roles/delete','RoleController@delete')->name('roles.delete');
    Route::resource('users','UserController');
    Route::post('/users/delete','UserController@delete')->name('users.delete');

    Route::group(['prefix'=>'application'],function(){
        Route::get('/','ApplicationController@index')->name('applied-user.index');
        Route::get('/getapplicationdata','ApplicationController@getapplicationdata')->name('getapplicationdata');
        Route::get('/detail/{id}','ApplicationController@detail')->name('application.detail');
    });

    Route::group(['prefix'  =>   'categories'], function() {

	    Route::get('/', 'CategoryController@index')->name('categories.index');
	    Route::get('/getparentcategories', 'CategoryController@getParentCategories')->name('categories.getparentcategories');
	    Route::get('/create', 'CategoryController@create')->name('categories.create');
	    Route::post('/store', 'CategoryController@store')->name('categories.store');
	    Route::get('/{id}/edit', 'CategoryController@edit')->name('categories.edit');
	    Route::post('/update', 'CategoryController@update')->name('categories.update');
	    Route::get('/{id}/delete', 'CategoryController@delete')->name('categories.delete');

	});

	Route::group(['prefix'  =>   'subcategories'], function() {

	    Route::get('/', 'CategoryController@subindex')->name('subcategories.index');
	    Route::get('/getchildcategories', 'CategoryController@getChildCategories')->name('subcategories.getchildcategories');
	    Route::get('/create', 'CategoryController@subcreate')->name('subcategories.create');
	    Route::post('/store', 'CategoryController@substore')->name('subcategories.store');
	    Route::get('/{id}/edit', 'CategoryController@subedit')->name('subcategories.edit');
	    Route::post('/update', 'CategoryController@subupdate')->name('subcategories.update');
	    Route::get('/{id}/delete', 'CategoryController@subdelete')->name('subcategories.delete');

	});


	Route::group(['prefix'  =>   'products'], function() {

	    Route::get('/', 'ProductController@index')->name('products.index');
	    Route::get('/getproducts', 'ProductController@getProducts')->name('products.getproducts');
	    Route::get('/getsubcategories/{id}', 'ProductController@getSubcategories')->name('products.getsubcategories');
	    Route::get('/create', 'ProductController@create')->name('products.create');
	    Route::post('/store', 'ProductController@store')->name('products.store');
	    Route::get('/{id}/edit', 'ProductController@edit')->name('products.edit');
	    Route::post('/update', 'ProductController@update')->name('products.update');
	    Route::get('/{id}/delete', 'ProductController@destroy')->name('products.delete');
	    Route::get('/removeproductattr/{id}/{attr}', 'ProductController@removeProductAttr')->name('products.removeproductattr');
	    Route::get('/removeproductimage/{id}', 'ProductController@removeProductImage')->name('products.removeproductimage');
	  	  
	});

	Route::group(['prefix'  =>   'orders'], function() {

	    Route::get('/', 'OrderController@index')->name('orders.index');
	    Route::get('/getorders', 'OrderController@getOrders')->name('orders.getorders');
	    //Route::get('/create', 'OrderController@create')->name('orders.create');
	    //Route::post('/store', 'OrderController@store')->name('orders.store');
	    Route::get('/{id}/view', 'OrderController@view')->name('orders.view');
	    Route::get('/{id}/delete', 'OrderController@destroy')->name('orders.delete');
	});

	Route::group(['prefix'  =>   'slider'], function() {

	    Route::get('/', 'SliderController@index')->name('slider.index');
	    Route::get('/getslider', 'SliderController@getSlider')->name('slider.getslider');
	    Route::get('/create', 'SliderController@create')->name('slider.create');
	    Route::post('/store', 'SliderController@store')->name('slider.store');
	    Route::get('/{id}/edit', 'SliderController@edit')->name('slider.edit');
	    Route::post('/update', 'SliderController@update')->name('slider.update');
	    Route::get('/{id}/delete', 'SliderController@destroy')->name('slider.delete');

	});


	Route::group(['prefix'  =>   'gallary'], function() {

	    Route::get('/', 'GallaryController@index')->name('gallary.index');
	    Route::get('/getgallary', 'GallaryController@getGallary')->name('gallary.getgallary');
	    Route::get('/create', 'GallaryController@create')->name('gallary.create');
	    Route::post('/store', 'GallaryController@store')->name('gallary.store');
	    Route::get('/{id}/edit', 'GallaryController@edit')->name('gallary.edit');
	    Route::post('/update', 'GallaryController@update')->name('gallary.update');
	    Route::get('/{id}/delete', 'GallaryController@destroy')->name('gallary.delete');
	  	Route::get('/removegallaryimage/{id}', 'GallaryController@removeGallaryImage')->name('gallary.removegallaryimage');  
	});

	Route::group(['prefix'  =>   'inquiry'], function() {

	    Route::get('/', 'HomeController@inquiryList')->name('inquiry.inquireylist');
	    Route::get('/getinquiries', 'HomeController@getInquiries')->name('inquiry.getinquiries');
	    Route::get('/{id}/view', 'HomeController@viewInquiry')->name('inquiry.viewinquiry');
	    Route::get('/{id}/delete', 'HomeController@deleteInquiry')->name('inquiry.delete');
	});
	
	Route::prefix('notification')->group(function (){
		route::get('/list','NotificationController@index')->name('notification.list');
		route::post('/store','NotificationController@store')->name('notification.store');
		route::get('/get-data','NotificationController@getallnotification')->name('notification.get-data');
		route::post('/delete','NotificationController@delete')->name('notification.delete');
		route::post('/editnotification','NotificationController@editnotification')->name('notification.editnotification');
		route::post('/update','NotificationController@update')->name('notification.update');
	});
	

});
