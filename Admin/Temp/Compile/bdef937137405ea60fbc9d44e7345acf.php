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
		<strong>导航列表</strong>
	</div>
	<div class='content'>
		<table id="table" class='table table-bordered'>
			<thead>
				<tr>
					<th width="8%">导航id</th>
					<th width="12%">名称</th>
					<th width="30%">url</th>
					<th width="12%">是否新窗口</th>
					<th width="10%">是否显示</th>
					<th width="5%">排序</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan=7>顶部导航</td>
				</tr>
				<?php if(is_array($nav[1])):?><?php  foreach($nav[1] as $v){ ?>
				<tr>
					<td><?php echo $v['nid'];?></td>
					<td><?php echo $v['name'];?></td>
					<td><?php echo $v['url'];?></td>
					<td>
					<?php if($v['opennew']){?>
					是
					<?php  }else{ ?>
					否
					<?php }?>
					</td>
					<td>
					<?php if($v['isshow']){?>
					是
					<?php  }else{ ?>
					否
					<?php }?>
					</td>
					<td><?php echo $v['sort'];?></td>
					<td>
						<a class="btn"  href="<?php echo U('Nav/edit');?>/nid/<?php echo $v['nid'];?>">编辑</a>
						<a class="btn delAffirm"  href="<?php echo U('Nav/del');?>/nid/<?php echo $v['nid'];?>">删除</a>
					</td>
				</tr>
				<?php }?><?php endif;?>
				<tr>
					<td colspan=7>中间导航</td>
				</tr>
				<?php if(is_array($nav[2])):?><?php  foreach($nav[2] as $v){ ?>
				<tr>
					<td><?php echo $v['nid'];?></td>
					<td><?php echo $v['name'];?></td>
					<td><?php echo $v['url'];?></td>
					<td>
					<?php if($v['opennew']){?>
					是
					<?php  }else{ ?>
					否
					<?php }?>
					</td>
					<td>
					<?php if($v['isshow']){?>
					是
					<?php  }else{ ?>
					否
					<?php }?>
					</td>
					<td><?php echo $v['sort'];?></td>
					<td>
						<a class="btn"  href="<?php echo U('Nav/edit');?>/nid/<?php echo $v['nid'];?>">编辑</a>
						<a class="btn delAffirm"  href="<?php echo U('Nav/del');?>/nid/<?php echo $v['nid'];?>">删除</a>
					</td>
				</tr>
				<?php }?><?php endif;?>
				<tr>
					<td colspan=7>底部导航</td>
				</tr>
				<?php if(is_array($nav[3])):?><?php  foreach($nav[3] as $v){ ?>
				<tr>
					<td><?php echo $v['nid'];?></td>
					<td><?php echo $v['name'];?></td>
					<td><?php echo $v['url'];?></td>
					<td>
					<?php if($v['opennew']){?>
					是
					<?php  }else{ ?>
					否
					<?php }?>
					</td>
					<td>
					<?php if($v['isshow']){?>
					是
					<?php  }else{ ?>
					否
					<?php }?>
					</td>
					<td><?php echo $v['sort'];?></td>
					<td>
						<a class="btn" href="<?php echo U('Nav/edit');?>/nid/<?php echo $v['nid'];?>">编辑</a>
						<a class="btn delAffirm" href="<?php echo U('Nav/del');?>/nid/<?php echo $v['nid'];?>">删除</a>
					</td>
				</tr>
				<?php }?><?php endif;?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>