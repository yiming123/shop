<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Ad;
use Config;
//use Ad;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
       $res = $request->all();
        //dump($res);
       $res = Ad::where('adname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',10));
        $arr = ['num'=>$request->input('num'),
        'search'=>$request->input('search')];
        return view('admin.ad.index',
            ['title'=>'广告列表',
            'res'=>$res,
            'arr'=>$arr,
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
        return view('admin.ad.add',[
        'title'=>'广告的添加页面'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
       // dump ($request);
        $this->validate($request, [
        'adname' => 
        'required|regex:/\S/',
     
        
        
         'adetime' =>
         'required|regex:/\S/',
          'content' =>
         'required|regex:/\S/',
         //'url' =>
         //'required|regex:/\S/',
    ],
        [
            'adname.required'=>'广告商家名不能为空',
            'adname.regex'=>'用户名格式不正确',
          
           'adstime.required'=>'添加时间不能为空',
            
            'adetime.required'=>'结束时间不能为空',
            'content.required'=>'广告描述内容不能为空',
            'url.required'=>'广告路径不能为空'

        ]);
        $res = $request->except(['_token']);
        //dd($res);
        //url
        if ($request->hasFile('url')){

            //设置名字
            $name = str_random(8).time();
            //获取后缀
            $suffix= $request->file('url')->getClientOriginalExtension();
            //移动
            $aa= $request -> file('url')->move('./uploads/',$name.'.'.$suffix);
            //dd($aa);
        }
        //存数据表
        $res['url']= Config::get('app.path').$name.'.'.$suffix;
       // dd($res);
   //try{
        $data = Ad::create($res);
        //dd($data);
        if($data){
            return redirect('/admin/ad/index')->with('success','添加成功');
          }
       /* }catch(\Exception $e){
            return back()->with('error','添加失败');
        }
*/
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
    
        $res = Ad::find($id);
       /* dump($res);
        dump($res->url);*/
        return view('admin.ad.edit',['title'=>'广告的修改页面',
            'res'=>$res
            ]);
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
        $foo = Ad::find($id);
        $urls  = $foo-> url;
        //dump($urls);
      /*  $info = '@'.unlink('.'.$urls);
        dump($info);*/
       // if(!$info) return;

        $res = $request->except('_token','url','_method');
        //dump($res);
        if($request->hasFile('url')){
            //设置名字
            $name = str_random(10).time();
            //获取后缀
            $suffix = $request->file('url')->getClientOriginalExtension();
            //移动
            $request ->file('url')->move('./uploads/',
             $name.'.'.$suffix);

        }
        //存数据表
        $res['url']= Config::get('app.path').$name.'.'.$suffix;
        //dd($res);
        //模型 出错
   // try{
        $data  =  Ad::where('adid',$id)->update($res);
        if($data){
            return redirect('/admin/ad/index')->with('success','修改成功');
         }
        //}catch(\Exception $e){
          //  return back()->width('error');
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo 1111;
        $res = Ad::where('adid',$id)->delete();
        if($res){
            return redirect('/admin/ad/index')->with('success','删除成功');
        }
    }
}
