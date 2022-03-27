-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2020 at 03:20 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sketch_art_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE IF NOT EXISTS `url` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `send_url` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`order_id`, `send_url`, `user_id`) VALUES
(16, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Thu%20Dec%2003%202020%2011%3A10%3A04%20GMT%2B0530%20(India%20Standard%20Time)-chromastone-uaf.png?alt=media&token=feb86f44-79ec-453a-928a-ce641bca6535', 7),
(15, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Thu%20Dec%2003%202020%2011%3A05%3A08%20GMT%2B0530%20(India%20Standard%20Time)-chromastone-uaf.png?alt=media&token=0945b7a7-a611-47f4-87c1-2c823027421b', 7),
(14, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Thu%20Dec%2003%202020%2010%3A28%3A01%20GMT%2B0530%20(India%20Standard%20Time)-chromastone-uaf.png?alt=media&token=d857c9b4-8d3a-4b15-9edf-610a1f4f17c9', 7),
(17, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Thu%20Dec%2003%202020%2011%3A12%3A44%20GMT%2B0530%20(India%20Standard%20Time)-ben.jpg?alt=media&token=c61025d4-067c-4ce4-bc67-d3101a1b1342', 8),
(18, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Thu%20Dec%2003%202020%2021%3A44%3A51%20GMT%2B0530%20(India%20Standard%20Time)-rsharma.jpg?alt=media&token=7dd3bdf4-7f63-4370-ad71-2848c51083f4', 7),
(19, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Thu%20Dec%2003%202020%2021%3A45%3A26%20GMT%2B0530%20(India%20Standard%20Time)-rsharma.jpg?alt=media&token=70167999-eaf6-41c4-a737-2d6116269e3c', 7),
(20, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Sat%20Dec%2005%202020%2021%3A55%3A26%20GMT%2B0530%20(India%20Standard%20Time)-rsharma.jpg?alt=media&token=34f6b7f2-5de8-46f0-90b7-0b5dcb85e5f3', 7),
(21, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Mon%20Dec%2007%202020%2012%3A50%3A26%20GMT%2B0530%20(India%20Standard%20Time)-WhatsApp%20Image%202019-08-22%20at%2013.55.21%20(2).jpeg?alt=media&token=d73acf22-fbb9-4976-aead-dc39', 7),
(22, 'https://firebasestorage.googleapis.com/v0/b/imageupload-f3bf1.appspot.com/o/Mon%20Dec%2007%202020%2020%3A22%3A06%20GMT%2B0530%20(India%20Standard%20Time)-WhatsApp%20Image%202019-08-22%20at%2013.55.22%20(3).jpeg?alt=media&token=985fbb9d-ef64-479c-ae84-1a75', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_number` decimal(10,0) NOT NULL,
  `email` varchar(80) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `address_line_3` varchar(255) DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `pin` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `first_name`, `last_name`, `mobile_number`, `email`, `address_line_1`, `address_line_2`, `address_line_3`, `state`, `pin`, `password`, `city`) VALUES
(7, 'Akash', 'Singh', '9321585085', 'akash9321singh@gmail.com', 'Adivali gaon, near hanuman temple', 'Pisavali road, kalyan (E)', '', 'Maharashtra', 421306, '$2y$10$JzFu.b1sTuFSkpHunLZZ2e/YdMTSv1pd5ZpPOn8GHHVY51CLQ79KW', 'kalyan'),
(8, 'Akash', 'Singh', '9796462282', 'robinakash123@gmail.com', 'Adivali gaon, near hanuman temple', 'Pisavali road, kalyan (E)', '', 'Maharashtra', 421306, '$2y$10$2WJ.pixcXGkTlom4DXxFi.tEZH5JCTc/VZbcqHhtlgANTThmRVx7u', 'kalyan');

-- --------------------------------------------------------

--
-- Table structure for table `user_query`
--

DROP TABLE IF EXISTS `user_query`;
CREATE TABLE IF NOT EXISTS `user_query` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `query` varchar(2555) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_query`
--

INSERT INTO `user_query` (`user_id`, `name`, `email`, `query`) VALUES
(15, 'Amit Mishra', 'mishra@gmail.com', 'How I get deliver?'),
(14, 'Akash Singh', 'akash9321singh@gmail.com', 'How to send images'),
(16, 'Sumit Singh', 'sumit@gmail.com', 'How to send payment');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
