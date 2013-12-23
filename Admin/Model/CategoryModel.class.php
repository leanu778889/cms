<?php
class CategoryModel extends Model{
	const DEL_ERROR_1 = '请先删除子类！';
	const DEL_ERROR_2 = '请先删除分类下的文章！';
	public $validate = array(
		array("pid", "regexp:/^\d+$/", "pid验证失败,不是一个数子", 2),
		array('cname','regexp:/^.{1,20}$/','分类名称验证失败',2),
		array('title','regexp:/^.{1,60}$/','分类标题验证失败',2),
		array('keywords','regexp:/^.{1,120}$/','分类关键字验证失败',2),
		array('description','regexp:/^.{1,255}$/','分类描述验证失败',2),
		array('sort','maxlen:100','排序验证失败',2),
		array('htmldir','regexp:/^[a-z]\w{1,19}$/','目录名验证失败',2),
		array('islisthtml','regexp:/^[01]$/','分类列表静态验证失败',2),
		array('isarchtml','regexp:/^[01]$/','分类内容页验证失败',2),
		array('isshow','regexp:/^[01]$/','分类是否显示验证失败',2),
	);
/*
	添加分类
*/
	public function addCategory(){
		$data = $this->disData();
		if(!$this->validate($data)){
			return false;
		}
		$this->add($data);
		return true;
	}
/*
	获取所有分类
*/
	public function getCategoryAll(){
		return $this->select();
	}
/*
	获取单个分类
*/
	public function findCategory($cid){
		return $this->where(array('cid'=>$cid))->find();
	}
/*
	修改分类
*/
	public function editCategory($cid){
		$data = $this->disData();
		if(!$this->validate($data)){
			return false;
		}
		$this->where(array('cid'=>$cid))->update($data);
		return true;
	}
/*
	删除分类
*/
	public function delCategory($cid){
		//分类下存在子类
		if($this->where(array('pid'=>$cid))->count()){
			$this->error =self::DEL_ERROR_1;
			return false;
		}
		//分类下的存在文章
		if($this->table('news')->where(array('category_cid'=>$cid))->count()){
			$this->error =self::DEL_ERROR_2;
			return false;
		}
		$this->where(array('cid'=>$cid))->del();
		return true;
	}
	// 过滤数据   实体化  去除标签  转整型
	private function disData(){
		$data = array();
		$data['pid'] = Q("post.pid","intval");
		$data['cname'] = Q("post.cname","strip_tags");
		$data['title'] = Q("post.title","htmlspecialchars");
		$data['keywords'] = Q("post.keywords","htmlspecialchars");
		$data['description'] = Q("post.description","htmlspecialchars");
		$data['sort'] = Q("post.sort","intval");
		$data['htmldir'] = Q("post.htmldir","strip_tags");
		$data['islisthtml'] = Q("post.islisthtml","intval");
		$data['isarchtml'] = Q("post.isarchtml","intval");
		$data['isshow'] = Q("post.isshow","intval");
		return $data;
	}
}
?>