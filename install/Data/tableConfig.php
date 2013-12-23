<?php
return array (
  0 => 'CREATE TABLE `{tablePre}access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;',
  1 => 'CREATE TABLE `{tablePre}category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT \'分类表主键\',
  `cname` char(20) NOT NULL DEFAULT \'\' COMMENT \'分类名称\',
  `pid` smallint(6) NOT NULL COMMENT \'父级id\',
  `title` varchar(60) NOT NULL DEFAULT \'\' COMMENT \'分类标题\',
  `description` varchar(255) NOT NULL DEFAULT \'\' COMMENT \'分类描述\',
  `htmldir` char(20) NOT NULL DEFAULT \'\' COMMENT \'静态目录\',
  `keywords` varchar(120) NOT NULL DEFAULT \'\' COMMENT \'分类关键字\',
  `sort` smallint(5) unsigned NOT NULL DEFAULT \'0\' COMMENT \'分类排序\',
  `islisthtml` tinyint(4) NOT NULL DEFAULT \'0\' COMMENT \'列表页是否生成静态\',
  `isarchtml` tinyint(4) NOT NULL DEFAULT \'0\' COMMENT \'内容页是否生成静态\',
  `isshow` tinyint(3) unsigned NOT NULL DEFAULT \'1\' COMMENT \'是否显示\',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;',
  2 => 'CREATE TABLE `{tablePre}comment` (
  `news_id` int(10) unsigned NOT NULL COMMENT \'文章id\',
  `com_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT \'评论id\',
  `content` varchar(255) NOT NULL DEFAULT \'\' COMMENT \'评论内容\',
  `uid` int(10) unsigned NOT NULL COMMENT \'用户id\',
  `pid` int(10) unsigned NOT NULL COMMENT \'所属父级id\',
  `addtime` int(10) unsigned NOT NULL COMMENT \'评论时间\',
  `nickname` char(20) NOT NULL COMMENT \'昵称\',
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;',
  3 => 'CREATE TABLE `{tablePre}config` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT \'\',
  `title` char(30) NOT NULL DEFAULT \'\',
  `msg` varchar(255) NOT NULL DEFAULT \'\',
  `value` varchar(255) NOT NULL DEFAULT \'\',
  `type_id` tinyint(3) unsigned NOT NULL COMMENT \'配置项类型id\',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;',
  4 => 'CREATE TABLE `{tablePre}flink` (
  `fid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL DEFAULT \'\',
  `msg` varchar(60) NOT NULL DEFAULT \'\',
  `sort` smallint(6) NOT NULL DEFAULT \'0\',
  `addtime` int(10) unsigned NOT NULL DEFAULT \'0\',
  `logo` varchar(120) NOT NULL DEFAULT \'\',
  `isshow` tinyint(4) NOT NULL DEFAULT \'1\',
  `url` varchar(100) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;',
  5 => 'CREATE TABLE `{tablePre}navigation` (
  `nid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT \'\',
  `url` varchar(120) NOT NULL DEFAULT \'\',
  `opennew` tinyint(4) NOT NULL DEFAULT \'0\',
  `isshow` tinyint(4) NOT NULL DEFAULT \'1\',
  `sort` smallint(6) NOT NULL DEFAULT \'0\',
  `site` tinyint(4) NOT NULL DEFAULT \'1\',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;',
  6 => 'CREATE TABLE `{tablePre}news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL DEFAULT \'\' COMMENT \'文章标题\',
  `click` int(11) NOT NULL COMMENT \'查看数\',
  `addtime` int(11) NOT NULL COMMENT \'发布时间\',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thumb` varchar(100) NOT NULL DEFAULT \'\' COMMENT \'缩率图\',
  `recycled` tinyint(4) NOT NULL DEFAULT \'0\' COMMENT \'回收站标示\',
  `digest` varchar(255) NOT NULL DEFAULT \'\' COMMENT \'文章摘要\',
  `category_cid` smallint(5) unsigned NOT NULL COMMENT \'分类id\',
  `user_id` int(10) unsigned NOT NULL COMMENT \'用户id\',
  `attr` set(\'图文\',\'推荐\',\'热门\',\'置顶\') DEFAULT NULL COMMENT \'文章属性\',
  `author` char(20) DEFAULT \'admin\',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1872 DEFAULT CHARSET=utf8;',
  7 => 'CREATE TABLE `{tablePre}news_data` (
  `keywords` varchar(120) NOT NULL DEFAULT \'\',
  `description` varchar(255) NOT NULL DEFAULT \'\',
  `body` text,
  `news_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
  8 => 'CREATE TABLE `{tablePre}node` (
  `nid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `state` tinyint(1) DEFAULT \'1\',
  `des` char(255) DEFAULT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT \'100\',
  `pid` smallint(5) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `level` (`level`),
  KEY `state` (`state`),
  KEY `pid` (`pid`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;',
  9 => 'CREATE TABLE `{tablePre}role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) DEFAULT NULL,
  `pid` smallint(5) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;',
  10 => 'CREATE TABLE `{tablePre}tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` char(20) NOT NULL DEFAULT \'\' COMMENT \'标签名称\',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;',
  11 => 'CREATE TABLE `{tablePre}tag_news` (
  `news_id` int(10) unsigned NOT NULL DEFAULT \'0\',
  `tag_tid` smallint(5) unsigned NOT NULL DEFAULT \'0\',
  `category_cid` smallint(5) unsigned NOT NULL DEFAULT \'0\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;',
  12 => 'CREATE TABLE `{tablePre}user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `email` varchar(60) NOT NULL DEFAULT \'\',
  `nickname` char(20) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;',
  13 => 'CREATE TABLE `{tablePre}user_role` (
  `uid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  KEY `uid` (`uid`),
  KEY `nid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;',
);		