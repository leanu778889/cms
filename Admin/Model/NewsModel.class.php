<?php
class NewsModel extends ViewModel{
	public $table = 'news';
	public $view = array(
		'category'=>array(
			'type'=>'inner',
			"field" => 'title|ctitle,cname,htmldir',
			'on'=>'category.cid=news.category_cid'
		),
	);
	//添加文章
	public function addNews(){
		$data = $this->disData();
		$id = $this->table('news')->add($data['news']);
		if($id){
			$data['news_data']['news_id'] = $id;
			$this->table('news_data')->add($data['news_data']);
			$tag = array();
			$tag['news_id'] = $id;
			$tag['category_cid'] = $data['news']['category_cid'];
			foreach($data['tag_news']['tags'] as $v){
				$tag['tag_tid'] = $v;
				$this->table('tag_news')->add($tag);
			}
		}else{
			return false;
		}
		return true;
	}
	//修改文章
	public function editNews($id){
		$data = $this->disData();
		$this->table('tag_news')->where(array('news_id'=>$id))->del();
		$this->table('news')->where(array('id'=>$id))->update($data['news']);
		$this->table('news_data')->where(array('news_id'=>$id))->update($data['news_data']);
		$tag = array();
		$tag['news_id'] = $id;
		$tag['category_cid'] = $data['news']['category_cid'];
		foreach($data['tag_news']['tags'] as $v){
			$tag['tag_tid'] = $v;
			$this->table('tag_news')->add($tag);
		}
		return true;
	}
	//获得单篇文章的详细信息
	public function getNewsOnly($id){
		$this->view['news_data'] = array(
			'type' => 'inner',
			'on'=>'news.id = news_data.news_id'
		);
		$data = $this->where(array('id'=>$id))->find();
		$tags= $this->getTags($id);
		$newArr = array();
		$tags = is_array($tags)?$tags:array();
		foreach($tags as $v){
			$newArr[] = $v['tid'];
		}
		$data['attr'] = explode(',', $data['attr']);
		$data['tags'] = $newArr;
		return $data;
	}
	//获得文章总数
	public function getTotal($recycled = 0){
		return $this->where(array('recycled'=>$recycled))->count();
	}
	//获得当前页所有文章的详细信息
	public function getNewsAll($limit,$recycled = 0){
		$data = $this->where(array('recycled'=>$recycled))->limit($limit)->select();
		$data = isset($data)?$data:array();
		foreach($data as $k=>$v){
			$data[$k]['tags'] = $this->getTags($v['id']);
		}
		return $data;
	}
	//设置为回收站中
	public function setRecycle($id,$value){
		return $this->where(array('id'=>$id))->update(array('recycled'=>$value));
	}
	//删除文章
	public function delNews($id){
		$this->table('tag_news')->where(array('news_id'=>$id))->del();
		$this->table('news_data')->where(array('news_id'=>$id))->del();
		$data = $this->table('news')->field('thumb')->where(array('id'=>$id))->find();
		$this->delImage($data['thumb']);
		$this->table('news')->where(array('id'=>$id))->del();
		return true;
	}
	//获得文章的标签
	private function getTags($news_id){
		$sql = 'SELECT tagname,t.tid FROM '.C('DB_PREFIX').'tag AS t
				INNER JOIN '.C('DB_PREFIX').'tag_news AS t1 ON t.tid = t1.tag_tid
				WHERE t1.news_id='.$news_id;
		$tags = $this->query($sql);
		return $tags;
	}
	//处理数据
	private function disData(){
		$data = array();
		$data['news'] = array();
		$data['news_data'] =  array();
		$data['tag_news'] = array();
		//组合news表数据
		$data['news']['title'] = Q('post.title','strip_tags');
		$data['news']['digest'] = Q('post.digest','htmlspecialchars');
		$data['news']['category_cid'] = Q('post.cid','intval');
		$data['news']['attr'] = implode(',', $_POST['attr']);
		$data['news']['thumb'] = $this->disImage();
		//修改时不变的数据
		if(METHOD ==='add'){
			$data['news']['user_id'] = $_SESSION[C('RBAC_AUTH_KEY')];
			$data['news']['author'] = $_SESSION['username'];
			$data['news']['addtime'] = $_SERVER['REQUEST_TIME'];
			$data['news']['updatetime'] = date('Y-m-d H:m:i',$_SERVER['REQUEST_TIME']);
		}
		//组合news_data 内容表数据
		$data['news_data']['keywords'] = Q('post.keywords','htmlspecialchars');
		$data['news_data']['description'] = Q('post.description','htmlspecialchars');
		$data['news_data']['body'] = $_POST['body'];
		//组合tag_news表数据
		$data['tag_news']['tags'] = isset($_POST['tag'])?$_POST['tag']:array();

		return $data;
	}
	//处理图片
	private function disImage(){
		if(!isset($_POST['file']))	return $_POST['image'];
		is_file(ROOT_PATH.$_POST['image']) && $this->delImage($_POST['image']);
		$file = $_POST['file'][1]['path'];
		$pathinfo = pathinfo($file);
		$filename = $pathinfo['filename'];
		$ext = $pathinfo['extension'];
		$thumbPath = rtrim(str_replace('\\', '/',C('THUMB_PATH')),'/').'/'.$filename;
		$thumbSize = explode(',', C('THUMB_SIZE'));
		$img = new Image();
		foreach($thumbSize as $k=>$v){
			if($k%2){
				$thumbWidth = $thumbSize[$k-1];
				$thumbHeight = $v;
				$outFile = $filename.'_'.$thumbWidth.'x'.$thumbHeight.'.'.$ext;
				$img->thumb($file,$thumbWidth,$thumbHeight,C('THUMB_TYPE'),$thumbPath,$outFile);
			}
		}
		return $file;
	}
	private function delImage($path){
		$oldImg =ROOT_PATH.$path;
		$oldInfo = pathinfo($oldImg);
		$filename = $oldInfo['filename'];
		$oldPath = rtrim(str_replace('\\','/',C('THUMB_PATH')),'/').'/'.$filename;
		is_dir($oldPath) && dir::del($oldPath);
		is_file($oldImg) && unlink($oldImg);
	}
}
?>