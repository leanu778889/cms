<?php
class TagControl extends CommonControl{
	private $tid;
	public function __auto(){
		$this->db = K('tag');
		$this->tid = $this->_get('tid','intval',0);
	}
	public function index(){
		$data = $this->db->getTagAll();
		$this->assign('data',$data);
		$this->display();
	/*	implode(',', pieces);
		explode(',', string);*/
	}
	public function add(){
		if(IS_POST ===true){
			if($this->db->addTag()){
				$this->success('添加成功！','index');
			}
			$this->error('标签名已存在！');
		}
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->tid)	exit('缺少参数！');
		if(IS_POST ===true){
			if($this->db->editTag($this->tid)){
				$this->success('修改成功！','index');
			}
			$this->error('标签名已存在！');
		}
		$tag = $this->db->findTag($this->tid);
		$this->assign('tag',$tag);
		$this->display('editShow.html');
	}
	public function del(){
		if(!$this->tid)	exit('缺少参数！');
		if($this->db->delTag($this->tid)){
			$this->success('删除成功！','index');
		}
		$this->error('标签名已存在！');
	}
}
?>