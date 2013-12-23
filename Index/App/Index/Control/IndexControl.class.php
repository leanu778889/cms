<?php
//测试控制器类
class IndexControl extends CommonControl{
	public function __auto(){
		$header =array();
		$header['webname'] = C('webname');
		$header['copy'] = C('copy');
		$this->assign('header',$header);
	}
    public function index(){
    	$this->display();
    }
}
?>