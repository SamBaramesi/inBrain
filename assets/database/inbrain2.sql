-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 11:08 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inbrain2`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `activity_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `vacature_id`, `activity_name`, `activity_value`) VALUES
(1, 1, 'schrijven', '30'),
(2, 1, 'lezen', '30'),
(3, 1, 'spreken', '40');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `header` varchar(50) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyLocation` varchar(50) NOT NULL,
  `button` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `vacature_id`, `header`, `companyName`, `companyLocation`, `button`) VALUES
(1, 1, 'Project Manager', 'inBrain', 'Utrecht - De Meern', 'Soliciteren');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `icon_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `vacature_id`, `icon`, `icon_class`, `icon_text`) VALUES
(1, 1, 'Money Bill', 'fas fa-money-bill-alt', 'Vanaf €2.400 bruto p/m (afhankelijk van kennis en '),
(2, 1, 'Calendar', 'fas fa-calendar-alt', '40-urige werkweek'),
(3, 1, 'Plane', 'fas fa-plane', '26 vakantiedagen'),
(4, 1, 'Wallet', 'fas fa-wallet', 'Persoonlijk opleidingsbudget om je te ontwikkelen '),
(5, 1, 'Shopping Bag', 'fas fa-shopping-bag', 'Laptop, reiskostenvergoeding, materiaal voor een g');

-- --------------------------------------------------------

--
-- Table structure for table `careergrowth`
--

CREATE TABLE `careergrowth` (
  `id` int(11) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `header` varchar(50) NOT NULL,
  `paragraaph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `careergrowth`
--

INSERT INTO `careergrowth` (`id`, `vacature_id`, `header`, `paragraaph`) VALUES
(1, 1, 'Groeipad', 'Als Learning Specialist bij RMMBR ben je verantwoordelijk voor het ontwikkelen van online en blended leeroplossingen voor klanten. Denk aan het opstellen van teksten voor digitale leeromgevingen, (fysieke) trainingen en onboardingstrajecten, vaak gericht op werknemers van een organisatie. Je gaat als eerst aan de slag met de outline: een gedetailleerde inhoudsopgave die je opstelt door middel van de leerdoelen. Soms krijg je die in concrete vorm aangeleverd van de klant, soms moet je die nog opstellen. Daarna ga je met het script aan de slag. Je schrijft zowel short copy voor bijvoorbeeld (tussen)koppen en klikbare elementen, als long copy waarin je inhoudelijk de diepte in gaat. Het eindresultaat is een op maat gemaakte leeroplossing voor de klant.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `contact_header` varchar(50) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_title` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `vacature_id`, `contact_header`, `contact_name`, `contact_title`, `contact_email`) VALUES
(1, 1, 'Stel direct een vraag', 'Clair', 'Office Manager', 'info@inbrain.nl');

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

CREATE TABLE `friday` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_timeStart` varchar(20) NOT NULL,
  `event_dateStart` varchar(20) NOT NULL,
  `event_timeEnd` varchar(20) NOT NULL,
  `event_dateEnd` varchar(20) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  `event_textColor` varchar(20) NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friday`
--

INSERT INTO `friday` (`id`, `vacature_id`, `event_title`, `event_timeStart`, `event_dateStart`, `event_timeEnd`, `event_dateEnd`, `event_color`, `event_textColor`, `event_description`) VALUES
(1, 1, 'Globaal ontwerp opstellen', '09:00:00', '2023-03-03', '12:15:00', '2023-03-03', '#FFFFFF', '#ADADAD', ''),
(2, 1, 'Fry-day!', '12:30:00', '2023-03-03', '13:00:00', '2023-03-03', '#F26531', '#FFFFFF', 'Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description'),
(3, 1, 'Storyboard schrijven', '13:05:00', '2023-03-03', '16:30:00', '2023-03-03', '#FFFFFF', '#ADADAD', ''),
(4, 1, 'VrijMiBo', '16:45:00', '2023-03-03', '17:30:00', '2023-03-03', '#333333', '#FFFFFF', 'Vrijdag middag Borrel. YAAAAAY !');

-- --------------------------------------------------------

--
-- Table structure for table `growthpath`
--

CREATE TABLE `growthpath` (
  `id` int(50) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `objectText` varchar(50) NOT NULL,
  `objectImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `growthpath`
--

INSERT INTO `growthpath` (`id`, `vacature_id`, `objectText`, `objectImage`) VALUES
(1, 1, 'Junior', 'img.png'),
(2, 1, 'Medior', 'img.png'),
(3, 1, 'Senior', 'img.png'),
(4, 1, 'Cracked', 'img.png');

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE `monday` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_timeStart` varchar(20) NOT NULL,
  `event_dateStart` varchar(20) NOT NULL,
  `event_timeEnd` varchar(20) NOT NULL,
  `event_dateEnd` varchar(20) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  `event_textColor` varchar(20) NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monday`
--

INSERT INTO `monday` (`id`, `vacature_id`, `event_title`, `event_timeStart`, `event_dateStart`, `event_timeEnd`, `event_dateEnd`, `event_color`, `event_textColor`, `event_description`) VALUES
(1, 1, 'Weekstart', '09:00:00', '2023-02-27', '09:30:00', '2023-02-27', '#333333', '#FFFFFF', 'Hello, This is a description'),
(2, 1, 'Storyboard schrijven', '09:45:00', '2023-02-27', '10:50:00', '2023-02-27', '#FFFFFF', '#ADADAD', ''),
(3, 1, 'Overleg inhoudsexpert', '11:00:00', '2023-02-27', '12:15:00', '2023-02-27', '#F26531', '#333333', 'Hello, This is a description'),
(4, 1, 'Lunch', '12:30:00', '2023-02-27', '13:00:00', '2023-02-27', '#FFFFFF', '#ADADAD', ''),
(5, 1, 'Ontwerp storyboard', '13:05:00', '2023-02-27', '15:55:00', '2023-02-27', '#FFFFFF', '#ADADAD', ''),
(6, 1, 'Script schrijven', '16:05:00', '2023-02-27', '17:30:00', '2023-02-27', '#FFFFFF', '#ADADAD', '');

-- --------------------------------------------------------

--
-- Table structure for table `practicalexample`
--

CREATE TABLE `practicalexample` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `peHead` varchar(50) NOT NULL,
  `quote` text NOT NULL,
  `paragraaph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `practicalexample`
--

INSERT INTO `practicalexample` (`id`, `vacature_id`, `peHead`, `quote`, `paragraaph`) VALUES
(1, 1, 'Voorbeeld uit de praktijk', 'Je moet een outline schrijven, maar hebt weinig input ontvangen van de klant. Wat doe je?', 'Als Learning Specialist bij RMMBR ben je verantwoordelijk voor het ontwikkelen van online en blended leeroplossingen voor klanten. Denk aan het opstellen van teksten voor digitale leeromgevingen, (fysieke) trainingen en onboardingstrajecten, vaak gericht op werknemers van een organisatie. Je gaat als eerst aan de slag met de outline: een gedetailleerde inhoudsopgave die je opstelt door middel van de leerdoelen. Soms krijg je die in concrete vorm aangeleverd van de klant, soms moet je die nog opstellen. Daarna ga je met het script aan de slag. Je schrijft zowel short copy voor bijvoorbeeld (tussen)koppen en klikbare elementen, als long copy waarin je inhoudelijk de diepte in gaat. Het eindresultaat is een op maat gemaakte leeroplossing voor de klant.');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `icon_text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `vacature_id`, `icon`, `icon_class`, `icon_text`) VALUES
(1, 1, 'Brain', 'fas fa-brain fa-fw', 'HBO/WO werk- en denkniveau'),
(2, 1, 'Briefcase', 'fas fa-briefcase fa-fw', 'Minimaal 2 jaar relevante werkervaring, bij voorke'),
(3, 1, 'Book', 'fas fa-book fa-fw', 'Kennis van leerbehoeftes en onderwijskundige werkv'),
(4, 1, 'Exchange', 'fas fa-exchange-alt fa-fw', 'Allerlei soorten input uit kunnen werken in duidel'),
(5, 1, 'Language Sign', 'fas fa-language fa-fw', 'Uitstekende beheersing Nederlands en Engels, zowel'),
(6, 1, 'Smiley', 'fas fa-smile fa-fw', 'Nieuwsgierig, nauwkeurig, brede interesse');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `quote_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `vacature_id`, `quote_text`) VALUES
(1, 1, 'Als je het leuk vindt om over uiteenlopende onderwerpen te schrijven op basis van briefings, gesprekken met inhoudsexperts en eigen onderzoek, en je het niet erg vindt dat je met veel deadlines te maken krijgt die elkaar soms snel opvolgen, dan is dit een baan voor jou.');

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

CREATE TABLE `thursday` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_timeStart` varchar(20) NOT NULL,
  `event_dateStart` varchar(20) NOT NULL,
  `event_timeEnd` varchar(20) NOT NULL,
  `event_dateEnd` varchar(20) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  `event_textColor` varchar(20) NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thursday`
--

INSERT INTO `thursday` (`id`, `vacature_id`, `event_title`, `event_timeStart`, `event_dateStart`, `event_timeEnd`, `event_dateEnd`, `event_color`, `event_textColor`, `event_description`) VALUES
(1, 1, 'Visuals uitwerken met designer', '09:00:00', '2023-03-02', '10:00:00', '2023-03-02', '#333333', '#FFFFFF', 'Hello, This is a description'),
(2, 1, 'Globaal ontwerp opstellen', '10:15:00', '2023-03-02', '12:15:00', '2023-03-02', '#FFFFFF', '#ADADAD', ''),
(3, 1, 'Lunch', '12:30:00', '2023-03-02', '13:00:00', '2023-03-02', '#FFFFFF', '#ADADAD', ''),
(4, 1, 'Globaal ontwerp opstellen', '13:05:00', '2023-03-02', '17:30:00', '2023-03-02', '#FFFFFF', '#ADADAD', '');

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

CREATE TABLE `tuesday` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_timeStart` varchar(20) NOT NULL,
  `event_dateStart` varchar(20) NOT NULL,
  `event_timeEnd` varchar(20) NOT NULL,
  `event_dateEnd` varchar(20) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  `event_textColor` varchar(20) NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuesday`
--

INSERT INTO `tuesday` (`id`, `vacature_id`, `event_title`, `event_timeStart`, `event_dateStart`, `event_timeEnd`, `event_dateEnd`, `event_color`, `event_textColor`, `event_description`) VALUES
(1, 1, 'Overleg projectteam', '09:00:00', '2023-02-28', '09:50:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(2, 1, 'Feedback verwerken storyboard', '10:00:00', '2023-02-28', '12:15:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(3, 1, 'Lunch', '12:30:00', '2023-02-28', '13:00:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(4, 1, 'Overleg inhoudsexpert', '13:05:00', '2023-02-28', '14:30:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(5, 1, 'Ontwikkelen module in Storyline', '14:45:00', '2023-02-28', '17:30:00', '2023-02-28', '#333333', '#FFFFFF', 'Hello, This is a description');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `vacancy_header` varchar(50) NOT NULL,
  `Paragraaph1` text NOT NULL,
  `Paragraaph2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `vacature_id`, `vacancy_header`, `Paragraaph1`, `Paragraaph2`) VALUES
(1, 1, 'Vacature', 'Als Learning Specialist bij RMMBR ben je verantwoordelijk voor het ontwikkelen van online en blended leeroplossingen voor klanten. Denk aan het opstellen van teksten voor digitale leeromgevingen, (fysieke) trainingen en onboardingstrajecten, vaak gericht op werknemers van een organisatie. Je gaat als eerst aan de slag met de outline: een gedetailleerde inhoudsopgave die je opstelt door middel van de leerdoelen. Soms krijg je die in concrete vorm aangeleverd van de klant, soms moet je die nog opstellen. Daarna ga je met het script aan de slag. Je schrijft zowel short copy voor bijvoorbeeld (tussen)koppen en klikbare elementen, als long copy waarin je inhoudelijk de diepte in gaat. Het eindresultaat is een op maat gemaakte leeroplossing voor de klant.', 'RMMBR heeft allerlei klanten, dus je werkt aan uiteenlopende projecten die verschillen qua inhoud, omvang en doorlooptijd. Dit betekent dat je je continu moet verdiepen in een ander onderwerp. Je moet de materie volledig begrijpen voordat je tekstuele uitleg hierover kunt geven. Daarom heb je regelmatig contact met de inhoudsexpert(s) en/of projectmanager aan de klantzijde. Daarnaast doe je zelf onderzoek en houd je rekening met visuele aspecten. Copy en design gaan hand in hand, dus je denkt ook mee over hoe jouw tekst visueel het beste tot zijn recht komt. Verder ben je soms betrokken bij de offertefase en denk je mee over conceptvoorstellen.');

-- --------------------------------------------------------

--
-- Table structure for table `vacature`
--

CREATE TABLE `vacature` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacature`
--

INSERT INTO `vacature` (`id`, `name`) VALUES
(1, 'projectManager');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `vacature_id`, `link`) VALUES
(1, 1, 'https://www.youtube.com/embed/lcKaqoh0GJI');

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE `wednesday` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_timeStart` varchar(20) NOT NULL,
  `event_dateStart` varchar(20) NOT NULL,
  `event_timeEnd` varchar(20) NOT NULL,
  `event_dateEnd` varchar(20) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  `event_textColor` varchar(20) NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wednesday`
--

INSERT INTO `wednesday` (`id`, `vacature_id`, `event_title`, `event_timeStart`, `event_dateStart`, `event_timeEnd`, `event_dateEnd`, `event_color`, `event_textColor`, `event_description`) VALUES
(1, 1, 'Ontwikkelen module in Storyline', '08:00:00', '2023-03-01', '11:15:00', '2023-03-01', '#FFFFFF', '#ADADAD', ''),
(2, 1, 'Overleg designer', '11:30:00', '2023-03-01', '12:15:00', '2023-03-01', '#FFFFFF', '#ADADAD', ''),
(3, 1, 'Lunch', '12:30:00', '2023-03-01', '13:00:00', '2023-03-01', '#FFFFFF', '#ADADAD', 'Hello, This is a description'),
(4, 1, 'Brainstormen voor sales aanvraag', '13:05:00', '2023-03-01', '15:00:00', '2023-03-01', '#F26531', '#333333', 'Hello, This is a description'),
(5, 1, 'Helpen bij schrijven offerte potentiele klant', '15:05:00', '2023-03-01', '16:30:00', '2023-03-01', '#FFFFFF', '#ADADAD', '');

-- --------------------------------------------------------

--
-- Table structure for table `weekday`
--

CREATE TABLE `weekday` (
  `id` int(11) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_timeStart` varchar(20) NOT NULL,
  `event_dateStart` varchar(20) NOT NULL,
  `event_timeEnd` varchar(20) NOT NULL,
  `event_dateEnd` varchar(20) NOT NULL,
  `event_color` varchar(20) NOT NULL,
  `event_textColor` varchar(20) NOT NULL,
  `event_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekday`
--

INSERT INTO `weekday` (`id`, `vacature_id`, `day`, `event_title`, `event_timeStart`, `event_dateStart`, `event_timeEnd`, `event_dateEnd`, `event_color`, `event_textColor`, `event_description`) VALUES
(1, 1, 'monday', 'Weekstart', '09:00:00', '2023-02-27', '09:30:00', '2023-02-27', '#333333', '#FFFFFF', 'Hello, This is a description'),
(2, 1, 'monday', 'Storyboard schrijven', '09:45:00', '2023-02-27', '10:50:00', '2023-02-27', '#FFFFFF', '#ADADAD', ''),
(3, 1, 'monday', 'Overleg inhoudsexpert', '11:00:00', '2023-02-27', '12:15:00', '2023-02-27', '#F26531', '#333333', 'Hello, This is a description'),
(4, 1, 'monday', 'Lunch', '12:30:00', '2023-02-27', '13:00:00', '2023-02-27', '#FFFFFF', '#ADADAD', ''),
(5, 1, 'monday', 'Ontwerp storyboard', '13:05:00', '2023-02-27', '15:55:00', '2023-02-27', '#FFFFFF', '#ADADAD', ''),
(6, 1, 'monday', 'Script schrijven', '16:05:00', '2023-02-27', '17:30:00', '2023-02-27', '#FFFFFF', '#ADADAD', ''),
(7, 1, 'tuesday', 'Overleg projectteam', '09:00:00', '2023-02-28', '09:50:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(8, 1, 'tuesday', 'Feedback verwerken storyboard', '10:00:00', '2023-02-28', '12:15:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(9, 1, 'tuesday', 'Lunch', '12:30:00', '2023-02-28', '13:00:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(10, 1, 'tuesday', 'Overleg inhoudsexpert', '13:05:00', '2023-02-28', '14:30:00', '2023-02-28', '#FFFFFF', '#ADADAD', ''),
(11, 1, 'tuesday', 'Ontwikkelen module in Storyline', '14:45:00', '2023-02-28', '17:30:00', '2023-02-28', '#333333', '#FFFFFF', 'Hello, This is a description'),
(12, 1, 'wednesday', 'Ontwikkelen module in Storyline', '08:00:00', '2023-03-01', '11:15:00', '2023-03-01', '#FFFFFF', '#ADADAD', ''),
(13, 1, 'wednesday', 'Overleg designer', '11:30:00', '2023-03-01', '12:15:00', '2023-03-01', '#FFFFFF', '#ADADAD', ''),
(14, 1, 'wednesday', 'Lunch', '12:30:00', '2023-03-01', '13:00:00', '2023-03-01', '#FFFFFF', '#ADADAD', 'Hello, This is a description'),
(15, 1, 'wednesday', 'Brainstormen voor sales aanvraag', '13:05:00', '2023-03-01', '15:00:00', '2023-03-01', '#F26531', '#333333', 'Hello, This is a description'),
(16, 1, 'wednesday', 'Helpen bij schrijven offerte potentiele klant', '15:05:00', '2023-03-01', '16:30:00', '2023-03-01', '#FFFFFF', '#ADADAD', ''),
(17, 1, 'thursday', 'Visuals uitwerken met designer', '09:00:00', '2023-03-02', '10:00:00', '2023-03-02', '#333333', '#FFFFFF', 'Hello, This is a description'),
(18, 1, 'thursday', 'Globaal ontwerp opstellen', '10:15:00', '2023-03-02', '12:15:00', '2023-03-02', '#FFFFFF', '#ADADAD', ''),
(19, 1, 'thursday', 'Lunch', '12:30:00', '2023-03-02', '13:00:00', '2023-03-02', '#FFFFFF', '#ADADAD', ''),
(20, 1, 'thursday', 'Globaal ontwerp opstellen', '13:05:00', '2023-03-02', '17:30:00', '2023-03-02', '#FFFFFF', '#ADADAD', ''),
(21, 1, 'friday', 'Globaal ontwerp opstellen', '09:00:00', '2023-03-03', '12:15:00', '2023-03-03', '#FFFFFF', '#ADADAD', ''),
(22, 1, 'friday', 'Fry-day!', '12:30:00', '2023-03-03', '13:00:00', '2023-03-03', '#F26531', '#FFFFFF', 'Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description Hello, This is a description'),
(23, 1, 'friday', 'Storyboard schrijven', '13:05:00', '2023-03-03', '16:30:00', '2023-03-03', '#FFFFFF', '#ADADAD', ''),
(24, 1, 'friday', 'VrijMiBo', '16:45:00', '2023-03-03', '17:30:00', '2023-03-03', '#333333', '#FFFFFF', 'Vrijdag middag Borrel. YAAAAAY !');

-- --------------------------------------------------------

--
-- Table structure for table `workwithus`
--

CREATE TABLE `workwithus` (
  `id` int(11) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `header` varchar(50) NOT NULL,
  `paragraaph` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workwithus`
--

INSERT INTO `workwithus` (`id`, `vacature_id`, `header`, `paragraaph`) VALUES
(1, 1, 'Werken Bij RMMBR', 'RMMBR zorgt ervoor dat de medewerkers van klanten zo goed mogelijk ondersteund worden bij hun ontwikkeling en leerproces. RMMBR leidt het project en houdt de doelen scherp in het vizier, maar wel constructief en met gevoel. De organisatie gaat continu op zoek naar mogelijkheden en nieuwe oplossingen. De ervaring van RMMBR leert dat de connectie tussen mensen en organisatie de basis is voor oplossingen zonder houdbaarheidsdatum. Daarom streeft RMMBR ernaar om het beste uit digitaal leren te halen voor de ontwikkeling van medewerkers. Bij RMMBR werken gemotiveerde professionals die enthousiast zijn over hun vak.');

-- --------------------------------------------------------

--
-- Table structure for table `workwithusicons`
--

CREATE TABLE `workwithusicons` (
  `id` int(255) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `icon_name` varchar(50) NOT NULL,
  `icon_text` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workwithusicons`
--

INSERT INTO `workwithusicons` (`id`, `vacature_id`, `icon_name`, `icon_text`, `icon_class`) VALUES
(1, 1, 'Location', 'Hoofdkantoor in Amsterdam', 'fas fa-map-marker-alt fa-iconi'),
(2, 1, 'Globe', 'Wereldwijd actief', 'fas fa-globe fa-iconi'),
(3, 1, 'Employees', '30 werknemers', 'fas fa-users fa-iconi'),
(4, 1, 'gender', '67% / 33%', 'fas fa-venus-mars fa-iconi'),
(5, 1, 'Age', 'Gem. leeftijd 35 jaar', 'fas fa-infinity fa-iconi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careergrowth`
--
ALTER TABLE `careergrowth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friday`
--
ALTER TABLE `friday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `growthpath`
--
ALTER TABLE `growthpath`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monday`
--
ALTER TABLE `monday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practicalexample`
--
ALTER TABLE `practicalexample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thursday`
--
ALTER TABLE `thursday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuesday`
--
ALTER TABLE `tuesday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacature`
--
ALTER TABLE `vacature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wednesday`
--
ALTER TABLE `wednesday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekday`
--
ALTER TABLE `weekday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workwithus`
--
ALTER TABLE `workwithus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workwithusicons`
--
ALTER TABLE `workwithusicons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `careergrowth`
--
ALTER TABLE `careergrowth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `friday`
--
ALTER TABLE `friday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `growthpath`
--
ALTER TABLE `growthpath`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monday`
--
ALTER TABLE `monday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `practicalexample`
--
ALTER TABLE `practicalexample`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thursday`
--
ALTER TABLE `thursday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tuesday`
--
ALTER TABLE `tuesday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vacature`
--
ALTER TABLE `vacature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wednesday`
--
ALTER TABLE `wednesday`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weekday`
--
ALTER TABLE `weekday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `workwithus`
--
ALTER TABLE `workwithus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workwithusicons`
--
ALTER TABLE `workwithusicons`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
