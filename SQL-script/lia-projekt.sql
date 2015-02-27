﻿-- Script was generated by Devart dbForge Studio for MySQL, Version 6.0.128.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 2015-02-27 11:06:39
-- Server version: 5.6.23-log
-- Client version: 4.1

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

--
-- Definition for table application_form
--
CREATE TABLE IF NOT EXISTS application_form (
  student_guid VARCHAR(255) NOT NULL DEFAULT '0',
  company_id INT(11) NOT NULL DEFAULT 0,
  approved TINYINT(1) DEFAULT NULL,
  PRIMARY KEY (student_guid, company_id)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table company
--
CREATE TABLE IF NOT EXISTS company (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  street_address VARCHAR(45) NOT NULL,
  zip_code INT(5) NOT NULL,
  city VARCHAR(45) NOT NULL,
  contact_name VARCHAR(50) DEFAULT NULL,
  contact_email VARCHAR(50) DEFAULT NULL,
  contact_phone VARCHAR(255) DEFAULT NULL,
  website_url VARCHAR(128) NOT NULL,
  description VARCHAR(1000) NOT NULL,
  image VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table company_tag
--
CREATE TABLE IF NOT EXISTS company_tag (
  id INT(11) NOT NULL AUTO_INCREMENT,
  company_id INT(11) NOT NULL,
  tag_id INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table contact_person
--
CREATE TABLE IF NOT EXISTS contact_person (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table county
--
CREATE TABLE IF NOT EXISTS county (
  county_id INT(10) UNSIGNED NOT NULL,
  name VARCHAR(45) NOT NULL DEFAULT '',
  PRIMARY KEY (county_id)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 780
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table course
--
CREATE TABLE IF NOT EXISTS course (
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL DEFAULT '',
  description VARCHAR(1000) NOT NULL DEFAULT '',
  course_start DATE NOT NULL,
  course_end DATE NOT NULL,
  file VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table course_tag
--
CREATE TABLE IF NOT EXISTS course_tag (
  id INT(11) NOT NULL AUTO_INCREMENT,
  course_id INT(11) NOT NULL,
  tag_id INT(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 29
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table lia_project
--
CREATE TABLE IF NOT EXISTS lia_project (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(256) NOT NULL,
  description VARCHAR(1024) NOT NULL,
  spots INT(11) NOT NULL,
  company_id INT(11) NOT NULL,
  estimated_time VARCHAR(256) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table municipality
--
CREATE TABLE IF NOT EXISTS municipality (
  municipality_id INT(10) UNSIGNED NOT NULL,
  name VARCHAR(255) NOT NULL DEFAULT '',
  lan_id INT(10) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (municipality_id)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 56
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table project_applicant
--
CREATE TABLE IF NOT EXISTS project_applicant (
  id INT(11) NOT NULL AUTO_INCREMENT,
  project_id INT(11) DEFAULT NULL,
  user_id INT(11) NOT NULL,
  msg VARCHAR(255) DEFAULT NULL,
  status INT(11) NOT NULL DEFAULT 0 COMMENT '0 = Ny, 1 = JA, 2 = NEJ, 3 = Genomförd',
  mailed INT(11) NOT NULL DEFAULT 0 COMMENT '0 = icke mailad, 1 = mailad',
  company_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table project_tag
--
CREATE TABLE IF NOT EXISTS project_tag (
  id INT(11) NOT NULL AUTO_INCREMENT,
  project_id INT(11) NOT NULL,
  tag_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  INDEX project_id (project_id),
  INDEX tag_id (tag_id),
  CONSTRAINT project_tag_ibfk_1 FOREIGN KEY (project_id)
    REFERENCES lia_project(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT project_tag_ibfk_4 FOREIGN KEY (tag_id)
    REFERENCES tag(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 26
AVG_ROW_LENGTH = 2730
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table secret_key
--
CREATE TABLE IF NOT EXISTS secret_key (
  id INT(11) NOT NULL AUTO_INCREMENT,
  key_value VARCHAR(255) DEFAULT NULL,
  student INT(11) NOT NULL DEFAULT 0,
  company INT(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table student_profile
--
CREATE TABLE IF NOT EXISTS student_profile (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  website VARCHAR(255) DEFAULT NULL,
  resume VARCHAR(255) DEFAULT NULL,
  picture VARCHAR(255) DEFAULT NULL,
  info TEXT DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table student_tag
--
CREATE TABLE IF NOT EXISTS student_tag (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  tag_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 65
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

--
-- Definition for table tag
--
CREATE TABLE IF NOT EXISTS tag (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(256) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 2730
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

--
-- Definition for table user
--
CREATE TABLE IF NOT EXISTS user (
  id INT(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(50) DEFAULT NULL,
  password VARCHAR(255) DEFAULT NULL,
  token VARCHAR(255) DEFAULT NULL,
  firstname VARCHAR(50) DEFAULT NULL,
  lastname VARCHAR(255) DEFAULT NULL,
  course_leader INT(11) NOT NULL DEFAULT 0,
  company_owner INT(11) NOT NULL DEFAULT 0,
  student INT(11) NOT NULL DEFAULT 0,
  municipality INT(11) DEFAULT NULL,
  online INT(11) NOT NULL DEFAULT 0,
  last_activity VARCHAR(255) NOT NULL DEFAULT '0',
  company_id INT(11) NOT NULL DEFAULT 0,
  guid VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

-- 
-- Dumping data for table application_form
--
INSERT INTO application_form VALUES
('886c219f-ad1e-11e4-b658-0c8bfd7a8af4', 2, 0);

-- 
-- Dumping data for table company
--
INSERT INTO company VALUES
(2, 'GoBrave', 'Nygatan 8', 12345, 'växjö', NULL, NULL, NULL, 'www.gobrave.se', 'hej hå', NULL),
(3, 'Fortnox', 'Framtidsvägen', 12344, 'växjö', 'asd', 'test@test.se', '65', 'www.fortnox.se', 'Jobbar o sliter', NULL),
(4, 'Standout', 'Rossgatan', 1234, 'växjö', NULL, NULL, NULL, 'standout.com', 'hej hoppp', NULL);

-- 
-- Dumping data for table company_tag
--
INSERT INTO company_tag VALUES
(1, 2, 1),
(2, 2, 2),
(4, 4, 1),
(5, 4, 2),
(8, 3, 3);

-- 
-- Dumping data for table contact_person
--
INSERT INTO contact_person VALUES
(1, 'Johan', 'js@js.com', '349049'),
(2, '', '', '');

-- 
-- Dumping data for table county
--
INSERT INTO county VALUES
(1, 'Blekinge län'),
(2, 'Dalarnas län'),
(3, 'Gotlands län'),
(4, 'Gävleborgs län'),
(5, 'Hallands län'),
(6, 'Jämtlands län'),
(7, 'Jönköpings län'),
(8, 'Kalmar län'),
(9, 'Kronobergs län'),
(10, 'Norrbottens län'),
(11, 'Skåne län'),
(12, 'Stockholms län'),
(13, 'Södermanlands län'),
(14, 'Uppsala län'),
(15, 'Värmlands län'),
(16, 'Västerbottens län'),
(17, 'Västernorrlands län'),
(18, 'Västmanlands län'),
(19, 'Västra Götalands län'),
(20, 'Örebro län'),
(21, 'Östergötlands län');

-- 
-- Dumping data for table course
--
INSERT INTO course VALUES
(1, 'Lia1', 'Koda', '2015-01-20', '2015-03-01', 'example.txt'),
(2, 'Lia2', 'Koda', '2015-03-02', '2015-04-15', NULL),
(3, 'Lia3', 'Koda', '2015-05-27', '2015-06-15', NULL);

-- 
-- Dumping data for table course_tag
--
INSERT INTO course_tag VALUES
(8, 2, 6),
(27, 1, 4),
(28, 1, 5);

-- 
-- Dumping data for table lia_project
--
INSERT INTO lia_project VALUES
(2, 'Test Projekt 2', 'Ännu mer testning', 3, 2, '6 veckor'),
(3, 'Test Projekt 3qwe', 'Testar hela dagen', 1, 3, '7 veckor');

-- 
-- Dumping data for table municipality
--
INSERT INTO municipality VALUES
(1, 'Karlshamns kommun', 1),
(2, 'Karlskrona kommun', 1),
(3, 'Olofströms kommun', 1),
(4, 'Ronneby kommun', 1),
(5, 'Sölvesborgs kommun', 1),
(6, 'Avesta kommun', 2),
(7, 'Borlänge kommun', 2),
(8, 'Falu kommun', 2),
(9, 'Gagnefs kommun', 2),
(10, 'Hedemora kommun', 2),
(11, 'Leksands kommun', 2),
(12, 'Ludvika kommun', 2),
(13, 'Malungs kommun', 2),
(14, 'Mora kommun', 2),
(15, 'Orsa kommun', 2),
(16, 'Rättviks kommun', 2),
(17, 'Smedjebackens kommun', 2),
(18, 'Säters kommun', 2),
(19, 'Vansbro kommun', 2),
(20, 'Älvdalens kommun', 2),
(21, 'Gotlands kommun', 3),
(22, 'Bollnäs kommun', 4),
(23, 'Gävle kommun', 4),
(24, 'Hofors kommun', 4),
(25, 'Hudiksvalls kommun', 4),
(26, 'Ljusdals kommun', 4),
(27, 'Nordanstigs kommun', 4),
(28, 'Ockelbo kommun', 4),
(29, 'Ovanåkers kommun', 4),
(30, 'Sandvikens kommun', 4),
(31, 'Söderhamns kommun', 4),
(32, 'Falkenbergs kommun', 5),
(33, 'Kungsbacka kommun', 5),
(34, 'Varbergs kommun', 5),
(35, 'Halmstads kommun', 5),
(36, 'Laholms kommun', 5),
(37, 'Hylte kommun', 5),
(38, 'Bergs kommun', 6),
(39, 'Bräcke kommun', 6),
(40, 'Härjedalens kommun', 6),
(41, 'Krokoms kommun', 6),
(42, 'Ragunda kommun', 6),
(43, 'Strömsunds kommun', 6),
(44, 'Åre kommun', 6),
(45, 'Östersunds kommun', 6),
(46, 'Aneby kommun', 7),
(47, 'Eksjö kommun', 7),
(48, 'Gislaveds kommun', 7),
(49, 'Gnosjö kommun', 7),
(50, 'Habo kommun', 7),
(51, 'Jönköpings kommun', 7),
(52, 'Mullsjö kommun', 7),
(53, 'Nässjö kommun', 7),
(54, 'Sävsjö kommun', 7),
(55, 'Tranås kommun', 7),
(56, 'Vaggeryds kommun', 7),
(57, 'Vetlanda kommun', 7),
(58, 'Värnamo kommun', 7),
(59, 'Borgholms kommun', 8),
(60, 'Emmaboda kommun', 8),
(61, 'Hultsfreds kommun', 8),
(62, 'Högsby kommun', 8),
(63, 'Kalmar kommun', 8),
(64, 'Mönsterås kommun', 8),
(65, 'Mörbylånga kommun', 8),
(66, 'Nybro kommun', 8),
(67, 'Oskarshamns kommun', 8),
(68, 'Torsås kommun', 8),
(69, 'Vimmerby kommun', 8),
(70, 'Västerviks kommun', 8),
(71, 'Alvesta kommun', 9),
(72, 'Lessebo kommun', 9),
(73, 'Ljungby kommun', 9),
(74, 'Markaryds kommun', 9),
(75, 'Tingsryds kommun', 9),
(76, 'Uppvidinge kommun', 9),
(77, 'Växjö kommun', 9),
(78, 'Älmhults kommun', 9),
(79, 'Arjeplogs kommun', 10),
(80, 'Arvidsjaurs kommun', 10),
(81, 'Bodens kommun', 10),
(82, 'Gällivare kommun', 10),
(83, 'Haparanda kommun', 10),
(84, 'Jokkmokks kommun', 10),
(85, 'Kalix kommun', 10),
(86, 'Kiruna kommun', 10),
(87, 'Luleå kommun', 10),
(88, 'Pajala kommun', 10),
(89, 'Piteå kommun', 10),
(90, 'Överkalix kommun', 10),
(91, 'Övertorneå kommun', 10),
(92, 'Östra Göinge kommun', 11),
(93, 'Örkelljunga kommun', 11),
(94, 'Tomelilla kommun', 11),
(95, 'Bromölla kommun', 11),
(96, 'Osby kommun', 11),
(97, 'Perstorps kommun', 11),
(98, 'Klippans kommun', 11),
(99, 'Åstorps kommun', 11),
(100, 'Båstads kommun', 11),
(101, 'Kristianstads kommun', 11),
(102, 'Simrishamns kommun', 11),
(103, 'Ängelholms kommun', 11),
(104, 'Hässleholms kommun', 11),
(105, 'Svalövs kommun', 11),
(106, 'Staffanstorps kommun', 11),
(107, 'Burlövs kommun', 11),
(108, 'Vellinge kommun', 11),
(109, 'Bjuvs kommun', 11),
(110, 'Kävlinge kommun', 11),
(111, 'Lomma kommun', 11),
(112, 'Svedala kommun', 11),
(113, 'Skurups kommun', 11),
(114, 'Sjöbo kommun', 11),
(115, 'Hörby kommun', 11),
(116, 'Höörs kommun', 11),
(117, 'Malmö stad', 11),
(118, 'Lunds kommun', 11),
(119, 'Landskrona kommun', 11),
(120, 'Helsingborgs stad', 11),
(121, 'Höganäs kommun', 11),
(122, 'Eslövs kommun', 11),
(123, 'Ystads kommun', 11),
(124, 'Trelleborgs kommun', 11),
(125, 'Botkyrka kommun', 12),
(126, 'Danderyds kommun', 12),
(127, 'Ekerö kommun', 12),
(128, 'Haninge kommun', 12),
(129, 'Huddinge kommun', 12),
(130, 'Järfälla kommun', 12),
(131, 'Lidingö kommun', 12),
(132, 'Nacka kommun', 12),
(133, 'Norrtälje kommun', 12),
(134, 'Nykvarns kommun', 12),
(135, 'Nynäshamns kommun', 12),
(136, 'Salems kommun', 12),
(137, 'Sigtuna kommun', 12),
(138, 'Sollentuna kommun', 12),
(139, 'Solna kommun', 12),
(140, 'Stockholms kommun', 12),
(141, 'Stockholms stad', 12),
(142, 'Sundbybergs kommun', 12),
(143, 'Södertälje kommun', 12),
(144, 'Tyresö kommun', 12),
(145, 'Täby kommun', 12),
(146, 'Upplands-Bro kommun', 12),
(147, 'Upplands Väsby kommun', 12),
(148, 'Vallentuna kommun', 12),
(149, 'Vaxholms kommun', 12),
(150, 'Värmdö kommun', 12),
(151, 'Österåkers kommun', 12),
(152, 'Eskilstuna kommun', 13),
(153, 'Flens kommun', 13),
(154, 'Gnesta kommun', 13),
(155, 'Katrineholms kommun', 13),
(156, 'Nyköpings kommun', 13),
(157, 'Oxelösunds kommun', 13),
(158, 'Strängnäs kommun', 13),
(159, 'Trosa kommun', 13),
(160, 'Vingåkers kommun', 13),
(161, 'Enköpings kommun', 14),
(162, 'Håbo kommun', 14),
(163, 'Knivsta kommun', 14),
(164, 'Tierps kommun', 14),
(165, 'Uppsala kommun', 14),
(166, 'Älvkarleby kommun', 14),
(167, 'Östhammars kommun', 14),
(168, 'Arvika kommun', 15),
(169, 'Eda kommun', 15),
(170, 'Filipstads kommun', 15),
(171, 'Forshaga kommun', 15),
(172, 'Grums kommun', 15),
(173, 'Hagfors kommun', 15),
(174, 'Hammarö kommun', 15),
(175, 'Karlstads kommun', 15),
(176, 'Kils kommun', 15),
(177, 'Kristinehamn kommun', 15),
(178, 'Munkfors kommun', 15),
(179, 'Storfors kommun', 15),
(180, 'Sunne kommun', 15),
(181, 'Säffle kommun', 15),
(182, 'Torsby kommun', 15),
(183, 'Årjängs kommun', 15),
(184, 'Bjurholms kommun', 16),
(185, 'Dorotea kommun', 16),
(186, 'Lycksele kommun', 16),
(187, 'Malå kommun', 16),
(188, 'Nordmalings kommun', 16),
(189, 'Norsjö kommun', 16),
(190, 'Robertsfors kommun', 16),
(191, 'Skellefteå kommun', 16),
(192, 'Sorsele kommun', 16),
(193, 'Storumans kommun', 16),
(194, 'Umeå kommun', 16),
(195, 'Vilhelmina kommun', 16),
(196, 'Vindelns kommun', 16),
(197, 'Vännäs kommun', 16),
(198, 'Åsele kommun', 16),
(199, 'Härnösands kommun', 17),
(200, 'Kramfors kommun', 17),
(201, 'Sollefteå kommun', 17),
(202, 'Sundsvalls kommun', 17),
(203, 'Timrå kommun', 17),
(204, 'Ånge kommun', 17),
(205, 'Örnsköldsviks kommun', 17),
(206, 'Arboga kommun', 18),
(207, 'Fagersta kommun', 18),
(208, 'Hallstahammars kommun', 18),
(209, 'Heby kommun', 18),
(210, 'Kungsörs kommun', 18),
(211, 'Köpings kommun', 18),
(212, 'Norbergs kommun', 18),
(213, 'Sala kommun', 18),
(214, 'Skinnskattebergs kommun', 18),
(215, 'Surahammars kommun', 18),
(216, 'Västerås stad', 18),
(217, 'Ale kommun', 19),
(218, 'Alingsås kommun', 19),
(219, 'Bengtsfors kommun', 19),
(220, 'Bollebygds kommun', 19),
(221, 'Borås stad', 19),
(222, 'Dals-Eds kommun', 19),
(223, 'Essunga kommun', 19),
(224, 'Falköpings kommun', 19),
(225, 'Färgelanda kommun', 19),
(226, 'Grästorps kommun', 19),
(227, 'Gullspångs kommun', 19),
(228, 'Göteborgs stad', 19),
(229, 'Götene kommun', 19),
(230, 'Herrljunga kommun', 19),
(231, 'Hjo kommun', 19),
(232, 'Härryda kommun', 19),
(233, 'Karlsborgs kommun', 19),
(234, 'Kungälvs kommun', 19),
(235, 'Lerums kommun', 19),
(236, 'Lidköpings kommun', 19),
(237, 'Lilla Edets kommun', 19),
(238, 'Lysekils kommun', 19),
(239, 'Mariestads kommun', 19),
(240, 'Marks kommun', 19),
(241, 'Melleruds kommun', 19),
(242, 'Munkedals kommun', 19),
(243, 'Mölndals kommun', 19),
(244, 'Orusts kommun', 19),
(245, 'Partille kommun', 19),
(246, 'Skara kommun', 19),
(247, 'Skövde kommun', 19),
(248, 'Sotenäs kommun', 19),
(249, 'Stenungsunds kommun', 19),
(250, 'Strömstads kommun', 19),
(251, 'Svenljunga kommun', 19),
(252, 'Tanums kommun', 19),
(253, 'Tibro kommun', 19),
(254, 'Tidaholms kommun', 19),
(255, 'Tjörns kommun', 19),
(256, 'Tranemo kommun', 19),
(257, 'Trollhättans stad', 19),
(258, 'Töreboda kommun', 19),
(259, 'Uddevalla kommun', 19),
(260, 'Ulricehamns kommun', 19),
(261, 'Vara kommun', 19),
(262, 'Vårgårda kommun', 19),
(263, 'Vänersborgs kommun', 19),
(264, 'Åmåls kommun', 19),
(265, 'Öckerö kommun', 19),
(266, 'Askersunds kommun', 20),
(267, 'Degerfors kommun', 20),
(268, 'Hallsbergs kommun', 20),
(269, 'Hällefors kommun', 20),
(270, 'Karlskoga kommun', 20),
(271, 'Kumla kommun', 20),
(272, 'Laxå kommun', 20),
(273, 'Lekebergs kommun', 20),
(274, 'Ljusnarsbergs kommun', 20),
(275, 'Lindesbergs kommun', 20),
(276, 'Nora kommun', 20),
(277, 'Örebro kommun', 20),
(278, 'Boxholms kommun', 21),
(279, 'Finspångs kommun', 21),
(280, 'Kinda kommun', 21),
(281, 'Linköpings kommun', 21),
(282, 'Mjölby kommun', 21),
(283, 'Motala kommun', 21),
(284, 'Norrköpings kommun', 21),
(285, 'Söderköpings kommun', 21),
(286, 'Vadstena kommun', 21),
(287, 'Valdemarsviks kommun', 21),
(288, 'Ydre kommun', 21),
(289, 'Åtvidabergs kommun', 21),
(290, 'Ödeshögs kommun', 21);

-- 
-- Dumping data for table project_applicant
--

-- Table `lia-projekt`.project_applicant does not contain any data (it is empty)

-- 
-- Dumping data for table project_tag
--
INSERT INTO project_tag VALUES
(9, 3, 2),
(10, 3, 3),
(11, 3, 5),
(23, 2, 4),
(24, 2, 5),
(25, 2, 6);

-- 
-- Dumping data for table secret_key
--
INSERT INTO secret_key VALUES
(1, 'asdasd', 0, 1),
(2, '_LyrdGT-e2JRchNTzEj7iF2QUs7VgAhJX_P6SLmk', 1, 0),
(3, 'uvbjQY1phe2pUXXG6-27QrWXBWW7ocJUCnwbi26j', 0, 1);

-- 
-- Dumping data for table student_profile
--
INSERT INTO student_profile VALUES
(1, 2, '111111', 'sad', 'responsive.zip', 'responsive.png', 'sadsda');

-- 
-- Dumping data for table student_tag
--
INSERT INTO student_tag VALUES
(63, 2, 2),
(64, 2, 6);

-- 
-- Dumping data for table tag
--
INSERT INTO tag VALUES
(1, 'CSS'),
(2, 'HTML'),
(3, 'PHP'),
(4, 'Java'),
(5, 'JS'),
(6, 'Angular');

-- 
-- Dumping data for table user
--
INSERT INTO user VALUES
(1, 'leader@test.se', 'c9c24cc11de085b31740e02d1f7d8920315f7715899530d95aec4831a8e1da9431877e06d457a8c987f0cbacd19afdd79f10931266354df7b975c436a0f43329', 'UaehfVEnPJ', 'Kurs', 'Ledare', 1, 0, 0, 77, 0, '0', 0, '8867d026-ad1e-11e4-b658-0c8bfd7a8af4'),
(2, 'student@test.se', '78c062cecf4c91555d760354a691163cc19d5883c58d552b146a6c8c670afe85fbb5d00d3079e47cda44b243116b15370372059e729c089e705afd4497fb8f12', 'rtQm1wLGHy', 'Vanlig', 'Student', 0, 0, 1, 77, 1, '0', 0, '886c219f-ad1e-11e4-b658-0c8bfd7a8af4'),
(3, 'company@test.se', '039eec1a42c39ca26021aba7341c1ebe250a920e95c0dd16ecd134094adbcab0e662dd60f1b1f34195897a314e32e20019e2fa183b914ff80c5e49c9349f02c3', 'TzTVxi6PKA', 'Företags', 'Ägare', 0, 1, 0, 77, 0, '0', 2, '8870be4c-ad1e-11e4-b658-0c8bfd7a8af4'),
(4, 'fortnox@test.se', '34bc5e31c43f7aba575e6865b311ee1ea34968afef92d4697181329002a7fa42f4b0e496666f24c5226e301c8c23e6192dcb1d4f07f22b7e3c06efdcd2a5be71', 'gLaeoBJ37Q', 'Jesper', 'Svensson', 0, 1, 0, 77, 0, '0', 3, 'd935904e-be60-11e4-b6bb-0c8bfd7a8af4');

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;