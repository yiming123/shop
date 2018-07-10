<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Auth;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // echo 122;
        $res = Auth::paginate(10);
        // dump($res);
        return view('admin.auth.index',[
            'title'=>'角色列表页面',
            'res'=>$res
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
         return view('admin.auth.add',['title'=>'权限添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
          $res = $request->except('_token');
        // dd($res);
        //模型
            try{

            $data = Auth::create($res);
            if($data){

                return redirect('/admin/auth')->with('success','添加成功');
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
        $res = Auth::find($id);
        return view('admin.auth.edit',[
            'title'=>'角色修改页面',
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
        //
        //接收查询的数据
            $res = $request->except('_token','_method');

            // dd($res);
             //模型
            try{

                 $data = Auth::where('id',$id)->update($res);
                if($data){

                     return redirect('/admin/auth')->with('success','修改成功');
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
        //通过id查询到信息删除
        $res = Auth::where('id',$id)->delete();

        if($res){

            return redirect('/admin/auth')->with('success','删除成功');
        }
        
    }
}
