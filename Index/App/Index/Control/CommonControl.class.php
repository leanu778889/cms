<?php
class CommonControl extends Control{
	public function __init(){
		if(method_exists($this, '__auto')){
			$this->__auto();
		}
		$archives = include ROOT_PATH.'Data/archives.php';
		$this->assign('archives',$archives);
	}
}
?>