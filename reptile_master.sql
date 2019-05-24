-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: reptile_master
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `reptile_link`
--

DROP TABLE IF EXISTS `reptile_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reptile_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web_id` int(11) NOT NULL,
  `link` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=401 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reptile_link`
--

LOCK TABLES `reptile_link` WRITE;
/*!40000 ALTER TABLE `reptile_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `reptile_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reptile_maintain`
--

DROP TABLE IF EXISTS `reptile_maintain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reptile_maintain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web_id` int(11) NOT NULL,
  `link` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reptile_maintain`
--

LOCK TABLES `reptile_maintain` WRITE;
/*!40000 ALTER TABLE `reptile_maintain` DISABLE KEYS */;
/*!40000 ALTER TABLE `reptile_maintain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reptile_web`
--

DROP TABLE IF EXISTS `reptile_web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reptile_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(191) NOT NULL,
  `rule` varchar(191) NOT NULL,
  `total` varchar(45) DEFAULT NULL,
  `sort` varchar(45) DEFAULT NULL,
  `title_rule` varchar(191) NOT NULL,
  `sort_rule` varchar(191) DEFAULT NULL,
  `content_rule` varchar(191) NOT NULL,
  `tag_rule` varchar(191) DEFAULT NULL,
  `date_rule` varchar(191) DEFAULT NULL,
  `username_rule` varchar(191) DEFAULT NULL,
  `api_type` varchar(70) DEFAULT NULL,
  `api` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(1) DEFAULT '1' COMMENT '1:即时采集，2：维护采集',
  `name` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reptile_web`
--

LOCK TABLES `reptile_web` WRITE;
/*!40000 ALTER TABLE `reptile_web` DISABLE KEYS */;
INSERT INTO `reptile_web` VALUES (2,'http://blog.chedushi.com/archives/category/php/page/(*)','.entry-header>h2>a&&&href','5','','.entry-header>h1&&&text','.entry-footer>.row>.cattegories>span>a&&&text','.post-content>.entry-content&&&html','.entry-footer>.row>.tags>span>a&&&text','.entry-date>a>time&&&datetime','','typecho','http://typecho.test/index.php/action/import_post',1,2,'PHP&Mysql');
/*!40000 ALTER TABLE `reptile_web` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-24  2:44:49
