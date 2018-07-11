@extends('layout.admins')

@section('title',$title)

@section('content')
 <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> {{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>内容(s)</th style="width: 100px">
                    <th>状态</th>
                    <th>操作</th>

                </tr>
            </thead>
            <tbody>
            	@foreach($res as $k => $v)
                <tr>
                    <td>{{$v['id']}}</td>
                    <td>{{$v['title']}}</td>
                    <td>{!!$v['content']!!}</td>
                    @if($v['status']==0)
	                    <td>
	                    	禁用
	                    </td>
                    @else 
	                    <td>
	                  	    启用
	                  	</td>
                  	@endif
                    <td style="width: 150px">
						<a href="/admin/notice/{{$v['id']}}/edit" class="btn btn-info">修改</a>
						
						<form action="/admin/notice/{{$v['id']}}" method="post" style="display:inline">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn btn-danger">删除</a>
						</form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <center>
        <div class="dataTables_paginate paging_full_numbers" id="paginate" style="background: #343439;border-radius: 5px;height: 70px;">
            {{$res->links()}}
        </div>
    </center>
    </div>
</div>
@endsection