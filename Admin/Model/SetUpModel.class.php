<?php
class SetUpModel extends Model{
	public $table = 'config';
	public function getConfigAll(){
		$result = $this->select();
		$data = $this->disData($result);
		return $data;
	}
	public function editConfig(){
		//post中的id
		$id = Q('post.id');
		//post中的value
		$value = Q('post.value');
		//组合数据并更新数据库
		foreach($id as $k=>$v){
			$newArr = array();
			$newArr['id'] = $v;
			$newArr['value'] = $value[$k];
			$this->where(array('id'=>$v))->save($newArr);
		}
		return true;
	}
	private function disData($result){
		$data = array();
		//将数据库读取出来的配置项按照type_id分组
		foreach ($result as $k => $v) {
			$data[$v['type_id']][] = $v;
		}
		return $data;
	}
}
?>