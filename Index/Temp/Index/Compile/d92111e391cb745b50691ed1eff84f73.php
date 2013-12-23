<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>搜索页</title>
<link href="http://localhost/11.11/templates/default/public/css/category.css" rel="stylesheet" />
<link href="http://localhost/11.11/templates/default/public/css/common.css" rel="stylesheet" />
<script type="text/javascript" src="http://localhost/11.11/templates/default/public/js/index.js"></script>
</head>
<body>
	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><script type='text/javascript' src='http://localhost/11.11/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/11.11/templates/default/public/css/head.css" rel="stylesheet" />
<script>
	// 验证码初始地址
	var codeSrc = '<?php echo U("Index/User/showCode");?>';
</script>
<script type="text/javascript" src="http://localhost/11.11/templates/default/public/js/head.js"></script>

<!-- 遮挡层 -->
<div id="cover"> </div>
<!-- 登录框 -->
<div id="loginBox" url="<?php echo U("Index/User/checkIsLogin");?>" app="http://localhost/11.11/index.php/Index">

	<h3>登录 <a href="javascript:hideLoginBox();" class='close'></a></h3>
	<div class='error'>

	</div>
	<form id="loginForm" action="<?php echo U('Index/User/login');?>" method="post" checkUrl="<?php echo U('Index/User/checkLogin');?>">
	<ul>
		<li>
			<span class='name'>用户名:</span>
			<span class='input'><input class="lmust" type="text" name="username"/></span>
		</li>
		<li>
			<span class='name'>密码:</span>
			<span class='input'><input  type="password" name="password"/></span>
		</li>
		<li>
			<span class='name'>验证码:</span>
			<span class='input inputcode'><input class="lmust"  class='must' type="text" name="code"/></span>
			<span class='code'><img width="100" onclick="this.src = codeSrc+'?'+Math.random();" src="<?php echo U('Index/User/showCode');?>"/></span>
		</li>
		<li>
			<span class='name'></span>
			<span class='input inputsubmit'><input type="submit" name="username" value="提交"/></span>
			<span class='goreg'>没有账号,<a href="javascript:showRegBox();">去注册</a></span>
		</li>
	</ul>
	</form>
</div>
<!-- 注册框 -->
<div id="regBox">
	<h3>注册 <a href="javascript:hideRegBox();" class='close'></a></h3>
	<div class='error'>

	</div>
	<form id="regForm" action="<?php echo U('Index/User/reg');?>" method="post" checkUrl="<?php echo U('Index/User/checkReg');?>">
	<ul>
		<li>
			<span class='name'>用户名:</span>
			<span class='input'><input class="must" type="text" name="username"/></span>
		</li>
		<li>
			<span class='name'>邮箱:</span>
			<span class='input'><input class="must"  type="text" name="email"/></span>
		</li>
		<li>
			<span class='name'>密码:</span>
			<span class='input'><input class="pass1"  type="password" name="password"/></span>
		</li>
		<li>
			<span class='name'>确认密码:</span>
			<span class='input'><input class="pass2"  type="password" name="password_d"/></span>
		</li>
		<li>
			<span class='name'>昵称:</span>
			<span class='input'><input class="must" type="text" name="nickname"/></span>
		</li>
		<li>
			<span class='name'>验证码:</span>
			<span class='input inputcode'><input class="must"  class='must' type="text" name="code"/></span>
			<span class='code'><img width="100" onclick="this.src = codeSrc+'?'+Math.random();" src="<?php echo U('Index/User/showCode');?>"/></span>
		</li>
		<li>
			<span class='name'></span>
			<span class='input inputsubmit'><input type="submit" name="username" value="提交"/></span>
			<span class='goreg'>已有账号,<a href="javascript:showLoginBox();">去登录</a></span>
		</li>
	</ul>
	</form>
</div>
<div id="top">
		<div class='pos'>
			<div class='user' id="user">
				<img style="margin-top:10px;" id="loading" src="http://localhost/11.11/templates/default/public/images/05043156.gif"/>
			</div>
			<div class='search'>
				<form  action="<?php echo U('Index/Search/index');?>" method="get">
					<input class='keywords' type="text" name="keywords" />
					<input class='submit' type="submit" value="" />
				</form>
			</div>
		</div>
	</div>
	<div id="header">
		<div class='logo'>

		</div>
		<div class='navigation'>
			<a href="http://localhost/11.11">首页</a>
					<?php
		$db = M('category');
		$data = $db->field('cid,cname,pid,htmldir,islisthtml')->where(array('isshow'=>1))->select();
		$data = Data::channel($data,'cid','pid',0,null,1);
		?><?php foreach($data as $k=>$catid):?><?php $catid["url"] = getCategoryUrl($catid["islisthtml"],$catid["htmldir"],$catid["cid"]);?>
				<a href="<?php echo $catid['url'];?>"><?php echo $catid['cname'];?></a>
			<?php endforeach;?>
		</div>
	</div>

<div id="main">
		<div class='news'>
			<?php if(is_array($news)):?><?php  foreach($news as $v){ ?>
				<div class='newsList'>
					<div class='newsImage'>
						<a href="<?php echo $v['url'];?>"><img src="http://localhost/11.11/<?php echo $v['thumb'];?>"/></a>
					</div>
					<div class='newsContent'>
						<h3><a href="<?php echo $v['url'];?>"><?php echo $v['title'];?></a></h3>
						<p><?php echo $v['digest'];?></p>
						<a href="<?php echo $v['url'];?>" class='more'>更多>></a>
					</div>
				</div>
			<?php }?><?php endif;?>
			<div id='page'>
				<?php echo $page;?>
			</div>
		</div>
		<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><div class='sidebar'>
	<div class='item'>
		<h2>标签</h2>
		<div class='tagbox'>
					<?php
			$db = M('tag_news');
			$sql ='SELECT * FROM '.C('DB_PREFIX').'tag_news as t1 INNER JOIN '.C('DB_PREFIX').'tag as t ON t1.tag_tid=t.tid '."".' group by t1.tag_tid order by count(*) desc limit 0,'."10";
			$data = $db->query($sql);
		?><?php foreach($data as $tag):?><?php $tag["url"] = "http://localhost/11.11/index.php/Index/Search/index.html/tid/$tag[tid]";?>
				<a href="<?php echo $tag['url'];?>"><?php echo $tag['tagname'];?></a>
			<?php endforeach;?>
		</div>
	</div>
	<div class='item'>
		<h2>友情链接</h2>
		<ul class='flink'>
					<?php
			$db = M('flink');
			$data = $db->select();
		?><?php foreach($data as $link):?>
				<li><a href="<?php echo $link['url'];?>"><?php echo $link['fname'];?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class='item'>
		<h2>文章归档</h2>
		<ul class='flink'>
			<?php if(is_array($archives)):?><?php  foreach($archives as $k=>$v){ ?>
				<li style="height:auto;">
					<?php echo $k;?><br/>
					<?php if(is_array($v)):?><?php  foreach($v as $m){ ?>
						<a style="padding:0px 5px;" href="<?php echo $m['url'];?>"><?php echo $m['month'];?><em>(<?php echo $m['total'];?>)</em></a>
					<?php }?><?php endif;?>
				</li>
			<?php }?><?php endif;?>
		</ul>
	</div>
</div>
	</div>

	<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><div id="footer">
	<div class='bgbar'></div>
	<div class='bottom'>
		<div class='pos'>
			<div class='footerNav'>
					<?php
			$db = M('navigation');
			$data = $db->where(array('site'=>3))->select();
		?><?php foreach($data as $v):?>
				<?php if($v['opennew']){?>
				<a  target="_blank" href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a>
				<?php  }else{ ?>
				<a  href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a>
				<?php }?>
			<?php endforeach;?>
			</div>
			<div class='copyright'>
				© Copyright 2011-2013 www.houdunwang <?php echo $header['copy'];?>
			</div>
		</div>
	</div>
</div>
</body>
</html>