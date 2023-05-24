-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:26 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Transportation'),
(2, 'Institution'),
(3, 'Illegal Occurrence'),
(4, 'Natural'),
(5, 'Pollution'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `district_id`) VALUES
(1, 'Mirpur', 1),
(2, 'Uttara', 1),
(3, 'Gulshan', 1),
(4, 'Dhanmondi', 1),
(5, 'Mohammadpur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_list`
--

CREATE TABLE `complaint_list` (
  `prb_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prb_title` varchar(150) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_category` int(11) NOT NULL,
  `prb_address` varchar(200) NOT NULL,
  `prb_state` int(11) NOT NULL,
  `prb_district` int(11) NOT NULL,
  `prb_area` int(11) NOT NULL,
  `prb_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `prb_desc` varchar(500) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT 0,
  `is_solved` tinyint(1) NOT NULL DEFAULT 0,
  `prb_medianame` varchar(255) NOT NULL,
  `prb_mediatype` varchar(50) NOT NULL,
  `prb_mediapath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `state_id`) VALUES
(1, 'Dhaka District', 1),
(2, 'Gazipur District', 1),
(3, 'Narayanganj District', 1),
(4, 'Tangail District', 1),
(5, 'Chittagong District', 2),
(6, 'Cox\'s Bazar District', 2),
(7, 'Rangamati District', 2),
(8, 'Khagrachari District', 2),
(9, 'Rajshahi District', 3),
(10, 'Naogaon District', 3),
(11, 'Natore District', 3),
(12, 'Bogra District', 3),
(13, 'Khulna District', 4),
(14, 'Jessore District', 4),
(15, 'Satkhira District', 4),
(16, 'Bagerhat District', 4),
(17, 'Barisal District', 5),
(18, 'Bhola District', 5),
(19, 'Jhalokati District', 5),
(20, 'Pirojpur District', 5),
(21, 'Sylhet District', 6),
(22, 'Moulvibazar District', 6),
(23, 'Sunamganj District', 6),
(24, 'Habiganj District', 6),
(25, 'Rangpur District', 7),
(26, 'Dinajpur District', 7),
(27, 'Gaibandha District', 7),
(28, 'Kurigram District', 7),
(29, 'Mymensingh District', 8),
(30, 'Jamalpur District', 8),
(31, 'Sherpur District', 8),
(32, 'Netrokona District', 8);

-- --------------------------------------------------------

--
-- Table structure for table `reviewed_list`
--

CREATE TABLE `reviewed_list` (
  `user_id` int(11) NOT NULL,
  `prb_id` int(11) NOT NULL,
  `is_solved` tinyint(1) NOT NULL,
  `review_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Rajshahi'),
(4, 'Khulna'),
(5, 'Barisal'),
(6, 'Sylhet'),
(7, 'Rangpur'),
(8, 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `category_id`) VALUES
(1, 'Damaged Road', 1),
(2, 'Damaged Vehicles', 1),
(3, 'Traffic Jam', 1),
(4, 'Lack of Roads', 1),
(5, 'Lack of Bridges', 1),
(6, 'Poor Drainage System', 1),
(7, 'Lack of Hospital/Health Center', 2),
(8, 'Lack of Educational Institute', 2),
(9, 'Lack of Park/Playground', 2),
(10, 'Poor Infrastructure', 2),
(11, 'Poor Hospital/Health Center facilities', 2),
(12, 'Poor Educational Institute Facilities', 2),
(13, 'Poor Playground/Park Management', 2),
(14, 'Plastic Factory', 3),
(15, 'Food Adulteration', 3),
(16, 'Price Hiking', 3),
(17, 'Deforestation', 4),
(18, 'Mosquito', 4),
(19, 'Dustbin (Cleanliness)', 4),
(20, 'Air', 5),
(21, 'Water', 5),
(22, 'Others', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `user_medianame` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `full_name`, `user_name`, `email`, `mobile_no`, `password`, `address`, `nid`, `state`, `area`, `district`, `user_medianame`) VALUES
(2, 'Tawhid Mirza Mahib', 'mirzatawhid', 'mahib@gmail.com', '1222333111', '12345678', '21/ Mohiuddin Lane', '123456789', 'Chawkbazar', 'Lalbag', 'Dhaka', NULL),
(3, 'Akash', 'akash', 'akash@gmail.com', '01887799445', '1234', 'Jagannath University', '123456789', 'Lokkhibazar', 'Dhaka', 'Dhaka', NULL),
(6, 'Mirza Ali Sultan', 'mirzasultan', 'sultan@gmail.com', '01924496919', '12345678', 'Imamgonj', '1122334455', 'Chawkbazar', 'Dhaka', 'Dhaka', NULL),
(7, 'admin', 'admin', 'admin@gmail.com', '01222222222', '11223344', 'test', '12345678', '1', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verified_list`
--

CREATE TABLE `verified_list` (
  `user_id` int(11) NOT NULL,
  `prb_id` int(11) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `verify_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `complaint_list`
--
ALTER TABLE `complaint_list`
  ADD PRIMARY KEY (`prb_id`),
  ADD KEY `user_cons` (`user_id`),
  ADD KEY `state_cons` (`prb_state`),
  ADD KEY `district_cons` (`prb_district`),
  ADD KEY `area_cons` (`prb_area`),
  ADD KEY `category_cons` (`category`),
  ADD KEY `subcategory_cons` (`sub_category`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `reviewed_list`
--
ALTER TABLE `reviewed_list`
  ADD KEY `rev_prb` (`prb_id`),
  ADD KEY `rev_user` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `MOBILE_UNIQUE` (`mobile_no`),
  ADD UNIQUE KEY `USERNAME_UNIQUE` (`user_name`) USING BTREE;

--
-- Indexes for table `verified_list`
--
ALTER TABLE `verified_list`
  ADD KEY `ver_prb` (`prb_id`),
  ADD KEY `ver_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaint_list`
--
ALTER TABLE `complaint_list`
  MODIFY `prb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `complaint_list`
--
ALTER TABLE `complaint_list`
  ADD CONSTRAINT `area_cons` FOREIGN KEY (`prb_area`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_cons` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `district_cons` FOREIGN KEY (`prb_district`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `state_cons` FOREIGN KEY (`prb_state`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategory_cons` FOREIGN KEY (`sub_category`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_cons` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `reviewed_list`
--
ALTER TABLE `reviewed_list`
  ADD CONSTRAINT `rev_prb` FOREIGN KEY (`prb_id`) REFERENCES `complaint_list` (`prb_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rev_user` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verified_list`
--
ALTER TABLE `verified_list`
  ADD CONSTRAINT `ver_prb` FOREIGN KEY (`prb_id`) REFERENCES `complaint_list` (`prb_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ver_user` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
