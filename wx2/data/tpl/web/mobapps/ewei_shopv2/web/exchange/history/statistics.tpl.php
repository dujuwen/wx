<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> <h2>兑换中心统计</h2> </div>
<div class="page-toolbar row m-b-sm m-t-sm">
    <div class="col-sm-4">
        <form action="" method="get" class="form-horizontal table-search" role="form">
            <div class="input-group-btn">
                <?php  echo tpl_form_field_daterange('date');?><button class="btn btn-primary">确定</button>
            </div>
            <input type="hidden" name="c" value="site">
            <input type="hidden" name="a" value="entry">
            <input type="hidden" name="m" value="ewei_shopv2">
            <input type="hidden" name="do" value="web">
            <input type="hidden" name="r" value="exchange.history.statistics">
        </form>

    </div>

</div>


<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <span class="label label-primary pull-left">商品兑换</span>
                <a class="pull-right" href="<?php  echo webUrl('exchange/history',array('group'=>goods));?>">查看详情</a>
                <h5></h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6 text-center">
                        兑换次数
                        <h2 class="no-margins goods-count"></h2>
                    </div>
                    <div class="col-md-6 text-center">
                        总价值
                        <h2 class="no-margins">¥ <span class="goods-price"></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <span class="label label-success pull-left">余额兑换 / 充值</span>
                <a class="pull-right" href="<?php  echo webUrl('exchange/history',array('group'=>balance));?>">查看详情</a>
                <h5></h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6 text-center">
                        兑换次数
                        <h2 class="no-margins balance-count"></h2>
                    </div>
                    <div class="col-md-6 text-center">
                        总面值
                        <h2 class="no-margins">¥ <span class="balance-price"></span></h2>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <span class="label label-warning pull-left">积分兑换</span>
                <a class="pull-right" href="<?php  echo webUrl('exchange/history',array('group'=>score));?>">查看详情</a>
                <h5></h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6 text-center">
                        兑换次数
                        <h2 class="no-margins score-count"></h2>
                    </div>
                    <div class="col-md-6 text-center">
                        总积分
                        <h2 class="no-margins"><span class="score-price"></span></h2>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <span class="label label-danger pull-left">红包兑换</span>
                <a class="pull-right" href="<?php  echo webUrl('exchange/history',array('group'=>red));?>">查看详情</a>
                <h5></h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6 text-center">
                        兑换次数
                        <h2 class="no-margins red-count"></h2>
                    </div>
                    <div class="col-md-6 text-center">
                        总面值
                        <h2 class="no-margins">¥ <span class="red-price"></span></h2>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <span class="label label-danger pull-left" style="background-color: #871fff">优惠券兑换</span>
                <a class="pull-right" href="<?php  echo webUrl('exchange/history',array('group'=>coupon));?>">查看详情</a>
                <h5></h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6 text-center">
                        兑换次数
                        <h2 class="no-margins coupon-count"></h2>
                    </div>
                    <div class="col-md-6 coupon-center">
                        发出优惠券总量
                        <h2 class="coupon-price"></h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <span class="label label-info pull-left">组合兑换</span>
                <a class="pull-right" href="<?php  echo webUrl('exchange/history',array('group'=>group));?>">查看详情</a>
                <h5></h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6 text-center">
                        兑换次数
                        <h2 class="no-margins group-count"></h2>
                    </div>
                    <div class="col-md-6 text-center">
                        总面值
                        <h2 class="group-price"></h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <h5>兑换中心走势图(成交额不包含优惠券和积分)</h5>
            </div>
            <div class="ibox-content">
                <div class="echarts" id="echarts-line-chart" style="display: none"></div>

                <div class="spiner-example" id="echarts-line-chart-loading">
                    <div class="sk-spinner sk-spinner-wave">
                        <div class="sk-rect1"></div>
                        <div class="sk-rect2"></div>
                        <div class="sk-rect3"></div>
                        <div class="sk-rect4"></div>
                        <div class="sk-rect5"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>




<script>
            $(function () {
                        myrequire(['echarts'], function () {
                            var json = <?php  echo $return;?>;
                            var lineChart = echarts.init(document.getElementById("echarts-line-chart"));
                            var lineoption = {
                                title: {
                                    text: '兑换量与成交额走势图'
                                },
                                tooltip: {
                                    trigger: 'axis'
                                },
                                legend: {
                                    data: ['兑换量', '成交额']
                                },
                                grid: {
                                    x: 50,
                                    x2: 50,
                                    y2: 30
                                },
                                calculable: true,
                                xAxis: [
                                    {
                                        type: 'category',
                                        boundaryGap: false,
                                        data: json.price_key
                                    }
                                ],
                                yAxis: [
                                    {
                                        type: 'value',
                                        axisLabel: {
                                            formatter: '{value}'
                                        }
                                    }
                                ],
                                series: [

                                    {
                                        name: '成交额',
                                        type: 'line',
                                        data: json.price_value,
                                        markLine: {
                                            data: [
                                                {type: 'average', name: '平均值'}
                                            ]
                                        }
                                    },{
                                        name: '兑换量',
                                        type: 'line',
                                        data: json.count_value,
                                        markPoint: {
                                            data: [
                                                {type: 'max', name: '最大值'},
                                                {type: 'min', name: '最小值'}
                                            ]
                                        },
                                        markLine: {
                                            data: [
                                                {type: 'average', name: '平均值'}
                                            ]
                                        }
                                    }
                                ]
                            };
                            lineChart.setOption(lineoption);
                            lineChart.resize();
                        });
                        $("#echarts-line-chart-loading").hide();
                        $("#echarts-line-chart").show();
                
                var json = <?php  echo $json;?>;
                $('.goods-count').text(json.goodsc);
                $('.balance-count').text(json.balancec);
                $('.score-count').text(json.scorec);
                $('.red-count').text(json.redc);
                $('.coupon-count').text(json.couponc);
                $('.group-count').text(json.groupc);

                $('.goods-price').text(json.goodss);
                $('.balance-price').text(json.balances);
                $('.score-price').text(json.scores);
                $('.red-price').text(json.reds);
                $('.coupon-price').text(json.coupons);
                $('.group-price').text(json.groups);
            });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>