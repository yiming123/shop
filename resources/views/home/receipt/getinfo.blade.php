@extends('layout.homes')
@section('title','前台结算页')
    
@section('content')
<style>
    #fei{
        float: right;
        width: 500px;       
    }
    .row{
        padding-top: 10px;
        padding-bottom: 10px;
        margin: 10px;
    }
    .button{
        background-color: #1abc9c;
    }
    #text{
      height:80px;
    }
    form .row{
      border: 1px solid #eee;
    }
    input {
      border: 0px;
    }
    .step-1 .u-stage-icon-inner .bg {background-image: url(../images/sprite.png);background-position: -103px -135px;width: 19px;height: 19px;}
   
</style>

<div class="m-progress">
  <div class="m-progress-list">
    <span class="step-1 step">
         <em class="u-progress-stage-bg"></em>
         <i class="u-stage-icon-inner">1<em class="bg"></em></i>
         <p class="stage-name">核对信息</p>
      </span>
    <span class="step-2 step">
         <em class="u-progress-stage-bg"></em>
         <i class="u-stage-icon-inner">2<em class="bg"></em></i>
         <p class="stage-name">确定订单</p>
      </span>
    <span class="step-3 step">
         <em class="u-progress-stage-bg"></em>
         <i class="u-stage-icon-inner">3<em class="bg"></em></i>
         <p class="stage-name">确认付款</p>
      </span>
    <span class="step-4 step">
         <em class="u-progress-stage-bg"></em>
         <i class="u-stage-icon-inner">4<em class="bg"></em></i>
         <p class="stage-name">待收货</p>
      </span>
    <span class="u-progress-placeholder"></span>
  </div>
  <div class="u-progress-bar total-steps-2">
    <div class="u-progress-bar-inner"></div>
  </div>
</div>
<div class="row">
    <div class="col-md-5 col-md-offset-1">
        <form action="/home/suc" method="post">
            <div class="row">
                <div class="col-md-3">收货人:</div>
                <div class="col-md-8"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-md-3">收货地址:</div>
                <div class="col-md-8"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-md-3">收货电话:</div>
                <div class="col-md-8"><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-md-3">买家留言:</div>
                <div class="col-md-8">
                  <textarea name="" id="text" cols="30" rows="10" style="border:0px;"></textarea>
                </div>
            </div>
            <div class="row" style="border:0px;">
                <div class="col-md-4 col-md-offset-1">
                    <button class="button">新建地址</button>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <input type="submit" value="提交信息" class="button">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="user-address">
            <!--标题 -->
            <ul class="">
              <li class="user-addresslist defaultAddr" style="border:1px solid #eee;">
                <span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
                <p class="new-tit new-p-re">
                  <span class="new-txt">小叮当</span>
                  <span class="new-txt-rd2">159****1622</span>
                </p>
                <div class="new-mu_l2a new-p-re">
                  <p class="new-mu_l2cw">
                    <span class="title">地址：</span>
                    <span class="province">湖北</span>省
                    <span class="city">武汉</span>市
                    <span class="dist">洪山</span>区
                    <span class="street">雄楚大道666号(中南财经政法大学)</span></p>
                </div>
                <div class="new-addr-btn">
                  <a href="#"><i class="am-icon-edit"></i>编辑</a>
                  <span class="new-addr-bar">|</span>
                  <a href="javascript:void(0);" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
                </div>
              </li>
              <li class="user-addresslist">
                <span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>
                <p class="new-tit new-p-re">
                  <span class="new-txt">小叮当</span>
                  <span class="new-txt-rd2">159****1622</span>
                </p>
                <div class="new-mu_l2a new-p-re">
                  <p class="new-mu_l2cw">
                    <span class="title">地址：</span>
                    <span class="province">湖北</span>省
                    <span class="city">武汉</span>市
                    <span class="dist">洪山</span>区
                    <span class="street">雄楚大道666号(中南财经政法大学)</span></p>
                </div>
                <div class="new-addr-btn">
                  <a href="#"><i class="am-icon-edit"></i>编辑</a>
                  <span class="new-addr-bar">|</span>
                  <a href="javascript:void(0);" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
                </div>
              </li>
            </ul>
          </div>
    </div>
</div>
      
@endsection
