@extends('layout.public')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">




    	<form action="/admin/link/update/{{$id=$res->lid}}" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">链接名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='lname' value="{{$res->lname}}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">链接地址</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='lurl' value="{{$res->lurl}}">
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