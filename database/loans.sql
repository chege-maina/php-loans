-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 09:24 AM
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
-- Database: `bank_loans`
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
('Olivia Black', 'Teegan Everett', '468', 'Cedric Whitaker', '$', '-778899', '1', '60', '56', '86', '78', '2021-01-27');

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
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `late_repayment` varchar(100) NOT NULL,
  `loan_acc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_loans`
--

INSERT INTO `tbl_loans` (`bank_name`, `dis_date`, `first_date`, `amount`, `period`, `installment`, `next_installment`, `interest`, `loan_category`, `status`, `late_repayment`, `loan_acc`) VALUES
('EQUITY BANK', '2021-04-06', '2021-05-05', '28000', '7', 'null', '4', '10', 'Reducing Balance', 'pending', '3', '43');

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
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `loan_acc` varchar(100) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_loan_schedule`
--

INSERT INTO `tbl_loan_schedule` (`bank`, `dis_date`, `pay_date`, `balance`, `installment`, `pay_no`, `principle`, `interest`, `status`, `loan_acc`, `id`) VALUES
('EQUITY BANK', '2021-04-06', '2021-05-05', '24000', '4233.33', '1', '4000', '233.33', 'paid', '43', 30),
('EQUITY BANK', '2021-04-06', '2021-06-04', '20000', '4200', '2', '4000', '200', 'paid', '43', 31),
('EQUITY BANK', '2021-04-06', '2021-07-05', '16000', '4166.67', '3', '4000', '166.67', 'paid', '43', 32),
('EQUITY BANK', '2021-04-06', '2021-08-05', '12000', '4133.33', '4', '4000', '133.33', 'pending', '43', 33),
('EQUITY BANK', '2021-04-06', '2021-09-03', '8000', '4100', '5', '4000', '100', 'pending', '43', 34),
('EQUITY BANK', '2021-04-06', '2021-10-05', '4000', '4066.67', '6', '4000', '66.67', 'pending', '43', 35),
('EQUITY BANK', '2021-04-06', '2021-11-05', '0', '4033.33', '7', '4000', '33.33', 'pending', '43', 36);

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
('0', 'KCB', 'NONE', '2021-02-20', '2021-02-20', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-21', '2021-02-21', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-23', '2021-02-23', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-24', '2021-02-24', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-25', '2021-02-25', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-26', '2021-02-26', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-27', '2021-02-27', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-28', '2021-02-28', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-03-01', '2021-03-01', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-03-02', '2021-03-02', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-03-04', '2021-03-04', '0', '0', '-104000', '-104000', '-104000', 'pending'),
('0', 'KCB', 'NONE', '2021-03-06', '2021-03-06', '0', '0', '-104450', '-104450', '-104450', 'pending'),
('0', 'KCB', 'NONE', '2021-03-07', '2021-03-07', '0', '0', '-104450', '-104450', '-104450', 'pending'),
('6666', 'KCB', 'Bo Mejia', '2021-02-22', '2021-02-22', '850000', '0', '851000', '1000', '-99000', 'pending'),
('67766', 'KCB', 'MacKensie Mullins', '2021-03-03', '2021-03-03', '0', '5000', '-104000', '-99000', '-104000', 'pending'),
('7', 'KCB', 'Rajah Velasquez', '2021-02-22', '2021-02-24', '0', '950000', '-99000', '1000', '-99000', 'pending'),
('77', 'KCB', 'Nduthi', '2021-03-05', '2021-03-07', '0', '450', '-104450', '-104000', '-104450', 'pending');

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
('EQUITY BANK', 'KCB', '76', '4000', '2021-03-29', 'interbank', 'receipt', 'pending'),
('Gail Mccall', 'Mannix Merrill', '3556', '5000', '2021-03-01', 'interbank', 'pay', 'pending'),
('Hyatt Butler', 'Mannix Merrill', '4356', '3000', '2021-03-01', 'inhouse', 'pay', 'pending'),
('KCB', 'EQUITY BANK', '76', '4000', '2021-03-29', 'interbank', 'pay', 'pending'),
('MacKensie Mullins', 'KCB', '67766', '5000', '2021-03-03', 'inhouse', 'pay', 'pending'),
('Nduthi', 'KCB', '77', '450', '2021-03-05', 'interbank', 'pay', 'pending'),
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
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `email`, `name`, `physical_address`, `postal_address`, `tel_no`) VALUES
(1, 'zowij@mailinator.com', 'MacKensie Mullins', 'Cum obcaecati quasi', 'Placeat amet vitae', '+1 (215) 987-1965');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  ADD PRIMARY KEY (`bank_name`,`dis_date`,`loan_acc`);

--
-- Indexes for table `tbl_loan_schedule`
--
ALTER TABLE `tbl_loan_schedule`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_loan_schedule`
--
ALTER TABLE `tbl_loan_schedule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
