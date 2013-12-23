<?php
function getCategoryUrl($islisthtml,$htmldir,$cid){
	if($islisthtml){
		$url = __ROOT__.'/static/'.$htmldir;
	}else{
		$url = U('Index/List/index/cid/'.$cid);
	}
	return $url;
}
function getNewsUrl($isarchtml,$htmldir,$addtime,$id){
	if($isarchtml){
		$url = __ROOT__.'/static/'.$htmldir.'/article/'.date('Ym',$addtime).'/'.$id.'.html';
	}else{
		$url = U('Index/Detail/index/id/'.$id);
	}
	return $url;
}
function getThumbUrl($srcImg,$w,$h){

	$thumbPath = str_replace(ROOT_PATH, __ROOT__.'/', C('THUMB_PATH'));
	$pathinfo = pathinfo($srcImg);
	$file = $thumbPath.$pathinfo['filename'].'/'.$pathinfo['filename'].'_'.$w.'x'.$h.'.'.$pathinfo['extension'];
	return $file;
}
?>