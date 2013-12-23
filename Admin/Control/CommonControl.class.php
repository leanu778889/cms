<?php
class CommonControl extends Control{
	protected $db;
	public function __init(){
		if(!Rbac::IsLogin()){
			header('Location:'.U('Login/index'));
		}else{
			if(!Rbac::checkAccess()){
				$this->error('对不起，你没有权限访问！');
			}
		}
		if(method_exists($this, '__auto')){
			$this->__auto();
		}
		$this->setNav();
	}
	private function setNav(){
		$nav = include APP_PATH.'/Config/nav.php';
		$this->assign('nav',$nav);
	}
}
?>