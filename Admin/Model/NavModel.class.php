<?php
class NavModel extends Model{
	public $table = 'navigation';
	public function addNav(){
		$data = $this->disData();
		return $this->add($data);
	}
	public function getNavAll(){
		$data = $this->order('sort asc')->select();
		$data = $this->formatData($data);
		return $data;
	}
	public function getNavOnly($nid){
		$data = $this->where(array('nid'=>$nid))->find();
		return $data;
	}
	public function editNav($nid){
		$data = $this->disData();
		return $this->where(array('nid'=>$nid))->update($data);
	}
	public function delNav($nid){
		return $this->where(array('nid'=>$nid))->del();
	}
	private function formatData($data){
		if(!is_array($data)){
			return array();
		}
		$newData = array();
		foreach($data as $v){
			$newData[$v['site']][] = $v;
		}
		return $newData;
	}
	private function disData(){
		$data = array();
		$data['name'] = Q('post.name','strip_tags');
		$data['url'] = Q('post.url','addslashes');
		$data['opennew'] = Q('post.opennew','intval');
		$data['isshow'] = Q('post.isshow','intval');
		$data['sort'] = Q('post.sort','intval');
		$data['site'] = Q('post.site','intval');
		return $data;
	}
}
?>