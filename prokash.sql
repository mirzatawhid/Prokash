-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 10:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prokash`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint_list`
--

CREATE TABLE `complaint_list` (
  `prb_id` int(11) NOT NULL,
  `prb_title` varchar(150) NOT NULL,
  `category` varchar(80) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `area` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL,
  `prb_desc` varchar(500) NOT NULL,
  `prb_imagepath` varchar(200) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT 0,
  `is_solved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `nid` bigint(20) NOT NULL,
  `area` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `full_name`, `user_name`, `email`, `mobile_no`, `password`, `address`, `nid`, `area`, `city`, `district`) VALUES
(2, 'Tawhid Mirza Mahib', 'mirzatawhid', 'mahib@gmail.com', 1222333111, '12345678', '21/ Mohiuddin Lane', 123456789, 'Chawkbazar', 'Lalbag', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint_list`
--
ALTER TABLE `complaint_list`
  ADD PRIMARY KEY (`prb_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `MOBILE_UNIQUE` (`mobile_no`),
  ADD UNIQUE KEY `USERNAME_UNIQUE` (`user_name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint_list`
--
ALTER TABLE `complaint_list`
  MODIFY `prb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
