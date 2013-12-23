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
	.window .modal-body h2.error{
		color:#ff8080;
	}
</style>
<script type="text/javascript">
function beginInstall(begin)
{
	var url  = '<?php echo U("Index/installTable");?>';
	$.ajax({
		url:url,
		type:'GET',
		data:'begin='+begin,
		dataType:'json',
		success:function(result){
			$('#schedule').append('<li>'+result.msg+'</li>');
			if(result.status === true){
				var begin = result.begin;
				var total = result.total;
				var bar= Math.floor(begin/total*100);
				if(begin == total){
					window.location.href="<?php echo U('Index/initWeb');?>"
				}
				$('#scheduleBar')[0].style.width=bar+'%';
				beginInstall(begin);
			}else{

			}
		}
	})



}





</script>
</head>
<body>

	<div class="window">
		<div class="modal-header">
			<h3 id="myModalLabel">安装HDCMS教学项目</h3>
		</div>
		<div class="modal-body">
			<?php if($begin){?>
			<h2 class='success'>写入配置项成功,开始安装数据表!</h2>
			<script type="text/javascript">
				beginInstall(0);
			</script>
			<?php  }else{ ?>
			<h2 class='error'>写入配置项失败,请检查错误!</h2>
			<?php }?>
			<ul id="schedule" style="list-style:decimal;">


			</ul>
		</div>
		<div class="modal-footer" style="padding:10px 10px 0px 10px;">
			<div class="progress progress-striped">
    			<div class="bar" id="scheduleBar" style="width:0%;"></div>
   		 	</div>
		</div>
	</div>
</body>
<script type="text/javascript">

</script>

</html>