-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 05:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) DEFAULT NULL,
  `parent_category_id` int(11) NOT NULL,
  `Title` text DEFAULT NULL,
  `Meta_Title` text DEFAULT NULL,
  `Url` text DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Created_At` text DEFAULT NULL,
  `Updated_At` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_category_id`, `Title`, `Meta_Title`, `Url`, `Content`, `Created_At`, `Updated_At`) VALUES
(NULL, 0, '', '', '', '', '03 Feb 2020 @ 17:32:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `customer_id` int(11) NOT NULL,
  `Prefix` text DEFAULT NULL,
  `First_Name` varchar(20) DEFAULT NULL,
  `LAST_Name` varchar(20) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Password` text DEFAULT NULL,
  `Last_Login` varchar(20) DEFAULT NULL,
  `Information` text DEFAULT NULL,
  `Created_At` varchar(20) DEFAULT NULL,
  `Updated_At` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`customer_id`, `Prefix`, `First_Name`, `LAST_Name`, `Mobile`, `Email`, `Password`, `Last_Login`, `Information`, `Created_At`, `Updated_At`) VALUES
(1, 'Mr', '', '', '', '', '', NULL, NULL, '03 Feb 2020 @ 16:59:', NULL),
(2, 'Mr', '', '', '', '', '', NULL, NULL, '03 Feb 2020 @ 17:30:', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`parent_category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `user` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
