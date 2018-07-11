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
            ->Join('goodspic', 'goods.id', '=', 'goodspic.gid')
            ->Join('cart', 'goods.id', '=', 'cart.gid')
            ->get();
         // dd($res);
    	return view('home.cart.cart',['res'=>$res]);
    }

    public function ajaxcart(Request $request)
    {
    	$id = $request->input('id');
    	//构造器删除
    	$data = DB::table('cart')->where('cid',$id)->delete();

    	$count = DB::table('cart')->count();

    	echo $count;

    	//模型删除
    	// Cart::where('id',$id)->delete();

    	//Cart::destroy($id);
/*
    	if($data){

    		echo 1;
    	} else {

    		echo 0;
    	}

*/
    }
}
