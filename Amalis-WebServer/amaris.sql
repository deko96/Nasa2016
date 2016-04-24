-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 24, 2016 at 10:42 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`) VALUES
(3, 'The Moon and its surface', 'http://36.media.tumblr.com/7f082620231c23c88024e4a6b2b008cb/tumblr_o5uvjedKRm1uprtk3o1_1280.jpg'),
(4, 'Phases of the Moon', 'http://41.media.tumblr.com/d411a60ae7f632adfeb46e7c393d7223/tumblr_o5v6jbIKbj1sg5zmco1_1280.jpg'),
(6, 'A Satellite Orbiting the Moon', 'http://www.nasa.gov/sites/default/files/images/614611main_jsc2012e017827_alt_full.jpg'),
(7, 'The Moon captured by NASA Satellite', 'http://www.nasa.gov/sites/default/files/thumbnails/image/christmas2015fullmoon.jpg'),
(8, 'Earthrise Viewed from the Moon', 'http://solarsystem.nasa.gov/multimedia/gallery/1102_h2%20(1)_7321.jpg'),
(9, 'Apollo 17', 'http://solarsystem.nasa.gov/images/galleries/as17-140-21496_732.jpg'),
(11, 'The Moon captured by NASA Satellite pt.2', 'http://solarsystem.nasa.gov/multimedia/gallery/PIA004051.jpg'),
(12, 'The Moon Viewed from a Space Hub', 'http://solarsystem.nasa.gov/multimedia/gallery/as11_44_6642_br.jpg'),
(13, 'Apollo 11', 'https://upload.wikimedia.org/wikipedia/commons/2/22/Young_-_GPN-2000-001131.jpg'),
(14, 'Apollo 11 Base', 'http://science.nasa.gov/media/medialibrary/2006/03/15/15mar_moonquakes_resources/A11setup5.jpg'),
(15, 'The surface of the Moon', 'http://history.nasa.gov/ap11ann/kippsphotos/6611.jpg'),
(16, 'Apollo 11 Take off', 'http://www.hq.nasa.gov/office/pao/History/alsj/a11/AS11-40-5872.jpg'),
(17, 'Aldrin beside solar wind experiment', 'http://history.nasa.gov/ap11ann/kippsphotos/5873.jpg'),
(18, 'The Apollo 11 crew relaxes during training', 'http://history.nasa.gov/ap11ann/kippsphotos/34882.jpg'),
(19, 'Moonbound Apollo 11 clears the launch tower', 'http://history.nasa.gov/ap11ann/kippsphotos/39526.jpg'),
(20, 'Earthrise viewed from lunar orbit prior to landing', 'http://history.nasa.gov/ap11ann/kippsphotos/6550.jpg'),
(21, 'Neil''s Armstrong ''''One Step&quot;', 'http://40.media.tumblr.com/tumblr_m9buugLL3c1qz6f9yo1_1280.jpg'),
(22, 'The Apollo 17 crew EVA training at KSC', 'http://www.hq.nasa.gov/office/pao/History/alsj/a17/ap17-KSC-72P-438.jpg'),
(23, 'The Lunar Reconnaissance Orbiter', 'https://upload.wikimedia.org/wikipedia/commons/9/95/Lunar_Reconnaissance_Orbiter_001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `title`, `text`) VALUES
(3, 'Test Mission #1 (From Site)', 'This is a text mission inserted from the site, because if i don''t write more than 100 characters i wont be allowed to insert this shit into mysql ty.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `email`, `password`, `fullname`, `status`) VALUES
(1, 'bozinoski@outlook.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Dejan Bozhinoski', 1),
(2, 'ana@nasa.mk', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
