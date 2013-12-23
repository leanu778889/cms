<?php
class FlinkModel extends Model{
	public function addFlink(){
		$data = $this->disData();
		$this->add($data);
		return true;
	}
	public function getFlinkAll(){
		return $this->select();
	}
	public function findFlink($fid){
		return $this->where(array('fid'=>$fid))->find();
	}
	public function editFlink($fid){
		$data = $this->disData();
		$this->where(array('fid'=>$fid))->save($data);
		return true;
	}
	public function delFlink($fid){
		return $this->where(array('fid'=>$fid))->del();
	}
	private function disData(){
		$data = array();
		$data['fname'] = Q('post.fname','strip_tags');
		$data['url'] = Q('post.url','strip_tags');
		$data['msg'] = Q('post.msg','strip_tags');
		$data['sort'] = Q('post.sort','intval');
		$data['isshow'] = Q('post.isshow','intval');
		$data['logo'] = $this->disImage();
		return $data;
	}
	private function disImage(){
		$logo = '';
		//如果上传了图片 则进行缩略图处理
		if(Q('post.file')){
			//获得post中打的file
			$file = Q('post.file');
			//获得原图路径
			$path = $file[1]['path'];
			$pathinfo = pathinfo($path);
			//把原图的文件名保存为缩略图文件名
			$outFile = $pathinfo['basename'];
			//实例一个image类
			$img = new Image();
			//缩略图路径
			$outPath = './upload/Logo/';
			//生成100*100的缩略图
			$logo = $img->thumb($path,'100','100','6',$outPath,$outFile);
			//删除原图
			if(is_file($path)) unlink($path);
		}else{
			//没有上传新图片，则把之前的图片的路径保存下来
			$logo = Q('post.old_img','strip_tags');
		}
		return $logo;
	}
}
?>