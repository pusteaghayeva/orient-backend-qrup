-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3304
-- Generation Time: May 26, 2021 at 12:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orient_ressamlar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `surname` (`surname`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `surname`, `username`, `email`, `password`, `status`) VALUES
(1, 'puste', 'aghayeva', 'Puste', 'puste.aghayeva@gmail.com', 'ca1dfc2d19c7771cfde8187c51f7766c', 0),
(2, 'taleh', 'farzaliyev', 'tano', 'ftaleh96@gmail.com', 'cf6aa2d1f513eb224c5878bd986a093e', 0),
(3, 'ayten', 'seyidova', 'Aytən', 'seyidova.ayten1999@gmail.com', 'a003edc1bd4f0f3caa260845166c0892', 0);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `artist_to_category`
--

DROP TABLE IF EXISTS `artist_to_category`;
CREATE TABLE IF NOT EXISTS `artist_to_category` (
  `artist_id` int(11) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `artist_translation`
--

DROP TABLE IF EXISTS `artist_translation`;
CREATE TABLE IF NOT EXISTS `artist_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `about_artist` varchar(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `flag` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Languages Data for Site';

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `default`, `status`, `flag`) VALUES
(1, 'az', 'Azerbaycan dili', 1, 1, 'azerbaijan'),
(2, 'en', 'English', 0, 1, 'united-kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `is_main` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='All media files';

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='Menu for sites';

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `type`, `parent_id`, `order_number`, `status`) VALUES
(39, NULL, 0, 1, 1),
(40, NULL, 0, 2, 1),
(41, NULL, 0, 3, 1),
(42, NULL, 0, 4, 1),
(43, NULL, 0, 6, 1),
(44, NULL, 0, 7, 1),
(45, NULL, 0, 8, 1),
(46, NULL, 40, 2, 1),
(47, NULL, 40, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_translation`
--

DROP TABLE IF EXISTS `menu_translation`;
CREATE TABLE IF NOT EXISTS `menu_translation` (
  `menu_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_translation`
--

INSERT INTO `menu_translation` (`menu_id`, `lang_id`, `name`, `slug`) VALUES
(0, 1, 'Æsas sÉ™hifÉ™mizzz', 'az/page/É™sassÉ™hifÉ™/'),
(0, 2, 'Home Page', '/en/page/structure'),
(39, 1, 'Æsas sÉ™hifÉ™', 'az/page/É™sassÉ™hifÉ™/'),
(39, 2, 'Home Page', '/en/page/homepage'),
(40, 1, 'NRB kataloq', 'az/page/nrbkataloq/'),
(40, 2, 'NRB catalog', '/en/page/nrbcatalog'),
(41, 1, 'BÃ¶lmÉ™lÉ™r', 'az/page/bolmeler/'),
(41, 2, 'Sections', '/en/page/sections'),
(42, 1, 'Arxiv', 'az/page/arxiv/'),
(42, 2, 'Archive', '/en/page/archive'),
(43, 1, 'ÆlaqÉ™', 'az/page/É™laqÉ™/'),
(43, 2, 'Contact', '/en/page/contact'),
(44, 1, 'FÉ™aliyyÉ™t', 'az/page/fÉ™aliyyÉ™t/'),
(44, 2, 'Action', '/en/page/action'),
(45, 1, 'SatÄ±ÅŸ', 'az/page/satÄ±ÅŸ/'),
(45, 2, 'Sales', '/en/page/sales'),
(46, 1, 'RÉ™ngkarlÄ±q', 'az/page/rÉ™ngkarlÄ±q/'),
(46, 2, 'Painting', '/en/page/painting'),
(47, 1, 'HeykÉ™ltÉ™raÅŸlÄ±q', 'az/page/HeykÉ™ltÉ™raÅŸlÄ±q/'),
(47, 2, 'Sculpture', '/en/page/Sculpture');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_translation`
--

DROP TABLE IF EXISTS `sales_translation`;
CREATE TABLE IF NOT EXISTS `sales_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) DEFAULT NULL,
  `technique` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `facebook` varchar(150) NOT NULL,
  `twitter` int(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting_translation`
--

DROP TABLE IF EXISTS `setting_translation`;
CREATE TABLE IF NOT EXISTS `setting_translation` (
  `setting_id` int(11) NOT NULL,
  `setting_title` varchar(255) NOT NULL,
  `setting_description` varchar(255) NOT NULL,
  `setting_keywords` varchar(255) NOT NULL,
  `setting_adress` varchar(255) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `surname`, `image`, `status`) VALUES
(52, 'FÉ™rqanÉ™', 'Seyidova', '', 1),
(53, 'FÉ™rqanÉ™', 'Seyidova', '2.jpg', 1),
(54, 'KÃ¶nÃ¼l', 'KazÄ±mlÄ±', '3.jpg', 1),
(55, 'TÉ™nzilÉ™', 'Ä°badova', '4.jpg', 1),
(56, 'BaÄŸdagÃ¼l', 'HÃ¼seynova', '5.jpg', 1),
(57, 'MÉ™hÉ™mmÉ™d', 'HÉ™sÉ™nli', '6.jpg', 1),
(58, 'HÉ™cÉ™rafty', 'BÉ™ylÉ™rova', '11.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_translation`
--

DROP TABLE IF EXISTS `slider_translation`;
CREATE TABLE IF NOT EXISTS `slider_translation` (
  `text` varchar(255) DEFAULT NULL,
  `slider_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_translation`
--

INSERT INTO `slider_translation` (`text`, `slider_id`, `lang_id`, `about`) VALUES
('', 53, 1, ''),
('', 53, 2, ''),
('lorem ipsum', 54, 1, ''),
('lorem ipsum1', 54, 2, ''),
('lorem', 55, 1, ''),
('lorem', 55, 2, ''),
('lorem ipsum sit', 56, 1, ''),
('lorem ipsum sit', 56, 2, ''),
('loremsss', 57, 1, '1234'),
('loremsss', 57, 2, ''),
('asddffsdfgd', 58, 1, ''),
('', 58, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `works_translation`
--

DROP TABLE IF EXISTS `works_translation`;
CREATE TABLE IF NOT EXISTS `works_translation` (
  `work_id` int(11) NOT NULL,
  `work_name` varchar(255) NOT NULL,
  `work_about` varchar(255) NOT NULL,
  `lang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
