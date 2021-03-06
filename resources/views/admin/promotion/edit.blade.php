@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/promotion/update/{{$data->id}}"
        method="post">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        促销商品名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="name" value="{{$data->name}}"
                        readonly="readonly">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        促销商品价格
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="price" value="{{$data->price}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        促销商品时间
                    </label>
                    <div class="mws-form-item">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" id="test1" placeholder="开始日期" name="str_time"
                                    value="{{$data->str_time}}">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">
                                </label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" id="test1" placeholder="结束日期" name="sto_time"
                                    value="{{$data->str_time}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 示例-970 -->
                    <ins class="adsbygoogle" style="display:inline-block;width:970px;height:90px"
                    data-ad-client="ca-pub-6111334333458862" data-ad-slot="3820120620">
                    </ins>
                    <script src="/layui/layui.js" charset="utf-8">
                    </script>
                    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
                    <script>
                        layui.use('laydate',
                        function() {
                            var laydate = layui.laydate;

                            //常规用法
                            laydate.render({
                                elem: '#test1'
                            });

                            //国际版
                            laydate.render({
                                elem: '#test1-1',
                                lang: 'en'
                            });

                            //年选择器
                            laydate.render({
                                elem: '#test2',
                                type: 'year'
                            });

                            //年月选择器
                            laydate.render({
                                elem: '#test3',
                                type: 'month'
                            });

                            //时间选择器
                            laydate.render({
                                elem: '#test4',
                                type: 'time'
                            });

                            //日期时间选择器
                            laydate.render({
                                elem: '#test5',
                                type: 'datetime'
                            });

                            //日期范围
                            laydate.render({
                                elem: '#test6',
                                range: true
                            });

                            //年范围
                            laydate.render({
                                elem: '#test7',
                                type: 'year',
                                range: true
                            });

                            //年月范围
                            laydate.render({
                                elem: '#test8',
                                type: 'month',
                                range: true
                            });

                            //时间范围
                            laydate.render({
                                elem: '#test9',
                                type: 'time',
                                range: true
                            });

                            //日期时间范围
                            laydate.render({
                                elem: '#test10',
                                type: 'datetime',
                                range: true
                            });

                            //自定义格式
                            laydate.render({
                                elem: '#test11',
                                format: 'yyyy年MM月dd日'
                            });
                            laydate.render({
                                elem: '#test12',
                                format: 'dd/MM/yyyy'
                            });
                            laydate.render({
                                elem: '#test13',
                                format: 'yyyyMMdd'
                            });
                            laydate.render({
                                elem: '#test14',
                                type: 'time',
                                format: 'H点m分'
                            });
                            laydate.render({
                                elem: '#test15',
                                type: 'month',
                                range: '~',
                                format: 'yyyy-MM'
                            });
                            laydate.render({
                                elem: '#test16',
                                type: 'datetime',
                                range: '到',
                                format: 'yyyy年M月d日H时m分s秒'
                            });

                            //开启公历节日
                            laydate.render({
                                elem: '#test17',
                                calendar: true
                            });

                            //自定义重要日
                            laydate.render({
                                elem: '#test18',
                                mark: {
                                    '0-10-14': '生日',
                                    '0-12-31': '跨年' //每年的日期
                                    ,
                                    '0-0-10': '工资' //每月某天
                                    ,
                                    '0-0-15': '月中',
                                    '2017-8-15': '' //如果为空字符，则默认显示数字+徽章
                                    ,
                                    '2099-10-14': '呵呵'
                                },
                                done: function(value, date) {
                                    if (date.year === 2017 && date.month === 8 && date.date === 15) { //点击2017年8月15日，弹出提示语
                                        layer.msg('这一天是：中国人民抗日战争胜利72周年');
                                    }
                                }
                            });

                            //限定可选日期
                            var ins22 = laydate.render({
                                elem: '#test-limit1',
                                min: '2016-10-14',
                                max: '2080-10-14',
                                ready: function() {
                                    ins22.hint('日期可选值设定在 <br> 2016-10-14 到 2080-10-14');
                                }
                            });

                            //前后若干天可选，这里以7天为例
                            laydate.render({
                                elem: '#test-limit2',
                                min: -7,
                                max: 7
                            });

                            //限定可选时间
                            laydate.render({
                                elem: '#test-limit3',
                                type: 'time',
                                min: '09:30:00',
                                max: '17:30:00',
                                btns: ['clear', 'confirm']
                            });

                            //同时绑定多个
                            lay('.test-item').each(function() {
                                laydate.render({
                                    elem: this,
                                    trigger: 'click'
                                });
                            });

                            //初始赋值
                            laydate.render({
                                elem: '#test19',
                                value: '1989-10-14',
                                isInitValue: true
                            });

                            //选中后的回调
                            laydate.render({
                                elem: '#test20',
                                done: function(value, date) {
                                    layer.alert('你选择的日期是：' + value + '<br>获得的对象是' + JSON.stringify(date));
                                }
                            });

                            //日期切换的回调
                            laydate.render({
                                elem: '#test21',
                                change: function(value, date) {
                                    layer.msg('你选择的日期是：' + value + '<br><br>获得的对象是' + JSON.stringify(date));
                                }
                            });
                            //不出现底部栏
                            laydate.render({
                                elem: '#test22',
                                showBottom: false
                            });

                            //只出现确定按钮
                            laydate.render({
                                elem: '#test23',
                                btns: ['confirm']
                            });

                            //自定义事件
                            laydate.render({
                                elem: '#test24',
                                trigger: 'mousedown'
                            });

                            //点我触发
                            laydate.render({
                                elem: '#test25',
                                eventElem: '#test25-1',
                                trigger: 'click'
                            });

                            //双击我触发
                            lay('#test26-1').on('dblclick',
                            function() {
                                laydate.render({
                                    elem: '#test26',
                                    show: true,
                                    closeStop: '#test26-1'
                                });
                            });

                            //日期只读
                            laydate.render({
                                elem: '#test27',
                                trigger: 'click'
                            });

                            //非input元素
                            laydate.render({
                                elem: '#test28'
                            });

                            //墨绿主题
                            laydate.render({
                                elem: '#test29',
                                theme: 'molv'
                            });

                            //自定义颜色
                            laydate.render({
                                elem: '#test30',
                                theme: '#393D49'
                            });

                            //格子主题
                            laydate.render({
                                elem: '#test31',
                                theme: 'grid'
                            });

                            //直接嵌套显示
                            laydate.render({
                                elem: '#test-n1',
                                position: 'static'
                            });
                            laydate.render({
                                elem: '#test-n2',
                                position: 'static',
                                lang: 'en'
                            });
                            laydate.render({
                                elem: '#test-n3',
                                type: 'month',
                                position: 'static'
                            });
                            laydate.render({
                                elem: '#test-n4',
                                type: 'time',
                                position: 'static'
                            });
                        });
                    </script>
                </div>
            </div>
            {{csrf_field()}}
    </div>
    <div class="mws-button-row">
        <input type="submit" value="Submit" class="btn btn-danger">
    </div>
    </form>
</div>
</div>

@endsection