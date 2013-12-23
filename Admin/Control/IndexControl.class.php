<?php
//测试控制器类
class IndexControl extends CommonControl{
    public function index(){
        $this->display();
    }
    public function welcome(){
       // p($_SESSION);
    	$this->assign('server',$_SERVER);
    	$this->display();
    }
    public function quit(){
    	session_destroy();
    	session_unset();
    	$this->success('退出成功！',U('Login/index'));
    }
}
?>