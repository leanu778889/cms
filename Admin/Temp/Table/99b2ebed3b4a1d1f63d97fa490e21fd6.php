<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'uid' => 
  array (
    'field' => 'uid',
    'type' => 'int(10)',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'username' => 
  array (
    'field' => 'username',
    'type' => 'char(30)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'password' => 
  array (
    'field' => 'password',
    'type' => 'char(40)',
    'null' => 'YES',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'email' => 
  array (
    'field' => 'email',
    'type' => 'varchar(60)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
  'nickname' => 
  array (
    'field' => 'nickname',
    'type' => 'char(20)',
    'null' => 'NO',
    'key' => false,
    'default' => NULL,
    'extra' => '',
  ),
);
?>