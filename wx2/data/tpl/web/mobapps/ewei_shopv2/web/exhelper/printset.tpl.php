<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='page-heading'><h2> 打印机设置</h2></div>
<form id="setform" action="" method="post" class="form-horizontal form-validate">
	<div class="alert alert-info">注意: 1. 请将打印机连接至本机。2. 在本机上安装打印控件。3. 将打印控件中的打印端口下面的打印端口设为相同。</div>

	<div class="form-group">
		<label class="col-sm-2 control-label must">IP端口</label>
		<div class="col-sm-9 col-xs-12">
			<?php if(cv('exhelper.printset.edit')) { ?>
				<input type='number' class='form-control' name='port' value="<?php  echo $sys['port'];?>" data-rule-required='true' />
			<?php  } else { ?>
				<div class='form-control-static'><?php  echo $sys['port'];?></div>
			<?php  } ?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		<div class="col-sm-9">
			<?php if(cv('exhelper.printset.edit')) { ?>
				<input type="submit" value="提交" class="btn btn-primary" />
			<?php  } ?>
		</div>
	</div>

</form>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>