<?php
class FlinkControl extends CommonControl{
	public $fid;
	public function __auto(){
		$this->db = K('Flink');
		$this->fid = $this->_get('fid','intval',0);
	}
	public function index(){
		$data = $this->db->getFlinkAll();
		$this->assign('data',$data);
		$this->display();
	}
	public function add(){
		if(IS_POST ===true){
			if($this->db->addFlink() !== true){
				$this->error($this->db->error);
			}
			$this->success('添加友情链接成功！','index');
		}
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->fid) exit('参数错误！');
		if(IS_POST === true){
			if($this->db->editFlink($this->fid) !== true){
				$this->error($this->db->error);
			}
			$this->success('修改友情链接成功！','index');
		}
		$data  = $this->db->findFlink($this->fid);
		$this->assign('data',$data);
		$this->display('editShow.html');

	}
	public function del(){
		if(!$this->fid) exit('参数错误！');
		if($this->db->delFlink($this->fid) != true){
			$this->error($this->db->error);
		}
		$this->success('删除友情链接成功！','index');
	}
}
?>