-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2022 at 06:58 PM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `password`) VALUES
('\0t\0e\0s\0t\02\0@\0g\0m\0a\0i\0l\0.\0c\0o\0m', '\01\02\03\04\05\06'),
('\0s\0i\0r\0a\0y\0n\0o\02\0@\0g\0m\0a\0i\0l\0.\0c\0o\0m', '\0s\0i\0r\0a\0y\01\02\03'),
('\0a\0d\0m\0i\0n', '\01\02\03\04\05\06');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456'),
(2, 'test', '123456'),
(3, 'guest', '123456'),
(4, 'ttt', '123456'),
(5, '1', '123');

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` text NOT NULL,
  `product_img` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_img`) VALUES
(1, 'f', ''),
(2, 'Uploaded Product 1', 'image1.jpg'),
(3, 'Uploaded Product 2', 'image2.jpg'),
(4, 's', 'image2.jpg'),
(5, 'test', 'index.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
