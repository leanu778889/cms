<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
$dbConfig = include APP_PATH.'Config/dbConfig.php';
$webConfig = include APP_PATH.'Config/webConfig.php';
$CommonConfig = array(
	"DB_FIELD_CACHE"                => 1,           //字段缓存
    "DB_BACKUP"                     => ROOT_PATH . "backup/".time(), //数据库备份目录
    "RBAC_AUTH_KEY"                 => "uid",      //用户SESSION名
    "CHECK_FILE_CASE"               => 1,           //windows区分大小写
);
return array_merge($dbConfig,$webConfig,$CommonConfig);
?>