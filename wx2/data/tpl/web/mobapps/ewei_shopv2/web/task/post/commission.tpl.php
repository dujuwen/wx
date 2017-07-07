<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-sm-2 control-label">扫码关注成为下线</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('task' ,$item) ) { ?>
        <label class="radio-inline">
            <input type="radio" name="bedown" value="1" <?php  if($item['bedown']==1) { ?>checked<?php  } ?> /> 是
        </label>
        <label class="radio-inline">
            <input type="radio" name="bedown" value="0" <?php  if(empty($item['bedown'])) { ?>checked<?php  } ?> /> 否
        </label>
        <span class='help-block'>扫码关注直接成为推荐人的下线，不受分销【基础设置】的成为下线条件控制</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($item['bedown']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
        <?php  } ?>

    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">扫码关注成为分销商</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('task' ,$item) ) { ?>
        <label class="radio-inline">
            <input type="radio" name="beagent" value="1" <?php  if($item['beagent']==1) { ?>checked<?php  } ?> /> 是
        </label>
        <label class="radio-inline">
            <input type="radio" name="beagent" value="0" <?php  if(empty($item['beagent'])) { ?>checked<?php  } ?> /> 否
        </label>
        <span class='help-block'>扫码关注直接成为推荐人的下线并成为分销商，不受分销【基础设置】的成为分销商下线条件控制（仅是否直接审核通过由基础设置控制）</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($item['beagent']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
        <?php  } ?>
    </div>
</div>