-- MySQL dump 10.13  Distrib 5.6.35, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: zhuguangqian
-- ------------------------------------------------------
-- Server version	5.6.35-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,0,10,'2018-01-09 15:39:39修复问题',NULL),(2,0,10,'2018-01-09 15:39:39修复问题','20180109/2.txt'),(3,0,10,'2018-01-09 15:39:39修复问题','20180109/3.txt'),(4,0,10,'2018-01-09 15:39:39修复问题','20180109/4.txt'),(5,0,11,'2018-01-09 16:13:58修复问题','20180109/5.txt'),(6,0,11,'2018-01-09 16:19:41修复问题','20180109/6.txt'),(7,0,11,'2018-01-09 16:20:22修复问题','20180109/7.txt'),(8,0,11,'2018-01-09 16:24:48修复问题','20180109/8.txt'),(9,0,10,'2018-01-09 17:26:07修复问题','20180109/9.txt'),(10,0,10,'2018-01-09 17:26:07修复问题','20180109/10.txt'),(11,0,10,'2018-01-09 17:26:07修复问题','20180109/11.txt'),(12,16,11,'初始化你的项目为git仓库','20180109/12.txt'),(13,0,10,'初始化你的项目为git仓库','20180109/13.txt'),(14,0,11,'2018-01-09 22:35:04修复问题',NULL),(16,0,11,'2018-01-09 22:35:04修复问题','20180109/16.txt'),(17,0,11,'2018-01-09 22:35:04修复问题','20180109/17.txt'),(18,0,11,'2018-01-09 22:45:29修复问题','20180109/18.txt'),(19,0,11,'2018-01-09 22:45:29修复问题','20180109/19.txt'),(20,0,10,'2018-01-09 22:48:14修复问题','20180109/20.txt'),(21,0,11,'2018-01-09 22:48:56修复问题','20180109/21.txt'),(22,0,11,'2018-01-09 22:49:51修复问题','20180109/22.txt'),(23,0,11,'测试标题',NULL),(24,16,10,'MAMP PRO的mySQL启动失败','20180112/24.txt'),(25,0,13,'2018-01-12 15:14:19修复问题','20180112/25.txt'),(26,0,11,'2018-01-12 15:17:29修复问题','20180112/26.txt'),(27,0,14,'php的token认证功能','20180113/27.txt'),(28,16,11,'实现发布文章加米粒功能','20180117/28.txt'),(29,0,4,'123','20180131/29.txt');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cate`
--

DROP TABLE IF EXISTS `cate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cate`
--

LOCK TABLES `cate` WRITE;
/*!40000 ALTER TABLE `cate` DISABLE KEYS */;
INSERT INTO `cate` VALUES (1,0,'0',0,'诗歌'),(2,0,'0',0,'小说'),(3,0,'0',0,'散文'),(4,1,'0,1',0,'现代诗歌'),(5,4,'0,1,4',0,'现代诗歌分类编辑'),(6,1,'0,1',0,'叙事诗'),(7,0,'0',0,'善良者保护协会'),(8,0,'0',0,'完善建议'),(9,7,'0,7',0,'防诈骗攻略'),(10,0,'0',0,'技术'),(11,0,'0',0,'网站开发中'),(12,10,'0,10',0,'开发框架'),(13,12,'0,10,12',0,'laravel'),(14,10,'0,10',0,'php'),(15,0,'0',0,'123');
/*!40000 ALTER TABLE `cate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `rand` int(11) DEFAULT NULL,
  `mili` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '门客',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rand` (`rand`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','miluokou','',NULL,0,'门客'),(2,'123','123','',NULL,0,'门客'),(3,'1231','123','',NULL,0,'门客'),(4,'12','123','',NULL,0,'门客'),(5,'baocuo','123','',NULL,0,'门客'),(6,'123','12313','',NULL,0,'门客'),(7,'123123123','123','',NULL,0,'门客'),(8,'','','',NULL,0,'门客'),(9,'','','',NULL,0,'门客'),(10,'123','','',NULL,0,'门客'),(11,'12313','1231','',NULL,0,'门客'),(12,'米洛口','mmbb521','',NULL,0,'门客'),(13,'xinde','xinde','',NULL,0,'门客'),(14,'128','123','',NULL,0,'门客'),(15,'1215','1215','',0,0,'门客'),(16,'zhujiu','123','xUfD0kDt4ApCsEUWROsP855K0y88kAq8QhBORAzk',999,0,'统筹');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_detail`
--

DROP TABLE IF EXISTS `user_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_detail`
--

LOCK TABLES `user_detail` WRITE;
/*!40000 ALTER TABLE `user_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-13 16:51:29
