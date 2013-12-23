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
		<form action="<?php echo U('News/edit');?>/id/<?php echo $news['id'];?>" method="post">
			<table class="table table-bordered">
				<tr>
					<th width='20%'></th>
					<th></th>
				</tr>
				<tr>
					<td>文章标题</td>
					<td><input type="text" name='title' value="<?php echo $news['title'];?>"></td>
				</tr>
				<tr>
					<td>摘要</td>
					<td><textarea name='digest'><?php echo $news['digest'];?></textarea></td>
				</tr>
				<tr>
					<td>所属分类</td>
					<td>
						<select name='cid'>
							<?php if(is_array($category)):?><?php  foreach($category as $v){ ?>
								<?php if($news['category_cid'] == $v['cid']){?>
									<option selected="true" value='<?php echo $v['cid'];?>'>&nbsp;|-<?php echo $v['html'];?><?php echo $v['cname'];?></option>
								<?php  }else{ ?>
									<option value='<?php echo $v['cid'];?>'>&nbsp;|-<?php echo $v['html'];?><?php echo $v['cname'];?></option>
								<?php }?>

							<?php }?><?php endif;?>
						</select>
					</td>
				</tr>
				<tr>
					<td>文章属性</td>
					<td>
						<label>
							热门:
							<input <?php if(in_array('热门',$news['attr'])){?>checked="true"<?php }?> name="attr[]" type="checkbox" value="热门">
						</label>
						<label>
							推荐:
							<input <?php if(in_array('推荐',$news['attr'])){?>checked="true"<?php }?>  name="attr[]" type="checkbox" value="推荐">
						</label>
						<label>
							置顶:
							<input <?php if(in_array('置顶',$news['attr'])){?>checked="true"<?php }?>  name="attr[]" type="checkbox" value="置顶">
						</label>
						<label>
							图文:
							<input <?php if(in_array('图文',$news['attr'])){?>checked="true"<?php }?>  name="attr[]" type="checkbox" value="图文">
						</label>
					</td>
				</tr>
				<tr>
					<td>标签</td>
					<td>
							<?php if(is_array($tag)):?><?php  foreach($tag as $v){ ?>
								<?php if(in_array($v['tid'],$news['tags'])){?>
									<?php echo $v['tagname'];?>
									<input name='tag[]' checked="true" type="checkbox" value='<?php echo $v['tid'];?>'>
								<?php  }else{ ?>
									<?php echo $v['tagname'];?>
									<input name='tag[]' type="checkbox" value='<?php echo $v['tid'];?>'>
								<?php }?>

							<?php }?><?php endif;?>
					</td>
				</tr>

				<tr>
					<td>缩略图</td>
					<td>
						<input type='hidden' name='image' value='<?php echo $news['thumb'];?>'/>
						<img src="http://localhost/11.11/<?php echo $news['thumb'];?>" />
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
					<td><textarea name='keywords'><?php echo $news['keywords'];?></textarea></td>
				</tr>
				<tr>
					<td>描述</td>
					<td><textarea name='description'><?php echo $news['description'];?></textarea></td>
				</tr>
				<tr>
					<td>内容</td>
					<td><script charset="utf-8" src="http://localhost/11.11/hdphp/Extend/Org/Editor/Keditor/kindeditor-all-min.js"></script>
            <script charset="utf-8" src="http://localhost/11.11/hdphp/Extend/Org/Editor/Keditor/lang/zh_CN.js"></script>
        <textarea id="hd_body" name="body"><?php echo $news['body'];?></textarea>
    <script>
        var options_body = {
        filterMode : false
                ,id : "editor_id"
        ,width : "80%"
        ,height:"300px"
                ,formatUploadUrl:false
        ,allowFileManager:false
        ,allowImageUpload:true
        ,uploadJson : "http://localhost/11.11/admin.php/News&m=keditor_upload&editor_type=2&Image=0&uploadsize=2000000&maximagewidth=false&maximageheight=false&hdsid=o5hs6hnkgtb13a3kka4dc96cn2"//处理上传脚本
        };var hd_body;
        KindEditor.ready(function(K) {
                    hd_body = KindEditor.create("#hd_body",options_body);
        });
        </script>
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