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
Route::resource('/admin/cate','admin\CateController');
Route::resource('/admin/notice','admin\NoticeController');
Route::resource('/admin/goods','admin\GoodsController');

Route::get('/admin/promotion/create/{id}','admin\PromotionsController@create');
Route::post('admin/promotion/store/{id}','admin\PromotionsController@store');
Route::any('/admin/promotion/index','admin\PromotionsController@index');
Route::any('/admin/promotion/edit/{id}','admin\PromotionsController@edit');
Route::any('/admin/promotion/update/{id}','admin\PromotionsController@update');
Route::any('/admin/promotion/delete/{id}','admin\PromotionsController@delete');



Route::any('/test','admin\PromotionsController@test');

Route::get('/admin/form','admin\UserController@store');

// 前台路由
Route::any('/home','home\HomeController@index');

Route::any('/home/detail/{id}','home\HomeController@detail');