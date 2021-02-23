-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 02:04 PM
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
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `supplier_name` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `cheque_type` varchar(50) NOT NULL,
  `pay_type` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`supplier_name`, `bank_name`, `cheque_no`, `amount`, `date`, `cheque_type`, `pay_type`, `status`) VALUES
('Byron Mcmillan', 'EQUITY BANK', '833', '67', '2016-03-22', 'inhouse', 'receipt', 'pe'),
('Rajah Velasquez', 'EQUITY BANK', '342', '82', '2016-03-21', 'interbank', 'pay', 'pe'),
('Rajah Velasquez', 'EQUITY BANK', '478', '12', '2016-03-22', 'interbank', 'pay', 'pe'),
('Rajah Velasquez', 'EQUITY BANK', '965', '4', '2016-03-22', 'interbank', 'pay', 'pe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`supplier_name`,`bank_name`,`cheque_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
