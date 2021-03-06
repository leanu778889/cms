<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>安装HDCMS教学项目</title>
<script type='text/javascript' src='http://localhost/11.11/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href="http://localhost/11.11/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/11.11/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
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
		height:50px;
		line-height:50px;
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
		<form id="installForm" action="<?php echo U('Index/installDb');?>" method="post" style="margin:0px;">
		<div class="modal-body">
			 <h2>配置数据库信息</h2>
			<table>
                <tr>
                    <td style="width:120px;">数据库连接主机</td>
                    <td style="width:320px;"><input type="text" name="db[DB_HOST]" value="<?php echo $setup['db']['dbhost'];?>"/></td>
                    <td>通常为localhost</td>
                </tr>
                <tr>
                    <td style="width:120px;">数据库用户名</td>
                    <td style="width:320px;"><input type="text" name="db[DB_USER]" value="<?php echo $setup['db']['dbuser'];?>"/></td>
                    <td>数据库的用户名</td>
                </tr>
                <tr>
                    <td style="width:120px;">数据库密码</td>
                    <td style="width:320px;"><input type="text" name="db[DB_PASSWORD]"/></td>
                    <td>连接数据库的密码</td>
                </tr>
                <tr>
                    <td style="width:120px;">数据库名称</td>
                    <td style="width:320px;"><input type="text" name="db[DB_DATABASE]" value="<?php echo $setup['db']['dbname'];?>"/></td>
                    <td>操作的数据库</td>
                </tr>
                <tr>
                    <td style="width:120px;">端口</td>
                    <td style="width:320px;"><input type="text" name="db[DB_PORT]" value="3306"/></td>
                    <td>通常为3306</td>
                </tr>
                <tr>
                    <td style="width:120px;">数据库表前缀</td>
                    <td style="width:320px;"><input type="text" name="db[DB_PREFIX]" value="<?php echo $setup['db']['dbfix'];?>"/></td>
                    <td>数据表的前缀名</td>
                </tr>
                <tr>
                    <td style="width:120px;">数据库驱动</td>
                    <td style="width:320px;">
                        <input type="radio" name="db[DB_DRIVER]" style="width:20px;" checked="checked"value="mysqli"/>
                        <strong>mysqli</strong></td>
                    <td></td>
                </tr>
            </table>
			<h2>管理员信息</h2>
            <table style="width:90%">
                <tr>
                    <td style="width:120px;">管理员名称</td>
                    <td style="width:180px;">
                        <input type="text" name="admin[username]" value="admin"/>
                    </td>
                    <td>后台管理员用户名</td>
                </tr>
                <tr>
                    <td style="width:120px;">管理员密码</td>
                    <td style="width:180px;">
                        <input type="password" name="admin[password]" value="<?php echo $setup['admin']['password'];?>"/>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width:120px;">重复密码</td>
                    <td style="width:180px;">
                        <input type="password" name="admin[password2]"/>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="width:120px;">管理员邮箱</td>
                    <td style="width:180px;">
                        <input type="text" name="admin[email]" value="admin@admin.com" value="<?php echo $setup['admin']['email'];?>"/>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
		</div>
		<div class="modal-footer">
			<div class='info'>
				
			</div>
			<div id="next" class='next'>
				<button type="submit" class="btn btn-primary ">提交</button>
			</div>
		</div>
		</form>
	</div>
</body>
<script type="text/javascript">

</script>

</html>