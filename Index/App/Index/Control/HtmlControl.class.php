<?php
class HtmlControl extends Control{
	private $goUrl;
	public function __init(){
		if(Rbac::isLogin()){
			if(!Rbac::checkAccess()){
				header('Location:'.__ROOT__);
			}
		}
		$this->goUrl = __ROOT__.'/admin.php/Index/welcome';
	}
	public function index(){
		$file = ROOT_PATH.'index.html';
		if($this->createHtml('IndexControl','index',$file)){
			$this->success('首页生成成功！',$this->goUrl);
		}
	}
	public function category(){
		$db = M('category');
		$category = $db->field('cid,htmldir')->where(array('islisthtml'=>1))->select();
		if(!is_array($category)){
			$this->error('请先添加分类！');
		}
		foreach($category as $v){
			$_GET['cid'] = $v['cid'];
			$file = ROOT_PATH.'static/'.$v['htmldir'].'/index.html';
			$this->createHtml('ListControl','index',$file);
			for($i=0;$i<=page::$staticTotalPage;$i++){
				$_GET['page'] = $i;
				$file = ROOT_PATH.'static/'.$v['htmldir'].'/'.$i.page::$fix;
				$this->createHtml('ListControl','index',$file);
			}
			$_GET['page'] = 1;
		}
		$this->success('列表页生成成功！',$this->goUrl);
	}
	public function content(){
		$db = K('news');
		$where =array('recycled'=>0);
		$order = 'addtime DESC';
		$total = $db->getTotal($where);
		$page = new Page($total,50);
		$selfPage = isset($_GET['page'])?(int)$_GET['page']:1;
		$start = ($selfPage-1)*50;
		$end = $selfPage*50;
		//fetchAll($where,$order,$limit)
		$data = $db->fetchAll($where,$order,$page->limit());
		foreach($data as $v){
			$_GET['id'] = $v['id'];
			// __ROOT__.'/static/'.$htmldir.'/article/'.date('Ym',$addtime).'/'.$id.'.html';
			$file = ROOT_PATH.'static/'.$v['htmldir'].'/article/'.date('Ym',$v['addtime']).'/'.$v['id'].'.html';
			$this->createHtml('DetailControl','index',$file);
		}
		if( $selfPage>=page::$staticTotalPage){
			$this->success('内容页生成成功！',$this->goUrl);
		}
		$this->success('文章'.$start.'页到'.$end.'页生成成功！',__METH__.'/page/'.($selfPage+1));

	}
	public function createHtml($control,$method,$file){
		ob_start();
		O($control,$method);
		$data = ob_get_contents();
		ob_clean();
		dir::create(dirname($file));
		return file_put_contents($file, $data);
	}
}
?>