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
		<strong>添加文章</strong>
	</div>
		<form action="<?php echo U('News/add');?>" method="post">
			<table class="table table-bordered">
				<tr>
					<th width='20%'></th>
					<th></th>
				</tr>
				<tr>
					<td>文章标题</td>
					<td><input type="text" name='title'></td>
				</tr>
				<tr>
					<td>摘要</td>
					<td><textarea name='digest'></textarea></td>
				</tr>
				<tr>
					<td>所属分类</td>
					<td>
						<select name='cid'>
							<?php if(is_array($category)):?><?php  foreach($category as $v){ ?>
								<option value='<?php echo $v['cid'];?>'>&nbsp;|-<?php echo $v['html'];?><?php echo $v['cname'];?></option>
							<?php }?><?php endif;?>
						</select>
					</td>
				</tr>
				<tr>
					<td>文章属性</td>
					<td>
						<label>
							热门:
							<input name="attr[]" type="checkbox" value="热门">
						</label>
						<label>
							推荐:
							<input  name="attr[]" type="checkbox" value="推荐">
						</label>
						<label>
							置顶:
							<input  name="attr[]" type="checkbox" value="置顶">
						</label>
						<label>
							图文:
							<input  name="attr[]" type="checkbox" value="图文">
						</label>
					</td>
				</tr>
				<tr>
					<td>标签</td>
					<td>
							<?php if(is_array($tag)):?><?php  foreach($tag as $v){ ?>
								<?php echo $v['tagname'];?>
								<input name='tag[]' type="checkbox" value='<?php echo $v['tid'];?>'>
							<?php }?><?php endif;?>
					</td>
				</tr>

				<tr>
					<td>缩略图</td>
					<td>
						<input type='hidden' name='image' value=''/>
						<link rel="stylesheet" type="text/css" href="http://localhost/11.11/hdphp/Extend/Org/Uploadify/uploadify.css" />
            <script type="text/javascript" src="http://localhost/11.11/hdphp/Extend/Org/Uploadify/jquery.uploadify.min.js"></script>
            <script type="text/javascript">
            var HDPHP_CONTROL         = "http://localhost/11.11/admin.php/News";
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
        hd_uploadify_options.formData       ={image : "0", someOtherKey:1,hdsid:"o5hs6hnkgtb13a3kka4dc96cn2",upload_dir:"",hdphp_upload_thumb:""};
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
					<td>关键字</td>
					<td><textarea name='keywords'></textarea></td>
				</tr>
				<tr>
					<td>描述</td>
					<td><textarea name='description'></textarea></td>
				</tr>
				<tr>
					<td>内容</td>
					<td><script type="text/javascript" charset="utf-8" src="http://localhost/11.11/hdphp/Extend/Org/Editor/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://localhost/11.11/hdphp/Extend/Org/Editor/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://localhost/11.11/hdphp/Extend/Org/Editor/Ueditor/"</script><script id="hd_body" name="body" type="text/plain"></script>
    <script type='text/javascript'>
        var ue = UE.getEditor('hd_body',{
        imageUrl:'http://localhost/11.11/admin.php/News&m=ueditor_upload&water=0&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
        ,zIndex : 0
        ,autoClearinitialContent:false
        ,initialFrameWidth:"80%" //宽度1000
        ,initialFrameHeight:"300" //宽度1000
        ,autoHeightEnabled:false //是否自动长高,默认true
        ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
        ,maximumWords:2000 //允许的最大字符数
        ,initialContent:'' //初始化编辑器的内容 也可以通过textarea/script给值
        ,readonly : false //编辑器初始化结束后,编辑区域是否是只读的，默认是false
        ,wordCount:true //是否开启字数统计
        
    });
    </script></td>
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