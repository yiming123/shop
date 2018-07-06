<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Session;
use Hash;
class PassController extends Controller
{
    //
    public function pass()
    {

    	return view('admin.pass.pass',['title'=>'修改密码']);
    }

    public function change(Request $request)
    {
    	//密码验证
    	/* $this->validate($request, [
                        'pwd' => 'required|regex:/^\S{6,12}$/',
                        'newpwd'=>'required|regex:/^\S{6,12}$/',
                        'newrepwd'=>'required|regex:/^\S{6,12}$/',
                        ],[
                        'pwd.required'=>'用户密码不能为空',
                        'pwd.regex'=>'用户密码格式不正确',
                        'tell.required'=>'手机号不能为空',
                        'tell.regex'=>'手机号格式不正确'
                    ]);*/
    	//获取数据
    	// $res = $request->except('_token');
    	// dd($res);

    	//在数据库中查询用户名是否存在,进行判断
		

		//判断密码,将获取到的密码和数据库的密码进行对比
		// if(!Hash::check($res['pwd'],$pass->pwd)){

		// 	//r如果密码对比失败,back回去
		// 	return back()->with('error','密码不正确');
		// }

    }
}
