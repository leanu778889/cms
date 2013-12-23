<?php
class NewsControl extends CommonControl{
	private $id;
	public function __auto(){
		$this->db = K('news');
		$this->id = $this->_get('id','intval',0);
	}
	//文章列表页
	public function index(){
		$total = $this->db->getTotal();
		$page = new Page($total);
		$data = $this->db->getNewsAll($page->limit());
		$this->assign('page',$page->show());
		$this->assign('data',$data);
		$this->display();
	}
	//添加文章
	public function add(){
		if(IS_POST ===true){
			if($this->db->addNews() === true){
				$this->success('添加成功！','index');
			}else{
				$this->error($this->db->error);
			}
		}
		$db = K('category');
		$data = $db->getCategoryAll();
		$category = Data::channel($data,'cid','pid',0,null,2,'--');
		$this->assign('category',$category);
		$db = K('tag');
		$tag = $db->getTagAll();
		$this->assign('tag',$tag);
		$this->display('addShow.html');
	}
	//修改文章
	public function edit(){
		if(!$this->id) exit('参数错误！');
		if(IS_POST === true){
			if($this->db->editNews($this->id) === true){
				$this->success('修改成功！','index');
			}else{
				$this->error('修改失败！');
			}
		}
		$news = $this->db->getNewsOnly($this->id);
		$this->assign('news',$news);
		$db = K('category');
		$data = $db->getCategoryAll();
		$category = Data::channel($data,'cid','pid',0,null,2,'--');
		$this->assign('category',$category);
		$db = K('tag');
		$tag = $db->getTagAll();
		$this->assign('tag',$tag);
		$this->display('editShow.html');
	}
	//回收站
	public function recycle(){
		if($this->id){
			$value = $this->_get('value','intval');
			if($this->db->setRecycle($this->id,$value)){
				if($value){
					$this->success('移至回收站成功！',U('News/recycle'));
				}else{
					$this->success('还原至列表成功！',U('News/index'));
				}

			}else{
				if($value){
					$this->error('移至回收站失败，请重试！',U('News/index'));
				}else{
					$this->error('还原至列表失败，请重试！',U('News/recycle'));
				}
			}
		}
		$total = $this->db->getTotal(1);
		$page = new Page($total);
		$data = $this->db->getNewsAll($page->limit(),1);
		$this->assign('page',$page->show());
		$this->assign('data',$data);
		$this->display();
	}
	//删除
	public function del(){
		if(!$this->id) exit('参数错误！');
		if($this->db->delNews($this->id)===true){
			$this->success('删除成功！',U('News/recycle'));
		}else{
			$this->error($this->db->error);
		}
	}

	public function archives(){
		$db = M();
		$sql = 'SELECT addtime FROM '.C('DB_PREFIX').'news ORDER BY addtime ASC LIMIT 1';
		$data =$db->query($sql);
		$startYear = date('Y',$data[0]['addtime']);

		$sql = 'SELECT addtime FROM '.C('DB_PREFIX').'news ORDER BY addtime DESC LIMIT 1';
		$data =$db->query($sql);
		$endYear = date('Y',$data[0]['addtime']);
		$result = array();
		for($y=$startYear;$y<=$endYear;$y++){
			for($m=1;$m<=12;$m++){
				$month = $y.'-'.$m;
				$total = $this->disArchives($month);
				if($total){
					$result[$y][$m]['month'] = $month;
					$result[$y][$m]['total'] = $total;
					$result[$y][$m]['url'] = __ROOT__.'/index.php/Index/Search/index/archives/'.$month;
				}
			}
		}
		$filePath = ROOT_PATH.'Data/archives.php';
		Dir::create(dirname($filePath));
		$dataStr = var_export($result,true);
		$str =<<<str
<?php
	return {$dataStr};
?>
str;
		file_put_contents($filePath, $str);
		$this->success('归档成功！',U('Index/welcome'));
	}
	private function disArchives($month){
		$s =strtotime($month,-1);
		$e = strtotime($month.'-'.date('t',$s).' 23:59:59');
		$db = M();
		$sql = 'SELECT count(*) as total FROM '.C('DB_PREFIX').'news WHERE addtime >='.$s.' AND addtime<='.$e;
		$result = $db->query($sql);
		return $result[0]['total'];
	}
}

?>