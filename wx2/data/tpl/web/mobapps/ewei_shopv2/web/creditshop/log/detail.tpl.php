<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    .label-weight{font-weight:normal;text-align: left;padding:0;}
</style>
<div class="page-heading">
    <span class='pull-right'>
        <a class="btn btn-default  btn-sm" href="<?php  echo webUrl('creditshop/log',array('type'=>$goods['type']))?>">返回列表</a>
    </span>
    <h2><?php  if($goods['type']==1) { ?>抽奖<?php  } else { ?>兑换<?php  } ?>记录详细信息</h2>
</div>
<form class='form-horizontal'>
    <div class="form-group">
        <label class="col-sm-2 control-label">类型</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'>
                <?php  if($goods['type']==1) { ?>
                    <span class='label label-danger'>抽奖</span>
                <?php  } else { ?>
                    <span class='label label-primary'>兑换</span>
                <?php  } ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">商品</label>
        <div class="col-sm-9 col-xs-12">
            <img src="<?php  echo tomedia($goods['thumb'])?>" style="width:30px;height:30px;padding:1px;border:1px solid #ccc" /> <?php  echo $goods['title'];?>
        </div>
    </div>
    <?php  if($log['optionid']) { ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">规格</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'><?php  echo $goods['optiontitle'];?></div>
        </div>
    </div>
    <?php  } ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">粉丝</label>
            <div class="col-sm-9 col-xs-12">
            <img src="<?php  echo $member['avatar'];?>" style="width:30px;height:30px;padding:1px;border:1px solid #ccc" /> <?php  echo $member['nickname'];?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">消耗</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'>
            <?php  if($goods['credit']>0) { ?>-<?php  echo $goods['credit'];?>积分<br/><?php  } ?>
            <?php  if($goods['money'] > 0 || $goods['dispatch'] > 0) { ?> -<?php  echo number_format($goods['money'] + $goods['dispatch'],2)?>现金 <?php  } ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">参与时间</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'><?php  echo date('Y-m-d H:i:s',$log['createtime'])?></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">状态</label>
        <div class="col-sm-9 col-xs-12">
             <div class='form-control-static'>
                 <?php  if($goods['goodstype']==0) { ?>
                     <?php  if($goods['isverify']==1) { ?>
                         <?php  if($log['status'] ==2) { ?><span class='label label-warning'>待核销</span><?php  } ?>
                         <?php  if($set['isreply'] == 1) { ?>
                             <?php  if($log['status'] ==3 && $log['iscomment'] == 0 ) { ?><span class='label label-default'>等待评价</span><?php  } ?>
                             <?php  if($log['status'] ==3 && $log['iscomment'] == 1 ) { ?><span class='label label-success'>追加评价</span><?php  } ?>
                             <?php  if($log['status'] ==3 && $log['iscomment'] == 2 ) { ?><span class='label label-danger'>已完成</span><?php  } ?>
                         <?php  } else { ?>
                            <?php  if($log['status'] ==3) { ?><span class='label label-danger'>已完成</span><?php  } ?>
                         <?php  } ?>
                     <?php  } else { ?>
                         <?php  if($log['status'] ==2 && $log['addressid'] == 0 ) { ?><span class='label label-warning'><?php  if($goods['type']==0) { ?>已兑换<?php  } else { ?>已中奖<?php  } ?></span><?php  } ?>
                         <?php  if($log['status'] ==2 && $log['addressid'] > 0 && $log['time_send'] == 0) { ?><span class='label label-default'>待发货</span><?php  } ?>
                         <?php  if($log['status'] ==3 && $log['time_send'] > 0 && $log['time_finish'] ==0 ) { ?><span class='label label-success'>已发货</span><?php  } ?>
                         <?php  if($set['isreply'] == 1) { ?>
                             <?php  if($log['status'] ==3 && $log['time_finish'] > 0 && $log['iscomment'] == 0 ) { ?><span class='label label-default'>等待评价</span><?php  } ?>
                             <?php  if($log['status'] ==3 && $log['time_finish'] > 0 && $log['iscomment'] == 1 ) { ?><span class='label label-success'>追加评价</span><?php  } ?>
                             <?php  if($log['status'] ==3 && $log['time_finish'] > 0 && $log['iscomment'] == 2 ) { ?><span class='label label-danger'>已完成</span><?php  } ?>
                         <?php  } else { ?>
                            <?php  if($log['status'] ==3 && $log['time_finish'] > 0) { ?><span class='label label-danger'>已完成</span><?php  } ?>
                         <?php  } ?>
                     <?php  } ?>
                 <?php  } else if($goods['goodstype']==1) { ?>
                     <?php  if($set['isreply'] == 1) { ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 0 ) { ?><span class='label label-default'>等待评价</span><?php  } ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 1 ) { ?><span class='label label-success'>追加评价</span><?php  } ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 2 ) { ?><span class='label label-danger'>已发放</span><?php  } ?>
                     <?php  } else { ?>
                        <?php  if($log['status'] ==3) { ?><span class='label label-danger'>已发放</span><?php  } ?>
                     <?php  } ?>
                 <?php  } else if($goods['goodstype']==2) { ?>
                     <?php  if($set['isreply'] == 1) { ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 0 ) { ?><span class='label label-default'>等待评价</span><?php  } ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 1 ) { ?><span class='label label-success'>追加评价</span><?php  } ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 2 ) { ?><span class='label label-danger'>已发放</span><?php  } ?>
                     <?php  } else { ?>
                        <?php  if($log['status'] ==3 ) { ?><span class='label label-danger'>已发放<?php  } ?>
                     <?php  } ?>
                 <?php  } else if($goods['goodstype']==3) { ?>
                     <?php  if($set['isreply'] == 1) { ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 0 ) { ?><span class='label label-success'>等待评价</span><?php  } ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 1 ) { ?><span class='label label-success'>追加评价</span><?php  } ?>
                         <?php  if($log['status'] ==3 && $log['iscomment'] == 2 ) { ?><span class='label label-danger'>已发放</span><?php  } ?>
                     <?php  } else { ?>
                        <?php  if($log['status'] ==3) { ?><span class='label label-danger'>已发放</span><?php  } ?>
                     <?php  } ?>
                 <?php  } ?>
             </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">支付状态</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'>
                <?php  if($log['paytype']==-1) { ?>
                    <span class='label label-default'>无需支付</span>
                <?php  } else { ?>
                    <?php  if($log['paytype']==0) { ?>
                        <?php  if($log['paystatus']==0) { ?>
                        <span class='label label-default'>余额未支付</span>
                        <?php  } else { ?>
                        <span class='label label-warning'>余额已支付</span>
                        <?php  } ?>
                    <?php  } else if($log['paytype']==1) { ?>
                        <?php  if($log['paystatus']==0) { ?>
                        <span class='label label-default'>微信未支付</span>
                        <?php  } else { ?>
                        <span class='label label-warning'>微信已支付</span>
                        <?php  } ?>
                    <?php  } else if($log['paytype']==2) { ?>
                        <?php  if($log['paystatus']==0) { ?>
                        <span class='label label-default'>支付宝未支付</span>
                        <?php  } else { ?>
                        <span class='label label-warning'>支付宝已支付</span>
                        <?php  } ?>
                    <?php  } ?>
                <?php  } ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">运费支付状态</label>
        <div class="col-sm-9 col-xs-12">
            <div class='form-control-static'>
                <?php  if($log['dispatchstatus']==-1) { ?>
                    <span class='label label-default'>无需支付</span>
                <?php  } else if($log['dispatchstatus']==0) { ?>
                    <span class='label label-default'>未支付</span>
                <?php  } else if($log['dispatchstatus']==1) { ?>
                    <span class='label label-success'>已支付</span>
                <?php  } ?>
            </div>
        </div>
    </div>
          <?php  if($goods['isverify']==1) { ?>
            <?php  if(empty($log['storeid'])) { ?>
             <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class='form-control-static'>还未填写联系人及选择兑换门店</div>
                    </div>
                </div>
            <?php  } else { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">兑换人信息</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class='form-control-static'>
                            <label class="col-xs-12 col-sm-3 col-md-2 label-weight">兑换人：</label><?php  echo $log['realname'];?> / <?php  echo $log['mobile'];?>
                        </div>
                        <div class='form-control-static'>
                            <label class="col-xs-12 col-sm-3 col-md-2 label-weight">兑换门店：</label><?php  echo $store['storename'];?> / <?php  echo $store['address'];?>
                        </div>
                    </div>
                </div>
            
             <?php  } ?>
            <?php  } else { ?>
            
                <?php  if(!empty($address['realname'])) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">收件人信息</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class='form-control-static'>
                            <label class="col-xs-12 col-sm-3 col-md-2 label-weight">收件人：</label><?php  echo $address['realname'];?> / <?php  echo $address['mobile'];?>
                        </div>
                        <div class='form-control-static'>
                            <label class="col-xs-12 col-sm-3 col-md-2 label-weight">收货地址：</label><?php  echo $address['province'];?><?php  echo $address['city'];?><?php  echo $address['area'];?> <?php  echo $address['address'];?>
                        </div>
                    </div>
                </div>
                    <?php  if(!empty($log['expresssn'])) { ?>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">物流信息</label>
                        <div class="col-sm-9 col-xs-12">
                            <div class='form-control-static'>
                                <label class="col-xs-12 col-sm-3 col-md-2 label-weight">快递公司：</label><?php  echo $log['expresscom'];?>
                            </div>
                            <div class='form-control-static'>
                                <label class="col-xs-12 col-sm-3 col-md-2 label-weight">快递单号：</label><?php  echo $log['expresssn'];?>
                                <a class='op' data-toggle="ajaxModal" href="<?php  echo webUrl('util/express', array('id' => $log['id'],'express'=>$log['express'],'expresssn'=>$log['expresssn']))?>">查看物流</a>
                            </div>
                            <div class='form-control-static'>
                                <label class="col-xs-12 col-sm-3 col-md-2 label-weight">发货时间：</label><?php  echo date('Y-m-d H:i:s', $log['time_send'])?>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                <?php  } else { ?>
                    <div class="form-group">
                      <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                      <div class="col-sm-9 col-xs-12">
                          <div class='form-control-static'>还未选择地址</div>
                      </div>
                  </div>
                <?php  } ?>
            <?php  } ?>
            
            
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-9 col-xs-12">
                     <?php if(cv('creditshop.log.doexchange')) { ?>
                        <?php  if($log['canexchange']) { ?>
                                <a class='btn btn-primary' data-toggle='ajaxModal' href="<?php  echo webUrl('creditshop/log/doexchange',array('id' => $log['id'],'type'=>$goods['type']));?>" title='确认兑换' >确认兑换</a>
                        <?php  } ?>
                    <?php  } ?>
                <input type="button" class="btn btn-default" name="submit" onclick="history.go(-1)" value="返回列表"  <?php if(cv('creditshop.log.doexchange')) { ?><?php  if($log['canexchange']) { ?>style='margin-left:10px;'<?php  } ?><?php  } ?>  />
                </div>
            </div>
 
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
 