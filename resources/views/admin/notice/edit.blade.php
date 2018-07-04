@extends('layout.admins')

@section('title',$title)

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
        <form id="mws-wizard-form" class="mws-form wizard-form wizard-form-horizontal" action="/admin/notice/{{$res->id}}" method="post">
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
                        <input type="text" name="title" class="required email large" value="{{$res->title}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        内容:
                        <span class="required">
                            *
                        </span>
                    </label>
                    <div class="mws-form-item">
                        <textarea name="content" rows="" cols="" class="required large">
                            {{$res->content}}
                        </textarea>
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
                                <input type="radio" id="male" name="status" class="required" value="1" @if ($res['status']==1)checked="checked" @endif>
                                <label for="male">
                                    启用
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="female" name="status" value="0" @if ($res['status']==0)checked="checked" @endif>
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
                {{csrf_field()}} 
                {{method_field('PUT')}}
               <input type="submit" class="btn btn-success" value="提交">

            </div>
           
        </form>
    </div>
</div>
@endsection