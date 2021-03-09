-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 07:33 AM
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
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bank_name` varchar(50) NOT NULL,
  `branch_name` varchar(15) NOT NULL,
  `acc_no` varchar(254) NOT NULL,
  `acc_name` varchar(50) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `opening_bal` varchar(254) NOT NULL,
  `clear_days` varchar(50) NOT NULL,
  `od_limit` varchar(100) NOT NULL,
  `id_interest` varchar(100) NOT NULL,
  `over_limit` varchar(100) NOT NULL,
  `late_charges` varchar(100) NOT NULL,
  `opening_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_name`, `branch_name`, `acc_no`, `acc_name`, `currency`, `opening_bal`, `clear_days`, `od_limit`, `id_interest`, `over_limit`, `late_charges`, `opening_date`) VALUES
('Chase Boyd', 'Lars Tanner', '268', 'Shannon Morrison', 'KSHS', '-10000', '2', '1000', '10', '2', '3', '2021-02-23'),
('EQUITY BANK', 'KARATINA', '255445666', 'JUMANJI2', 'KSHS', '20', '3', '400', '12', '3', '3', '2021-02-07'),
('KCB', 'RUIRU', '625556', 'JUMANJI', 'KSHS', '1000', '2', '1000000', '11', '4', '5', '2021-02-20'),
('Mannix Merrill', 'Richard Miranda', '510', 'Russell Walter', 'KSHS', '1000', '2', '82000', '34', '82000', '2', '2021-02-26'),
('Moana Holder', 'Carlos Velez', '446', 'Boris Odom', 'KSHS', '-10000', '2', '1000', '10', '2', '3', '2021-02-01'),
('Olivia Black', 'Teegan Everett', '468', 'Cedric Whitaker', '$', '-778899', '1', '60', '56', '86', '78', '2004-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_no` varchar(100) NOT NULL,
  `postal_address` varchar(50) NOT NULL,
  `physical_address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`name`, `email`, `tel_no`, `postal_address`, `physical_address`) VALUES
('Rajah Velasquez', 'zeryg@mailinator.com', '+1 (117) 557-9511', 'Non rerum officia is', 'Cumque amet possimu'),
('Hyatt Butler', 'zuqolipano@mailinator.com', '+1 (392) 516-3484', 'Dolor aute ipsa qui', 'Doloremque necessita'),
('Gail Mccall', 'byrejaryhu@mailinator.com', '+1 (705) 244-1687', 'Enim eum impedit in', 'Laboris rem sunt est');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `currency_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`currency_unit`) VALUES
('$'),
('KSHS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`name`, `email`, `physical_address`, `postal_address`, `tel_no`) VALUES
('Bo Mejia', 'xadywyzo@mailinator.com', 'Laborum Deleniti sa', 'Tempora aliquip eu e', '+1 (429) 739-3701'),
('Byron Mcmillan', 'pahu@mailinator.com', 'Quae non cillum a et', 'Cum dolorem facilis', '+1 (436) 351-2876'),
('Dieter Davis', 'lariwodeko@mailinator.com', 'Ut exercitationem ea', 'Ex cumque dolores qu', '+1 (865) 348-8737');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loans`
--

CREATE TABLE `tbl_loans` (
  `bank_name` varchar(50) NOT NULL,
  `dis_date` date NOT NULL,
  `first_date` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `installment` varchar(100) NOT NULL,
  `next_installment` varchar(100) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `loan_category` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `late_repayment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_loans`
--

INSERT INTO `tbl_loans` (`bank_name`, `dis_date`, `first_date`, `amount`, `period`, `installment`, `next_installment`, `interest`, `loan_category`, `status`, `late_repayment`) VALUES
('EQUITY BANK', '2021-02-01', '2021-05-01', '100000', '10', '11200', '1', '10', 'Reducing Balance', 'pending', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loan_schedule`
--

CREATE TABLE `tbl_loan_schedule` (
  `bank` varchar(100) NOT NULL,
  `dis_date` date NOT NULL,
  `pay_date` date NOT NULL,
  `balance` varchar(100) NOT NULL,
  `installment` varchar(100) NOT NULL,
  `pay_no` varchar(100) NOT NULL,
  `principle` varchar(100) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Dumping data for table `tbl_od_transactions`
--

INSERT INTO `tbl_od_transactions` (`cheque_no`, `bank_name`, `details`, `banking_date`, `value_date`, `dr`, `cr`, `balance`, `opening_bal`, `closing_bal`, `status`) VALUES
('0', 'Chase Boyd', 'NONE', '2021-02-23', '2021-02-23', '0', '0', '-10000', '-10000', '-10000', 'pending'),
('0', 'Chase Boyd', 'NONE', '2021-02-24', '2021-02-24', '0', '0', '-10000', '-10000', '-10000', 'pending'),
('0', 'Chase Boyd', 'NONE', '2021-02-25', '2021-02-25', '0', '0', '-10000', '-10000', '-10000', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-07', '2021-02-07', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-08', '2021-02-08', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-09', '2021-02-09', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-10', '2021-02-10', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-11', '2021-02-11', '0', '0', '20', '20', '20', 'pending'),
('0', 'KCB', 'NONE', '2021-02-20', '2021-02-20', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-21', '2021-02-21', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-23', '2021-02-23', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-24', '2021-02-24', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'Mannix Merrill', 'NONE', '2021-02-26', '2021-02-26', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'Mannix Merrill', 'NONE', '2021-02-27', '2021-02-27', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'Mannix Merrill', 'NONE', '2021-02-28', '2021-02-28', '0', '0', '1000', '1000', '1000', 'pending'),
('3', 'Mannix Merrill', 'Byron Mcmillan', '2021-03-01', '2021-03-01', '4000', '0', '5500', '1000', '-5600', 'pending'),
('3556', 'Mannix Merrill', 'Gail Mccall', '2021-03-01', '2021-03-03', '0', '5000', '900', '1000', '-5600', 'pending'),
('4356', 'Mannix Merrill', 'Hyatt Butler', '2021-03-01', '2021-03-01', '0', '3000', '-2100', '1000', '-5600', 'pending'),
('6666', 'KCB', 'Bo Mejia', '2021-02-22', '2021-02-22', '850000', '0', '851000', '1000', '-99000', 'pending'),
('7', 'KCB', 'Rajah Velasquez', '2021-02-22', '2021-02-24', '0', '950000', '-99000', '1000', '-99000', 'pending'),
('7778', 'Mannix Merrill', 'Bo Mejia', '2021-03-01', '2021-03-03', '500', '0', '1500', '1000', '-5600', 'pending'),
('788', 'Mannix Merrill', 'Rajah Velasquez', '2021-03-01', '2021-03-03', '0', '3500', '-5600', '1000', '-5600', 'pending'),
('8', 'Mannix Merrill', 'Dieter Davis', '2021-03-01', '2021-03-03', '400', '0', '5900', '1000', '-5600', 'pending');

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
  `status` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`supplier_name`, `bank_name`, `cheque_no`, `amount`, `date`, `cheque_type`, `pay_type`, `status`) VALUES
('Bo Mejia', 'KCB', '6666', '850000', '2021-02-22', 'inhouse', 'receipt', 'pending'),
('Bo Mejia', 'Mannix Merrill', '7778', '500', '2021-03-01', 'interbank', 'receipt', 'pending'),
('Byron Mcmillan', 'EQUITY BANK', '833', '67', '2016-03-22', 'inhouse', 'receipt', 'pending'),
('Byron Mcmillan', 'Mannix Merrill', '3', '4000', '2021-03-01', 'inhouse', 'receipt', 'pending'),
('Dieter Davis', 'Mannix Merrill', '8', '400', '2021-03-01', 'interbank', 'receipt', 'pending'),
('Gail Mccall', 'Mannix Merrill', '3556', '5000', '2021-03-01', 'interbank', 'pay', 'pending'),
('Hyatt Butler', 'Mannix Merrill', '4356', '3000', '2021-03-01', 'inhouse', 'pay', 'pending'),
('Rajah Velasquez', 'EQUITY BANK', '342', '82', '2016-03-21', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'EQUITY BANK', '478', '12', '2016-03-22', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'EQUITY BANK', '965', '4', '2016-03-22', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'KCB', '7', '950000', '2021-02-22', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'Mannix Merrill', '788', '3500', '2021-03-01', 'interbank', 'pay', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_no` varchar(100) NOT NULL,
  `postal_address` varchar(50) NOT NULL,
  `physical_address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`name`, `email`, `tel_no`, `postal_address`, `physical_address`) VALUES
('Rajah Velasquez', 'zeryg@mailinator.com', '+1 (117) 557-9511', 'Non rerum officia is', 'Cumque amet possimu'),
('Hyatt Butler', 'zuqolipano@mailinator.com', '+1 (392) 516-3484', 'Dolor aute ipsa qui', 'Doloremque necessita'),
('Gail Mccall', 'byrejaryhu@mailinator.com', '+1 (705) 244-1687', 'Enim eum impedit in', 'Laboris rem sunt est');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(254) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL DEFAULT 'MAIN',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT 'OFF',
  `level` varchar(3) NOT NULL DEFAULT 'OFF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`email`, `password`, `designation`, `branch`, `first_name`, `last_name`, `status`, `level`) VALUES
('dir@rfl.com', '$2y$10$Jisk2Nl0cHrTa0id8f2kIeQ9My1mruHswrJwj3J1tMenC538wbPCa', 'Director', 'MM1', 'Kesav', 'Kesav', 'ON', 'ON'),
('pro@rfl.com', '$2y$10$6k7MhrmNzez4yVGYfv7puuj3sBd9Ruq.h4F5iSI9o13fx/jojQx.y', 'Procurement officer', 'MM1', 'James', 'Kevin', 'ON', 'OFF'),
('war2@rfl.com', '$2y$10$fZRa.4ynKAjy6utKTzpP0ew09leLuE2ZgyN.kpUt3T2/kAhOJz5Vu', 'Warehouse manager', 'MM1', 'Monica', 'Njeri', 'ON', 'OFF'),
('war@rfl.com', '$2y$10$6cjuL5jaX3lBxr8NpKZ5VunRdrSUoHGU7bEuFHGDZ4Jrzhp/5DS8u', 'Warehouse manager', 'MM2', 'Jael', 'Joel', 'OFF', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_name`,`acc_no`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`name`,`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`currency_unit`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`name`,`email`);

--
-- Indexes for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  ADD PRIMARY KEY (`bank_name`,`dis_date`);

--
-- Indexes for table `tbl_loan_schedule`
--
ALTER TABLE `tbl_loan_schedule`
  ADD PRIMARY KEY (`bank`,`dis_date`,`pay_date`);

--
-- Indexes for table `tbl_od_transactions`
--
ALTER TABLE `tbl_od_transactions`
  ADD PRIMARY KEY (`cheque_no`,`bank_name`,`details`,`banking_date`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`supplier_name`,`bank_name`,`cheque_no`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`name`,`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
