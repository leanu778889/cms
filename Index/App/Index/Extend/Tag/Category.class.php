<?php
class Category{
	public function _category($attr,$content,$parse){
		$name = isset($attr['name'])?$attr['name']:'field';
		$pid = isset($attr['pid'])?$attr['pid']:0;
		$str =<<<str
		<?php
		\$db = M('category');
		\$data = \$db->field('cid,cname,pid,htmldir,islisthtml')->where(array('isshow'=>1))->select();
		\$data = Data::channel(\$data,'cid','pid',{$pid},null,1);
		?>
str;
		$str .='<?php foreach($data as $k=>$'.$name.'):?>';
		$str .='<?php $'.$name.'["url"] = getCategoryUrl($'.$name.'["islisthtml"],$'.$name.'["htmldir"],$'.$name.'["cid"]);?>';
		$str .=$content;
		$str .='<?php endforeach;?>';
		return $str;
	}
}
?>