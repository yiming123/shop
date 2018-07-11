<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Cate::select(DB::raw('*,concat(path,id) as paths'))->
            orderBy('paths')->
            where('cname','like','%'.$request->input('search').'%')->
            paginate($request->input('num',10));

        foreach($res as $k => $v){
            //获取path
            // $paths = explode(',',$v->path);
            //$evl = count($paths)-2;

            $rs = substr_count($v->path,',')-1;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->cname;
        }

        return view('admin.cate.index',[
            'title'=>'分类列表',
            'res'=>$res,
            'request'=>$request

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $res = Cate::select(DB::raw('*,concat(path,id) as paths'))->
            orderBy('paths')->
            where('cname','like','%'.$request->input('search').'%')->
            paginate($request->input('num',10));

        foreach($res as $k => $v){
            //获取path
            // $paths = explode(',',$v->path);
            //$evl = count($paths)-2;

            $rs = substr_count($v->path,',')-1;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->cname;
        }

        
        return view('admin.cate.add',['title'=>'分类添加页面','res'=>$res]);
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
        $res = $request->except('_token');
        // dd($res);

        if($res['pid'] == '0'){

            $res['path'] = '0,';

        } else {

            // id=传过来的pid查询一条
            $foo = Cate::where('id',$res['pid'])->first();
            
            // 路径=查询出的一条父类path+查询出的一条
            $res['path'] = $foo->path.$foo->id.',';
        
        }
        
        $data = Cate::create($res);

        try{
            if($data){
            
                return redirect('/admin/cate')->with('success','添加成功');
            
            } 
        } catch(\Exception $e){

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
        //
        $info = Cate::find($id);

        $res = Cate::select(DB::raw('*,concat(path,id) as paths'))->orderBy('paths')->get();

        foreach ($res as $k => $v) {
            
            //数一下几个 , 
            $rs = substr_count($v->path,',')-1;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->cname;
        }

        return view('admin.cate.edit',['title'=>'分类修改','res'=>$res,'info'=>$info]);
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
        //
         $res = $request->except('_token','_method');

        try{
            $data = Cate::where('id',$id)->update($res);

            if($data){

                return redirect('/admin/cate')->with('success','修改成功');
            
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');

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
        $cate=Cate::where('pid','=',$id)->first();

        //
        //判断有没有子类
        //如果有子类不能删除
        if($cate){

            return redirect('/admin/cate')->with('error','删除失败');
       
        }

        try {
            $res = Cate::where('id',$id)->delete();
            //如果没有就可以删除

            if($res){
                return redirect('/admin/cate')->with(['success'=>'删除成功']);
            }

        } catch (\Exception $e) {

                return redirect('/admin/cate')->with('error','删除失败');
        }
    }


    public static function getsubcate($pid)
    {
 
        $cate = Cate::where('pid',$pid)->get();

        $arr = [];

        foreach ($cate as $k => $v) {
            
            if($v->pid==$pid){

                $v->sub = self::getsubcate($v->id);

                $arr[] = $v;

            }

        }

        return $arr;
 
    }

}
