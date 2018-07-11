<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Notice::paginate(5);
        // dd($res);
        return view('admin.notice.index',['title'=>'公告浏览页面','res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.notice.add',['title'=>'公告添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '11111';
        //
        $res = $request->except('_token');
        // dd($res);

        $data = Notice::create($res);
        try{
            if($data){
                return redirect('/admin/notice')->with('success','添加成功');
            }
        } catch(\Exception $e){
            return back()->with('error','添加失败');
        }

        // dump($res);
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
        $res = Notice::find($id);
        // dd($res);
        return view('admin.notice.edit',['title'=>'公告修改页面','res'=>$res]);
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
        // echo '1231';
        $data = $request->except('_method','_token');
        // dd($res);
        
        try{
            if($data){

                $res = Notice::where('id',$id)->update($data);
                
                return redirect('/admin/notice')->with('success','修改成功');
            
            } 
        } catch(\Exception $e){

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
        //
        $data = Notice::where('id',$id)->first();
        // dd($data);
        try{
            if($data){
                $res = Notice::where('id',$id)->delete($data);
                return redirect('/admin/notice')->with('success','删除成功');
            }
        } catch (\Exception $e){
            return back()->with('error','删除失败');
        }
    }
}
