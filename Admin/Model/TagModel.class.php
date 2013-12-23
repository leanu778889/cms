<?php
class TagModel extends Model{
	public $table = 'tag';
	public function addTag(){
		$data = $this->disData();
		if(!$data['status']){
			return $this->add($data);
		}else{
			return false;
		}
	}
	public function getTagAll(){
		return $this->select();
	}
	public function findTag($tid){
		return $this->where(array('tid'=>$tid))->find();
	}
	public function editTag($tid){
		$data = $this->disData();
		if(!$data['status']){
			return $this->where(array('tid'=>$tid))->update($data);
		}else{
			return false;
		}
	}
	public function disData(){
		$data = array();
		$data['tagname'] = Q('post.tname','strip_tags');
		$data['status']=$this->where(array('tagname'=>$data['tagname']))->count();
		return $data;
	}
}
?>