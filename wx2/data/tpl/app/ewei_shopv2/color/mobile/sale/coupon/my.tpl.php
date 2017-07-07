<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon.css?v=2.0.0">
<div class='fui-page  fui-page-current coupon-my-page'>
    <div class="fui-header">
		<div class="fui-header-left">
			<a class="back"></a>
		</div>
		<div class="title">我的优惠券</div> 
		<div class="fui-header-right">&nbsp;</div>
    </div>
	<div class='fui-content'>
		<div class='fui-tab fui-tab-danger' id='cateTab'>
			<a class="active" data-cate=''>未使用</a>
			<a data-cate='used'>已使用</a>
			<a data-cate='past'>已过期</a>
		</div>
		<?php  if(empty($set['closecenter'])) { ?>
			<a class="btn btn-default-o external" style="display: block;" href="<?php  echo mobileUrl('sale/coupon')?>"><i class="icon icon-gifts"></i> 赶紧去领券中心看看更多优惠券~</a>
		<?php  } ?>
		<div class="fui-message fui-message-popup in content-empty" style="display: none; margin-top: 0; padding-top: 0; position: relative; height: auto; background: none;">
				<div class="icon ">
					<i class="icon icon-information"></i>
				</div>
				<div class="content">您还没有优惠券~</div>
		</div>
		<div id="container" class="coupon-container"></div>
		<div class='infinite-loading' style="text-align: center; color: #666;">
	    	<span class='fui-preloader'></span>
	    	<span class='text'> 正在加载...</span>
	    </div>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
	</div>

	<script id='tpl_list_coupon_my' type='text/html'>
		<%each list as coupon%>
			<%if  coupon.check == 0%>
				<a href="<?php  echo mobileUrl('sale/coupon/my/detail')?>&id=<%coupon.id%>" class="coupon-index-list-a  <%coupon.color%>">
			<% else%>
				<a href="javascript:void(0)" class="coupon-index-list-a  <%coupon.color%>">
			<%/if%>
				<div class="fui-list coupon-list">
					<span class="coupon-ling"><img src="../addons/ewei_shopv2/template/mobile/default/static/images/coupon/<%coupon.imgname%>.png" alt=""></span>
					<div class="fui-list-inner coupon-index-list-left">
						<b   style="width: 92px ; text-align:center ;<% if coupon.settitlecolor ==1&&coupon.check !=2 %>background:<%coupon.titlecolor%><%/if%>"><%coupon.tagtitle%></b>
						<div class="coupon-index-list-info fui-list">
							<div class="fui-list-media">
								<img src="<%if coupon.thumb==''%>/addons/ewei_shopv2/template/mobile/default/static/images/coupon/coupon-list-img.png<%else%><%coupon.thumb%><%/if%>" alt="">
							</div>
							<div class="fui-list-inner">
								<h3><%coupon.couponname%></h3>
								<p class="coupon-full"><%=coupon.title3%>  <%=coupon.title2%></p>
								<p class="coupon-time">
									<%if coupon.timestr==''%>
									永久有效
									<%else%>
									<%if coupon.past%>
									已过期
									<%else%>
									有效期 <%coupon.timestr%>
									<%/if%>
									<%/if%>
									<%if coupon.merchname!=''%>
									限购[<%coupon.merchname%>]店铺商品
									<%/if%>
								</p>
							</div>
						</div>
					</div>
					<div class="fui-list-media coupon-index-list-right">
						<div class="forth0 circle coupon-list-canvas"></div>
						<i class="coupon-list-ling">
							<%if  coupon.check ==2%>
								已过期
							<%else if  coupon.check ==1%>
								已使用
							<%else%>
								立即使用
							<%/if%>
						</i>
					</div>
				</div>
			</a>

		<%/each%>
	</script>
	<script language='javascript'>require(['biz/sale/coupon/my'], function (modal) {modal.init();});</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>