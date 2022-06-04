-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 03:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userName` varchar(300) NOT NULL,
  `password` varchar(350) NOT NULL,
  `board` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `password`, `board`) VALUES
(1, 'ahmed', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `quizId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `right` int(11) NOT NULL DEFAULT -1,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `quizId`, `questionId`, `right`, `dateTime`) VALUES
(1, 'right', 1, 1, 1, '2021-12-30 15:42:58'),
(2, 'ahmed', 1, 2, 1, '2021-12-30 15:43:02'),
(3, 'wwewdsd', 1, 3, 1, '2021-12-30 15:43:06'),
(4, 'dadada', 1, 4, 1, '2021-12-30 15:43:09'),
(5, 'adad', 1, 5, 1, '2021-12-30 15:43:13'),
(6, 'addaad', 2, 1, 1, '2021-12-30 15:44:31'),
(7, '', 2, 2, 0, '2021-12-30 15:44:44'),
(8, 'dadad', 2, 3, 1, '2021-12-30 15:44:46'),
(9, 'adda', 2, 4, 0, '2021-12-30 15:44:49'),
(10, 'adad', 2, 5, 1, '2021-12-30 15:44:52'),
(11, 'asasa', 3, 1, 1, '2021-12-30 16:05:15'),
(12, '', 3, 2, 0, '2021-12-30 16:05:27'),
(13, 'dggd', 3, 3, 1, '2021-12-30 16:05:30'),
(14, 'dgsg', 3, 4, 1, '2021-12-30 16:05:33'),
(15, 'gsgdgd', 3, 5, 1, '2021-12-30 16:05:35'),
(16, 'ans1', 4, 1, 0, '2021-12-30 16:07:39'),
(17, 'Adsadsa', 4, 2, 1, '2021-12-30 16:07:47'),
(18, 'fafafsa', 4, 3, 1, '2021-12-30 16:07:50'),
(19, 'fsafsfa', 4, 4, 1, '2021-12-30 16:07:52'),
(20, 'faafsadf', 4, 5, 1, '2021-12-30 16:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` int(11) NOT NULL,
  `board` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `type`, `board`, `dateTime`) VALUES
(1, 'q1?', 0, 1, '2021-12-29 12:36:15'),
(2, 'q2', 0, 1, '2021-12-29 12:36:15'),
(3, 'q3', 0, 1, '2021-12-29 12:36:15'),
(4, 'q4', 0, 1, '2021-12-29 12:36:15'),
(5, 'q5', 0, 1, '2021-12-29 12:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `usersquizes`
--

CREATE TABLE `usersquizes` (
  `id` int(11) NOT NULL,
  `userName` varchar(300) NOT NULL,
  `board` int(11) NOT NULL,
  `checked` int(11) NOT NULL DEFAULT 0,
  `rate` float NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersquizes`
--

INSERT INTO `usersquizes` (`id`, `userName`, `board`, `checked`, `rate`, `dateTime`) VALUES
(3, 'ahmd', 1, 1, 0.8, '2021-12-30 16:05:12'),
(4, 'tasneem', 1, 1, 0.8, '2021-12-30 16:07:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersquizes`
--
ALTER TABLE `usersquizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usersquizes`
--
ALTER TABLE `usersquizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
