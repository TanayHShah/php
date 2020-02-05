-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 03:19 PM
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
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `blog_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Url` text NOT NULL,
  `Content` text NOT NULL,
  `image` text NOT NULL,
  `Published_At` text NOT NULL,
  `Created_At` text NOT NULL,
  `Updated_At` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blog_id`, `customer_id`, `Title`, `Url`, `Content`, `image`, `Published_At`, `Created_At`, `Updated_At`) VALUES
(12, 1, 'ABCDE', 'ABC', 'ABCEEEE', '', '', '05 Feb 2020 @ 13:20:04', ''),
(13, 2, '', '', '', '', '', '05 Feb 2020 @ 14:03:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
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
(1, 3, '', '', '', '', '04 Feb 2020 @ 16:47:36', NULL),
(2, 1, '', '', 'AAA', '', '04 Feb 2020 @ 16:50:13', NULL),
(3, 1, '', '', '2Array()<br /><b>Notice</b>:  Undefined index: category in <b>D:cybercom creationxamphtdocscybercomphpexamconnection.php</b> on line <b>174</b><br /><br /><b>Warning</b>:  Invalid argument supplied for foreach() in <b>D:cybercom creationxamphtdocscybercomphpexamconnection.php</b> on line <b>174</b><br /><br /><b>Notice</b>:  Undefined variable: result in <b>D:cybercom creationxamphtdocscybercomphpexamconnection.php</b> on line <b>179</b><br />', '', '04 Feb 2020 @ 17:52:25', NULL),
(4, 1, '', '', '3Array()<br /><b>Notice</b>:  Undefined index: category in <b>D:cybercom creationxamphtdocscybercomphpexamconnection.php</b> on line <b>174</b><br /><br /><b>Warning</b>:  Invalid argument supplied for foreach() in <b>D:cybercom creationxamphtdocscybercomphpexamconnection.php</b> on line <b>174</b><br /><br /><b>Notice</b>:  Undefined variable: result in <b>D:cybercom creationxamphtdocscybercomphpexamconnection.php</b> on line <b>179</b><br />', '', '04 Feb 2020 @ 17:53:49', NULL),
(5, 1, 'ABC', 'AAA', 'Url', 'AAA', '04 Feb 2020 @ 18:02:30', NULL),
(6, 1, '', '', 'Url12', '', '04 Feb 2020 @ 18:27:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `parent_category_id` int(11) NOT NULL,
  `Parent_Category` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`parent_category_id`, `Parent_Category`) VALUES
(1, 'ELECTRONICS'),
(2, 'HEALTH'),
(3, 'ENTERTAINMENT');

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
(1, 'Mr', 'ABC', 'ABC', '9080812121', 'asd@gmail.com', '123', NULL, NULL, '04 Feb 2020 @ 14:15:', NULL),
(2, 'Mr', 'ABCD', 'ABC', '9080812121', 'asd1@gmail.com', '123', NULL, NULL, '05 Feb 2020 @ 14:00:', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `Url` (`Url`) USING HASH,
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
  ADD PRIMARY KEY (`parent_category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `blog_post_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`customer_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `parent_category` (`parent_category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
