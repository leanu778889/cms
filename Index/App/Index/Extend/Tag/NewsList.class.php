<?php
class NewsList{
	public function _newslist($attr,$content,$parse){
		$name = isset($attr['name'])?$attr['name']:'field';
		$cid = isset($attr['cid'])?(int)$attr['cid']:0;
		if(!$cid){
			$cid =isset($_GET['cid'])?(int)$_GET['cid']:0;
		}
		$where = $cid?' category_cid='.$cid.' and recycled=0':(isset($attr['attr'])?' find_in_set(\''.$attr['attr'].'\',attr)':' recycled=0');

		$limit = isset($attr['limit'])?(int)$attr['limit']:9;


		$order = isset($attr['order'])?$attr['order'].' DESC':'addtime DESC';
		$str =<<<str
		<?php
			\$db = K('news');
			\$data = \$db->fetchAll("{$where}","{$order}",{$limit});
		?>
str;
		$str .='<?php foreach($data as $k=>$'.$name.'):?>';
		$str .=$content;
		$str .='<?php endforeach;?>';
		return $str;
	}
}
?>