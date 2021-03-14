-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 10:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samsungstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontaktforma`
--

CREATE TABLE `kontaktforma` (
  `id` int(11) NOT NULL,
  `emri` tinytext NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `gjinia` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `country_id` int(11) NOT NULL,
  `mesazhi` varchar(1024) NOT NULL,
  `datamodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`category_id`, `category_name`) VALUES
(1, 'SmartPhones'),
(2, 'Watches'),
(3, 'Seria A'),
(4, 'Seria Note'),
(5, 'Seria S');

-- --------------------------------------------------------

--
-- Table structure for table `news_country`
--

CREATE TABLE `news_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `posts_title` varchar(255) NOT NULL,
  `posts_body` varchar(1055) NOT NULL,
  `image` varchar(1055) NOT NULL,
  `category_id` int(11) NOT NULL,
  `posts_author` tinytext NOT NULL,
  `datamodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`posts_id`, `posts_title`, `posts_body`, `image`, `category_id`, `posts_author`, `datamodified`) VALUES
(5, 'Samsung A10', 'Samsung A10', 'https://i.ebayimg.com/thumbs/images/g/GX4AAOSwtbZdpcHv/s-l225.webp', 3, 'Egzon', '2020-07-15 19:39:17'),
(6, 'Samsung S', 'Samsung S20', 'https://i.ebayimg.com/thumbs/images/g/0YkAAOSwrIxeaODm/s-l225.webp', 5, 'Egzon', '2020-07-15 19:45:25'),
(7, 'Samsung Note', 'Samsung Note 10', 'https://i.ebayimg.com/thumbs/images/g/LrQAAOSwknlfDArR/s-l225.webp', 4, 'Egzon', '2020-07-15 19:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `datamodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_username`, `user_email`, `user_password`, `user_role`, `datamodified`) VALUES
(1, 'Egzon', 'egzon.thaqi', 'eg@gmail.com', '$2y$10$aCfsOpq/.IcVDqAljAn.YueV3Dh13ySQGGjBr2QfBJZ6Vu38433p6', 1, '2020-07-14 23:48:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontaktforma`
--
ALTER TABLE `kontaktforma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `news_country`
--
ALTER TABLE `news_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontaktforma`
--
ALTER TABLE `kontaktforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_country`
--
ALTER TABLE `news_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
