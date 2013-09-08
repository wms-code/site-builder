-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2013 at 10:30 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websibiz_builder`
--
CREATE DATABASE IF NOT EXISTS `websibiz_builder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `websibiz_builder`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `parent`) VALUES
(1, 'Agriculture', NULL),
(2, 'ArtandPhotography', NULL),
(3, 'Beauty', NULL),
(4, 'Blog', NULL),
(5, 'Blogsite', NULL),
(6, 'Business', NULL),
(7, 'CafeandRestaurant', NULL),
(8, 'Computer', NULL),
(9, 'Dating', NULL),
(10, 'DesignStudio', NULL),
(11, 'Educational', NULL),
(12, 'Electronics', NULL),
(13, 'Fashion', NULL),
(14, 'Flowers', NULL),
(15, 'FoodandDrink', NULL),
(16, 'Games', NULL),
(17, 'Gifts', NULL),
(18, 'Holiday', NULL),
(19, 'Hotel', NULL),
(20, 'Industrial', NULL),
(21, 'InteriorandFurniture', NULL),
(22, 'Jewelry', NULL),
(23, 'Media/Entertainment', NULL),
(24, 'Medicine', NULL),
(25, 'Moto/Car', NULL),
(26, 'Music', NULL),
(27, 'NightClub', NULL),
(28, 'Personal', NULL),
(29, 'Photogallery', NULL),
(30, 'Realestate', NULL),
(31, 'Sport', NULL),
(32, 'Telecommunication', NULL),
(33, 'Transport', NULL),
(34, 'Travel', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sitename` varchar(40) NOT NULL,
  `sitedescription` varchar(160) DEFAULT NULL,
  `base_themepath` varchar(60) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `user_id`, `sitename`, `sitedescription`, `base_themepath`, `date_published`) VALUES
(1, 2, 'new.com', 'test\r\n', 'quickhost', '2013-08-30 07:49:12'),
(2, 2, 'dumm.com', '''"--></style></script><script>alert("XSS By Ahsan")</script>', 'quickhost', '2013-09-05 04:17:12'),
(3, 2, 'ig54Er7gury', '', 'quickhost', '2013-09-05 04:45:14'),
(4, 2, 'dumbw', '''"--&gt;&lt;/style&gt;[removed][removed]alert&#40;"XSS By Ahsan"&#41;[removed]', 'quickhost', '2013-09-05 05:00:38'),
(5, 2, 'testsite.com', 'test site', 'quickhost', '2013-09-06 06:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(30) NOT NULL,
  `theme_path` varchar(80) NOT NULL,
  `thumb` varchar(60) NOT NULL,
  `description` varchar(160) DEFAULT NULL,
  `tags` varchar(159) DEFAULT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `themes_category`
--

CREATE TABLE IF NOT EXISTS `themes_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `themes_category`
--

INSERT INTO `themes_category` (`id`, `theme_id`, `category_id`) VALUES
(1, 1, 8),
(2, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `updated_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `salt`, `updated_timestamp`) VALUES
(2, 'admin@admin.com', 'admin', '85913f94a8564993e6a496a71d006f85', 'db69fc039dcbd2962cb4d28f5891aae1', '2013-08-10 11:22:11'),
(3, 'user1@user.com', 'user1', '3b1384cb706b608bbfc11405291d7e68', 'c3f38a9e7efe580f7b4ca6fec20ee2dd', '2013-08-10 11:27:47'),
(4, 'user2@user.com', 'user2', '3b1384cb706b608bbfc11405291d7e68', '80e4ee2345dc141ce9d1ad65501a2fe4', '2013-08-10 11:30:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
