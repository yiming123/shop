<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CartController extends Controller
{
    //
    public function cart()
    {
    	// $cart = DB::table
    	// $res = DB::table('goods')->get();
    	 $res = DB::table('goods')
            ->Join('cart', 'goods.id', '=', 'cart.gid')
            ->get();
        // dd($res);
        $arr = DB::table('goodspic')->get();
        // dd($arr);
    	return view('home.cart.cart',['res'=>$res,'arr'=>$arr]);
    }

    public function ajaxcart(Request $request)
    {
        // dd($request);

    	$id = $request->input('id');
    	//构造器删除
    	$data = DB::table('cart')->where('id',$id)->delete();

    	$count = DB::table('cart')->count();

    	echo $id;

    	//模型删除
    	// Cart::where('id',$id)->delete();

    	//Cart::destroy($id);

    	// if($data){

    	// 	echo 1;
    	// } else {

    	// 	echo 0;
    	// }

    }

    public function orders(Request $request)
    {
        $id = $request->input('id');
        $arr[] = $id;
        session(['id'=>$arr]); 
        echo session('id');
        // echo $id;
        
    }
}
