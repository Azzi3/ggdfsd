CREATE DATABASE  IF NOT EXISTS `lia-projekt` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci */;
USE `lia-projekt`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: lia-projekt
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `street_address` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `zip_code` int(5) NOT NULL,
  `city` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `website_url` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `id_contact_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (2,'GoBrave','Nygatan 8',12345,'växjö','www.gobrave.se','hej hå',1),(3,'Fortnox','Framtidsvägen',12344,'växjö','www.fortnox.se','Jobbar o sliter',1),(4,'Standout','Rossgatan',1234,'växjö','standout.com','hej hoppp',2);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_tag`
--

DROP TABLE IF EXISTS `company_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_tag`
--

LOCK TABLES `company_tag` WRITE;
/*!40000 ALTER TABLE `company_tag` DISABLE KEYS */;
INSERT INTO `company_tag` VALUES (1,2,1),(2,2,2),(3,3,3),(4,4,1),(5,4,2);
/*!40000 ALTER TABLE `company_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kommun`
--

DROP TABLE IF EXISTS `kommun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kommun` (
  `kommun_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `lan_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`kommun_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=56;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kommun`
--

LOCK TABLES `kommun` WRITE;
/*!40000 ALTER TABLE `kommun` DISABLE KEYS */;
INSERT INTO `kommun` VALUES (1,'Karlshamns kommun',1),(2,'Karlskrona kommun',1),(3,'Olofströms kommun',1),(4,'Ronneby kommun',1),(5,'Sölvesborgs kommun',1),(6,'Avesta kommun',2),(7,'Borlänge kommun',2),(8,'Falu kommun',2),(9,'Gagnefs kommun',2),(10,'Hedemora kommun',2),(11,'Leksands kommun',2),(12,'Ludvika kommun',2),(13,'Malungs kommun',2),(14,'Mora kommun',2),(15,'Orsa kommun',2),(16,'Rättviks kommun',2),(17,'Smedjebackens kommun',2),(18,'Säters kommun',2),(19,'Vansbro kommun',2),(20,'Älvdalens kommun',2),(21,'Gotlands kommun',3),(22,'Bollnäs kommun',4),(23,'Gävle kommun',4),(24,'Hofors kommun',4),(25,'Hudiksvalls kommun',4),(26,'Ljusdals kommun',4),(27,'Nordanstigs kommun',4),(28,'Ockelbo kommun',4),(29,'Ovanåkers kommun',4),(30,'Sandvikens kommun',4),(31,'Söderhamns kommun',4),(32,'Falkenbergs kommun',5),(33,'Kungsbacka kommun',5),(34,'Varbergs kommun',5),(35,'Halmstads kommun',5),(36,'Laholms kommun',5),(37,'Hylte kommun',5),(38,'Bergs kommun',6),(39,'Bräcke kommun',6),(40,'Härjedalens kommun',6),(41,'Krokoms kommun',6),(42,'Ragunda kommun',6),(43,'Strömsunds kommun',6),(44,'Åre kommun',6),(45,'Östersunds kommun',6),(46,'Aneby kommun',7),(47,'Eksjö kommun',7),(48,'Gislaveds kommun',7),(49,'Gnosjö kommun',7),(50,'Habo kommun',7),(51,'Jönköpings kommun',7),(52,'Mullsjö kommun',7),(53,'Nässjö kommun',7),(54,'Sävsjö kommun',7),(55,'Tranås kommun',7),(56,'Vaggeryds kommun',7),(57,'Vetlanda kommun',7),(58,'Värnamo kommun',7),(59,'Borgholms kommun',8),(60,'Emmaboda kommun',8),(61,'Hultsfreds kommun',8),(62,'Högsby kommun',8),(63,'Kalmar kommun',8),(64,'Mönsterås kommun',8),(65,'Mörbylånga kommun',8),(66,'Nybro kommun',8),(67,'Oskarshamns kommun',8),(68,'Torsås kommun',8),(69,'Vimmerby kommun',8),(70,'Västerviks kommun',8),(71,'Alvesta kommun',9),(72,'Lessebo kommun',9),(73,'Ljungby kommun',9),(74,'Markaryds kommun',9),(75,'Tingsryds kommun',9),(76,'Uppvidinge kommun',9),(77,'Växjö kommun',9),(78,'Älmhults kommun',9),(79,'Arjeplogs kommun',10),(80,'Arvidsjaurs kommun',10),(81,'Bodens kommun',10),(82,'Gällivare kommun',10),(83,'Haparanda kommun',10),(84,'Jokkmokks kommun',10),(85,'Kalix kommun',10),(86,'Kiruna kommun',10),(87,'Luleå kommun',10),(88,'Pajala kommun',10),(89,'Piteå kommun',10),(90,'Överkalix kommun',10),(91,'Övertorneå kommun',10),(92,'Östra Göinge kommun',11),(93,'Örkelljunga kommun',11),(94,'Tomelilla kommun',11),(95,'Bromölla kommun',11),(96,'Osby kommun',11),(97,'Perstorps kommun',11),(98,'Klippans kommun',11),(99,'Åstorps kommun',11),(100,'Båstads kommun',11),(101,'Kristianstads kommun',11),(102,'Simrishamns kommun',11),(103,'Ängelholms kommun',11),(104,'Hässleholms kommun',11),(105,'Svalövs kommun',11),(106,'Staffanstorps kommun',11),(107,'Burlövs kommun',11),(108,'Vellinge kommun',11),(109,'Bjuvs kommun',11),(110,'Kävlinge kommun',11),(111,'Lomma kommun',11),(112,'Svedala kommun',11),(113,'Skurups kommun',11),(114,'Sjöbo kommun',11),(115,'Hörby kommun',11),(116,'Höörs kommun',11),(117,'Malmö stad',11),(118,'Lunds kommun',11),(119,'Landskrona kommun',11),(120,'Helsingborgs stad',11),(121,'Höganäs kommun',11),(122,'Eslövs kommun',11),(123,'Ystads kommun',11),(124,'Trelleborgs kommun',11),(125,'Botkyrka kommun',12),(126,'Danderyds kommun',12),(127,'Ekerö kommun',12),(128,'Haninge kommun',12),(129,'Huddinge kommun',12),(130,'Järfälla kommun',12),(131,'Lidingö kommun',12),(132,'Nacka kommun',12),(133,'Norrtälje kommun',12),(134,'Nykvarns kommun',12),(135,'Nynäshamns kommun',12),(136,'Salems kommun',12),(137,'Sigtuna kommun',12),(138,'Sollentuna kommun',12),(139,'Solna kommun',12),(140,'Stockholms kommun',12),(141,'Stockholms stad',12),(142,'Sundbybergs kommun',12),(143,'Södertälje kommun',12),(144,'Tyresö kommun',12),(145,'Täby kommun',12),(146,'Upplands-Bro kommun',12),(147,'Upplands Väsby kommun',12),(148,'Vallentuna kommun',12),(149,'Vaxholms kommun',12),(150,'Värmdö kommun',12),(151,'Österåkers kommun',12),(152,'Eskilstuna kommun',13),(153,'Flens kommun',13),(154,'Gnesta kommun',13),(155,'Katrineholms kommun',13),(156,'Nyköpings kommun',13),(157,'Oxelösunds kommun',13),(158,'Strängnäs kommun',13),(159,'Trosa kommun',13),(160,'Vingåkers kommun',13),(161,'Enköpings kommun',14),(162,'Håbo kommun',14),(163,'Knivsta kommun',14),(164,'Tierps kommun',14),(165,'Uppsala kommun',14),(166,'Älvkarleby kommun',14),(167,'Östhammars kommun',14),(168,'Arvika kommun',15),(169,'Eda kommun',15),(170,'Filipstads kommun',15),(171,'Forshaga kommun',15),(172,'Grums kommun',15),(173,'Hagfors kommun',15),(174,'Hammarö kommun',15),(175,'Karlstads kommun',15),(176,'Kils kommun',15),(177,'Kristinehamn kommun',15),(178,'Munkfors kommun',15),(179,'Storfors kommun',15),(180,'Sunne kommun',15),(181,'Säffle kommun',15),(182,'Torsby kommun',15),(183,'Årjängs kommun',15),(184,'Bjurholms kommun',16),(185,'Dorotea kommun',16),(186,'Lycksele kommun',16),(187,'Malå kommun',16),(188,'Nordmalings kommun',16),(189,'Norsjö kommun',16),(190,'Robertsfors kommun',16),(191,'Skellefteå kommun',16),(192,'Sorsele kommun',16),(193,'Storumans kommun',16),(194,'Umeå kommun',16),(195,'Vilhelmina kommun',16),(196,'Vindelns kommun',16),(197,'Vännäs kommun',16),(198,'Åsele kommun',16),(199,'Härnösands kommun',17),(200,'Kramfors kommun',17),(201,'Sollefteå kommun',17),(202,'Sundsvalls kommun',17),(203,'Timrå kommun',17),(204,'Ånge kommun',17),(205,'Örnsköldsviks kommun',17),(206,'Arboga kommun',18),(207,'Fagersta kommun',18),(208,'Hallstahammars kommun',18),(209,'Heby kommun',18),(210,'Kungsörs kommun',18),(211,'Köpings kommun',18),(212,'Norbergs kommun',18),(213,'Sala kommun',18),(214,'Skinnskattebergs kommun',18),(215,'Surahammars kommun',18),(216,'Västerås stad',18),(217,'Ale kommun',19),(218,'Alingsås kommun',19),(219,'Bengtsfors kommun',19),(220,'Bollebygds kommun',19),(221,'Borås stad',19),(222,'Dals-Eds kommun',19),(223,'Essunga kommun',19),(224,'Falköpings kommun',19),(225,'Färgelanda kommun',19),(226,'Grästorps kommun',19),(227,'Gullspångs kommun',19),(228,'Göteborgs stad',19),(229,'Götene kommun',19),(230,'Herrljunga kommun',19),(231,'Hjo kommun',19),(232,'Härryda kommun',19),(233,'Karlsborgs kommun',19),(234,'Kungälvs kommun',19),(235,'Lerums kommun',19),(236,'Lidköpings kommun',19),(237,'Lilla Edets kommun',19),(238,'Lysekils kommun',19),(239,'Mariestads kommun',19),(240,'Marks kommun',19),(241,'Melleruds kommun',19),(242,'Munkedals kommun',19),(243,'Mölndals kommun',19),(244,'Orusts kommun',19),(245,'Partille kommun',19),(246,'Skara kommun',19),(247,'Skövde kommun',19),(248,'Sotenäs kommun',19),(249,'Stenungsunds kommun',19),(250,'Strömstads kommun',19),(251,'Svenljunga kommun',19),(252,'Tanums kommun',19),(253,'Tibro kommun',19),(254,'Tidaholms kommun',19),(255,'Tjörns kommun',19),(256,'Tranemo kommun',19),(257,'Trollhättans stad',19),(258,'Töreboda kommun',19),(259,'Uddevalla kommun',19),(260,'Ulricehamns kommun',19),(261,'Vara kommun',19),(262,'Vårgårda kommun',19),(263,'Vänersborgs kommun',19),(264,'Åmåls kommun',19),(265,'Öckerö kommun',19),(266,'Askersunds kommun',20),(267,'Degerfors kommun',20),(268,'Hallsbergs kommun',20),(269,'Hällefors kommun',20),(270,'Karlskoga kommun',20),(271,'Kumla kommun',20),(272,'Laxå kommun',20),(273,'Lekebergs kommun',20),(274,'Ljusnarsbergs kommun',20),(275,'Lindesbergs kommun',20),(276,'Nora kommun',20),(277,'Örebro kommun',20),(278,'Boxholms kommun',21),(279,'Finspångs kommun',21),(280,'Kinda kommun',21),(281,'Linköpings kommun',21),(282,'Mjölby kommun',21),(283,'Motala kommun',21),(284,'Norrköpings kommun',21),(285,'Söderköpings kommun',21),(286,'Vadstena kommun',21),(287,'Valdemarsviks kommun',21),(288,'Ydre kommun',21),(289,'Åtvidabergs kommun',21),(290,'Ödeshögs kommun',21);
/*!40000 ALTER TABLE `kommun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lan`
--

DROP TABLE IF EXISTS `lan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lan` (
  `lan_id` int(10) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`lan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=780;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lan`
--

LOCK TABLES `lan` WRITE;
/*!40000 ALTER TABLE `lan` DISABLE KEYS */;
INSERT INTO `lan` VALUES (1,'Blekinge län'),(2,'Dalarnas län'),(3,'Gotlands län'),(4,'Gävleborgs län'),(5,'Hallands län'),(6,'Jämtlands län'),(7,'Jönköpings län'),(8,'Kalmar län'),(9,'Kronobergs län'),(10,'Norrbottens län'),(11,'Skåne län'),(12,'Stockholms län'),(13,'Södermanlands län'),(14,'Uppsala län'),(15,'Värmlands län'),(16,'Västerbottens län'),(17,'Västernorrlands län'),(18,'Västmanlands län'),(19,'Västra Götalands län'),(20,'Örebro län'),(21,'Östergötlands län');
/*!40000 ALTER TABLE `lan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lia_project`
--

DROP TABLE IF EXISTS `lia_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lia_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `spots` int(11) NOT NULL,
  `company` varchar(256) NOT NULL,
  `estimated_time` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lia_project`
--

LOCK TABLES `lia_project` WRITE;
/*!40000 ALTER TABLE `lia_project` DISABLE KEYS */;
INSERT INTO `lia_project` VALUES (2,'Test Projekt 2','Ännu mer testning',3,'Megaföretaget','6 veckor'),(3,'Test Projekt 3qwe','Testar hela dagen',1,'Superföretaget','7 veckor');
/*!40000 ALTER TABLE `lia_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_tag`
--

DROP TABLE IF EXISTS `project_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `project_tag_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `lia_project` (`id`),
  CONSTRAINT `project_tag_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_tag`
--

LOCK TABLES `project_tag` WRITE;
/*!40000 ALTER TABLE `project_tag` DISABLE KEYS */;
INSERT INTO `project_tag` VALUES (9,3,2),(10,3,3),(11,3,5),(23,2,4),(24,2,5),(25,2,6);
/*!40000 ALTER TABLE `project_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'CSS'),(2,'HTML'),(3,'PHP'),(4,'Java'),(5,'JS'),(6,'Angular');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `course_leader` int(11) NOT NULL DEFAULT '0',
  `company_owner` int(11) NOT NULL DEFAULT '0',
  `student` int(11) NOT NULL DEFAULT '0',
  `kommun_id` int(11) DEFAULT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  `last_activity` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user`(id, email, password, token, firstname, lastname, course_leader, company_owner, student, kommun_id, online, last_activity, guid) VALUES
(1, 'leader@test.se', '2d21bb673d85955d0f185c8494eb5deea073a5105d2e7e40aa2ea3861cfacd504edd4577f4bcd8f6eb24c17f706c67b721d7910008d369821c4c535b3c9303a1', 'Mihwe-oTmr', 'Kurs', 'Ledare', 1, 0, 0, 77, 0, '0', '8867d026-ad1e-11e4-b658-0c8bfd7a8af4');
INSERT INTO `lia-projekt`.user(id, email, password, token, firstname, lastname, course_leader, company_owner, student, kommun_id, online, last_activity, guid) VALUES
(2, 'student@test.se', 'b0aaad22ae294d9dff7a3c4164e89d9ab109766635254e755c803b36d8e640dd179093e8d4f65a9a40d4dabb5ba2b55a802d144aaea20170eb80303e1cae089b', 'FvTS2Uw9he', 'Vanlig', 'Student', 0, 0, 1, 77, 0, '0', '886c219f-ad1e-11e4-b658-0c8bfd7a8af4');
INSERT INTO `lia-projekt`.user(id, email, password, token, firstname, lastname, course_leader, company_owner, student, kommun_id, online, last_activity, guid) VALUES
(3, 'company@test.se', '4d6d675a0967f19bcf92e9168e732ba46b6f06902d91b5be97fbe44fcbee37b90626924bbe736c4c85da782fc9dfd8059e0e2824c3e890b345ce2add79127b86', 'wm2-EdrLEo', 'Företags', 'Ägare', 0, 1, 0, 77, 0, '0', '8870be4c-ad1e-11e4-b658-0c8bfd7a8af4');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-05 11:12:29
