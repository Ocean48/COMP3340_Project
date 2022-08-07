-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2022 at 08:29 PM
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
('user5@gmail.com', 5, 1, '2022-08-01 06:15:09'),
('user1@gmail.com', 2, 1, '2022-08-07 17:17:05');

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
  `tandc` text NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(20) NOT NULL,
  `contact_map` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`view`, `background_color`, `margin_color`, `margin_text_color`, `shipping_policy`, `privacy_policy`, `return_policy`, `tandc`, `contact_address`, `contact_phone`, `contact_email`, `contact_map`) VALUES
(0, '#f3f3f3', '#3f86f1', '#f9f9f9', '', '', '', '', '', '', '', ''),
(1, '#f3f3f3', '#3f86f1', '#f9f9f9', '<h2>Shipping Policy</h2><hr><p><br><strong>USA &amp; Canada Orders</strong><br>Most deliveries within the US &amp; Canada should arrive within 7 days after your shipping confirmation email is received.</p><p>&nbsp;</p><p><strong>Worldwide Orders</strong><br>Deliveries outside of the US &amp; Canada may take anywhere from 7-30 days to arrive, depending on the destination country.</p><p>&nbsp;</p><p>&nbsp;</p><h2>Customs &amp; Duty Fess</h2><p>Customers are responsible for any customs and duty fees, which may be assessed to your order once it arrives in the destination country. <strong>We does not include any coverage for customs or duty fees in quoted shipping costs, or at any point in our checkout or billing process.</strong></p><p><br>&nbsp;</p><p>If you have any questions related to customs, duty, and import charges, please contact your local customs office prior to ordering.</p>', '<h2>Privacy Policy</h2><hr><h4><strong>Creator Warehouse, Inc. Privacy Policy</strong></h4><p><br>&nbsp;</p><p>This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from this â€œSiteâ€.</p><p><br>&nbsp;</p><h4>PERSONAL INFORMATION WE COLLECT</h4><p><br>&nbsp;</p><p>When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically-collected information as â€œDevice Information.â€</p><p><br>&nbsp;</p><p>We collect Device Information using the following technologies:</p><p><br>&nbsp;</p><p>- â€œCookiesâ€ are data files that are placed on your device or computer and often include an anonymous unique identifier. For more information about cookies, and how to disable cookies, visit http://www.allaboutcookies.org.</p><p>- â€œLog filesâ€ track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps</p><p>- â€œWeb beacons,â€ â€œtags,â€ and â€œpixelsâ€ are electronic files used to record information about how you browse the Site.</p><p><br>&nbsp;</p><p>Additionally when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, payment information (including credit card numbers &amp; PayPal information), email address, and phone number. We refer to this information as â€œOrder Information.â€</p><p><br>&nbsp;</p><p>When we talk about â€œPersonal Informationâ€ in this Privacy Policy, we are talking both about Device Information and Order Information.</p><p><br>&nbsp;</p><h4>HOW DO WE USE YOUR PERSONAL INFORMATION?</h4><p><br>&nbsp;</p><p>We use the Order Information that we collect generally to fulfill any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations). Additionally, we use this Order Information to:</p><p>Communicate with you;</p><p>Screen our orders for potential risk or fraud; and</p><p>When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.</p><p>We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site (for example, by generating analytics about how our customers browse and interact with the Site, and to assess the success of our marketing and advertising campaigns).</p><p><br>&nbsp;</p><h4>SHARING YOUR PERSONAL INFORMATION</h4><p><br>&nbsp;</p><p>We share your Personal Information with third parties to help us use your Personal Information, as described above. For example.</p><p><br>&nbsp;</p><p>Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful request for information we receive, or to otherwise protect our rights.</p><p><br>&nbsp;</p><h4>BEHAVIOURAL ADVERTISING</h4><p><br>&nbsp;</p><p>As described above, we use your Personal Information to provide you with targeted advertisements or marketing communications we believe may be of interest to you. For more information about how targeted advertising works, you can visit the Network Advertising Initiativeâ€™s (â€œNAIâ€) educational page at http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work.</p><p><br>&nbsp;</p><p>You can opt out of targeted advertising by:</p><p>FACEBOOK - https://www.facebook.com/settings/?tab=ads</p><p>GOOGLE - https://www.google.com/settings/ads/anonymous</p><p>BING - https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads</p><p><br>&nbsp;</p><p>Additionally, you can opt out of some of these services by visiting the Digital Advertising Allianceâ€™s opt-out portal at: http://optout.aboutads.info/.</p><p><br>&nbsp;</p><h4>DO NOT TRACK</h4><p><br>&nbsp;</p><p>Please note that we do not alter our Siteâ€™s data collection and use practices when we see a Do Not Track signal from your browser.</p><p><br>&nbsp;</p><h4>YOUR RIGHTS</h4><p><br>&nbsp;</p><p>If you are a European resident, you have the right to access personal information we hold about you and to ask that your personal information be corrected, updated, or deleted. If you would like to exercise this right, please contact us through the contact information below.</p><p><br>&nbsp;</p><p>Additionally, if you are a European resident we note that we are processing your information in order to fulfill contracts we might have with you (for example if you make an order through the Site), or otherwise to pursue our legitimate business interests listed above. Additionally, please note that your information will be transferred outside of Europe, including to Canada and the United States.</p><p><br>&nbsp;</p><h4>DATA RETENTION</h4><p><br>&nbsp;</p><p>When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.</p><p><br>&nbsp;</p><h4>CHANGES</h4><p><br>&nbsp;</p><p>We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.</p><p><br>&nbsp;</p><h4>CONTACT US</h4><p><br>&nbsp;</p><p>For more information about our privacy practices, if you have questions, or if you would like to make a complaint, please contact us by e-mail at support@email.com</p>', '<h2>Return Policy</h2><hr><p><br><br>&nbsp;</p><p>We aims to provide a happy shopping experience for all of our customers, but we do understand that sometimes a product is just not right for you. We aim to make our returns and exchanges program as simple as possible for our valued customers.</p><p><br>&nbsp;</p><p>Returns - We will issue a full refund, including any applicable sales taxes, for any products returned within the requirements outlined below. <strong>Please note that any shipping fees you may have paid in connection with your purchase are non-refundable.</strong></p><p><br>&nbsp;</p><p>Exchanges - Free for equal value products. If you choose to exchange for higher value products, we will collect the difference from you prior to shipping. For lower value products, we will refund the difference to your original payment method. Exchanges will be shipped to the same address as your last order unless otherwise specified. Shipping for exchanges is free.</p><p><br>&nbsp;</p><p>Note to customers outside the US &amp; Canada: <strong>Refunds for any import/customs/duty fees charged to you at the time of import or delivery should be sought through your local customs bureau. we cannot provide any coverage for this.</strong></p><p><br><br>&nbsp;</p><h4>Requirements for returns &amp; exchanges</h4><p><br>&nbsp;</p><p>Within 30 days - you must contact our site by email about any issues with your order within 30 days of delivery</p><p><br>&nbsp;</p><p>Includes original packaging &amp; product in like-new condition - any returned product(s) must be returned with any original packaging, and in the condition which the product(s) arrived. If your return is accepted, we will issue a refund or an exchange depending on your stated preference.</p><p><br>&nbsp;</p><p>We may reject the returned product if there is damage to the product and/or product packaging. If a returned product is rejected, no refund will be issued to the customer, and the customer may choose to have the product shipped back to them at their own cost. If the customer chooses not to ship the product back to them, We will recycle or dispose of the product.</p><p><br><br>&nbsp;</p><h4>Process</h4><p><br>&nbsp;</p><p>1. Contact our at the email listed in our siteâ€™s footer or contact page.</p><p><br>&nbsp;</p><p>2. If an order or product is deemed eligible for return by our support, we will email you a return label. Follow the instructions in the return label email to ship the product back to our distribution facility.</p><p><br>&nbsp;</p><p>3. Drop the package off at the any of shipping company near by your location.</p><p><br>&nbsp;</p><p>4. Reply to your email from our site to confirm.</p><p><br><br>&nbsp;</p><p>If you have any additional questions about our returns process, or any other aspect of our purchase experience, please contact support at the email listed in our siteâ€™s footer or contact page</p><p><br><br>&nbsp;</p><p>Thank you for shopping with us!</p>', '<h2>Terms and Conditions</h2><hr><p><br><br>&nbsp;</p><h4>OVERVIEW</h4><p><br>&nbsp;</p><p>This website is operated by COMP3340 Group project. Throughout the site, the terms â€œweâ€, â€œusâ€ and â€œourâ€ refer to this website. we offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here</p><p><br>&nbsp;</p><p>By visiting our site and/ or purchasing something from us, you engage in our â€œServiceâ€ and agree to be bound by the following terms and conditions (â€œTerms of Serviceâ€, â€œTermsâ€), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p><p><br>&nbsp;</p><p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p><p><br>&nbsp;</p><p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p><p><br>&nbsp;</p><h4>SECTION 1 - ONLINE STORE TERMS</h4><p><br>&nbsp;</p><p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p><p>You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).</p><p>You must not transmit any worms or viruses or any code of a destructive nature. A breach or violation of any of the Terms will result in an immediate termination of your Services.</p><p><br>&nbsp;</p><h4>SECTION 2 - GENERAL CONDITIONS</h4><p><br>&nbsp;</p><p>We reserve the right to refuse service to anyone for any reason at any time.</p><p>You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks. You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us. The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p><p><br>&nbsp;</p><h4>SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</h4><p><br>&nbsp;</p><p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk. This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p><p><br>&nbsp;</p><h4>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</h4><p><br>&nbsp;</p><p>Prices for our products are subject to change without notice. We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time. We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</p>', '23 Address Street, unit 2', '12344567', 'support@gmail.com', ' <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d94439.32675917174!2d-83.07292201065457!3d42.29497969061079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883b2ac1b54f886b%3A0xb66cd49527fcdc51!2sWindsor%2C%20ON!5e0!3m2!1sen!2sca!4v1659560855689!5m2!1sen!2sca\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

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
(1, 'African Violet Flowers Purple', '19.00', 'african_violet_purple_flowers.jpg', ' African violets (Saintpaulia ionantha) are native to the coastal woods of east Africa, but they have become popular indoor plants in the United States. The blooms are shades of deep purple and, in proper light, the plants can flower all year long. Most of the plants are sold when flowering', 20),
(2, 'Pilea Peperomioides', '6.99', 'Pilea_Peperomioides.jpg', ' Pilea peperomioides is an erect, evergreen perennial plant, with shiny, dark green, circular leaves up to 10 cm (4 in) in diameter on long petioles.[5] The leaves are described as peltate—circular, with the petiole attached near the centre. The plant is completely hairless. It grows to around 30 cm (12 in) tall and wide in the wild, sometimes more indoors. The stem is greenish to dark brown, usually unbranched and upright, and lignified at the base when mature. In poor growing conditions, it loses its leaves in the lower part of the stem and assumes a distinctive habit. The flowers are inconspicuous', 20),
(3, 'Peperomia Purple', '11.00', 'Peperomia-plant-purple.jpg', ' Peperomia is one of the two large genera of the family Piperaceae. It is estimated that there are at least over 1,000 species, occurring in all tropical and subtropical regions of the world. They are concentrated in northern South America and Central America, but are also found in Africa, southern Asia, and Oceania. The exact number is difficult to tell as some plants have been recorded several times with different names (c. 3,000 names have been used in publications) and new species continue to be discovered. Peperomias have adapted to many different environments and their appearance varies greatly. Some are epiphytes (growing on other plants) or lithophytes (growing on rock or in rock crevices), and many are xerophytes (drought-tolerant) either with thick succulent structures or with underground tubers (geophytes). Most species are compact perennial shrubs or vines', 20),
(4, 'Peace lily', '17.00', 'Peace_lily.jpeg', ' Spathiphyllum is a genus of about 47 species of monocotyledonous flowering plants in the family Araceae, native to tropical regions of the Americas and southeastern Asia. Certain species of Spathiphyllum are commonly known as spath or peace lilies.\r\n\r\nThey are evergreen herbaceous perennial plants with large leaves 12–65 cm long and 3–25 cm broad. The flowers are produced in a spadix, surrounded by a 10–30 cm long, white, yellowish, or greenish spathe. The plant does not need large amounts of light or water to survive.', 20),
(5, 'Pachypodium-Lamerei', '15.00', 'Pachypodium-Lamerei.jpg', ' Pachypodium lamerei is a species of flowering plant in the family Apocynaceae. It is a stem succulent, photosynthesizing mainly through its trunk, and comes from the island of Madagascar, off the east coast of Africa. It has large thorns and leaves mostly just at the top of the plant, and large, fragrant flowers. The species has become one of the best known pachypodiums in cultivation, being relatively easy to propagate and grow. In cultivation it is often marketed as the Madagascar palm,[2] despite its not being a palm at all. A variety called \"Ramosum\" has been described. It is distinguished mostly by a dwarf growth habit', 20),
(6, 'Araucaria Heterophylla', '180.00', 'norfolk-island-pine-araucaria-heterophylla.jpg', ' Araucaria heterophylla (synonym A. excelsa) is a species of conifer. As its vernacular name Norfolk Island pine (or Norfolk pine) implies, the tree is endemic to Norfolk Island, an external territory of Australia located in the Pacific Ocean between New Zealand and New Caledonia. It is not a true pine, which belong to the genus Pinus in the family Pinaceae, but instead is a member of the genus Araucaria, in the family Araucariaceae, which also contains the monkey-puzzle tree. Members of Araucaria occur across the South Pacific, especially concentrated in New Caledonia (about 700 km or 430 mi due north of Norfolk Island) where 13 closely related and similar-appearing species are found. It is sometimes called a star pine, Polynesian pine, triangle tree or living Christmas tree, due to its symmetrical shape as a sapling.', 20),
(7, 'sweetheart plant hoya kerrii', '26.00', 'sweetheart-plant-hoya-kerrii.jpg', ' Hoya kerrii, also referred to colloquially as Hoya hearts,[citation needed] is a species of Hoya native to the south-east of Asia. Its eponymous collector is Arthur Francis George Kerr, Irish physician and botanist.', 20),
(8, 'Purple Shamrock', '15.00', 'Purple-Shamrock.jpg', ' Oxalis triangularis, commonly called false shamrock, is a species of perennial plant in the family Oxalidaceae. It is native to several countries in southern South America. This woodsorrel is typically grown as a houseplant but can be grown outside in USDA climate zones 8a–11, preferably in light shade', 20),
(9, 'moth orchid Phalaenopsis', '29.00', 'moth-orchid-Phalaenopsis.jpg', ' Phalaenopsis , also known as moth orchids, is a genus of about seventy species of plants in the family Orchidaceae. Orchids in this genus are monopodial epiphytes or lithophytes with long, coarse roots, short, leafy stems and long-lasting, flat flowers arranged in a flowering stem that often branches near the end. Orchids in this genus are native to India, Taiwan, China, Southeast Asia, New Guinea and Australia with the majority in Indonesia and the Philippines.', 20),
(10, 'multi stemmed ponytail palm', '38.00', 'multi-stemmed-ponytail-palm.jpg', ' The Beaucarnea recurvata, also known as Ponytail Plant grows offshoots or suckers at the trunk base. They can be removed and propagated, and planted in soil to start new ones! Keep the soil moist but not soggy. ', 20),
(11, 'monstera', '36.00', 'monstera.jpg', 'Monstera is a species of flowering plant native to tropical forests of southern Mexico, south to Panama.[4] It has been introduced to many tropical areas, and has become a mildly invasive species in Hawaii, Seychelles, Ascension Island and the Society Islands. It is very widely grown in temperate zones as a houseplant.', 20),
(12, 'maidenhair fern', '29.00', 'maidenhair_fern.jpg', ' They are distinctive in appearance, with dark, often black stipes and rachises, and bright green, often delicately cut leaf tissue. The sori are borne submarginally, and are covered by reflexed flaps of leaf tissue which resemble indusia. Dimorphism between sterile and fertile fronds is generally subtle.\r\n\r\nThey generally prefer humus-rich, moist, well-drained sites, ranging from bottomland soils to vertical rock walls. Many species are especially known for growing on rock walls around waterfalls and water seepage areas.', 20),
(13, 'lady palm', '34.00', 'lady-palm.jpg', 'Lady Palm is a genus of about 10 species of small palms native to southeastern Asia from southern Japan and southern China south to Sumatra.', 20),
(14, 'pothos devils ivy', '31.00', 'pothos-devils-ivy.jpg', ' Pothos (also called Devil’s Ivy) is a tropical vine plant that has adapted well as a hardy houseplant. It has shiny, heart-shaped leaves and comes in a number of natural and cultivated varieties to add interesting foliage to your home.\r\n\r\nWhen Pothos first made its way into the hands of botanists they had collected small, juvenile leaves. They were classed in 1880 as Pothos aureus. In 1908, the group of plants was reclassified as Scindapsus. But you’ll be forgiven for being even more confused as in 1964 they were reclassified again as Epipremnum. This is why you sometimes see these plants under the botanical name of Epipremnum and other times as Scindapsus.\r\n', 40),
(15, 'Kentia Palm', '55.00', 'Kentia_Palm.jpg', 'Kentia Palm is a species of flowering plant in the palm family, Arecaceae, endemic to Lord Howe Island in Australia. It is also widely grown on Norfolk Island. It is a relatively slow-growing palm, eventually growing up to 10 m (33 ft) tall by 6 m (20 ft) wide. Its fronds can reach 3 m (10 ft) long. The palm received the name \"forsteriana\" after Johann Reinhold Forster and Georg Forster, father and son, who accompanied Captain Cook as naturalists on his second voyage to the Pacific in 1772–1775.', 20),
(16, 'kalanchoe', '30.00', 'kalanchoe.jpg', 'Kalanchoe also written Kalanchöe or Kalanchoë, is a genus of about 125 species of tropical, succulent plants in the stonecrop family Crassulaceae, mainly native to Madagascar and tropical Africa. A Kalanchoe species was one of the first plants to be sent into space, sent on a resupply to the Soviet Salyut 1 space station in 1979.', 20),
(17, 'Jewel Orchid Ludisia discolor', '54.00', 'plant2.jpg', ' The Jewel Orchid or Ludisia discolor is unlike all other Orchids we grow in our homes because as a houseplant the Jewel Orchid is prized for its foliage rather than its flowers. This is a simple and easy indoor plant to care for. A mature Jewel Orchid that is several years old and has received good care will eventually produce multiple growths and spread out.', 20),
(18, 'jasmine plant', '25.00', 'jasmine_plant.jpg', 'The jasmine plant is a source of exotic fragrance in warmer climates. It is an important scent noted in perfumes, and also has herbal properties. The plants may be vines or bushes and some are evergreen. Most jasmine plants are found in tropical to sub-tropical climates, although a few may thrive in temperate zones. Protection from cold temperatures is one of the most important aspects of jasmine plant care. Growing jasmine vines can create a perfumed shield over arbors, trellises and fences. The bush types are excellent landscape specimens with starry pink, white, ivory or even yellow scented blooms.', 20),
(19, 'Jade Plant', '26.00', 'Jade-Plant.jpg', 'This is a succulent plant with small pink or white flowers that is native to the KwaZulu-Natal and Eastern Cape provinces of South Africa, and Mozambique; it is common as a houseplant worldwide.', 20),
(20, 'Hyacinths blue', '20.00', 'Hyacinths-blue.jpg', ' Hyacinthus grows from bulbs, each producing around four to six linear leaves and one to three spikes or racemes of flowers. In the wild species, the flowers are widely spaced with as few as two per raceme in H. litwinovii and typically six to eight in H. orientalis which grows to a height of 15–20 cm (6–8 in). Cultivars of H. orientalis have much denser flower spikes and are generally more robust.', 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
