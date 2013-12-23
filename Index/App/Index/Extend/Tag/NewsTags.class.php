<?php
class NewsTags{
	public function _newstags($attr,$content,$parse){
		$name=isset($attr['name'])?$attr['name']:'field';
		$limit = isset($attr['limit'])?$attr['limit']:'9';
		$url = U('Index/Search/index');
		$id = isset($attr['news_id'])?(int)$attr['news_id']:0;
		if(!$id){
			$id = isset($_GET['id'])?$_GET['id']:0;
			if($id){
				$where ='where news_id='.$id;
			}else{
				$cid = isset($attr['cid'])?(int)$attr['cid']:0;
				if($cid){
					$where='where category_cid='.$cid;
				}else{
					$where ='';
				}
			}
		}
		/*$where = isset($attr['news_id'])?'where news_id='.(int)$attr['news_id']:(isset($attr['cid'])?'where category_cid='.(int)$attr['cid']:'');*/
		$str =<<<str
		<?php
			\$db = M('tag_news');
			\$sql ='SELECT * FROM '.C('DB_PREFIX').'tag_news as t1 INNER JOIN '.C('DB_PREFIX').'tag as t ON t1.tag_tid=t.tid '."{$where}".' group by t1.tag_tid order by count(*) desc limit 0,'."{$limit}";
			\$data = \$db->query(\$sql);
		?>
str;
		$str .='<?php foreach($data as $'.$name.'):?>';
		$str .='<?php $'.$name.'["url"] = "'.$url.'/tid/$'.$name.'[tid]";?>';
		$str .=$content;
		$str .='<?php endforeach;?>';
		return $str;
	}
}
?>