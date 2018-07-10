<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login');
    }

    public function dologin(Request $request)
    {
    	//获取用户数据
    	$res = $request->except('_token');
    	//在数据库中查询用户名是否存在,进行判断
		$name = User::where('uname',$res['uname'])->first();
		// dump($name);
		//判断用户名  如果不存在,back回去
		if(!$name){

			return back()->with('error','用户名或密码不正确');
		}

		//判断密码,将获取到的密码和数据库的密码进行对比
		if(!Hash::check($res['pwd'],$name->pwd)){

			//r如果密码对比失败,back回去
			return back()->with('error','用户名或密码不正确');
		}

		session(['name'=>$name->uname]);

		return redirect('/home');

    }
}
