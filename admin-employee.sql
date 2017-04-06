-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 06:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `event_date`) VALUES
(6, 'Maharana Pratap Jayanti', '2016-07-07'),
(7, 'Kabirdas Jayanti', '2016-06-20'),
(8, 'Longest Day of Year', '2016-07-06'),
(10, 'Jagannath Rathyatra', '2016-07-07'),
(11, 'Independence Day', '2016-08-15'),
(12, 'Onam', '2016-09-13'),
(13, 'Gandhi Jayanti', '2016-10-02'),
(14, 'Nehru Jayanti', '2016-11-15'),
(15, 'Merry Christmas', '2016-12-25'),
(16, 'Rabindranath Tagore Jayanti', '2016-05-07'),
(17, 'Ambedkar Jayanti', '2016-04-14'),
(18, 'Bank\'s Holiday', '2016-04-01'),
(19, 'Ramakrishna Jayanti', '2016-03-10'),
(20, 'Guru Ravidas Jayanti', '2016-02-22'),
(21, 'Subhas Chandra Bose Jayanti', '2016-01-23'),
(22, 'Republic Day', '2016-01-26'),
(25, 'Ramazan', '2016-07-07'),
(26, 'Friendship Day', '2016-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category_id`) VALUES
(1, 'What is PHP?', 'PHP is a recursive acronym for \"PHP: Hypertext Preprocessor\". PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.', 1),
(2, 'What are the common usage of PHP?', 'Common uses of PHP &#8722;\r\n\r\nPHP performs system functions, i.e. from files on a system it can create, open, read, write, and close them.\r\n\r\nPHP can handle forms, i.e. gather data from files, save data to a file, thru email you can send data, return data to the user.\r\n\r\nYou add, delete, modify elements within your database thru PHP.\r\n\r\nAccess cookies variables and set cookies.\r\n\r\nUsing PHP, you can restrict users to access some pages of your website.\r\n\r\nIt can encrypt data.', 1),
(3, 'In how many ways you can embed PHP code in an HTML page?', 'All PHP code must be included inside one of the three special markup tags ate are recognised by the PHP Parser.\r\n\r\n<?php PHP code goes here ?>\r\n<?    PHP code goes here ?>\r\n<script language=\"php\"> PHP code goes here </script>\r\nMost common tag is the <?php...?>', 1),
(4, 'What is the purpose of php.ini file?', 'nvbjnj', 1),
(5, 'What is the purpose of php.ini file?', 'wjjjjjjjjjjjjjjjjjjjjjjjjjjjjysrfghtgrdutzdfhzdh', 1),
(6, 'dgbvvgb', 'd vbfbv bv ', 1),
(7, 'What is the purpose of php.ini file?', 'The purpose of php.ini file.', 1),
(8, 'What is the purpose of php.ini file?', 'the purpose of php.ini file', 1),
(9, 'What is the purpose of php.ini file?', 'the purpose of php.ini', 1),
(10, 'What is the purpose of php.ini file?', 'wqddsc', 1),
(11, 'What is the purpose of php.ini file?', 'dftrytuityiuyhoiuj', 1),
(12, 'What is the purpose of php.ini file?', 'bcfgdfgfghfgj', 1),
(13, 'Wordpress', 'gjg gjgjkgk', 6);

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `total_faq` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `category`, `total_faq`) VALUES
(1, 'PHP', 12),
(2, 'MYSQL', 0),
(3, 'JAVASCRIPT', 0),
(4, 'JQUERY', 0),
(5, 'AJAX', 0),
(6, 'Wordpress', 1),
(7, 'Codeigniter', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `loginDate` date NOT NULL,
  `loginTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `userId`, `loginDate`, `loginTime`) VALUES
(1, 17, '2016-06-21', '18:55:52'),
(5, 17, '2016-06-22', '11:14:15'),
(6, 18, '2016-06-22', '18:29:47'),
(7, 16, '2016-06-22', '11:14:59'),
(8, 17, '2016-06-18', '11:14:15'),
(9, 18, '2016-06-18', '11:29:47'),
(10, 16, '2016-06-18', '11:14:59'),
(11, 19, '2016-06-23', '18:43:11'),
(12, 16, '2016-06-23', '18:54:10'),
(13, 19, '2016-06-24', '13:32:09'),
(14, 16, '2016-06-24', '14:02:23'),
(15, 17, '2016-06-24', '14:22:24'),
(16, 16, '2016-06-29', '13:31:17'),
(17, 17, '2016-07-01', '00:06:53'),
(18, 17, '2016-07-02', '17:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `done` text NOT NULL,
  `progress` text NOT NULL,
  `upcoming` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `done`, `progress`, `upcoming`, `user_id`) VALUES
(2, 'Bootstrap Icon, Button, Text Class, Navmenu, Tab, Table, Modal, Form Bootstrap Label, Progress Bar, Panel, Bage, Datepicker, List Group Calender Wise Data Show Admin Profile Edit My Tasks Create Edit', 'Faq Category Create Edit Delete, Faq Edit Delete, Faq Like, Rating, Comment(Using mobile, email verification), Create, Edit, Delete In Date Wise In Calender, Tasks Assigned To Employee, About Page Cotent Manupulation, Permission Table, Permission Table, Permission Table', '<ol>\r\n					      		<li>Image Manupulation</li>\r\n					      		<li>Secure Data</li>\r\n					      		<li>Ajax Form Submit</li>\r\n					      		<li>Mail Send</li>\r\n					      		<li>Data Manupulatin In File</li>\r\n					      		<li>Data Manupulatin Using Excell Sheet</li>\r\n					      		<li>PDF File Generation</li>\r\n					      		<li>Chat</li>\r\n					      		<li>API Making With JSON Format Data</li>\r\n					      		<li>URI Making</li>\r\n					      		<li>After Edit Instant Effects On Open Browser Tab</li>\r\n					      	</ol>', 1),
(6, 'HTML, CSS, PHP', 'JAVASCRIPT, JQUERY, AJAX', 'CODEIGNITER, LARAVEL', 32),
(7, 'HTML, CSS, PHP', 'JAVASCRIPT, AJAX', 'CODEIGNITER, LARAVEL', 33),
(8, 'HTML, CSS, PHP', 'JAVASCRIPT, AJAX', 'CODEIGNITER, LARAVEL', 34);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `dateOfJoinning` date NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `address`, `latitude`, `longitude`, `mobile`, `email`, `salary`, `dateOfJoinning`, `role`) VALUES
(1, 'Chanchal', 'admin', '32250170a0dca92d53ec9624f336ca24', 'Murshidabad', 0.000000, 0.000000, '97878646546', 'ckm@gmail.com', '9999.00', '2016-04-01', 'Admin'),
(33, 'Gobindo Sansmal', 'gobindo', '32250170a0dca92d53ec9624f336ca24', 'Kolkata 700012', 0.000000, 0.000000, '96545654', 'gobindo@yahoo.com', '33000.00', '0000-00-00', 'Emp'),
(34, 'Suvam', 'suvam', '32250170a0dca92d53ec9624f336ca24', 'Birati 700153', 0.000000, 0.000000, '893532', 'suvam@outlook.com', '25000.00', '2016-06-12', 'Developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
