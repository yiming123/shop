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
Route::group([],function() {

	Route::any('admin/index','admin\IndexController@index');
	Route::any('admin/ad/add','admin\ad\AdController@create');
	Route::any('admin/ad/index','admin\ad\AdController@index');
});
