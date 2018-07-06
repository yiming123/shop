<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use App\Models\Admin\Dis;

class DisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $res = Dis::where('oid','like','%'.$request->input('search').'%')->
                paginate($request->input('num',10));
        // dd($res['num']);
        $arr = ['num'=>$request->input('num'),'search'=>$request->input('search')];
        //用户名
        return view('admin.dis.index',[
            'title'=>'配送列表页',
            'res'=>$res,
            'arr'=>$arr
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
        return view('admin.dis.add',['title'=>'配送添加页']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
         $res = $request->except(['_token','profile','repass']);
         // dd($res);
          try{
            $data = Dis::create($res);
            if($data){
                return redirect('/admin/dis')->with('success','添加成功');
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
        //
        $res = Dis::find($id);
        return view('admin.dis.edit',['title'=>'配送修改页面','res'=>$res]);
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
        $res = $request->except('_token','_method','profile');    
        try{
             $data = Dis::where('did',$id)->update($res);

            if($data){
                return redirect('/admin/dis')->with('success','修改成功');
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
        //
         $res = Dis::where('did',$id)->delete();
        if($res){
            return redirect('/admin/dis')->with('success','删除成功');
        
        }
    }
}
