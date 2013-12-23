<?php
class DetailControl extends CommonControl{
	private $id;
	public function __auto(){
		$this->id = isset($_GET['id'])?(int)$_GET['id']:header('Loction:'.__ROOT__);
	}
	public function index(){
		$db = K('news');
		$data = $db->fetchOnly($this->id);
		$this->assign('news',$data);
		$this->display('details.html');
	}
	public function showClick(){
		if(IS_AJAX === false) _404();
		$result =array();
		$result['status'] = false;
		$db = M('news');
		$data = $db->field('click')->where(array('id'=>$this->id))->find();
		if($db->inc('click','id='.$this->id,1)){
			$result['status'] = true;
			$result['click'] =$data['click'];
		}
		exit(json_encode($result));
	}
	public function listComment(){
		if(IS_AJAX === false) _404();
		$result =array();
		$result['status'] = false;
		$news_id = isset($_GET['news_id'])?(int)$_GET['news_id']:exit(json_encode($result));
		$db = M('comment');
		$data = $db->where(array('news_id'=>$news_id))->order('addtime DESC')->select();
		foreach ($data as $k => $v) {
			$data[$k]['addtime'] = date('Y-m-d H:i:s',$v['addtime']);
		}
		$result['data'] = $data;
		$result['status'] = true;
		exit(json_encode($result));
	}
	public function addComment(){
		if(IS_AJAX === false) _404();
		$result =array();
		$result['status'] = false;
		$data = array();
		$data['user_id'] = Q('post.uid','intval');
		$data['news_id'] = Q('post.news_id','intval');
		$data['nickname'] = Q('post.nickname','addslashes,strip_tags');
		$data['content'] = Q('post.content','addslashes,strip_tags');
		$data['addtime'] = $_SERVER['REQUEST_TIME'];
		$db = M('comment');
		$comment_id = $db->add($data);
		if($comment_id){
			$result['status'] = true;
			$result['nickname'] = $data['nickname'];
			$result['addtime'] = date('Y-m-d H:i:s',$data['addtime']);
			$result['content'] = $data['content'];
		}
		exit(json_encode($result));
	}
}
?>