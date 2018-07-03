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
	//订单管理
	Route::any('admin/orders/index','admin\OrdersController@index');
	Route::any('admin/orders/update','admin\OrdersController@edit');
	//友情链接管理
	Route::any('admin/link/index','admin\LinkController@index');
	Route::any('admin/link/add','admin\LinkController@create');
	Route::any('admin/link','admin\LinkController@store');
});
//前台路由组
Route::group([],function(){
	
});