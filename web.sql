-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2022 at 06:38 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456'),
(2, 'test', '123456'),
(3, 'guest', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` double NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `product_id`, `product_name`, `price`, `quantity`) VALUES
('sirayno2@gmail.com', 0, 'Test Product 3', 880, 0),
('sirayno2@gmail.com', 0, 'Test Product 2', 680, 0);

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
