<?php
class LoginControl extends Control{
	public function __init(){
		if(Rbac::IsLogin()){
			header('Location:'.U('Index/index'));
		}
	}
	public function index(){
		$this->display();
	}
	public function login(){
		if(IS_POST ===false) exit('参数错误！');
		$username = $this->_post('username');
		$password = $this->_post('password','md5');
		$preg = '/^[a-z]\w{1,29}$/';
		if(!preg_match($preg, $username)) _404('用户名不合法！');
		if(Rbac::login($username,$password)){
			$this->success('登录成功！',U('Index/index'));
		}
		$this->error(Rbac::$error);
	}
	public function checkCode(){
		if(IS_AJAX === false) exit('参数错误！');
		$result = array();
		$result['status'] = false;
		if(strtoupper($_POST['code'])==strtoupper($_SESSION['code'])){
			$result['status'] = true;
		}
		exit(json_encode($result));
	}
	public function showCode(){
		$code = new Code();
		$code->show();
	}
}
?>