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
		<strong>分类列表</strong>
		<a class="btn btn-small" href="http://localhost/cms/admin.php/Category/add">添加顶级分类</a>
	</div>
			<table class="table table-bordered" id="table">
				<thead>
					<tr>
						<th width="5%"></th>
						<th width='12%'>分类名</th>
						<th>分类标题</th>
						<th width='10%'>排序</th>
						<th width='13%'>是否显示</th>
						<th width='30%'>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
						<tr class="level_<?php echo $v['level'];?> pid_<?php echo $v['pid'];?>" level="<?php echo $v['level'];?>" cid="<?php echo $v['cid'];?>">
							<td><span class='btn btn-info unfold'>+</span></td>
							<td>|-<?php echo $v['html'];?><?php echo $v['cname'];?></td>
							<td><?php echo $v['title'];?></td>
							<td><?php echo $v['sort'];?></td>
							<td><?php if($v['isshow']){?>显示<?php  }else{ ?>隐藏<?php }?></td>
							<td>
								<a class='btn' href="http://localhost/cms/admin.php/Category/add/cid/<?php echo $v['cid'];?>">添加子类</a>
								<a class='btn' href="http://localhost/cms/admin.php/Category/edit/cid/<?php echo $v['cid'];?>">修改分类</a>
								<a class='btn delAffirm' href="http://localhost/cms/admin.php/Category/del/cid/<?php echo $v['cid'];?>">删除分类</a>
							</td>
						</tr>
					<?php }?><?php endif;?>
				</tbody>
			</table>
</div>
</body>
</html>