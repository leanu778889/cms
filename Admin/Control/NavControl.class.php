<?php
class NavControl extends CommonControl{
	private $nid;
	public function __auto(){
		$this->db = K('nav');
		$this->nid = $this->_get('nid','intval',0);
	}
	public function index(){
		$data = $this->db->getNavAll();
		$this->assign('nav',$data);
		$this->display();
	}
	public function add(){
		if(IS_POST === true){
			if($this->db->addNav()){
				$this->success('添加成功！','index');
			}else{
				$this->error('添加失败！');
			}
		}
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->nid) exit('参数错误！');
		if(IS_POST === true){
			if($this->db->editNav($this->nid)){
				$this->success('修改成功！','index');
			}else{
				$this->error('修改失败！');
			}
		}
		$data = $this->db->getNavOnly($this->nid);
		$this->assign('nav',$data);
		$this->display('editShow.html');
	}
	public function del(){
		if(!$this->nid) exit('参数错误！');
		if($this->db->delNav($this->nid)){
			$this->success('删除成功！','index');
		}else{
			$this->error('删除失败！');
		}
	}
}
?>