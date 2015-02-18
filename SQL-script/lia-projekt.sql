-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 18 feb 2015 kl 09:33
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `lia-projekt`
--
DROP DATABASE `lia-projekt`;
CREATE DATABASE IF NOT EXISTS `lia-projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `lia-projekt`;

-- --------------------------------------------------------

--
-- Tabellstruktur `application_form`
--

CREATE TABLE IF NOT EXISTS `application_form` (
  `student_guid` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `approved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `application_form`
--

INSERT INTO `application_form` (`student_guid`, `company_id`, `approved`) VALUES
('886c219f-ad1e-11e4-b658-0c8bfd7a8af4', 2, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `street_address` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `zip_code` int(5) NOT NULL,
  `city` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `website_url` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `id_contact_person` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `company`
--

INSERT INTO `company` (`id`, `name`, `street_address`, `zip_code`, `city`, `website_url`, `description`, `image`, `id_contact_person`) VALUES
(2, 'GoBrave', 'Nygatan 8', 12345, 'växjö', 'www.gobrave.se', 'hej hå', NULL, 1),
(3, 'Fortnox', 'Framtidsvägen', 12344, 'växjö', 'www.fortnox.se', 'Jobbar o sliter', NULL, 1),
(4, 'Standout', 'Rossgatan', 1234, 'växjö', 'standout.com', 'hej hoppp', NULL, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `company_tag`
--

CREATE TABLE IF NOT EXISTS `company_tag` (
`id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=3276 AUTO_INCREMENT=6 ;

--
-- Dumpning av Data i tabell `company_tag`
--

INSERT INTO `company_tag` (`id`, `company_id`, `tag_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 1),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `contact_person`
--

CREATE TABLE IF NOT EXISTS `contact_person` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `contact_person`
--

INSERT INTO `contact_person` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Johan', 'js@js.com', '349049'),
(2, '', '', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `county`
--

CREATE TABLE IF NOT EXISTS `county` (
  `county_id` int(10) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=780;

--
-- Dumpning av Data i tabell `county`
--

INSERT INTO `county` (`county_id`, `name`) VALUES
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

-- --------------------------------------------------------

--
-- Tabellstruktur `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `pdf` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `course_start` date NOT NULL,
  `course_end` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=8192 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `pdf`, `course_start`, `course_end`) VALUES
(1, 'php', 'Koda', NULL, '2015-01-20', '2015-03-01'),
(2, 'Java', 'koda java', NULL, '2015-01-20', '2015-09-03');

-- --------------------------------------------------------

--
-- Tabellstruktur `course_tag`
--

CREATE TABLE IF NOT EXISTS `course_tag` (
`id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `lia_project`
--

CREATE TABLE IF NOT EXISTS `lia_project` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `spots` int(11) NOT NULL,
  `company` varchar(256) NOT NULL,
  `estimated_time` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `lia_project`
--

INSERT INTO `lia_project` (`id`, `name`, `description`, `spots`, `company`, `estimated_time`) VALUES
(2, 'Test Projekt 2', 'Ännu mer testning', 3, 'Megaföretaget', '6 veckor'),
(3, 'Test Projekt 3qwe', 'Testar hela dagen', 1, 'Superföretaget', '7 veckor');

-- --------------------------------------------------------

--
-- Tabellstruktur `municipality`
--

CREATE TABLE IF NOT EXISTS `municipality` (
  `municipality_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `lan_id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=56;

--
-- Dumpning av Data i tabell `municipality`
--

INSERT INTO `municipality` (`municipality_id`, `name`, `lan_id`) VALUES
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

-- --------------------------------------------------------

--
-- Tabellstruktur `project_tag`
--

CREATE TABLE IF NOT EXISTS `project_tag` (
`id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=26 ;

--
-- Dumpning av Data i tabell `project_tag`
--

INSERT INTO `project_tag` (`id`, `project_id`, `tag_id`) VALUES
(9, 3, 2),
(10, 3, 3),
(11, 3, 5),
(23, 2, 4),
(24, 2, 5),
(25, 2, 6);

-- --------------------------------------------------------

--
-- Tabellstruktur `secret_key`
--

CREATE TABLE IF NOT EXISTS `secret_key` (
`id` int(11) NOT NULL,
  `key_value` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `student` int(11) NOT NULL DEFAULT '0',
  `company` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `secret_key`
--

INSERT INTO `secret_key` (`id`, `key_value`, `student`, `company`) VALUES
(1, 'asdasd', 0, 1),
(2, '_LyrdGT-e2JRchNTzEj7iF2QUs7VgAhJX_P6SLmk', 1, 0),
(3, 'uvbjQY1phe2pUXXG6-27QrWXBWW7ocJUCnwbi26j', 0, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `student_profile`
--

CREATE TABLE IF NOT EXISTS `student_profile` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `info` text COLLATE utf8_swedish_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384 AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `student_profile`
--

INSERT INTO `student_profile` (`id`, `user_id`, `phone`, `website`, `resume`, `picture`, `info`) VALUES
(1, 2, '111111', 'sad', 'responsive.zip', NULL, 'sadsda');

-- --------------------------------------------------------

--
-- Tabellstruktur `student_tag`
--

CREATE TABLE IF NOT EXISTS `student_tag` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=8192 AUTO_INCREMENT=55 ;

--
-- Dumpning av Data i tabell `student_tag`
--

INSERT INTO `student_tag` (`id`, `user_id`, `tag_id`) VALUES
(53, 2, 2),
(54, 2, 6);

-- --------------------------------------------------------

--
-- Tabellstruktur `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=7 ;

--
-- Dumpning av Data i tabell `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'CSS'),
(2, 'HTML'),
(3, 'PHP'),
(4, 'Java'),
(5, 'JS'),
(6, 'Angular');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
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
  `guid` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `token`, `firstname`, `lastname`, `course_leader`, `company_owner`, `student`, `municipality`, `online`, `last_activity`, `company_id`, `guid`) VALUES
(1, 'leader@test.se', 'fb7a1478fc1f9e3a2cdd451b321d5de5b3f6ebe417fb921eff3c4d0cdea11cea9f6214d87deab6e61064adeff85f60824bace64c87ef6fa66ba3fb841948549c', 'QDbBKMTx5q', 'Kurs', 'Ledare', 1, 0, 0, 77, 0, '0', 0, '8867d026-ad1e-11e4-b658-0c8bfd7a8af4'),
(2, 'student@test.se', '39993510ce62ccac8f1b10b2121fb72579ee217af216cd6ed80f344b12aa0e1771dc3df16275bf43b1e2b9b570459bfb99020455873043bf4fec186dd2f1ad86', 'tnRMa52bMA', 'Vanlig', 'Student', 0, 0, 1, 77, 0, '0', 0, '886c219f-ad1e-11e4-b658-0c8bfd7a8af4'),
(3, 'company@test.se', '51d146dadc34720dd718881dce5cf6e9eb25c0bcab01f2a038079515fb70a80371d90d0357afd26f758da80aa892340e4f148f8349f799dc993490145875d57a', 'UE8KZYa6cF', 'Företags', 'Ägare', 0, 1, 0, 77, 1, '0', 2, '8870be4c-ad1e-11e4-b658-0c8bfd7a8af4');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `application_form`
--
ALTER TABLE `application_form`
 ADD PRIMARY KEY (`student_guid`,`company_id`);

--
-- Index för tabell `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `company_tag`
--
ALTER TABLE `company_tag`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `contact_person`
--
ALTER TABLE `contact_person`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `county`
--
ALTER TABLE `county`
 ADD PRIMARY KEY (`county_id`);

--
-- Index för tabell `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `course_tag`
--
ALTER TABLE `course_tag`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `lia_project`
--
ALTER TABLE `lia_project`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `municipality`
--
ALTER TABLE `municipality`
 ADD PRIMARY KEY (`municipality_id`);

--
-- Index för tabell `project_tag`
--
ALTER TABLE `project_tag`
 ADD PRIMARY KEY (`id`), ADD KEY `project_id` (`project_id`), ADD KEY `tag_id` (`tag_id`);

--
-- Index för tabell `secret_key`
--
ALTER TABLE `secret_key`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `student_profile`
--
ALTER TABLE `student_profile`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `student_tag`
--
ALTER TABLE `student_tag`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `company`
--
ALTER TABLE `company`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `company_tag`
--
ALTER TABLE `company_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `contact_person`
--
ALTER TABLE `contact_person`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `course`
--
ALTER TABLE `course`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `course_tag`
--
ALTER TABLE `course_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `lia_project`
--
ALTER TABLE `lia_project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `project_tag`
--
ALTER TABLE `project_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT för tabell `secret_key`
--
ALTER TABLE `secret_key`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `student_profile`
--
ALTER TABLE `student_profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `student_tag`
--
ALTER TABLE `student_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT för tabell `tag`
--
ALTER TABLE `tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `project_tag`
--
ALTER TABLE `project_tag`
ADD CONSTRAINT `project_tag_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `lia_project` (`id`),
ADD CONSTRAINT `project_tag_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
