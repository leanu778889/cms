<?php
class CategoryControl extends CommonControl{
	private $cid;
	public function __auto(){
		$this->db = K('category');
		$this->cid = $this->_get('cid','intval',0);
	}
	public function index(){
		$data = $this->db->getCategoryAll();
		$data = Data::channel($data,'cid','pid',0,null,2,'--');
		$this->assign('data',$data);
		$this->display();
	}
	public function add(){
		if(IS_POST === true){
			if($this->db->addCategory() !== true){
				$this->error($this->db->error);
			}
			$this->success('添加分类成功','index');
		}
		$this->assign('cid',$this->cid);
		$data = $this->db->getCategoryAll();
		$category = Data::channel($data,'cid','pid',0,null,2,'--');
		$this->assign('category',$category);
		$this->display('addShow.html');
	}
	public function edit(){
		if(!$this->cid) exit('缺少参数！');
		if(IS_POST === true){
			if($this->db->editCategory($this->cid) !== true){
				$this->error($this->db->error);
			}
			$this->success('修改分类成功','index');
		}

		$this->assign('cid',$this->cid);
		$data = $this->db->getCategoryAll();
		$category = Data::channel($data,'cid','pid',0,null,2,'--');
		$son = Data::channel($data,'cid','pid',$this->cid,null,2,'--');
		function func($v){
			return $v['cid'];
		}
		$disabledArr = array_map('func', $son);
		$disabledArr[] =$this->cid;
		$this->assign('disabledArr',$disabledArr);
		$this->assign('category',$category);
		$data = $this->db->findCategory($this->cid);
		$this->assign('data',$data);
		$this->display('editShow.html');
	}
	public function del(){
		if(!$this->cid) exit('缺少参数！');
		if(!$this->db->delCategory($this->cid)){
			$this->error($this->db->error);
		}
		$this->success('删除分类成功','index');
	}
}
?>