<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Hash;
use DB;
use App\Models\admin\Orders;
use App\Models\admin\User;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        // $res = Orders::paginate(10);
        $res = DB::table('orders')
            ->leftJoin('user', 'user.uid', '=', 'orders.uid')
            ->where(function($query) use($request){
                //检测关键字
                $oid = $request->input('oid');
                $gname = $request->input('uname');
                //如果用户名不为空
                if(!empty($oid)) {
                    $query->where('oid','like','%'.$oid.'%');
                }
                //如果邮箱不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
            })

            ->paginate($request->input('num', 1));

        // dd($res);        

        return view('admin.orders.index',[
            'title'=>'订单列表页',  
            'res'=>$res,
            'request'=> $request
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

            'title'=>'订单修改页面',
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
             // dd($data);

            if($data){
                return redirect('/admin/orders')->with('success','修改成功');
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
         $res = Orders::where('oid',$id)->delete();
         $data = DB::table('orderdetails')->where('oid',$id)->delete();

        if($res && $data){

            return redirect('/admin/orders')->with('success','删除成功');
        }

    }
    public function del(Request $request,$id)
    {
        $res = DB::table('orderdetails')->where('odid',$id)->delete();
        $oid = $request->oid;
        if($res){

            return redirect('/admin/orders/details/{$oid}')->with('success','删除成功');
        }
    }
    public function details($id)
    {
        $res = DB::table('orderdetails')->where('oid',$id)
        ->Join('goods', 'goods.id', '=', 'orderdetails.gid')
        ->paginate(5);
        try{
            foreach ($res as $k => $v) {
                $arr[] = DB::table('goodspic')->where('gid',$v->gid)->get();         
            }
            // dd($arr);
            foreach ($arr as $k1 => $v1) {
                foreach ($v1 as $k2 => $v2) {
                    $a[] =$v2;
                }
            }            
        }catch(\Exception $e){

            $a = 0;
        }
        return view('admin.orders.details',['title'=>'订单详情','res'=>$res,'a'=>$a]);
    }
    public function ajaxorders(Request $request)
    {
        $res['num'] = $request->input('nnum');

        $ids = $request->input('odid');

        try{
            $data = User::where('odid',$ids)->update($res);
            
            if($data){

                echo 1;
            }

        }catch(\Exception $e){

                echo 0;
        }
    }
}
