<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Hash;
use App\Models\admin\Orders;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Orders::paginate(10);
        return view('admin.orders.index',[
            'title'=>'用户的列表页',  
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
        $res=Orders::find($id);

        // dd($res);
         return view('admin.orders.edit',[

            'title'=>'用户的修改页面',
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
        // dd($id);
        $res = $request->except('_token','_method','profile','oid'); 
        // dd($res);
        try{
             $data = Orders::where('oid',$id)->update($res);
             dd($data);

            if($data){
                return redirect('/admin/orders/index')->with('success','修改成功');
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
        // dd($id);
         $res = Orders::where('oid',$id)->delete();
        //第二种
        // $res = User::destroy($id);

        if($res){

            return redirect('/admin/orders')->with('success','删除成功');
        }

    }
}
