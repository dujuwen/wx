<?php defined('IN_IA') or exit('Access Denied');?><div class='menu-header'><?php  echo $this->plugintitle?></div>
<ul>
    <li <?php  if($_W['action']=='') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task')?>">海报管理</a></li>
</ul>
<div class='menu-header'>系统设置</div>
<ul>
    <li <?php  if($_W['action']=='default') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task/default')?>">说明&通知设置</a></li>
    <li <?php  if($_W['action']=='default.setstart') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task/default/setstart')?>">入口设置</a></li>
    <li <?php  if($_W['action']=='adv') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('task/adv')?>">幻灯片设置</a></li>
</ul>

