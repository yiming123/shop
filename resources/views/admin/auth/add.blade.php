@extends('layout.admins')

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


    	<form action="/admin/auth" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label">角色分类</label>
                    <div class="mws-form-item">
                        <select name='cateid' class="small">
                            <option value='0'>请选择</option>
                           
                            <option value=''></option>
                            
                        </select>
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">权限名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='authname'>
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">权限链接</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='link'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">描述</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='description'>
                    </div>
                </div>

    			
    		</div>
    		<div class="mws-button-row">

    			{{csrf_field()}}
    			<input type="submit" class="btn btn-success" value="添加">
    		</div>
    	</form>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">

	

	$('.mws-form-message').fadeOut(8000);

</script>
@endsection