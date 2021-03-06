<?php defined('IN_IA') or exit('Access Denied');?>﻿<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php  if(isset($title)) $_W['page']['title'] = $title?><?php  if(!empty($_W['page']['title'])) { ?><?php  echo $_W['page']['title'];?> - <?php  } ?><?php  if(empty($_W['page']['copyright']['sitename'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信三级分销管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['sitename'];?><?php  } ?></title>
<meta name="keywords" content="<?php  if(empty($_W['page']['copyright']['keywords'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信三级分销管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['keywords'];?><?php  } ?>" />
<meta name="description" content="<?php  if(empty($_W['page']['copyright']['description'])) { ?><?php  if(IMS_FAMILY != 'x') { ?>微信三级分销管理系统<?php  } ?><?php  } else { ?><?php  echo $_W['page']['copyright']['description'];?><?php  } ?>" />
<link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
<script src="./resource/weicheng/js/require.js"></script>
<script src="./resource/weicheng/js/app/config.js"></script>
<link href="resource/weicheng/css/style.css" rel="stylesheet"/>
<script src="resource/weicheng/js/jqbase.js"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="resource/weicheng/js/dd_belatedpng_0.0.7a.js"></script>
<script type="text/javascript">
	DD_belatedPNG.fix('*');
</script>
<![endif]-->
<!--[if IE]>
<script src="resource/weicheng/js/label.js" type="text/javascript" language="javascript"></script>
<![endif]-->
</head>
<body>
<header id="h_reg">
	<section class="layout"><img src="resource/weicheng/images/reg_logo.png" /></section>
</header>
<script>
	$('#form1').submit(function(){
		if($.trim($(':text[name="username"]').val()) == '') {
			util.message('没有输入用户名.', '', 'error');
			return false;
		}
		if($('#password').val() == '') {
			util.message('没有输入密码.', '', 'error');
			return false;
		}
		if($('#password').val() != $('#repassword').val()) {
			util.message('两次输入的密码不一致.', '', 'error');
			return false;
		}
/* 							if (!$.trim($('[name="nickname"]').val())) {
				util.message('昵称为必填项，请返回修改！', '', 'error');
				return false;
			}
									if (!$.trim($('[name="realname"]').val())) {
				util.message('真实姓名为必填项，请返回修改！', '', 'error');
				return false;
			}
								 */				if($.trim($(':text[name="code"]').val()) == '') {
			util.message('没有输入验证码.', '', 'error');
			return false;
		}
			});
	var h = document.documentElement.clientHeight;
	$(".login").css('min-height',h);
</script>
<section class="reg_main">
	<section class="layout">
    	<img src="resource/weicheng/images/reg_title.png" class="reg_t" />
    	<form class="reg_tab" action="" method="post" role="form" id="form1">
        	<table>
            	<tr>
                	<td>账号名称：</td>
                    <td><input class="t" name="username" type="text"  placeholder="请使用中文名称注册"><label><img src="resource/weicheng/images/reg_mark2.png" /></label></td>
                </tr>
                <tr>
                	<td>登陆密码：</td>
                    <td><input class="t" name="password" type="password" id="password" placeholder="请设置登陆密码"><label><img src="resource/weicheng/images/reg_mark2.png" /></label></td>
                </tr>
                <tr>
                	<td>确认密码：</td>
                    <td><input class="t" name="password" type="password" id="repassword" placeholder="请再次输入密码"><label><img src="resource/weicheng/images/reg_mark2.png" /></label></td>
                </tr>
				<tr>
				    <td>昵称：</td>
				    <td><input type="text" class="form-control" name="nickname" value="" /><label><img src="resource/weicheng/images/reg_mark2.png" /></label></td>
				</tr>
				<tr>
					<td>真实姓名：</td>
				    <td><input type="text" class="form-control" name="realname" value="" /><label><img src="resource/weicheng/images/reg_mark2.png" /></label></td>
				</tr>
				<tr>
					<td>QQ号：</td>
				    <td><input type="text" class="form-control" name="qq" value="" /></td>
				</tr>
					<td>注册验证:</td>
					<td>
					<input name="code" type="text" placeholder="请输入验证编码" style="width:65%;display:inline;margin-right:17px">
					<img src="<?php  echo url('utility/code');?>" class="img-rounded" style="cursor:pointer;" onclick="this.src='<?php  echo url('utility/code');?>' + Math.random();" /></td>
				</tr>
				<tr>
                	<td colspan="2"><input  type="submit" name="submit"  class="btn" value="立即注册" /><input name="token" value="<?php  echo $_W['token'];?>" type="hidden" /><a href="index.php?c=user&a=login" target="_blank" style="float: right;">已有账号？登录</a></td>
                </tr>
            </table>
        </form>
    </section>
</section>
<section class="f_reg">
<section class="f_nav">
<div class="pulldown push-30-t text-center animated fadeInUp">
<small class="text-muted"><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by v<?php echo IMS_VERSION;?> &copy; 2014-2015 <?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></small>
</div>
</section>
</section>
</body>
</html>
