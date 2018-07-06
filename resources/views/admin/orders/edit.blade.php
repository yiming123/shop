
@extends('layout.public')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">


    	<form action="/admin/orders/{{$res->oid}}" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">订单号</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='oid' value="{{$res->oid}}" readonly>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='uid' value="{{$res->uid}}" readonly>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">收货人</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='consigne' value="{{$res->consigne}}" >
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">收货地址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='address' value="{{$res->address}}" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">收货电话</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='phone' value="{{$res->phone}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">总数量</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='sum_num' value="{{$res->sum_num}}" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">总金额</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='sum_price' value="{{$res->sum_price}}" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">下单时间</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='time' value="{{$res->time}}" >
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">留言</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='message' value="{{$res->message}}" >
    				</div>
    			</div>
    			</div>
    			<div class="mws-form-row">
    				<div class="mws-form-item clearfix" >

    					<ul class="mws-form-list inline">
                            <label class="mws-form-label">状态</label>
    						<li><input type="radio" name='state' value='1' checked='checked'> <label>发货</label></li>
    						<li><input type="radio" name='state' value='0'> <label>收货</label></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-inline" >

                {{csrf_field()}}

                {{method_field('PUT')}}
                <input type="submit" class="btn btn-success" value="修改">
            </div>
    	</form>
    </div>    	
</div>


@endsection

@section('js')
<script type="text/javascript">
	
	/*setTimeout(function(){

		$('.mws-form-message').remove();

	},3000)*/

	$('.mws-form-message').fadeOut(5000);

</script>
@endsection