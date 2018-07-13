<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettlementController extends Controller
{
    //
    public function receipt(Request $request)
    {
    	return view('home.receipt.getinfo',['title'=>'结算页']);
    }
    public function suc()
    {
    	return view('home.receipt.index',['title'=>'生成订单']);
    }
}
