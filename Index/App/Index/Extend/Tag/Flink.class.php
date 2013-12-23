<?php
class Flink{
	public function _flink($attr,$content,$parse){
		$name = isset($attr['name'])?$attr['name']:'field';
		$str=<<<str
		<?php
			\$db = M('flink');
			\$data = \$db->select();
		?>
str;

		$str .='<?php foreach($data as $'.$name.'):?>';
		$str .=$content;
		$str .='<?php endforeach;?>';
		return $str;
	}
}
?>