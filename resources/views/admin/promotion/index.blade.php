@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> Simple Table</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>促销商品名称</th>
                    <th>促销商品价格</th>
                    <th>开始促销时间</th>
                    <th>结束促销时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($res as $k => $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->price}}</td>
                    <td>{{$v->str_time}}</td>
                    <td>{{$v->sto_time}}</td>
                    <td>
                    	<a href="/admin/promotion/edit/{{$v->id}}">修改</a>
                    	<a href="/admin/promotion/delete/{{$v->id}}">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection