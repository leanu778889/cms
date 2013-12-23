<?php
class SearchControl extends CommonControl{
	public function index(){
		$tid = Q('get.tid','intval',0);
		$keywords = Q('get.keywords','addslashes,strip_tags','');
		$archives =Q('get.archives','addslashes,strip_tags','');
		if($tid){
			$where = 'WHERE tn.tag_tid='.$tid;
		}
		if($keywords){
			$where = 'WHERE n.title like "%'.$keywords.'%"';
		}
		if($archives){
			$data = $this->disArchives($archives);
			$where = 'WHERE addtime>='.$data['start'].' AND addtime <='.$data['end'];
		}
		$db = M();
		$common = '';
		$common .= 'SELECT count(*) as total FROM '.C('DB_PREFIX').'news AS n ';
		$common .='INNER JOIN '.C('DB_PREFIX').'category AS c ON n.category_cid = c.cid ';
		$common .='INNER JOIN '.C('DB_PREFIX').'tag_news AS tn ON n.id = tn.news_id ';
		$common .= $where;

		$result = $db->query($common);
		$total = $result[0]['total'];
		$page = new page($total,10);
		$limit = ' LIMIT '.current($page->limit());

		$sql = '';
		$sql .= 'SELECT id,n.title,addtime,htmldir,isarchtml,author,thumb,digest FROM '.C('DB_PREFIX').'news AS n ';
		$sql .='INNER JOIN '.C('DB_PREFIX').'category AS c ON n.category_cid = c.cid ';
		$sql .='INNER JOIN '.C('DB_PREFIX').'tag_news AS tn ON n.id = tn.news_id ';
		$sql .= $where.$limit;

		$data = $db->query($sql);
		$data = K('news')->disData($data);
		$this->assign('news',$data);
		$this->assign('page',$page->show());
		$this->display('search.html');
	}
	private function disArchives($month){
		$data = array();
		$data['start'] =strtotime($month,-1);
		$data['end']= strtotime($month.'-'.date('t',$data['start']).' 23:59:59');
		return $data;
	}
}
?>