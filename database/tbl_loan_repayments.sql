-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 12:01 PM
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
-- Table structure for table `tbl_loan_repayments`
--

CREATE TABLE `tbl_loan_repayments` (
  `pay_no` varchar(100) NOT NULL,
  `installment` varchar(100) NOT NULL,
  `transaction_date` date NOT NULL,
  `pay_date` date NOT NULL,
  `loan_acc` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `late_charges` varchar(100) NOT NULL,
  `days_arrears` varchar(50) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `cheque_type` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_loan_repayments`
--
ALTER TABLE `tbl_loan_repayments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_loan_repayments`
--
ALTER TABLE `tbl_loan_repayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
