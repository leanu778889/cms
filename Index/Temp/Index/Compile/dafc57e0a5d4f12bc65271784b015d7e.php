<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>大前端-首页</title>
<link rel="stylesheet" href="http://localhost/11.11/templates/style1/css/style.css" />
<script type="text/javascript" src="http://localhost/11.11/templates/style1/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="http://localhost/11.11/templates/style1/js/js.js"></script>
</head>

<body>
	<!-- 顶部100%灰色区域 -->
	<div id="top_dark_box">
		<!-- 中间1200px宽度区域 -->
		<div id="top_dark">
			<img src="http://localhost/11.11/templates/style1/images/others/logo.png" id="logo" />
			<!-- 导航菜单 -->
			<ul id="menu">
				<li>
					<a href="http://localhost/11.11" class="cur">首页</a>
				</li>
						<?php
		$db = M('category');
		$data = $db->field('cid,cname,pid,htmldir,islisthtml')->where(array('isshow'=>1))->select();
		$data = Data::channel($data,'cid','pid',0,null,1);
		?><?php foreach($data as $k=>$catid):?><?php $catid["url"] = getCategoryUrl($catid["islisthtml"],$catid["htmldir"],$catid["cid"]);?>
					<li>
						<a href="<?php echo $catid['url'];?>" class="top_menu"><?php echo $catid['cname'];?></a>
						<ul class="second">
								<li><a href="<?php echo $catid['data']['url'];?>"><?php echo $catid['data']['cname'];?></a></li>
						</ul>
					</li>
				<?php endforeach;?>
			</ul>
			<!-- 导航菜单结束 -->
			<!-- 搜索 -->
			<form action="" class="search_box">
				<input type="" class="keyword" value="输入关键字搜索" />
				<input type="submit" value="搜索" class="sub" />
			</form>
			<!-- 搜索结束 -->
			<!-- 用户登录 -->
			<a href="javascript:void(0)" class="top_login">用户登录</a>
			<!-- 用户登录结束 -->

			<!-- 用户登录对应隐藏区域 -->
			<div class="login_hide_box">
				<img src="images/sanjiao.gif" alt="" />
				<div class="middle">
					<p>用户名：</p>
					<input type="text" class="text" />
					<p>密码：</p>
					<input type="text" class="text" />
					<input type="submit" value="" class="sub" />
				</div>
				<div class="bottom">
					<a href="" class="reg">注册</a>
					<a href="" class="re_pass">找回密码</a>
				</div>
			</div>
			<!-- 用户登录对应隐藏区域结束 -->
		</div>
		<!-- 中间1200px宽度区域结束 -->
	</div>
	<!-- 顶部灰色100%区域结束 -->

	<!-- 顶部最新消息区域 -->
	<div id="latest_news_box">
		<div id="latest_news">
			<p><span class="title">最新消息：</span>大前端是一个关注web前端开发、用户体验设计、wordpress主题、前端招聘信息的站点</p>
		</div>
	</div>
	<!-- 顶部最新消息区域结束 -->

	<!-- 主体区域 -->
	<div id="main">
		<!-- 左侧区域 -->
		<div class="left">
			<ul class="arc_list">
						<?php
			$db = K('news');
			$data = $db->fetchAll(" recycled=0","addtime DESC",8);
		?><?php foreach($data as $k=>$news):?>
					<li>
						<div class="pic"><img src="http://localhost/11.11/<?php echo $news['thumb'];?>" alt="" /></div>
						<h3><a href="<?php echo $news['url'];?>"><?php echo $news['title'];?></a></h3>
						<span class="date"><?php echo date('m-d',$news['addtime']);?></span>
						<a href="<?php echo $news['url'];?>" class="comment">3人评论</a>
						<span class="browse_number"><?php echo $news['click'];?>次浏览</span>
						<p class="description"><?php echo $news['digest'];?></p>
					</li>
				<?php endforeach;?>

			</ul>
		</div>
		<!-- 左侧区域结束 -->

		<!-- 中间区域 -->
		<div class="center">
			<p class="title">置顶推荐</p>
			<ul class="title_list">
						<?php
			$db = K('news');
			$data = $db->fetchAll(" find_in_set('置顶',attr)","addtime DESC",5);
		?><?php foreach($data as $k=>$news):?>
					<li><a href="<?php echo $news['url'];?>"><?php echo $news['title'];?></a></li>
				<?php endforeach;?>
			</ul>

			<p class="title">活跃读者</p>
			<!-- 头像列表 -->
			<ul class="head_portrait">
				<li>
					<img src="images/others/touxiang.png" alt="" />
					<div class="hide_box">
						<span class="number">2+</span>
						<a href="" class="button">深水鱼1</a>
					</div>
				</li>
				<li>
					<img src="images/others/touxiang.png" alt="" />
					<div class="hide_box">
						<span class="number">2+</span>
						<a href="" class="button">深水鱼2</a>
					</div>
				</li>
				<li>
					<img src="images/others/touxiang.png" alt="" />
					<div class="hide_box">
						<span class="number">2+</span>
						<a href="" class="button">深水鱼3</a>
					</div>
				</li>
				<li>
					<img src="images/others/touxiang.png" alt="" />
					<div class="hide_box">
						<span class="number">2+</span>
						<a href="" class="button">深水鱼4</a>
					</div>
				</li>
				<li>
					<img src="images/others/touxiang.png" alt="" />
					<div class="hide_box">
						<span class="number">2+</span>
						<a href="" class="button">深水鱼5</a>
					</div>
				</li>
				<li>
					<img src="images/others/touxiang.png" alt="" />
					<div class="hide_box">
						<span class="number">2+</span>
						<a href="" class="button">深水鱼6</a>
					</div>
				</li>
				<li>
					<img src="images/others/touxiang.png" alt="" />
					<div class="hide_box">
						<span class="number">2+</span>
						<a href="" class="button">深水鱼7</a>
					</div>
				</li>
				<div class='clear'></div>
			</ul>
			<!-- 头像列表结束 -->

			<p class="title">Wordpress相关</p>
			<ul class="title_list">
						<?php
			$db = K('news');
			$data = $db->fetchAll(" category_cid=13 and recycled=0","addtime DESC",5);
		?><?php foreach($data as $k=>$news):?>
					<li><a href="<?php echo $news['url'];?>"><?php echo $news['title'];?></a></li>
				<?php endforeach;?>
			</ul>
			<p class="title">热门推荐</p>
			<ul class="title_list">
						<?php
			$db = K('news');
			$data = $db->fetchAll(" find_in_set('热门',attr)","addtime DESC",5);
		?><?php foreach($data as $k=>$news):?>
					<li><a href="<?php echo $news['url'];?>"><?php echo $news['title'];?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
		<!-- 中间区域结束 -->

		<!-- 右侧区域 -->
		<div class="right">
			<a href="" class="right_top_ad"><img src="images/others/d-simple-2.png" alt="" /></a>
			<p class="title">最新评论</p>
			<ul class="new_comments">
				<li>
					<a href="">
						<img src="images/others/touxiang.png" alt="" />
						<span class="name">深水鱼fans</span>
						<p class="content">大于1是放大，小于1是缩小。</p>
						<span class="arrows">></span>
					</a>
				</li>
				<li>
					<a href="">
						<img src="images/others/touxiang.png" alt="" />
						<span class="name">深水鱼fans</span>
						<p class="content">大于1是放大，小于1是缩小。</p>
						<span class="arrows">></span>
					</a>
				</li>
				<li>
					<a href="">
						<img src="images/others/touxiang.png" alt="" />
						<span class="name">深水鱼fans</span>
						<p class="content">大于1是放大，小于1是缩小。</p>
						<span class="arrows">></span>
					</a>
				</li>
				<li>
					<a href="">
						<img src="images/others/touxiang.png" alt="" />
						<span class="name">深水鱼fans</span>
						<p class="content">大于1是放大，小于1是缩小。</p>
						<span class="arrows">></span>
					</a>
				</li>
				<li>
					<a href="">
						<img src="images/others/touxiang.png" alt="" />
						<span class="name">深水鱼fans</span>
						<p class="content">大于1是放大，小于1是缩小。</p>
						<span class="arrows">></span>
					</a>
				</li>
				<li>
					<a href="">
						<img src="images/others/touxiang.png" alt="" />
						<span class="name">深水鱼fans</span>
						<p class="content">大于1是放大，小于1是缩小。</p>
						<span class="arrows">></span>
					</a>
				</li>
			</ul>

			<p class="title">技巧资源</p>
			<ul class="title_list">
				<li><a href="">WordPress主题的价格不等于它的价值(54)</a></li>
				<li><a href="">大前端新主题D-Simple上线 正式版已开售(169)</a></li>
				<li><a href="">WordPress VPS选购装机指南(44)</a></li>
				<li><a href="">大前端D7主题开卖啦(103)</a></li>
				<li><a href="">WordPress 存档页面模板制作（代码版）(47)</a></li>
			</ul>

			<!-- 广告 -->
			<div class="ad">
				<a href=""><img src="images/others/ad1.jpg" alt="" /></a>
			</div>
			<div class="ad">
				<a href=""><img src="images/others/ad2.jpg" alt="" /></a>
			</div>
			<!-- 广告结束 -->
		</div>
		<!-- 右侧区域结束 -->

	</div>
	<!-- 主体区域结束 -->

	<!-- 底部浅灰色导航区域 -->
	<div id="bottom_menu_box">
		<div class="bottom_menu">
			<dl>
				<dt><a href="">WordPress主题</a></dt>
				<dd><a href="">D-Simple主题</a></dd>
				<dd><a href="">D7主题</a></dd>
			</dl>
			<dl>
				<dt><a href="">文章存档</a></dt>
				<dd><a href="">标签</a></dd>
				<dd><a href="">读者墙</a></dd>
				<dd><a href="">给大前端投稿</a></dd>
			</dl>
			<dl>
				<dt><a href="">关于大前端</a></dt>
				<dd><a href="">留言联系</a></dd>
				<dd><a href="">广告合作</a></dd>
				<dd><a href="">免责声明</a></dd>
				<dd><a href="">友情链接</a></dd>
			</dl>
			<dl>
				<dt><a href="">前端工具箱</a></dt>
				<dd><a href="">在线代码高亮</a></dd>
				<dd><a href="">CSS压缩/格式化</a></dd>
				<dd><a href="">HTML多功能代码转换器</a></dd>
				<dd><a href="">JavaScript加密/压缩/格式化</a></dd>
			</dl>
		</div>
	</div>
	<!-- 底部浅灰色导航区域结束 -->

	<!-- 底部版权区域 -->
	<div id="bottom_copyright_box">
		<div class="bottom_copyright">
			版权所有，保留一切权利！ © 2013 <a href="">大前端</a>　Theme D-Simple
		</div>
	</div>
	<!-- 底部版权区域结束 -->
</body>
</html>
