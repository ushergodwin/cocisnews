-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2022 at 03:54 PM
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
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `school` varchar(100) NOT NULL,
  `courseunit` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `lecturer` varchar(100) NOT NULL,
  `days` varchar(15) NOT NULL,
  `lecture_time` time NOT NULL,
  `theatre` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `school`, `courseunit`, `program`, `year`, `lecturer`, `days`, `lecture_time`, `theatre`, `status`) VALUES
(1, 'SCIT', 'Computer Litracy', 'BIST', 1, 'Mr. Asiimwe Paddy', 'Monday', '09:00:00', 'LLT1', 'active'),
(2, 'SCIT', 'Computer Litracy', 'BIST', 1, 'Mr. Asiimwe Paddy', 'Wednesday', '11:00:00', 'LLT1', 'active'),
(3, 'SCIT', 'Computer Litracy', 'BIST', 2, 'Mr. Asiimwe Paddy', 'Friday', '15:00:00', 'LLT1', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
