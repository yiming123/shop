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
        <span>
            <i class="icon-magic">
            </i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <form id="mws-wizard-form" class="mws-form wizard-form wizard-form-horizontal" action="/admin/notice" method="post">
            <fieldset id="step-1" class="mws-form-inline" data-wzd-id="wzd_1chg7e3qg1lvu6hbmt1_0"
            style="display: block;">
                <legend class="wizard-label" style="display: none;">
                    <i class="icol-accept">
                    </i>
                    Member Profile
                </legend>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        标题:
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="title" class="required email large">
                    </div>
                </div>
                <div class="mws-form-row">
                    <script>
                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor');
                    </script>
                    <div class="mws-form-row">
                        <label class="mws-form-label">内容</label>
                        <div class="mws-form-item">
                            <script id="editor" type="text/plain" style="width:800px;height:300px;" name="content"></script>
                        </div>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        状态
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <ul class="mws-form-list">
                            <li>
                                <input type="radio" id="male" name="status" class="required" value="1">
                                <label for="male">
                                    启用
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="female" name="status" checked="checked" value="0">
                                <label for="female">
                                    禁用
                                </label>
                            </li>
                        </ul>
                        <label class="error plain" generated="true" for="gender" style="display:none">
                        </label>
                    </div>
                </div>
            </fieldset>
            <div class="mws-button-row">
               <input type="submit" class="btn btn-success" value="提交">
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection