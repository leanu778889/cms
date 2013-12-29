<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后盾网cms后台管理中心</title>
<script type='text/javascript' src='http://localhost/cms/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/cms/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/cms/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/cms/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/cms/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]-->
<script type="text/javascript" src="http://localhost/cms/Admin/Tpl/Public/js/base.js"></script>
<script type="text/javascript" src="http://localhost/cms/Admin/Tpl/Public/js/index.js"></script>
<link rel="stylesheet" href="http://localhost/cms/Admin/Tpl/Public/css/base.css" />
<link rel="stylesheet" href="http://localhost/cms/Admin/Tpl/Public/css/index.css" />
<base target="content" />
</head>
<body style="overflow:hidden;">
	<div id="header">
		<a target="_blank" class='logo' href="http://localhost/cms"></a>
		<ul class='topRight'>
			<li>
				<a target="_blank" href="<?php echo U('http://localhost/cms/index.php/Index/index');?>">网站首页</a>
			</li>
			<li>
				<a target="_parent" href="<?php echo U('Index/quit');?>">退出</a>
			</li>
			<li>
				欢迎你：<span>admin</span>
			</li>
		</ul>
	</div>
	<div id="main">
		<div id="sideNav">
			<?php if(is_array($nav)):?><?php  foreach($nav as $k=>$v){ ?>
			<div class='item'>
				<a class='name' href="javascript:void(0);">
					<i class="<?php echo $v['ico'];?> icon-white"></i><?php echo $v['name'];?>
				</a>
				<?php if(is_array($v['subnav'])){?>
				<ul class='subnav'>
					<?php if(is_array($v['subnav'])):?><?php  foreach($v['subnav'] as $m){ ?>
					<li>
						<a  href="<?php echo $m['url'];?>"><i class="icon-share-alt icon-white"></i><?php echo $m['name'];?></a>
					</li>
					<?php }?><?php endif;?>
				</ul>
			<?php }?>
			</div>
			<?php }?><?php endif;?>
		</div>
	<div id="iframeBox">
			<iframe src="<?php echo U('http://localhost/cms/admin.php/Index/welcome');?>"  name="content" frameborder=0 width="100%" height="100%"></iframe>
	</div>

</div>



</body>
<script type="text/javascript">
setContentSize();
/**
 * 设置内容区域尺寸
 */
function setContentSize(){
	var iH =  $(window).height()-30;
	$('#mian').height(iH);
	$('#sideNav').height(iH);
	$('#iframeBox').height(iH);
}
/**
 * 侧边导航切换
 */
(function sideNavChange(){
	//导航收缩展开
	$('#sideNav .item .name').toggle(function(){
		//切换当前为选择状态
		$(this).addClass('selected').find('i').removeClass('icon-white');
		//显示子导航
		$(this).parent().find('.subnav').show();
		//切换字导航第一个为选择状态
		$(this).parent().find('.subnav').find('li').removeClass('active').find('i').addClass('icon-white');
		$(this).parent().find('.subnav').find('li').eq(0).addClass('active').find('i').removeClass('icon-white');
	},function(){
		//取消当前的选择状态
		$(this).removeClass('selected').find('i').addClass('icon-white');;
		//隐藏子导航
		$(this).parent().find('.subnav').hide();
	})
	$('#sideNav .item .subnav li').click(function(){
		//移除所有的选中状态
		$('#sideNav .item .subnav li').removeClass('active').find('i').addClass('icon-white');
		//切换当前为选中
		$(this).addClass('active').find('i').removeClass('icon-white');
	})
})()
</script>
</html>