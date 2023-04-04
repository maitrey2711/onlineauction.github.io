-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2020 at 11:12 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineauction`
--
CREATE DATABASE IF NOT EXISTS `onlineauction` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `onlineauction`;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE IF NOT EXISTS `auction` (
  `auctionid` int(5) NOT NULL,
  `auctiondate` date NOT NULL,
  `prdid` int(5) NOT NULL,
  `custid` int(5) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`auctionid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionid`, `auctiondate`, `prdid`, `custid`, `price`, `description`) VALUES
(1, '2020-06-01', 1, 2, '5000.00', 'none'),
(2, '2020-06-22', 1, 2, '500.00', 'abc'),
(3, '2020-06-22', 1, 2, '500.00', 'abc'),
(4, '2020-06-22', 1, 2, '500.00', 'abc'),
(5, '2020-06-22', 2, 2, '800.00', 'none'),
(6, '2020-06-23', 3, 2, '1000.00', 'none'),
(7, '2020-06-25', 1, 0, '5000.00', 'none'),
(8, '2020-06-25', 1, 2, '5000.00', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cityid` int(5) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(30) NOT NULL,
  `shortname` varchar(5) DEFAULT NULL,
  `stateid` int(5) NOT NULL,
  PRIMARY KEY (`cityid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `cityname`, `shortname`, `stateid`) VALUES
(5, 'bhopal', 'bh', 5),
(7, 'navsari', 'nvs', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contactid` int(5) NOT NULL AUTO_INCREMENT,
  `peronname` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `custid` int(4) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityid` int(11) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `custname`, `address`, `cityid`, `mobileno`, `photo`) VALUES
(2, 'Swayam', 'Lunsikui', 1, '9874563215', 'cust2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `docid` int(5) NOT NULL AUTO_INCREMENT,
  `docname` varchar(50) NOT NULL,
  `submitdate` date NOT NULL,
  `doctype` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `regid` int(5) NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`docid`, `docname`, `submitdate`, `doctype`, `image`, `purpose`, `regid`) VALUES
(1, 'Voter ID', '2020-06-01', 'Photo ID', 'doc1.jpg', 'none', 3);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `emailid` int(5) NOT NULL AUTO_INCREMENT,
  `emaildate` date NOT NULL,
  `emailfrom` varchar(50) NOT NULL,
  `emailto` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `featureid` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `prdid` int(5) NOT NULL,
  `extra` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`featureid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackid` int(5) NOT NULL AUTO_INCREMENT,
  `feedbackdate` date NOT NULL,
  `regid` int(5) NOT NULL,
  `ratingstar` int(1) NOT NULL,
  `feedbackfor` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`feedbackid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `feedbackdate`, `regid`, `ratingstar`, `feedbackfor`) VALUES
(1, '2020-03-04', 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageid` int(5) NOT NULL AUTO_INCREMENT,
  `messagedate` date NOT NULL,
  `message` varchar(200) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageid`, `messagedate`, `message`, `mobileno`) VALUES
(1, '2020-02-25', 'hi how r u?', '9879641323'),
(2, '2020-02-25', 'good morning', '9879641323');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `ownerid` int(4) NOT NULL,
  `ownername` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityid` int(11) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownerid`, `ownername`, `address`, `cityid`, `mobileno`, `photo`) VALUES
(3, '', '', 0, '', ''),
(4, 'Kirit', 'Lunsikui', 7, '9874563213', 'images.jpg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int(5) NOT NULL AUTO_INCREMENT,
  `paydate` date NOT NULL,
  `purid` int(5) NOT NULL,
  `regid` int(5) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `paymode` varchar(20) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `prdid` int(5) NOT NULL,
  `prdname` varchar(50) NOT NULL,
  `adddate` date NOT NULL,
  `startdate` date NOT NULL,
  `expprice` decimal(8,2) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `regid` int(5) NOT NULL,
  PRIMARY KEY (`prdid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdid`, `prdname`, `adddate`, `startdate`, `expprice`, `details`, `enddate`, `image`, `company`, `regid`) VALUES
(1, 'scanner', '2020-02-04', '2020-03-03', '2000.00', 'Good Product', '2020-03-19', 'product1.jpg', 'Sony', 1),
(2, 'printer', '2020-02-02', '2020-03-04', '4000.00', NULL, NULL, 'product2.jpg', NULL, 2),
(3, 'Printer', '2020-06-01', '2020-06-02', '5000.00', 'HP Laser printer', '2020-06-03', 'product3.png', 'HP', 2),
(4, 'Printer HP', '2020-06-01', '2020-06-03', '5000.00', 'HP Color printer', '2020-06-12', 'product4.png', 'HP', 4);

-- --------------------------------------------------------

--
-- Table structure for table `productimg`
--

CREATE TABLE IF NOT EXISTS `productimg` (
  `imgid` int(5) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `imgtype` varchar(10) DEFAULT NULL,
  `imgsize` int(20) DEFAULT NULL,
  `prdid` int(5) NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `regid` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `aboutus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purid` int(5) NOT NULL AUTO_INCREMENT,
  `purdate` date NOT NULL,
  `prdid` int(5) NOT NULL,
  `auctionprice` decimal(8,2) NOT NULL,
  `purchaseprice` decimal(8,2) NOT NULL,
  `auctionid` int(5) NOT NULL,
  `regid` int(5) NOT NULL,
  `remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`purid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `regid` int(5) NOT NULL,
  `regdate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  PRIMARY KEY (`regid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regid`, `regdate`, `username`, `password`, `usertype`, `contactno`, `emailid`) VALUES
(1, '2020-06-09', 'Admin', 'admin', 'Admin', '9874563213', 'kirit@gmail.com'),
(2, '2020-06-09', 'Swayam', 'sss', 'Customer', '9876966936', 'swayam@yahoo.com'),
(3, '2020-06-09', 'Kajal', 'kkk', 'Owner', '7896541236', 'kajal@gmail.com'),
(4, '2020-06-09', 'Kirit', 'kkk', 'Owner', '9874563213', 'kirit@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
  `returnid` int(5) NOT NULL AUTO_INCREMENT,
  `returndate` date NOT NULL,
  `purid` int(5) NOT NULL,
  `regid` int(5) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `confirmation` char(1) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`returnid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateid` int(5) NOT NULL AUTO_INCREMENT,
  `statename` varchar(50) NOT NULL,
  `shortname` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`stateid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `statename`, `shortname`) VALUES
(4, 'maharashtra', 'mh'),
(5, 'gujarat', 'gj'),
(6, 'chennai', 'ch'),
(8, 'chennai', 'chn'),
(16, 'karnataka', 'kt');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
