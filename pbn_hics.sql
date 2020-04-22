-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: rds1.ccp8pntuhe7m.ap-south-1.rds.amazonaws.com
-- Generation Time: Apr 22, 2020 at 06:16 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.16-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbn_hics`
--
CREATE DATABASE IF NOT EXISTS `pbn_hics` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pbn_hics`;

-- --------------------------------------------------------

--
-- Table structure for table `data_admins`
--

CREATE TABLE `data_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `is_superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `uqid` varchar(128) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_admins`
--

INSERT INTO `data_admins` (`id`, `name`, `username`, `password`, `is_superadmin`, `uqid`, `timestamp`) VALUES
(1, 'Super Admin', 'sadmin', '389cee236cf8b4a3a12129ac52872d9d', 1, '7bc33516-806b-11ea-8d2c-026898160aac', '2020-04-16 11:25:19'),
(2, 'Report Admin', 'radmin', 'a34b75f14e21e17fbede8fea7f6b1ea7', 0, '125196ab-83b8-11ea-8d2c-026898160aac', '2020-04-21 10:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hospital_name` text NOT NULL,
  `hospital_type` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name_of_doctor` text NOT NULL,
  `subdist` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `ac_status` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'DEACTIVATED',
  `uqid` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reg_ip` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE `reporting` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `rp_date` date NOT NULL,
  `no_opd` int(11) NOT NULL,
  `no_ipd` int(11) NOT NULL,
  `no_surg` int(11) NOT NULL,
  `no_cov` int(11) NOT NULL,
  `reported_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reg_ip` varchar(256) NOT NULL,
  `uqid` varchar(36) NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admins`
--
ALTER TABLE `data_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `uqid` (`uqid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hospital_id`),
  ADD UNIQUE KEY `mobile_number_UNIQUE` (`mobile_number`),
  ADD UNIQUE KEY `uqid` (`uqid`);

--
-- Indexes for table `reporting`
--
ALTER TABLE `reporting`
  ADD PRIMARY KEY (`report_id`,`hospital_id`),
  ADD UNIQUE KEY `uqid` (`uqid`),
  ADD KEY `fk_reporting_hospitals_idx` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admins`
--
ALTER TABLE `data_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospital_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reporting`
--
ALTER TABLE `reporting`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reporting`
--
ALTER TABLE `reporting`
  ADD CONSTRAINT `fk_reporting_hospitals` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`hospital_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
