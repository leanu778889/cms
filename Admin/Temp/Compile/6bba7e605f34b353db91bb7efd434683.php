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
		<strong>标签列表</strong>
	</div>
			<table class="table table-bordered" style="width:400px;">
				<tr>
					<th>id</th>
					<th>标签名</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
					<tr>
						<td><?php echo $v['tid'];?></td>
						<td><?php echo $v['tagname'];?></td>
						<td>
							<a class='btn' href="<?php echo U('Tag/edit');?>/tid/<?php echo $v['tid'];?>">修改</a>
							<a class='btn delAffirm' href="<?php echo U('Tag/del');?>/tid/<?php echo $v['tid'];?>">删除</a>
						</td>
					</tr>
				<?php }?><?php endif;?>
			</table>
</div>
</body>
</html>