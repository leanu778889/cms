<?php
//测试控制器类
class IndexControl extends Control{
	public function __init(){
		$setup = include './Data/setup.php';
		$this->assign('setup',$setup);
	}
    public function index(){
    	$_SESSION['SETUP'] = 1;
       	$this->display();
    }
    public function verify(){
    	if($_SESSION['SETUP']<1){
    		go(__CONTROL__);
    	}
    	$_SESSION['SETUP'] = 2;
    	$this->display();
    }
    public function setConfig(){
    	if($_SESSION['SETUP']<2){
    		go(__CONTROL__.'/verify');
    	}
    	$_SESSION['SETUP'] = 3;
    	$this->display();
    }
    public function installDb(){
    	if($_SESSION['SETUP']<3){
    		go(__CONTROL__.'/setConfig');
    	}
		$_SESSION['SETUP'] = 4;
		$_SESSION['ADMIN'] = $_POST['admin'];
		//调用写入配置项
		if($this->writeConfig()){
			$this->assign('begin',true);
		}else{
			$this->assign('begin',false);
		}
		$this->display();
    }
    //写入配置文件
    private function writeConfig(){
    	//确定配置项路径
    	$dbConfigPath = '../Admin/Config/dbConfig.php';
    	//把post中的db数组转换为定界符能用的
		$dataStr = var_export($_POST['db'],true);
		$str =<<<str
<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
	return {$dataStr};
?>
str;
		//写入文件
		file_put_contents($dbConfigPath, $str);
		//调用创建数据库
		return $this->createDatabase();
    }
    //创建数据库
    private function createDatabase(){
    	//获取post中的数据库信息
    	$db = $_POST['db'];
    	//连接数据库
    	$link = mysql_connect($db['DB_HOST'],$db['DB_USER'],$db['DB_PASSWORD']);
    	//连接失败  报错
    	if(!$link) $this->error('数据库连接失败！',__CONTROL__.'/setConfig');
    	//如果数据库存在 先删除 在创建
		mysql_query('DROP DATABASE IF EXISTS '.$db['DB_DATABASE']);
		mysql_query('CREATE DATABASE '.$db['DB_DATABASE'].' CHARSET utf8');
		//如果创建数据库失败 报错
		if(mysql_errno()) _404(mysql_error());
    	return true;
    }
    public function installTable(){
    	if(IS_AJAX === false) _404();
    	if($_SESSION['SETUP']<4){
    		go(__CONTROL__.'/setConfig');
    	}
    	$_SESSION['SETUP'] = 5;
    	//获得参数begin
    	$begin = Q('get.begin','intval',0);
    	//压入配置项
    	C(include '../Admin/Config/dbConfig.php');
    	//引入添加表的sql语句
    	$tableConfig = include './Data/tableConfig.php';
    	//替换表名前缀
    	$sql = str_replace('{tablePre}', C('DB_PREFIX'), $tableConfig[$begin]);
    	//获取表名
    	$preg = '/CREATE TABLE `(\w+)`/';
    	preg_match($preg, $sql,$arr);
    	$tableName = $arr[1];
    	// mysqli_connect(C('DB_HOST'),C('DB_USER'),C('DB_PASSWORD'));
    	//返回给前台的数据
    	$result = array();
    	$result['status'] = false;
    	$db = M();
    	$db->query($sql);
    	if(!isset($db->error)){
    		$result['status'] = true;
    		$result['begin'] = $begin+1;
    		$result['total'] = count($tableConfig);
    		$result['msg'] ='表'.$tableName.'创建成功！';
    	}else{
    		$result['msg'] = '表'.$tableName.'创建失败！';
    	}
    	exit(json_encode($result));
    }
    //初始化站点配置项
    public function initWeb(){
    	if($_SESSION['SETUP']<5){
    		go(__CONTROL__.'/setConfig');
    	}
    	$_SESSION['SETUP'] = 6;
    	//压入配置项
    	C(include '../Admin/Config/dbConfig.php');
    	$webConfig = include './Data/webConfig.php';
    	$db = M('config');
    	foreach($webConfig as $k=>$v){
    		if($v['name'] =='adminemail'){
    			$webConfig[$k]['value'] =  $_SESSION['ADMIN']['email'];
    		}
    		if($v['name'] =='RBAC_SUPER_ADMIN'){
    			$webConfig[$k]['value'] = $_SESSION['ADMIN']['username'];
    		}
    		$db->add($webConfig[$k]);
    	}
    	$this->writeWebConfig($webConfig);
    	$userinfo = array();
    	$userinfo['username'] = $_SESSION['ADMIN']['username'];
    	$userinfo['nickname'] = $_SESSION['ADMIN']['username'];
    	$userinfo['password'] = md5($_SESSION['ADMIN']['password']);
    	$userinfo['email'] = $_SESSION['ADMIN']['email'];
    	$db->table('user')->add($userinfo);
    	$_SESSION = array();
    	$this->success('安装成功，自动跳转到后台登录！',dirname(__ROOT__).'/admin.php');
    }
    private function writeWebConfig($data){
    		$newArr = array();
			//对配置项进行循环
			foreach ($data as  $v) {

					$newArr[$v['name']] = $v['value'];

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
			file_put_contents('../Admin/Config/webConfig.php', $str);
    }
}
?>