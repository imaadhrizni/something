-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 10:39 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sul`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_text` text NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `article_user_name` varchar(50) NOT NULL,
  `article_img_url` varchar(255) DEFAULT NULL,
  `article_header` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_text`, `article_category_id`, `article_user_name`, `article_img_url`, `article_header`) VALUES
(2, 'This is article number one which falls into Business category.', 2, 'admin', 'http://walkmymind.com/wp-content/uploads/2016/10/news-banner.jpg', 'Business Article 1'),
(3, 'this is the newer article thats being created', 1, 'admin', NULL, 'The Local News Newer Article '),
(4, 'business articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness articlebusiness article', 2, 'admin', NULL, 'Business Article 2');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Local News'),
(2, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_text` varchar(255) NOT NULL,
  `comment_approve_status` int(11) NOT NULL DEFAULT '0',
  `comment_user_name` varchar(50) NOT NULL,
  `comment_article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `user_type`) VALUES
('admin', '$2y$10$N3B8jmlznIbtwCQc82E9heJfu7F1vGDqNwhMJV7vTcX/Z2vWTLLEq', 1),
('user1', '$2y$10$Y6FXqgLoFtVkPcNQfRN8oe5jTAgjIH6e7atiEPHIwNsqGo0roaXWK', 0),
('user2', '$2y$10$PycCbmILcDaO0XX//MJ4jeRaxwb/p06fr65whsOwy3EATd/4coagm', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_category_id` (`article_category_id`),
  ADD KEY `article_user_id` (`article_user_name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD UNIQUE KEY `comment_user_name` (`comment_user_name`),
  ADD UNIQUE KEY `comment_article_id` (`comment_article_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`article_category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`article_user_name`) REFERENCES `user` (`username`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_article_id`) REFERENCES `article` (`article_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`comment_user_name`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
