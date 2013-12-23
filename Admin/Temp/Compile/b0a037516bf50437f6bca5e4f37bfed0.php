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
		<strong>友情链接列表</strong>
	</div>
			<table class="table table-bordered" id="table">
				<thead>
					<tr>
						<th width='12%'>名称</th>
						<th width='12%'>LOGO</th>
						<th>链接地址</th>
						<th width='18%'>链接描述</th>
						<th width='8%'>是否显示</th>
						<th width='20%'>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
						<tr>
							<td><?php echo $v['fname'];?></td>
							<td><img src="http://localhost/cms/<?php echo $v['logo'];?>"/></td>
							<td><?php echo $v['url'];?></td>
							<td><?php echo $v['msg'];?></td>
							<td><?php if($v['isshow']){?>是<?php  }else{ ?>否<?php }?></td>
							<td>
								<a href="<?php echo U('Flink/edit');?>/fid/<?php echo $v['fid'];?>" class="btn btn-small">编辑</a>
								<a href="<?php echo U('Flink/del');?>/fid/<?php echo $v['fid'];?>" class="btn btn-small delAffirm">删除</a>
							</td>
						</tr>
					<?php }?><?php endif;?>
				</tbody>
			</table>
</div>
</body>
</html>