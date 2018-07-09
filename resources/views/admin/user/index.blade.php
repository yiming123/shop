@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

			<form action="/admin/user" method='get'>
	            <div id="DataTables_Table_1_length" class="dataTables_length">
	                <label>
	                    显示
	                    <select name="num" size="1" aria-controls="DataTables_Table_1">
	                        <option value="10" @if($request->num ==5) selected="selected" @endif>
	                            5
	                        </option>
	                        <option value="25" @if($request->num ==15) selected="selected" @endif>
	                            15
	                        </option>
	                        <option value="50" @if($request->num ==20) selected="selected" @endif>
	                            20
	                        </option>

	                    </select>
	                    条数据
	                </label>
	            </div>
	            <div class="dataTables_filter" id="DataTables_Table_1_filter">
	                <label>
	                    同户名:
	                    <input type="text" name='search' value="{{$request->search}}" aria-controls="DataTables_Table_1">
	                </label>

                     <label>
                        性别:
                        <input type="text" name='sex' value="{{$request->sex}}" aria-controls="DataTables_Table_1">
                    </label>

	                <button class='btn btn-info'>搜索</button>
	            </div>
            </form>





            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 150px;" aria-label="Browser: activate to sort column ascending">
                            用户名
                        </th>


                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 70px;" aria-label="Platform(s): activate to sort column ascending">
                            性别
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            手机号
                        </th>

                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            邮箱
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           头像
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 260px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

					@foreach($res as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class="">
                            {{$v->uid}}
                        </td>
                        <td class=" ">
                            {{$v->uname}}
                        </td>

                        <td class=" ">
                           @if($v->sex == 0)
                           女
                           @else
                           男
                           @endif

                        </td>
                        <td class=" ">
                            {{$v->tell}}

                        </td>

                        <td class=" ">
                            {{$v->email}}

                        </td>
                        <td class=" ">
                            <img src="{{$v->image}}" alt="" width='100'>

                        </td>
                         <td class=" ">
                            <a href="/admin/user/{{$v->uid}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/user/{{$v->uid}}" method="post"  style='display:inline'>
                          {{csrf_field()}}

                          {{method_field('DELETE')}}
                              <button href="" class="btn btn-warning">删除</button>

                            </form>
                            <a href="/admin/test" class='btn btn-info'>角色修改</a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>

			<style>
				.pagination li{
                    float: left;
                    height: 20px;
                    padding: 0 10px;
                    display: block;
                    font-size: 12px;
                    line-height: 20px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    background-color: #444444;



                    text-decoration: none;
                    border-right: 1px solid #232323;
                    border-left: 1px solid #666666;
                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                    border-left: 1px solid rgba(255, 255, 255, 0.15);
                    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                }

                .pagination li a{
                      color: #fff;
                }


                .pagination .active{
                    background-color: #88a9eb;
                    color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                }

                .pagination .disabled{
                        color: #666666;
                        cursor: default;
                }

                #paginate ul{

                    margin:0px;
                }
			</style>


            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

				{{$res->links()}}



            </div>
        </div>
    </div>
</div>

@endsection