<?php
class UserControl extends Control{
	public function login(){
		if(IS_AJAX === false) _404();
		$result =array();
		$result['status'] = false;
		$username = Q('post.username','addslashes');
		$password = Q('post.password','md5');
		$db = M('user');
		$userinfo = $db->where(array('username'=>$username))->find();
		if($userinfo['password'] === $password){
			$result['uid'] = $_SESSION[C('RBAC_AUTH_KEY')];
			$result['status'] = true;
			$result['nickname'] =  $userinfo['nickname'];
			$_SESSION['uid'] = $userinfo['uid'];
			$_SESSION['nickname'] = $userinfo['nickname'];
		}
		exit(json_encode($result));
	}
	//注册
	public function reg(){
		if(IS_AJAX === false) _404();
		$result =array();
		$result['status'] = false;
		$data = array();
		$data['username'] = Q('post.username','addslashes');
		$data['password'] = Q('post.password','md5');
		$data['email'] = Q('post.email','addslashes.strip_tags');
		$data['nickname'] = Q('post.nickname','addslashes,strip_tags');
		$userPreg = '/^[a-z]\w{1,29}$/i';
		if(!preg_match($userPreg, $data['username']))exit(json_encode($result));
		$emailPreg = '/^\w[\w\.]+@\w+[\.a-z]+[a-z]$/i';
		if(!preg_match($emailPreg, $data['email']))exit(json_encode($result));
		$nickPreg = '/^.{1,20}$/';
		if(!preg_match($nickPreg, $data['nickname']))exit(json_encode($result));
		$db = M('user');
		$uid = $db->add($data);
		if($uid){
			$result['uid'] = $_SESSION[C('RBAC_AUTH_KEY')];
			$result['status'] = true;
			$result['nickname'] =  $data['nickname'];
			$_SESSION['uid'] = $uid;
			$_SESSION['nickname'] = $data['nickname'];
		}
		exit(json_encode($result));
	}
	//检查是否登录
	public function checkIsLogin(){
		if(IS_AJAX === false) _404();
		$result = array();
		$result['status'] = false;
		if(Rbac::isLogin()){
			$result['status'] = true;
			$result['uid'] = $_SESSION[C('RBAC_AUTH_KEY')];
			$result['nickname'] = $_SESSION['nickname'];
		}
		exit(json_encode($result));
	}
	//退出
	public function quit(){
		session_destroy();
		session_unset();
		$this->success('退出成功！',__ROOT__);
	}
	//展示验证码
	public function showCode(){
		$code = new Code();
		$code->show();
	}
	//注册验证
	public function checkReg(){
		if(IS_AJAX === false) _404();
		$result = array();
		$result['status'] = false;
		$name = key($_POST);
		$value = current($_POST);
		$db =M('user');
		switch ($name) {
			case 'username':
				if($db->where(array('username'=>$value))->count()){
					$result['msg'] = "用户名已存在！";
				}else{
					$result['status'] = true;
				}
			break;
			case 'email':
				if($db->where(array('email'=>$value))->count()){
					$result['msg'] = "邮箱已存在！";
				}else{
					$result['status'] = true;
				}
			break;
			case 'nickname':
				if($db->where(array('nickname'=>$value))->count()){
					$result['msg'] = "昵称已存在！";
				}else{
					$result['status'] = true;
				}
			break;
			case 'code':
				if(strtoupper($value) !== strtoupper($_SESSION['code'])){
					$result['msg'] = "验证码输入错误！";
				}else{
					$result['status'] = true;
				}
			break;
		}
	exit(json_encode($result));
	}
	//登录验证
	public function checkLogin(){
		if(IS_AJAX === false) _404();
		$result = array();
		$result['status'] = false;
		$name = key($_POST);
		$value = current($_POST);
		$db =M('user');
		switch ($name) {
			case 'username':
				if($db->where(array('username'=>$value))->count()){
					$result['status'] = true;
				}else{
					$result['msg'] = "用户名不存在！";
				}
			break;
			case 'code':
				if(strtoupper($value) !== strtoupper($_SESSION['code'])){
					$result['msg'] = "验证码输入错误！";
				}else{
					$result['status'] = true;
				}
			break;
		}
	exit(json_encode($result));
	}
}
?>