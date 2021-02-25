-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 04:19 PM
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
('EQUITY BANK', 'KARATINA', '255445666', 'JUMANJI2', 'KSHS', '20', '3', '400', '12', '3', '3', '2021-02-07'),
('KCB', 'RUIRU', '625556', 'JUMANJI', 'KSHS', '1000', '2', '1000000', '11', '1000000', '5', '2021-01-14'),
('Mannix Merrill', 'Richard Miranda', '510', 'Russell Walter', 'KSHS', '1000', '2', '82000', '34', '82000', '2', '2021-02-01');

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
('EQUITY BANK', '2021-02-01', '2021-03-01', '100000', '10', '11200', '1', '12', 'Reducing Balance', 'pending', '5');

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
('0', 'EQUITY BANK', 'NONE', '2021-02-07', '2021-02-07', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-08', '2021-02-08', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-09', '2021-02-09', '0', '0', '20', '20', '20', 'pending'),
('3334', 'KCB', 'hggu', '2021-02-22', '2021-02-18', '353532', '235353', '235253', '2343', '2343', 'pending'),
('5555', 'KCB', 'SSSSS', '2021-02-17', '2021-02-19', '4000', '2000', '1000', '5000', '3000', 'pending');

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
('Bo Mejia', 'Mannix Merrill', '5567', '600', '2021-02-10', 'interbank', 'receipt', 'pending'),
('Bo Mejia', 'Mannix Merrill', '76567', '250', '2021-02-23', 'inhouse', 'receipt', 'pending'),
('Byron Mcmillan', 'EQUITY BANK', '833', '67', '2016-03-22', 'inhouse', 'receipt', 'pending'),
('Hyatt Butler', 'Mannix Merrill', '556767', '500', '2021-02-18', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'EQUITY BANK', '342', '82', '2016-03-21', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'EQUITY BANK', '478', '12', '2016-03-22', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'EQUITY BANK', '965', '4', '2016-03-22', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'KCB', '7', '950000', '2021-02-22', 'interbank', 'pay', 'pending'),
('Rajah Velasquez', 'Mannix Merrill', '55667', '250', '2021-02-10', 'inhouse', 'pay', 'pending');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_name`,`acc_no`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
