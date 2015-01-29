-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 29 jan 2015 kl 10:24
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
CREATE DATABASE IF NOT EXISTS `lia-projekt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lia-projekt`;

-- --------------------------------------------------------

--
-- Tabellstruktur `lia-projects`
--

DROP TABLE IF EXISTS `lia-projects`;
CREATE TABLE IF NOT EXISTS `lia-projects` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `spots` int(11) NOT NULL,
  `company` varchar(256) NOT NULL,
  `estimated_time` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `lia-projects`
--

INSERT INTO `lia-projects` (`id`, `name`, `description`, `spots`, `company`, `estimated_time`) VALUES
(1, 'Test Projekt', 'Testar som bara den!', 2, 'TestFöretaget', '8 veckor'),
(2, 'Test Projekt 2', 'Ännu mer testning', 3, 'Megaföretaget', '6 veckor'),
(3, 'Test Projekt 3', 'Testar hela dagen', 1, 'Superföretaget', '7 veckor');

-- --------------------------------------------------------

--
-- Tabellstruktur `project-tags`
--

DROP TABLE IF EXISTS `project-tags`;
CREATE TABLE IF NOT EXISTS `project-tags` (
`id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumpning av Data i tabell `project-tags`
--

INSERT INTO `project-tags` (`id`, `project_id`, `tag_id`) VALUES
(3, 1, 2),
(4, 1, 1),
(5, 2, 4),
(6, 3, 3),
(7, 3, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
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
-- Index för dumpade tabeller
--

--
-- Index för tabell `lia-projects`
--
ALTER TABLE `lia-projects`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `project-tags`
--
ALTER TABLE `project-tags`
 ADD PRIMARY KEY (`id`), ADD KEY `project_id` (`project_id`), ADD KEY `tag_id` (`tag_id`);

--
-- Index för tabell `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `lia-projects`
--
ALTER TABLE `lia-projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `project-tags`
--
ALTER TABLE `project-tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT för tabell `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `project-tags`
--
ALTER TABLE `project-tags`
ADD CONSTRAINT `project-tags_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `lia-projects` (`id`),
ADD CONSTRAINT `project-tags_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
