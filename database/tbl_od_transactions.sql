-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 01:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_od_transactions`
--

CREATE TABLE `tbl_od_transactions` (
  `cheque_no` varchar(254) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `details` varchar(254) NOT NULL,
  `banking_date` date NOT NULL,
  `value_date` date NOT NULL,
  `dr` varchar(100) NOT NULL,
  `cr` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `opening_bal` varchar(100) NOT NULL,
  `closing_bal` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_od_transactions`
--
ALTER TABLE `tbl_od_transactions`
  ADD PRIMARY KEY (`cheque_no`,`bank_name`,`details`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
