<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<style>
body{background:#e3e4e5;}
#loginBox{
	padding-top:10px;
	width:506px;
	height:280px;
	position:absolute;
	left:50%;
	top:50%;
	margin-left:-248px;
	margin-top:-130px;
	background:#FFF;
	overflow:hidden;
	border-radius:5px;
	box-shadow:0px 0px 5px #999;
}
#loginBox h1{
	font-size:25px;
	text-align:center;
	color:#333;
	font-family:'楷体';
	text-shadow:0px 2px 3px #ddd;
	padding-bottom:10px;
}
#loginBox .control-group label{
	text-shadow:0px 0px 1px #999;
}
</style>
</head>
<body>
<div id="loginBox">
	<h1>后盾网cms后台管理中心</h1>
	<form class="form-horizontal" id="loginForm" action="<?php echo U('http://localhost/cms/admin.php/Login/login');?>" method="post">
    	<div class="control-group">
    		<label class="control-label" for="inputEmail">用户名</label>
    		<div class="controls">
    			<input type="text" name="username" id="inputUsername" placeholder="请输入用户名..">
    		</div>
    	</div>
   		<div class="control-group">
    		<label class="control-label" for="inputPassword">密码</label>
    		<div class="controls">
    			<input type="password"  name="password" id="inputPassword" placeholder="请输入密码..">
    		</div>
   		</div>
		<div class="control-group">
    		<label class="control-label" for="inputCode">验证码</label>
    		<div class="controls">
    			<input type="text" style="width:120px;" url="<?php echo U('http://localhost/cms/admin.php/Login/checkCode');?>" id="inputCode" placeholder="请输入验证码..">
    			<img  id="codeImg" width="80" height="30"  onclick="change.call(this);" src="<?php echo U('http://localhost/cms/admin.php/Login/showCode');?>"/>
			</div>
   		</div>
    	<div class="control-group" style="background:#f0f0f0;padding-bottom:20px;">
    		<br/>
    		<div class="controls">
    			<button type="submit" class="btn">登陆</button>
    		</div>
    	</div>
    </form>
</div>
<script>

	$('#loginForm').submit(function(){
		if($('#inputUsername').val() == ''){
			alert('请输入用户名!');
			return false;
		}
		if( $('#inputPassword').val() ==''){
			alert('请输入密码!');
			return false;
		}

		var code = $('#inputCode').val();
		var url = $('#inputCode').attr('url');
		$.ajax({
			url:url,
			type:'POST',
			data:'code='+code,
			dataType:'json',
			success:function(data){
				if(data.status === true){
					$('#loginForm')[0].submit();
				}else{
					alert('验证码输入错误!');
				}
			}
		})
		return false;
	})




	/**
	 * 切换验证码
	 */
	var codeSrc = $('#codeImg').attr('src');
	function change(){
		$(this).attr('src',codeSrc+'/mt/'+Math.random());
	}
</script>
</body>
</html>