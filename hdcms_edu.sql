-- MySQL dump 10.13  Distrib 5.5.24, for Win32 (x86)
--
-- Host: localhost    Database: hdcms_edu
-- ------------------------------------------------------
-- Server version	5.5.24-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hd_access`
--

DROP TABLE IF EXISTS `hd_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_access` (
  `rid` smallint(5) unsigned NOT NULL,
  `nid` smallint(5) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `gid` (`rid`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_access`
--

LOCK TABLES `hd_access` WRITE;
/*!40000 ALTER TABLE `hd_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_category`
--

DROP TABLE IF EXISTS `hd_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类表主键',
  `cname` char(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` smallint(6) NOT NULL COMMENT '父级id',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '分类标题',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '分类描述',
  `htmldir` char(20) NOT NULL DEFAULT '' COMMENT '静态目录',
  `keywords` varchar(120) NOT NULL DEFAULT '' COMMENT '分类关键字',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类排序',
  `islisthtml` tinyint(4) NOT NULL DEFAULT '0' COMMENT '列表页是否生成静态',
  `isarchtml` tinyint(4) NOT NULL DEFAULT '0' COMMENT '内容页是否生成静态',
  `isshow` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_category`
--

LOCK TABLES `hd_category` WRITE;
/*!40000 ALTER TABLE `hd_category` DISABLE KEYS */;
INSERT INTO `hd_category` VALUES (13,'文字',0,'文字','文字描述','wenzi','文字关键字',1,0,0,1),(14,'有声',0,'有声','有声描述','yousheng','有声关键字',2,0,0,1),(15,'图片',0,'图片','图片描述','tupian','图片关键字',3,0,0,1),(16,'趣事',0,'趣事','趣事描述','qushi','趣事关键字',4,0,0,1),(17,'视频',0,'视频','视频描述','shipin','视频关键字',5,0,0,1),(20,'抒情',13,'抒情','抒情','shuqing','抒情',1,1,1,1);
/*!40000 ALTER TABLE `hd_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_comment`
--

DROP TABLE IF EXISTS `hd_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_comment` (
  `news_id` int(10) unsigned NOT NULL COMMENT '文章id',
  `com_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `pid` int(10) unsigned NOT NULL COMMENT '所属父级id',
  `addtime` int(10) unsigned NOT NULL COMMENT '评论时间',
  `nickname` char(20) NOT NULL COMMENT '昵称',
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_comment`
--

LOCK TABLES `hd_comment` WRITE;
/*!40000 ALTER TABLE `hd_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_config`
--

DROP TABLE IF EXISTS `hd_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_config` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '',
  `title` char(30) NOT NULL DEFAULT '',
  `msg` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  `type_id` tinyint(3) unsigned NOT NULL COMMENT '配置项类型id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_config`
--

LOCK TABLES `hd_config` WRITE;
/*!40000 ALTER TABLE `hd_config` DISABLE KEYS */;
INSERT INTO `hd_config` VALUES (1,'webname','网站名称','网站名称','后盾cms教学',1),(2,'adminemail','站长邮箱','站长邮箱','admin123@admin.com',1),(3,'copy','版权信息','网站版权信息','教学demo',1),(4,'CODE_WIDTH','验证码宽度','验证码宽度','150',2),(5,'CODE_HEIGHT','验证码高度','验证码高度','35',2),(6,'CODE_LEN','验证码长度','验证码长度','4',2),(7,'CODE_FONT_SIZE','验证码字体大小','验证码字体大小','22',2),(8,'CODE_FONT_COLOR','验证码背景','验证码背景','#333',2),(9,'WATER_ON','水印开关','水印开关','0',3),(10,'WATER_FONT','水印字体','水印字体','E:/wamp/www/11.11/hdphp/Data/Font/font.ttf ',3),(11,'WATER_IMG','水印图像','水印图像','E:/wamp/www/11.11/hdphp/Data/Image/water.png',3),(12,'WATER_POS','水印位置','水印位置','9',3),(13,'WATER_PCT','水印透明度','水印透明度','60',3),(14,'WATER_QUALITY','水印压缩质量','水印压缩质量','80',3),(15,'WATER_TEXT','水印文字','水印文字','WWW.HOUDUNWANG.COM',3),(16,'WATER_TEXT_COLOR','水印文字颜色','水印文字颜色','#f00f00',3),(17,'WATER_TEXT_SIZE','水印文字大小','水印文字大小','12',3),(20,'THUMB_TYPE','生成缩略图方式','生成缩略图方式','6',4),(21,'THUMB_SIZE','缩略图尺寸','缩略图尺寸','300,300,100,100',4),(22,'THUMB_PATH','缩略图路径','缩略图路径','E:/wamp/www/11.11/install/upload/thumb',4),(23,'index_tpl_style','模板风格','指定前台模板风格目录','default',1),(24,'RBAC_SUPER_ADMIN','超级管理员','不受任何限制操作后台','admin999',1);
/*!40000 ALTER TABLE `hd_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_flink`
--

DROP TABLE IF EXISTS `hd_flink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_flink` (
  `fid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL DEFAULT '',
  `msg` varchar(60) NOT NULL DEFAULT '',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `logo` varchar(120) NOT NULL DEFAULT '',
  `isshow` tinyint(4) NOT NULL DEFAULT '1',
  `url` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_flink`
--

LOCK TABLES `hd_flink` WRITE;
/*!40000 ALTER TABLE `hd_flink` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_flink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_navigation`
--

DROP TABLE IF EXISTS `hd_navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_navigation` (
  `nid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '',
  `url` varchar(120) NOT NULL DEFAULT '',
  `opennew` tinyint(4) NOT NULL DEFAULT '0',
  `isshow` tinyint(4) NOT NULL DEFAULT '1',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `site` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_navigation`
--

LOCK TABLES `hd_navigation` WRITE;
/*!40000 ALTER TABLE `hd_navigation` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_news`
--

DROP TABLE IF EXISTS `hd_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '文章标题',
  `click` int(11) NOT NULL COMMENT '查看数',
  `addtime` int(11) NOT NULL COMMENT '发布时间',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩率图',
  `recycled` tinyint(4) NOT NULL DEFAULT '0' COMMENT '回收站标示',
  `digest` varchar(255) NOT NULL DEFAULT '' COMMENT '文章摘要',
  `category_cid` smallint(5) unsigned NOT NULL COMMENT '分类id',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `attr` set('图文','推荐','热门','置顶') DEFAULT NULL COMMENT '文章属性',
  `author` char(20) DEFAULT 'admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1874 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_news`
--

LOCK TABLES `hd_news` WRITE;
/*!40000 ALTER TABLE `hd_news` DISABLE KEYS */;
INSERT INTO `hd_news` VALUES (1872,'我以为我忘了',26,1385308947,'2013-11-25 00:52:03','upload/49371385308935.jpg',0,'我以为，早已把你忘记。也许能骗的了别人，却骗不了自己。好多年过去了，我还是没有把你忘记。',13,5,'推荐,热门','admin999'),(1873,' 爱得最深往往也就是将尽时',2,1385310758,'2013-11-25 00:52:10','upload/35111385310756.jpg',0,'爱得最深往往也就是将尽时',13,5,'推荐,置顶','admin999');
/*!40000 ALTER TABLE `hd_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_news_data`
--

DROP TABLE IF EXISTS `hd_news_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_news_data` (
  `keywords` varchar(120) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `body` text,
  `news_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_news_data`
--

LOCK TABLES `hd_news_data` WRITE;
/*!40000 ALTER TABLE `hd_news_data` DISABLE KEYS */;
INSERT INTO `hd_news_data` VALUES ('我以为我忘了','我以为我忘了','<div class=\"entry-content\" style=\"width:630px;float:left;\">\r\n	<p>\r\n		我以为，早已把你忘记。也许能骗的了别人，却骗不了自己。好多年过去了，我还是没有把你忘记。<br />\r\n<span id=\"more-238731\"></span><br />\r\n原来，你就是我一生中最爱的人。原来，在这个世界上我只为你动了心，动了情。\r\n	</p>\r\n	<p>\r\n		无论我怎么努力，我都无法把你忘记。因为你是那么温柔的一个人，让我忘不了。\r\n	</p>\r\n	<p>\r\n		忘不了与你的相遇，忘不了你对我的温柔，更忘不了你的微笑。你的一切，都深深的记在了我的脑海里，挥之不去。\r\n	</p>\r\n	<p>\r\n		爱到深处无言，情到深处无缘。爱一个人爱的有多深，才知道有多么的痛苦。\r\n	</p>\r\n	<div class=\"boxparagraph\">\r\n		当我离开了你，我才知道我有多么的想你。\r\n		<p>\r\n			当我离开了你，我才知道我有多么的爱你。\r\n		</p>\r\n		<p>\r\n			当我离开了你，我才知道你对我有多么的重要。<br />\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/185.jpg\"><img height=\"345\" width=\"227\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/185.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/uploads/2013/11/185.jpg\" alt=\"1\" class=\"lazy alignright size-full wp-image-238749 data-lazy-ready\" style=\"display:block;\" /></a>\r\n		</p>\r\n		<noscript>\r\n			<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/185.jpg\"><img class=\"alignright size-full wp-image-238749\" alt=\"1\" src=\"http://www.fqpai.com/wp-content/uploads/2013/11/185.jpg\" width=\"227\" height=\"345\" /></a>\r\n		</noscript>\r\n<br />\r\n如果时间可以回到从前，如果一切都可以挽回，如果用我现在的一切可以换回你，我会毫不犹豫的去做。\r\n		<p>\r\n			<br />\r\n		</p>\r\n		<p>\r\n			可是，我知道我们再也无法回到从前，我们的一切都不可能挽回，而我的一切更不能把你换回。\r\n		</p>\r\n		<p>\r\n			明知道这一切，都是不可能的。我却还傻傻的等待着。等待着一个奇迹的出现，等待着你再次来到我的身边。\r\n		</p>\r\n		<p>\r\n			很多人，很多事，只有错过了才懂得珍惜，才懂得珍贵。失去了你，我才知道你对我来说有多么的重要。\r\n		</p>\r\n		<p>\r\n			时间就在不知不觉中过去了，而当我回过头来，才知道我离开了好久，好久。\r\n		</p>\r\n		<p>\r\n			还没有来的及回忆，你早就成为了过去，一个遥远的过去。是我所不知道的回忆，是我所不知道的世界。\r\n		</p>\r\n		<p>\r\n			如今，我的世界不再有你。而你的世界，也不再有我。本来两个相爱的人，此刻却成为了最熟悉的陌生人。\r\n		</p>\r\n	</div>\r\n	<p>\r\n		我知道，遗憾我把你错过。拥有的时候，就不懂得珍惜。当错过了一份真情，才知道有多么的舍不的。\r\n	</p>\r\n	<p>\r\n		我时常的幻想着一个奇迹，明知道不可能的，却变成了一种奢侈。我无法控制对你的思念，却假装一切都不在乎。\r\n	</p>\r\n	<p>\r\n		痛不痛，只有真正爱过的人才知道。每当夜深人静的时候我总是会把你想起，每当我伤心的时候也总会想起你。\r\n	</p>\r\n	<p>\r\n		你总是在我最需要的时候出现，尽管我们不在一个城市，你却能从千里之外把你的关怀，把你的祝福送到我的身边。\r\n	</p>\r\n	<p>\r\n		我能感觉到你的存在，我知道你希望我过的幸福。我又何尝不是希望你能幸福呢！\r\n	</p>\r\n	<p>\r\n		不愿让你知道的事情，你总是会知道。每次你总会开导我，让我走出迷茫。\r\n	</p>\r\n	<p>\r\n		现在的你对我来说，不止是我爱的人，也是我的老师。你就想一个指明灯，为我在黑暗的夜里，带来了光明，也带来了希望。\r\n	</p>\r\n	<p>\r\n		<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/184.jpg\"><img height=\"332\" width=\"500\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/184.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/uploads/2013/11/184.jpg\" alt=\"18\" class=\"lazy aligncenter size-full wp-image-238698 data-lazy-ready\" style=\"display:inline;\" /></a>\r\n	</p>\r\n	<noscript>\r\n		<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/184.jpg\"><img class=\"aligncenter size-full wp-image-238698\" alt=\"18\" src=\"http://www.fqpai.com/wp-content/uploads/2013/11/184.jpg\" width=\"500\" height=\"332\" /></a>\r\n	</noscript>\r\n<br />\r\n好几次，我也告诉自己，不要再想了。他只是关心你，只是希望你幸福，如此的简单而已。\r\n	<p>\r\n		<br />\r\n	</p>\r\n	<p>\r\n		好几次，我也告诉自己要放弃，不要有非分之想。可是，我发现我做不到。\r\n	</p>\r\n	<p>\r\n		好几次，我也想鼓起勇气告诉你，我一直都深爱着你。不知道，我们还能不能走到一起。\r\n	</p>\r\n	<p>\r\n		可是，我始终都没有勇气。因为我曾伤害了一个这么深爱我的你。在我的心里，我一直都对你有歉意。\r\n	</p>\r\n	<p>\r\n		我知道，错过了你，是我这辈子最大的代价。我再也不会遇到这么深爱我的你。\r\n	</p>\r\n	<p>\r\n		也许我再也不会遇到一个这样的你，一个让我无法忘记，一个走进我的心里。\r\n	</p>\r\n	<p>\r\n		此刻，我才知道我这辈子真的完了。因为我发现你已经占据了我所有的心，我再也装不下任何人。\r\n	</p>\r\n	<p>\r\n		这个世界上，除了你再也没有任何人走进我的心里。我多想鼓起勇气告诉你，你一直都在我的心里，我一直都没有把你忘记。\r\n	</p>\r\n	<p>\r\n		可是，我真的能这样做吗？我发现我不能，因为我不能太自私。我已经伤害了你一次，不能再伤害你一次。\r\n	</p>\r\n	<p>\r\n		如果能回到从前，如果一切都还有挽回，我愿意与你走在一起，我愿意与你在一起。\r\n	</p>\r\n	<p>\r\n		我再也不会胡思乱想，我再也不会看任何人的眼光。因为我只想做真实的自己，我只想与你在一起。\r\n	</p>\r\n	<p>\r\n		如果爱一个人掺杂了杂念，你就会失去一个人。爱是这个世界上最幸福的一件事情，千万不要把爱当成一个工具，或者是一个借口。\r\n	</p>\r\n	<p>\r\n		当我明白一件事情的时候，我才知道晚了，迟了。因为时间再也回不去，我再也找不回曾经拥有的一切。\r\n	</p>\r\n	<p>\r\n		如今的我，也觉得自己很幸福。尽管知道我与他不可能再走到一起，我也很感谢他。\r\n	</p>\r\n	<p>\r\n		因为他，让我明白了什么是爱。\r\n	</p>\r\n	<p>\r\n		因为他，我才知道我爱的有多深。\r\n	</p>\r\n	<p>\r\n		因为他，我才知道我是这个世界上幸福的人。\r\n	</p>\r\n	<div class=\"box\">\r\n		<h4>\r\n		</h4>\r\n<span style=\"color:#ff99cc;\">爱一个人不是占有，而是付出。</span> \r\n		<p>\r\n			<span style=\"color:#ff99cc;\">爱一个人是不要回报的，只是希望他幸福。</span>\r\n		</p>\r\n		<p>\r\n			<span style=\"color:#ff99cc;\">爱一个人不是随便说说，而是要用心去做。</span>\r\n		</p>\r\n		<p>\r\n			<span style=\"color:#ff99cc;\">爱一个人，缘深缘浅都要珍惜。</span>\r\n		</p>\r\n		<p>\r\n			<span style=\"color:#ff99cc;\">爱一个人，剪不断的思念，剪不断的关怀。</span>\r\n		</p>\r\n	</div>\r\n	<p>\r\n		你是我最美好的时光，你是我最完美的爱，你是我永远的关怀。\r\n	</p>\r\n	<p>\r\n		我永远都不会忘记你，因为你让我如此的幸福。\r\n	</p>\r\n	<p>\r\n		爱一个人无怨无悔，我真的为自己高兴。因为我是真的爱过，为你爱过。\r\n	</p>\r\n	<p>\r\n		如今，我不会再哭。因为我知道，始终在遥远的地方，有一个人也向我一样思念着，祝福着。\r\n	</p>\r\n	<p>\r\n		如今，我想对你说，遇上你，让我如此的幸福，让我如此的快乐。我会珍惜与你在一起的时光。\r\n	</p>\r\n	<p>\r\n		如今，我不再奢望。我只希望你能幸福，你能快乐，如此的简单而已。只要你幸福，我就会很快乐。\r\n	</p>\r\n	<p>\r\n		因为你，我成为了这个世界上最幸福的人。我感谢与你在一起的日子，尽管很短暂，却成为了我永远最美的回忆。\r\n	</p>\r\n<!--end of entry content -->\r\n</div>',1872),('爱得最深往往也就是将尽时','爱得最深往往也就是将尽时','<div class=\"entry-content\">\r\n                    <p>爱一个人总是从不知不觉开始，风平浪静甜甜蜜蜜，难以抽空学习研读“幸福”这两个字。到大势渐去，力挽狂澜时才知道当时不只是寻常。爱得最深往往也就是将尽时。<br>\r\n<span id=\"more-238718\"></span><br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/51.jpg\"><img height=\"331\" width=\"500\" class=\"lazy aligncenter size-full wp-image-238719 data-lazy-ready\" alt=\"51\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/51.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/uploads/2013/11/51.jpg\" style=\"display: inline;\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/51.jpg\" alt=\"51\" width=\"500\" height=\"331\" class=\"aligncenter size-full wp-image-238719\" /&gt;</noscript></a><br>\r\n夕阳西下，是我最想念的时候，对着你在的那个城市，说了一声：我想你，不知道，你是否听得到<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/52.jpg\"><img height=\"500\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238720 data-lazy-ready\" alt=\"52\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/52.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/52.jpg\" alt=\"52\" width=\"500\" height=\"500\" class=\"aligncenter size-full wp-image-238720\" /&gt;</noscript></a><br>\r\n最好的时光，就是你喜欢我，我也喜欢你，可我们都还没表白。<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/53.jpg\"><img height=\"406\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238721 data-lazy-ready\" alt=\"53\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/53.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/53.jpg\" alt=\"53\" width=\"500\" height=\"406\" class=\"aligncenter size-full wp-image-238721\" /&gt;</noscript></a><br>\r\n这个世界上，有些人有多冷漠，有些人就有多温暖，希望你总会遇到那些温暖对你的人。<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/54.jpg\"><img height=\"333\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238722 data-lazy-ready\" alt=\"54\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/54.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/54.jpg\" alt=\"54\" width=\"500\" height=\"333\" class=\"aligncenter size-full wp-image-238722\" /&gt;</noscript></a><br>\r\n相信上天的旨意，发生在这世界上的事情没有一样是出于偶然，终有一天这一切都会有一个解释。<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/55.jpg\"><img height=\"364\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238723 data-lazy-ready\" alt=\"55\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/55.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/55.jpg\" alt=\"55\" width=\"500\" height=\"364\" class=\"aligncenter size-full wp-image-238723\" /&gt;</noscript></a><br>\r\n我不贪心，只有一个小小的愿望：生命中永远有你。<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/56.jpg\"><img height=\"493\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238724 data-lazy-ready\" alt=\"56\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/56.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/56.jpg\" alt=\"56\" width=\"500\" height=\"493\" class=\"aligncenter size-full wp-image-238724\" /&gt;</noscript></a><br>\r\n我希望有这么一个人，不嫌弃我的坏脾气，不嫌弃我的坏习惯，不嫌弃我的家境怎样，始终站在我身边，一不小心就白头到老了。<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/57.jpg\"><img height=\"330\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238725 data-lazy-ready\" alt=\"57\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/57.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/57.jpg\" alt=\"57\" width=\"500\" height=\"330\" class=\"aligncenter size-full wp-image-238725\" /&gt;</noscript></a><br>\r\n生命太短，没留时间给我们每日带着遗憾醒来。所以去爱那些对你好的人，忘掉那些不知珍惜你的人。<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/58.jpg\"><img height=\"333\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238726 data-lazy-ready\" alt=\"58\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/58.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/58.jpg\" alt=\"58\" width=\"500\" height=\"333\" class=\"aligncenter size-full wp-image-238726\" /&gt;</noscript></a><br>\r\n不要期待，不要假想，不要强求，顺其自然，如果注定，便一定会发生。<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/59.jpg\"><img height=\"338\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238727 data-lazy-ready\" alt=\"59\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/59.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/59.jpg\" alt=\"59\" width=\"500\" height=\"338\" class=\"aligncenter size-full wp-image-238727\" /&gt;</noscript></a><br>\r\n我想我怀念的不止是你，还有在那段时光里穿梭而行的自己。 .<br>\r\n<a href=\"http://www.fqpai.com/wp-content/uploads/2013/11/60.jpg\"><img height=\"333\" width=\"500\" class=\"lazy lazy-hidden aligncenter size-full wp-image-238728 data-lazy-ready\" alt=\"60\" data-lazy-src=\"http://www.fqpai.com/wp-content/uploads/2013/11/60.jpg\" data-lazy-type=\"image\" src=\"http://www.fqpai.com/wp-content/plugins/bj-lazy-load/img/placeholder.gif\"><noscript>&lt;img src=\"http://www.fqpai.com/wp-content/uploads/2013/11/60.jpg\" alt=\"60\" width=\"500\" height=\"333\" class=\"aligncenter size-full wp-image-238728\" /&gt;</noscript></a><br>\r\n我笑，便面如春花，定是能感动人的，任他是谁。</p>\r\n                                    <!--end of entry content -->\r\n                </div>',1873);
/*!40000 ALTER TABLE `hd_news_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_node`
--

DROP TABLE IF EXISTS `hd_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_node` (
  `nid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1',
  `des` char(255) DEFAULT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '100',
  `pid` smallint(5) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `level` (`level`),
  KEY `state` (`state`),
  KEY `pid` (`pid`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_node`
--

LOCK TABLES `hd_node` WRITE;
/*!40000 ALTER TABLE `hd_node` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_role`
--

DROP TABLE IF EXISTS `hd_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_role` (
  `rid` smallint(5) NOT NULL AUTO_INCREMENT,
  `rname` char(60) DEFAULT NULL,
  `pid` smallint(5) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `gid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_role`
--

LOCK TABLES `hd_role` WRITE;
/*!40000 ALTER TABLE `hd_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_tag`
--

DROP TABLE IF EXISTS `hd_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` char(20) NOT NULL DEFAULT '' COMMENT '标签名称',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_tag`
--

LOCK TABLES `hd_tag` WRITE;
/*!40000 ALTER TABLE `hd_tag` DISABLE KEYS */;
INSERT INTO `hd_tag` VALUES (39,'温柔'),(40,'犹豫'),(41,'痛苦'),(42,'重要');
/*!40000 ALTER TABLE `hd_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_tag_news`
--

DROP TABLE IF EXISTS `hd_tag_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_tag_news` (
  `news_id` int(10) unsigned NOT NULL DEFAULT '0',
  `tag_tid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `category_cid` smallint(5) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_tag_news`
--

LOCK TABLES `hd_tag_news` WRITE;
/*!40000 ALTER TABLE `hd_tag_news` DISABLE KEYS */;
INSERT INTO `hd_tag_news` VALUES (1872,39,13),(1872,40,13),(1872,41,13),(1872,42,13),(1873,40,13),(1873,41,13);
/*!40000 ALTER TABLE `hd_tag_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user`
--

DROP TABLE IF EXISTS `hd_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `username` char(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `nickname` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user`
--

LOCK TABLES `hd_user` WRITE;
/*!40000 ALTER TABLE `hd_user` DISABLE KEYS */;
INSERT INTO `hd_user` VALUES (5,'admin999','202cb962ac59075b964b07152d234b70','admin123@admin.com','admin999');
/*!40000 ALTER TABLE `hd_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hd_user_role`
--

DROP TABLE IF EXISTS `hd_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hd_user_role` (
  `uid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  KEY `uid` (`uid`),
  KEY `nid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hd_user_role`
--

LOCK TABLES `hd_user_role` WRITE;
/*!40000 ALTER TABLE `hd_user_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `hd_user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-16 21:01:01
