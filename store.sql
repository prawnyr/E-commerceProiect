-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2022 at 02:42 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(3, 'Yong Ru', 'yongru95@gmail.com', '$2y$10$Z1DnKbJRDFUTHMI7y1vSqeU3.Y9cgDyC4AeWx4.ucH34z/mkzL2E.', '0'),
(8, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Nescafe'),
(2, 'OldTown'),
(3, 'IndoCafe'),
(4, 'Super'),
(5, 'Ah Huat'),
(6, 'Owl'),
(7, 'Gold Roast'),
(8, 'CappaRoma'),
(9, 'Gold Kili'),
(10, 'AliCafe'),
(11, 'Bacha'),
(12, 'Nespresso');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, '3 in 1'),
(3, 'Pods'),
(4, 'Bacha');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_cat` (`product_cat`),
  KEY `fk_product_brand` (`product_brand`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 2, 1, 'NesCafe 3 in 1', 10, 18, '3 in 1 nescafe', 'nescafe_3in1.jpg', 'nescafe'),
(2, 2, 2, 'OldTown 3 in 1', 13, 43, '3 in 1 Oldtown', 'oldtown_3in1.jpg', 'oldtown'),
(3, 2, 3, 'Indocafe 3 in 1', 8, 18, '3 in 1 Indocafe', 'indocafe_3in1.jpg', 'indocafe'),
(4, 2, 4, 'Super 3 in 2', 9, 23, '3 in 1 Super', 'super_3in1.jpg', 'super'),
(5, 2, 5, 'Ah Huat 3 in 1', 7, 35, '3 in 1 Ah Huat', 'ahhuat_3in1.jpg', 'ahhuat'),
(6, 2, 6, 'Owl 3 in 1', 17, 67, '3 in 1 Owl', 'owl_3in1.jpg', 'owl'),
(7, 2, 7, 'Gold Roast 3 in 1', 16, 77, '3 in 1 Gold Roast', 'goldroast_3in1.jpg', 'gold roast'),
(8, 2, 8, 'CappaRoma 3 in 1', 10, 14, '3 in 1 CappaRoma', 'capparoma_3in1.jpg', 'capparoma'),
(9, 2, 9, 'Gold Kili 3 in 1', 5, 24, '3 in 1 Gold Kili', 'goldkili_3in1.jpg', 'gold kili'),
(10, 2, 10, 'AliCafe 3 in 1', 13, 39, '3 in 1 AliCafe', 'alicafe_3in1.jpg', 'alicafe'),
(11, 3, 12, 'Nespresso Colombia', 8, 70, 'Master Origin Colombia with Late Harvest uses only high-grown, washed processed Colombian Arabica.\nYou?ll taste all the winey red fruit notes of blackcurrant and cranberry that surface when you wait. A bright acidity makes this a vivacious coffee. And it?s in smooth balance with those seductive aromatics.', 'nespresso_colombia.jpg', 'nespresso'),
(12, 3, 12, 'Nespresso Miami Espresso', 8, 54, 'The city is a melting pot of traditions and World Explorations Miami espresso is a bold blend of Arabica and Robusta coffees that echoes that. Discover a full-bodied, intense roast carrying delightful roasted, woody and cereal notes, complemented by a dark crema.', 'nespresso_miami_espresso.jpg', 'nespresso'),
(13, 3, 12, 'Nespresso Indonesia', 8, 60, 'Master Origin Indonesia wet-hulled Arabica is a race against rain. Sumatran farmers wet-hull their coffee because of the humid climate. They remove the parchment when the coffee is soft and moist because exposed beans dry faster. This distinctive method produces the classic Indonesian taste ? velvety thick, wildly aromatic, notes of cured tobacco.', 'nespresso_indonesia.jpg', 'nespresso'),
(14, 3, 12, 'Nespresso India', 8, 26, 'Master Origins India with Robusta Monsoon gets its intense, woody, spicy aromatics from the monsooned Robusta blended into Indian Arabica. Monsooning coffees is unique to India?s southwest coast. Months of monsoonal winds repeatedly swell and dry the beans. It mimics the journey it used to take when sailing to Europe.', 'nespresso_india.jpg', 'nespresso'),
(15, 3, 12, 'Nespresso  Forest Black', 8, 63, 'forest black', 'nespresso_forest_black.jpg', 'nespresso'),
(16, 3, 12, 'Nespresso  Ispirazione Napoli', 8, 65, 'Ispirazione Napoli', 'nespresso_ispirazione_napoli.jpg', 'nespresso'),
(17, 3, 12, 'Nespresso Ispirazione Roma', 8, 80, 'Ispirazione Roma', 'nespresso_ispirazione_roma.jpg', 'nespresso'),
(18, 3, 12, 'Nespresso Ispirazione Venezia', 8, 63, 'Ispirazione Venezia', 'nespresso_ispirazione_venezia.jpg', 'nespresso'),
(19, 3, 12, 'Nespresso Scuro', 8, 63, 'Scuro', 'nespresso_scuro.jpg', 'nespresso'),
(20, 3, 12, 'Nespresso Corto', 8, 63, 'corto', 'nespresso_corto.jpg', 'nespresso'),
(21, 4, 11, 'Bacha Serville Orange', 13, 35, 'serville orange', 'bacha_serville_orange.jpg', 'bacha'),
(22, 4, 11, 'Bacha Marrakech', 13, 36, 'Marrakech', 'bacha_marrakech.jpg', 'bacha'),
(23, 4, 11, 'Bacha Sidamo Mountain', 13, 56, 'Sidamo', 'bacha_sidamo_mountain.jpg', 'bacha'),
(24, 4, 11, 'Bacha Roman Holiday', 13, 42, 'Roman Holiday', 'bacha_roman_holiday.jpg', 'bacha'),
(25, 4, 11, 'Bacha Yirgacheffe Heirloom', 13, 12, 'Yirgacheffe Heirloom', 'bacha_yirgacheffe_heirloom.jpg', 'bacha'),
(26, 4, 11, 'Bacha White Nile', 13, 17, 'White Nile', 'bacha_white_nile.jpg', 'bacha'),
(27, 4, 11, 'Bacha Sweet Mexico', 13, 25, 'Sweet Mexico', 'bacha_sweet_mexico.jpg', 'bacha'),
(28, 4, 11, 'Bacha Mount Kenya', 13, 27, 'Mount Kenya', 'bacha_mount_kenya.jpg', 'bacha'),
(29, 4, 11, 'Bacha Tolteca Chocolate', 13, 14, 'Tolteca', 'bacha_tolteca_chocolate.jpg', 'bacha'),
(30, 4, 11, 'Bacha Singapore Morning', 13, 6, 'Singapore Morning', 'bacha_singapore_morning.jpg', 'bacha');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(4, 'user1', 'user1', 'user1', '827ccb0eea8a706c4c34a16891f84e7b', '0712345678', '234421 temple street', 'somewhere');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
