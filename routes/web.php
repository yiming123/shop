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
	Route::any('admin/orders/details/{id}','admin\OrdersController@details');
	Route::any('admin/orders/del/{id}','admin\OrdersController@del');
	Route::any('admin/ajaxorders','admin\UserController@ajaxorders');
	//配送方式
	Route::resource('admin/dis','admin\DisController');

	Route::resource('/admin/cate','admin\CateController');
	Route::resource('/admin/notice','admin\NoticeController');
	Route::resource('/admin/goods','admin\GoodsController');
	Route::get('/admin/promotion/create/{id}','admin\PromotionsController@create');
	Route::post('admin/promotion/store/{id}','admin\PromotionsController@store');
	Route::any('/admin/promotion/index','admin\PromotionsController@index');
	Route::any('/admin/promotion/edit/{id}','admin\PromotionsController@edit');
	Route::any('/admin/promotion/update/{id}','admin\PromotionsController@update');
	Route::any('/admin/promotion/delete/{id}','admin\PromotionsController@delete');


	Route::resource('admin/comment','admin\CommentController');
	Route::resource('admin/ad','admin\AdController');
	Route::resource('admin/lunbo','admin\LunboController');
	Route::any('admin/vip','admin\VipController@index');
});
//前台路由组
Route::group([],function(){
	//购物车
	Route::any('/home/cart','home\CartController@cart');
	Route::any('/home/ajaxcart','home\CartController@ajaxcart');


	Route::any('/home','home\HomeController@index');
	Route::any('/home/detail/{id}','home\HomeController@detail');
});












