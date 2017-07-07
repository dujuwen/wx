<?php defined('IN_IA') or exit('Access Denied');?>
<div class="form-group">
    <label class="col-sm-2 control-label must">任务名称</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <div class="input-group">
            <input type="text" name="title" class="form-control" value="<?php  echo $item['title'];?>" data-rule-required="true" />
            <input type="hidden" id="titleimg" name="titleicon" value="<?php  if(!empty($item['titleicon'])) { ?><?php  echo $item['titleicon'];?><?php  } else { ?>../addons/ewei_shopv2/plugin/task/static/images/taskicon.png<?php  } ?>">
            <span class="input-group-addon" style="padding: 0px;"><img src="<?php  if(!empty($item['titleicon'])) { ?><?php  echo $item['titleicon'];?><?php  } else { ?>../addons/ewei_shopv2/plugin/task/static/images/taskicon.png<?php  } ?>" id="showimg" width="34px" height="34px"></span>
            <span class="input-group-addon btn" data-toggle="selectImg" data-input="#titleimg" data-img="#showimg" data-full="1">选择图片</span>
        </div>
        <?php  } else { ?>
        <div class='form-control-static'><img src="<?php  if(!empty($item['titleicon'])) { ?><?php  echo $item['titleicon'];?><?php  } else { ?>../addons/ewei_shopv2/plugin/task/static/images/taskicon.png<?php  } ?>"  width="34px" height="34px"><?php  if(!empty($item['title'])) { ?><?php  echo $item['title'];?><?php  } else { ?>暂无标题<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label must">任务详情页广告图</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <div class="input-group">
            <input type="text" id="poster_banner" class="form-control" name="poster_banner" value="<?php  if(!empty($item['poster_banner'])) { ?><?php  echo $item['poster_banner'];?><?php  } else { ?>../addons/ewei_shopv2/plugin/task/static/images/detail-head.jpg<?php  } ?>">
            <span class="input-group-addon" style="padding: 0px;"><img src="<?php  if(!empty($item['poster_banner'])) { ?><?php  echo $item['poster_banner'];?><?php  } else { ?>../addons/ewei_shopv2/plugin/task/static/images/detail-head.jpg<?php  } ?>" id="showbanner" width="34px" height="34px"></span>
            <span class="input-group-addon btn" data-toggle="selectImg" data-input="#poster_banner" data-img="#showbanner" data-full="1">选择图片</span>
        </div>
        <?php  } else { ?>
        <div class='form-control-static'><img src="<?php  if(!empty($item['poster_banner'])) { ?><?php  echo $item['poster_banner'];?><?php  } else { ?>../addons/ewei_shopv2/plugin/task/static/images/detail-head.jpg<?php  } ?>"  width="34px" height="34px"></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label must">关键词</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <input type="text" name="keyword" class="form-control" value="<?php  echo $item['keyword'];?>" data-rule-required="true"  />
        <span class='help-block'>生成海报的关键词</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['keyword'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label must">任务推广人数</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <input type="number" name="needcount" class="form-control" value="<?php  echo $item['needcount'];?>" data-rule-required="true"  />
        <span class='help-block'>完成任务所需推广人数</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['needcount'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label must">任务有效期</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);?>
        <span class='help-block'>可领取任务的时间段</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo date('Y-m-d H:i', $starttime).'-'.date('Y-m-d H:i', $endtime);?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label must">任务完成期限</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <input type="number" name="days" class="form-control" value="<?php  echo $item['days']/24/3600;?>" data-rule-required="true"  />
        <span class='help-block'>任务领取后在此时间内完成，最长时间30天（临时二维码规定）</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['days']/24/3600;?>天</div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label must">任务奖励有效期限</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <input type="number" name="reward_days" class="form-control" value="<?php  echo $item['reward_days']/24/3600;?>" data-rule-required="true"  />
        <span class='help-block'>任务完成后在此时间内领取奖励，无限期请设置0（单位：天）</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['reward_days']/24/3600;?>天</div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">任务未开始提示</label>

    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <textarea name="starttext" class="form-control"  ><?php  if($item['starttext']) { ?><?php  echo $item['starttext'];?><?php  } else { ?>活动于 [任务开始时间] 开始，请耐心等待...<?php  } ?></textarea>
        <span class="help-block">默认：活动于 [任务开始时间] 开始，请耐心等待...</span>
        <span class="help-block">变量：[任务开始时间] 活动开始时间 [任务结束时间] 活动结束时间</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['starttext'];?></div>
        <?php  } ?>
    </div>

</div>

<div class="form-group">
    <label class="col-sm-2 control-label">任务结束提示</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <textarea name="endtext" class="form-control"  ><?php  if($item['endtext']) { ?><?php  echo $item['endtext'];?><?php  } else { ?>活动已结束，谢谢您的关注!<?php  } ?></textarea>
        <span class="help-block">默认：活动已结束，谢谢您的关注!</span>
        <span class="help-block">变量：[任务开始时间] 活动开始时间 [任务结束时间] 活动结束时间</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['endtext'];?></div>
        <?php  } ?>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label">生成等待文字</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <textarea name="waittext" class="form-control"  ><?php  if($item['waittext']) { ?><?php  echo $item['waittext'];?><?php  } else { ?>您的专属海报正在拼命生成中，请等待片刻...<?php  } ?></textarea>
        <span class="help-block">例如：您的专属海报正在拼命生成中，请等待片刻...</span>
        <span class="help-block">变量：[任务开始时间] 活动开始时间 [任务结束时间] 活动结束时间</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['waittext'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">关注后自动接任务</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <label class="radio-inline">
            <input type="radio" name="autoposter" value="0" <?php  if(empty($item['autoposter'])) { ?>checked<?php  } ?> /> 禁用
        </label>

        <label class="radio-inline">
            <input type="radio" name="autoposter" value="1" <?php  if($item['autoposter']==1) { ?>checked<?php  } ?> /> 启用
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['autoposter'])) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
        <?php  } ?>
        <div class="help-block">关注别人的任务海报后，自动生成自己的海报</div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">奖励商品参与分销</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <label class="radio-inline">
            <input type="radio" name="is_goods" value="0" <?php  if($item['is_goods']==0) { ?>checked<?php  } ?> /> 禁用
        </label>

        <label class="radio-inline">
            <input type="radio" name="is_goods" value="1" <?php  if($item['is_goods']==1) { ?>checked<?php  } ?> /> 启用
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($item['is_goods']==0) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">是否可重复</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <label class="radio-inline">
            <input type="radio" name="is_repeat" value="0" <?php  if($item['is_repeat']==0) { ?>checked<?php  } ?> /> 禁用
        </label>

        <label class="radio-inline">
            <input type="radio" name="is_repeat" value="1" <?php  if($item['is_repeat']==1) { ?>checked<?php  } ?> /> 启用
        </label>
        <span class="help-block">任务完成、任务失败后是否可重复领取任务</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($item['is_repeat']==0) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">是否启用</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.edit')) { ?>
        <label class="radio-inline">
            <input type="radio" name="status" value="0" <?php  if($item['status']==0) { ?>checked<?php  } ?> /> 禁用
        </label>

        <label class="radio-inline">
            <input type="radio" name="status" value="1" <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 启用
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($item['status']==0) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
        <?php  } ?>
    </div>
</div>