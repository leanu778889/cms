<?php
class SetUpControl extends CommonControl{
	public function __auto(){
		$this->db = K('SetUp');
	}
	public function index(){
		//如果是post请求 则为修改配置项
		if(IS_POST === true){
			//如果修改失败则报错
			if($this->db->editConfig()!==true){
				$this->error($this->db->error);
			}
			//获得所有的配置项
			$allConfig = $this->db->getConfigAll();
			$newArr = array();
			//对配置项进行循环
			foreach ($allConfig as  $v) {
				foreach ($v as  $m) {
					$newArr[$m['name']] = $m['value'];
				}
			}
			//把数组转化为字符串
			$data = var_export($newArr,true);
			$str =<<<str
<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
return {$data};
?>
str;
			//将配置项写入配置文件
			file_put_contents(APP_PATH.'Config/webConfig.php', $str);
			$this->success('修改配置项成功！','index');
		}
		$config = $this->db->getConfigAll();
		$this->assign('config',$config);
		$this->display();
	}
}
?>