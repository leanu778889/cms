<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'id' => 
  array (
    'field' => 'id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'varchar(120)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'click' => 
  array (
    'field' => 'click',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'addtime' => 
  array (
    'field' => 'addtime',
    'type' => 'int(11)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'updatetime' => 
  array (
    'field' => 'updatetime',
    'type' => 'timestamp',
    'null' => 'NO',
    'key' => false,
    'default' => 'CURRENT_TIMESTAMP',
    'extra' => 'on update CURRENT_TIMESTAMP',
  ),
  'thumb' => 
  array (
    'field' => 'thumb',
    'type' => 'varchar(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'recycled' => 
  array (
    'field' => 'recycled',
    'type' => 'tinyint(4)',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'digest' => 
  array (
    'field' => 'digest',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
  'category_cid' => 
  array (
    'field' => 'category_cid',
    'type' => 'smallint(5) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'user_id' => 
  array (
    'field' => 'user_id',
    'type' => 'int(10) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'attr' => 
  array (
    'field' => 'attr',
    'type' => 'set(\'图文\',\'推荐\',\'热门\',\'置顶\')',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'author' => 
  array (
    'field' => 'author',
    'type' => 'char(20)',
    'null' => 'YES',
    'key' => false,
    'default' => 'admin',
    'extra' => '',
  ),
);
?>