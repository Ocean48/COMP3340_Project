-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2022 at 05:39 AM
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
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `postcodes` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `email`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `city`, `province`, `country`, `postcodes`) VALUES
(1, 'user2@gmail.com', 'user 2', '123456', '', '', '', '', '', '', '', ''),
(3, 'user1@gmail.com', 'user 1', '123456', 'Jo', 'Doe', '123456789', '24 Strees', 'City', 'PO', 'CO', '6D8 J8T'),
(4, 'user3@gmail.com', 'user3', '123456', '', '', '', '', '', '', '', ''),
(5, 'user4@gmail.com', 'User 4', '123456', '', '', '', '', '', '', '', ''),
(6, 'user10@gmail.com', 'user 10', '123456', '', '', '', '', '', '', '', ''),
(7, 'user5@gmail.com', 'user 5', '123456', 'John', 'Doe', '123456789', '33 The Rodde St.', 'New York', 'A', 'U', 'D8C7W7'),
(8, 'user6@gmail.com', 'user6', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'user7@gmail.com', 'user7', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `quantity` int(10) NOT NULL,
  `added_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `product_id`, `quantity`, `added_time`) VALUES
('user5@gmail.com', 3, 1, '2022-08-01 06:15:07'),
('user5@gmail.com', 2, 2, '2022-08-01 06:15:05'),
('user5@gmail.com', 2, 2, '2022-08-01 06:03:09'),
('user5@gmail.com', 5, 1, '2022-08-01 06:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

DROP TABLE IF EXISTS `layout`;
CREATE TABLE IF NOT EXISTS `layout` (
  `view` int(10) NOT NULL,
  `background_color` varchar(10) NOT NULL,
  `margin_color` varchar(10) NOT NULL,
  `margin_text_color` varchar(10) NOT NULL,
  `shipping_policy` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `return_policy` text NOT NULL,
  `tandc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`view`, `background_color`, `margin_color`, `margin_text_color`, `shipping_policy`, `privacy_policy`, `return_policy`, `tandc`) VALUES
(0, '#f3f3f3', '#3f86f1', '#ffffff', '', '', '', ''),
(1, '#f3f3f3', '#3f86f1', '#ffffff', '<h2>Shipping Policy</h2><hr><p><br><strong>USA &amp; Canada Orders</strong><br>Most deliveries within the US &amp; Canada should arrive within 7 days after your shipping confirmation email is received.</p><p>&nbsp;</p><p><strong>Worldwide Orders</strong><br>Deliveries outside of the US &amp; Canada may take anywhere from 7-30 days to arrive, depending on the destination country.</p><p>&nbsp;</p><p>&nbsp;</p><h2>Customs &amp; Duty Fess</h2><p>Customers are responsible for any customs and duty fees, which may be assessed to your order once it arrives in the destination country. <strong>We does not include any coverage for customs or duty fees in quoted shipping costs, or at any point in our checkout or billing process.</strong></p><p><br>&nbsp;</p><p>If you have any questions related to customs, duty, and import charges, please contact your local customs office prior to ordering.</p>', '<h2>Privacy Policy</h2><hr><h4><strong>Creator Warehouse, Inc. Privacy Policy</strong></h4><p><br>&nbsp;</p><p>This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from this â€œSiteâ€.</p><p><br>&nbsp;</p><h4>PERSONAL INFORMATION WE COLLECT</h4><p><br>&nbsp;</p><p>When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically-collected information as â€œDevice Information.â€</p><p><br>&nbsp;</p><p>We collect Device Information using the following technologies:</p><p><br>&nbsp;</p><p>- â€œCookiesâ€ are data files that are placed on your device or computer and often include an anonymous unique identifier. For more information about cookies, and how to disable cookies, visit http://www.allaboutcookies.org.</p><p>- â€œLog filesâ€ track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps</p><p>- â€œWeb beacons,â€ â€œtags,â€ and â€œpixelsâ€ are electronic files used to record information about how you browse the Site.</p><p><br>&nbsp;</p><p>Additionally when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, payment information (including credit card numbers &amp; PayPal information), email address, and phone number. We refer to this information as â€œOrder Information.â€</p><p><br>&nbsp;</p><p>When we talk about â€œPersonal Informationâ€ in this Privacy Policy, we are talking both about Device Information and Order Information.</p><p><br>&nbsp;</p><h4>HOW DO WE USE YOUR PERSONAL INFORMATION?</h4><p><br>&nbsp;</p><p>We use the Order Information that we collect generally to fulfill any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations). Additionally, we use this Order Information to:</p><p>Communicate with you;</p><p>Screen our orders for potential risk or fraud; and</p><p>When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.</p><p>We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site (for example, by generating analytics about how our customers browse and interact with the Site, and to assess the success of our marketing and advertising campaigns).</p><p><br>&nbsp;</p><h4>SHARING YOUR PERSONAL INFORMATION</h4><p><br>&nbsp;</p><p>We share your Personal Information with third parties to help us use your Personal Information, as described above. For example.</p><p><br>&nbsp;</p><p>Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful request for information we receive, or to otherwise protect our rights.</p><p><br>&nbsp;</p><h4>BEHAVIOURAL ADVERTISING</h4><p><br>&nbsp;</p><p>As described above, we use your Personal Information to provide you with targeted advertisements or marketing communications we believe may be of interest to you. For more information about how targeted advertising works, you can visit the Network Advertising Initiativeâ€™s (â€œNAIâ€) educational page at http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work.</p><p><br>&nbsp;</p><p>You can opt out of targeted advertising by:</p><p>FACEBOOK - https://www.facebook.com/settings/?tab=ads</p><p>GOOGLE - https://www.google.com/settings/ads/anonymous</p><p>BING - https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads</p><p><br>&nbsp;</p><p>Additionally, you can opt out of some of these services by visiting the Digital Advertising Allianceâ€™s opt-out portal at: http://optout.aboutads.info/.</p><p><br>&nbsp;</p><h4>DO NOT TRACK</h4><p><br>&nbsp;</p><p>Please note that we do not alter our Siteâ€™s data collection and use practices when we see a Do Not Track signal from your browser.</p><p><br>&nbsp;</p><h4>YOUR RIGHTS</h4><p><br>&nbsp;</p><p>If you are a European resident, you have the right to access personal information we hold about you and to ask that your personal information be corrected, updated, or deleted. If you would like to exercise this right, please contact us through the contact information below.</p><p><br>&nbsp;</p><p>Additionally, if you are a European resident we note that we are processing your information in order to fulfill contracts we might have with you (for example if you make an order through the Site), or otherwise to pursue our legitimate business interests listed above. Additionally, please note that your information will be transferred outside of Europe, including to Canada and the United States.</p><p><br>&nbsp;</p><h4>DATA RETENTION</h4><p><br>&nbsp;</p><p>When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.</p><p><br>&nbsp;</p><h4>CHANGES</h4><p><br>&nbsp;</p><p>We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.</p><p><br>&nbsp;</p><h4>CONTACT US</h4><p><br>&nbsp;</p><p>For more information about our privacy practices, if you have questions, or if you would like to make a complaint, please contact us by e-mail at support@email.com</p>', '<h2>Return Policy</h2><hr><p><br><br>&nbsp;</p><p>We aims to provide a happy shopping experience for all of our customers, but we do understand that sometimes a product is just not right for you. We aim to make our returns and exchanges program as simple as possible for our valued customers.</p><p><br>&nbsp;</p><p>Returns - We will issue a full refund, including any applicable sales taxes, for any products returned within the requirements outlined below. <strong>Please note that any shipping fees you may have paid in connection with your purchase are non-refundable.</strong></p><p><br>&nbsp;</p><p>Exchanges - Free for equal value products. If you choose to exchange for higher value products, we will collect the difference from you prior to shipping. For lower value products, we will refund the difference to your original payment method. Exchanges will be shipped to the same address as your last order unless otherwise specified. Shipping for exchanges is free.</p><p><br>&nbsp;</p><p>Note to customers outside the US &amp; Canada: <strong>Refunds for any import/customs/duty fees charged to you at the time of import or delivery should be sought through your local customs bureau. we cannot provide any coverage for this.</strong></p><p><br><br>&nbsp;</p><h4>Requirements for returns &amp; exchanges</h4><p><br>&nbsp;</p><p>Within 30 days - you must contact our site by email about any issues with your order within 30 days of delivery</p><p><br>&nbsp;</p><p>Includes original packaging &amp; product in like-new condition - any returned product(s) must be returned with any original packaging, and in the condition which the product(s) arrived. If your return is accepted, we will issue a refund or an exchange depending on your stated preference.</p><p><br>&nbsp;</p><p>We may reject the returned product if there is damage to the product and/or product packaging. If a returned product is rejected, no refund will be issued to the customer, and the customer may choose to have the product shipped back to them at their own cost. If the customer chooses not to ship the product back to them, We will recycle or dispose of the product.</p><p><br><br>&nbsp;</p><h4>Process</h4><p><br>&nbsp;</p><p>1. Contact our at the email listed in our siteâ€™s footer or contact page.</p><p><br>&nbsp;</p><p>2. If an order or product is deemed eligible for return by our support, we will email you a return label. Follow the instructions in the return label email to ship the product back to our distribution facility.</p><p><br>&nbsp;</p><p>3. Drop the package off at the any of shipping company near by your location.</p><p><br>&nbsp;</p><p>4. Reply to your email from our site to confirm.</p><p><br><br>&nbsp;</p><p>If you have any additional questions about our returns process, or any other aspect of our purchase experience, please contact support at the email listed in our siteâ€™s footer or contact page</p><p><br><br>&nbsp;</p><p>Thank you for shopping with us!</p>', '<h2>Terms and Conditions</h2><hr><p><br><br>&nbsp;</p><h4>OVERVIEW</h4><p><br>&nbsp;</p><p>This website is operated by COMP3340 Group project. Throughout the site, the terms â€œweâ€, â€œusâ€ and â€œourâ€ refer to this website. we offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here</p><p><br>&nbsp;</p><p>By visiting our site and/ or purchasing something from us, you engage in our â€œServiceâ€ and agree to be bound by the following terms and conditions (â€œTerms of Serviceâ€, â€œTermsâ€), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p><p><br>&nbsp;</p><p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p><p><br>&nbsp;</p><p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p><p><br>&nbsp;</p><h4>SECTION 1 - ONLINE STORE TERMS</h4><p><br>&nbsp;</p><p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p><p>You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).</p><p>You must not transmit any worms or viruses or any code of a destructive nature. A breach or violation of any of the Terms will result in an immediate termination of your Services.</p><p><br>&nbsp;</p><h4>SECTION 2 - GENERAL CONDITIONS</h4><p><br>&nbsp;</p><p>We reserve the right to refuse service to anyone for any reason at any time.</p><p>You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks. You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us. The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p><p><br>&nbsp;</p><h4>SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</h4><p><br>&nbsp;</p><p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk. This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p><p><br>&nbsp;</p><h4>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</h4><p><br>&nbsp;</p><p>Prices for our products are subject to change without notice. We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time. We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</p>');

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
(1, 'Product 1', 5, 'index.jpg', ' This is product one!', 15),
(2, 'Product 2', 14, 'image1.jpg', ' This is product two!', 9),
(3, 'Product 3', 12.22, 'index.jpg', ' This is product three', 16),
(4, 'Product 4', 4, 'image1.jpg', ' This is product four!', 18),
(5, 'Product 5', 7, 'monitor.jpg', ' This is product five!', 18),
(6, 'Product 6', 78, 'keybord1.jpg', ' This is product six!', 20),
(7, 'Product 7', 13, 'fan1.jpg', ' This is product seve', 20),
(8, 'Product 52', 7, 'graphics_card3.jpg', ' This is product five!', 20),
(9, 'Product 3', 12.22, 'index.jpg', ' This is product three', 20),
(10, 'Product 2', 14, 'image1.jpg', ' This is product two!', 20),
(11, 'Product 6', 78, 'keybord1.jpg', ' This is product six!', 20),
(12, 'Product 5', 7, 'mouse2.jpg', ' This is product five!', 15),
(13, 'Product 1', 4.98, 'index.jpg', ' This is product one!', 20),
(14, 'Product 5SD', 7, 'desk.jpg', ' This is product five!', 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
