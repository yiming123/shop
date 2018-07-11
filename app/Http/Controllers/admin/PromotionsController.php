<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Admin\Promotions;

class PromotionsController extends Controller
{
    //促销商品添加页面
    public function create($id)
    {
    	$data = Goods::where('id',$id)->first();
        
        return view('admin.promotion.add',['title'=>'促销商品添加','data'=>$data]);
    }

    // 增加促销商品操作
    public function store(Request $request,$id)
    {
    	$res = $request->except('_token');

    	$re = Goods::where('id',$id)->first();
    	
    	$id = $re['id'];

		$res['gid'] = $id;
		
    	try {
            $data = Promotions::create($res);

            if($data){
                return redirect('/admin/promotion/index')->with(['success'=>'添加成功']);
            }

        } catch (\Exception $e) {

                return back()->with('error','添加失败');
        }
    }

    // 促销商品浏览页面
    public function index()
    {

    	$res = Promotions::paginate(5);

    	return view('admin.promotion.index',['title'=>'促销商品浏览页面','res'=>$res]);
    
    }

    // 促销商品修改页面
    public function edit($id)
    {

    	$data = Promotions::where('id',$id)->first();
    	
    	return view('admin.promotion.edit',['title'=>'促销商品修改','data'=>$data]);
    
    }

    // 促销商品修改操作
    public function update(Request $request,$id)
    {

    	$res = $request->except('_token');
    	

    	try{

    		$data =Promotions::where('id',$id)->update($res);

    		if($data){

    			return redirect('/admin/promotion/index')->with('success','修改成功');
    		
    		}
    		
    	} catch (\Exception $e){

    		return back()->with('error','修改失败');

    	}
    }

    public function delete($id)
    {


    	$data = Promotions::where('id',$id)->first();
        // dd($data);
        try{
            if($data){

                $res = Promotions::where('id',$id)->delete($data);

                return redirect('/admin/promotion/index')->with('success','删除成功');

            }
        } catch (\Exception $e){

            return back()->with('error','删除失败');

        }
    }


    public function test()
    {
    	return view('/admin/promotion/test');
    }
    
}
