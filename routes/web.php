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

Route::get('/', function () {
    return view('welcome');
});

//后台路由组

Route::group([],function(){
	//后台首页
	Route::any('admin/index','admin\IndexController@index');
	//友情链接管理
	Route::any('admin/link/index','admin\LinkController@index');
	Route::any('admin/link/add','admin\LinkController@create');
	Route::any('admin/link/edit/{id}','admin\LinkController@edit');
	Route::any('admin/link/update/{id}','admin\LinkController@update');
	Route::any('admin/link/destroy/{id}','admin\LinkController@destroy');
	Route::any('admin/link','admin\LinkController@store');
	//订单管理
	Route::resource('admin/orders','admin\OrdersController');
});
//前台路由组
Route::group([],function(){
	
});

Route::group([],function() {

	Route::any('admin/index','admin\IndexController@index');
	Route::any('admin/ad/add','admin\ad\AdController@create');
	Route::any('admin/ad/index','admin\ad\AdController@index');
});


Route::resource('/admin/cate','admin\CateController');
Route::resource('/admin/notice','admin\NoticeController');

