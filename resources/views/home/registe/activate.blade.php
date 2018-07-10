@extends('layout.homes')

@section('title','用户注册提醒')


@section('page')
<section id="page-title">

	<div class="container clearfix">
		<h1>用户注册提醒</h1>
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">用户注册提醒</a></li>
		</ol>
	</div>

</section><!-- #page-title end -->

@endsection

@section('content')
<div class="content-wrap">
	<div class="container clearfix">
		<div class="style-msg2 successmsg">
		    <div class="msgtitle" style='font-size:20px'>用户注册激活账号提醒:</div>
		    <div class="sb-msg">
		        <ul>
		            <li style='font-size:17px;list-style:none'>您注册了云通讯账号请到注册时的邮箱进行激活该用户</li>
		        </ul>
		    </div>
		</div>
	</div>
</div>

@endsection