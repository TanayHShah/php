-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 03:59 PM
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
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `url_key` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `url_key`, `image`, `status`, `description`, `parent_category_id`, `Created_At`, `Updated_At`) VALUES
(3, 'RADIO', 'seconddd-category', 'radio.png', 0, 'asdfg', 1, '2020-02-15 12:40:42', '2020-02-18 10:02:08'),
(7, 'FUN', 'fun-category', 'radio.png', 0, '', 2, '2020-02-17 12:08:33', '2020-02-18 04:43:58'),
(8, 'ENTERTAINMENT', 'entertainment-category', 'radio.png', 0, '', 2, '2020-02-17 12:10:44', '2020-02-18 06:26:52'),
(9, 'SECONDARY', 'secondary-category', 'radio.png', 0, 'SCHOOL', 3, '2020-02-18 04:04:31', '2020-02-18 04:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `cms_id` int(11) NOT NULL,
  `page_title` text NOT NULL,
  `url_key` text NOT NULL,
  `status` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`cms_id`, `page_title`, `url_key`, `status`, `content`, `created_at`, `updated_at`) VALUES
(6, 'HOME', 'home-cms', 1, 'HOME PAGE CONTENT', '2020-02-17 09:19:50', '2020-02-18 04:44:51'),
(7, 'ABOUT US', 'about-us-cms', 1, 'ABOUT US PAGE CONTENT', '2020-02-17 09:20:41', '2020-02-18 04:44:51'),
(8, 'CONTACT US', 'contact-us-cms', 1, 'CONTACT US PAGE CONTENT', '2020-02-18 10:06:27', '2020-02-18 10:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `parent_category_id` int(11) NOT NULL,
  `parent_category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`parent_category_id`, `parent_category_name`) VALUES
(1, 'INSTRUMENT'),
(2, 'ENTERTAINMENT'),
(3, 'EDUCATION');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `createed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `createed_at`) VALUES
(5, 'FIRST POST', 'HII', '2020-02-14 09:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `sku` varchar(30) NOT NULL,
  `url_key` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text NOT NULL,
  `short_description` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `sku`, `url_key`, `image`, `status`, `description`, `short_description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(21, 'Radio 1', '', 'radio-1-product', 'radio.png', 0, 'Radio is a way to send electromagnetic signals over a long distance, to deliver information from one place to another. ... When radio signals are sent out to many receivers at the same time, it is called a broadcast. Television also uses radio signals to send pictures and sound.\r\n', 'Radio For Life', 1234, 11, '2020-02-17 07:58:28', '2020-02-18 10:01:05'),
(24, 'Radio 2', '', 'radio-2-product', 'radio.png', 0, 'Radio is a way to send electromagnetic signals over a long distance, to deliver information from one place to another. ... When radio signals are sent out to many receivers at the same time, it is called a broadcast. Television also uses radio signals to send pictures and sound.\r\n', 'Radio For Life', 123, 12, '2020-02-18 04:53:28', '2020-02-18 10:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_categoris`
--

CREATE TABLE `product_categoris` (
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categoris`
--

INSERT INTO `product_categoris` (`product_category_id`, `product_id`, `category_id`) VALUES
(13, 21, 3),
(16, 24, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
  ADD PRIMARY KEY (`parent_category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categoris`
--
ALTER TABLE `product_categoris`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parent_category`
--
ALTER TABLE `parent_category`
  MODIFY `parent_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_categoris`
--
ALTER TABLE `product_categoris`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `parent_category` (`parent_category_id`);

--
-- Constraints for table `product_categoris`
--
ALTER TABLE `product_categoris`
  ADD CONSTRAINT `product_categoris_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categoris_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
