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

//修改角色
	Route::any('admin/test/{id}','admin\UserController@test');
	Route::any('admin/dotest','admin\UserController@dotest');

//后台路由组
Route::group([],function(){
	//后台首页
	Route::any('admin/index','admin\IndexController@index');

	//后台用户管理
	Route::resource('admin/user','admin\UserController');

	//角色管理
	Route::resource('admin/role','admin\RoleController');
	//权限管理
	Route::resource('admin/auth','admin\AuthController');


});




//前台注册
Route::any('home/registe','home\RegisterController@registe');
Route::any('home/doregiste','home\RegisterController@doregiste');
Route::any('home/activate','home\RegisterController@activate');

//前台登陆
Route::any('home/login','home\LoginController@login');
Route::any('home/dologin','home\LoginController@dologin');


//前台路由组
Route::group([],function(){

//前台首页
Route::get('/home','home\HomeController@index');
Route::resource('home/pres','home\PresController');


});


