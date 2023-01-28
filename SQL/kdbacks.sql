-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2023 at 11:19 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kdbacks`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakeimage`
--

DROP TABLE IF EXISTS `cakeimage`;
CREATE TABLE IF NOT EXISTS `cakeimage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cakeimage`
--

INSERT INTO `cakeimage` (`id`, `filename`) VALUES
(1, 'red velvet.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cakes`
--

DROP TABLE IF EXISTS `tbl_cakes`;
CREATE TABLE IF NOT EXISTS `tbl_cakes` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `CakeID` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `ImgId` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CakeID` (`CakeID`),
  KEY `ImgId` (`ImgId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cakes`
--

INSERT INTO `tbl_cakes` (`Id`, `CakeID`, `Name`, `Price`, `ImgId`) VALUES
(1, 'CE001', 'Red Velvet', '900', NULL),
(2, 'CE002', 'Black', '600', NULL),
(3, 'CE003', 'TEACACKE', '100', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
