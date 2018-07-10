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


        <form action="/admin/dotest" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                

                          <div class="mws-form-row">
                                <label class="mws-form-label">角色名称</label>
                                    <div class="mws-form-item clearfix">
                                         <ul class="mws-form-list inline">
                                         @foreach($data as $k => $v)
                                             <li><input type="radio" name='rolename' value='0' checked='checked'> <label>{{$v->rolename}}</label></li>
                                          @endforeach    
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



    $('.mws-form-message').fadeOut(8000);

</script>
@endsection