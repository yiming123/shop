@extends('layout.homes')

@section('title','前台结算页')
@section('content')
<style>
	input{
		border: 0px;
	}
	#tab th{
		text-align: center;
		font-size: 15px;
	}
	#tab td{
		vertical-align: middle;
		text-align: center;
	}
	#tab img{
		width: 80px;
	}
	.row{
		margin: 10px;
	}
	 .button{
        background-color: #1abc9c;
    }
	.step-1 .u-stage-icon-inner .bg {background-image: url(../images/sprite.png);background-position: -79px -135px;width: 19px;height: 19px;}
	.step-2 .u-stage-icon-inner .bg {background-image: url(../images/sprite.png);background-position: -103px -135px;width: 19px;height: 19px;}
</style>
<div class="m-progress">
	<div class="m-progress-list">
		<span class="step-1 step">
	       <em class="u-progress-stage-bg"></em>
	       <i class="u-stage-icon-inner">1<em class="bg"></em></i>
	       <p class="stage-name">核对信息</p>
	    </span>
		<span class="step-2 step">
	       <em class="u-progress-stage-bg"></em>
	       <i class="u-stage-icon-inner">2<em class="bg"></em></i>
	       <p class="stage-name">确定订单</p>
	    </span>
		<span class="step-3 step">
	       <em class="u-progress-stage-bg"></em>
	       <i class="u-stage-icon-inner">3<em class="bg"></em></i>
	       <p class="stage-name">确认付款</p>
	    </span>
		<span class="step-4 step">
	       <em class="u-progress-stage-bg"></em>
	       <i class="u-stage-icon-inner">4<em class="bg"></em></i>
	       <p class="stage-name">待收货</p>
	    </span>
		<span class="u-progress-placeholder"></span>
	</div>
	<div class="u-progress-bar total-steps-2">
		<div class="u-progress-bar-inner"></div>
	</div>
</div>
<form action="">
	<div class="row">

		<div class="col-md-8 col-md-offset-2" >
			<table class="table table-hover" id="tab">
			 	<tr>
			 		<th >商品图片</th>
			 		<th>商品名称</th>
			 		<th>件数</th>
			 		<th>小计</th>
			 	</tr>
			 	<tr>
			 		<td><img src="/images/5.jpg" alt=""></td>
			 		<td>华为</td>
			 		<td>1x1</td>
			 		<td>1999</td>
			 	</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-8">
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<span>收货人：</span>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<input type="text" value="1">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<span>收货人：</span>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<input type="text" value="1">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<span>收货人：</span>
				</div>
				<div class="col-md-4 col-md-offset-1">
					<input type="text" value="1">
				</div>
			</div>
			<div class="row">
			<div class="col-md-2 col-md-offset-4"></div>
				<input type="submit" value="结算" class ="button">
			</div>
			
		</div>		
	</div>
</form>



@endsection