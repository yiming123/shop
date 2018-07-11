@extends('layout.homes')

@section('title','前台购物车')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
	.cart-empty{
		height: 98px;
	    padding: 80px 0 120px;
	    color: #333;

	}

	.cart-empty .message{
		height: 98px;
	    padding-left: 341px;
	    background: url(/uploads/no-login-icon.png) 250px 22px no-repeat;
	}

	.cart-empty .message .txt {
	    font-size: 14px;
	}
	.cart-empty .message li {
	    line-height: 38px;
	}

	ol, ul {
	    list-style: outside none none;
	}

	.ftx-05, .ftx05 {
		color: #005ea7;
	}
	
	a {
	    color: #666;
	    text-decoration: none;
	    
	    font-size:12px;
	}	
</style>



@section('page')
<section id="page-title">

	<div class="container clearfix">
		<h1>购物车</h1>
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">购物车</a></li>
		</ol>
	</div>

</section><!-- #page-title end -->

@endsection

@section('content')
<div class="content-wrap">

	<div class="container clearfix lamp203">

		<div class="table-responsive bottommargin">
			
			@if(count($res) > 0)
			<table class="table cart">
				<thead>
					<tr>
						<th class="cart-product-remove"><a href="javascript:void(0)" class='as'>全选</a></th>
						<th class="cart-product-thumbnail">商品图片</th>
						<th class="cart-product-name">商品名</th>
						<th class="cart-product-price">价格</th>
						<!-- <th class="cart-product-price">颜色</th>
						<th class="cart-product-price">尺码</th -->>
						<th class="cart-product-quantity">数量</th>
						<th class="cart-product-subtotal">小计</th>
						<th class="cart-product-subtotal">操作</th>
					</tr>
				</thead>
				<tbody>


					@foreach($res as $k => $v)
					<tr class="cart_item">
						<td class="cart-product-thumbnail">
							<input type="checkbox">
						</td>

						<td class="cart-product-thumbnail">
							
						</td>

						<td class="cart-product-name">
							<a href="#">{{$v->gname}}</a>
						</td>

						<td class="cart-product-price">
							¥<span class="price">{{$v->price}}</span>
						</td>

						

						<td class="cart-product-quantity">
							<div class="quantity clearfix">
								<input type="button" value="-" class="minus">
								<input type="text" name="quantity" value="1" class="qty" />
								<input type="button" value="+" class="plus">
							</div>
						</td>

						<td class="cart-product-subtotal">
							¥<span class="xiaoji">{{$v->price}}</span>
						</td>

						<td class="cart-product-remove">
							<a href="javascript:void(0)" class="remove" title="Remove this item" ids='{{$v->id}}'><i class="icon-trash2"></i></a>
						</td>

					</tr>
					@endforeach

					<tr class="cart_item">
						<td colspan="9">
							<div class="row clearfix">
								
								<div class="col-md-12 col-xs-12 nopadding">
									
									<a href="shop.html" class="button button-3d notopmargin fright">结算</a>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			



		</div>

		<div class="row clearfix">
			<div class="col-md-6 col-md-offset-6 clearfix">
				<div class="table-responsive">
					<h4>Cart Totals</h4>

					<table class="table cart">
						<tbody>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>Cart Subtotal</strong>
								</td>

								<td class="cart-product-name">
									<span class="amount">$106.94</span>
								</td>
							</tr>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>Shipping</strong>
								</td>

								<td class="cart-product-name">
									<span class="amount">Free Delivery</span>
								</td>
							</tr>
							<tr class="cart_item">
								<td class="cart-product-name">
									<strong>Total</strong>
								</td>

								<td class="cart-product-name">
									<strong>¥<span class="total color lead">0.0</span></strong>
								</td>
							</tr>
						</tbody>

					</table>



				@else
				
				<div class="cart-empty">
				    <div class="message">
				        <ul>
				            <li class="txt">
				                购物车空空的哦~，去看看心仪的商品吧~
				            </li>
				            <li class="mt10">
				                <a href="/home/index" class="ftx-05">
				                    去购物&gt;
				                </a>
				            </li>
				            
				        </ul>
				    </div>
				</div>

				
				@endif

				</div>
			</div>
		</div>

	</div>

</div>

@endsection

@section('js')
<script>


	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});


	//加法运算
	$('.plus').click(function(){

		//获取数量
		var num = $(this).prev().val();

		num++;
		//加完之后让数量发生改变
		$(this).prev().val(num);


		function accMul(arg1, arg2) {

	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

	        try { m += s1.split(".")[1].length } catch (e) { }

	        try { m += s2.split(".")[1].length } catch (e) { }

	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

		}

		//获取单价
		var pc = $(this).parents('tr').find('.price').text();

		//加完之后让小计发生改变

		$(this).parents('tr').find('.xiaoji').text(accMul(pc,num));
	
		totals();
	})

	//减法运算
	$('.minus').click(function(){

		var mins = $(this).next().val();

		mins--;
		if(mins <= 1){

			mins = 1;
		}

		//减完让数量发生改变
		$(this).next().val(mins);

		//减完让小计发生改变
		//获取单价
		var pc = $(this).parents('tr').find('.price').text();

		function accMul(arg1, arg2) {

	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

	        try { m += s1.split(".")[1].length } catch (e) { }

	        try { m += s2.split(".")[1].length } catch (e) { }

	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

		}

		//加完之后让小计发生改变

		$(this).parents('tr').find('.xiaoji').text(accMul(pc,mins));

		totals();

	})

	//单击多选框让总价发生改变
	$(':checkbox').click(function(){

		totals();

	})

	function totals()
	{

		var sum = 0;
		$(':checkbox:checked').each(function(){

			var pir = parseFloat($(this).parents('tr').find('.xiaoji').text());

			// sum += pir;

			function accAdd(arg1,arg2){  
			    var r1,r2,m;  
			    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
			    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
			    m=Math.pow(10,Math.max(r1,r2))  
			    return (arg1*m+arg2*m)/m  
			}

			$('.total').text(sum = accAdd(sum, pir));
		})
	}


	//全选
	$('.as').click(function(){

		$(':checkbox').each(function(){

			// $(this).attr('checked','checked');
			$(this).attr('checked',true);
		})

		totals();
	})

	//删除
	$('.remove').click(function(){


		var rs = confirm('删除商品?');

		if(!rs) return;

		//获取id
		var id = $(this).attr('ids');

		var ts = $(this);


		//发送ajax
		$.post('/home/ajaxcart',{id:id},function(data){

			if(data != '0'){

				ts.parents('tr').remove();

				$('.total').text('0.0');

				totals();
				
			} else {

				$('.lamp203').html(`<div class="cart-empty">
				    <div class="message">
				        <ul>
				            <li class="txt">
				                购物车空空的哦~，去看看心仪的商品吧~
				            </li>
				            <li class="mt10">
				                <a href="/home/index" class="ftx-05">
				                    去购物&gt;
				                </a>
				            </li>
				            
				        </ul>
				    </div>
				</div>`);
			}

		})


	})




</script>


@endsection