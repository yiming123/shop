<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	
	<link rel="stylesheet" href="/homes/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/homes/style.css" type="text/css" />
	<link rel="stylesheet" href="/homes/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="/homes/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="/homes/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="/homes/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="/homes/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- External JavaScripts
	============================================= -->
	<link href="/other/admin.css" rel="stylesheet" type="text/css">
    <link href="/other/amazeui.css" rel="stylesheet" type="text/css">

    <link href="/other/personal.css" rel="stylesheet" type="text/css">
    <link href="/other/addstyle.css" rel="stylesheet" type="text/css">
    <script src="/other/amazeui.js"></script>
	<script type="text/javascript" src="/homes/js/jquery.js"></script>
	<script type="text/javascript" src="/homes/js/plugins.js"></script>
	<!-- <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script> -->
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
			.m-progress {margin: 0 auto 10px;height: 60px;max-width: 700px;margin-top:40px ;}
			.m-progress-list{height: 66px;font-size: 0;text-align: justify;}
			.m-progress-list .step {display: inline-block;width:60px;text-align: center;color: #999;letter-spacing: -5px;}
			.m-progress-list .stage-name {padding-top: 10px;font-size: 12px;line-height: 14px;
			letter-spacing: normal;word-spacing: normal;}
			.u-progress-stage-bg {position: relative;display: inline-block;background-image: url(../images/sprite.png);
			background-position: -45px -135px;width: 29px;height: 29px;}
			.u-stage-icon-inner .bg {position: absolute;left: 0px;top: 0px;}
			

			.u-stage-icon-inner {position: relative;z-index: 20;display: inline-block;width: 19px;height: 19px;line-height: 19px;
			vertical-align: top;margin-top: 5px;margin-left: -24px;color: #b5b5b5;font-size: 12px;letter-spacing: normal;word-spacing: normal;}
			.u-progress-placeholder {display: inline-block;width: 100%;height: 0;font-size: 0;line-height: 0;overflow: hidden;}

			.u-progress-bar {margin: -56px 40px 0;background-color: #dcdcdc;height: 5px;font-size: 0;padding: 2px 0;}
			.u-progress-bar-inner {position: relative;z-index: 10;height: 5px;width: 0;transition: width 1s .5s linear;background-color: #23c279;}
	</style>
	<!-- Document Title
	============================================= -->
	<title>@yield('title')</title>


</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="/homes/images/logo.png" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="/homes/images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>

						@php

							$res = App\Http\Controllers\admin\CateController::getsubcate(0);
							$cart = App\Http\Controllers\home\HomeController::cart();
						@endphp

							@foreach($res as $k => $v)
							<li><a href="index.html"><div>{{$v->cname}}</div></a>
								@if($v->sub)
								<ul>
									@foreach($v->sub as $kk => $vv)

									
									<li><a href="index-corporate.html"><div>{{$vv->cname}}</div></a>
										@if($vv->sub)
										<ul>
											@foreach($vv->sub as $ks => $vs)
											<li><a href="index-corporate.html"><div>{{$vs->cname}}</div></a></li>
											@endforeach

										</ul>
										@endif
									</li>
									
									@endforeach
									
								</ul>
								@endif
								
							</li>
							@endforeach
							
						</ul>

						<!-- Top Cart
						============================================= -->
							<div id="top-cart">
								<a href="/home/cart" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
								<div class="top-cart-content">
									<div class="top-cart-title">
										<h4>Shopping Cart</h4>
									</div>
									<div class="top-cart-items">
									@if(count($cart) > 0)
									@foreach($cart as $k0=>$v0)
										<div class="top-cart-item clearfix">
											<div class="top-cart-item-image">
												<a href="#"><img src="/homes/images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
											</div>
											<div class="top-cart-item-desc">
												<a href="#">Blue Round-Neck Tshirt</a>
											<span class="top-cart-item-price">$19.99</span>
												<span class="top-cart-item-quantity">x {{$v0->num}}</span>
											</div>
										</div>
									@endforeach
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
									<div class="top-cart-action clearfix">
										<span class="fleft top-checkout-price">$114.95</span>
										<a href="/home/cart"><button class="button button-3d button-small nomargin fright" id="cart">去购物车</button></a>
									</div>
								</div>
							</div>		
						<!-- #top-cart end -->

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
		
		@section('page')
		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>My Account</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Pages</a></li>
					<li class="active">Login</li>
				</ol>
			</div>

		</section><!-- #page-title end -->
		@show

		<!-- Content
		============================================= -->
		<section id="content">

		@section('content')

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

						<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
						<div class="acc_content clearfix">
							<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
								<div class="col_full">
									<label for="login-form-username">Username:</label>
									<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Password:</label>
									<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
									<a href="#" class="fright">Forgot Password?</a>
								</div>
							</form>
						</div>

						<div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
						<div class="acc_content clearfix">
							<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">
								<div class="col_full">
									<label for="register-form-name">Name:</label>
									<input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-email">Email Address:</label>
									<input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-username">Choose a Username:</label>
									<input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-phone">Phone:</label>
									<input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-password">Choose Password:</label>
									<input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register-form-repassword">Re-enter Password:</label>
									<input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
								</div>
							</form>
						</div>

					</div>

				</div>

			</div>
		@show

		</section><!-- #content end -->
		@section('footer')
		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark" >
			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>
	@show
	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="/homes/js/functions.js"></script>



	@section('js')


	@show



</body>
<!-- 购物车跳转
	============================================= -->

</html>