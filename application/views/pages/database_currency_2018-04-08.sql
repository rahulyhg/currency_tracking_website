-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 04:51 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currency`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(5) NOT NULL,
  `categoryname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `categoryname`) VALUES
(1, 'Mobiles'),
(2, 'Laptops'),
(3, 'Television'),
(4, 'Cameras'),
(5, 'Speakers'),
(6, 'Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `date` date NOT NULL,
  `INR` decimal(10,2) NOT NULL,
  `JPY` decimal(10,2) NOT NULL,
  `EUR` decimal(10,2) NOT NULL,
  `CAD` decimal(10,2) NOT NULL,
  `RMB` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`date`, `INR`, `JPY`, `EUR`, `CAD`, `RMB`) VALUES
('2018-03-15', '60.52', '100.01', '0.82', '1.38', '6.10'),
('2018-03-16', '62.12', '102.30', '0.92', '1.45', '6.30'),
('2018-03-17', '63.80', '101.23', '0.95', '1.65', '6.10'),
('2018-04-19', '64.00', '106.00', '1.00', '1.00', '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemtid` int(5) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `itemdesc` varchar(200) NOT NULL,
  `image` longblob,
  `cost` decimal(10,2) NOT NULL,
  `categoryid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemtid`, `itemname`, `itemdesc`, `image`, `cost`, `categoryid`) VALUES
(2, 'iPhone X', 'iPhone X 256Gb White', NULL, '1079.99', 1),
(3, 'OnePlus 5T', 'OnePlus 5T 128GB Black', NULL, '540.00', 1),
(4, 'Pixel 2XL', 'Google Pixel 2XL 128Gb', NULL, '899.00', 1),
(5, 'iPhone 8 Plus', 'iPhone 8 Plus 256 Gb', NULL, '919.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `name`, `password`, `isadmin`) VALUES
('adityakore@gmail.com', 'Aditya K', 'password', 0),
('adityavb@gmail.com', 'Aditya V', 'root', 0),
('nikhilk@gmail.com', 'Nikhil', 'abc123', 1),
('toshaltambave@gmail.com', 'Toshal', 'abc@123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemtid`),
  ADD KEY `category_fk` (`categoryid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemtid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`categoryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
