<?php
class Navigation{
	public function _navigation($attr,$content,$parse){
		$name = isset($attr['name'])?$attr['name']:'field';
		$site = isset($attr['site'])?(int)$attr['site']:1;
		$str =<<<str
		<?php
			\$db = M('navigation');
			\$data = \$db->where(array('site'=>{$site}))->select();
		?>
str;
		$str .='<?php foreach($data as $'.$name.'):?>';
		$str .=$content;
		$str .='<?php endforeach;?>';
		return $str;
	}
}
?>