<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use App\Models\admin\Lunbo;

class LunboController extends Controller
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
       $res = Lunbo::where('lname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',10));
        $arr = ['num'=>$request->input('num'),
        'search'=>$request->input('search')];
        return view('admin.Lunbo.index',
            ['title'=>'列表',
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
        //
         return view('admin.lunbo.add',[
        'title'=>'轮播图片的添加页面'
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
        //echo 111;
         $res = $request->except(['_token']);
        //dd($res);
        //url
        if ($request->hasFile('url')){

            //设置名字
            $name = str_random(10).time();
            //获取后缀
            $suffix= $request->file('url')->getClientOriginalExtension();
            //移动
            $aa= $request -> file('url')->move('./uploads/',$name.'.'.$suffix);
            //dd($aa);
            //存数据表
            $res['url']= Config::get('app.path').$name.'.'.$suffix;
        }
        
       // dd($res);
   try{
        $data = Lunbo::create($res);
        //dd($data);
        if($data){
            return redirect('/admin/lunbo')->with('success','添加成功');
          }
       }catch(\Exception $e){
            return back()->with('error','添加失败');
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
        $res = Lunbo::find($id);
       //dump($res);
        //dump($res->url);
        return view('admin.lunbo.edit',['title'=>'轮播的修改页面',
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
        $foo = Lunbo::first();
        //dd($foo);
        $urls  = $foo->url;
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
             //存数据表
        $res['url']= Config::get('app.path').$name.'.'.$suffix;
        }
      
      
        //模型 出错
     try{
          $data  =  Lunbo::where('lid',$id)->update($res);
          if($data){
              return redirect('/admin/lunbo')->with('success','修改成功');
          }
         }catch(\Exception $e){
           return back()->width('error');
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
        //
         $res = Lunbo::where('lid',$id)->delete();
       // dump($res);
        if($res){
            return redirect('/admin/lunbo')->with('success','删除成功');
        }
    }
}
