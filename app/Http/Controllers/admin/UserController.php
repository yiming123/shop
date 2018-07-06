<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Hash;
use App\Models\Admin\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // //单条件搜索
        // $res = User::where('uname','like','%'.$request->input('search').'%')->paginate($request->input('num',10));
        // //定义一个数组
        // $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];
        // return view('admin.user.index',['title'=>'用户列表页面',
        //     'res'=>$res,
        //     'arr'=>$arr
        //     ]);
        //多条件查询
        $res = User::orderBy('uid','asc')
        ->where(function($query) use($request){
            //检测关键字
            $uname = $request->input('search');
            $sex = $request->input('sex');

            //判断如果用户名不为空
            if(!empty($uname)){

                $query->where('uname','like','%'.$uname.'%');
            }

            //如果性别不为空
            if(!empty($sex)){

                $query->where('sex','like','%'.$sex.'%');
            }

        })
        ->paginate($request->input('num',5));
        return view('admin.user.index',[
            'title'=>'用户列表页面',
            'res'=>$res,
            'request'=>$request
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.user.add',['title'=>'用户添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证:验证表单传过来的数据
        // dump($request->all());
        // required判断字段不能为空,
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
            $res = $request->except(['_token','image','repwd']);
            //头像上传
            if($request->hasFile('image')){
                //设置图片名称
                $name = str_random(8).time();
                //获取图片 后缀
                $suffix = $request->file('image')->getClientOriginalExtension();

                //将图片移动到指定位置
                $request->file('image')->move('./uploads',$name.'.'.$suffix);
            }

            //存数据表
            $res['image'] = Config::get('app.path').$name.'.'.$suffix;
            //密码加密
            $res['pwd'] = Hash::make($request->input('pwd'));

            //模型
            try{

            $data = User::create($res);
            if($data){

                return redirect('/admin/user')->with('success','添加成功');
                }
            }catch(\Exception $e){
                return back();
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                //显示修改页面
                $res = User::find($id);
                // dump($res);
                return view('admin.user.edit',['title'=>'用户名修改页面','res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                //表单验证
                  $this->validate($request, [
                        'uname' => 'required|regex:/^\w{6,12}$/',
                        'tell'=>'required|regex:/^1[3456789]\d{9}$/',
                        ],[
                        'uname.required'=>'用户名不能为空',
                        'uname.regex'=>'用户名格式不正确',
                        'tell.required'=>'手机号不能为空',
                        'tell.regex'=>'手机号格式不正确'
                    ]);
                      //接收查询的数据
                      $foo = User::find($id);
                      $urls = $foo->image;
                      // dd($urls);
                    $res  = $request->except('_token','_method','image');
                    // dump($res);

                             //头像上传
                    if($request->hasFile('image')){
                        //设置图片名称
                        $name = str_random(8).time();
                        //获取图片 后缀
                        $suffix = $request->file('image')->getClientOriginalExtension();

                        //将图片移动到指定位置
                        $request->file('image')->move('./uploads',$name.'.'.$suffix);
                    }

                    //存数据表
                    $res['image'] = Config::get('app.path').$name.'.'.$suffix;

                    //模型
                    try{

                    $data = User::where('uid',$id)->update($res);
                    if($data){

                        return redirect('/admin/user')->with('success','修改成功');
                        }
                    }catch(\Exception $e){
                        return back()->with('error');
                    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                    //通过id获取要删除的数据,获得图片的地址
                    $foo = User::find($id);

                    $urls = $foo->image;

                    $info = '@'.unlink('.'.$urls);

                    if(!$info) return;
                    $res = User::where('uid',$id)->delete();
                    if($res){

                        return redirect('/admin/user')->with('success','删除成功');
                    }
    }
}
