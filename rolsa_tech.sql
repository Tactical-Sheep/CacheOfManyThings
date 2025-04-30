-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2025 at 08:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rolsa_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `consults`
--

CREATE TABLE `consults` (
  `cid` int NOT NULL,
  `eid` int DEFAULT NULL,
  `uid` int NOT NULL,
  `address_L1` varchar(75) NOT NULL,
  `address_L2` varchar(75) DEFAULT NULL,
  `town` varchar(75) NOT NULL,
  `county` varchar(75) NOT NULL,
  `postcode` varchar(9) NOT NULL,
  `date_booked` date NOT NULL,
  `timeslot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `consults`
--

INSERT INTO `consults` (`cid`, `eid`, `uid`, `address_L1`, `address_L2`, `town`, `county`, `postcode`, `date_booked`, `timeslot`) VALUES
(1, NULL, 1, '24 Oak Avenue', '96 Temple Road', 'Shireton', 'West Yorkshire', 'SH9 1EM', '2025-06-28', '10:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `eid` int NOT NULL,
  `con_fname` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `con_sname` varchar(75) NOT NULL,
  `con_email` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `con_password` varchar(75) NOT NULL,
  `avaliable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`eid`, `con_fname`, `con_sname`, `con_email`, `con_password`, `avaliable`) VALUES
(1, 'Eugene', 'Curry', 'Eugene_Curry24@RolsaTech.com', '$2y$10$6ngd6D0a72.7QQuBu4OajetEBURAkFV9aPARm7fL94jOs/k7/zW1q', 0),
(2, 'Kimberly', 'Jeffries', 'Kim.Jeffries22@RolsaTech.com', '$2y$10$bcYh2ld9Tyufbcd4BO3A3.c1kd6Sa/vTANuZOKQ3Ltg3BRCHkZgqK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `installs`
--

CREATE TABLE `installs` (
  `inst_id` int NOT NULL,
  `uid` int NOT NULL,
  `f_name` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_name` varchar(75) NOT NULL,
  `address_L1` text NOT NULL,
  `address_L2` text NOT NULL,
  `town` text NOT NULL,
  `county` text NOT NULL,
  `prod_install` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_log`
--

CREATE TABLE `sale_log` (
  `sid` int NOT NULL,
  `uid` int NOT NULL,
  `f_name` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_name` varchar(75) NOT NULL,
  `purchase` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `amount_paid` int NOT NULL,
  `ship_status` text NOT NULL,
  `install_req` tinyint(1) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int NOT NULL,
  `f_name` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `signupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `f_name`, `s_name`, `email`, `password`, `signupdate`) VALUES
(1, 'Brian ', 'Parson', 'brian.parson344@gmail.com', '$2y$10$JRyO9uaH2h1d1hKLTWJXdeThC2Fi9NCQ3XqfMycSIEknHhX4tWg7K', '2025-03-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consults`
--
ALTER TABLE `consults`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `con_name` (`con_fname`),
  ADD KEY `con_sname` (`con_sname`);

--
-- Indexes for table `installs`
--
ALTER TABLE `installs`
  ADD PRIMARY KEY (`inst_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `name` (`f_name`,`prod_install`),
  ADD KEY `prod_install` (`prod_install`),
  ADD KEY `s_name` (`s_name`);

--
-- Indexes for table `sale_log`
--
ALTER TABLE `sale_log`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `purchase` (`purchase`),
  ADD KEY `name` (`f_name`),
  ADD KEY `s_name` (`s_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `name` (`f_name`),
  ADD KEY `s_name` (`s_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consults`
--
ALTER TABLE `consults`
  MODIFY `cid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `eid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `installs`
--
ALTER TABLE `installs`
  MODIFY `inst_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_log`
--
ALTER TABLE `sale_log`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consults`
--
ALTER TABLE `consults`
  ADD CONSTRAINT `consults_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employees` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consults_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `installs`
--
ALTER TABLE `installs`
  ADD CONSTRAINT `installs_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `installs_ibfk_2` FOREIGN KEY (`f_name`) REFERENCES `user` (`f_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `installs_ibfk_3` FOREIGN KEY (`prod_install`) REFERENCES `sale_log` (`purchase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `installs_ibfk_4` FOREIGN KEY (`s_name`) REFERENCES `user` (`s_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sale_log`
--
ALTER TABLE `sale_log`
  ADD CONSTRAINT `sale_log_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_log_ibfk_2` FOREIGN KEY (`f_name`) REFERENCES `user` (`f_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_log_ibfk_3` FOREIGN KEY (`s_name`) REFERENCES `user` (`s_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
