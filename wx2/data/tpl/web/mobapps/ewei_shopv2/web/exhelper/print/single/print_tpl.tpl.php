<?php defined('IN_IA') or exit('Access Denied');?><div style="width: 190px; float: left; margin-right: 10px;">
		<div class='panel panel-default'>
			<div class="panel-heading">搜索结果 (收件人姓名)</div>
			<div class='panel-body' style='padding: 5px;' id="result-left">
				<div class="panel-body" style="min-height:100px; max-height: 500px; overflow-y: auto; padding: 0;">
					<table class="table table-hover" style="width: auto; min-width: 100%; margin: 0;">
						<?php  if(!empty($list)) { ?> 
							<?php  if(is_array($list)) { foreach($list as $row) { ?>
								<tr style="cursor: pointer;">
									<td class="result-item" data-orderids="<?php  echo implode(',',$row['orderids'])?>"><?php  echo $row['realname'];?></td>
								</tr>
							<?php  } } ?> 
						<?php  } else { ?> 
							<p style="text-align: center; line-height: 100px;">抱歉！未查找到相关数据。</p> 
						<?php  } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div style="width: 800px; float: left;">
		<div class='panel panel-default'>
			<div class="panel-heading">订单信息</div>
			<div class='panel-body' style='padding: 5px;' id="result-order">
				<p style="text-align: center; line-height: 100px;">
					<?php  if(!empty($list)) { ?> 请先选择左侧搜索结果 <?php  } else { ?> 抱歉！未查到相关数据。 <?php  } ?>
				</p>
			</div>
		</div>
	</div> 