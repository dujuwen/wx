<?php
//weichengtech
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Debug_EweiShopV2Page extends WebPage
{
	public function main()
	{
		global $_W;
		global $_GPC;
		$tpl = pdo_fetch('select * from ' . tablename('ewei_shop_member_message_template_type'));

		if (empty($tpl)) {
			$sql = "\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (1,'订单付款通知','saler_pay','OPENTM405584202','','订单付款通知','{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (2,'自提订单提交成功通知','carrier','OPENTM201594720','','订单付款通知','{{first.DATA}}自提码：{{keyword1.DATA}}商品详情：{{keyword2.DATA}}提货地址：{{keyword3.DATA}}提货时间：{{keyword4.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (3,'订单取消通知','cancel','OPENTM201764653','','订单关闭提醒','{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (4,'订单即将取消通知','willcancel','OPENTM201764653','','订单关闭提醒','{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (5,'订单支付成功通知','pay','OPENTM405584202','','订单支付通知','{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (6,'订单发货通知','send','OPENTM401874827','','订单发货通知','{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (7,'自动发货通知(虚拟物品及卡密)','virtualsend','OPENTM207793687','','自动发货通知','{{first.DATA}}商品名称：{{keyword1.DATA}}订单号：{{keyword2.DATA}}订单金额：{{keyword3.DATA}}卡密信息：{{keyword4.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (8,'订单状态更新(修改收货地址)(修改价格)','orderstatus','TM00017','','订单付款通知','{{first.DATA}}订单编号: {{OrderSn.DATA}}订单状态: {{OrderStatus.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (9,'退款成功通知','refund1','TM00430','','退款成功通知','{{first.DATA}}退款金额：{{orderProductPrice.DATA}}商品详情：{{orderProductName.DATA}}订单编号：{{orderName.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (10,'换货成功通知','refund3','OPENTM200605630','','任务处理通知','{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (11,'退款申请驳回通知','refund2','OPENTM200605630','','任务处理通知','{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (12,'充值成功通知','recharge_ok','OPENTM207727673','','充值成功提醒','{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (13,'提现成功通知','withdraw_ok','OPENTM207422808','','提现通知','{{first.DATA}}申请提现金额：{{keyword1.DATA}}取提现手续费：{{keyword2.DATA}}实际到账金额：{{keyword3.DATA}}提现渠道：{{keyword4.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (14,'会员升级通知(任务处理通知)','upgrade','OPENTM200605630','','任务处理通知','{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (15,'充值成功通知（后台管理员手动）','backrecharge_ok','OPENTM207727673','','充值成功提醒','{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . " (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (16,'积分变动提醒','backpoint_ok','OPENTM207509450','','积分变动提醒','{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}');\r\n          INSERT INTO " . tablename('ewei_shop_member_message_template_type') . ' (`id`,`name`,`typecode`,`templatecode`,`templateid`,`templatename`,`content`)           VALUES  (17,\'换货发货通知\',\'refund4\',\'OPENTM401874827\',\'\',\'订单发货通知\',\'{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}\');';
			pdo_query($sql);
		}
	}
}

?>
