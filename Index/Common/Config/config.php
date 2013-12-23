<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
$userConfig = include ROOT_PATH.'Admin/Config/webConfig.php';
$dbConfig = include ROOT_PATH.'Admin/Config/dbConfig.php';
//基本配置文件
$indexConfig =  array(
    "TPL_DIR"                       => ROOT_PATH."templates",       //模板目录
    "TPL_STYLE"                     => $userConfig['index_tpl_style'],          //风格
    "TPL_TAGS"                      => array("Navigation","NewsList","Flink",'NewsTags','Category'),     //扩展标签,多个标签用逗号分隔
);
return array_merge($dbConfig,$userConfig,$indexConfig);
?>