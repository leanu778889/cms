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
		<strong>文章列表</strong>
	</div>

	<div class='content'>
		<table class='table table-bordered'>
			<thead>
			<tr>
				<th width="3%">id</th>
				<th width="15%">标题</th>
				<th width="10%">所属分类</th>
				<th width="10%">静态目录</th>
				<th width="10%">发布时间</th>
				<th width="8%">点击</th>
				<th width="10%">标签</th>
				<th width="15%">属性</th>
				<th >操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($data)):?><?php  foreach($data as $v){ ?>
				<tr>
					<td><?php echo $v['id'];?></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['cname'];?></td>
					<td><?php echo $v['htmldir'];?></td>
					<td><?php echo date('Y-m-d',$v['addtime']);?></td>
					<td><?php echo $v['click'];?></td>
					<td>
						<?php if(is_array($v['tags'])):?><?php  foreach($v['tags'] as $m){ ?>
							<?php echo $m['tagname'];?><br/>
						<?php }?><?php endif;?>
					</td>
					<td><?php echo $v['attr'];?></td>
					<td>
						<a class='btn btn-small' href="<?php echo U('News/edit');?>/id/<?php echo $v['id'];?>">编辑</a><br/>
						<br/>
						<a class='btn btn-small' href="<?php echo U('News/recycle');?>/id/<?php echo $v['id'];?>/value/1">放入回收站</a>
					</td>
				</tr>
			<?php }?><?php endif;?>
			</tbody>
		</table>
		</form>
		<div class='pageStyle1'>
			<?php echo $page;?>
		</div>
	</div>
</div>
</body>
</html>