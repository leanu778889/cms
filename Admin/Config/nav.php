<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
	array(
		'name'=>'后台首页',
		'ico'=>'icon-home',
		'subnav'=>array(
			array(
			'url'=>U('SetUp/index'),
			'name'=>'网站信息设置'
			),
		)
	),
	array(
		'name'=>'分类管理',
		'ico'=>'icon-th-list',
		'subnav'=>array(
			array(
			'url'=>U('Category/index'),
			'name'=>'分类列表'
			),
			array(
			'url'=>U('Category/add'),
			'name'=>'添加分类'
			),
		)
	),
	array(
		'name'=>'导航管理',
		'ico'=>'icon-th-large',
		'subnav'=>array(
			array(
			'url'=>U('Nav/index'),
			'name'=>'导航列表'
			),
			array(
			'url'=>U('Nav/add'),
			'name'=>'添加导航'
			),
		)
	),
	array(
		'name'=>'标签管理',
		'ico'=>'icon-tags',
		'subnav'=>array(
			array(
			'url'=>U('Tag/index'),
			'name'=>'标签列表'
			),
			array(
			'url'=>U('Tag/add'),
			'name'=>'添加标签'
			),

		)
	),
	array(
		'name'=>'文章管理',
		'ico'=>'icon-file',
		'subnav'=>array(
			array(
			'url'=>U('News/index'),
			'name'=>'文章列表'
			),
			array(
			'url'=>U('News/add'),
			'name'=>'添加文章'
			),
			array(
			'url'=>U('News/recycle'),
			'name'=>'回收站管理'
			),
			array(
			'url'=>U('News/archives'),
			'name'=>'文章归档'
			),

		)
	),
	array(
		'name'=>'友情链接管理',
		'ico'=>'icon-magnet',
		'subnav'=>array(
			array(
			'url'=>U('Flink/index'),
			'name'=>'友情链接列表'
			),
			array(
			'url'=>U('Flink/add'),
			'name'=>'添加友情链接'
			),

		)
	),
	array(
		'name'=>'静态管理',
		'ico'=>'icon-briefcase',
		'subnav'=>array(
			array(
			'url'=>__ROOT__.'/index.php/Index/Html/index',
			'name'=>'首页静态生成'
			),
			array(
			'url'=>__ROOT__.'/index.php/Index/Html/category',
			'name'=>'列表页静态生成'
			),
			array(
			'url'=>__ROOT__.'/index.php/Index/Html/content',
			'name'=>'内容页静态生成'
			),

		)
	),
);
?>