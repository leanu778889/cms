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
<link href="http://localhost/11.11/hdphp/Extend/Org/HdUi/css/hdui.css" rel="stylesheet" media="screen"><script src="http://localhost/11.11/hdphp/Extend/Org/HdUi/js/hdui.js"></script>
<body>
<div id="window">
	<div class='page_title'>
		<strong>添加友情链接</strong>
	</div>
		<form action="http://localhost/11.11/admin.php/Flink/add"  method="post">
			<table class="table table-bordered">

				<tr>
					<td>友情链接名</td>
					<td><input type="text" name='fname'></td>
				</tr>
				<tr>
					<td>链接地址</td>
					<td><input type='text' name='url'/></td>
				</tr>
				<tr>
					<td>描述</td>
					<td><textarea name='msg'></textarea></td>
				</tr>
				<tr>
					<td>LOGO</td>
					<td><link rel="stylesheet" type="text/css" href="http://localhost/11.11/hdphp/Extend/Org/Uploadify/uploadify.css" />
            <script type="text/javascript" src="http://localhost/11.11/hdphp/Extend/Org/Uploadify/jquery.uploadify.min.js"></script>
            <script type="text/javascript">
            var HDPHP_CONTROL         = "http://localhost/11.11/admin.php/Flink";
            var UPLOADIFY_URL    = "http://localhost/11.11/hdphp/Extend/Org/Uploadify/";
            var HDPHP_UPLOAD_THUMB    ="";
HDPHP_UPLOAD_TOTAL = 0</script>
            <script type="text/javascript" src="http://localhost/11.11/hdphp/Extend/Org/Uploadify/hd_uploadify.js"></script>
<script type="text/javascript">
    $(function() {
        hd_uploadify_options.removeTimeout  =0;
        hd_uploadify_options.fileSizeLimit  ="2MB";
        hd_uploadify_options.fileTypeExts   ="*.gif;*.jpg;*.png;*.jpeg";
        hd_uploadify_options.queueID        ="hd_uploadify_file_queue";
        hd_uploadify_options.showalt        =true;
        hd_uploadify_options.uploadLimit    =6;
        hd_uploadify_options.success_msg    ="正在上传...";//上传成功提示文字
        hd_uploadify_options.formData       ={image : "0", someOtherKey:1,hdsid:"udunojock5vjn2ahggv8hnnp97",upload_dir:"",hdphp_upload_thumb:""};
        hd_uploadify_options.thumb_width          =200;
        hd_uploadify_options.thumb_height          =150;
        hd_uploadify_options.uploadsSuccessNums = 0;

        $("#hd_uploadify_file").uploadify(hd_uploadify_options);
        });
</script>
<input type="file" name="up" id="hd_uploadify_file"/>
<div tool="hd_uploadify_file_msg uploadify_upload_msg">
</div>
<div id="hd_uploadify_file_queue"></div>
<div class="hd_uploadify_file_files uploadify_upload_files" input_file_id ="hd_uploadify_file">
    <ul></ul>
    <div style="clear:both;"></div>
</div></td>
				</tr>

				<tr>
					<td>排序</td>
					<td><input type="text" name='sort'></td>
				</tr>
				<tr>
					<td>是否显示</td>
					<td>
						<label>是
						<input type="radio" name='isshow' checked='true' value=1>
						</label>
						<label>否
						<input type="radio" name='isshow' value=0>
						</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn" value="提交"></td>
				</tr>
			</table>
		</form>
</div>
</body>
</html>