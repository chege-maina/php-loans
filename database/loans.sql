-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 10:36 AM
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
-- Table structure for table `tbl_advance`
--

CREATE TABLE `tbl_advance` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `nat` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date_issued` date NOT NULL,
  `year` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_advance`
--

INSERT INTO `tbl_advance` (`fname`, `lname`, `nat`, `job`, `amount`, `date_issued`, `year`, `month`, `status`) VALUES
('821', 'Eric', 'Bird', '19', '', '0000-00-00', '4909', '01', 'pending'),
('821', 'Eric', 'Bird', '19', '', '0000-00-00', '4909', '01', 'pending'),
('Bird', '19', '<input type=\"number\" required=\"\" class=\"form-contr', '', '', '0000-00-00', '8599', '01', 'pending'),
('Bird', '<input type=\"number\" required=\"\" class=\"form-contr', '', '19', '', '0000-00-00', '3555', 'January', 'pending'),
('Bird', '<input type=\"number\" required=\"\" class=\"form-contr', '', '19', '', '0000-00-00', '4002', 'January', 'pending'),
('Bird', '821', '', '19', '', '0000-00-00', '5950', 'January', 'pending'),
('Bird', '821', '', '19', '', '0000-00-00', '3499', 'January', 'pending'),
('Simmons', '614', '', '35', '', '0000-00-00', '2019', 'February', 'pending'),
('Eric', 'Bird', '19', '821', '', '3333-11-22', '2323', 'March', 'pending'),
('Eric', 'Bird', '19', '821', '', '3333-11-22', '2323', 'March', 'pending'),
('Xaviera', 'Simmons', '35', '614', '69420', '2021-04-28', '121212', 'February', 'pending'),
('Eric', 'Bird', '19', '821', '', '0000-00-00', '6890', 'February', 'pending'),
('Eric', 'Bird', '19', '821', '11', '0000-00-00', '2021', 'February', 'pending'),
('Basil', 'Mooney', '27', '537', '100000', '2021-04-15', '2021', 'February', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asset`
--

CREATE TABLE `tbl_asset` (
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `tag_no` varchar(100) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `descpt` varchar(30) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `dep_rate` varchar(15) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `dep_method` varchar(50) NOT NULL,
  `wear_tear` varchar(50) NOT NULL,
  `asset_status` varchar(50) NOT NULL,
  `financier` varchar(30) NOT NULL,
  `loan_ref` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `asset_name` varchar(100) NOT NULL,
  `asset_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `employee_name` varchar(50) NOT NULL,
  `att_date` varchar(50) NOT NULL,
  `employee_no` varchar(50) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `late_entry` varchar(20) NOT NULL,
  `early_exit` varchar(20) NOT NULL,
  `id` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`employee_name`, `att_date`, `employee_no`, `branch`, `job_title`, `status`, `late_entry`, `early_exit`, `id`) VALUES
('ID No# 82', '2021-04-10', '225', 'mm2', 'Animi', 'present', 'false', 'true', 10);

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
('KCB', 'RUIRU', '625556', 'JUMANJI', 'KSHS', '1000', '2', '1000000', '11', '4', '5', '2021-02-20'),
('Mannix Merrill', 'Richard Miranda', '510', 'Russell Walter', 'KSHS', '1000', '2', '82000', '34', '82000', '2', '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_benefit`
--

CREATE TABLE `tbl_benefit` (
  `benefit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_benefit`
--

INSERT INTO `tbl_benefit` (`benefit`) VALUES
('Cars'),
('FUEL'),
('House'),
('Transport');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bene_deduct`
--

CREATE TABLE `tbl_bene_deduct` (
  `benefit` varchar(50) NOT NULL,
  `b_month` varchar(50) NOT NULL,
  `b_year` varchar(50) NOT NULL,
  `emp_no` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fixed` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `total` varchar(100) NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bene_deduct`
--

INSERT INTO `tbl_bene_deduct` (`benefit`, `b_month`, `b_year`, `emp_no`, `name`, `fixed`, `qty`, `rate`, `total`, `type`, `status`) VALUES
('Cars', 'July', '1976', '821', 'Eric Bird', '10000', '0', '0', '10000', 'benefit', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel_no` varchar(20) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `physical_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `email`, `tel_no`, `postal_address`, `physical_address`) VALUES
(1, 'RFL', 'war2@rfl.com', '+254756473898', '567-00100', 'Ruiru,Nairobi');

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
-- Table structure for table `tbl_companyloans`
--

CREATE TABLE `tbl_companyloans` (
  `date` date NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `emp_no` varchar(50) NOT NULL,
  `loan_type` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `installment` varchar(100) NOT NULL,
  `pc_interest` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `start_date` date NOT NULL,
  `int_type` varchar(20) NOT NULL,
  `fringe_tax` varchar(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `loan_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_companyloans`
--

INSERT INTO `tbl_companyloans` (`date`, `emp_name`, `designation`, `department`, `emp_no`, `loan_type`, `description`, `amount`, `balance`, `installment`, `pc_interest`, `issue_date`, `start_date`, `int_type`, `fringe_tax`, `id`, `status`, `loan_id`) VALUES
('1991-12-10', 'National ID No# 82', 'Animi', 'all', '225', 'loan', 'medical', '69', '69', '58', '32', '1974-03-08', '1999-02-06', 'reducing', 'yes', 14, 'pending', '225 1974-03-08'),
('1987-05-28', 'National ID No# 82', 'Animi', 'all', '225', 'damage', 'types', '35', '35', '6', '25', '1995-01-30', '1990-10-06', 'straight', 'no', 15, 'pending', '225 1995-01-30'),
('1992-06-10', 'National ID No# 82', 'Animi', 'all', '225', 'damage', 'lost', '70', '70', '38', '98', '2019-08-15', '2011-03-24', 'straight', 'yes', 16, 'pending', '225 2019-08-15');

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
  `id` bigint(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `physical_address`, `postal_address`, `tel_no`) VALUES
(1, '', '', 'Laborum Deleniti sa', 'Tempora aliquip eu e', '+1 (429) 739-3701'),
(2, '', '', 'Quae non cillum a et', 'Cum dolorem facilis', '+1 (436) 351-2876'),
(3, '', '', 'Ut exercitationem ea', 'Ex cumque dolores qu', '+1 (865) 348-8737');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduction`
--

CREATE TABLE `tbl_deduction` (
  `deduction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_deduction`
--

INSERT INTO `tbl_deduction` (`deduction`) VALUES
('NHIF'),
('NSSF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`) VALUES
(2, 'ACCOUNTANT'),
(4, 'Cars'),
(1, 'DRIVER'),
(5, 'HR'),
(3, 'SALES REP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_benefit`
--

CREATE TABLE `tbl_emp_benefit` (
  `id` bigint(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `nat` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `benefit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_emp_benefit`
--

INSERT INTO `tbl_emp_benefit` (`id`, `fname`, `lname`, `nat`, `type`, `job`, `benefit`) VALUES
(1, 'Eric', 'Bird', '19', 'benefit', '821', 'Cars'),
(2, 'Eric', 'Bird', '19', 'deduction', '821', 'NHIF'),
(3, 'Basil', 'Mooney', '27', 'benefit', '537', 'FUEL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_leave`
--

CREATE TABLE `tbl_emp_leave` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `nat` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `empleave` varchar(100) NOT NULL,
  `num_days` varchar(50) NOT NULL,
  `opening_balance` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_emp_leave`
--

INSERT INTO `tbl_emp_leave` (`id`, `fname`, `lname`, `nat`, `job`, `empleave`, `num_days`, `opening_balance`, `status`) VALUES
(1, 'Josiah', 'Perkins', '82', '225', 'Annual', '0', '0', 'approved'),
(2, 'Eric', 'Bird', '19', '821', 'Maternity', '12', '34', 'approved'),
(3, 'Josiah', 'Perkins', '82', '225', 'Maternity', '34', '11', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavecat`
--

CREATE TABLE `tbl_leavecat` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leavecat`
--

INSERT INTO `tbl_leavecat` (`id`, `name`) VALUES
(1, 'Annual'),
(2, 'Maternity');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_muster`
--

CREATE TABLE `tbl_muster` (
  `must_year` varchar(50) NOT NULL,
  `must_month` varchar(50) NOT NULL,
  `paye_year` varchar(50) NOT NULL,
  `nhif_year` varchar(50) NOT NULL,
  `emp_no` varchar(50) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `absentee` varchar(50) NOT NULL,
  `earnings` varchar(100) NOT NULL,
  `paye` varchar(100) NOT NULL,
  `nssf` varchar(100) NOT NULL,
  `nhif` varchar(100) NOT NULL,
  `advance` varchar(100) NOT NULL,
  `loan` varchar(100) NOT NULL,
  `deduct` varchar(100) NOT NULL,
  `pay` varchar(100) NOT NULL,
  `nssf_employer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhif`
--

CREATE TABLE `tbl_nhif` (
  `id` int(11) NOT NULL,
  `fromnhif` varchar(50) NOT NULL,
  `tonhif` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `descnhif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nhif`
--

INSERT INTO `tbl_nhif` (`id`, `fromnhif`, `tonhif`, `rate`, `descnhif`) VALUES
(6, '0', '5999', '150', '2012'),
(7, '6000', '7999', '300', '2012'),
(8, '8000', '11999', '400', '2012'),
(9, '12000', '14999', '500', '2012'),
(10, '15000', '19999', '600', '2012'),
(11, '20000', '24999', '750', '2012'),
(12, '25000', '29999', '850', '2012'),
(13, '30000', '34999', '900', '2012'),
(14, '35000', '39999', '950', '2012'),
(15, '40000', '44999', '1000', '2012'),
(16, '0', '0', '0', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nssf`
--

CREATE TABLE `tbl_nssf` (
  `rate` varchar(50) NOT NULL
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
('0', 'EQUITY BANK', 'NONE', '2021-02-07', '2021-02-07', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-08', '2021-02-08', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-09', '2021-02-09', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-10', '2021-02-10', '0', '0', '20', '20', '20', 'pending'),
('0', 'EQUITY BANK', 'NONE', '2021-02-11', '2021-02-11', '0', '0', '20', '20', '20', 'pending'),
('0', 'KCB', 'NONE', '2021-02-20', '2021-02-20', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-21', '2021-02-21', '0', '0', '1000', '1000', '1000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-23', '2021-02-23', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'KCB', 'NONE', '2021-02-24', '2021-02-24', '0', '0', '-99000', '-99000', '-99000', 'pending'),
('0', 'Mannix Merrill', 'NONE', '2021-02-01', '2021-02-01', '0', '0', '20', '20', '20', 'pending'),
('6666', 'KCB', 'Bo Mejia', '2021-02-22', '2021-02-22', '850000', '0', '851000', '1000', '-99000', 'pending'),
('7', 'KCB', 'Rajah Velasquez', '2021-02-22', '2021-02-24', '0', '950000', '-99000', '1000', '-99000', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paybill`
--

CREATE TABLE `tbl_paybill` (
  `supplier_name` varchar(50) NOT NULL,
  `rem_no` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `cheque_type` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'paid',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paye`
--

CREATE TABLE `tbl_paye` (
  `id` int(11) NOT NULL,
  `fromnhif` varchar(50) NOT NULL,
  `tonhif` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `descnhif` varchar(50) NOT NULL,
  `relief` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paye`
--

INSERT INTO `tbl_paye` (`id`, `fromnhif`, `tonhif`, `rate`, `descnhif`, `relief`) VALUES
(6, '77', '59', '69', '2014', '2400'),
(7, '50', '35', '21', '2014', '2400'),
(8, '85', '35', '22', '2014', '2400'),
(9, '39', '29', '50', '2014', '2400'),
(10, '1', '10164', '10', '2012', '2400'),
(11, '10165', '19740', '15', '2012', '2400'),
(12, '19741', '29316', '20', '2012', '2400'),
(13, '29317', '38892', '25', '2012', '2400'),
(14, '38893', '99999999', '30', '2012', '2400'),
(15, '61', '61', '25', '2008', '1200'),
(16, '68', '93', '0', '2008', '1200'),
(17, '46', '13', '35', '2008', '1200'),
(18, '44', '13', '15', '2008', '1200'),
(19, '23', '83', '51', '2008', '1200');

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
-- Table structure for table `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `shift_id` int(50) NOT NULL,
  `shift_name` varchar(50) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `work_hours` varchar(50) NOT NULL,
  `non_work` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shift`
--

INSERT INTO `tbl_shift` (`shift_id`, `shift_name`, `start_time`, `end_time`, `work_hours`, `non_work`) VALUES
(4, 'Brendan Case', '15:44', '16:54', '81', '72'),
(5, 'Hector Short', '22:29', '09:04', '62', '55'),
(6, 'Gloria Hurst', '05:08', '11:04', '7', '80'),
(7, 'Logan Barnes', '02:03', '07:29', '93', '77');

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
  `begin_date` date NOT NULL,
  `employ_date` date NOT NULL,
  `duration` varchar(16) NOT NULL,
  `end_date` date NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `report_to` varchar(50) NOT NULL,
  `head_of` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `employ_type` varchar(50) NOT NULL,
  `off_days` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `income_tax` varchar(50) NOT NULL,
  `deduct_nhif` varchar(50) NOT NULL,
  `deduct_nssf` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `sort_code` varchar(50) NOT NULL,
  `s_mobile_no` varchar(50) NOT NULL,
  `s_bank_branch` varchar(50) NOT NULL,
  `s_payment` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`f_name`, `m_name`, `l_name`, `gender`, `dob`, `passport`, `nat_id`, `pin_no`, `res`, `nssf_no`, `nhif_no`, `off_mail`, `pers_mail`, `country`, `mobile_no`, `phone_no`, `ext_no`, `city`, `county`, `postal_code`, `job_no`, `account_no`, `begin_date`, `employ_date`, `duration`, `end_date`, `job_title`, `department`, `report_to`, `head_of`, `region`, `currency`, `shift`, `employ_type`, `off_days`, `pay_type`, `salary`, `income_tax`, `deduct_nhif`, `deduct_nssf`, `account_name`, `bank_name`, `sort_code`, `s_mobile_no`, `s_bank_branch`, `s_payment`, `status`, `branch`) VALUES
('Basil', 'Carissa', 'Mooney', 'Male', '1981-09-03', '/uploads/Screenshot (2).png', '27', '24', 'Resident', '8209', '1098765', 'bepubecuj@mailinator.com', 'byfuk@mailinator.com', 'Lesotho', '68', '39', '60', 'Dolor architecto et', 'Incididunt repudiand', '52872', '537', '', '1972-04-30', '2014-04-20', 'Laboris accusamu', '1997-08-28', 'Driver', 'HR', 'all', 'all', 'Nairobi', 'KES', 'Regular', '2014-04-20', 'FRIDAY', 'Net Pay', '400000', 'primary', 'true', 'false', '', '', '', '', '', 0, 'approved', 'RFL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_items`
--

CREATE TABLE `tbl_staff_items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_items`
--

INSERT INTO `tbl_staff_items` (`id`, `name`, `email`, `phone`, `relation`) VALUES
(1, 'Animi non qui quia', '+1 (419) 354-9206', '+1 (419) 354-9206', 'Enim officiis ex qui'),
(2, 'Sed ipsum fugiat fac', '+1 (991) 133-2316', '+1 (991) 133-2316', 'Sunt itaque porro as'),
(3, 'Veritatis mollitia m', '+1 (735) 934-5502', '+1 (735) 934-5502', 'Dolore sunt in fugia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` bigint(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `voucher_type` varchar(20) NOT NULL,
  `voucher_no` varchar(100) NOT NULL,
  `debit` varchar(30) NOT NULL,
  `credit` varchar(30) NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher_items`
--

CREATE TABLE `tbl_voucher_items` (
  `voucher_no` varchar(100) NOT NULL,
  `ledger` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `id` int(100) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_asset`
--
ALTER TABLE `tbl_asset`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_no` (`employee_no`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_name`,`acc_no`);

--
-- Indexes for table `tbl_benefit`
--
ALTER TABLE `tbl_benefit`
  ADD PRIMARY KEY (`benefit`);

--
-- Indexes for table `tbl_bene_deduct`
--
ALTER TABLE `tbl_bene_deduct`
  ADD PRIMARY KEY (`benefit`,`b_month`,`b_year`,`emp_no`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`name`,`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_companyloans`
--
ALTER TABLE `tbl_companyloans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_deduction`
--
ALTER TABLE `tbl_deduction`
  ADD PRIMARY KEY (`deduction`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_emp_benefit`
--
ALTER TABLE `tbl_emp_benefit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_emp_leave`
--
ALTER TABLE `tbl_emp_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leavecat`
--
ALTER TABLE `tbl_leavecat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_loans`
--
ALTER TABLE `tbl_loans`
  ADD PRIMARY KEY (`bank_name`,`dis_date`);

--
-- Indexes for table `tbl_loan_repayments`
--
ALTER TABLE `tbl_loan_repayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_muster`
--
ALTER TABLE `tbl_muster`
  ADD PRIMARY KEY (`must_year`,`must_month`,`emp_no`);

--
-- Indexes for table `tbl_nhif`
--
ALTER TABLE `tbl_nhif`
  ADD PRIMARY KEY (`id`,`fromnhif`,`tonhif`,`rate`,`descnhif`);

--
-- Indexes for table `tbl_nssf`
--
ALTER TABLE `tbl_nssf`
  ADD PRIMARY KEY (`rate`);

--
-- Indexes for table `tbl_od_transactions`
--
ALTER TABLE `tbl_od_transactions`
  ADD PRIMARY KEY (`cheque_no`,`bank_name`,`details`,`banking_date`);

--
-- Indexes for table `tbl_paybill`
--
ALTER TABLE `tbl_paybill`
  ADD PRIMARY KEY (`rem_no`);

--
-- Indexes for table `tbl_paye`
--
ALTER TABLE `tbl_paye`
  ADD PRIMARY KEY (`id`,`fromnhif`,`tonhif`,`rate`,`descnhif`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`supplier_name`,`bank_name`,`cheque_no`);

--
-- Indexes for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  ADD PRIMARY KEY (`shift_id`),
  ADD UNIQUE KEY `shift_name` (`shift_name`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD UNIQUE KEY `nat_id` (`nat_id`,`pin_no`,`nssf_no`,`nhif_no`,`job_no`,`account_no`);

--
-- Indexes for table `tbl_staff_items`
--
ALTER TABLE `tbl_staff_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_voucher_items`
--
ALTER TABLE `tbl_voucher_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voucher_no` (`voucher_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_companyloans`
--
ALTER TABLE `tbl_companyloans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_emp_benefit`
--
ALTER TABLE `tbl_emp_benefit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_emp_leave`
--
ALTER TABLE `tbl_emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_leavecat`
--
ALTER TABLE `tbl_leavecat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_loan_repayments`
--
ALTER TABLE `tbl_loan_repayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_nhif`
--
ALTER TABLE `tbl_nhif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_paye`
--
ALTER TABLE `tbl_paye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  MODIFY `shift_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_staff_items`
--
ALTER TABLE `tbl_staff_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_voucher_items`
--
ALTER TABLE `tbl_voucher_items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
