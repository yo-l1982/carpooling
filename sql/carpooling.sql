-- MySQL dump 10.13  Distrib 5.1.37, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: carpooling
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5.1

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
-- Current Database: `carpooling`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `carpooling` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `carpooling`;

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `game` varchar(200) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `password` varchar(30) NOT NULL,
  `seats` int(11) NOT NULL,
  `meetingpoint` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver`
--

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` VALUES (1,'','','','00:00:00','0000-00-00','','','',0,''),(2,'','','','00:00:00','0000-00-00','','','',0,''),(3,'','','','00:00:00','0000-00-00','','','',0,''),(4,'','','','00:00:00','0000-00-00','','','',0,''),(5,'joel','201389 1238','joel.bernerman@gmail.com','13:00:00','2010-03-22','','sadjlksadkn','ewrewr',2,''),(6,'','','','00:00:00','0000-00-00','','','',0,''),(7,'','','','00:00:00','0000-00-00','','','',0,''),(8,'w','sad','joel.bernerman@gmail.com','00:00:02','2010-01-05','','sda','asdss',12,'dsf'),(9,'','','','00:00:00','0000-00-00','','','',0,''),(10,'sdf','sdfdsf','awdasd','00:00:05','2010-01-05','joel.bernerman@gmail.com','dsfdsf','adsfas',3,'asdasd'),(11,'','','','00:00:00','0000-00-00','','','',0,''),(12,'asdasd','asdsad','asdasdasd','00:01:23','2010-01-05','asdasd','asdasd','sadasd',2,'asdas'),(13,'','','','00:00:00','0000-00-00','','','',0,''),(14,'asdasd','asdasd','asdasd','00:00:04','2010-01-05','asdasd','asdasd','asdasd',2,'asdas'),(15,'asd','asd','asdasd','00:00:04','2010-01-05','asdasd','asd','asdasd',3,'asdas'),(16,'','','','00:00:00','0000-00-00','','','',0,''),(17,'','','','00:00:00','0000-00-00','','','',0,''),(18,'asd','asd','dasd','00:00:00','0000-00-00','asd','asd','asd',0,'dasd'),(19,'','','','00:00:00','0000-00-00','','','',0,''),(20,'','','','00:00:00','0000-00-00','','','',0,''),(21,'','','','00:00:00','0000-00-00','','','',0,''),(22,'','','','00:00:00','0000-00-00','','','',0,''),(23,'','','','00:00:00','0000-00-00','','','',0,''),(24,'','','','00:00:00','0000-00-00','','','',0,''),(25,'','','','00:00:00','0000-00-00','','','',0,''),(26,'','','','00:00:00','0000-00-00','','','',0,''),(27,'','','','00:00:00','0000-00-00','','','',0,''),(28,'','','','00:00:00','0000-00-00','','','',0,''),(29,'','','','00:00:00','0000-00-00','','','',0,''),(30,'','','','00:00:00','0000-00-00','','','',0,''),(31,'','','','00:00:00','0000-00-00','','','',0,''),(32,'','','','00:00:00','0000-00-00','','','',0,''),(33,'','','','00:00:00','0000-00-00','','','',0,''),(34,'','','','00:00:00','0000-00-00','','','',0,''),(35,'','','','00:00:00','0000-00-00','','','',0,''),(36,'Joel Bernerman','0303 2241 22','Elfsborg','13:00:00','2008-01-01','joel@gmail.com','VI mÃ¶ts pÃ¥ triangeln','',3,'MalmÃ¶'),(37,'','','','00:00:00','0000-00-00','','','',0,''),(38,'','','','00:00:00','0000-00-00','','','',0,''),(39,'','','','00:00:00','0000-00-00','','','',0,''),(40,'','','','00:00:00','0000-00-00','','','',0,''),(41,'','','','00:00:00','0000-00-00','','','',0,''),(42,'','','','00:00:00','0000-00-00','','','',0,'');
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver_passenger`
--

DROP TABLE IF EXISTS `driver_passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver_passenger` (
  `id` int(11) NOT NULL,
  `drivers_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver_passenger`
--

LOCK TABLES `driver_passenger` WRITE;
/*!40000 ALTER TABLE `driver_passenger` DISABLE KEYS */;
/*!40000 ALTER TABLE `driver_passenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hometeam` varchar(45) NOT NULL,
  `awayteam` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'ifk','halstad','2101-01-01','19:00:00'),(2,'ifk','halstad','2101-01-01','19:00:00'),(3,'ifk','halstad','2101-01-01','19:00:00'),(4,'ifk','halstad','2101-01-01','19:00:00'),(5,'ifk','halstad','2101-01-01','19:00:00'),(6,'ifk','halstad','2101-01-01','19:00:00'),(7,'ifk','halstad','2101-01-01','19:00:00'),(8,'ifk','halstad','2101-01-01','19:00:00'),(9,'ifk','halstad','2101-01-01','19:00:00'),(10,'ifk','halstad','2101-01-01','19:00:00'),(11,'ifk','halstad','2101-01-01','19:00:00'),(12,'ifk','halstad','2101-01-01','19:00:00'),(13,'ifk','halstad','2101-01-01','19:00:00');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passenger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger`
--

LOCK TABLES `passenger` WRITE;
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
INSERT INTO `passenger` VALUES (1,'asd','asd','asd','asd'),(2,'sadasd','asdasd','asdasd','asdasd'),(3,'asdasd','sadasd','sadasd','asdsad'),(4,'asdasd','sadasd','asdasd','asdasd'),(5,'Yo-Ldsc','as','asd','dsa');
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-02-26 17:11:36
