@extends('layout.homes')

@section('title','用户登录页面')


@section('page')
<section id="page-title">
	<div class="container clearfix">
		<h1>用户登录</h1>
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">用户登录</a></li>
		</ol>
	</div>

</section><!-- #page-title end -->

@endsection

@section('content')
<div class="content-wrap">

	<div class="container clearfix">

		<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

			<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>用户登录</div>
			<div class="acc_content clearfix">
				<form id="login-form" name="login-form" class="nobottommargin" action="/home/dologin" method="post">
					<div class="col_full">
						<label for="login-form-username">用户名:</label>
						<input type="text" id="login-form-username" name="uname" value="" class="form-control" />
					</div>

					<div class="col_full">
						<label for="login-form-password">密码:</label>
						<input type="password" id="login-form-password" name="pwd" value="" class="form-control" />
					</div>

					<div class="col_full nobottommargin">
						{{csrf_field()}}
						<button class="button button-3d button-black nomargin" id="login-form-submit">登录</button>
						<a href="#" class="fright">忘记密码?</a>
						<a href="/home/registe" class="fright" style='margin-right:30px'>注册</a>
					</div>
				</form>
			</div>

			

		</div>

	</div>

</div>

@endsection