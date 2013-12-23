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
	.window .modal-body h1{
		font-size:18px;
	}
</style>
</head>
<body>

	<div class="window">
		<div class="modal-header">
			<h3 id="myModalLabel">安装HDCMS教学项目</h3>
			<p><?php echo $setup['version'];?></p>
		</div>
		<div class="modal-body">
			<h1><?php echo $setup['hdcms'];?></h1>
			<?php echo $setup['license'];?>
		</div>
		<form id="installForm" action="<?php echo U('Index/verify');?>" method="get" style="margin:0px;">
		<div class="modal-footer">
			<div class='info'>
				<span><input id="agree" name="agree" type="checkbox" value="1"/></span>
				<span>同意服务条款</span>
			</div>
			<div id="next" class='next'>
				<button type="submit" class="btn btn-primary disabled">下一步</button>
			</div>
		</div>
		</form>
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