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


        <form action="/admin/user" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='uname'>
                    </div>
                </div>

                          <div class="mws-form-row">
                                <label class="mws-form-label">角色名称</label>
                                    <div class="mws-form-item clearfix">
                                         <ul class="mws-form-list inline">
                                             <li><input type="radio" name='sex' value='0' checked='checked'> <label>普通管理员</label></li>
                                              <li><input type="radio" name='sex' value='1'> <label>商品管理员</label></li>
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