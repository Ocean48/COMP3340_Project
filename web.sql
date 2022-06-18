-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2021 at 04:34 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chen2d_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `password`) VALUES
('test2@gmail.com', '123456'),
('sirayno2@gmail.com', 'siray123'),
('admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_name`, `password`) VALUES
('admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `product` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `product`, `price`) VALUES
('sirayno2@gmail.com', 'Test Product 3', 880),
('sirayno2@gmail.com', 'Test Product 2', 680);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `short_info` text CHARACTER SET utf8 NOT NULL,
  `key_word` text CHARACTER SET utf8 NOT NULL,
  `upload_date` varchar(40) CHARACTER SET utf8 NOT NULL,
  `image_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url2` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url3` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url4` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url5` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url6` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`title`, `short_info`, `key_word`, `upload_date`, `image_url`, `image_url2`, `image_url3`, `image_url4`, `image_url5`, `image_url6`) VALUES
('Congratulations to NPPV & LTOT officially entering the North American market', 'Congratulations, NPPV & LTOT is officially stationed in the North American market starting today!', '', '2021, 08 02', 'https://i.ibb.co/x84KJR3/news1.png', 'https://i.ibb.co/vJDcyqp/news2.png', '', '', '', ''),
('test', 'test', 'test f', '2021, 09 23', '', '', '', '', '', ''),
('6543', '543', '543', '2022, 09 23', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `key_word` text CHARACTER SET utf8 NOT NULL,
  `image_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url2` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url3` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url4` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url5` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url6` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image_url7` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `price`, `key_word`, `image_url`, `image_url2`, `image_url3`, `image_url4`, `image_url5`, `image_url6`, `image_url7`) VALUES
('Test Product', 1299, '', 'https://i.ibb.co/GMG4z0V/image3.png', 'https://i.ibb.co/7g7cbNV/product1.png', 'https://i.ibb.co/qCLVPnc/product2.png', '', '', '', ''),
('Test Product 2', 680, '', 'https://i.ibb.co/D71KkWw/image4.png', 'https://i.ibb.co/7g7cbNV/product1.png', 'https://i.ibb.co/qCLVPnc/product2.png', '', '', '', ''),
('Test Product 3', 880, '', 'https://i.ibb.co/GMG4z0V/image3.png', 'https://i.ibb.co/7g7cbNV/product1.png', 'https://i.ibb.co/qCLVPnc/product2.png', '', '', '', ''),
('Test Product 4', 1680, '', 'https://i.ibb.co/D71KkWw/image4.png', 'https://i.ibb.co/7g7cbNV/product1.png', 'https://i.ibb.co/qCLVPnc/product2.png', '', '', '', ''),
('HDH82', 311, 'easy setup ', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
