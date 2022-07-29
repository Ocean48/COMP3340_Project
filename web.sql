-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 29, 2022 at 05:29 AM
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
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `username`, `password`) VALUES
('user2@gmail.com', 'user 2', '123456'),
('test@gmail.com', 'test', '123456'),
('user1@gmail.com', 'User', '123456'),
('user3@gmail.com', 'user3', '123456'),
('user4@gmail.com', 'User 4', '123'),
('user10@gmail.com', 'user 10', '123456');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456'),
(3, 'guest', '123456'),
(6, 'admin2', '123456'),
(7, 'admin3', '12345'),
(8, 'admin4', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(40) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `product_id`, `product_name`, `price`, `quantity`) VALUES
('sirayno2@gmail.com', 0, 'Test Product 3', 880, 0),
('sirayno2@gmail.com', 0, 'Test Product 2', 680, 0);

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

DROP TABLE IF EXISTS `layout`;
CREATE TABLE IF NOT EXISTS `layout` (
  `view` int(10) NOT NULL,
  `background_color` varchar(10) NOT NULL,
  `margin_color` varchar(10) NOT NULL,
  `margin_text_color` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`view`, `background_color`, `margin_color`, `margin_text_color`) VALUES
(0, '#ffffff', '#3f86f1', '#ffffff'),
(1, '#ffffff', '#3f86f1', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` text NOT NULL,
  `product_price` float NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_img`, `product_description`, `product_quantity`) VALUES
(1, 'Product 1', 5, 'index.jpg', ' This is product one!', -3),
(2, 'Product 2', 14, 'image1.jpg', ' This is product two!', 0),
(3, 'Product 3', 12.22, 'index.jpg', ' This is product three', 0),
(4, 'Product 4', 4, 'image1.jpg', ' This is product four!', -1),
(5, 'Product 5', 7, 'mouse17.jpg', ' This is product five!', 0),
(6, 'Product 6', 78, 'keybord1.jpg', ' This is product six!', 1),
(7, 'Product 7', 13, 'fan1.jpg', ' This is product seve', 1),
(8, 'Product 52', 7, 'mouse17.jpg', ' This is product five!', 1),
(9, 'Product 3', 12.22, 'index.jpg', ' This is product three', 1),
(10, 'Product 2', 14, 'image1.jpg', ' This is product two!', 1),
(11, 'Product 6', 78, 'keybord1.jpg', ' This is product six!', 1),
(12, 'Product 5', 7, 'mouse17.jpg', ' This is product five!', 1),
(13, 'Product 1', 4.98, 'index.jpg', ' This is product one!', 1),
(14, 'Product 5SD', 7, 'mouse17.jpg', ' This is product five!', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
