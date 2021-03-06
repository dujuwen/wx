<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-sm-2 control-label">购买强制关注</label>
    <div class="col-sm-9">
        <?php if( ce('goods' ,$item) ) { ?>
        <label class="radio-inline"><input type="radio" name="needfollow" value="0" <?php  if(empty($item['needfollow']) ) { ?>checked="true"<?php  } ?>  /> 不需关注</label>
        <label class="radio-inline"><input type="radio" name="needfollow" value="1" <?php  if($item['needfollow'] == 1) { ?>checked="true"<?php  } ?>   /> 必须关注</label>
           <?php  } else { ?>
           <div class='form-control-static'><?php  if(empty($item['needfollow'])) { ?>不需关注<?php  } else { ?>必须关注<?php  } ?></div>
         <?php  } ?>
    </div>
</div>   
<div class="form-group">
    <label class="col-sm-2 control-label">未关注提示</label>
    <div class="col-sm-9">
        <?php if( ce('goods' ,$item) ) { ?>
            <input type='text' class="form-control" name='followtip' value='<?php  echo $item['followtip'];?>' />
           <span  class='help-block'>购买商品必须关注，如果未关注，弹出的提示，如果为空默认为“如果您想要购买此商品，需要您关注我们的公众号，点击【确定】关注后再来购买吧~”</span>
           <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['followtip'];?></div>
         <?php  } ?>
    </div>
</div>    

<div class="form-group">
    <label class="col-sm-2 control-label">关注引导</label>
    <div class="col-sm-9">
        <?php if( ce('goods' ,$item) ) { ?>
            <input type='text' class="form-control" name='followurl' value='<?php  echo $item['followurl'];?>' />
           <span  class='help-block'>购买商品必须关注，如果未关注，跳转的链接，如果为空默认为系统关注页</span>
           <?php  } else { ?>
           <div class='form-control-static'><?php  echo $item['followurl'];?></div>
         <?php  } ?>
    </div>
</div>    
<div class="form-group splitter"></div> 
<div class="form-group">
    <label class="col-sm-2 control-label">分享标题</label>
    <div class="col-sm-9 col-xs-12">
           <?php if( ce('goods' ,$item) ) { ?>
		
        <input type="text" name="share_title" id="share_title" class="form-control" value="<?php  if(empty($item['share_title'])) { ?>从现在开始爱上阅读，点击免费领取正版好书<?php  } else { ?><?php  echo $item['share_title'];?><?php  } ?>" />
        <span class='help-block'>如果不填写，默认为商品名称</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['share_title'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">分享图标</label>
    <div class="col-sm-9 col-xs-12">
           <?php if( ce('goods' ,$item) ) { ?>
        <?php echo tpl_form_field_image('share_icon', empty($item['share_icon'])?'images/2/2017/04/Rno4H1olzLf4k4KK4olrqQk4K40Rfz.png':$item['share_icon'] )?>
        <span class='help-block'>如果不选择，默认为商品缩略图片</span>
             <?php  } else { ?>
                            <?php  if(!empty($item['share_icon'])) { ?>
                            <a href='<?php  echo tomedia($item['share_icon'])?>' target='_blank'>
                            <img src="<?php  echo tomedia($item['share_icon'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                            </a>
                            <?php  } ?>
                        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">分享描述</label>
    <div class="col-sm-9 col-xs-12">
             <?php if( ce('goods' ,$item) ) { ?>
        <textarea name="description" class="form-control" ><?php  if(empty($item['description'])) { ?>by 7本好书<?php  } else { ?><?php  echo $item['description'];?><?php  } ?> </textarea>
        <span class='help-block'>如果不填写，则使用商品副标题，如商品副标题为空则使用店铺名称</span>
             <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['description'];?></div>
		
        <?php  } ?>
    </div>
</div>