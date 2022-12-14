-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2022 at 03:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocis_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_calendar`
--

CREATE TABLE `event_calendar` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_calendar`
--

INSERT INTO `event_calendar` (`id`, `start`, `end`, `title`, `description`) VALUES
(1, '2020-07-23 19:04:33', '2013-08-01 22:34:07', 'test event 1', ''),
(2, '2020-07-09 02:09:01', '1998-05-31 15:24:40', 'test event 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(3, '2020-10-15 23:40:29', '2005-06-17 06:22:36', 'test event 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(4, '2020-11-14 18:03:52', '1970-08-01 11:01:42', 'test event 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(5, '2020-06-26 04:47:11', '2000-07-11 14:33:09', 'test event 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(7, '2020-09-20 22:20:55', '2012-12-21 07:13:48', 'test event 7', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(8, '2020-07-16 07:18:41', '2008-02-27 02:33:15', 'test event 8', ''),
(9, '2020-09-30 14:15:35', '2014-03-13 23:41:22', 'test event 9', ''),
(10, '2020-07-18 12:21:20', '2007-01-23 16:49:22', 'test event 10', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(11, '2020-11-08 06:10:32', '1972-07-02 04:19:08', 'test event 11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(12, '2020-08-14 03:22:08', '1975-06-18 23:01:26', 'test event 12', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(13, '2020-08-07 05:51:14', '2000-08-01 03:28:30', 'test event 13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(14, '2020-11-21 15:19:35', '2004-12-12 23:18:07', 'test event 14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(15, '2020-10-08 17:52:03', '1992-04-30 05:43:54', 'test event 15', ''),
(16, '2020-10-07 11:43:49', '2010-01-14 08:56:41', 'test event 16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(17, '2020-07-30 04:35:12', '2016-04-05 09:42:23', 'test event 17', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(18, '2020-12-07 03:52:20', '2013-11-26 02:19:33', 'test event 18', ''),
(19, '2020-10-17 09:50:50', '2001-10-15 08:22:30', 'test event 19', ''),
(20, '2020-07-22 04:28:44', '2015-03-15 07:29:05', 'test event 20', ''),
(21, '2020-08-26 05:39:59', '1989-09-25 20:32:06', 'test event 21', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(22, '2020-06-28 19:25:55', '1973-12-03 01:13:52', 'test event 22', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(23, '2020-06-19 10:31:02', '1971-10-23 07:21:29', 'test event 23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(24, '2020-09-28 06:26:26', '1971-06-01 06:00:22', 'test event 24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(25, '2020-09-13 08:51:28', '2000-12-06 10:27:53', 'test event 25', ''),
(26, '2020-10-20 02:39:21', '1978-01-31 17:32:29', 'test event 26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(27, '2020-09-25 00:53:12', '2011-02-21 08:59:10', 'test event 27', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(28, '2020-09-20 11:15:14', '2019-09-20 08:43:44', 'test event 28', ''),
(29, '2020-10-04 17:45:20', '2006-06-28 11:56:11', 'test event 29', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(30, '2020-08-11 17:27:35', '1978-11-02 13:10:04', 'test event 30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(31, '2020-08-11 23:37:45', '2003-05-04 03:21:48', 'test event 31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(32, '2020-06-21 13:49:02', '1995-01-19 07:38:20', 'test event 32', ''),
(33, '2020-08-07 20:01:30', '1993-02-21 21:41:19', 'test event 33', ''),
(34, '2020-08-31 03:36:18', '1991-06-13 12:47:43', 'test event 34', ''),
(35, '2020-11-04 02:46:55', '1982-05-24 21:40:57', 'test event 35', ''),
(36, '2020-08-17 00:23:07', '2005-12-28 04:50:29', 'test event 36', ''),
(37, '2020-10-11 14:03:57', '1984-08-06 06:05:01', 'test event 37', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(38, '2020-08-11 08:17:54', '1986-11-24 15:50:51', 'test event 38', ''),
(39, '2020-07-26 15:17:16', '1994-03-30 01:24:12', 'test event 39', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(40, '2020-10-13 23:33:28', '1995-03-12 13:50:59', 'test event 40', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(41, '2020-07-13 14:01:07', '2005-04-18 15:56:40', 'test event 41', ''),
(42, '2020-12-06 00:06:50', '1989-08-29 18:39:01', 'test event 42', ''),
(43, '2020-11-15 03:37:50', '2004-11-26 05:09:18', 'test event 43', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(44, '2020-12-03 21:18:41', '1994-06-05 10:10:13', 'test event 44', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(45, '2020-08-21 02:48:41', '1981-09-23 15:13:22', 'test event 45', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(46, '2020-11-26 11:47:19', '1996-08-20 07:53:40', 'test event 46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(47, '2020-10-23 04:39:18', '1978-09-21 22:05:05', 'test event 47', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(48, '2020-08-30 14:30:57', '1998-08-11 03:03:19', 'test event 48', ''),
(49, '2020-12-01 15:46:06', '2004-11-15 00:08:30', 'test event 49', 'Aenean iaculis bibendum ullamcorper. In vulputate velit eu leo aliquet eu auctor magna vestibulum.'),
(50, '2020-10-28 12:04:49', '1976-06-05 02:39:56', 'test event 50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(51, '2020-09-26 03:11:45', '1989-09-29 23:13:12', 'test event 51', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat aliquet diam non tincidunt. Vivamus vitae ipsum ac justo elementum tempus.'),
(52, '2022-09-09 10:57:02', '2022-09-09 06:59:59', 'SCIT DECIDES', 'SCIT respects a formal and organized choice by a vote of a person for a SCIT cabinet position. Looking forward to seeing you participate.\\r\\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_calendar`
--
ALTER TABLE `event_calendar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_calendar`
--
ALTER TABLE `event_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
