<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading">
	<span class='pull-right'>
				<?php if(cv('exhelper.temp.express.add')) { ?>
				<a class='btn btn-primary btn-sm' href="<?php  echo webUrl('exhelper/temp/express/add')?>"><i class='fa fa-plus'></i> 添加模板</a>
				<?php  } ?>
    </span>
	<h2>快递单模板管理 <small>数量: <span class='text-danger'><?php  echo $total;?></span> 条</small></h2> 
</div>

<form action="./index.php" method="get" class="form-horizontal" plugins="form">
	<input type="hidden" name="c" value="site" />
	<input type="hidden" name="a" value="entry" />
	<input type="hidden" name="m" value="ewei_shopv2" />
	<input type="hidden" name="do" value="web" />
	<input type="hidden" name="r" value="exhelper.temp.express" />
	<div class="page-toolbar row m-b-sm m-t-sm">
		<div class="col-sm-4">
			<div class="input-group-btn">
				<button class="btn btn-default btn-sm" type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
				<?php if(cv('exhelper.temp.express.delete')) { ?>
					<button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除选中内容吗?" data-href="<?php  echo webUrl('exhelper/temp/express/delete')?>"><i class='fa fa-trash'></i> 删除</button>
				<?php  } ?>
			</div>
		</div> 

		<div class="col-sm-8 pull-right">
			<div class="input-group">
				<input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="输入快递单模版名称进行搜索"> <span class="input-group-btn">
					<button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
			</div>
		</div>
	</div>
</form>

<form action="" method="post">
	<table class="table table-hover table-responsive">
		<thead>
			<tr>
				<th style="width:25px;">
					<input type='checkbox' />
				</th>
				<th><?php  if($type==1) { ?>快递单<?php  } else if($type==2) { ?>发货单<?php  } ?>模版名称</th>
				<th style="width:100px;">快递公司</th>
				<th style="width:50px;">默认</th>
				<th style="width:145px;">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td>
						<input type='checkbox' value="<?php  echo $row['id'];?>" />
					</td>
					<td><?php  if(!empty($row['expressname'])) { ?><?php  echo $row['expressname'];?><?php  } else { ?>未填写<?php  } ?></td>
					<td>
						<span class="label label-success"><?php  echo $row['expresscom'];?></span>
					</td>
					<td>
						<span class='defaults label <?php  if($row['isdefault']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>' 
	                      <?php if(cv('exhelper.temp.express.setdefault')) { ?>
		                      data-toggle='ajaxSwitch' 
		                      data-confirm = "确认<?php  if($row['isdefault']==1) { ?>取消<?php  } else { ?>设为<?php  } ?>默认吗？"
		                      data-switch-css='.defaults'
	                          data-switch-other = 'true'
		                      data-switch-value='<?php  echo $row['isdefault'];?>'
		                      data-switch-value0='0|否|label label-default|<?php  echo webUrl('exhelper/temp/express/setdefault',array('isdefault'=>1, 'id'=>$row['id'], 'type'=>$type))?>'  
		                      data-switch-value1='1|是|label label-primary|<?php  echo webUrl('exhelper/temp/express/setdefault',array('isdefault'=>0, 'id'=>$row['id'], 'type'=>$type))?>'  
	                      	  style="cursor: pointer;"
	                      <?php  } ?>
	                    ><?php  if($row['isdefault']==1) { ?>是<?php  } else { ?>否<?php  } ?></span>
					</td>
					<td>
						<?php if(cv('exhelper.temp.express.edit')) { ?>
						<a class='btn btn-default btn-sm' href="<?php  echo webUrl('exhelper/temp/express/edit',array('id' => $row['id']));?>"><i class='fa fa-edit'></i> 编辑</a> <?php  } ?>
						 <?php if(cv('exhelper.temp.express.delete')) { ?>
						 <a class='btn btn-default btn-sm'
						data-toggle='ajaxRemove' href="<?php  echo webUrl('exhelper/temp/express/delete',array('id' => $row['id']));?>" data-confirm="确定要删除该模板吗？"><i class='fa fa-trash'></i> 删除</a><?php  } ?>
					</td>
				</tr>
			<?php  } } ?>
		</tbody>
	</table>
	<?php  echo $pager;?>

</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>