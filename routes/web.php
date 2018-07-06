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



//后台登陆
	Route::any('admin/login','admin\LoginController@login');
	Route::any('admin/dologin','admin\LoginController@dologin');
	Route::any('admin/captcha','admin\LoginController@captcha');
//后台退出
	Route::any('admin/logout','admin\LoginController@logout');
//修改密码
	Route::any('admin/pass','admin\PassController@pass');
	Route::any('admin/change','admin\PassController@change');


//后台路由组
Route::group([],function(){

	//后台首页
	Route::any('admin/index','admin\IndexController@index');


	//后台用户管理
	Route::resource('admin/user','admin\UserController');
	//角色管理
	Route::resource('admin/role','admin\RoleController');


});





//前台路由组
Route::group([],function(){




});


