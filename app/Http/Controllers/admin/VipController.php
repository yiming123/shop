<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VipController extends Controller
{
    //
    public function index()
    {
    	return view('admin.vip.index',['title'=>'会员列表']);
    }
}
