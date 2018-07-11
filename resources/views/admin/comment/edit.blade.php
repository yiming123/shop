@extends('layout.admin')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

    		@if (count($errors) > 0)
			    <div class="mws-form-message error">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li style='font-size:16px;list-style:none'>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif


    	<form action="/admin/comment/{{$res->cid}}" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			

    			<div class="mws-form-row">
    				<label class="mws-form-label">用户id</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='uid' value="{{$res->uid}}">
    				</div>
    			</div>

    		

    			

    			
               
                <div class="mws-form-row">
                    <label class="mws-form-label">订单id</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='oid' value="{{$res->oid}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">评论内容</label>
                        <div class="mws-form-item">
                           <textarea rows="" cols="" class="large" name='content' value="{{$res->content}}">
                           </textarea>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">追加内容</label>
                        <div class="mws-form-item">
                           <textarea rows="" cols="" class="large" name='zcontent' value="{{$res->zcontent}}">
                           </textarea>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">评价等级</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='star' value="{{$res->star}}">
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">评论时间</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='addtime' value="{{$res->addtime}}">
                    </div>
                </div>

    			
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio"  value='1' checked='checked'@if ($res->status =='1') checked ='checked')

                            @endif
                            > <label>发布</label></li>
    						<li><input type="radio"  value='0'
                            @if ($res->status =='1') checked ='checked')

                            @endif> <label>禁止</label></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">

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