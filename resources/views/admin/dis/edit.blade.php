@extends('layout.public')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

    		


    	<form action="/admin/dis/{{$res->did}}" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='uid' value="{{$res->uid}}" readonly="readonly">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">订单号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='oid' value="{{$res->oid}}" readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">快递公司</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='way' value="{{$res->way}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">运费</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='price' value="{{$res->price}}">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">

                {{csrf_field()}}
                {{method_field('PUT')}}
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