$(function(){
	var __JSAPP__ = $('#loginBox').attr('app');
	var url = $('#loginBox').attr('url');
	//异步抓取用户是否登录
	$.ajax({
		url:url,
		dataType:'json',
		beforeSend:function(){
			$('#loading').show();
		},
		success:function(result)
		{
			if(result.status === true){
				$('#user').html('欢迎你'+result['nickname']+',<a href="'+__JSAPP__+'/User/quit">退出</a>');
				$('#comment').find('.isLogin').css('display','block');
				$('#commentForm').find('.uid').attr('value',result['uid']);
				$('#commentForm').find('.nickname').attr('value',result['nickname']);
			}else{
				$('#user').html('<a href="javascript:showLoginBox()">登录</a><a href="javascript:showRegBox();">注册</a>');
				$('#comment').find('.notLogin').css('display','block');
			}
		},
		complete:function(){
			$('#loading').hide();
		}
	})
	//验证正则
	var regs = {
		'username':/^[a-z]\w{1,29}$/i,
		//244231456@qq.com
		'email':/^\w[\w\.]+@\w+[\.a-z]+[a-z]$/i,
		'nickname':/^.{1,20}$/,
		'code':/^[a-z0-9]{4}$/i
	};
	//注册校验
	var aMust = [];
	$('.must').each(function(){
		this.status = false;
		aMust.push(this);
	});
	//登录校验
	var cMust = [];
	$('.lmust').each(function(){
		this.status = false;
		cMust.push(this);
	})
	for(var i=0;i<aMust.length;i++){
		aMust[i].onblur = function(){
			var name = this.name;
			var value = this.value;
			var preg = regs[name];
			if(preg.test(value)){
				var url = $('#regForm').attr('checkUrl');
				var self = this;
				$.ajax({
					url:url,
					type:"POST",
					data:name+'='+value,
					dataType:'json',
					success:function(result){
						if(result.status ===true){
							self.style.borderColor = '#999';
							self.status = true;
							$('#regBox').find('.error').hide().html('')
						}else{
							self.style.borderColor = 'red';
							self.status =false;
							$('#regBox').find('.error').show().html(result.msg);
						}
					}
				});
			}
		}
	}
	for(var i=0;i<cMust.length;i++){
		cMust[i].onblur = function(){
			var name = this.name;
			var value = this.value;
			var preg = regs[name];
			if(preg.test(value)){
				var url = $('#loginForm').attr('checkUrl');
				var self = this;
				$.ajax({
					url:url,
					type:"POST",
					data:name+'='+value,
					dataType:'json',
					success:function(result){
						if(result.status ===true){
							self.style.borderColor = '#999';
							self.status = true;
							$('#loginBox').find('.error').hide().html('')
						}else{
							self.style.borderColor = 'red';
							self.status =false;
							$('#loginBox').find('.error').show().html(result.msg);
						}
					}
				});
			}
		}
	}







	//登录表单提交
	$('#loginForm').submit(function(){
		var data = $(this).serialize();
		var url = $(this).attr('action');
		for(var i=0;i<cMust.length;i++){
			if(cMust[i].status ==false){
				return false;
			}
		}
		$.ajax({
			url:url,
			type:'post',
			data:data,
			dataType:'json',
			success:function(result)
			{
				if(result.status === true)
				{
					hideLoginBox();
					$('#user').html('欢迎你'+result['nickname']+',<a href="'+__JSAPP__+'/User/quit">退出</a>');
					$('#comment').find('.notLogin').css('display','none');
					$('#comment').find('.isLogin').css('display','block');
					$('#commentForm').find('.uid').attr('value',result['uid']);
					$('#commentForm').find('.nickname').attr('value',result['nickname']);
				}else{
					$('#loginBox').find('.error').html('用户名或密码错误!').show();
				}
			}
		})
		return false;
	})
	//注册表单提交
	$('#regForm').submit(function(){
		var data = $(this).serialize();
		var url = $(this).attr('action');
		if($('.pass1').val() != $('.pass2').val()){
			return false;
		}
		for(var i=0;i<aMust.length;i++){
			if(aMust[i].status ==false){
				return false;
			}
		}
		$.ajax({
			url:url,
			type:'post',
			data:data,
			dataType:'json',
			success:function(result)
			{
				if(result.status === true)
				{
					alert('注册成功!')
					hideRegBox();
					$('#user').html('欢迎你'+result['nickname']+',<a href="'+__JSAPP__+'/User/quit">退出</a>');
					$('#comment').find('.notLogin').css('display','none');
					$('#comment').find('.isLogin').css('display','block');
					$('#commentForm').find('.uid').attr('value',result['uid']);
					$('#commentForm').find('.nickname').attr('value',result['nickname']);
				}else{
					$('#regBox').find('.error').html('注册失败!').show();
				}
			}
		})
		return false;
	})
	var commentUrl = $('#comment').attr('url');
	$.ajax({
		url:commentUrl,
		dataType:'json',
		beforeSend:function(){
			$('.commentLoading').show();
		},
		success:function(result){
			if(result.status === true){
				for(var i=0;i<result.data.length;i++){
					var nodeStr = '<dl>\
						<dt>\
							<span>'+result.data[i].nickname+'</span> <span>发布于：<em>'+result.data[i].addtime+'</em></span>\
						</dt>\
						<dd>'+result.data[i].content+'</dd></dl>';

					$('#comment').find('.showComment').append(nodeStr);
				}
			}else{

			}
		},
		complete:function(){
			$('.commentLoading').hide();
		}
	});
	//评论提交
	$('#commentForm').submit(function(){
		var data = $(this).serialize();
		var url = $(this).attr('action');
		$.ajax({
			url:url,
			data:data,
			type:'post',
			dataType:'json',
			beforeSend:function(){
				$('.commentLoading').show();
			},
			success:function(result){
				if(result.status ===true){
					var nodeStr = '<dl>\
						<dt>\
							<span>'+result.nickname+'</span> <span>发布于：<em>'+result.addtime+'</em></span>\
						</dt>\
						<dd>'+result.content+'</dd></dl>';
					$('#comment').find('.showComment').prepend(nodeStr);
					$('#comment').find('.content').val('');
				}else{

				}
			},
			complete:function(){
				$('.commentLoading').hide();
			}
		})
		return false;
	})
	//刷新发送AJAX 更新点击数
	var urlClick = $('#click').attr('url');
	$.ajax({
		url:urlClick,
		dataType:'json',
		success:function(result){
			if(result.status ===true){
				$('#click').html(result.click);
			}else{

			}
		}
	})
})
	//显示登录框
function showLoginBox()
	{
		hideRegBox();
		showCover();
		$('#loginBox').css({opacity:1}).show();
	}
	//隐藏登录框
	function hideLoginBox()
	{
		$('#loginBox').animate({
			opacity:0
		},600,'',function(){$(this).hide();})
		hideCover()
	}
	//显示注册框
	function showRegBox()
	{
		hideLoginBox();
		showCover();
		$('#regBox').css({opacity:1}).show();
	}
	//隐藏注册框
	function hideRegBox()
	{
		$('#regBox').animate({
			opacity:0
		},600,'',function(){$(this).hide();})
		hideCover()
	}
	//显示遮挡层
	function showCover()
	{
		$('#cover').css({
			height:$(document).height(),
			width:$(document).width()
		}).show();

		window.onresize=function(){
			showCover()
		}
	}
	//隐藏遮挡层
	function hideCover()
	{
		$('#cover').hide();
		window.onresize=null;
	}