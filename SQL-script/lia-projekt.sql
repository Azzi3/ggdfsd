

--
-- Databas: `185270-yh`
--
drop database `lia-projekt`;
CREATE DATABASE `lia-projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `lia-projekt`;

-- --------------------------------------------------------

--
-- Tabellstruktur `application_form`
--

CREATE TABLE IF NOT EXISTS `application_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_guid` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '0',
  `company_id` int(11) NOT NULL DEFAULT '0',
  `approved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`student_guid`,`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `company`
--

CREATE TABLE IF NOT EXISTS `company` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384 AUTO_INCREMENT=20 ;

--
-- Dumpning av Data i tabell `company`
--

INSERT INTO `company` (`id`, `name`, `street_address`, `zip_code`, `city`, `contact_name`, `contact_email`, `contact_phone`, `website_url`, `description`, `image`, `company_email`) VALUES
(3, 'Fortnox', 'Framtidsvägen', 35531, 'växjö', 'Jesper Svensson', 'jespersvensson@test.se', '0702323442', 'www.fortnox.se', 'Fortnox är Sveriges ledande leverantör av internetbaserade program för företag, föreningar samt redovisnings- och revisionsbyråer. Affärsiden är att erbjuda ett brett sortiment av internetbaserade program som är enkla att lära sig och att använda, men som ändå är kraftfulla och funktionsrika nog för att möta de flesta behov och önskemål.', 'fortnox.png', 'fortnox@test.se'),
(11, 'Sigma', 'Växjövägen 1', 35531, 'Växjö', 'Tommie Holmberg', 'tommieholmberg@test.se', '0702323442', 'www.sigma.se', 'Sigma is a leading consulting group with the objective to make our customers more competitive. Our means is technological know-how and a constant passion for finding better solutions. We are 2,000 employees in eleven countries. Sigma is owned by Danir, a private investment company held by the Dan Olofsson family', 'sigma.png', 'sigma@test.se'),
(12, 'Visma', 'Växjövägen 1', 35531, 'Växjö', 'Peter Härder', 'peterhärder@test.se', '0702323442', 'www.vismaspcs.se', 'Drivkraften bakom Visma Spcs är och har alltid varit att skapa de allra bästa förutsättningarna för landets företag. Ett arbete som vi anser vara viktigare i dag än någonsin tidigare. Sverige behöver fler entreprenörer som kan och vill ta steget och då är våra program och tjänster en viktig pusselbit. Vi är din samarbetspartner. Nu och i framtiden.', 'visma.jpeg', 'visma@test.se'),
(13, 'JimDavis Labs', 'Växjövägen 1', 35531, 'Växjö', 'Elvis Domazetovski', 'elvisdomazetovski@test.se', '0702323442', 'www.jimdavislabs.se', 'JimDavis Labs är en webbyrå som utvecklar webbplatser, e-handelslösningar och appar för iPhone, iPad och Android med avstamp i en tydlig kommunikationsstrategi och fokus på användarvänlighet.\r\n\r\nEnligt oss betyder webbdesign att utseende och funktionalitet i samspel levererar en kommunikativ webbplats som ger användaren en upplevelse. Grafik och form implementeras enligt Responsive Webdesign', 'jimdavislabs.jpg', 'jimdavislabs@test.se'),
(14, 'Bläck & Co', 'Växjövägen 1', 35531, 'Växjö', 'Eddie Andersson', 'eddieandersson@test.se', '0702323442', 'www.black.se', 'Bläck & Co är en fullservicebyrå inom reklam, design och marknadskommunikation. \r\n\r\nVi tror på kreativitet, god form, varumärkesorienterad kommunikation och nära relationer. Det har våra kunder och samarbetspartners uppskattat sedan 1992. Vi har kontor i Växjö och Stockholm.', 'black.jpg', 'black@test.se'),
(15, 'Well Hello', 'Växjövägen 1', 35531, 'Växjö', 'Daniel Liljeblad', 'danielliljeblad@test.se', '0702323442', 'www.wellhello.se', 'Design och kommunikation är vår grej. Så har det nog alltid varit och därför bestämde vi oss hösten 2013 för att starta något nytt som vi tror på. Modeller, processer och metodik i all ära, men vi värdesätter också starka idéer och snygga produktioner. Att göra det svåra enkelt och inte krångla till det är vår utmaning. Att kunna vara stolta över varenda pixel vi levererar och behålla både skärpa och glädje i allt vi gör.\r\n\r\nVi arbetar för att du ska kunna se resultat i din verksamhet. Så enkelt är det. För att lyckas behöver vi lära känna dig och lära oss allt om din verksamhet och dina kunder. Den bästa kommunikationen gör vi tillsammans', 'wellhello.png', 'wellhello@test.se'),
(16, 'Softhouse', 'Växjövägen 1', 35531, 'Växjö', 'Henric Wästergren', 'henricwästergren@test.se', '0702323442', 'www.softhouse.se', 'Vi är ett konsultföretag som är riktigt bra på att utveckla lösningar med mjukvara och att utveckla människor och verksamheter. Detta har vi gjort sedan starten 1996 och idag är vi ett av de ledande företagen i Skandinavien på Lean & Agile. Totalt är vi cirka 200 anställda på plats i Stockholm, Göteborg, Malmö, Karlskrona och Växjö.\r\n\r\nSofthouse är ett privatägt icke noterat svenskt företag, som visat tillväxt och lönsamhet under alla år.', 'softhouse.png', 'softhout@test.se'),
(17, 'Sitedirect', 'Växjövägen 1', 35531, 'Växjö', 'Mikael Häggström', 'mikaelhäggström@test.se', '0702323442', 'www.sitedirect.se', 'Vi skapar innovativa webb- och e-handelslösningar - för dig som söker både den tekniska plattformen och en långsiktig partner som gör att din verksamhet kan växa. \r\n\r\nOavsett om du redan driver en nätbutik, om e-handel är en ny försäljningskanal eller du vill ha en avancerad webblösning så hjälper vi dig med både affärsstrategi och tekniska lösningar - med know-how, val av e-handelsplattform, webbutveckling och de drifttjänster du behöver. ', 'sitedirect.png', 'sitedirect@test.se'),
(18, 'Standout', 'Växjövägen 1', 35531, 'Växjö', 'David Elbe', 'davidelbe@test.se', '0702323442', 'www.standout.se', 'Standout består av två delar: en konsultdel som levererar webbutvecklingstjänster till andra företag och en del som bygger egna produkter.', 'standout.png', 'standout@test.se'),
(19, 'Go Brave', 'Växjövägen 1', 35531, 'Växjö', 'Mats Karlsson', 'matskarlsson@test.se', '0702323442', 'www.gobrave.se', 'På GoBrave har vi olika bakgrund med olika kunskaper och erfarenheter – noga sammansatta för att ge dig bästa möjliga verktyg för att nå dina mål. Oavsett om du vill nå ut online eller offline (eller båda samtidigt) kan vi ge dig rätt lösning.', 'gobrave.png', 'gobrave@test.se');

-- --------------------------------------------------------

--
-- Tabellstruktur `company_tag`
--

CREATE TABLE IF NOT EXISTS `company_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=3276 AUTO_INCREMENT=147 ;

--
-- Dumpning av Data i tabell `company_tag`
--

INSERT INTO `company_tag` (`id`, `company_id`, `tag_id`) VALUES
(4, 4, 1),
(5, 4, 2),
(9, 5, 3),
(10, 5, 4),
(11, 6, 3),
(12, 6, 4),
(13, 7, 3),
(14, 7, 4),
(15, 8, 4),
(16, 9, 4),
(17, 10, 4),
(18, 2, 1),
(19, 2, 2),
(20, 3, 3),
(21, 3, 4),
(22, 11, 1),
(23, 11, 2),
(24, 11, 5),
(28, 12, 1),
(29, 12, 2),
(30, 12, 4),
(35, 13, 1),
(36, 13, 2),
(37, 13, 3),
(38, 13, 5),
(39, 14, 1),
(40, 14, 2),
(43, 15, 1),
(44, 15, 2),
(45, 16, 1),
(46, 16, 2),
(47, 16, 3),
(48, 16, 5),
(49, 16, 6),
(50, 17, 1),
(51, 17, 2),
(52, 17, 3),
(53, 17, 4),
(54, 18, 1),
(55, 18, 2),
(56, 18, 3),
(57, 18, 4),
(136, 19, 1),
(137, 19, 2),
(138, 19, 3),
(139, 19, 10),
(140, 19, 12),
(141, 19, 15),
(142, 19, 16),
(143, 19, 20),
(144, 19, 21),
(145, 19, 22),
(146, 19, 25);

-- --------------------------------------------------------

--
-- Tabellstruktur `contact_person`
--

CREATE TABLE IF NOT EXISTS `contact_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
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
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`county_id`)
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `course_start` date NOT NULL,
  `course_end` date NOT NULL,
  `file` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=8192 AUTO_INCREMENT=9 ;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `course_start`, `course_end`, `file`) VALUES
(1, 'LIA 1- CMS', 'Hej svejs', '2015-04-20', '2015-06-01', 'lia1-bekraftelse.pdf'),
(2, 'LIA 2 - Nätapplikationer', 'Den studerande ska fördjupa sina kunskaper av nätapplikationer ge- nom att studera hur man på ett LIA-företaget utvecklar och föränd- rar nätapplikationer. Erfarenheter- na av LIA-perioden sammanfattas i en rapport där den studerande ska:', '2015-09-20', '2015-11-15', 'lia2-bekraftelse.pdf'),
(3, 'LIA 3 - Systemintegration', 'Den studerande ska fördjupa sina kunskaper samt bli insatt i proble- matiken kring systemintegration genom att studera hur man på LIA-företaget arbetar med integra- tion mellan olika system och platt- formar. Erfarenheterna av LIA-pe- rioden sammanfattas i en rapport där den studerande ska:', '2015-03-21', '2015-05-15', 'lia3-bekräftelse.pdf'),
(5, 'LIA 1- CMS', 'Den studerande ska fördjupa sina kunskaper av CMS-system genom att studera hur man på ett LIA- företag använder sig av ett eller flera CMS-system. Den studerande ska bli insatt i hur företaget utvecklar och förändrar CMS-system.', '2016-02-20', '2016-03-01', 'lia1-bekraftelse.pdf'),
(6, 'LIA 2 - Nätapplikationer', 'Den studerande ska fördjupa sina kunskaper av nätapplikationer ge- nom att studera hur man på ett LIA-företaget utvecklar och föränd- rar nätapplikationer. Erfarenheter- na av LIA-perioden sammanfattas i en rapport där den studerande ska:', '2016-09-21', '2016-11-16', 'lia2-bekraftelse.pdf'),
(7, 'LIA 3 - Systemintegration', 'Den studerande ska fördjupa sina kunskaper samt bli insatt i proble- matiken kring systemintegration genom att studera hur man på LIA-företaget arbetar med integra- tion mellan olika system och platt- formar. Erfarenheterna av LIA-pe- rioden sammanfattas i en rapport där den studerande ska:', '2016-03-24', '2016-05-16', 'lia3-bekraftelse.pdf'),
(8, 'Testkurs', 'Bugg', '2015-03-21', '2015-03-27', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `course_tag`
--

CREATE TABLE IF NOT EXISTS `course_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461 AUTO_INCREMENT=111 ;

--
-- Dumpning av Data i tabell `course_tag`
--

INSERT INTO `course_tag` (`id`, `course_id`, `tag_id`) VALUES
(53, 2, 1),
(54, 2, 2),
(55, 2, 6),
(56, 6, 1),
(57, 6, 2),
(58, 6, 6),
(83, 7, 1),
(84, 7, 2),
(85, 7, 3),
(91, 1, 1),
(92, 1, 2),
(93, 1, 3),
(94, 1, 18),
(95, 1, 20),
(101, 3, 1),
(102, 3, 2),
(103, 3, 3),
(104, 8, 1),
(105, 8, 2),
(106, 5, 1),
(107, 5, 2),
(108, 5, 3),
(109, 5, 18),
(110, 5, 20);

-- --------------------------------------------------------

--
-- Tabellstruktur `lia_project`
--

CREATE TABLE IF NOT EXISTS `lia_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `spots` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `estimated_time` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 AUTO_INCREMENT=7 ;

--
-- Dumpning av Data i tabell `lia_project`
--

INSERT INTO `lia_project` (`id`, `name`, `description`, `spots`, `company_id`, `estimated_time`) VALUES
(2, 'Standout projekt 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ', 3, 18, '6 veckor'),
(3, 'Fortnox projekt 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ', 1, 3, '7 veckor'),
(4, 'Standout projekt 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ', 2, 18, '8 veckor'),
(5, 'Standout projekt 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ', 4, 18, '8 veckor'),
(6, 'Fortnox projekt 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra malesuada nunc, nec iaculis arcu pulvinar at. Fusce id ligula vitae diam tempor sollicitudin id vel sem. Duis ex quam, pellentesque quis finibus et, finibus ac elit. Aenean fringilla diam nisi, ac tempus sem commodo nec. \r\n\r\nMorbi nibh nunc, scelerisque sed massa nec, varius tempus sem. Sed non magna urna. Ut semper augue id enim luctus, eu cursus nisi pulvinar.\r\n\r\nProin lacus dui, volutpat dignissim lectus eget, mattis tincidunt orci. Fusce consectetur faucibus nisl, sed lacinia velit rhoncus rutrum. Sed neque mauris, imperdiet vel ex id, ornare sollicitudin tellus. Donec hendrerit arcu sollicitudin odio lacinia sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut tempor arcu non tellus placerat, ut dignissim erat fringilla.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc quis felis in est condimentum tincidunt. Fusce bibendum, sem nec rutrum mattis, lorem nisl ', 4, 3, '6 veckor');

-- --------------------------------------------------------

--
-- Tabellstruktur `municipality`
--

CREATE TABLE IF NOT EXISTS `municipality` (
  `municipality_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL DEFAULT '',
  `lan_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`municipality_id`)
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
-- Tabellstruktur `project_applicant`
--

CREATE TABLE IF NOT EXISTS `project_applicant` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384 AUTO_INCREMENT=10 ;

--
-- Dumpning av Data i tabell `project_applicant`
--

INSERT INTO `project_applicant` (`id`, `project_id`, `user_id`, `msg`, `status`, `mailed`, `company_id`, `course_id`, `report`) VALUES
(2, 2, 29, 'asaSasaS', 3, 0, 18, 3, 'bhjbkhbhjbhouhou'),
(3, 4, 24, '', 0, 0, 18, 3, NULL),
(4, 6, 24, '', 0, 0, 3, 3, NULL),
(5, NULL, 24, '', 0, 0, 16, 3, NULL),
(6, NULL, 24, 'mcsnsdnvsdvvcvxcvxc', 0, 0, 13, 3, NULL),
(8, NULL, 29, 'huiuiy gyuo huip hup', 0, 0, 11, 1, NULL),
(9, NULL, 26, 'Jag vill CMS:a hos er! Går det?', 0, 0, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `project_tag`
--

CREATE TABLE IF NOT EXISTS `project_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=63 ;

--
-- Dumpning av Data i tabell `project_tag`
--

INSERT INTO `project_tag` (`id`, `project_id`, `tag_id`) VALUES
(43, 3, 2),
(44, 3, 3),
(45, 3, 5),
(46, 6, 1),
(47, 6, 2),
(48, 6, 18),
(49, 6, 19),
(50, 6, 24),
(51, 6, 25),
(52, 2, 4),
(53, 2, 5),
(54, 2, 6),
(55, 4, 1),
(56, 4, 2),
(57, 4, 18),
(58, 5, 1),
(59, 5, 2),
(60, 5, 18),
(61, 5, 23),
(62, 5, 25);

-- --------------------------------------------------------

--
-- Tabellstruktur `secret_key`
--

CREATE TABLE IF NOT EXISTS `secret_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_value` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `student` int(11) NOT NULL DEFAULT '0',
  `company` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461 AUTO_INCREMENT=14 ;

--
-- Dumpning av Data i tabell `secret_key`
--

INSERT INTO `secret_key` (`id`, `key_value`, `student`, `company`) VALUES
(1, 'asdasd', 0, 1),
(2, '_LyrdGT-e2JRchNTzEj7iF2QUs7VgAhJX_P6SLmk', 1, 0),
(3, 'uvbjQY1phe2pUXXG6-27QrWXBWW7ocJUCnwbi26j', 0, 1),
(6, 'qw2WiUW3LhE2cjcqxsHBewkTpcT2DvPVSEE2npSZ', 0, 1),
(7, 'LKqud9PaWRcUgRcYFFkAdq8QTJ-YY-KyJ2TMZwNK', 0, 1),
(8, '86CPHAoxfrQQH8zfZrssnYwtx5Vecd5_9vNFW353', 0, 1),
(9, 'ipc1VtPmM7CG_QSTrM8ASR2SVfxc4QNa6Q2Q-D2K', 0, 1),
(10, 'HKz49vHxDKaVn-nKALukrxwfotS8fbnPLNGJ-d7B', 0, 1),
(11, 'gsQLFtySfHiDGNXM2KbM_8ML1u3KfwGnPkZjEm3K', 0, 1),
(12, 'G4bLAjP_d5CgWk1_By26LkKRiLdqkwETpFtQQ9PU', 0, 1),
(13, 'DdyhdgtzLREewL8165Y3mGNLdzoNDoB8r1eu8yVG', 1, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `student_profile`
--

CREATE TABLE IF NOT EXISTS `student_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `info` text COLLATE utf8_swedish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=16384 AUTO_INCREMENT=22 ;

--
-- Dumpning av Data i tabell `student_profile`
--

INSERT INTO `student_profile` (`id`, `user_id`, `phone`, `website`, `resume`, `picture`, `info`) VALUES
(2, 22, '0727456080', 'www.PeterssonDesign.com', '', '', 'My name is Niklas Petersson, I’m a very energetic & positive guy from Sweden with a passion for design. I’m currently studying Application programming & Graphic design.'),
(3, 30, '123', 'bachstatter.se', '', '', 'lorem ipsum'),
(4, 24, '0706905355', 'www.MLGPROL33T.com', '', '', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"'),
(5, 25, '0735241044', '', NULL, '', '21 åring född och uppvuxen i Eksjö, går Nätapplikationsprogrammerings linjen på Yrkeshögskolan i Växjö. Har en passion för IT, design, fotografering och tv-spel.'),
(6, 40, '070133700', 'www.lisa.se', '', '', 'Proin eget lorem ac sapien facilisis pellentesque ut sed elit. Mauris placerat ipsum aliquam quam imperdiet ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer ac lectus nisi. In hac habitasse platea dictumst. Praesent vestibulum nunc lacus, fringilla luctus risus tempus ac.\r\n\r\nPellentesque risus nisl, tempus ac ornare at, euismod in diam. Morbi lobortis tortor at vulputate vestibulum. Curabitur in molestie dui, nec posuere diam. Vivamus massa ante, maximus nec mollis sed, posuere vel arcu. Donec fringilla fermentum turpis. Aenean aliquet augue ut nibh pharetra, nec eleifend purus euismod. Aliquam rutrum velit ex, quis porttitor eros varius eget. Quisque consectetur nisl ut ligula viverra, eu blandit erat ultricies.'),
(7, 21, '07344164257', '', 'cv.txt', '', ''),
(8, 23, '112', 'www.albatroscss.com', '', '', ''),
(9, 38, '0701337070', 'http://www.skurt.se', '', '', 'Proin eget lorem ac sapien facilisis pellentesque ut sed elit. Mauris placerat ipsum aliquam quam imperdiet ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer ac lectus nisi. In hac habitasse platea dictumst. Praesent vestibulum nunc lacus, fringilla luctus risus tempus ac.\r\n\r\nPellentesque risus nisl, tempus ac ornare at, euismod in diam. Morbi lobortis tortor at vulputate vestibulum. Curabitur in molestie dui, nec posuere diam. Vivamus massa ante, maximus nec mollis sed, posuere vel arcu. Donec fringilla fermentum turpis. Aenean aliquet augue ut nibh pharetra, nec eleifend purus euismod. Aliquam rutrum velit ex, quis porttitor eros varius eget. Quisque consectetur nisl ut ligula viverra, eu blandit erat ultricies.'),
(10, 35, '070133370', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae mi pellentesque, pharetra nisi quis, tincidunt nunc. Nullam non libero sit amet magna placerat pretium. Nam sed sollicitudin lectus. Sed mollis est at nulla rhoncus accumsan.\r\n\r\nUt auctor, mi ut malesuada tincidunt, lacus nulla aliquet sem, eu facilisis urna augue vel diam. In pellentesque ligula sem, a fringilla mauris rutrum at. Ut eleifend euismod dui quis tincidunt. Quisque enim nisi, scelerisque nec condimentum a, consequat eget nunc. Integer id dignissim velit. Etiam pharetra hendrerit metus, eget lobortis neque tristique sit amet. Nullam efficitur urna sollicitudin diam rhoncus tincidunt. Quisque non metus ipsum. Mauris varius nunc in sapien eleifend, eu rhoncus dui aliquet.'),
(11, 36, '070133700', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae mi pellentesque, pharetra nisi quis, tincidunt nunc. Nullam non libero sit amet magna placerat pretium. Nam sed sollicitudin lectus. Sed mollis est at nulla rhoncus accumsan. Ut auctor, mi ut malesuada tincidunt, lacus nulla aliquet sem, eu facilisis urna augue vel diam. In pellentesque ligula sem, a fringilla mauris rutrum at.\r\n\r\nUt eleifend euismod dui quis tincidunt. Quisque enim nisi, scelerisque nec condimentum a, consequat eget nunc. Integer id dignissim velit. Etiam pharetra hendrerit metus, eget lobortis neque tristique sit amet. Nullam efficitur urna sollicitudin diam rhoncus tincidunt. Quisque non metus ipsum. Mauris varius nunc in sapien eleifend, eu rhoncus dui aliquet.'),
(12, 37, '070133700', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae mi pellentesque, pharetra nisi quis, tincidunt nunc. Nullam non libero sit amet magna placerat pretium. Nam sed sollicitudin lectus. Sed mollis est at nulla rhoncus accumsan. Ut auctor, mi ut malesuada tincidunt, lacus nulla aliquet sem, eu facilisis urna augue vel diam. In pellentesque ligula sem, a fringilla mauris rutrum at. Ut eleifend euismod dui quis tincidunt.\r\n\r\nQuisque enim nisi, scelerisque nec condimentum a, consequat eget nunc. Integer id dignissim velit. Etiam pharetra hendrerit metus, eget lobortis neque tristique sit amet. Nullam efficitur urna sollicitudin diam rhoncus tincidunt. Quisque non metus ipsum. Mauris varius nunc in sapien eleifend, eu rhoncus dui aliquet.'),
(13, 39, '070133700', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae mi pellentesque, pharetra nisi quis, tincidunt nunc. Nullam non libero sit amet magna placerat pretium. Nam sed sollicitudin lectus. Sed mollis est at nulla rhoncus accumsan.\r\n\r\nUt auctor, mi ut malesuada tincidunt, lacus nulla aliquet sem, eu facilisis urna augue vel diam. In pellentesque ligula sem, a fringilla mauris rutrum at. Ut eleifend euismod dui quis tincidunt. Quisque enim nisi, scelerisque nec condimentum a, consequat eget nunc. Integer id dignissim velit. Etiam pharetra hendrerit metus, eget lobortis neque tristique sit amet. Nullam efficitur urna sollicitudin diam rhoncus tincidunt. Quisque non metus ipsum. Mauris varius nunc in sapien eleifend, eu rhoncus dui aliquet.'),
(14, 29, '8888', '', '', '', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'),
(15, 31, '0763117603', '', '', '', 'Hej, \r\nJag studerar på Växjö yrkeshögskola till nätapplikations-programmerare. På fritiden tycker jag om att programmera och göra egna projekt. \r\n'),
(16, 34, '070133700', 'hultqvistdesign.se', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet justo ac odio tincidunt vestibulum sit amet in nisi. Mauris mollis hendrerit eros in porttitor. Praesent cursus nulla vitae libero congue posuere.\r\n\r\nEtiam varius pharetra sapien, quis placerat ipsum tincidunt nec. Curabitur hendrerit, nunc in luctus iaculis, orci nisl auctor massa, vel rutrum metus erat id leo. Suspendisse metus tortor, iaculis sed elit et, tempor scelerisque mi. Vivamus hendrerit erat vitae nulla feugiat, ac molestie dolor posuere.'),
(17, 26, '070133700', 'davidahlander.se', '', '', 'Hej o hå vad jag kodar på.'),
(18, 27, '070133700', '', 'magnus karlsson - portfolio.pdf', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet justo ac odio tincidunt vestibulum sit amet in nisi. Mauris mollis hendrerit eros in porttitor. Praesent cursus nulla vitae libero congue posuere.\r\n\r\nEtiam varius pharetra sapien, quis placerat ipsum tincidunt nec. Curabitur hendrerit, nunc in luctus iaculis, orci nisl auctor massa, vel rutrum metus erat id leo. Suspendisse metus tortor, iaculis sed elit et, tempor scelerisque mi. Vivamus hendrerit erat vitae nulla feugiat, ac molestie dolor posuere.'),
(19, 28, '0704859502', 'cinnafunapps.com', '', '', 'Den spanska räven rev en annan räv.'),
(20, 32, '070133700', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet justo ac odio tincidunt vestibulum sit amet in nisi. Mauris mollis hendrerit eros in porttitor. Praesent cursus nulla vitae libero congue posuere.\r\n\r\nEtiam varius pharetra sapien, quis placerat ipsum tincidunt nec. Curabitur hendrerit, nunc in luctus iaculis, orci nisl auctor massa, vel rutrum metus erat id leo. Suspendisse metus tortor, iaculis sed elit et, tempor scelerisque mi. Vivamus hendrerit erat vitae nulla feugiat, ac molestie dolor posuere.'),
(21, 33, '070133700', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet justo ac odio tincidunt vestibulum sit amet in nisi. Mauris mollis hendrerit eros in porttitor. Praesent cursus nulla vitae libero congue posuere.\r\n\r\nEtiam varius pharetra sapien, quis placerat ipsum tincidunt nec. Curabitur hendrerit, nunc in luctus iaculis, orci nisl auctor massa, vel rutrum metus erat id leo. Suspendisse metus tortor, iaculis sed elit et, tempor scelerisque mi. Vivamus hendrerit erat vitae nulla feugiat, ac molestie dolor posuere.');

-- --------------------------------------------------------

--
-- Tabellstruktur `student_tag`
--

CREATE TABLE IF NOT EXISTS `student_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=8192 AUTO_INCREMENT=799 ;

--
-- Dumpning av Data i tabell `student_tag`
--

INSERT INTO `student_tag` (`id`, `user_id`, `tag_id`) VALUES
(63, 2, 2),
(64, 2, 6),
(289, 40, 21),
(290, 40, 22),
(291, 25, 1),
(292, 25, 2),
(293, 25, 3),
(294, 25, 4),
(295, 25, 8),
(296, 25, 10),
(297, 25, 12),
(298, 25, 16),
(299, 25, 19),
(300, 25, 22),
(301, 25, 23),
(302, 25, 24),
(303, 25, 25),
(457, 38, 4),
(458, 38, 5),
(459, 38, 6),
(460, 23, 1),
(461, 23, 2),
(462, 23, 3),
(463, 23, 4),
(464, 23, 5),
(465, 23, 6),
(466, 23, 8),
(467, 23, 9),
(468, 23, 10),
(469, 23, 11),
(470, 23, 12),
(471, 23, 13),
(472, 23, 14),
(473, 23, 15),
(474, 23, 16),
(475, 23, 18),
(476, 23, 19),
(477, 23, 21),
(478, 23, 22),
(479, 23, 23),
(480, 23, 24),
(481, 23, 25),
(482, 23, 26),
(519, 35, 1),
(520, 35, 2),
(521, 36, 1),
(522, 36, 2),
(523, 37, 1),
(524, 37, 2),
(525, 37, 3),
(526, 39, 1),
(527, 39, 2),
(528, 39, 15),
(529, 39, 26),
(530, 21, 1),
(531, 21, 2),
(532, 21, 3),
(533, 21, 5),
(534, 21, 6),
(535, 21, 8),
(536, 21, 9),
(537, 21, 10),
(538, 21, 11),
(539, 21, 12),
(540, 21, 13),
(541, 21, 14),
(542, 21, 15),
(543, 21, 16),
(544, 21, 17),
(545, 21, 18),
(546, 21, 19),
(547, 21, 20),
(548, 21, 21),
(549, 21, 22),
(550, 21, 23),
(551, 21, 24),
(552, 21, 25),
(553, 21, 26),
(565, 22, 1),
(566, 22, 2),
(567, 22, 10),
(568, 22, 12),
(569, 22, 16),
(570, 22, 17),
(571, 22, 18),
(572, 22, 21),
(573, 22, 22),
(574, 22, 23),
(575, 22, 25),
(576, 29, 1),
(577, 29, 2),
(578, 29, 3),
(579, 29, 4),
(580, 29, 6),
(581, 29, 8),
(582, 29, 15),
(583, 29, 18),
(584, 29, 19),
(585, 29, 20),
(586, 29, 23),
(587, 31, 2),
(588, 31, 4),
(589, 31, 5),
(590, 31, 6),
(591, 31, 8),
(592, 31, 12),
(593, 31, 14),
(594, 31, 15),
(595, 31, 16),
(596, 31, 19),
(597, 31, 26),
(598, 34, 1),
(599, 34, 2),
(600, 34, 3),
(601, 34, 12),
(602, 34, 16),
(603, 34, 18),
(604, 34, 19),
(605, 34, 21),
(606, 34, 22),
(607, 34, 23),
(608, 34, 25),
(634, 24, 1),
(635, 24, 2),
(636, 24, 3),
(637, 24, 4),
(638, 24, 5),
(639, 24, 6),
(640, 24, 8),
(641, 24, 9),
(642, 24, 10),
(643, 24, 11),
(644, 24, 12),
(645, 24, 13),
(646, 24, 14),
(647, 24, 15),
(648, 24, 16),
(649, 24, 17),
(650, 24, 18),
(651, 24, 19),
(652, 24, 20),
(653, 24, 21),
(654, 24, 22),
(655, 24, 23),
(656, 24, 24),
(657, 24, 25),
(658, 24, 26),
(667, 32, 1),
(668, 32, 2),
(669, 32, 3),
(670, 32, 4),
(671, 32, 8),
(672, 33, 1),
(673, 33, 2),
(674, 33, 3),
(675, 33, 4),
(676, 33, 14),
(706, 30, 5),
(707, 26, 1),
(708, 26, 2),
(709, 26, 3),
(710, 26, 4),
(711, 26, 14),
(775, 28, 1),
(776, 28, 2),
(777, 28, 3),
(778, 28, 8),
(779, 28, 12),
(780, 28, 14),
(781, 28, 15),
(782, 28, 16),
(783, 28, 19),
(784, 28, 24),
(785, 28, 25),
(791, 27, 1),
(792, 27, 2),
(793, 27, 3),
(794, 27, 18),
(795, 27, 19),
(796, 27, 23),
(797, 27, 24),
(798, 27, 25);

-- --------------------------------------------------------

--
-- Tabellstruktur `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2730 AUTO_INCREMENT=27 ;

--
-- Dumpning av Data i tabell `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'CSS3'),
(2, 'HTML5'),
(3, 'PHP'),
(4, 'Java'),
(5, 'JavaScript'),
(6, 'Angular'),
(8, 'MySql'),
(9, 'Systemintegration'),
(10, 'IT'),
(11, 'Ruby'),
(12, 'Webb'),
(13, '.Net'),
(14, 'Android'),
(15, 'Git'),
(16, 'Responsive'),
(17, 'iOS'),
(18, 'Wordpress'),
(19, 'Bootstrap'),
(20, 'Drupal'),
(21, 'Branding'),
(22, 'Grafisk Design'),
(23, 'Webb Design'),
(24, 'Back-end development'),
(25, 'Front-end development'),
(26, 'JQuery');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AVG_ROW_LENGTH=5461 AUTO_INCREMENT=41 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `token`, `firstname`, `lastname`, `course_leader`, `company_owner`, `student`, `municipality`, `online`, `last_activity`, `company_id`, `guid`) VALUES
(4, 'jespersvensson@test.se', '64c6932f6afc2c615da87131dff3a29d45f3a3c8bc9f9b4627509da2c716938474f450c8ba3e75314218bb35d9091fbecd8ab800f7ca100a7d5eed34b6df6a7a', 'rAjox6P196', 'Jesper', 'Svensson', 0, 1, 0, 77, 0, '0', 3, 'd935904e-be60-11e4-b6bb-0c8bfd7a8af4'),
(9, 'johanhovbrandt@test.se', '208b556b82a1006274706c63e8325ba243333ecd91131f2592c8246c0af073c93939f9ed33e42bb73b7d162f7bacead09bee645a3665e633bb3ef3033a8baa6e', 'nLhJhLU6Sb', 'Johan', 'Hovbrandt', 1, 0, 0, 77, 0, '0', 0, '528864c6-c896-11e4-87fe-30cb6bb44744'),
(10, 'tomsvaleklev@test.se', '3c822742bbce8a376798c6ee3028f16c143bbf71238c2dc50aafa7fee24fc4d23034e8c8a45f1b543b5a95293930085726671059e80a36ae158bf37e40a24115', 'MH-b9ihuTF', 'Tom', 'Svaleklev', 1, 0, 0, 77, 1, '0', 0, '91091d94-c896-11e4-87fe-30cb6bb44744'),
(11, 'matskarlsson@test.se', 'a3f2f3889be7ce1e8d62d7889aad45268d3d33a65971e6813472542909cc893f3167bd2dfff8331ada1d1477a61bd1b00ea35af66c11155a8a9b5955cf4046f9', 'FrXPhGdFwc', 'Mats', 'Karlsson', 0, 1, 0, 77, 0, '0', 19, '9dff0aee-c897-11e4-87fe-30cb6bb44744'),
(12, 'peterhärder@test.se', 'da6ce4344bfe70d926cf037206551c13feee59a1060403e7c1284e53fb233f64ab3a945fea48425aeadc984abf0380a9dd9f679a2d8b8026849c0664f9426835', 'L8HA5JhSrs', 'Peter', 'Härder', 0, 1, 0, 77, 0, '0', 12, '215e2eba-c898-11e4-87fe-30cb6bb44744'),
(13, 'elvisdomazetovski@test.se', 'eb19f1a2c63d2b40794d7bb3c6728ab7b3d8f77bfb336df5ce5330b4ca9ff32a630ccb237ced7a2281882059c921f7eb907a636ac6b9664543b855c6a02844ab', '8DMwRHJ_hv', 'Elvis', 'Domazetovski', 0, 1, 0, 77, 0, '0', 13, '78d94300-c898-11e4-87fe-30cb6bb44744'),
(15, 'eddieandersson@test.se', '7f2f71f924c2a5d7f00ffda8ced3b6ce9a5de4619b8f23406750431e05c2ded3e3cf41b635acbd52bd5bc2b926fe58079436b45b7bae1b89b6853092acb5e474', 'B8De8kvXGB', 'Eddie', 'Andersson', 0, 1, 0, 77, 0, '0', 14, 'aa901996-c898-11e4-87fe-30cb6bb44744'),
(16, 'danielliljeblad@test.se', 'a91788e95cdee0da29477c32ab99a240dc54a4b044f415e382078ec523ebb071ee7ab3fe4bcbe6026f30f29204486cd644e47bc76e9872cc84bcba00c60df714', 'VDdGq_KWEe', 'Daniel', 'Liljeblad', 0, 1, 0, 77, 0, '0', 15, 'd675abb6-c898-11e4-87fe-30cb6bb44744'),
(17, 'henricwästergren@test.se', '3bdef017166386b4f417d9e18c1bcf347b2dbcdfbaa6dd15d91a42b4f92e31d122c0be643f8a9203ca48c31f8b62c8affd6b57f41d99fd39d96ab3b5bbae8a3b', 'EcgLhkP66i', 'Henric', 'Wästergren', 0, 1, 0, 77, 0, '0', 16, '020022ac-c899-11e4-87fe-30cb6bb44744'),
(18, 'davidelbe@test.se', '6fce72c11fb1dcf704187649af13498bf7fe689f3973a60be4fc5190d48aeaac6f2a66e28844d2874e992a657e5a37d2e49ed14c29a2935f73027b073cb21652', 'QVXUguADHR', 'David', 'Elbe', 0, 1, 0, 77, 1, '0', 18, '330c6bc6-c899-11e4-87fe-30cb6bb44744'),
(19, 'mikaelhäggström@test.se', '7bd45655e00db956ea928ad7eece5a697336774524276efe8875e70dc749a6afdc17e7343b3fd0e1d3a0b6722607b98eba26fd6f1f7479842d04cdc0f9964082', '12TVMby8_Y', 'Mikael', 'Häggström', 0, 1, 0, 77, 0, '0', 17, '50143a78-c899-11e4-87fe-30cb6bb44744'),
(20, 'tommieholmberg@test.se', '9f6d20fbd012e84b9f94be931b6f229f499009a307cf9ed8bc216cc2dbb0de4f9191b5f3920e11e6af5b5ea476370d98a13aac4a460f9cab9ba32ec45fe04b26', '_neWk7Hj5V', 'Tommie', 'Holmberg', 0, 1, 0, 77, 0, '0', 11, '4cc44362-c89a-11e4-87fe-30cb6bb44744'),
(21, 'kristoffersvensson@test.se', '793267609d9108de1b1551ff00459ae9d6feedf455c3d8a63fbfae2682029d1802df8169555b07dff39678f4fe0edca12e52ee9cb2476c3a463b4c7507063c51', 'Vn2vwXsVry', 'Kristoffer', 'Svensson', 0, 0, 1, 77, 1, '0', 0, '6b3710ea-c89a-11e4-87fe-30cb6bb44744'),
(22, 'niklaspetersson@test.se', '740b220de411446918caaa50d91939b25b48590dbe4ba3886ac56b719fbda96b3cc3f4adab182c1027ab1a681244c0dd7a75329317302219e9bf2ae2ebcbe7e8', 'uAZ3CUMgt_', 'Niklas', 'Petersson', 0, 0, 1, 77, 1, '0', 0, 'ad5f5748-c89a-11e4-87fe-30cb6bb44744'),
(23, 'tobiasfriberg@test.se', '724b5344783f3b642d93c9d6a34295d05229889d96b6eee5de375a67983ab20f6a8754f8db4d760b94e92158f4eae650566e5c26c8c1d66d93f79d784921a451', 'eS9SPBmR2Z', 'Tobias', 'Friberg', 0, 0, 1, 77, 1, '0', 0, 'c6c9c754-c89a-11e4-87fe-30cb6bb44744'),
(24, 'hampuskvarnhammar@test.se', '472c16cfb42942ec41af07d884d83b2fdbc8671df5b4985207f2469d41783c77a753fd66dfdcd956e30b89c22b699c48a06ae956b7eb2ecf8fe4bf90a1fad4e5', 'HQ7_HFZj25', 'Hampus', 'Kvarnhammar', 0, 0, 1, 77, 1, '0', 0, 'd68e5a92-c89a-11e4-87fe-30cb6bb44744'),
(25, 'emmablixt@test.se', 'e623a62a671413217280272168114cfed8700b60c3861582a6d7aaa7f47257a0d037886a7321314e40b2bdcde82bc5313b6fdedabacbf296b6a6cb1e481748a9', '2bdqiEEJe5', 'Emma', 'Blixt', 0, 0, 1, 77, 0, '0', 0, 'e946ad60-c89a-11e4-87fe-30cb6bb44744'),
(26, 'davidahlander@test.se', '5561704699984d4e3a6b0db4ee86265cafadbc869c95edc52ef7b893ec3709c4fd73d4a0ad3cdd31711d2726da9a8aa04b19865d518470df2c8529d95e1bfe9b', 'Xd57oMx4E_', 'David', 'Åhlander', 0, 0, 1, 77, 0, '0', 0, '075beae0-c89b-11e4-87fe-30cb6bb44744'),
(27, 'magnuskarlsson@test.se', 'd9164c415aa4e198f55512a36df9772214c894d5befd7436f80dac0d8fdf90ce072b0eb8f3caa6faecc3b353fb4e506b60a3136ded3e009f879411980138a610', 'NoAP_Pe_oH', 'Magnus', 'Karlsson', 0, 0, 1, 77, 0, '0', 0, '0fc5ab12-c89b-11e4-87fe-30cb6bb44744'),
(28, 'jsamuelsson85@yahoo.se', 'a9f941e9ef3ed762b225445e1f086402467ef5a3ecd3d205b4246b6c29d71e59ecc1bd86d531ae60519d9be85333c141671bba503d37a6c3f2a03e9ac3fc20df', '2ni1Use8fX', 'Johan', 'Samuelsson', 0, 0, 1, 77, 0, '0', 0, '207d0c02-c89b-11e4-87fe-30cb6bb44744'),
(29, 'malinandersson@test.se', 'd62b90c824fb2d1fae1ead228f1c37e14fa0b0908b9ad660b83d75e659d0f014c6b10e72b26a12429dc96c6d6560fd2d4970a47c5201d211b6908074274c8b2b', 'CZA1RMxzzR', 'Malin', 'Andersson', 0, 0, 1, 77, 1, '0', 0, '4cadf3fe-c89b-11e4-87fe-30cb6bb44744'),
(30, 'joachimbachstatter@test.se', '1fa66a04931981e04b345c156d3040bf4f7ace0e756e8e88408ba54c69e68706c41a7448c2fccd1ce7f1940d160c8876ac7912222fd8e278a31e5ade75d2b681', 'xWexUYrE11', 'Joachim', 'Bachstätter', 0, 0, 1, 77, 1, '0', 0, '665b6728-c89b-11e4-87fe-30cb6bb44744'),
(31, 'kimeriksson@test.se', '7b71259395c5ccf404e643fe4e9557371f040e63bb68d5b172226dee0e05bacaee85996eb9dd2dab06dd96f9c0038c049bfab4de66c2a5da770767ea7b30d6fd', 'paVL-DbcaL', 'Kim', 'Eriksson', 0, 0, 1, 77, 1, '0', 0, '7d8985b0-c89b-11e4-87fe-30cb6bb44744'),
(32, 'danielhenriksen@test.se', 'a0054bbcb4b646939d68baeb39fbd5b073e49736f107147e21f3f10b71a05e9c624a39d713203cfd657d97ad3a0941916bc6797a20790f199423c9aa4c1aaa03', 'ck-q8E7G-9', 'Daniel', 'Henriksen', 0, 0, 1, 77, 0, '0', 0, '93746444-c89b-11e4-87fe-30cb6bb44744'),
(33, 'alexandergunnarsson@test.se', '0d44d378c762db33790841c9a1b71f1a79e1749b283c08773befd940db7c025b1acc007363cd2be8fb225dafa485a834eecedcb0faad155e2dd2ccd9dfc47a0b', 'aJzrJ95KL4', 'Alexander', 'Gunnarsson', 0, 0, 1, 77, 0, '0', 0, 'aa1b9bd6-c89b-11e4-87fe-30cb6bb44744'),
(34, 'andreashultqvist@test.se', '1ec8c43eef6a4c773288bbf303f508405306896e6f3738c1ebae8e348bc513997168b5773fdb1303e320c293e09bbf7785d6f77b879c0206371504e25a673586', 'giuvTw571f', 'Andreas', 'Hultqvist', 0, 0, 1, 77, 0, '0', 0, 'd9efe8b2-c89b-11e4-87fe-30cb6bb44744'),
(35, 'angelicafransson@test.se', 'e1fb377a0eb25beb0a883c0855da81c3b8a2f7b0a4e61901e723b04235db9385c9beaf40d9a2298ee18d6ef2b3645ee798f19694565bd3d2bc58696df3f3fee5', 'pXKfCe2ADk', 'Angelica', 'Fransson', 0, 0, 1, 77, 0, '0', 0, 'f9b66d06-c89b-11e4-87fe-30cb6bb44744'),
(36, 'nakhlefransson@test.se', '5a48a941203f5829b5c1a606dc1c4af094c75f5b8120c3d9937646383e69aa832395075cdeff3f59de7709e4971c4233a671198430198bc029088bd479d424fb', 'A92LQD58cR', 'Nakhle', 'Fransson', 0, 0, 1, 77, 0, '0', 0, '0df1aaba-c89c-11e4-87fe-30cb6bb44744'),
(37, 'patrikbylund@test.se', '448440a5797847116f6ed7890950e2e092309b7cb4e6cf044d68d2171952ecdfc8d54461e0b98f5ac9edc3fc43f5fc3bf46cb25e7b98ceafcd1d2cd8780d9e72', 'UZ1jUX8Bor', 'Patrik', 'Bylund', 0, 0, 1, 77, 0, '0', 0, '533e43ee-c89c-11e4-87fe-30cb6bb44744'),
(38, 'kurtkarlsson@test.se', 'c53afeb4f3d1c9d784551f7ed79fcbbabc5dbead562edfbf09bf2dac464a4b2989fddec6f31bf285a73b279627182e599ffc15067dd5a0aa8b648655b52fa6f5', '3tucZ5nFjm', 'Skurt', 'Karlsson', 0, 0, 1, 77, 0, '0', 0, 'a3745e20-c89c-11e4-87fe-30cb6bb44744'),
(39, 'kallekarlsson@test.se', '941c4f3fcbc9a4bc14e5d9ad09115fc8f8dc86c3a07ab8d4480405138fdff53b5ce72d50fe0c7c7a6d1ffdb78526363a58570d14e6e5655a8b0e7a54f30e666d', 'KDhfePWQ4n', 'Kalle', 'Karlsson', 0, 0, 1, 77, 0, '0', 0, 'ae7a0a2c-c89c-11e4-87fe-30cb6bb44744'),
(40, 'lisajohansson@test.se', '0a1dad0dbb7797eedbe6890ccfd36cf9b3ec85460c11a82c6df56b9b1f63dffedd67ce12ab357ae6e95515d80de4e0104d7c83e26d77b1f36c2c7e47329b0f9d', 'xjkoTuPwNb', 'Lisa', 'Johansson', 0, 0, 1, 77, 0, '0', 0, 'bec1e206-c89c-11e4-87fe-30cb6bb44744');

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `project_tag`
--
ALTER TABLE `project_tag`
  ADD CONSTRAINT `project_tag_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `lia_project` (`id`),
  ADD CONSTRAINT `project_tag_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

