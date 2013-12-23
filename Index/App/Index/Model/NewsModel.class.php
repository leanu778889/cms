<?php
class NewsModel extends ViewModel{
	public $table ='news';
	public $view = array(
		'category'=>array(
			'type'=>'inner',
			'on'=>'news.category_cid = category.cid'
		),
	);
	public function getTotal($where){
		return $this->where($where)->count();
	}
	public function fetchOnly($id){
		$this->view['news_data'] = array(
			'type'=>'inner',
			'on'=>'news.id=news_data.news_id'
		);
		$field = array(
			'id',
			'cid',
			'click',
			'thumb',
			'news.title',
			'news_data.keywords',
			'news_data.description',
			'body',
			'cname',
			'addtime',
			'author',
			'htmldir',
			'islisthtml',
		);
		$data = $this->field($field)->where(array('id'=>$id))->find();
		// getCategoryUrl($islisthtml,$htmldir,$cid)
		$data['category_url'] = getCategoryUrl($data['islisthtml'],$data['htmldir'],$data['cid']);
		$preg = '/<\s*[a-z].*?>.*?<\/[a-z]>/s';
		/*preg_match_all($preg,$data['body'],$arr);
		$str = '';
		foreach ($arr[0] as $v){
			$str .=$v."\n";
		}
		$data['body'] = $str;*/
		return $data;
	}
	public function fetchAll($where,$order,$limit){
		$field = array(
			'id',
			'news.title',
			'addtime',
			'htmldir',
			'isarchtml',
			'author',
			'thumb',
			'click',
			'digest'
		);
		$data = $this->field($field)->where($where)->order($order)->limit($limit)->select();
		return $this->disData($data);
	}
	public function disData($data){
		if(!is_array($data)){
			return array();
		}
		$thumbSize = explode(',',C('THUMB_SIZE'));
		foreach($data as $k=>$v){
			//getNewsUrl($isarchtml,$htmldir,$addtime,$id)
			$data[$k]['url'] = getNewsUrl($v['isarchtml'],$v['htmldir'],$v['addtime'],$v['id']);
			foreach($thumbSize as $m=>$n){
				if($m%2){
					$data[$k]['thumb_'.$thumbSize[$m-1].'x'.$n] = getThumbUrl($data[$k]['thumb'],$thumbSize[$m-1],$n);
				}
			}
		}
		return $data;
	}
}
?>