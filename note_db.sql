-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 03:57 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `note_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_travel`
--

CREATE TABLE `tb_travel` (
  `travel_id` int(5) NOT NULL,
  `travel_no` varchar(100) DEFAULT 'ชม 0032.301/',
  `travel_create` timestamp NULL DEFAULT current_timestamp(),
  `travel_emp` varchar(100) DEFAULT NULL,
  `travel_list` varchar(100) DEFAULT NULL,
  `travel_place` varchar(255) DEFAULT NULL,
  `travel_title` varchar(255) DEFAULT NULL,
  `travel_start` timestamp NULL DEFAULT NULL,
  `travel_end` timestamp NULL DEFAULT NULL,
  `travel_status` varchar(10) DEFAULT 'inprocess'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_travel`
--

INSERT INTO `tb_travel` (`travel_id`, `travel_no`, `travel_create`, `travel_emp`, `travel_list`, `travel_place`, `travel_title`, `travel_start`, `travel_end`, `travel_status`) VALUES
(1, 'ชม 0032.301/', '2020-02-21 02:50:33', 'test create', 'test list', 'test place', 'test name', '2020-02-24 01:00:00', '2020-02-24 10:00:00', 'inprocess');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_travel`
--
ALTER TABLE `tb_travel`
  ADD PRIMARY KEY (`travel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_travel`
--
ALTER TABLE `tb_travel`
  MODIFY `travel_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
