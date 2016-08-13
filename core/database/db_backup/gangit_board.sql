CREATE DATABASE  IF NOT EXISTS `gangit` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gangit`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: gangit
-- ------------------------------------------------------
-- Server version	5.1.54-community-log

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
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `board_id` int(6) NOT NULL AUTO_INCREMENT,
  `board_parent_id` int(6) DEFAULT '0',
  `board_text` varchar(20) NOT NULL,
  `board_date` datetime NOT NULL,
  `board_post_type` int(6) DEFAULT '0',
  `user_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`board_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (42,35,'asd','2016-04-22 15:35:30',3,1),(41,35,'asd','2016-04-22 15:34:08',3,1),(40,35,'Test pro redirect','2016-04-22 15:33:20',3,1),(39,31,'tetovaci pdkomentar','2016-04-18 22:13:30',3,1),(38,30,'testovaci komentar','2016-04-18 22:12:25',3,1),(37,36,'ALFA BETA GAMA','2016-04-18 22:11:02',3,1),(36,31,'PODkmentar','2016-04-18 22:03:47',3,1),(35,0,'test3','2016-04-17 01:43:25',2,1),(29,0,'text1','2016-04-09 21:26:48',2,1),(30,0,'text2','2016-04-09 21:39:14',2,1),(31,30,'koment k text2','2016-04-09 22:02:26',0,1),(32,30,'koment2 k text2','2016-04-09 22:05:47',3,1),(33,30,'koment3 k text2','2016-04-09 22:06:45',3,1),(34,29,'koment k text1','2016-04-16 20:19:28',3,1);
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-13 18:50:12
