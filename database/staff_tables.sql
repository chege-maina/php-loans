-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Apr 23, 2021 at 09:17 AM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_loans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--


CREATE TABLE `tbl_staff` (
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `passport` varchar(50) NOT NULL,
  `nat_id` varchar(50) NOT NULL,
  `pin_no` varchar(50) NOT NULL,
  `res` varchar(20) NOT NULL,
  `nssf_no` varchar(50) NOT NULL,
  `nhif_no` varchar(50) NOT NULL,
  `off_mail` varchar(50) NOT NULL,
  `pers_mail` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `ext_no` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `job_no` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `begin_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD UNIQUE KEY `nat_id` (`nat_id`,`pin_no`,`nssf_no`,`nhif_no`,`job_no`,`account_no`);


ALTER TABLE `tbl_staff`
  ADD `employ_date` date NOT NULL AFTER `begin_date`,
  ADD `duration` varchar(16) NOT NULL AFTER `employ_date`,
  ADD `end_date` date NOT NULL AFTER `duration`,
  ADD `job_title` varchar(50) NOT NULL AFTER `end_date`,
  ADD `department` varchar(50) NOT NULL AFTER `job_title`,
  ADD `report_to` varchar(50) NOT NULL AFTER `department`,
  ADD `head_of` varchar(50) NOT NULL AFTER `report_to`,
  ADD `region` varchar(50) NOT NULL AFTER `head_of`,
  ADD `currency` varchar(50) NOT NULL AFTER `region`,
  ADD `shift` varchar(50) NOT NULL AFTER `currency`,
  ADD `employ_type` varchar(50) NOT NULL AFTER `shift`,
  ADD `off_days` varchar(50) NOT NULL AFTER `employ_type`,
  ADD `pay_type` varchar(50) NOT NULL AFTER `off_days`,
  ADD `salary` varchar(50) NOT NULL AFTER `pay_type`,
  ADD `income_tax` varchar(50) NOT NULL AFTER `salary`,
  ADD `deduct_nhif` varchar(50) NOT NULL AFTER `income_tax`,
  ADD `deduct_nssf` varchar(50) NOT NULL AFTER `deduct_nhif`,
  ADD `account_name` varchar(50) NOT NULL AFTER `deduct_nssf`,
  ADD `bank_name` varchar(50) NOT NULL AFTER `account_name`,
  ADD `sort_code` varchar(50) NOT NULL AFTER `bank_name`,
  ADD `s_mobile_no` varchar(50) NOT NULL AFTER `sort_code`,
  ADD `s_bank_branch` varchar(50) NOT NULL AFTER `s_mobile_no`,
  ADD `s_payment` varchar(50) NOT NULL AFTER `s_bank_branch`,
  ADD `status` varchar(15) NOT NULL DEFAULT 'pending' AFTER `s_payment`,
  ADD `branch` varchar(50) NOT NULL AFTER `status`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_items`
--

CREATE TABLE `tbl_staff_items` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_staff_items`
--
ALTER TABLE `tbl_staff_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_staff_items`
--
ALTER TABLE `tbl_staff_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
