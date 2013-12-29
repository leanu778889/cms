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
<body>
<div id="window">
	<div class='page_title'>
		<strong>欢迎你：<?php echo $session['nickname'];?></strong>
	</div>
		<table class="table table-bordered">
			<tr>
				<th width="10%">名称</th>
				<th width="80%">值</th>
			</tr>
			<tr>
				<td>系统信息：</td>
				<td><?php echo $server['SERVER_SOFTWARE'];?></td>
			</tr>
			<tr>
				<td>PHP版本：</td>
				<td><?php echo PHP_VERSION;?></td>
			</tr>
			<tr>
				<td>服务器IP：</td>
				<td><?php echo $server['SERVER_ADDR'];?></td>
			</tr>
			<tr>
				<td>域名：</td>
				<td><?php echo $server['SERVER_NAME'];?></td>
			</tr>
			<tr>
				<td>端口：</td>
				<td><?php echo $server['SERVER_PORT'];?></td>
			</tr>
			<tr>
				<td>客户端信息：</td>
				<td><?php echo $server['HTTP_USER_AGENT'];?></td>
			</tr>
			<tr>
				<td>客户端IP：</td>
				<td><?php echo $server['REMOTE_ADDR'];?></td>
			</tr>
			<tr>
				<td>站点根路径：</td>
				<td><?php echo ROOT_PATH;?></td>
			</tr>
			<tr>
				<td>当前时间</td>
				<td><?php echo date('Y-m-d H:i:s',$server['REQUEST_TIME']);?></td>
			</tr>
		</table>
	</div>
</body>
</html>