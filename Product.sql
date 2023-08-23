-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 14, 2023 at 02:18 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Product`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `productSKU` varchar(20) NOT NULL,
  `Weight` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DVD-Disk`
--

CREATE TABLE `DVD-Disk` (
  `productSKU` varchar(11) NOT NULL,
  `Size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Furniture`
--

CREATE TABLE `Furniture` (
  `productSKU` varchar(20) NOT NULL,
  `length` float NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `SKU` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`productSKU`);

--
-- Indexes for table `DVD-Disk`
--
ALTER TABLE `DVD-Disk`
  ADD PRIMARY KEY (`productSKU`);

--
-- Indexes for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD PRIMARY KEY (`productSKU`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`SKU`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `Book_productSKU_foreign` FOREIGN KEY (`productSKU`) REFERENCES `Product` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DVD-Disk`
--
ALTER TABLE `DVD-Disk`
  ADD CONSTRAINT `DVD-Disk_productSKU_foreign` FOREIGN KEY (`productSKU`) REFERENCES `Product` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD CONSTRAINT `Furniture_productSKU_foreign` FOREIGN KEY (`productSKU`) REFERENCES `Product` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
