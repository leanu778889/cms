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
		<strong>编辑导航</strong>
	</div>
	<div class='content'>
	<form id="form" action="<?php echo U('Nav/edit');?>/nid/<?php echo $nav['nid'];?>" method="post">
		<table class='table'>
			<thead>
				<tr>
					<th width="10%">标题</th>
					<th width="50%">内容</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>导航名称</td>
					<td><input type="text" name="name" value="<?php echo $nav['name'];?>"></td>
				</tr>
				<tr>
					<td>导航URL</td>
					<td>
						<input type="text" name="url" value="<?php echo $nav['url'];?>">
						<span>说明：{http://localhost/11.11}根地址,也可以根据{U('Index/index')}函数生成地址</span>
					</td>
				</tr>
				<tr>
					<td>是否新窗口</td>
					<td>
						<?php if($nav['opennew']){?>
						<label style="float:left;margin-right:10px;">
							是:
							<input type="radio" name="opennew" value=1 checked="checked">
						</label>
						<lable style="float:left;">
							否:
							<input type="radio" name="opennew" value=0>
						</lable>
						<?php  }else{ ?>
						<label style="float:left;margin-right:10px;">
							是:
							<input type="radio" name="opennew" value=1 >
						</label>
						<lable style="float:left;">
							否:
							<input type="radio" name="opennew" value=0 checked="checked">
						</lable>
						<?php }?>
					</td>
				</tr>
				<tr>
					<td>是否显示</td>
					<td>
						<?php if($nav['isshow']){?>
						<label style="float:left;margin-right:10px;">
							是:
							<input type="radio" name="isshow" value=1 checked="checked">
						</label>
						<lable style="float:left;">
							否:
							<input type="radio" name="isshow" value=0>
						</lable>
						<?php  }else{ ?>
						<label style="float:left;margin-right:10px;">
							是:
							<input type="radio" name="isshow" value=1 >
						</label>
						<lable style="float:left;">
							否:
							<input type="radio" name="isshow" value=0 checked="checked">
						</lable>
						<?php }?>
					</td>
				</tr>
				<tr>
					<td>排序</td>
					<td><input type="text" style="width:60px;" name="sort" value="<?php echo $nav['sort'];?>"></td>
				</tr>
				<tr>
					<td>显示位置</td>
					<td>
						<select name='site'>
							<?php if($nav['site'] == 1){?>
								<option selected="selected" value=1>头部导航</option>
								<option value=2>中间导航</option>
								<option value=3>底部导航</option>
							<?php }?>
							<?php if($nav['site'] == 2){?>
								<option  value=1>头部导航</option>
								<option selected="selected" value=2>中间导航</option>
								<option value=3>底部导航</option>
							<?php }?>
							<?php if($nav['site'] == 3){?>
								<option  value=1>头部导航</option>
								<option value=2>中间导航</option>
								<option selected="selected" value=3>底部导航</option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input class='btn' type="submit" value="修改导航" /></td>
				</tr>
			</tbody>
		</table>
	</form>
	</div>
</div>
</body>
</html>