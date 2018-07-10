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
	public function pass(Request $request)
	{

		// $uname = $request->session()->get('name');
		// $user_info = User::where('uname',$uname)->first();
		return view('admin.pass.pass',['title'=>'修改密码']);
	}

	public function change(Request $request)
	{

		//密码验证
		 $this->validate($request, [
						'pwd' => 'required|regex:/^\S{6,12}$/',
						'newpwd'=>'required|regex:/^\S{6,12}$/',
						'newrepwd'=>'same:newpwd',
						],[
						'pwd.required'=>'用户密码不能为空',
						'pwd.regex'=>'用户密码格式不正确',
						'newpwd.required'=>'新密码不能为空',
						'newpwd.regex'=>'新密码格式不正确',
						'newrepwd.same'=>'两次密码不一致'
					]);
		//获取数据
		$res = $request->except('_token');
		// dd($res);

		$uname = $request->session()->get('name');
		// //查询数据库信息
		// 第一种方法
		$user_info = User::where('uname',$uname)->first();
		//地二中方法
		/*$user_info = User::where(['pwd'=>$pwd,'name'=>$name])->first();
		//第三种方法
		$where = array(
					'pwd' => $pwd ,
					'name' => $name ,
					'sex' => $sex ,
				);
		$user_info = User::where($where)->first();

		*/

		//数据库里的密码
		$user_pwd = $user_info['pwd'];
		// dd($user_pwd);

		if (!Hash::check($res['pwd'],$user_info->pwd) ){
		//$pwd(用户输入的密码 加密后 与 数据库中的 密码作对比
			//如果密码对比失败,back回去
			return back()->with('error','旧密码不正确');

		}

		//模型
					try{

					$data = User::where('uid',$id)->update($user_info);
					if($data){

						return redirect('/admin/login')->with('success','修改成功');
						}
					}catch(\Exception $e){
						return back()->with('error');
					}

	}
}
