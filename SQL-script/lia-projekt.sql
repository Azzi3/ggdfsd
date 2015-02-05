# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Värd: 127.0.0.1 (MySQL 5.5.38)
# Databas: lia-projekt
# Genereringstid: 2015-02-04 13:37:05 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Tabelldump company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;

INSERT INTO `company` (`id`, `name`, `street_address`, `zip_code`, `city`, `website_url`, `description`, `id_contact_person`)
VALUES
	(2,'GoBrave','Nygatan 8',12345,'växjö','www.gobrave.se','hej hå',1);

/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump company_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_tag`;

CREATE TABLE `company_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;



# Tabelldump course
# ------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `course_start` date NOT NULL,
  `course_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;

INSERT INTO `course` (`id`, `name`, `description`, `course_start`, `course_end`)
VALUES
	(1,'php','Koda','2015-01-20','2015-03-01'),
	(2,'Java','koda java','2015-01-20','2015-09-03');

/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump lia_project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lia_project`;

CREATE TABLE `lia_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `spots` int(11) NOT NULL,
  `company` varchar(256) NOT NULL,
  `estimated_time` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

LOCK TABLES `lia_project` WRITE;
/*!40000 ALTER TABLE `lia_project` DISABLE KEYS */;

INSERT INTO `lia_project` (`id`, `name`, `description`, `spots`, `company`, `estimated_time`)
VALUES
	(1,'Test Projekt','Testar som bara den!',2,'TestFöretaget','8 veckor'),
	(2,'Test Projekt 2','Ännu mer testning',3,'Megaföretaget','6 veckor'),
	(3,'Test Projekt 3','Testar hela dagen',1,'Superföretaget','7 veckor');

/*!40000 ALTER TABLE `lia_project` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump project_tag
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

LOCK TABLES `project_tag` WRITE;
/*!40000 ALTER TABLE `project_tag` DISABLE KEYS */;

INSERT INTO `project_tag` (`id`, `project_id`, `tag_id`)
VALUES
	(3,1,2),
	(4,1,1),
	(5,2,4),
	(6,3,3),
	(7,3,5);

/*!40000 ALTER TABLE `project_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;

INSERT INTO `tag` (`id`, `name`)
VALUES
	(1,'CSS'),
	(2,'HTML'),
	(3,'PHP'),
	(4,'Java'),
	(5,'JS'),
	(6,'Angular');

/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
