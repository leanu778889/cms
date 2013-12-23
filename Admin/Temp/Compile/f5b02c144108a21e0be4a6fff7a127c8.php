<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后盾网cms后台管理中心</title>
<script type='text/javascript' src='http://localhost/11.11/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/11.11/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/11.11/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/11.11/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/11.11/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]-->
<script type="text/javascript" src="http://localhost/11.11/Admin/Tpl/Public/js/base.js"></script>
<script type="text/javascript" src="http://localhost/11.11/Admin/Tpl/Public/js/index.js"></script>
<link rel="stylesheet" href="http://localhost/11.11/Admin/Tpl/Public/css/base.css" />
<link rel="stylesheet" href="http://localhost/11.11/Admin/Tpl/Public/css/index.css" />
<base target="content" />
</head>
<body>
<div id="window">
	<div class='page_title'>
		<strong>站点配置</strong>
	</div>
	<div class='content'>
	<h3>站点信息</h3>
	<form id="form" action="<?php echo U('SetUp/index');?>" method="post">
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th width="15%">名称</th>
					<th width="20%">内容</th>
					<th width="20%">标题</th>
					<th width="45%">配置说明</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($config[1])):?><?php  foreach($config[1] as $v){ ?>
				<input type="hidden" value="<?php echo $v['id'];?>" name="id[]"/>
				<tr>
					<td><?php echo $v['name'];?></td>
					<td><input type="text" name="value[]" value="<?php echo $v['value'];?>"></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['msg'];?></td>
				</tr>
			<?php }?><?php endif;?>
			<tr>
				<td></td>
				<td><input class='btn' type="submit" value="修改配置"/></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
	</form>
	<h3>验证码配置</h3>
	<form id="form" action="<?php echo U('SetUp/index');?>" method="post">
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th width="15%">名称</th>
					<th width="20%">内容</th>
					<th width="20%">标题</th>
					<th width="45%">配置说明</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($config[2])):?><?php  foreach($config[2] as $v){ ?>
				<input type="hidden" value="<?php echo $v['id'];?>" name="id[]"/>
				<tr>
					<td><?php echo $v['name'];?></td>
					<td><input type="text" name="value[]" value="<?php echo $v['value'];?>"></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['msg'];?></td>
				</tr>
			<?php }?><?php endif;?>
			<tr>
				<td></td>
				<td><input class='btn' type="submit" value="修改配置"/></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
	</form>
	<h3>水印配置</h3>
	<form id="form" action="<?php echo U('SetUp/index');?>" method="post">
		<table class='table table-bordered'>
			<thead>

				<tr>
					<th width="15%">名称</th>
					<th width="20%">内容</th>
					<th width="20%">标题</th>
					<th width="45%">配置说明</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($config[3])):?><?php  foreach($config[3] as $v){ ?>
			<input type="hidden" value="<?php echo $v['id'];?>" name="id[]"/>
				<tr>
					<td><?php echo $v['name'];?></td>
					<td><input type="text" name="value[]" value="<?php echo $v['value'];?>"></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['msg'];?></td>
				</tr>
			<?php }?><?php endif;?>
			<tr>
				<td></td>
				<td><input class='btn' type="submit" value="修改配置"/></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
	</form>
	<h3>缩率图配置</h3>
	<form id="form" action="<?php echo U('SetUp/index');?>" method="post">
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th width="15%">名称</th>
					<th width="20%">内容</th>
					<th width="20%">标题</th>
					<th width="45%">配置说明</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($config[4])):?><?php  foreach($config[4] as $v){ ?>
				<input type="hidden" value="<?php echo $v['id'];?>" name="id[]"/>
				<tr>
					<td><?php echo $v['name'];?></td>
					<td><input type="text" name="value[]" value="<?php echo $v['value'];?>"></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['msg'];?></td>
				</tr>
			<?php }?><?php endif;?>
			<tr>
				<td></td>
				<td><input class='btn' type="submit" value="修改配置"/></td>
				<td></td>
				<td></td>
			</tr>
			</tbody>
		</table>
	</form>
	</div>
</div>
</body>
</html>