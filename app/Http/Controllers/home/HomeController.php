<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Admin\Goodspic;
use App\Models\Admin\Promotions;
use App\Models\Admin\Notice;

class HomeController extends Controller
{
    //
    public function index()
    {

    	$res = Goods::all();

    	$data = Goodspic::all();

    	$pro = Promotions::all();
    	// dd($pro);

        $notice = Notice::all();
    	
    	return view ('home.index.index',['title'=>'前台首页','res'=>$res,'data'=>$data,'pro'=>$pro,'notice'=>$notice]);
    }

    public function detail($id)
    {
    	$res = Goods::where('id',$id)->get();

    	$data = Goodspic::where('gid',$id)->get();

    	return view('home.index.detail',['title'=>'商品详情','res'=>$res,'data'=>$data]);
    }
}
