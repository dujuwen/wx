<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script src="../addons/ewei_shopv2/static/js/app/biz/sale/coupon/circle-progress.js"></script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon.css?v=2.0.0">
<div class='fui-page fui-page-current'>
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back"></a>
		</div>
		<div class="title">优惠券领取中心</div>
		<div class="fui-header-right">
			<a href="<?php  echo mobileUrl('sale/coupon/my')?>" class="external">
				<i class="icon icon-person2"></i>
			</a>
		</div>
	</div>
	<div class='fui-content coupon-index-bg'>

		<?php  if(!empty($advs)) { ?>
			<div class='fui-swipe' data-transition="500" data-gap="1"> 
			    <div class='fui-swipe-wrapper'>
					<?php  if(is_array($advs)) { foreach($advs as $adv) { ?>
						<a class='fui-swipe-item' href="<?php  if(!empty($adv['url'])) { ?><?php  echo $adv['url'];?><?php  } else { ?>javascript:;<?php  } ?>"><img src="<?php  echo tomedia($adv['img'])?>" /></a>
					<?php  } } ?>
			    </div>
			    <div class='fui-swipe-page'></div>
			</div>
		<?php  } ?>

		<div class="fui-tab-scroll">
			<div class='container'>
				<span class='item on' data-cateid="">全部优惠券</span>
					<?php  if(is_array($category)) { foreach($category as $item) { ?>
						<span class='item' data-cateid="<?php  echo $item['id'];?>"><?php  echo $item['name'];?></span>
					<?php  } } ?>
			</div>
		</div>
		
		<div class="fui-message fui-message-popup in content-empty" style="display: none; margin-top: 0; padding-top: 0; position: relative; height: auto; background: none;">
				<div class="icon ">
					<i class="icon icon-information"></i>
				</div>
				<div class="content">还没有发布优惠券~</div>
		</div>
		<!--内容加载-->
		<div id='container' class="coupon-container coupon-index-list">
		</div>

		<div class='infinite-loading' style="text-align: center; color: #666;">
	    	<span class='fui-preloader'></span>
	    	<span class='text'> 正在加载...</span>
	    </div>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
	</div>
	<script id='tpl_list_coupon' type='text/html'>
		<%each list as coupon index%>
		<% if coupon.isdisa =='1'%>
		<a href="javascript:void(0);" class="coupon-index-list-a disa">
			<div class="fui-list coupon-list " >
				<i class="coupon-top-i"></i><i class="coupon-bot-i"></i>
				<span class="coupon-ling"><img src="../addons/ewei_shopv2/template/mobile/default/static/images/coupon/end.png" alt=""></span>
				<div class="fui-list-inner coupon-index-list-left">
					<b style="width: 92px ; text-align:center ; "><%coupon.tagtitle%></b>
					<div class="coupon-index-list-info fui-list">
						<div class="fui-list-media">
							<img src="<%if coupon.thumb==''%>/addons/ewei_shopv2/template/mobile/default/static/images/coupon/coupon-list-img.png<%else%><%coupon.thumb%><%/if%>" alt="">
						</div>
						<div class="fui-list-inner">
							<h3><%coupon.couponname%></h3>
							<p class="coupon-full"><%=coupon.title3%>  <%=coupon.title2%></p>
							<p class="coupon-time"><%=coupon.title4%></p>
						</div>
					</div>
				</div>
				<div class="fui-list-media coupon-index-list-right">
					<div class="forth0 circle coupon-list-canvas"></div>
					<i class="coupon-list-ling">已发完</i>
				</div>
			</div>
		</a>
		<% else %>
		<a href="<?php  echo mobileUrl('sale/coupon/detail')?>&id=<%coupon.id%>" class="coupon-index-list-a  <%coupon.color%>">
			<div class="fui-list coupon-list coupon-list-allow" data-id="<%coupon.id%>" data-t="<%coupon.t%>" data-last="<%coupon.last%>">
				<i class="coupon-top-i"></i><i class="coupon-bot-i"></i>
				<div class="fui-list-inner coupon-index-list-left">
					<b   style="width: 92px ; text-align:center ; <% if coupon.settitlecolor ==1 %>background:<%coupon.titlecolor%><%/if%>"><%coupon.tagtitle%></b>
					<div class="coupon-index-list-info fui-list">
						<div class="fui-list-media">
							<img src="<%if coupon.thumb==''%>/addons/ewei_shopv2/template/mobile/default/static/images/coupon/coupon-list-img.png<%else%><%coupon.thumb%><%/if%>" alt="">
						</div>
						<div class="fui-list-inner">
							<h3><%coupon.couponname%></h3>
							<p class="coupon-full"><%=coupon.title3%>  <%=coupon.title2%></p>
							<p class="coupon-time"><%=coupon.title4%></p>
						</div>
					</div>
				</div>
				<div class="fui-list-media coupon-index-list-right">
					<div class="forth<%coupon.id%> circle coupon-list-canvas">
						<p>剩余</p><strong><%coupon.lastratio%><i>%</i></strong>
					</div>
					<i class="coupon-list-ling">立即领取</i>
				</div>
			</div>
		</a>

		<% /if %>
		<%/each%>
	</script>
	<script  language='javascript'>
		require(['biz/sale/coupon/common'], function (modal) {modal.init();});
	</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>