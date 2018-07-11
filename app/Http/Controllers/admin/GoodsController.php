<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Goods;
use App\Models\Admin\Goodspic;

use App\Models\Admin\Cate;
use DB;


class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $gname = Goods::orderBy('id','asc')->where(function($query) use($request){
            
            // 检测关键字
            $gname = $request->input('gname');
            
            $price = $request->input('price');

            // 如果用户名不为空
            if(!empty($gname)){
            
                $query->where('gname','like','%'.$gname.'%');
            
            }

            // 如果邮箱不能为空
            if(!empty($price)){
            
                $query->where('price','like','%'.$price.'%');
            
            }

        })->paginate($request->input('num',5));

        $ids = Goods::all();
    
        foreach ($ids as $k => $v) {
           
            $id = $v->id;
            
        }

        $gpic = Goodspic::all();

        $cates = Cate::all();

        return view('admin.goods.index',['title'=>'商品浏览列表','res'=>$gname,'request'=>$request,'gpic'=>$gpic,'cates'=>$cates]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $res = Cate::select(DB::raw('*,concat(path,id) as paths'))->orderBy('paths')->get();
         
        foreach($res as $k => $v){
            //获取path
            $rs = substr_count($v->path,',')-1;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->cname;
        }
        return view('admin.goods.add',['title'=>'商品添加页','res'=>$res]);
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
        $res = $request->except('_token','gpic[]');
        
        // dump($res);
        
        $data = Goods::create($res);

        $gid = $data->id;
        
        if($request->hasFile('gpic')){

            // 获取传过来的图片
            $gp = $request->file('gpic');
            // dd($gp);

            // 定义一个数组用来存储所有图片 形成二维数组
            $goodpc = [];

            // 遍历传过来的图片
            foreach ($gp as $k => $v) {

                // 把每一个图片存入一个数组中 
                $gc = [];

                // 设置名字
                $name = str_random(10).time();

                // 获取后缀
                $suffix = $v->getClientOriginalExtension();

                // 移动
                $v->move('./uploads/',$name.'.'.$suffix);

                $gc['gid'] = $gid;

                $gc['gpic']='/uploads/'.$name.'.'.$suffix;

                $goodspc[] = $gc;
            }
        }

        $goods = Goods::find($gid);
        // dd($goods);

        try{
            $data = $goods->many()->createMany($goodspc);
            // dd($data);

            if($data){
            
                return redirect('/admin/goods')->with('success','添加成功');
            }

        } catch (\Exception $e){

            return back()->with('error','添加失败');

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
        $cate = Cate::select(DB::raw('*,concat(path,id) as paths'))->
            orderBy('paths')->
            get();
            
        foreach($cate as $k => $v){
            //获取path
            // $paths = explode(',',$v->path);
            //$evl = count($paths)-2;

            $rs = substr_count($v->path,',')-1;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$rs).'|--'.$v->cname;
        }

        $goodsone = Goods::where('id',$id)->first();

        $goodspic = Goodspic::where('gid',$id)->get();

        return view('admin.goods.edit',[
            'title'=>'商品的修改',
            'goodsone'=>$goodsone,
            'goodspic'=>$goodspic,
            'cate'=>$cate

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
        $res = $request->except('_token','gpic','_method');

        $info = Goods::where('id',$id)->update($res);

        //商品图片
        if($request->hasFile('gpic')){

            $gp = $request->file('gpic');

            $goodspc= [];

            foreach($gp as $k => $v){

                $gc = [];

                //设置名字
                $name = str_random(10).time();

                //获取后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                $v->move('./uploads/',$name.'.'.$suffix);

                $gc['gid'] = $id;

                $gc['gpic'] = '/uploads/'.$name.'.'.$suffix;

                $goodspc[] = $gc;

            }
        }
         // $delete = Goods::find($id)->
// dd($id);
        $data = DB::table('goodspic')->insert($goodspc);

       

        if($data){
            return redirect('/admin/goods')->with('success','修改成功');
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
        $goods = Goods::find($id);

        $goods->delete();

        $res = $goods->many()->delete();

        // dump($res);
    }
        
}
