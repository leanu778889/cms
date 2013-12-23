<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>安装HDCMS教学项目</title>
<script type='text/javascript' src='http://localhost/11.11/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/11.11/hdphp/Extend/Org/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"><script src="http://localhost/11.11/hdphp/Extend/Org/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lte IE 6]>
  <link rel="stylesheet" type="text/css" href="http://localhost/11.11/hdphp/Extend/Org/bootstrap/ie6/css/bootstrap-ie6.css">
  <![endif]-->
  <!--[if lte IE 7]>
  <link rel="stylesheet" type="text/css" href="http://localhost/11.11/hdphp/Extend/Org/bootstrap/ie6/css/ie.css">
  <![endif]-->
<style type="text/css">
	*{margin:0px;padding:0px;}
	body{background:#f6f6f6;}
	.window{
		background:#FFF;
		width:600px;
		height:auto;
		border:1px solid #ddd;
		box-shadow:0px 0px 5px #ddd;
		border-radius:5px;
		margin:60px auto;
	}
	.window .next{
		width:30%;
		float:right;
	}
	.window  .info{
		float:left;
		width:60%;
		text-align:left;
	}
	.window  .info span{
		float:left;
		padding:0px 5px;
	}
	.window .modal-body{
		height:300px;
	}
	.window .modal-body table tr{
		height:30px;
		line-height:30px;
		width:100%;
	}
	.window .modal-body table tr th{
		text-align:left;
	}
	.window .modal-body h2{
		font-size:18px;
		color:#6cbfd7;
		border-bottom:1px solid #dedede;
	}
</style>
</head>
<body>

	<div class="window">
		<div class="modal-header">
			<h3 id="myModalLabel">安装HDCMS教学项目</h3>
		</div>
		<div class="modal-body">
			 <h2>环境检测</h2>
			<table  border=0>
				<tr>
					<th width="20%">名称</th>
                    <th width="30%">HDCMS要求配置</th>
                    <th width="30%">最佳配置</th>
                    <th width="20%">当前环境</th>
				</tr>
				<tr>
                    <td>操作系统</td>
                    <td>任意</td>
                    <td>类linux</td>
                    <td><?php echo $setup['system']['phpos'];?></td>
                </tr>
                <tr>
                    <td>PHP版本</td>
                    <td>5.2.6</td>
                    <td>5.3</td>
                    <td><?php echo $setup['system']['phpversion'];?></td>
                </tr>
                <tr>
                    <td>附件上传大小</td>
                    <td>不限制</td>
                    <td>5M</td>
                    <td><?php echo $setup['system']['uploadsize'];?></td>
                </tr>
                <tr>
                    <td>GD库</td>
                    <td>1.0</td>
                    <td>2.0</td>
                    <td><?php echo $setup['system']['gdversion'];?></td>
                </tr>
                <tr>
                    <td>磁盘空间</td>
                    <td>8MB</td>
                    <td>不限制</td>
                    <td><?php echo $setup['system']['diskspace'];?></td>
                </tr>
			</table>
			<!--目录检测-->
            <h2>目录检测</h2>
            <table width="100%">
                <tr>
                    <th width="50%">目录文件名称</th>
                    <th width="25%">所需状态</th>
                    <th width="25%">当前状态</th>
                </tr>
                <?php if(is_array($setup['dirs'])):?><?php  foreach($setup['dirs'] as $k=>$v){ ?>
                    <tr>
                        <td><?php echo $v;?></td>
                        <td>可写</td>
                        <td><?php echo is_writeable($v)?"<img src='http://localhost/11.11/install/Tpl/Public/images/action_check.png'/>&nbsp;可写":"<img src='http://localhost/11.11/install/Tpl/Public/images/action_delete.png'/>不可写"?></td>
                    </tr>
                <?php }?><?php endif;?>
            </table>
			<!--函数检测-->
            <h2>函数检测</h2>
            <table width="100%">
                <tr>
                    <th width="50%">函数名称</th>
                    <th width="25%">检测结果</th>
                    <th width="25%">系统建议</th>
                </tr>
                <?php if(is_array($setup['functions'])):?><?php  foreach($setup['functions'] as $k=>$v){ ?>
                    <tr>
                        <td><?php echo $v;?></td>
                        <td><?php echo function_exists($v)?"<img src='http://localhost/11.11/install/Tpl/Public/images/action_check.png'/>&nbsp;支持":"<img src='http://localhost/11.11/install/Tpl/Public/images/action_delete.png'/>不支持"?></td>
                        <td>无</td>
                    </tr>
                <?php }?><?php endif;?>
            </table>
			
		</div>
		<div class="modal-footer">
			<div class='info'>
				
			</div>
			<div id="next" class='next'>
				<a class="btn btn-primary" href="<?php echo U('Index/setConfig');?>">下一步</a>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$('#agree').click(function(){
		if($(this).attr('checked')){
			$('#next').find('.btn').removeClass('disabled');
		}else{
			$('#next').find('.btn').addClass('disabled');
		}
	})
	$('#installForm').submit(function(){
		if(!$('#agree').attr('checked')){
			return false;
		}
	})
</script>

</html>