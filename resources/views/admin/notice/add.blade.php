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
                        <input type="text" name="tite" class="required email large">
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
                                <input type="radio" id="male" name="status" class="required">
                                <label for="male">
                                    启用
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="female" name="status">
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
        </form>
    </div>
</div>
@endsection