<?php
class ListControl extends CommonControl{
	private $cid;
	private $islisthtml;
	private $htmldir;
	public function __auto(){
		$this->cid = isset($_GET['cid'])?(int)$_GET['cid']:header('Location:'.__ROOT__);
		$db = M('category');
		$data = $db->field('cid,title,keywords,description,islisthtml,htmldir')->where(array('cid'=>$this->cid))->find();
		$header = array();
		$header['title'] = $data['title'];
		$header['keywords'] = $data['keywords'];
		$header['description'] = $data['description'];
		$this->islisthtml = $data['islisthtml'];
		$this->htmldir = $data['htmldir'];
		$this->assign('header',$header);
	}
	public function index(){
		if($this->islisthtml){
			page::$fix = '.html';
			page::$staticUrl = __ROOT__.'/static/'.$this->htmldir.'/';
		}
		$db = K('news');
		$where = array('category_cid'=>$this->cid);
		$total = $db->getTotal($where);
		$page = new Page($total);
		$order="addtime DESC";
		$data = $db->fetchAll($where,$order,$page->limit());
		$this->assign('page',$page->show());
		$this->assign('news',$data);
		$this->display('list.html');
	}
}
?>