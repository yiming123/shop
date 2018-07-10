<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Hash;
use Mail;
class RegisterController extends Controller
{
    //
    public function registe()
    {
    	return view('home.registe.registe');
    }

    public function doregiste(Request $request)
    {
    	//表单验证
    	 $this->validate($request, [
				'uname' => 'required|regex:/^\w{6,12}$/',
				'pwd' => 'required|regex:/^\S{6,12}$/',
				'repwd'=>'same:pwd',
				'tell'=>'required|regex:/^1[3456789]\d{9}$/',
				],[
				'uname.required'=>'用户名不能为空',
				'uname.regex'=>'用户名格式不正确',
				'pwd.required'=>'用户密码不能为空',
				'pwd.regex'=>'用户密码格式不正确',
				'repwd.same'=>'两次密码不一致',
				'tell.required'=>'手机号不能为空',
				'tell.regex'=>'手机号格式不正确'
			]);

    	 $res = $request->except('_token','repwd');
    	 // dump($res);
    	 $res['pwd'] = Hash::make($request->input('pwd'));
    	 $res['sex'] = '0';

    	 $res['token'] = str_random(50);

   

			  $data = User::create($res);
			  // dump($data);

			  $uid = $data->uid;
			  // dump($id);
			  $token = $data->token;


			if($data){

				Mail::send('email.remind', ['uid'=>$uid,'token'=>$token], function($m) use ($res) {

	            $m->from(env('MAIL_USERNAME'), '百度-人力资源部');

	            $m->to($res['email'], $res['uname'])->subject('百度-入职邀请');
	        });

				return view('home.registe.activate');
				
				}
			

    }
    //邮箱激活
    public function activate(Request $request)
    {

    	$uid = $request->input('uid');

    	$token = $request->input('token');

    	$data = User::where('uid',$uid)->first();

    	if($data->token != $token){

    		return back();

    	} else {

    		return redirect('home/login')->with('success','激活成功');
    	}
    }
}
