<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      //dd('111');
        $res = $request->all();
      
       $res = Comment::where('oid','like','%'.$request->input('search').'%')->
        paginate($request->input('num',10));
        $arr = ['num'=>$request->input('num'),
        'search'=>$request->input('search')];
        return view('admin.comment.index',
            ['title'=>'评论列表',
            'res'=>$res,
            'arr'=>$arr,
            'request'=>$request
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo 111;
        return view('admin.comment.add',[
        'title'=>'评论的添加页面'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('111');
        //表单验证
       // dump ($request);
     $this->validate($request, [
        
         'star' =>
         'required|regex:/\S/',

         'addtime' =>
         'required|regex:/\S/',
         

        'content' => 
        'required|regex:/\S/',

        'zcontent' => 
        'required|regex:/\S/',
     
        
        
     
    ],
        [
            
            //'content.regex'=>'评论格式不正确',
          
           //'adstime.required'=>'添加时间不能为空',
            'star.required'=>'评论等级不为空',

            'addtime.required'=>'评论时间不能为空',
            'content.required'=>'评论内容不能为空',
            'zcontent.required'=>'追加内容不能为空',

            //'url.required'=>'广告路径不能为空'

        ]);
            $res = $request->except(['_token']);
            //dd($res);
        //模型   出错
       // try{
            $data = Comment::create($res);

            if($data){
                return redirect('/admin/comment')->with('success','添加成功');
            }
       // }catch(\Exception $e){

         //   return back();

        //}


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
         $res = Comment::find($id);
        dump($res);
       
        return view('admin.comment.edit',['title'=>'广告的修改页面',
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
         //表单验证
         $this->validate($request, [
        
         'star' =>
         'required|regex:/\S/',

         'addtime' =>
         'required|regex:/\S/',
         

        'content' => 
        'required|regex:/\S/',

        'zcontent' => 
        'required|regex:/\S/',
     
        
        
     
    ],
        [
            
            //'content.regex'=>'评论格式不正确',
          
           //'adstime.required'=>'添加时间不能为空',
            'star.required'=>'评论等级不为空',

            'addtime.required'=>'评论时间不能为空',
            'content.required'=>'评论内容不能为空',
            'zcontent.required'=>'追加内容不能为空',

            //'url.required'=>'广告路径不能为空'

        ]);
          

        $res = $request->except('_token','_method');
        //dd($res);



         //模型   出错
        //try{
            $data = Comment::where('cid',$id)->update($res);

            if($data){
                return redirect('/admin/comment')->with('success','修改成功');
            }
        //}catch(\Exception $e){

          //  return back()->with('error');

        //}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $res = Comment::where('cid',$id)->delete();
       // dump($res);
        if($res){
            return redirect('/admin/comment')->with('success','删除成功');
        }
    }
}
