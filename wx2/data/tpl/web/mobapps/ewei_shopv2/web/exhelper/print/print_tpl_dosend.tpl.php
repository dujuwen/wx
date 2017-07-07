<?php defined('IN_IA') or exit('Access Denied');?><?php  if(empty($printTemp)) { ?>
	<p style="line-height: 100px; text-align: center;">请先选择快递单单模板</p>
<?php  } else { ?>
	<p>快递单模板：<?php  echo $printTemp['expressname'];?>  快递公司：<?php  echo $printTemp['expresscom'];?> 提示：系统已将不可发货状态的订单自动过滤。</p>
	<input type="hidden" value="<?php  echo $printTemp['expresscom'];?>" id="expresscom"/>
	<input type="hidden" value="<?php  echo $printTemp['express'];?>" id="express"/>
	<table class="table sendtable" style="margin-bottom: 0;">
		<tbody>
			<tr style="font-weight: bold;">
				<td style="width:40px;">序号</td>
				<td style="width: 190px;">订单号</td>
				<td style="width: 190px;">收件人</td>
				<td style="width: 80px;">支付状态</td>
				<td style="width: 70px;">订单状态</td>
				<td style="width: 70px;">快递公司</td>
				<td><span style="float: left;">快递单号</span><a href="javascript:;" style="float: right;" onclick="autonum()"><i class="fa fa-angle-double-down"></i> 自动填充</a></td>
			</tr>
			<?php  if(empty($orders)) { ?> 
				<tr>
					<td colspan="7">
						<p style="line-height: 100px; text-align: center;">没有可发货状态的订单</p>
					</td>				
				</tr>
			<?php  } else { ?>
				<?php  if(is_array($orders)) { foreach($orders as $i => $item) { ?>
					<?php  if($item['dispatchtype']!=1) { ?>
						<tr data-status="<?php  echo $item['status'];?>" data-ordersn="<?php  echo $item['ordersn'];?>" data-orderid="<?php  echo $item['id'];?>" class="send-order">
							<td><?php  echo $i+1?></td>
							<td><?php  echo $item['ordersn'];?></td>
							<td><?php  echo $item['address_address']['realname'];?>/<?php  echo $item['address_address']['mobile'];?></td>
							<td>
								<label class="label label-<?php  echo $item['paycss'];?>"><?php  echo $item['paytypename'];?></label>
							</td>
							<td class="status">
								<label class="label label-<?php  echo $item['statuscss'];?>"><?php  echo $item['statusname'];?></label>
							</td>
							<td style="text-align: center;"><?php  echo $printTemp['expresscom'];?></td>
							<td>
								<input class="form-control" type="tel" data-send-state="<?php  echo $item['send_status'];?>" value="" placeholder="请输入单号" class="expresssn">
							</td>
						</tr>
					<?php  } ?>
				<?php  } } ?>
			<?php  } ?>
		</tbody>
	</table>
<?php  } ?>



