@extends('layout.public')
@section('title', $title)
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

            <form action="/admin/orders" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select name="num" size="1" aria-controls="DataTables_Table_1">

                            <option value="10" @if($request->num == 10)   selected="selected" @endif>
                                10
                            </option>
                            <option value="20" @if($request->num == 20)   selected="selected" @endif>
                                20
                            </option>
                            <option value="30" @if($request->num == 30)   selected="selected" @endif>
                                30
                            </option>
                            
                        </select>
                        条数据
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        订单号:
                        <input type="text" name='oid' value="{{$request->oid}}" aria-controls="DataTables_Table_1">
                    </label>

                    <label>
                        用户名:
                        <input type="text" name='uname' value="{{$request->uname}}" aria-controls="DataTables_Table_1">
                    </label>

                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>





            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 198px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 266px;" aria-label="Browser: activate to sort column ascending">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">
                            收货人
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            收货地址
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            收货电话
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            总数量
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           总金额
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            下单时间
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            留言
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">
                            状态
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">
                           操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($res as $k => $v)

                    <tr class="@if($k % 2 == 1)  odd   @else even  @endif">
                        <td class="">
                            {{$k+1}}
                        </td>
                        <td class=" ">
                            {{$v->uname}}
                        </td>
                        <td class=" ">
                            {{$v->consigne}}
                        </td>
                        <td class=" ">
                            {{$v->address}}
                            
                        </td>
                         <td class=" ">
                            {{$v->phone}}
                            
                        </td>
                        <td class=" ">
                            {{$v->sum_num}}
                            
                        </td>
                        <td class=" ">
                            {{$v->sum_price}}
                            
                        </td>
                        <td class=" ">
                            {{$v->time}}
                            
                        </td>
                        <td class=" ">
                            {{$v->message}}
                            
                        </td>
                        <td class=" ">
                            @if($v->state == '0')待处理
                            @elseif($v->state == '1')处理中
                            @else已处理
                            @endif 
                        </td>
                         <td class=" ">
                            <a href="/admin/orders/details/{{$v->oid}}" class='btn btn-danger'>详情</a>
                            <a href="/admin/orders/{{$v->oid}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/orders/{{$v->oid}}" method="post"  style='display:inline'>
                                
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button class='btn btn-warning'>删除</button>

                            </form>
                                
                                {{csrf_field()}}
                            </form>
                            
                        </td>
                    </tr>
                 
                    @endforeach
               
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>


            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                {{$res->links()}}
            </div>
        </div>
    </div>
</div>

@endsection