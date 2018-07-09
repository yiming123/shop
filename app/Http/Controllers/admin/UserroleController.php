<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Hash;
use App\Models\Admin\User;

class UserroleController extends Controller
{
	public function test()
	{
		echo 1;
		// //显示修改页面
		// $res = User::find($id);
		// // dump($res);
		return view('admin.user.role',['title'=>'用户名修改页面']);

	}
}