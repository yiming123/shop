<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use Hash;
use App\Models\Admin\User;

class LoginController extends Controller
{
    //
	public function login()
	{


		return view('admin.login.login',['title'=>'后台登陆页面']);
	}
	public function dologin(Request $request )
	{

		//获取数据
		$res = $request->except('_token');
		// dd($res);
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

		//验证码
		if(session('code') != $res['code']){

			return back()->with('error','验证码不正确');
		}

		session(['name'=>$name->uname]);

		session(['image'=>$name->image]);

		return redirect('/admin/index');

	}

	//生成验证码方法
		public function captcha()
		{
		    $phrase = new PhraseBuilder;
		    // 设置验证码位数
		    $code = $phrase->build(4);
		    // 生成验证码图片的Builder对象，配置相应属性
		    $builder = new CaptchaBuilder($code, $phrase);
		    // 设置背景颜色
		    $builder->setBackgroundColor(123, 203, 230);
		    $builder->setMaxAngle(25);
		    $builder->setMaxBehindLines(0);
		    $builder->setMaxFrontLines(0);
		    // 可以设置图片宽高及字体
		    $builder->build($width = 90, $height = 30, $font = null);
		    // 获取验证码的内容
		    $phrase = $builder->getPhrase();
		    // 把内容存入session
		    //可以使用
		    // Session::flash('code', $phrase);

		    //
		    session(['code'=>$phrase]);


		    // 生成图片
		    header("Cache-Control: no-cache, must-revalidate");
		    header("Content-Type:image/jpeg");
		    $builder->output();
		}

		//退出
		public function logout()
		{
			//将session里面存储的信息删除
			session(['name'=>'']);
			//退出后跳转到登陆页面
			return redirect('admin/login');
		}

}
