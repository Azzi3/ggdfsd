# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Database: lia-projekt
# Generation Time: 2015-03-12 12:44:39 +0000
# ************************************************************


--
-- Definition for database `lia-projekt`
--
DROP DATABASE IF EXISTS `lia-projekt`;
CREATE DATABASE IF NOT EXISTS `lia-projekt`
  CHARACTER SET utf8
  COLLATE utf8_swedish_ci;

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

-- 
-- Set default database
--
USE `lia-projekt`;

-- --------------------------------------------------------

--
-- Tabellstruktur `application_form`
--
---------------------------------

DROP TABLE IF EXISTS `application_form`;

CREATE TABLE `application_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_guid` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `approved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`student_guid`,`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384;



# Dump of table company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `street_address` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `zip_code` int(5) NOT NULL,
  `city` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `contact_name` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `contact_email` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `website_url` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `company_email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384;

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;

INSERT INTO `company` (`id`, `name`, `street_address`, `zip_code`, `city`, `contact_name`, `contact_email`, `contact_phone`, `website_url`, `description`, `image`, `company_email`)
VALUES
	(3,'Fortnox','Framtidsvägen',35531,'växjö','Jesper Svensson','jespersvensson@test.se','0702323442','www.fortnox.se','Fortnox är Sveriges ledande leverantör av internetbaserade program för företag, föreningar samt redovisnings- och revisionsbyråer. Affärsiden är att erbjuda ett brett sortiment av internetbaserade program som är enkla att lära sig och att använda, men som ändå är kraftfulla och funktionsrika nog för att möta de flesta behov och önskemål.','fortnox.png','fortnox@test.se'),
	(11,'Sigma','Växjövägen 1',35531,'Växjö','Tommie Holmberg','tommieholmberg@test.se','0702323442','www.sigma.se','Sigma is a leading consulting group with the objective to make our customers more competitive. Our means is technological know-how and a constant passion for finding better solutions. We are 2,000 employees in eleven countries. Sigma is owned by Danir, a private investment company held by the Dan Olofsson family','sigma.png','sigma@test.se'),
	(12,'Visma','Växjövägen 1',35531,'Växjö','Peter Härder','peterhärder@test.se','0702323442','www.vismaspcs.se','Drivkraften bakom Visma Spcs är och har alltid varit att skapa de allra bästa förutsättningarna för landets företag. Ett arbete som vi anser vara viktigare i dag än någonsin tidigare. Sverige behöver fler entreprenörer som kan och vill ta steget och då är våra program och tjänster en viktig pusselbit. Vi är din samarbetspartner. Nu och i framtiden.','visma.jpeg','visma@test.se'),
	(13,'JimDavis Labs','Växjövägen 1',35531,'Växjö','Elvis Domazetovski','elvisdomazetovski@test.se','0702323442','www.jimdavislabs.se','JimDavis Labs är en webbyrå som utvecklar webbplatser, e-handelslösningar och appar för iPhone, iPad och Android med avstamp i en tydlig kommunikationsstrategi och fokus på användarvänlighet.\r\n\r\nEnligt oss betyder webbdesign att utseende och funktionalitet i samspel levererar en kommunikativ webbplats som ger användaren en upplevelse. Grafik och form implementeras enligt Responsive Webdesign','jimdavislabs.jpg','jimdavislabs@test.se'),
	(14,'Bläck & Co','Växjövägen 1',35531,'Växjö','Eddie Andersson','eddieandersson@test.se','0702323442','www.black.se','Bläck & Co är en fullservicebyrå inom reklam, design och marknadskommunikation. \r\n\r\nVi tror på kreativitet, god form, varumärkesorienterad kommunikation och nära relationer. Det har våra kunder och samarbetspartners uppskattat sedan 1992. Vi har kontor i Växjö och Stockholm.','black.jpg','black@test.se'),
	(15,'Well Hello','Växjövägen 1',35531,'Växjö','Daniel Liljeblad','danielliljeblad@test.se','0702323442','www.wellhello.se','Design och kommunikation är vår grej. Så har det nog alltid varit och därför bestämde vi oss hösten 2013 för att starta något nytt som vi tror på. Modeller, processer och metodik i all ära, men vi värdesätter också starka idéer och snygga produktioner. Att göra det svåra enkelt och inte krångla till det är vår utmaning. Att kunna vara stolta över varenda pixel vi levererar och behålla både skärpa och glädje i allt vi gör.\r\n\r\nVi arbetar för att du ska kunna se resultat i din verksamhet. Så enkelt är det. För att lyckas behöver vi lära känna dig och lära oss allt om din verksamhet och dina kunder. Den bästa kommunikationen gör vi tillsammans','wellhello.png','wellhello@test.se'),
	(16,'Softhouse','Växjövägen 1',35531,'Växjö','Henric Wästergren','henricwästergren@test.se','0702323442','www.softhouse.se','Vi är ett konsultföretag som är riktigt bra på att utveckla lösningar med mjukvara och att utveckla människor och verksamheter. Detta har vi gjort sedan starten 1996 och idag är vi ett av de ledande företagen i Skandinavien på Lean & Agile. Totalt är vi cirka 200 anställda på plats i Stockholm, Göteborg, Malmö, Karlskrona och Växjö.\r\n\r\nSofthouse är ett privatägt icke noterat svenskt företag, som visat tillväxt och lönsamhet under alla år.','softhouse.png','softhout@test.se'),
	(17,'Sitedirect','Växjövägen 1',35531,'Växjö','Mikael Häggström','mikaelhäggström@test.se','0702323442','www.sitedirect.se','Vi skapar innovativa webb- och e-handelslösningar - för dig som söker både den tekniska plattformen och en långsiktig partner som gör att din verksamhet kan växa. \r\n\r\nOavsett om du redan driver en nätbutik, om e-handel är en ny försäljningskanal eller du vill ha en avancerad webblösning så hjälper vi dig med både affärsstrategi och tekniska lösningar - med know-how, val av e-handelsplattform, webbutveckling och de drifttjänster du behöver. ','sitedirect.png','sitedirect@test.se'),
	(18,'Standout','Växjövägen 1',35531,'Växjö','David Elbe','davidelbe@test.se','0702323442','www.standout.se','Standout består av två delar: en konsultdel som levererar webbutvecklingstjänster till andra företag och en del som bygger egna produkter.','standout.png','standout@test.se'),
	(19,'Go Brave','Växjövägen 1',35531,'Växjö','Mats Karlsson','matskarlsson@test.se','0702323442','www.gobrave.se','På GoBrave har vi olika bakgrund med olika kunskaper och erfarenheter – noga sammansatta för att ge dig bästa möjliga verktyg för att nå dina mål. Oavsett om du vill nå ut online eller offline (eller båda samtidigt) kan vi ge dig rätt lösning.','gobrave.png','gobrave@test.se');

/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_tag`;

CREATE TABLE `company_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=3276;

LOCK TABLES `company_tag` WRITE;
/*!40000 ALTER TABLE `company_tag` DISABLE KEYS */;

INSERT INTO `company_tag` (`id`, `company_id`, `tag_id`)
VALUES
	(4,4,1),
	(5,4,2),
	(9,5,3),
	(10,5,4),
	(11,6,3),
	(12,6,4),
	(13,7,3),
	(14,7,4),
	(15,8,4),
	(16,9,4),
	(17,10,4),
	(18,2,1),
	(19,2,2),
	(20,3,3),
	(21,3,4),
	(22,11,1),
	(23,11,2),
	(24,11,5),
	(28,12,1),
	(29,12,2),
	(30,12,4),
	(35,13,1),
	(36,13,2),
	(37,13,3),
	(38,13,5),
	(39,14,1),
	(40,14,2),
	(43,15,1),
	(44,15,2),
	(45,16,1),
	(46,16,2),
	(47,16,3),
	(48,16,5),
	(49,16,6),
	(50,17,1),
	(51,17,2),
	(52,17,3),
	(53,17,4),
	(54,18,1),
	(55,18,2),
	(56,18,3),
	(57,18,4),
	(136,19,1),
	(137,19,2),
	(138,19,3),
	(139,19,10),
	(140,19,12),
	(141,19,15),
	(142,19,16),
	(143,19,20),
	(144,19,21),
	(145,19,22),
	(146,19,25);

/*!40000 ALTER TABLE `company_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table county
# ------------------------------------------------------------

DROP TABLE IF EXISTS `county`;

CREATE TABLE `county` (
  `county_id` int(10) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`county_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=780;

LOCK TABLES `county` WRITE;
/*!40000 ALTER TABLE `county` DISABLE KEYS */;

INSERT INTO `county` (`county_id`, `name`)
VALUES
	(1,'Blekinge län'),
	(2,'Dalarnas län'),
	(3,'Gotlands län'),
	(4,'Gävleborgs län'),
	(5,'Hallands län'),
	(6,'Jämtlands län'),
	(7,'Jönköpings län'),
	(8,'Kalmar län'),
	(9,'Kronobergs län'),
	(10,'Norrbottens län'),
	(11,'Skåne län'),
	(12,'Stockholms län'),
	(13,'Södermanlands län'),
	(14,'Uppsala län'),
	(15,'Värmlands län'),
	(16,'Västerbottens län'),
	(17,'Västernorrlands län'),
	(18,'Västmanlands län'),
	(19,'Västra Götalands län'),
	(20,'Örebro län'),
	(21,'Östergötlands län');

/*!40000 ALTER TABLE `county` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `course_start` date NOT NULL,
  `course_end` date NOT NULL,
  `file` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=8192;

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;

INSERT INTO `course` (`id`, `name`, `description`, `course_start`, `course_end`, `file`)
VALUES
	(1,'LIA 1- CMS','Den studerande ska fördjupa sina kunskaper av CMS-system genom att studera hur man på ett LIA- företag använder sig av ett eller flera CMS-system. Den studerande ska bli insatt i hur företaget utvecklar och förändrar CMS-system. Erfarenheterna av LIA-perioden sammanfattas i en rapport där den studerande ska:','2014-02-20','2014-03-01','example.txt'),
	(2,'LIA 2 - Nätapplikationer','Den studerande ska fördjupa sina kunskaper av nätapplikationer ge- nom att studera hur man på ett LIA-företaget utvecklar och föränd- rar nätapplikationer. Erfarenheter- na av LIA-perioden sammanfattas i en rapport där den studerande ska:','2014-09-20','2014-11-15',NULL),
	(3,'LIA 3 - Systemintegration','Den studerande ska fördjupa sina kunskaper samt bli insatt i proble- matiken kring systemintegration genom att studera hur man på LIA-företaget arbetar med integra- tion mellan olika system och platt- formar. Erfarenheterna av LIA-pe- rioden sammanfattas i en rapport där den studerande ska:','2015-03-23','2015-05-15',NULL),
	(5,'LIA 1- CMS','Den studerande ska fördjupa sina kunskaper av CMS-system genom att studera hur man på ett LIA- företag använder sig av ett eller flera CMS-system. Den studerande ska bli insatt i hur företaget utvecklar och förändrar CMS-system.','2016-02-20','2016-03-01','example.txt'),
	(6,'LIA 2 - Nätapplikationer','Den studerande ska fördjupa sina kunskaper av nätapplikationer ge- nom att studera hur man på ett LIA-företaget utvecklar och föränd- rar nätapplikationer. Erfarenheter- na av LIA-perioden sammanfattas i en rapport där den studerande ska:','2016-09-20','2016-11-15',NULL),
	(7,'LIA 3 - Systemintegration','Den studerande ska fördjupa sina kunskaper samt bli insatt i proble- matiken kring systemintegration genom att studera hur man på LIA-företaget arbetar med integra- tion mellan olika system och platt- formar. Erfarenheterna av LIA-pe- rioden sammanfattas i en rapport där den studerande ska:','2016-03-23','2016-05-15',NULL);

/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table course_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course_tag`;

CREATE TABLE `course_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461;

LOCK TABLES `course_tag` WRITE;
/*!40000 ALTER TABLE `course_tag` DISABLE KEYS */;

INSERT INTO `course_tag` (`id`, `course_id`, `tag_id`)
VALUES
	(27,1,4),
	(28,1,5),
	(29,3,1),
	(30,3,2),
	(31,3,3),
	(35,2,1),
	(36,2,2),
	(37,2,6),
	(42,5,1),
	(43,5,2),
	(44,7,1),
	(45,7,2),
	(46,7,3),
	(47,6,1),
	(48,6,2),
	(49,6,6);

/*!40000 ALTER TABLE `course_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lia_project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lia_project`;

CREATE TABLE `lia_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `spots` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `estimated_time` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

LOCK TABLES `lia_project` WRITE;
/*!40000 ALTER TABLE `lia_project` DISABLE KEYS */;

INSERT INTO `lia_project` (`id`, `name`, `description`, `spots`, `company_id`, `estimated_time`)
VALUES
	(2,'Standout projekt 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ',3,18,'6 veckor'),
	(3,'Fortnox projekt 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ',1,3,'7 veckor'),
	(4,'Standout projekt 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ',2,18,'8 veckor'),
	(5,'Standout projekt 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ',4,18,'8 veckor'),
	(6,'Fortnox projekt 2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ',4,3,'6 veckor');

/*!40000 ALTER TABLE `lia_project` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table municipality
# ------------------------------------------------------------

DROP TABLE IF EXISTS `municipality`;

CREATE TABLE `municipality` (
  `municipality_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `lan_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`municipality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=56;

LOCK TABLES `municipality` WRITE;
/*!40000 ALTER TABLE `municipality` DISABLE KEYS */;

INSERT INTO `municipality` (`municipality_id`, `name`, `lan_id`)
VALUES
	(1,'Karlshamns kommun',1),
	(2,'Karlskrona kommun',1),
	(3,'Olofströms kommun',1),
	(4,'Ronneby kommun',1),
	(5,'Sölvesborgs kommun',1),
	(6,'Avesta kommun',2),
	(7,'Borlänge kommun',2),
	(8,'Falu kommun',2),
	(9,'Gagnefs kommun',2),
	(10,'Hedemora kommun',2),
	(11,'Leksands kommun',2),
	(12,'Ludvika kommun',2),
	(13,'Malungs kommun',2),
	(14,'Mora kommun',2),
	(15,'Orsa kommun',2),
	(16,'Rättviks kommun',2),
	(17,'Smedjebackens kommun',2),
	(18,'Säters kommun',2),
	(19,'Vansbro kommun',2),
	(20,'Älvdalens kommun',2),
	(21,'Gotlands kommun',3),
	(22,'Bollnäs kommun',4),
	(23,'Gävle kommun',4),
	(24,'Hofors kommun',4),
	(25,'Hudiksvalls kommun',4),
	(26,'Ljusdals kommun',4),
	(27,'Nordanstigs kommun',4),
	(28,'Ockelbo kommun',4),
	(29,'Ovanåkers kommun',4),
	(30,'Sandvikens kommun',4),
	(31,'Söderhamns kommun',4),
	(32,'Falkenbergs kommun',5),
	(33,'Kungsbacka kommun',5),
	(34,'Varbergs kommun',5),
	(35,'Halmstads kommun',5),
	(36,'Laholms kommun',5),
	(37,'Hylte kommun',5),
	(38,'Bergs kommun',6),
	(39,'Bräcke kommun',6),
	(40,'Härjedalens kommun',6),
	(41,'Krokoms kommun',6),
	(42,'Ragunda kommun',6),
	(43,'Strömsunds kommun',6),
	(44,'Åre kommun',6),
	(45,'Östersunds kommun',6),
	(46,'Aneby kommun',7),
	(47,'Eksjö kommun',7),
	(48,'Gislaveds kommun',7),
	(49,'Gnosjö kommun',7),
	(50,'Habo kommun',7),
	(51,'Jönköpings kommun',7),
	(52,'Mullsjö kommun',7),
	(53,'Nässjö kommun',7),
	(54,'Sävsjö kommun',7),
	(55,'Tranås kommun',7),
	(56,'Vaggeryds kommun',7),
	(57,'Vetlanda kommun',7),
	(58,'Värnamo kommun',7),
	(59,'Borgholms kommun',8),
	(60,'Emmaboda kommun',8),
	(61,'Hultsfreds kommun',8),
	(62,'Högsby kommun',8),
	(63,'Kalmar kommun',8),
	(64,'Mönsterås kommun',8),
	(65,'Mörbylånga kommun',8),
	(66,'Nybro kommun',8),
	(67,'Oskarshamns kommun',8),
	(68,'Torsås kommun',8),
	(69,'Vimmerby kommun',8),
	(70,'Västerviks kommun',8),
	(71,'Alvesta kommun',9),
	(72,'Lessebo kommun',9),
	(73,'Ljungby kommun',9),
	(74,'Markaryds kommun',9),
	(75,'Tingsryds kommun',9),
	(76,'Uppvidinge kommun',9),
	(77,'Växjö kommun',9),
	(78,'Älmhults kommun',9),
	(79,'Arjeplogs kommun',10),
	(80,'Arvidsjaurs kommun',10),
	(81,'Bodens kommun',10),
	(82,'Gällivare kommun',10),
	(83,'Haparanda kommun',10),
	(84,'Jokkmokks kommun',10),
	(85,'Kalix kommun',10),
	(86,'Kiruna kommun',10),
	(87,'Luleå kommun',10),
	(88,'Pajala kommun',10),
	(89,'Piteå kommun',10),
	(90,'Överkalix kommun',10),
	(91,'Övertorneå kommun',10),
	(92,'Östra Göinge kommun',11),
	(93,'Örkelljunga kommun',11),
	(94,'Tomelilla kommun',11),
	(95,'Bromölla kommun',11),
	(96,'Osby kommun',11),
	(97,'Perstorps kommun',11),
	(98,'Klippans kommun',11),
	(99,'Åstorps kommun',11),
	(100,'Båstads kommun',11),
	(101,'Kristianstads kommun',11),
	(102,'Simrishamns kommun',11),
	(103,'Ängelholms kommun',11),
	(104,'Hässleholms kommun',11),
	(105,'Svalövs kommun',11),
	(106,'Staffanstorps kommun',11),
	(107,'Burlövs kommun',11),
	(108,'Vellinge kommun',11),
	(109,'Bjuvs kommun',11),
	(110,'Kävlinge kommun',11),
	(111,'Lomma kommun',11),
	(112,'Svedala kommun',11),
	(113,'Skurups kommun',11),
	(114,'Sjöbo kommun',11),
	(115,'Hörby kommun',11),
	(116,'Höörs kommun',11),
	(117,'Malmö stad',11),
	(118,'Lunds kommun',11),
	(119,'Landskrona kommun',11),
	(120,'Helsingborgs stad',11),
	(121,'Höganäs kommun',11),
	(122,'Eslövs kommun',11),
	(123,'Ystads kommun',11),
	(124,'Trelleborgs kommun',11),
	(125,'Botkyrka kommun',12),
	(126,'Danderyds kommun',12),
	(127,'Ekerö kommun',12),
	(128,'Haninge kommun',12),
	(129,'Huddinge kommun',12),
	(130,'Järfälla kommun',12),
	(131,'Lidingö kommun',12),
	(132,'Nacka kommun',12),
	(133,'Norrtälje kommun',12),
	(134,'Nykvarns kommun',12),
	(135,'Nynäshamns kommun',12),
	(136,'Salems kommun',12),
	(137,'Sigtuna kommun',12),
	(138,'Sollentuna kommun',12),
	(139,'Solna kommun',12),
	(140,'Stockholms kommun',12),
	(141,'Stockholms stad',12),
	(142,'Sundbybergs kommun',12),
	(143,'Södertälje kommun',12),
	(144,'Tyresö kommun',12),
	(145,'Täby kommun',12),
	(146,'Upplands-Bro kommun',12),
	(147,'Upplands Väsby kommun',12),
	(148,'Vallentuna kommun',12),
	(149,'Vaxholms kommun',12),
	(150,'Värmdö kommun',12),
	(151,'Österåkers kommun',12),
	(152,'Eskilstuna kommun',13),
	(153,'Flens kommun',13),
	(154,'Gnesta kommun',13),
	(155,'Katrineholms kommun',13),
	(156,'Nyköpings kommun',13),
	(157,'Oxelösunds kommun',13),
	(158,'Strängnäs kommun',13),
	(159,'Trosa kommun',13),
	(160,'Vingåkers kommun',13),
	(161,'Enköpings kommun',14),
	(162,'Håbo kommun',14),
	(163,'Knivsta kommun',14),
	(164,'Tierps kommun',14),
	(165,'Uppsala kommun',14),
	(166,'Älvkarleby kommun',14),
	(167,'Östhammars kommun',14),
	(168,'Arvika kommun',15),
	(169,'Eda kommun',15),
	(170,'Filipstads kommun',15),
	(171,'Forshaga kommun',15),
	(172,'Grums kommun',15),
	(173,'Hagfors kommun',15),
	(174,'Hammarö kommun',15),
	(175,'Karlstads kommun',15),
	(176,'Kils kommun',15),
	(177,'Kristinehamn kommun',15),
	(178,'Munkfors kommun',15),
	(179,'Storfors kommun',15),
	(180,'Sunne kommun',15),
	(181,'Säffle kommun',15),
	(182,'Torsby kommun',15),
	(183,'Årjängs kommun',15),
	(184,'Bjurholms kommun',16),
	(185,'Dorotea kommun',16),
	(186,'Lycksele kommun',16),
	(187,'Malå kommun',16),
	(188,'Nordmalings kommun',16),
	(189,'Norsjö kommun',16),
	(190,'Robertsfors kommun',16),
	(191,'Skellefteå kommun',16),
	(192,'Sorsele kommun',16),
	(193,'Storumans kommun',16),
	(194,'Umeå kommun',16),
	(195,'Vilhelmina kommun',16),
	(196,'Vindelns kommun',16),
	(197,'Vännäs kommun',16),
	(198,'Åsele kommun',16),
	(199,'Härnösands kommun',17),
	(200,'Kramfors kommun',17),
	(201,'Sollefteå kommun',17),
	(202,'Sundsvalls kommun',17),
	(203,'Timrå kommun',17),
	(204,'Ånge kommun',17),
	(205,'Örnsköldsviks kommun',17),
	(206,'Arboga kommun',18),
	(207,'Fagersta kommun',18),
	(208,'Hallstahammars kommun',18),
	(209,'Heby kommun',18),
	(210,'Kungsörs kommun',18),
	(211,'Köpings kommun',18),
	(212,'Norbergs kommun',18),
	(213,'Sala kommun',18),
	(214,'Skinnskattebergs kommun',18),
	(215,'Surahammars kommun',18),
	(216,'Västerås stad',18),
	(217,'Ale kommun',19),
	(218,'Alingsås kommun',19),
	(219,'Bengtsfors kommun',19),
	(220,'Bollebygds kommun',19),
	(221,'Borås stad',19),
	(222,'Dals-Eds kommun',19),
	(223,'Essunga kommun',19),
	(224,'Falköpings kommun',19),
	(225,'Färgelanda kommun',19),
	(226,'Grästorps kommun',19),
	(227,'Gullspångs kommun',19),
	(228,'Göteborgs stad',19),
	(229,'Götene kommun',19),
	(230,'Herrljunga kommun',19),
	(231,'Hjo kommun',19),
	(232,'Härryda kommun',19),
	(233,'Karlsborgs kommun',19),
	(234,'Kungälvs kommun',19),
	(235,'Lerums kommun',19),
	(236,'Lidköpings kommun',19),
	(237,'Lilla Edets kommun',19),
	(238,'Lysekils kommun',19),
	(239,'Mariestads kommun',19),
	(240,'Marks kommun',19),
	(241,'Melleruds kommun',19),
	(242,'Munkedals kommun',19),
	(243,'Mölndals kommun',19),
	(244,'Orusts kommun',19),
	(245,'Partille kommun',19),
	(246,'Skara kommun',19),
	(247,'Skövde kommun',19),
	(248,'Sotenäs kommun',19),
	(249,'Stenungsunds kommun',19),
	(250,'Strömstads kommun',19),
	(251,'Svenljunga kommun',19),
	(252,'Tanums kommun',19),
	(253,'Tibro kommun',19),
	(254,'Tidaholms kommun',19),
	(255,'Tjörns kommun',19),
	(256,'Tranemo kommun',19),
	(257,'Trollhättans stad',19),
	(258,'Töreboda kommun',19),
	(259,'Uddevalla kommun',19),
	(260,'Ulricehamns kommun',19),
	(261,'Vara kommun',19),
	(262,'Vårgårda kommun',19),
	(263,'Vänersborgs kommun',19),
	(264,'Åmåls kommun',19),
	(265,'Öckerö kommun',19),
	(266,'Askersunds kommun',20),
	(267,'Degerfors kommun',20),
	(268,'Hallsbergs kommun',20),
	(269,'Hällefors kommun',20),
	(270,'Karlskoga kommun',20),
	(271,'Kumla kommun',20),
	(272,'Laxå kommun',20),
	(273,'Lekebergs kommun',20),
	(274,'Ljusnarsbergs kommun',20),
	(275,'Lindesbergs kommun',20),
	(276,'Nora kommun',20),
	(277,'Örebro kommun',20),
	(278,'Boxholms kommun',21),
	(279,'Finspångs kommun',21),
	(280,'Kinda kommun',21),
	(281,'Linköpings kommun',21),
	(282,'Mjölby kommun',21),
	(283,'Motala kommun',21),
	(284,'Norrköpings kommun',21),
	(285,'Söderköpings kommun',21),
	(286,'Vadstena kommun',21),
	(287,'Valdemarsviks kommun',21),
	(288,'Ydre kommun',21),
	(289,'Åtvidabergs kommun',21),
	(290,'Ödeshögs kommun',21);

/*!40000 ALTER TABLE `municipality` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_applicant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_applicant`;

CREATE TABLE `project_applicant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Ny, 1 = JA, 2 = NEJ, 3 = Genomförd',
  `mailed` int(11) NOT NULL DEFAULT '0' COMMENT '0 = icke mailad, 1 = mailad',
  `company_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `report` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384;



# Dump of table project_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_tag`;

CREATE TABLE `project_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `project_tag_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `lia_project` (`id`),
  CONSTRAINT `project_tag_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730;

LOCK TABLES `project_tag` WRITE;
/*!40000 ALTER TABLE `project_tag` DISABLE KEYS */;

INSERT INTO `project_tag` (`id`, `project_id`, `tag_id`)
VALUES
	(43,3,2),
	(44,3,3),
	(45,3,5),
	(46,6,1),
	(47,6,2),
	(48,6,18),
	(49,6,19),
	(50,6,24),
	(51,6,25),
	(52,2,4),
	(53,2,5),
	(54,2,6),
	(55,4,1),
	(56,4,2),
	(57,4,18),
	(58,5,1),
	(59,5,2),
	(60,5,18),
	(61,5,23),
	(62,5,25);

/*!40000 ALTER TABLE `project_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table secret_key
# ------------------------------------------------------------

DROP TABLE IF EXISTS `secret_key`;

CREATE TABLE `secret_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_value` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `student` int(11) NOT NULL DEFAULT '0',
  `company` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461;

LOCK TABLES `secret_key` WRITE;
/*!40000 ALTER TABLE `secret_key` DISABLE KEYS */;

INSERT INTO `secret_key` (`id`, `key_value`, `student`, `company`)
VALUES
	(1,'asdasd',0,1),
	(2,'_LyrdGT-e2JRchNTzEj7iF2QUs7VgAhJX_P6SLmk',1,0),
	(3,'uvbjQY1phe2pUXXG6-27QrWXBWW7ocJUCnwbi26j',0,1),
	(6,'qw2WiUW3LhE2cjcqxsHBewkTpcT2DvPVSEE2npSZ',0,1);

/*!40000 ALTER TABLE `secret_key` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_profile`;

CREATE TABLE `student_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `info` text COLLATE utf8_swedish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384;

LOCK TABLES `student_profile` WRITE;
/*!40000 ALTER TABLE `student_profile` DISABLE KEYS */;

INSERT INTO `student_profile` (`id`, `user_id`, `phone`, `website`, `resume`, `picture`, `info`)
VALUES
	(2,22,'0727456080','www.PeterssonDesign.com','','','Hej jag heter Niklas Petersson');

/*!40000 ALTER TABLE `student_profile` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table student_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `student_tag`;

CREATE TABLE `student_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=8192;

LOCK TABLES `student_tag` WRITE;
/*!40000 ALTER TABLE `student_tag` DISABLE KEYS */;

INSERT INTO `student_tag` (`id`, `user_id`, `tag_id`)
VALUES
	(63,2,2),
	(64,2,6),
	(77,22,1),
	(78,22,2),
	(79,22,10),
	(80,22,12),
	(81,22,15),
	(82,22,16),
	(83,22,17),
	(84,22,18),
	(85,22,21),
	(86,22,22),
	(87,22,23),
	(88,22,25);

/*!40000 ALTER TABLE `student_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730;

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;

INSERT INTO `tag` (`id`, `name`)
VALUES
	(1,'CSS3'),
	(2,'HTML5'),
	(3,'PHP'),
	(4,'Java'),
	(5,'JavaScript'),
	(6,'Angular'),
	(8,'MySql'),
	(9,'Systemintegration'),
	(10,'IT'),
	(11,'Ruby'),
	(12,'Webb'),
	(13,'.Net'),
	(14,'Android'),
	(15,'Git'),
	(16,'Responsive'),
	(17,'iOS'),
	(18,'Wordpress'),
	(19,'Bootstrap'),
	(20,'Drupal'),
	(21,'Branding'),
	(22,'Grafisk Design'),
	(23,'Webb Design'),
	(24,'Back-end development'),
	(25,'Front-end development'),
	(26,'JQuery');

/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

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
  `municipality` int(11) DEFAULT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  `last_activity` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `email`, `password`, `token`, `firstname`, `lastname`, `course_leader`, `company_owner`, `student`, `municipality`, `online`, `last_activity`, `company_id`, `guid`)
VALUES
	(4,'jespersvensson@test.se','64c6932f6afc2c615da87131dff3a29d45f3a3c8bc9f9b4627509da2c716938474f450c8ba3e75314218bb35d9091fbecd8ab800f7ca100a7d5eed34b6df6a7a','rAjox6P196','Jesper','Svensson',0,1,0,77,0,'0',3,'d935904e-be60-11e4-b6bb-0c8bfd7a8af4'),
	(9,'johanhovbrandt@test.se','6cd234b09d284782a4d2eb31331139ff0ca16e5df5e9d5cd5357a2eece282c895ecfb8c2b7c1e8f7f9dd11f30844797d220599e5e8bc1925f661d325217ecc52','Ppe3rMwQvH','Johan','Hovbrandt',1,0,0,77,0,'0',0,'528864c6-c896-11e4-87fe-30cb6bb44744'),
	(10,'tomsvaleklev@test.se','4c493ff7133a448ecad282df3e4d74424c3c6899a3c146235c54fa188f07ffcb628a5fde5d6cc255e1ff1343409f97c253baad88a2287997a4480fc8518ea317','jfgithNzd6','Tom','Svaleklev',1,0,0,77,0,'0',0,'91091d94-c896-11e4-87fe-30cb6bb44744'),
	(11,'matskarlsson@test.se','a3f2f3889be7ce1e8d62d7889aad45268d3d33a65971e6813472542909cc893f3167bd2dfff8331ada1d1477a61bd1b00ea35af66c11155a8a9b5955cf4046f9','FrXPhGdFwc','Mats','Karlsson',0,1,0,77,0,'0',19,'9dff0aee-c897-11e4-87fe-30cb6bb44744'),
	(12,'peterhärder@test.se','8df04fd29325124beee651e60f14ea6a622ee36f540336c87d63efaf18a1e64e9f1139802939e9a93b89645011a1de7311a927d39c50296624a6487d1ac20a5e','YbojpVuALS','Peter','Härder',0,1,0,77,0,'0',12,'215e2eba-c898-11e4-87fe-30cb6bb44744'),
	(13,'elvisdomazetovski@test.se','eb19f1a2c63d2b40794d7bb3c6728ab7b3d8f77bfb336df5ce5330b4ca9ff32a630ccb237ced7a2281882059c921f7eb907a636ac6b9664543b855c6a02844ab','8DMwRHJ_hv','Elvis','Domazetovski',0,1,0,77,0,'0',13,'78d94300-c898-11e4-87fe-30cb6bb44744'),
	(15,'eddieandersson@test.se','7f2f71f924c2a5d7f00ffda8ced3b6ce9a5de4619b8f23406750431e05c2ded3e3cf41b635acbd52bd5bc2b926fe58079436b45b7bae1b89b6853092acb5e474','B8De8kvXGB','Eddie','Andersson',0,1,0,77,0,'0',14,'aa901996-c898-11e4-87fe-30cb6bb44744'),
	(16,'danielliljeblad@test.se','a91788e95cdee0da29477c32ab99a240dc54a4b044f415e382078ec523ebb071ee7ab3fe4bcbe6026f30f29204486cd644e47bc76e9872cc84bcba00c60df714','VDdGq_KWEe','Daniel','Liljeblad',0,1,0,77,0,'0',15,'d675abb6-c898-11e4-87fe-30cb6bb44744'),
	(17,'henricwästergren@test.se','7cba18ff426b8c2962a520d5cf2115597900ddbfb069cd47fa5f6faad84182794d7e7ed78f0b655b403ab91ce11e10113c67578f3a517573952d0ad1200b52d3','S7_UbD8w6V','Henric','Wästergren',0,1,0,77,0,'0',16,'020022ac-c899-11e4-87fe-30cb6bb44744'),
	(18,'davidelbe@test.se','dd1ca8af0ab4891e13a394f922331d7b7fcd33dd228103dc792694d148320e28440e468ce82cd2615b71bac6d27e14b42cfda4acd2f00cf924e8b709a4088a2f','ah2TkoqYh7','David','Elbe',0,1,0,77,0,'0',18,'330c6bc6-c899-11e4-87fe-30cb6bb44744'),
	(19,'mikaelhäggström@test.se','7bd45655e00db956ea928ad7eece5a697336774524276efe8875e70dc749a6afdc17e7343b3fd0e1d3a0b6722607b98eba26fd6f1f7479842d04cdc0f9964082','12TVMby8_Y','Mikael','Häggström',0,1,0,77,0,'0',17,'50143a78-c899-11e4-87fe-30cb6bb44744'),
	(20,'tommieholmberg@test.se','9f6d20fbd012e84b9f94be931b6f229f499009a307cf9ed8bc216cc2dbb0de4f9191b5f3920e11e6af5b5ea476370d98a13aac4a460f9cab9ba32ec45fe04b26','_neWk7Hj5V','Tommie','Holmberg',0,1,0,77,0,'0',11,'4cc44362-c89a-11e4-87fe-30cb6bb44744'),
	(21,'kristoffersvensson@test.se','fad62016088e4e2e6beae472faba208da03e38527c97378aecb2b3ad5f1516eb62d7f6f6490a5e70195f2aab3a6456ae0d5aa3161d908de2ccca8f1b88b7c8af','_D6JqUKC6C','Kristoffer','Svensson',0,0,1,77,0,'0',0,'6b3710ea-c89a-11e4-87fe-30cb6bb44744'),
	(22,'niklaspetersson@test.se','e69d023c3d01731ddd8b58365b20df6f10dad4cde2ecccd96762b9e1ec5cd9d45d9639095da8f94dc39af86f3fe89bbdbb378beda2920646b323df8b8a3e323d','AETCDQMwD_','Niklas','Petersson',0,0,1,77,1,'0',0,'ad5f5748-c89a-11e4-87fe-30cb6bb44744'),
	(23,'tobiasfriberg@test.se','804c6a4695115c2d845a1a7ae68e311ffe79068c1b373524878d7c7fa91dda94570be2540832cd313da5a045304275262e33b74bb9754d59e0994e48003974c8','Gi8dHP3dWw','Tobias','Friberg',0,0,1,77,0,'0',0,'c6c9c754-c89a-11e4-87fe-30cb6bb44744'),
	(24,'hampuskvarnhammar@test.se','f4fbb092f1869441736e7e5269c29ac45467d0d0b01f0e52ee44d47e6017625eb4ffb82865d9c449191c6002a9c992bdc0f817824b3ee8f360fed7dbff81e2ce','xbi3VAx2_e','Hampus','Kvarnhammar',0,0,1,77,0,'0',0,'d68e5a92-c89a-11e4-87fe-30cb6bb44744'),
	(25,'emmablixt@test.se','309243bbf579cf4371dd1e084ce409c1e81e87e58ced1a926977f440856c2f1a1a681c3b2ce470d50ce9fadcba6ed6bfcdb55fd6ddf7241400c693be0969ee9e','89LywQWYaB','Emma','Blixt',0,0,1,77,0,'0',0,'e946ad60-c89a-11e4-87fe-30cb6bb44744'),
	(26,'davidahlander@test.se','eb6a9335e02b68d66d5e34b490024212ec7d05ac212152d4d7cd187c13a610050a19d424c0401969092fc0d949eab130b3caefca39b70c78dad9d040b25a0583','LJYypK5qnk','David','Åhlander',0,0,1,77,0,'0',0,'075beae0-c89b-11e4-87fe-30cb6bb44744'),
	(27,'magnuskarlsson@test.se','eebfac11fbb46d58fae6085a18cc84c2ba15a2b78813ce9cf1a9efaa1e52e51954b742c971297281df1583b9694b5c8edcdcbc177dd88f3e1e4933b0fc080378','CTZyQ4EVwH','Magnus','Karlsson',0,0,1,77,0,'0',0,'0fc5ab12-c89b-11e4-87fe-30cb6bb44744'),
	(28,'johansamuelsson@test.se','6005694a791068579d2a3d161f36e9e5c0a90fa66d708cf47b56b8a9daa10b6d43f040db000890bce3a64e3ca61a32255ddfeb0d1ced0919c721b2fcd2b5593b','uQNaSr2wfc','Johan','Samuelsson',0,0,1,77,0,'0',0,'207d0c02-c89b-11e4-87fe-30cb6bb44744'),
	(29,'malinandersson@test.se','ff3b20d869374e0582f1895b86608d8b8e4954a6bb05797afa8cfc21b663aaeb709a347a27bb4442f69b834fc391d79c5652f06b34d199e49da0d849a7460b5d','q5j4ofbUUG','Malin','Andersson',0,0,1,77,0,'0',0,'4cadf3fe-c89b-11e4-87fe-30cb6bb44744'),
	(30,'joachimbachstatter@test.se','ab0de980e2c8a2c556f7a3372862705929e69372b90049af14d4341450fbc463e587dcf0bd5d9b6d00c99d465fba9924b3310dd2371dd1a29d41335e83139d10','aXbZkyfJnv','Joachim','Bachstätter',0,0,1,77,0,'0',0,'665b6728-c89b-11e4-87fe-30cb6bb44744'),
	(31,'kimeriksson@test.se','247e975581b6542c05be6aebf5e4f2150bb81a8709f0f96e776e6741c6f6b089ebaafc4812bc1e75c3addc77c3a1bb0004c7950d1b60e7458708a4b3a39163e8','oWxoGjk2xu','Kim','Eriksson',0,0,1,77,0,'0',0,'7d8985b0-c89b-11e4-87fe-30cb6bb44744'),
	(32,'danielhenriksen@test.se','e7e0b2ea1bcdabaa7ad4f87fa3ed43fd4410e570a206cbcb6810a7387ace6e1bbfccda98be0c0687198b963a05f8c883ef3eb10b2d463cdee86746b3712ed997','tucJVp5kYX','Daniel','Henriksen',0,0,1,77,0,'0',0,'93746444-c89b-11e4-87fe-30cb6bb44744'),
	(33,'alexandergunnarsson@test.se','b24fdfb3c9cd47b09aeb1d54cfe8c5d40e085f5e086d4191e9630dbf8fee3acefe5f00a4725d4bf0dffedf34cd757a389cd0799e0d60cc0c780aec03beeb0284','tr6XuPu9yJ','Alexander','Gunnarsson',0,0,1,77,0,'0',0,'aa1b9bd6-c89b-11e4-87fe-30cb6bb44744'),
	(34,'andreashultqvist@test.se','98d311d5aeb6675f8f2f25c4f0057b1118a51011c22f0fd332d135447e64e7008c2845bf3d3cffddb95df1e10be1839a5c844f853f86ec06a04cbc4d668f5154','vcXkYCSV5Z','Andreas','Hultqvist',0,0,1,77,0,'0',0,'d9efe8b2-c89b-11e4-87fe-30cb6bb44744'),
	(35,'angelicafransson@test.se','35880240a0543c708ac5915dec8180e9f4c0670ac7163635e2eb26dd7be17cb56d5c04802dd02c11987e9903c4eadf9384ea557faea05ebd2ae84ccfb38cb773','ns32M6n9cH','Angelica','Fransson',0,0,1,77,0,'0',0,'f9b66d06-c89b-11e4-87fe-30cb6bb44744'),
	(36,'nakhlefransson@test.se','5a3c67e36253b879ed8f86c9103c7a850da8de74fa293fca1971ac5402920954ad47fe3edaa342a478cfa414125075c044773503627ccdf870862f92254e59e5','4xYY7cFFFz','Nakhle','Fransson',0,0,1,77,0,'0',0,'0df1aaba-c89c-11e4-87fe-30cb6bb44744'),
	(37,'patrikbylund@test.se','3004593f59e5d86a4d3c0b02625b45919fc9bcbdf0499549d1915a853b5f8664d9ffd979eae17727199b8f97b298f46fd0f85ddb5f225d04c3b1b7e54729bd59','fh45sN5HgB','Patrik','Bylund',0,0,1,77,0,'0',0,'533e43ee-c89c-11e4-87fe-30cb6bb44744'),
	(38,'kurtkarlsson@test.se','649c0e33c36f8a5dd6f59e364b24a9ad7ad3f123bf03e1de220f62ba5812689e2b87b4c89f9a5c03965e2819801c44d337b5716b1c05640d23f2856e0f345b4e','GxnY9tK988','Kurt','Karlsson',0,0,1,77,0,'0',0,'a3745e20-c89c-11e4-87fe-30cb6bb44744'),
	(39,'kallekarlsson@test.se','57ee584f8d86493cacaec73b3c8e67bdbc4959b9bb2de812ddd5cfc1533106d6bda1718242ddc174ef960543108feb5689ba8fb779ce9e994f72f4b664ba52cf','PGom3qukdk','Kalle','Karlsson',0,0,1,77,0,'0',0,'ae7a0a2c-c89c-11e4-87fe-30cb6bb44744'),
	(40,'lisajohansson@test.se','dbc866830cd27542c3e35c542c9449fe2755f18678fb3a708595e277ebc5282f1808ab3fce2cc44900ae44ac767ffd5a1ac815b1c71e7beb2fe63f772bd82f1f','-m1KSpDXYD','Lisa','Johansson',0,0,1,77,0,'0',0,'bec1e206-c89c-11e4-87fe-30cb6bb44744');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;