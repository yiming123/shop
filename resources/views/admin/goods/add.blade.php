@extends('layout.admins')

@section('title',$title)
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/goods" method="post" enctype="multipart/form-data">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">类别</label>
    				<div class="mws-form-item">
    					<select class="small" name="cid">
    						<option value="0">请选择</option>
							@foreach($res as $k=>$v)
    						<option value="{{$v->id}}">{{$v['cname']}}</option>
							@endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">商品名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="gname">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">价格</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="price">
    				</div>
    			</div>
    			<div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">

                        <input type="file" name='gpic[]' multiple class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected...">
                    </div>
                </div>
    			
    			<script>
    				//实例化编辑器
				    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
				    var ue = UE.getEditor('editor');
    			</script>
    			<div class="mws-form-row">
    				<label class="mws-form-label">描述</label>
    				<div class="mws-form-item">
    					<script id="editor" type="text/plain" style="width:800px;height:300px;" name="gdesc"></script>
    				</div>
    			</div>
    			<div class="mws-form-row">
                    <label class="mws-form-label">状态<span class="required">*</span></label>
                    <div class="mws-form-item">
                        <ul class="mws-form-list">
                            <li><input type="radio" id="male" name="status"  value="0" class="required"> <label for="male">上架</label></li>
                            <li><input type="radio" id="female" name="status" value="1" > <label for="female">下架</label></li>
                        </ul>
                        <label class="error plain" generated="true" for="gender" style="display:none"></label>
                    </div>
                </div>
    		</div>
    		<div class="mws-button-row">

    			<input type="submit" value="Submit" class="btn btn-danger">
    			<input type="reset" value="Reset" class="btn ">
    			{{csrf_field()}}
    		</div>
    		
    	</form>
    </div>    	
</div>

@endsection