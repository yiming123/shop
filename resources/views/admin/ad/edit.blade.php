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


    	<form action="/admin/ad/{$res->adid}" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			

    			<div class="mws-form-row">
    				<label class="mws-form-label">广告商家</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='adname' value="{{$res->adname}}">
    				</div>
    			</div>

    		

    			

    			
               
                <div class="mws-form-row">
                    <label class="mws-form-label">结束时间</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='adetime' value="{{$res->adetime}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">广告描述内容</label>
                        <div class="mws-form-item">
                           <textarea rows="" cols="" class="large" name='content' value="{{$res->content}}">
                           </textarea>
                        </div>
                </div>
               
                <div class="mws-form-row">
                    <label class="mws-form-label">广告路径</label>
                    <div class="mws-form-item">
                        <!-- <input type="file" class="small" name='profile'> -->
                        <img src="{{$res->url}}" width="100px">
                   
                        <input type="file" name='url' class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected...">
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