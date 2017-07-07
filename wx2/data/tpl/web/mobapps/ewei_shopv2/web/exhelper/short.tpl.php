<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading">
	
	<h2>商品简称设置 <small>数量: <span class='text-danger'><?php  echo $total;?></span> 条</small></h2> </div>

<form action="./index.php" method="get" class="form-horizontal" plugins="form">
		<input type="hidden" name="c" value="site" />
		<input type="hidden" name="a" value="entry" />
		<input type="hidden" name="m" value="ewei_shopv2" />
		<input type="hidden" name="do" value="web" />
		<input type="hidden" name="r" value="exhelper.short" />
	<div class="page-toolbar row m-b-sm m-t-sm">
		<div class="col-sm-4">

			<div class="input-group-btn">
				<button class="btn btn-default btn-sm" type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
				<?php if(cv('exhelper.short.edit')) { ?>
					<button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('exhelper/short/edit')?>"><i class='fa fa-circle-o'></i> 清空简称</button>
				<?php  } ?>

			</div>
		</div>

		<div class="col-sm-8 pull-right">

			<select name='status' class='form-control input-sm' style='width:100px;'>
				<option value='' <?php  if($_GPC[ 'status']=='' ) { ?>selected<?php  } ?>>全部状态</option>
				<option value='1' <?php  if($_GPC[ 'status']=='1' ) { ?>selected<?php  } ?>>上架</option>
				<option value='0' <?php  if($_GPC[ 'status']=='0' ) { ?>selected<?php  } ?>>下架</option>
			</select>

			<select name='shorttitle' class='form-control  input-sm' style='width:100px;'>
				<option value='' <?php  if($_GPC[ 'shorttitle']=='' ) { ?>selected<?php  } ?>>全部简称</option>
				<option value='1' <?php  if($_GPC[ 'shorttitle']=='1' ) { ?>selected<?php  } ?>>已填写</option>
				<option value='2' <?php  if($_GPC[ 'shorttitle']=='2' ) { ?>selected<?php  } ?>>未填写</option>
			</select>

			<div class="input-group">
				<input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
							
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
				<th>商品标题</th>
				<th style="width:250px;">商品简称<?php if(cv('exhelper.short.edit')) { ?><small>(点击编辑)</small><?php  } ?></th>
				<th style="width:60px;">状态</th>
			</tr>
		</thead>
		<tbody>
			<?php  if(is_array($list)) { foreach($list as $row) { ?>
			<td>
				<input type='checkbox' value="<?php  echo $row['id'];?>" />
			</td>
			<td>
				<?php  echo $row['title'];?>
			</td>
			<td>
				<?php if(cv('exhelper.short.edit')) { ?>
					<a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('exhelper/short/edit',array('id'=>$row['id']))?>">
						<?php  if(empty($row['shorttitle'])) { ?>未填写<?php  } else { ?><?php  echo $row['shorttitle'];?><?php  } ?>
					</a> 
				<?php  } else { ?> 
					<?php  echo $row['shorttitle'];?> 
				<?php  } ?>
			</td>

			<td>
				<?php  if($row['status']>0) { ?>
					<span class='label label-primary'>上架</span>
				<?php  } else { ?>
					<span class='label label-default'>下架</span>
				<?php  } ?>
			</td>

			</tr>
			<?php  } } ?>
		</tbody>
	</table>
	<?php  echo $pager;?>

</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>