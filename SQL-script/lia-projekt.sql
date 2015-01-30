-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 30 jan 2015 kl 13:52
-- Serverversion: 5.5.32
-- PHP-version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `lia-projekt`
--
CREATE DATABASE IF NOT EXISTS `lia-projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `lia-projekt`;

-- --------------------------------------------------------

--
-- Tabellstruktur `buisnesses`
--

CREATE TABLE IF NOT EXISTS `buisnesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `street_address` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `zip_code` int(5) NOT NULL,
  `city` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `website_url` varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
  `id_contact_person` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `buisnesses`
--

INSERT INTO `buisnesses` (`id`, `name`, `street_address`, `zip_code`, `city`, `website_url`, `description`, `id_contact_person`) VALUES
(1, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `lia_projects`
--

CREATE TABLE IF NOT EXISTS `lia_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `spots` int(11) NOT NULL,
  `company` varchar(256) NOT NULL,
  `estimated_time` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `lia_projects`
--

INSERT INTO `lia_projects` (`id`, `name`, `description`, `spots`, `company`, `estimated_time`) VALUES
(1, 'Test Projekt', 'Testar som bara den!', 2, 'TestFöretaget', '8 veckor'),
(2, 'Test Projekt 2', 'Ännu mer testning', 3, 'Megaföretaget', '6 veckor'),
(3, 'Test Projekt 3', 'Testar hela dagen', 1, 'Superföretaget', '7 veckor');

-- --------------------------------------------------------

--
-- Tabellstruktur `project_tags`
--

CREATE TABLE IF NOT EXISTS `project_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumpning av Data i tabell `project_tags`
--

INSERT INTO `project_tags` (`id`, `project_id`, `tag_id`) VALUES
(3, 1, 2),
(4, 1, 1),
(5, 2, 4),
(6, 3, 3),
(7, 3, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumpning av Data i tabell `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'CSS'),
(2, 'HTML'),
(3, 'PHP'),
(4, 'Java'),
(5, 'JS'),
(6, 'Angular');

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `project_tags`
--
ALTER TABLE `project_tags`
  ADD CONSTRAINT `project_tags_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `lia_projects` (`id`),
  ADD CONSTRAINT `project_tags_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
