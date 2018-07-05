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


    	<form action="/admin/ad" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			

    			<div class="mws-form-row">
    				<label class="mws-form-label">评论内容</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='adname'>
    				</div>
    			</div>

    		

    			

    			
                <div class="mws-form-row">
                    <label class="mws-form-label">评价等级</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='adstime'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">结束时间</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='adetime'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">评论时间</label>
                        <div class="mws-form-item">
                                        <textarea rows="" cols="" class="large" name='content'></textarea>
                                    </div>
                </div>

                
    			
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio" name='status' value='1' checked='checked'> <label>发布</label></li>
    						<li><input type="radio" name='status' value='0'> <label>禁止</label></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">

    			{{csrf_field()}}
    			<input type="submit" class="btn btn-success" value="提交">
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