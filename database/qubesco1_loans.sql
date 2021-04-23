-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 08:59 AM
-- Server version: 5.7.34
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
('ID No# 40', '2021-04-01', '403', 'mm2', 'Aute sit qui duis e', 'present', 'false', 'false', 1);

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
('BANK OF BARODA', 'Thika', '95840400000115', 'Ruiru Feeds Ltd', 'KSHS', '-71761731.92', '2', '74000000', '11', '6', '', '2021-01-31'),
('KCB Bank limited', 'Ruiru', '1102729337', 'Ruiru Feeds Ltd', 'KSHS', '282101.78', '2', '0', '0', '0', '', '2021-01-31');

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
('Daily Wages'),
('Days Worked Earnings'),
('Fixed Salary'),
('Trip Based Earnings');

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
('RUIRU FEEDS LIMITED', 'finance@rfl96.com', '0786660332', '31729-00600', 'Ruiru'),
('Ayala Morris Traders', 'zebe@mailinator.com', '+1 (684) 659-1808', 'Iste maxime amet op', 'Exercitationem sequi');

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
('2021-04-01', 'National ID No# 40', 'Aute sit qui duis e', 'Sapiente ut blanditi', '403', 'damage', 'lost', '10000', '10000', '3000', '0', '2021-04-01', '2021-04-20', 'none', 'no', 1, 'pending', '403 2021-04-01'),
('2021-04-01', 'National ID No# 40', 'Aute sit qui duis e', 'Sapiente ut blanditi', '403', 'damage', 'lost', '10000', '10000', '3000', '0', '2021-04-01', '2021-04-20', 'none', 'no', 2, 'pending', '403 2021-04-01');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `tel_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `physical_address`, `postal_address`, `tel_no`) VALUES
(1, 'Apex steel Limited', 'k.patel@apex-steel.com', 'funzi road', '31729-00600', '0732668014'),
(2, 'BIDCO AFRICA LIMITED', 'daniel.gachanja@bidcoafrica.com', 'Thika', '239-01000', '0713201365'),
(3, 'Bidcoro Africa limited', 'evans.juma@bidcoroafrica.com', 'Ruiru', '9', '0780325883'),
(4, 'Ferrotech industries limited', 'accounts@ferrotechafrica.com', 'Mombasa', '31729-00600', '0756 463563'),
(5, 'Karn Industries ltd', 'sales@raghavindustry.com', 'Nairobi', '32909-00600', '0786700735'),
(6, 'Kenafric industries limited', 'cwaihiga@kenafricind.com', 'Babdogo road', '39257-00623', '0730700000'),
(7, 'Kenafric Manufecture ltd', 'cwaihiga@kenafricind.com', 'Babdogo road', '39257-00623', '0730700000'),
(8, 'Kenafric Matches', 'cwaihiga@kenafricind.com', 'Nairobi', '39257-00623', '0730700000'),
(9, 'Mabati Rolling Mills limited', 'john.karanja@safalgroup.com', 'Athi river', '271-00204', '0717901409'),
(10, 'Nirav agencies ltd', 'dhumal@pisukenya.com', 'Nairobi', '17645-00520', '0788717777'),
(11, 'Raghav industries limited', 'sales@raghavindustry.com', 'Nairobi', '01', '0705734559'),
(12, 'Rising freight ltd', 'geeta.solanki17@gmail.com', 'Nairobi', '8', '0724255055'),
(13, 'Speedex logistics limited', 'hitesh@speedexlogistics.com', 'Nairobi', '9', '0733718017'),
(14, 'Tuff steel limited', 'manager@tuffsteel.co.ke', 'Nairobi', '10757-00200', '0715200200'),
(15, 'Western Emporium (1975) Ltd', 'westemp@africaonline.co.ke', 'kisumu', '01', '0722 829595'),
(16, 'Yashpoles limited', 'hardik@nal.co.ke', 'Insiginya', '1', '0727785658');

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
('Cash Stolen'),
('Fuel Siphoned'),
('Goods Lost'),
('Lost Phones');

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
(1, 'Transport'),
(2, 'Workshop');

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
(1, 'Raja', 'Ayala', '93', '', 'Annual Leave', '30', '10', 'pending'),
(2, 'Raja', 'Ayala', '93', '', 'Maternity Leave', '0', '0', 'pending'),
(3, 'Raja', 'Ayala', '93', '', 'Study Leave', '90', '12', 'pending'),
(4, 'George', 'Fulton', '18', '', 'Annual Leave', '7', '12', 'pending'),
(5, 'George', 'Fulton', '18', '', 'Maternity Leave', '13', '23', 'pending'),
(6, 'George', 'Fulton', '18', '', 'Study Leave', '34', '0', 'pending');

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
(1, 'Annual Leave'),
(2, 'Maternity Leave'),
(3, 'Study Leave');

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
('BANK OF BARODA', '2016-12-13', '2017-01-30', '50000000', '60', 'null', '42', '11', 'Reducing Balance', 'pending', '3', '95840600000848'),
('BANK OF BARODA', '2018-01-31', '2018-02-28', '59000000', '48', 'null', '29', '11', 'Reducing Balance', 'pending', '3', '95840600000894'),
('BANK OF BARODA', '2019-06-20', '2024-04-30', '19800000', '48', 'null', '12', '11', 'Reducing Balance', 'pending', '3', '95840600000966'),
('BANK OF BARODA', '2019-06-20', '2019-07-31', '19800000', '48', 'null', '12', '11', 'Reducing Balance', 'pending', '3', '958406000009660'),
('BANK OF BARODA', '2020-06-18', '2021-06-30', '90000000', '48', 'null', '1', '11', 'Reducing Balance', 'pending', '3', '95840600001022');

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
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_loan_schedule`
--

INSERT INTO `tbl_loan_schedule` (`bank`, `dis_date`, `pay_date`, `balance`, `installment`, `pay_no`, `principle`, `interest`, `status`, `loan_acc`, `id`) VALUES
('BANK OF BARODA', '2019-06-20', '2024-04-30', '19387500', '594000', '1', '412500', '181500', 'pending', '95840600000966', 1),
('BANK OF BARODA', '2019-06-20', '2024-05-30', '18975000', '590218.75', '2', '412500', '177718.75', 'pending', '95840600000966', 2),
('BANK OF BARODA', '2019-06-20', '2024-06-28', '18562500', '586437.5', '3', '412500', '173937.5', 'pending', '95840600000966', 3),
('BANK OF BARODA', '2019-06-20', '2024-07-30', '18150000', '582656.25', '4', '412500', '170156.25', 'pending', '95840600000966', 4),
('BANK OF BARODA', '2019-06-20', '2024-08-30', '17737500', '578875', '5', '412500', '166375', 'pending', '95840600000966', 5),
('BANK OF BARODA', '2019-06-20', '2024-09-30', '17325000', '575093.75', '6', '412500', '162593.75', 'pending', '95840600000966', 6),
('BANK OF BARODA', '2019-06-20', '2024-10-30', '16912500', '571312.5', '7', '412500', '158812.5', 'pending', '95840600000966', 7),
('BANK OF BARODA', '2019-06-20', '2024-11-29', '16500000', '567531.25', '8', '412500', '155031.25', 'pending', '95840600000966', 8),
('BANK OF BARODA', '2019-06-20', '2024-12-30', '16087500', '563750', '9', '412500', '151250', 'pending', '95840600000966', 9),
('BANK OF BARODA', '2019-06-20', '2025-01-30', '15675000', '559968.75', '10', '412500', '147468.75', 'pending', '95840600000966', 10),
('BANK OF BARODA', '2019-06-20', '2025-02-28', '15262500', '556187.5', '11', '412500', '143687.5', 'pending', '95840600000966', 11),
('BANK OF BARODA', '2019-06-20', '2025-04-02', '14850000', '552406.25', '12', '412500', '139906.25', 'pending', '95840600000966', 12),
('BANK OF BARODA', '2019-06-20', '2025-05-02', '14437500', '548625', '13', '412500', '136125', 'pending', '95840600000966', 13),
('BANK OF BARODA', '2019-06-20', '2025-06-02', '14025000', '544843.75', '14', '412500', '132343.75', 'pending', '95840600000966', 14),
('BANK OF BARODA', '2019-06-20', '2025-07-02', '13612500', '541062.5', '15', '412500', '128562.5', 'pending', '95840600000966', 15),
('BANK OF BARODA', '2019-06-20', '2025-08-01', '13200000', '537281.25', '16', '412500', '124781.25', 'pending', '95840600000966', 16),
('BANK OF BARODA', '2019-06-20', '2025-09-02', '12787500', '533500', '17', '412500', '121000', 'pending', '95840600000966', 17),
('BANK OF BARODA', '2019-06-20', '2025-10-02', '12375000', '529718.75', '18', '412500', '117218.75', 'pending', '95840600000966', 18),
('BANK OF BARODA', '2019-06-20', '2025-10-31', '11962500', '525937.5', '19', '412500', '113437.5', 'pending', '95840600000966', 19),
('BANK OF BARODA', '2019-06-20', '2025-12-02', '11550000', '522156.25', '20', '412500', '109656.25', 'pending', '95840600000966', 20),
('BANK OF BARODA', '2019-06-20', '2026-01-02', '11137500', '518375', '21', '412500', '105875', 'pending', '95840600000966', 21),
('BANK OF BARODA', '2019-06-20', '2026-02-02', '10725000', '514593.75', '22', '412500', '102093.75', 'pending', '95840600000966', 22),
('BANK OF BARODA', '2019-06-20', '2026-03-02', '10312500', '510812.5', '23', '412500', '98312.5', 'pending', '95840600000966', 23),
('BANK OF BARODA', '2019-06-20', '2026-04-02', '9900000', '507031.25', '24', '412500', '94531.25', 'pending', '95840600000966', 24),
('BANK OF BARODA', '2019-06-20', '2026-05-01', '9487500', '503250', '25', '412500', '90750', 'pending', '95840600000966', 25),
('BANK OF BARODA', '2019-06-20', '2026-06-02', '9075000', '499468.75', '26', '412500', '86968.75', 'pending', '95840600000966', 26),
('BANK OF BARODA', '2019-06-20', '2026-07-02', '8662500', '495687.5', '27', '412500', '83187.5', 'pending', '95840600000966', 27),
('BANK OF BARODA', '2019-06-20', '2026-07-31', '8250000', '491906.25', '28', '412500', '79406.25', 'pending', '95840600000966', 28),
('BANK OF BARODA', '2019-06-20', '2026-09-02', '7837500', '488125', '29', '412500', '75625', 'pending', '95840600000966', 29),
('BANK OF BARODA', '2019-06-20', '2026-10-02', '7425000', '484343.75', '30', '412500', '71843.75', 'pending', '95840600000966', 30),
('BANK OF BARODA', '2019-06-20', '2026-11-02', '7012500', '480562.5', '31', '412500', '68062.5', 'pending', '95840600000966', 31),
('BANK OF BARODA', '2019-06-20', '2026-12-02', '6600000', '476781.25', '32', '412500', '64281.25', 'pending', '95840600000966', 32),
('BANK OF BARODA', '2019-06-20', '2027-01-01', '6187500', '473000', '33', '412500', '60500', 'pending', '95840600000966', 33),
('BANK OF BARODA', '2019-06-20', '2027-02-02', '5775000', '469218.75', '34', '412500', '56718.75', 'pending', '95840600000966', 34),
('BANK OF BARODA', '2019-06-20', '2027-03-02', '5362500', '465437.5', '35', '412500', '52937.5', 'pending', '95840600000966', 35),
('BANK OF BARODA', '2019-06-20', '2027-04-02', '4950000', '461656.25', '36', '412500', '49156.25', 'pending', '95840600000966', 36),
('BANK OF BARODA', '2019-06-20', '2027-04-30', '4537500', '457875', '37', '412500', '45375', 'pending', '95840600000966', 37),
('BANK OF BARODA', '2019-06-20', '2027-06-02', '4125000', '454093.75', '38', '412500', '41593.75', 'pending', '95840600000966', 38),
('BANK OF BARODA', '2019-06-20', '2027-07-02', '3712500', '450312.5', '39', '412500', '37812.5', 'pending', '95840600000966', 39),
('BANK OF BARODA', '2019-06-20', '2027-08-02', '3300000', '446531.25', '40', '412500', '34031.25', 'pending', '95840600000966', 40),
('BANK OF BARODA', '2019-06-20', '2027-09-02', '2887500', '442750', '41', '412500', '30250', 'pending', '95840600000966', 41),
('BANK OF BARODA', '2019-06-20', '2027-10-01', '2475000', '438968.75', '42', '412500', '26468.75', 'pending', '95840600000966', 42),
('BANK OF BARODA', '2019-06-20', '2027-11-02', '2062500', '435187.5', '43', '412500', '22687.5', 'pending', '95840600000966', 43),
('BANK OF BARODA', '2019-06-20', '2027-12-02', '1650000', '431406.25', '44', '412500', '18906.25', 'pending', '95840600000966', 44),
('BANK OF BARODA', '2019-06-20', '2027-12-31', '1237500', '427625', '45', '412500', '15125', 'pending', '95840600000966', 45),
('BANK OF BARODA', '2019-06-20', '2028-02-02', '825000', '423843.75', '46', '412500', '11343.75', 'pending', '95840600000966', 46),
('BANK OF BARODA', '2019-06-20', '2028-03-02', '412500', '420062.5', '47', '412500', '7562.5', 'pending', '95840600000966', 47),
('BANK OF BARODA', '2019-06-20', '2028-03-31', '0', '416281.25', '48', '412500', '3781.25', 'pending', '95840600000966', 48),
('BANK OF BARODA', '2016-12-13', '2017-01-30', '49166666.67', '1291666.66', '1', '833333.33', '458333.33', 'pending', '95840600000848', 49),
('BANK OF BARODA', '2016-12-13', '2017-03-02', '48333333.34', '1284027.77', '2', '833333.33', '450694.44', 'pending', '95840600000848', 50),
('BANK OF BARODA', '2016-12-13', '2017-03-31', '47500000.01', '1276388.89', '3', '833333.33', '443055.56', 'pending', '95840600000848', 51),
('BANK OF BARODA', '2016-12-13', '2017-05-02', '46666666.68', '1268750', '4', '833333.33', '435416.67', 'pending', '95840600000848', 52),
('BANK OF BARODA', '2016-12-13', '2017-06-02', '45833333.35', '1261111.11', '5', '833333.33', '427777.78', 'pending', '95840600000848', 53),
('BANK OF BARODA', '2016-12-13', '2017-06-30', '45000000.02', '1253472.22', '6', '833333.33', '420138.89', 'pending', '95840600000848', 54),
('BANK OF BARODA', '2016-12-13', '2017-08-02', '44166666.69', '1245833.33', '7', '833333.33', '412500', 'pending', '95840600000848', 55),
('BANK OF BARODA', '2016-12-13', '2017-09-01', '43333333.36', '1238194.44', '8', '833333.33', '404861.11', 'pending', '95840600000848', 56),
('BANK OF BARODA', '2016-12-13', '2017-10-02', '42500000.03', '1230555.55', '9', '833333.33', '397222.22', 'pending', '95840600000848', 57),
('BANK OF BARODA', '2016-12-13', '2017-11-02', '41666666.7', '1222916.66', '10', '833333.33', '389583.33', 'pending', '95840600000848', 58),
('BANK OF BARODA', '2016-12-13', '2017-12-01', '40833333.37', '1215277.77', '11', '833333.33', '381944.44', 'pending', '95840600000848', 59),
('BANK OF BARODA', '2016-12-13', '2018-01-02', '40000000.04', '1207638.89', '12', '833333.33', '374305.56', 'pending', '95840600000848', 60),
('BANK OF BARODA', '2016-12-13', '2018-02-02', '39166666.71', '1200000', '13', '833333.33', '366666.67', 'pending', '95840600000848', 61),
('BANK OF BARODA', '2016-12-13', '2018-03-02', '38333333.38', '1192361.11', '14', '833333.33', '359027.78', 'pending', '95840600000848', 62),
('BANK OF BARODA', '2016-12-13', '2018-04-02', '37500000.05', '1184722.22', '15', '833333.33', '351388.89', 'pending', '95840600000848', 63),
('BANK OF BARODA', '2016-12-13', '2018-05-02', '36666666.72', '1177083.33', '16', '833333.33', '343750', 'pending', '95840600000848', 64),
('BANK OF BARODA', '2016-12-13', '2018-06-01', '35833333.39', '1169444.44', '17', '833333.33', '336111.11', 'pending', '95840600000848', 65),
('BANK OF BARODA', '2016-12-13', '2018-07-02', '35000000.06', '1161805.55', '18', '833333.33', '328472.22', 'pending', '95840600000848', 66),
('BANK OF BARODA', '2016-12-13', '2018-08-02', '34166666.73', '1154166.66', '19', '833333.33', '320833.33', 'pending', '95840600000848', 67),
('BANK OF BARODA', '2016-12-13', '2018-08-31', '33333333.4', '1146527.78', '20', '833333.33', '313194.45', 'pending', '95840600000848', 68),
('BANK OF BARODA', '2016-12-13', '2018-10-02', '32500000.07', '1138888.89', '21', '833333.33', '305555.56', 'pending', '95840600000848', 69),
('BANK OF BARODA', '2016-12-13', '2018-11-02', '31666666.74', '1131250', '22', '833333.33', '297916.67', 'pending', '95840600000848', 70),
('BANK OF BARODA', '2016-12-13', '2018-11-30', '30833333.41', '1123611.11', '23', '833333.33', '290277.78', 'pending', '95840600000848', 71),
('BANK OF BARODA', '2016-12-13', '2019-01-02', '30000000.08', '1115972.22', '24', '833333.33', '282638.89', 'pending', '95840600000848', 72),
('BANK OF BARODA', '2016-12-13', '2019-02-01', '29166666.75', '1108333.33', '25', '833333.33', '275000', 'pending', '95840600000848', 73),
('BANK OF BARODA', '2016-12-13', '2019-03-01', '28333333.42', '1100694.44', '26', '833333.33', '267361.11', 'pending', '95840600000848', 74),
('BANK OF BARODA', '2016-12-13', '2019-04-02', '27500000.09', '1093055.55', '27', '833333.33', '259722.22', 'pending', '95840600000848', 75),
('BANK OF BARODA', '2016-12-13', '2019-05-02', '26666666.76', '1085416.66', '28', '833333.33', '252083.33', 'pending', '95840600000848', 76),
('BANK OF BARODA', '2016-12-13', '2019-05-31', '25833333.43', '1077777.78', '29', '833333.33', '244444.45', 'pending', '95840600000848', 77),
('BANK OF BARODA', '2016-12-13', '2019-07-02', '25000000.1', '1070138.89', '30', '833333.33', '236805.56', 'pending', '95840600000848', 78),
('BANK OF BARODA', '2016-12-13', '2019-08-02', '24166666.77', '1062500', '31', '833333.33', '229166.67', 'pending', '95840600000848', 79),
('BANK OF BARODA', '2016-12-13', '2019-09-02', '23333333.44', '1054861.11', '32', '833333.33', '221527.78', 'pending', '95840600000848', 80),
('BANK OF BARODA', '2016-12-13', '2019-10-02', '22500000.11', '1047222.22', '33', '833333.33', '213888.89', 'pending', '95840600000848', 81),
('BANK OF BARODA', '2016-12-13', '2019-11-01', '21666666.78', '1039583.33', '34', '833333.33', '206250', 'pending', '95840600000848', 82),
('BANK OF BARODA', '2016-12-13', '2019-12-02', '20833333.45', '1031944.44', '35', '833333.33', '198611.11', 'pending', '95840600000848', 83),
('BANK OF BARODA', '2016-12-13', '2020-01-02', '20000000.12', '1024305.55', '36', '833333.33', '190972.22', 'pending', '95840600000848', 84),
('BANK OF BARODA', '2016-12-13', '2020-01-31', '19166666.79', '1016666.66', '37', '833333.33', '183333.33', 'pending', '95840600000848', 85),
('BANK OF BARODA', '2016-12-13', '2020-03-02', '18333333.46', '1009027.78', '38', '833333.33', '175694.45', 'pending', '95840600000848', 86),
('BANK OF BARODA', '2016-12-13', '2020-04-02', '17500000.13', '1001388.89', '39', '833333.33', '168055.56', 'pending', '95840600000848', 87),
('BANK OF BARODA', '2016-12-13', '2020-05-01', '16666666.8', '993750', '40', '833333.33', '160416.67', 'pending', '95840600000848', 88),
('BANK OF BARODA', '2016-12-13', '2020-06-02', '15833333.47', '986111.11', '41', '833333.33', '152777.78', 'pending', '95840600000848', 89),
('BANK OF BARODA', '2016-12-13', '2020-07-02', '15000000.14', '978472.22', '42', '833333.33', '145138.89', 'pending', '95840600000848', 90),
('BANK OF BARODA', '2016-12-13', '2020-07-31', '14166666.81', '970833.33', '43', '833333.33', '137500', 'pending', '95840600000848', 91),
('BANK OF BARODA', '2016-12-13', '2020-09-02', '13333333.48', '963194.44', '44', '833333.33', '129861.11', 'pending', '95840600000848', 92),
('BANK OF BARODA', '2016-12-13', '2020-10-02', '12500000.15', '955555.55', '45', '833333.33', '122222.22', 'pending', '95840600000848', 93),
('BANK OF BARODA', '2016-12-13', '2020-11-02', '11666666.82', '947916.66', '46', '833333.33', '114583.33', 'pending', '95840600000848', 94),
('BANK OF BARODA', '2016-12-13', '2020-12-02', '10833333.49', '940277.78', '47', '833333.33', '106944.45', 'pending', '95840600000848', 95),
('BANK OF BARODA', '2016-12-13', '2021-01-01', '10000000.16', '932638.89', '48', '833333.33', '99305.56', 'paid', '95840600000848', 96),
('BANK OF BARODA', '2016-12-13', '2021-02-02', '9166666.83', '925000', '49', '833333.33', '91666.67', 'pending', '95840600000848', 97),
('BANK OF BARODA', '2016-12-13', '2021-03-02', '8333333.5', '917361.11', '50', '833333.33', '84027.78', 'pending', '95840600000848', 98),
('BANK OF BARODA', '2016-12-13', '2021-04-02', '7500000.17', '909722.22', '51', '833333.33', '76388.89', 'pending', '95840600000848', 99),
('BANK OF BARODA', '2016-12-13', '2021-04-30', '6666666.84', '902083.33', '52', '833333.33', '68750', 'pending', '95840600000848', 100),
('BANK OF BARODA', '2016-12-13', '2021-06-02', '5833333.51', '894444.44', '53', '833333.33', '61111.11', 'pending', '95840600000848', 101),
('BANK OF BARODA', '2016-12-13', '2021-07-02', '5000000.18', '886805.55', '54', '833333.33', '53472.22', 'pending', '95840600000848', 102),
('BANK OF BARODA', '2016-12-13', '2021-08-02', '4166666.85', '879166.66', '55', '833333.33', '45833.33', 'pending', '95840600000848', 103),
('BANK OF BARODA', '2016-12-13', '2021-09-02', '3333333.52', '871527.78', '56', '833333.33', '38194.45', 'pending', '95840600000848', 104),
('BANK OF BARODA', '2016-12-13', '2021-10-01', '2500000.19', '863888.89', '57', '833333.33', '30555.56', 'pending', '95840600000848', 105),
('BANK OF BARODA', '2016-12-13', '2021-11-02', '1666666.86', '856250', '58', '833333.33', '22916.67', 'pending', '95840600000848', 106),
('BANK OF BARODA', '2016-12-13', '2021-12-02', '833333.53', '848611.11', '59', '833333.33', '15277.78', 'pending', '95840600000848', 107),
('BANK OF BARODA', '2016-12-13', '2021-12-31', '0.2', '840972.22', '60', '833333.33', '7638.89', 'pending', '95840600000848', 108),
('BANK OF BARODA', '2018-01-31', '2018-02-28', '57770833.33', '1770000', '1', '1229166.67', '540833.33', 'pending', '95840600000894', 109),
('BANK OF BARODA', '2018-01-31', '2018-03-28', '56541666.66', '1758732.64', '2', '1229166.67', '529565.97', 'pending', '95840600000894', 110),
('BANK OF BARODA', '2018-01-31', '2018-04-27', '55312499.99', '1747465.28', '3', '1229166.67', '518298.61', 'pending', '95840600000894', 111),
('BANK OF BARODA', '2018-01-31', '2018-05-28', '54083333.32', '1736197.92', '4', '1229166.67', '507031.25', 'pending', '95840600000894', 112),
('BANK OF BARODA', '2018-01-31', '2018-06-28', '52854166.65', '1724930.56', '5', '1229166.67', '495763.89', 'pending', '95840600000894', 113),
('BANK OF BARODA', '2018-01-31', '2018-07-27', '51624999.98', '1713663.2', '6', '1229166.67', '484496.53', 'pending', '95840600000894', 114),
('BANK OF BARODA', '2018-01-31', '2018-08-28', '50395833.31', '1702395.84', '7', '1229166.67', '473229.17', 'pending', '95840600000894', 115),
('BANK OF BARODA', '2018-01-31', '2018-09-28', '49166666.64', '1691128.48', '8', '1229166.67', '461961.81', 'pending', '95840600000894', 116),
('BANK OF BARODA', '2018-01-31', '2018-10-26', '47937499.97', '1679861.11', '9', '1229166.67', '450694.44', 'pending', '95840600000894', 117),
('BANK OF BARODA', '2018-01-31', '2018-11-28', '46708333.3', '1668593.75', '10', '1229166.67', '439427.08', 'pending', '95840600000894', 118),
('BANK OF BARODA', '2018-01-31', '2018-12-28', '45479166.63', '1657326.39', '11', '1229166.67', '428159.72', 'pending', '95840600000894', 119),
('BANK OF BARODA', '2018-01-31', '2019-01-28', '44249999.96', '1646059.03', '12', '1229166.67', '416892.36', 'pending', '95840600000894', 120),
('BANK OF BARODA', '2018-01-31', '2019-02-28', '43020833.29', '1634791.67', '13', '1229166.67', '405625', 'pending', '95840600000894', 121),
('BANK OF BARODA', '2018-01-31', '2019-03-28', '41791666.62', '1623524.31', '14', '1229166.67', '394357.64', 'pending', '95840600000894', 122),
('BANK OF BARODA', '2018-01-31', '2019-04-26', '40562499.95', '1612256.95', '15', '1229166.67', '383090.28', 'pending', '95840600000894', 123),
('BANK OF BARODA', '2018-01-31', '2019-05-28', '39333333.28', '1600989.59', '16', '1229166.67', '371822.92', 'pending', '95840600000894', 124),
('BANK OF BARODA', '2018-01-31', '2019-06-28', '38104166.61', '1589722.23', '17', '1229166.67', '360555.56', 'pending', '95840600000894', 125),
('BANK OF BARODA', '2018-01-31', '2019-07-26', '36874999.94', '1578454.86', '18', '1229166.67', '349288.19', 'pending', '95840600000894', 126),
('BANK OF BARODA', '2018-01-31', '2019-08-28', '35645833.27', '1567187.5', '19', '1229166.67', '338020.83', 'pending', '95840600000894', 127),
('BANK OF BARODA', '2018-01-31', '2019-09-27', '34416666.6', '1555920.14', '20', '1229166.67', '326753.47', 'pending', '95840600000894', 128),
('BANK OF BARODA', '2018-01-31', '2019-10-28', '33187499.93', '1544652.78', '21', '1229166.67', '315486.11', 'pending', '95840600000894', 129),
('BANK OF BARODA', '2018-01-31', '2019-11-28', '31958333.26', '1533385.42', '22', '1229166.67', '304218.75', 'pending', '95840600000894', 130),
('BANK OF BARODA', '2018-01-31', '2019-12-27', '30729166.59', '1522118.06', '23', '1229166.67', '292951.39', 'pending', '95840600000894', 131),
('BANK OF BARODA', '2018-01-31', '2020-01-28', '29499999.92', '1510850.7', '24', '1229166.67', '281684.03', 'pending', '95840600000894', 132),
('BANK OF BARODA', '2018-01-31', '2020-02-28', '28270833.25', '1499583.34', '25', '1229166.67', '270416.67', 'pending', '95840600000894', 133),
('BANK OF BARODA', '2018-01-31', '2020-03-27', '27041666.58', '1488315.97', '26', '1229166.67', '259149.3', 'pending', '95840600000894', 134),
('BANK OF BARODA', '2018-01-31', '2020-04-28', '25812499.91', '1477048.61', '27', '1229166.67', '247881.94', 'pending', '95840600000894', 135),
('BANK OF BARODA', '2018-01-31', '2020-05-28', '24583333.24', '1465781.25', '28', '1229166.67', '236614.58', 'pending', '95840600000894', 136),
('BANK OF BARODA', '2018-01-31', '2020-06-26', '23354166.57', '1454513.89', '29', '1229166.67', '225347.22', 'pending', '95840600000894', 137),
('BANK OF BARODA', '2018-01-31', '2020-07-28', '22124999.9', '1443246.53', '30', '1229166.67', '214079.86', 'pending', '95840600000894', 138),
('BANK OF BARODA', '2018-01-31', '2020-08-28', '20895833.23', '1431979.17', '31', '1229166.67', '202812.5', 'pending', '95840600000894', 139),
('BANK OF BARODA', '2018-01-31', '2020-09-28', '19666666.56', '1420711.81', '32', '1229166.67', '191545.14', 'pending', '95840600000894', 140),
('BANK OF BARODA', '2018-01-31', '2020-10-28', '18437499.89', '1409444.45', '33', '1229166.67', '180277.78', 'pending', '95840600000894', 141),
('BANK OF BARODA', '2018-01-31', '2020-11-27', '17208333.22', '1398177.09', '34', '1229166.67', '169010.42', 'pending', '95840600000894', 142),
('BANK OF BARODA', '2018-01-31', '2020-12-28', '15979166.55', '1386909.72', '35', '1229166.67', '157743.05', 'pending', '95840600000894', 143),
('BANK OF BARODA', '2018-01-31', '2021-01-28', '14749999.88', '1375642.36', '36', '1229166.67', '146475.69', 'pending', '95840600000894', 144),
('BANK OF BARODA', '2018-01-31', '2021-02-26', '13520833.21', '1364375', '37', '1229166.67', '135208.33', 'paid', '95840600000894', 145),
('BANK OF BARODA', '2018-01-31', '2021-03-26', '12291666.54', '1353107.64', '38', '1229166.67', '123940.97', 'pending', '95840600000894', 146),
('BANK OF BARODA', '2018-01-31', '2021-04-28', '11062499.87', '1341840.28', '39', '1229166.67', '112673.61', 'pending', '95840600000894', 147),
('BANK OF BARODA', '2018-01-31', '2021-05-28', '9833333.2', '1330572.92', '40', '1229166.67', '101406.25', 'pending', '95840600000894', 148),
('BANK OF BARODA', '2018-01-31', '2021-06-28', '8604166.53', '1319305.56', '41', '1229166.67', '90138.89', 'pending', '95840600000894', 149),
('BANK OF BARODA', '2018-01-31', '2021-07-28', '7374999.86', '1308038.2', '42', '1229166.67', '78871.53', 'pending', '95840600000894', 150),
('BANK OF BARODA', '2018-01-31', '2021-08-27', '6145833.19', '1296770.84', '43', '1229166.67', '67604.17', 'pending', '95840600000894', 151),
('BANK OF BARODA', '2018-01-31', '2021-09-28', '4916666.52', '1285503.47', '44', '1229166.67', '56336.8', 'pending', '95840600000894', 152),
('BANK OF BARODA', '2018-01-31', '2021-10-28', '3687499.85', '1274236.11', '45', '1229166.67', '45069.44', 'pending', '95840600000894', 153),
('BANK OF BARODA', '2018-01-31', '2021-11-26', '2458333.18', '1262968.75', '46', '1229166.67', '33802.08', 'pending', '95840600000894', 154),
('BANK OF BARODA', '2018-01-31', '2021-12-28', '1229166.51', '1251701.39', '47', '1229166.67', '22534.72', 'pending', '95840600000894', 155),
('BANK OF BARODA', '2018-01-31', '2022-01-28', '-0.16', '1240434.03', '48', '1229166.67', '11267.36', 'pending', '95840600000894', 156),
('BANK OF BARODA', '2020-06-18', '2021-06-30', '88125000', '2700000', '1', '1875000', '825000', 'paid', '95840600001022', 157),
('BANK OF BARODA', '2020-06-18', '2021-07-30', '86250000', '2682812.5', '2', '1875000', '807812.5', 'pending', '95840600001022', 158),
('BANK OF BARODA', '2020-06-18', '2021-08-30', '84375000', '2665625', '3', '1875000', '790625', 'pending', '95840600001022', 159),
('BANK OF BARODA', '2020-06-18', '2021-09-30', '82500000', '2648437.5', '4', '1875000', '773437.5', 'pending', '95840600001022', 160),
('BANK OF BARODA', '2020-06-18', '2021-10-29', '80625000', '2631250', '5', '1875000', '756250', 'pending', '95840600001022', 161),
('BANK OF BARODA', '2020-06-18', '2021-11-30', '78750000', '2614062.5', '6', '1875000', '739062.5', 'pending', '95840600001022', 162),
('BANK OF BARODA', '2020-06-18', '2021-12-30', '76875000', '2596875', '7', '1875000', '721875', 'pending', '95840600001022', 163),
('BANK OF BARODA', '2020-06-18', '2022-01-28', '75000000', '2579687.5', '8', '1875000', '704687.5', 'pending', '95840600001022', 164),
('BANK OF BARODA', '2020-06-18', '2022-03-02', '73125000', '2562500', '9', '1875000', '687500', 'pending', '95840600001022', 165),
('BANK OF BARODA', '2020-06-18', '2022-04-01', '71250000', '2545312.5', '10', '1875000', '670312.5', 'pending', '95840600001022', 166),
('BANK OF BARODA', '2020-06-18', '2022-05-02', '69375000', '2528125', '11', '1875000', '653125', 'pending', '95840600001022', 167),
('BANK OF BARODA', '2020-06-18', '2022-06-02', '67500000', '2510937.5', '12', '1875000', '635937.5', 'pending', '95840600001022', 168),
('BANK OF BARODA', '2020-06-18', '2022-07-01', '65625000', '2493750', '13', '1875000', '618750', 'pending', '95840600001022', 169),
('BANK OF BARODA', '2020-06-18', '2022-08-02', '63750000', '2476562.5', '14', '1875000', '601562.5', 'pending', '95840600001022', 170),
('BANK OF BARODA', '2020-06-18', '2022-09-02', '61875000', '2459375', '15', '1875000', '584375', 'pending', '95840600001022', 171),
('BANK OF BARODA', '2020-06-18', '2022-09-30', '60000000', '2442187.5', '16', '1875000', '567187.5', 'pending', '95840600001022', 172),
('BANK OF BARODA', '2020-06-18', '2022-11-02', '58125000', '2425000', '17', '1875000', '550000', 'pending', '95840600001022', 173),
('BANK OF BARODA', '2020-06-18', '2022-12-02', '56250000', '2407812.5', '18', '1875000', '532812.5', 'pending', '95840600001022', 174),
('BANK OF BARODA', '2020-06-18', '2023-01-02', '54375000', '2390625', '19', '1875000', '515625', 'pending', '95840600001022', 175),
('BANK OF BARODA', '2020-06-18', '2023-02-02', '52500000', '2373437.5', '20', '1875000', '498437.5', 'pending', '95840600001022', 176),
('BANK OF BARODA', '2020-06-18', '2023-03-02', '50625000', '2356250', '21', '1875000', '481250', 'pending', '95840600001022', 177),
('BANK OF BARODA', '2020-06-18', '2023-03-31', '48750000', '2339062.5', '22', '1875000', '464062.5', 'pending', '95840600001022', 178),
('BANK OF BARODA', '2020-06-18', '2023-05-02', '46875000', '2321875', '23', '1875000', '446875', 'pending', '95840600001022', 179),
('BANK OF BARODA', '2020-06-18', '2023-06-02', '45000000', '2304687.5', '24', '1875000', '429687.5', 'pending', '95840600001022', 180),
('BANK OF BARODA', '2020-06-18', '2023-06-30', '43125000', '2287500', '25', '1875000', '412500', 'pending', '95840600001022', 181),
('BANK OF BARODA', '2020-06-18', '2023-08-02', '41250000', '2270312.5', '26', '1875000', '395312.5', 'pending', '95840600001022', 182),
('BANK OF BARODA', '2020-06-18', '2023-09-01', '39375000', '2253125', '27', '1875000', '378125', 'pending', '95840600001022', 183),
('BANK OF BARODA', '2020-06-18', '2023-10-02', '37500000', '2235937.5', '28', '1875000', '360937.5', 'pending', '95840600001022', 184),
('BANK OF BARODA', '2020-06-18', '2023-11-02', '35625000', '2218750', '29', '1875000', '343750', 'pending', '95840600001022', 185),
('BANK OF BARODA', '2020-06-18', '2023-12-01', '33750000', '2201562.5', '30', '1875000', '326562.5', 'pending', '95840600001022', 186),
('BANK OF BARODA', '2020-06-18', '2024-01-02', '31875000', '2184375', '31', '1875000', '309375', 'pending', '95840600001022', 187),
('BANK OF BARODA', '2020-06-18', '2024-02-02', '30000000', '2167187.5', '32', '1875000', '292187.5', 'pending', '95840600001022', 188),
('BANK OF BARODA', '2020-06-18', '2024-03-01', '28125000', '2150000', '33', '1875000', '275000', 'pending', '95840600001022', 189),
('BANK OF BARODA', '2020-06-18', '2024-04-02', '26250000', '2132812.5', '34', '1875000', '257812.5', 'pending', '95840600001022', 190),
('BANK OF BARODA', '2020-06-18', '2024-05-02', '24375000', '2115625', '35', '1875000', '240625', 'pending', '95840600001022', 191),
('BANK OF BARODA', '2020-06-18', '2024-05-31', '22500000', '2098437.5', '36', '1875000', '223437.5', 'pending', '95840600001022', 192),
('BANK OF BARODA', '2020-06-18', '2024-07-02', '20625000', '2081250', '37', '1875000', '206250', 'pending', '95840600001022', 193),
('BANK OF BARODA', '2020-06-18', '2024-08-02', '18750000', '2064062.5', '38', '1875000', '189062.5', 'pending', '95840600001022', 194),
('BANK OF BARODA', '2020-06-18', '2024-09-02', '16875000', '2046875', '39', '1875000', '171875', 'pending', '95840600001022', 195),
('BANK OF BARODA', '2020-06-18', '2024-10-02', '15000000', '2029687.5', '40', '1875000', '154687.5', 'pending', '95840600001022', 196),
('BANK OF BARODA', '2020-06-18', '2024-11-01', '13125000', '2012500', '41', '1875000', '137500', 'pending', '95840600001022', 197),
('BANK OF BARODA', '2020-06-18', '2024-12-02', '11250000', '1995312.5', '42', '1875000', '120312.5', 'pending', '95840600001022', 198),
('BANK OF BARODA', '2020-06-18', '2025-01-02', '9375000', '1978125', '43', '1875000', '103125', 'pending', '95840600001022', 199),
('BANK OF BARODA', '2020-06-18', '2025-01-31', '7500000', '1960937.5', '44', '1875000', '85937.5', 'pending', '95840600001022', 200),
('BANK OF BARODA', '2020-06-18', '2025-02-28', '5625000', '1943750', '45', '1875000', '68750', 'pending', '95840600001022', 201),
('BANK OF BARODA', '2020-06-18', '2025-04-02', '3750000', '1926562.5', '46', '1875000', '51562.5', 'pending', '95840600001022', 202),
('BANK OF BARODA', '2020-06-18', '2025-05-02', '1875000', '1909375', '47', '1875000', '34375', 'pending', '95840600001022', 203),
('BANK OF BARODA', '2020-06-18', '2025-06-02', '0', '1892187.5', '48', '1875000', '17187.5', 'pending', '95840600001022', 204),
('BANK OF BARODA', '2019-06-20', '2019-07-31', '19387500', '594000', '1', '412500', '181500', 'paid', '958406000009660', 205),
('BANK OF BARODA', '2019-06-20', '2019-08-30', '18975000', '590218.75', '2', '412500', '177718.75', 'paid', '958406000009660', 206),
('BANK OF BARODA', '2019-06-20', '2019-10-01', '18562500', '586437.5', '3', '412500', '173937.5', 'paid', '958406000009660', 207),
('BANK OF BARODA', '2019-06-20', '2019-11-01', '18150000', '582656.25', '4', '412500', '170156.25', 'paid', '958406000009660', 208),
('BANK OF BARODA', '2019-06-20', '2019-11-29', '17737500', '578875', '5', '412500', '166375', 'paid', '958406000009660', 209),
('BANK OF BARODA', '2019-06-20', '2020-01-01', '17325000', '575093.75', '6', '412500', '162593.75', 'paid', '958406000009660', 210),
('BANK OF BARODA', '2019-06-20', '2020-01-31', '16912500', '571312.5', '7', '412500', '158812.5', 'paid', '958406000009660', 211),
('BANK OF BARODA', '2019-06-20', '2020-02-28', '16500000', '567531.25', '8', '412500', '155031.25', 'paid', '958406000009660', 212),
('BANK OF BARODA', '2019-06-20', '2020-04-01', '16087500', '563750', '9', '412500', '151250', 'paid', '958406000009660', 213),
('BANK OF BARODA', '2019-06-20', '2020-05-01', '15675000', '559968.75', '10', '412500', '147468.75', 'paid', '958406000009660', 214),
('BANK OF BARODA', '2019-06-20', '2020-06-01', '15262500', '556187.5', '11', '412500', '143687.5', 'paid', '958406000009660', 215),
('BANK OF BARODA', '2019-06-20', '2020-07-01', '14850000', '552406.25', '12', '412500', '139906.25', 'paid', '958406000009660', 216),
('BANK OF BARODA', '2019-06-20', '2020-07-31', '14437500', '548625', '13', '412500', '136125', 'paid', '958406000009660', 217),
('BANK OF BARODA', '2019-06-20', '2020-09-01', '14025000', '544843.75', '14', '412500', '132343.75', 'paid', '958406000009660', 218),
('BANK OF BARODA', '2019-06-20', '2020-10-01', '13612500', '541062.5', '15', '412500', '128562.5', 'pending', '958406000009660', 219),
('BANK OF BARODA', '2019-06-20', '2020-10-30', '13200000', '537281.25', '16', '412500', '124781.25', 'pending', '958406000009660', 220),
('BANK OF BARODA', '2019-06-20', '2020-12-01', '12787500', '533500', '17', '412500', '121000', 'pending', '958406000009660', 221),
('BANK OF BARODA', '2019-06-20', '2021-01-01', '12375000', '529718.75', '18', '412500', '117218.75', 'pending', '958406000009660', 222),
('BANK OF BARODA', '2019-06-20', '2021-02-01', '11962500', '525937.5', '19', '412500', '113437.5', 'pending', '958406000009660', 223),
('BANK OF BARODA', '2019-06-20', '2021-03-01', '11550000', '522156.25', '20', '412500', '109656.25', 'pending', '958406000009660', 224),
('BANK OF BARODA', '2019-06-20', '2021-04-01', '11137500', '518375', '21', '412500', '105875', 'pending', '958406000009660', 225),
('BANK OF BARODA', '2019-06-20', '2021-04-30', '10725000', '514593.75', '22', '412500', '102093.75', 'pending', '958406000009660', 226),
('BANK OF BARODA', '2019-06-20', '2021-06-01', '10312500', '510812.5', '23', '412500', '98312.5', 'pending', '958406000009660', 227),
('BANK OF BARODA', '2019-06-20', '2021-07-01', '9900000', '507031.25', '24', '412500', '94531.25', 'pending', '958406000009660', 228),
('BANK OF BARODA', '2019-06-20', '2021-07-30', '9487500', '503250', '25', '412500', '90750', 'pending', '958406000009660', 229),
('BANK OF BARODA', '2019-06-20', '2021-09-01', '9075000', '499468.75', '26', '412500', '86968.75', 'pending', '958406000009660', 230),
('BANK OF BARODA', '2019-06-20', '2021-10-01', '8662500', '495687.5', '27', '412500', '83187.5', 'pending', '958406000009660', 231),
('BANK OF BARODA', '2019-06-20', '2021-11-01', '8250000', '491906.25', '28', '412500', '79406.25', 'pending', '958406000009660', 232),
('BANK OF BARODA', '2019-06-20', '2021-12-01', '7837500', '488125', '29', '412500', '75625', 'pending', '958406000009660', 233),
('BANK OF BARODA', '2019-06-20', '2021-12-31', '7425000', '484343.75', '30', '412500', '71843.75', 'pending', '958406000009660', 234),
('BANK OF BARODA', '2019-06-20', '2022-02-01', '7012500', '480562.5', '31', '412500', '68062.5', 'pending', '958406000009660', 235),
('BANK OF BARODA', '2019-06-20', '2022-03-01', '6600000', '476781.25', '32', '412500', '64281.25', 'pending', '958406000009660', 236),
('BANK OF BARODA', '2019-06-20', '2022-04-01', '6187500', '473000', '33', '412500', '60500', 'pending', '958406000009660', 237),
('BANK OF BARODA', '2019-06-20', '2022-04-29', '5775000', '469218.75', '34', '412500', '56718.75', 'pending', '958406000009660', 238),
('BANK OF BARODA', '2019-06-20', '2022-06-01', '5362500', '465437.5', '35', '412500', '52937.5', 'pending', '958406000009660', 239),
('BANK OF BARODA', '2019-06-20', '2022-07-01', '4950000', '461656.25', '36', '412500', '49156.25', 'pending', '958406000009660', 240),
('BANK OF BARODA', '2019-06-20', '2022-08-01', '4537500', '457875', '37', '412500', '45375', 'pending', '958406000009660', 241),
('BANK OF BARODA', '2019-06-20', '2022-09-01', '4125000', '454093.75', '38', '412500', '41593.75', 'pending', '958406000009660', 242),
('BANK OF BARODA', '2019-06-20', '2022-09-30', '3712500', '450312.5', '39', '412500', '37812.5', 'pending', '958406000009660', 243),
('BANK OF BARODA', '2019-06-20', '2022-11-01', '3300000', '446531.25', '40', '412500', '34031.25', 'pending', '958406000009660', 244),
('BANK OF BARODA', '2019-06-20', '2022-12-01', '2887500', '442750', '41', '412500', '30250', 'pending', '958406000009660', 245),
('BANK OF BARODA', '2019-06-20', '2022-12-30', '2475000', '438968.75', '42', '412500', '26468.75', 'pending', '958406000009660', 246),
('BANK OF BARODA', '2019-06-20', '2023-02-01', '2062500', '435187.5', '43', '412500', '22687.5', 'pending', '958406000009660', 247),
('BANK OF BARODA', '2019-06-20', '2023-03-01', '1650000', '431406.25', '44', '412500', '18906.25', 'pending', '958406000009660', 248),
('BANK OF BARODA', '2019-06-20', '2023-03-31', '1237500', '427625', '45', '412500', '15125', 'pending', '958406000009660', 249),
('BANK OF BARODA', '2019-06-20', '2023-05-01', '825000', '423843.75', '46', '412500', '11343.75', 'pending', '958406000009660', 250),
('BANK OF BARODA', '2019-06-20', '2023-06-01', '412500', '420062.5', '47', '412500', '7562.5', 'pending', '958406000009660', 251),
('BANK OF BARODA', '2019-06-20', '2023-06-30', '0', '416281.25', '48', '412500', '3781.25', 'pending', '958406000009660', 252);

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
('0', 'BANK OF BARODA', 'Bank charges', '2021-02-25', '2021-02-25', '0', '720', '-73682499.92', '-73681779.92', '-73682499.92', 'pending'),
('0', 'BANK OF BARODA', 'NONE', '2021-01-31', '2021-01-31', '0', '0', '-71761731.92', '-71761731.92', '-71761731.92', 'pending'),
('0', 'BANK OF BARODA', 'NONE', '2021-02-01', '2021-02-01', '0', '0', '-71761731.92', '-71761731.92', '-71761731.92', 'pending'),
('0', 'BANK OF BARODA', 'NONE', '2021-02-14', '2021-02-14', '0', '0', '-75940748.92', '-75940748.92', '-75940748.92', 'pending'),
('0', 'BANK OF BARODA', 'NONE', '2021-02-17', '2021-02-17', '0', '0', '-72569676.92', '-72569676.92', '-72569676.92', 'pending'),
('0', 'BANK OF BARODA', 'NONE', '2021-02-18', '2021-02-18', '0', '0', '-72569676.92', '-72569676.92', '-72569676.92', 'pending'),
('0', 'BANK OF BARODA', 'NONE', '2021-02-26', '2021-02-26', '0', '0', '-73682499.92', '-73682499.92', '-73682499.92', 'pending'),
('0', 'BANK OF BARODA', 'NONE', '2021-03-01', '2021-03-01', '0', '0', '-74365347.92', '-74365347.92', '-74365347.92', 'pending'),
('001', 'BANK OF BARODA', 'BIDCO AFRICA LIMITED', '2021-02-03', '2021-02-03', '2000000', '0', '-69380055.92', '-71380055.92', '-70119855.92', 'pending'),
('002', 'BANK OF BARODA', 'BIDCO AFRICA LIMITED', '2021-02-09', '2021-02-09', '2700000', '0', '-75901607.92', '-78601607.92', '-72901607.92', 'pending'),
('002', 'BANK OF BARODA', 'Kenafric industries limited', '2021-02-11', '2021-02-11', '3238060', '0', '-70450494.92', '-73688554.92', '-69835614.92', 'pending'),
('005', 'BANK OF BARODA', 'BIDCO AFRICA LIMITED', '2021-02-16', '2021-02-16', '2817536', '0', '-72569676.92', '-75387212.92', '-72569676.92', 'pending'),
('007', 'BANK OF BARODA', 'BIDCO AFRICA LIMITED', '2021-02-22', '2021-02-22', '2396478', '0', '-75764691.92', '-78161169.92', '-75764691.92', 'pending'),
('007', 'BANK OF BARODA', 'Kenafric industries limited', '2021-02-23', '2021-02-23', '2171438', '0', '-73593253.92', '-75764691.92', '-73593253.92', 'pending'),
('007', 'BANK OF BARODA', 'Mabati Rolling Mills limited', '2021-02-19', '2021-02-19', '386400', '0', '-72210776.92', '-72569676.92', '-71919176.92', 'pending'),
('008', 'BANK OF BARODA', 'Bidcoro Africa limited', '2021-02-24', '2021-02-24', '911474', '0', '-72681779.92', '-73593253.92', '-73681779.92', 'pending'),
('02', 'BANK OF BARODA', 'Interest 1.2 to 28.2', '2021-02-28', '2021-03-02', '0', '632848', '-74365347.92', '-73732499.92', '-74365347.92', 'pending'),
('1276', 'BANK OF BARODA', 'Nirav agencies ltd', '2021-02-11', '2021-02-13', '109760', '0', '-70340734.92', '-73688554.92', '-69835614.92', 'pending'),
('13712', 'BANK OF BARODA', 'Tuff steel limited', '2021-02-19', '2021-02-21', '369600', '0', '-71919176.92', '-72569676.92', '-71919176.92', 'pending'),
('1555', 'BANK OF BARODA', 'Western Emporium (1975) Ltd', '2021-02-04', '2021-02-04', '123720', '0', '-70036135.92', '-70119855.92', '-70036135.92', 'pending'),
('1709', 'BANK OF BARODA', 'D &amp;amp; g insurance brokers ltd', '2021-02-03', '2021-02-05', '0', '457500', '-69837555.92', '-71380055.92', '-70119855.92', 'pending'),
('1711', 'BANK OF BARODA', 'D &amp;amp; g insurance brokers ltd', '2021-02-13', '2021-02-15', '0', '452500', '-71318570.92', '-70165428.92', '-75940748.92', 'pending'),
('1962', 'BANK OF BARODA', 'Real auto spares ltd', '2021-02-13', '2021-02-15', '0', '281570', '-74096480.92', '-70165428.92', '-75940748.92', 'pending'),
('1963', 'BANK OF BARODA', 'Real auto spares ltd', '2021-02-20', '2021-02-22', '0', '281570', '-75784959.92', '-71919176.92', '-77657169.92', 'pending'),
('2022', 'BANK OF BARODA', 'Sai universal suppliers ltd', '2021-02-21', '2021-02-23', '0', '200000', '-78161169.92', '-77657169.92', '-78161169.92', 'pending'),
('2043', 'BANK OF BARODA', 'New age associates', '2021-02-20', '2021-02-22', '0', '224000', '-75503389.92', '-71919176.92', '-77657169.92', 'pending'),
('2109', 'BANK OF BARODA', 'Commission-kashyap', '2021-02-21', '2021-02-23', '0', '304000', '-77961169.92', '-77657169.92', '-78161169.92', 'pending'),
('2122', 'BANK OF BARODA', 'Sahin loan', '2021-02-04', '2021-02-06', '0', '40000', '-70159855.92', '-70119855.92', '-70036135.92', 'pending'),
('2127', 'BANK OF BARODA', 'fuel', '2021-02-03', '2021-02-05', '0', '170000', '-70007555.92', '-71380055.92', '-70119855.92', 'pending'),
('2127', 'BANK OF BARODA', 'Sukari service station limited', '2021-02-02', '2021-02-04', '0', '170000', '-71380055.92', '-71761731.92', '-71380055.92', 'pending'),
('2131', 'BANK OF BARODA', 'M.v.repair-Supa haulier', '2021-02-20', '2021-02-22', '0', '250000', '-74247389.92', '-71919176.92', '-77657169.92', 'pending'),
('2134', 'BANK OF BARODA', 'ZM petroleum ltd', '2021-02-20', '2021-02-22', '0', '250000', '-77657169.92', '-71919176.92', '-77657169.92', 'pending'),
('2145', 'BANK OF BARODA', 'Shreeji parts', '2021-02-06', '2021-02-08', '0', '252885', '-75637007.92', '-70236135.92', '-76087007.92', 'pending'),
('2148', 'BANK OF BARODA', 'Pipe manufecturers ltd', '2021-02-13', '2021-02-15', '0', '69740', '-73714910.92', '-70165428.92', '-75940748.92', 'pending'),
('2150', 'BANK OF BARODA', 'transport', '2021-02-05', '2021-02-07', '0', '200000', '-70236135.92', '-70036135.92', '-70236135.92', 'pending'),
('2151', 'BANK OF BARODA', 'transport', '2021-02-06', '2021-02-08', '0', '200000', '-75837007.92', '-70236135.92', '-76087007.92', 'pending'),
('2152', 'BANK OF BARODA', 'transport', '2021-02-13', '2021-02-15', '0', '200000', '-75524490.92', '-70165428.92', '-75940748.92', 'pending'),
('2154', 'BANK OF BARODA', 'pushker', '2021-02-13', '2021-02-15', '0', '50000', '-73764910.92', '-70165428.92', '-75940748.92', 'pending'),
('2155', 'BANK OF BARODA', 'pushker', '2021-02-13', '2021-02-15', '0', '50000', '-73814910.92', '-70165428.92', '-75940748.92', 'pending'),
('2157', 'BANK OF BARODA', 'pushker', '2021-02-03', '2021-02-05', '0', '50000', '-70119855.92', '-71380055.92', '-70119855.92', 'pending'),
('2165', 'BANK OF BARODA', 'C.g.retread (Nrb) ltd', '2021-02-20', '2021-02-22', '0', '172362', '-72161538.92', '-71919176.92', '-77657169.92', 'pending'),
('2167', 'BANK OF BARODA', 'Glad auto parts &amp;amp; Hardware ltd', '2021-02-20', '2021-02-22', '0', '284480', '-72471018.92', '-71919176.92', '-77657169.92', 'pending'),
('2168', 'BANK OF BARODA', 'Alvi trading company limited', '2021-02-13', '2021-02-15', '0', '135822', '-70301250.92', '-70165428.92', '-75940748.92', 'pending'),
('2170', 'BANK OF BARODA', 'Jivans automobiles k ltd', '2021-02-13', '2021-02-15', '0', '250580', '-71604900.92', '-70165428.92', '-75940748.92', 'pending'),
('2172', 'BANK OF BARODA', 'Ferrotech industries limited', '2021-02-15', '2021-02-17', '81536', '0', '-75859212.92', '-75940748.92', '-75387212.92', 'pending'),
('2175', 'BANK OF BARODA', 'Salman Holdings ltd', '2021-02-06', '2021-02-08', '0', '510000', '-75384122.92', '-70236135.92', '-76087007.92', 'pending'),
('2177', 'BANK OF BARODA', 'Trojesee Traders limited', '2021-02-13', '2021-02-15', '0', '130469', '-75654959.92', '-70165428.92', '-75940748.92', 'pending'),
('2182', 'BANK OF BARODA', 'Driver-John matheke', '2021-02-20', '2021-02-22', '0', '25000', '-72186538.92', '-71919176.92', '-77657169.92', 'pending'),
('2192', 'BANK OF BARODA', 'Wise generation ltd', '2021-02-06', '2021-02-08', '0', '250000', '-76087007.92', '-70236135.92', '-76087007.92', 'pending'),
('2193', 'BANK OF BARODA', 'Wise generation ltd', '2021-02-13', '2021-02-15', '0', '250000', '-75940748.92', '-70165428.92', '-75940748.92', 'pending'),
('2197', 'BANK OF BARODA', 'Mafuko Industries ltd', '2021-02-06', '2021-02-08', '0', '910000', '-74790622.92', '-70236135.92', '-76087007.92', 'pending'),
('2198', 'BANK OF BARODA', 'Bidco africa limited', '2021-02-06', '2021-02-08', '0', '96098', '-72832233.92', '-70236135.92', '-76087007.92', 'pending'),
('2199', 'BANK OF BARODA', 'Apex steel limited', '2021-02-13', '2021-02-15', '0', '291820', '-70616070.92', '-70165428.92', '-75940748.92', 'pending'),
('2206', 'BANK OF BARODA', 'Sai automobile ltd', '2021-02-20', '2021-02-22', '0', '285000', '-76069959.92', '-71919176.92', '-77657169.92', 'pending'),
('2209', 'BANK OF BARODA', 'Kingsway tyres limited', '2021-02-20', '2021-02-22', '0', '280742', '-73897389.92', '-71919176.92', '-77657169.92', 'pending'),
('2210', 'BANK OF BARODA', 'Jamachar kenya ltd', '2021-02-06', '2021-02-08', '0', '100000', '-73867322.92', '-70236135.92', '-76087007.92', 'pending'),
('2215', 'BANK OF BARODA', 'Kinga force security company ltd', '2021-02-03', '2021-02-05', '0', '62300', '-70069855.92', '-71380055.92', '-70119855.92', 'pending'),
('2217', 'BANK OF BARODA', 'Nespete enterprises ltd', '2021-02-13', '2021-02-15', '0', '122000', '-72768020.92', '-70165428.92', '-75940748.92', 'pending'),
('2218', 'BANK OF BARODA', 'Nespete enterprises ltd', '2021-02-20', '2021-02-22', '0', '122000', '-75279389.92', '-71919176.92', '-77657169.92', 'pending'),
('2221', 'BANK OF BARODA', 'Techpride Ltd', '2021-02-13', '2021-02-15', '0', '40376', '-75324490.92', '-70165428.92', '-75940748.92', 'pending'),
('2222', 'BANK OF BARODA', 'Bobmak printerS LTD', '2021-02-06', '2021-02-08', '0', '29953', '-72862186.92', '-70236135.92', '-76087007.92', 'pending'),
('2223', 'BANK OF BARODA', 'City radiators ltd', '2021-02-06', '2021-02-08', '0', '10000', '-72872186.92', '-70236135.92', '-76087007.92', 'pending'),
('2224', 'BANK OF BARODA', 'M.v.repair-ochiang', '2021-02-13', '2021-02-15', '0', '75000', '-71679900.92', '-70165428.92', '-75940748.92', 'pending'),
('2228', 'BANK OF BARODA', 'Securex Agencies (k) ltd', '2021-02-20', '2021-02-22', '0', '318000', '-76387959.92', '-71919176.92', '-77657169.92', 'pending'),
('2232', 'BANK OF BARODA', 'Pearl energy EA ltd', '2021-02-13', '2021-02-15', '0', '877150', '-73645170.92', '-70165428.92', '-75940748.92', 'pending'),
('2233', 'BANK OF BARODA', 'Nihar Insurance brokers limited', '2021-02-27', '2021-03-01', '0', '50000', '-73732499.92', '-73682499.92', '-73732499.92', 'pending'),
('2234', 'BANK OF BARODA', 'Hass Petroleum ltd', '2021-02-06', '2021-02-08', '0', '895136', '-73767322.92', '-70236135.92', '-76087007.92', 'pending'),
('2235', 'BANK OF BARODA', 'Royal Oil company limited', '2021-02-13', '2021-02-15', '0', '892874', '-74989354.92', '-70165428.92', '-75940748.92', 'pending'),
('2237', 'BANK OF BARODA', 'Amit- salary', '2021-02-20', '2021-02-22', '0', '70000', '-71989176.92', '-71919176.92', '-77657169.92', 'pending'),
('2238', 'BANK OF BARODA', 'Ndegwa-store', '2021-02-06', '2021-02-08', '0', '15500', '-74806122.92', '-70236135.92', '-76087007.92', 'pending'),
('2241', 'BANK OF BARODA', 'Abdul-salary', '2021-02-10', '2021-02-12', '0', '96400', '-72998007.92', '-72901607.92', '-73688554.92', 'pending'),
('2247', 'BANK OF BARODA', 'Truckmart Africa ltd', '2021-02-13', '2021-02-15', '0', '35789', '-75690748.92', '-70165428.92', '-75940748.92', 'pending'),
('2248', 'BANK OF BARODA', 'D.t.dobie &amp;amp; company ltd', '2021-02-13', '2021-02-15', '0', '35750', '-71354320.92', '-70165428.92', '-75940748.92', 'pending'),
('2251', 'BANK OF BARODA', 'Maisha steel EA LTD', '2021-02-13', '2021-02-15', '0', '106120', '-72646020.92', '-70165428.92', '-75940748.92', 'pending'),
('2252', 'BANK OF BARODA', 'Truckers paradise ltd', '2021-02-20', '2021-02-22', '0', '74210', '-77407169.92', '-71919176.92', '-77657169.92', 'pending'),
('2254', 'BANK OF BARODA', 'Mafuko Industries ltd', '2021-02-20', '2021-02-22', '0', '910000', '-75157389.92', '-71919176.92', '-77657169.92', 'pending'),
('2255', 'BANK OF BARODA', 'Apex Master build (K) ltd', '2021-02-13', '2021-02-15', '0', '23000', '-70324250.92', '-70165428.92', '-75940748.92', 'pending'),
('2256', 'BANK OF BARODA', 'Hass Petroleum ltd', '2021-02-20', '2021-02-22', '0', '900000', '-73371018.92', '-71919176.92', '-77657169.92', 'pending'),
('2257', 'BANK OF BARODA', 'Shreeji petrol and gas station ltd', '2021-02-13', '2021-02-15', '0', '123032', '-75112386.92', '-70165428.92', '-75940748.92', 'pending'),
('2261', 'BANK OF BARODA', 'Hass Petroleum ltd', '2021-02-20', '2021-02-22', '0', '245629', '-73616647.92', '-71919176.92', '-77657169.92', 'pending'),
('2262', 'BANK OF BARODA', 'license-laikipia', '2021-02-06', '2021-02-08', '0', '13300', '-73880622.92', '-70236135.92', '-76087007.92', 'pending'),
('2263', 'BANK OF BARODA', 'Maruti steel ltd', '2021-02-08', '2021-02-10', '0', '990000', '-78601607.92', '-77661607.92', '-78601607.92', 'pending'),
('2264', 'BANK OF BARODA', 'Wentworth ventures limited', '2021-02-07', '2021-02-09', '0', '787300', '-76874307.92', '-76087007.92', '-77661607.92', 'pending'),
('2265', 'BANK OF BARODA', 'Wentworth ventures limited', '2021-02-07', '2021-02-09', '0', '787300', '-77661607.92', '-76087007.92', '-77661607.92', 'pending'),
('2267', 'BANK OF BARODA', 'Sahin-salary', '2021-02-06', '2021-02-08', '0', '68000', '-74874122.92', '-70236135.92', '-76087007.92', 'pending'),
('2268', 'BANK OF BARODA', 'Nilkanth Suppliers ltd', '2021-02-10', '2021-02-12', '0', '990000', '-71708554.92', '-72901607.92', '-73688554.92', 'pending'),
('2269', 'BANK OF BARODA', 'Nilkanth Suppliers ltd', '2021-02-10', '2021-02-12', '0', '990000', '-72698554.92', '-72901607.92', '-73688554.92', 'pending'),
('2270', 'BANK OF BARODA', 'Nilkanth Suppliers ltd', '2021-02-10', '2021-02-12', '0', '990000', '-73688554.92', '-72901607.92', '-73688554.92', 'pending'),
('2271', 'BANK OF BARODA', 'Chemigas ltd', '2021-02-10', '2021-02-12', '0', '7950', '-71442706.92', '-72901607.92', '-73688554.92', 'pending'),
('2277', 'BANK OF BARODA', 'Member fee', '2021-02-10', '2021-02-12', '0', '72400', '-70718554.92', '-72901607.92', '-73688554.92', 'pending'),
('2278', 'BANK OF BARODA', 'Mafuko Industries ltd', '2021-02-13', '2021-02-15', '0', '860000', '-72539900.92', '-70165428.92', '-75940748.92', 'pending'),
('2284', 'BANK OF BARODA', 'License-Nyakamba Martha', '2021-02-12', '2021-02-14', '0', '48000', '-69883614.92', '-69835614.92', '-70165428.92', 'pending'),
('2285', 'BANK OF BARODA', 'system work', '2021-02-12', '2021-02-14', '0', '87000', '-69970614.92', '-69835614.92', '-70165428.92', 'pending'),
('2286', 'BANK OF BARODA', 'vat withholding chg', '2021-02-12', '2021-02-12', '0', '194814', '-70165428.92', '-69835614.92', '-70165428.92', 'pending'),
('2287', 'BANK OF BARODA', 'Shyam auto spares limited', '2021-02-13', '2021-02-15', '0', '171728', '-75284114.92', '-70165428.92', '-75940748.92', 'pending'),
('2288', 'BANK OF BARODA', 'Sukari service station limited', '2021-02-20', '2021-02-22', '0', '945000', '-77332959.92', '-71919176.92', '-77657169.92', 'pending'),
('2289', 'BANK OF BARODA', 'Tosha petroleum ltd', '2021-02-19', '2021-02-21', '0', '78000', '-72288776.92', '-72569676.92', '-71919176.92', 'pending'),
('2301', 'BANK OF BARODA', 'Lalji Ramji filling station ltd', '2021-02-20', '2021-02-22', '0', '100000', '-73997389.92', '-71919176.92', '-77657169.92', 'pending'),
('2311', 'BANK OF BARODA', 'License-mukuni', '2021-02-19', '2021-02-21', '0', '27500', '-72597176.92', '-72569676.92', '-71919176.92', 'pending'),
('2312', 'BANK OF BARODA', 'vat 2016', '2021-02-24', '2021-02-26', '0', '1000000', '-73681779.92', '-73593253.92', '-73681779.92', 'pending'),
('2757', 'BANK OF BARODA', 'KCB Bank limited', '2021-02-09', '2021-02-11', '3000000', '0', '-72901607.92', '-78601607.92', '-72901607.92', 'pending'),
('28925', 'BANK OF BARODA', 'Speedex logistics limited', '2021-02-11', '2021-02-13', '505120', '0', '-69835614.92', '-73688554.92', '-69835614.92', 'pending'),
('3045', 'BANK OF BARODA', 'Yashpoles limited', '2021-02-15', '2021-02-17', '392000', '0', '-75387212.92', '-75940748.92', '-75387212.92', 'pending'),
('311', 'BANK OF BARODA', 'Karn Industries ltd', '2021-02-08', '2021-02-08', '50000', '0', '-77611607.92', '-77661607.92', '-78601607.92', 'pending'),
('32460', 'BANK OF BARODA', 'Apex steel Limited', '2021-02-10', '2021-02-12', '459200', '0', '-72538807.92', '-72901607.92', '-73688554.92', 'pending'),
('32461', 'BANK OF BARODA', 'Apex steel Limited', '2021-02-10', '2021-02-10', '515200', '0', '-72023607.92', '-72901607.92', '-73688554.92', 'pending'),
('32498', 'BANK OF BARODA', 'Apex steel Limited', '2021-02-10', '2021-02-12', '509555', '0', '-71514052.92', '-72901607.92', '-73688554.92', 'pending'),
('532', 'BANK OF BARODA', 'Autoxpress limited', '2021-02-06', '2021-02-08', '0', '2500000', '-72736135.92', '-70236135.92', '-76087007.92', 'pending'),
('533', 'BANK OF BARODA', 'Autoxpress limited', '2021-02-13', '2021-02-15', '0', '250000', '-70866070.92', '-70165428.92', '-75940748.92', 'pending'),
('6637', 'BANK OF BARODA', 'Kenafric Manufecture ltd', '2021-02-10', '2021-02-12', '796552', '0', '-70646154.92', '-72901607.92', '-73688554.92', 'pending'),
('8261', 'BANK OF BARODA', 'Apex steel Limited', '2021-02-10', '2021-02-12', '42336', '0', '-71471716.92', '-72901607.92', '-73688554.92', 'pending'),
('8278', 'BANK OF BARODA', 'Apex steel Limited', '2021-02-10', '2021-02-12', '36960', '0', '-71434756.92', '-72901607.92', '-73688554.92', 'pending'),
('960', 'BANK OF BARODA', 'Raghav industries limited', '2021-02-15', '2021-02-17', '80000', '0', '-75779212.92', '-75940748.92', '-75387212.92', 'pending');

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
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('Abdul-salary', 'BANK OF BARODA', '2241', '96400', '2021-02-10', 'interbank', 'pay', 'pending'),
('Alvi trading company limited', 'BANK OF BARODA', '2168', '135822', '2021-02-13', 'interbank', 'pay', 'pending'),
('Amit- salary', 'BANK OF BARODA', '2237', '70000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Apex Master build (K) ltd', 'BANK OF BARODA', '2255', '23000', '2021-02-13', 'interbank', 'pay', 'pending'),
('Apex steel limited', 'BANK OF BARODA', '2199', '291820', '2021-02-13', 'interbank', 'pay', 'pending'),
('Apex steel Limited', 'BANK OF BARODA', '32460', '459200', '2021-02-10', 'interbank', 'receipt', 'pending'),
('Apex steel Limited', 'BANK OF BARODA', '32461', '515200', '2021-02-10', 'inhouse', 'receipt', 'pending'),
('Apex steel Limited', 'BANK OF BARODA', '32498', '509555', '2021-02-10', 'interbank', 'receipt', 'pending'),
('Apex steel Limited', 'BANK OF BARODA', '8261', '42336', '2021-02-10', 'interbank', 'receipt', 'pending'),
('Apex steel Limited', 'BANK OF BARODA', '8278', '36960', '2021-02-10', 'interbank', 'receipt', 'pending'),
('Autoxpress limited', 'BANK OF BARODA', '532', '2500000', '2021-02-06', 'interbank', 'pay', 'pending'),
('Autoxpress limited', 'BANK OF BARODA', '533', '250000', '2021-02-13', 'interbank', 'pay', 'pending'),
('Bank charges', 'BANK OF BARODA', '0', '720', '2021-02-25', 'inhouse', 'pay', 'pending'),
('Bank charges', 'BANK OF BARODA', '00', '1270', '2021-02-02', 'interbank', 'pay', 'pending'),
('BANK OF BARODA', 'KCB Bank limited', '2757', '3000000', '2021-02-09', 'interbank', 'pay', 'pending'),
('BANK OF BARODA Loan 95840600000848 Payment', 'BANK OF BARODA', '848', '50000000', '2021-02-04', 'inhouse', 'pay', 'pending'),
('BANK OF BARODA Loan 95840600000894 Payment', 'BANK OF BARODA', '894', '59000000', '2021-02-04', 'inhouse', 'pay', 'pending'),
('BANK OF BARODA Loan 958406000009660 Payment', 'BANK OF BARODA', '0003', '19800000', '2021-04-21', 'interbank', 'pay', 'pending'),
('BANK OF BARODA Loan 958406000009660 Payment', 'BANK OF BARODA', '345', '19800000', '2021-04-21', 'inhouse', 'pay', 'pending'),
('BANK OF BARODA Loan 958406000009660 Payment', 'BANK OF BARODA', '567', '19800000', '2021-04-21', 'inhouse', 'pay', 'pending'),
('BANK OF BARODA Loan 95840600001022 Payment', 'BANK OF BARODA', '1022', '90000000', '2020-04-02', 'inhouse', 'pay', 'pending'),
('BIDCO AFRICA LIMITED', 'BANK OF BARODA', '001', '2000000', '2021-02-03', 'inhouse', 'receipt', 'pending'),
('BIDCO AFRICA LIMITED', 'BANK OF BARODA', '002', '2700000', '2021-02-09', 'inhouse', 'receipt', 'pending'),
('BIDCO AFRICA LIMITED', 'BANK OF BARODA', '005', '2817536', '2021-02-16', 'inhouse', 'receipt', 'pending'),
('BIDCO AFRICA LIMITED', 'BANK OF BARODA', '007', '2396478', '2021-02-22', 'inhouse', 'receipt', 'pending'),
('BIDCO AFRICA LIMITED', 'BANK OF BARODA', '2000000245', '551676', '2021-02-02', 'inhouse', 'receipt', 'pending'),
('Bidco africa limited', 'BANK OF BARODA', '2198', '96098', '2021-02-06', 'interbank', 'pay', 'pending'),
('Bidcoro Africa limited', 'BANK OF BARODA', '008', '911474', '2021-02-24', 'inhouse', 'receipt', 'pending'),
('Bobmak printerS LTD', 'BANK OF BARODA', '2222', '29953', '2021-02-06', 'interbank', 'pay', 'pending'),
('C.g.retread (Nrb) ltd', 'BANK OF BARODA', '2165', '172362', '2021-02-20', 'interbank', 'pay', 'pending'),
('Chemigas ltd', 'BANK OF BARODA', '2271', '7950', '2021-02-10', 'interbank', 'pay', 'pending'),
('City radiators ltd', 'BANK OF BARODA', '2223', '10000', '2021-02-06', 'interbank', 'pay', 'pending'),
('Commission-kashyap', 'BANK OF BARODA', '2109', '304000', '2021-02-21', 'interbank', 'pay', 'pending'),
('D &amp;amp; g insurance brokers ltd', 'BANK OF BARODA', '1709', '457500', '2021-02-03', 'interbank', 'pay', 'pending'),
('D &amp;amp; g insurance brokers ltd', 'BANK OF BARODA', '1711', '452500', '2021-02-13', 'interbank', 'pay', 'pending'),
('D.t.dobie &amp;amp; company ltd', 'BANK OF BARODA', '2248', '35750', '2021-02-13', 'interbank', 'pay', 'pending'),
('Driver-John matheke', 'BANK OF BARODA', '2182', '25000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Ferrotech industries limited', 'BANK OF BARODA', '2172', '81536', '2021-02-15', 'interbank', 'receipt', 'pending'),
('fuel', 'BANK OF BARODA', '2127', '170000', '2021-02-03', 'interbank', 'pay', 'pending'),
('Glad auto parts &amp;amp; Hardware ltd', 'BANK OF BARODA', '2167', '284480', '2021-02-20', 'interbank', 'pay', 'pending'),
('Hass Petroleum ltd', 'BANK OF BARODA', '2234', '895136', '2021-02-06', 'interbank', 'pay', 'pending'),
('Hass Petroleum ltd', 'BANK OF BARODA', '2256', '900000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Hass Petroleum ltd', 'BANK OF BARODA', '2261', '245629', '2021-02-20', 'interbank', 'pay', 'pending'),
('Interest 1.2 to 28.2', 'BANK OF BARODA', '02', '632848', '2021-02-28', 'interbank', 'pay', 'pending'),
('Jamachar kenya ltd', 'BANK OF BARODA', '2210', '100000', '2021-02-06', 'interbank', 'pay', 'pending'),
('Jivans automobiles k ltd', 'BANK OF BARODA', '2170', '250580', '2021-02-13', 'interbank', 'pay', 'pending'),
('Karn Industries ltd', 'BANK OF BARODA', '311', '50000', '2021-02-08', 'inhouse', 'receipt', 'pending'),
('KCB Bank limited', 'BANK OF BARODA', '2757', '3000000', '2021-02-09', 'interbank', 'receipt', 'pending'),
('Kenafric industries limited', 'BANK OF BARODA', '002', '3238060', '2021-02-11', 'inhouse', 'receipt', 'pending'),
('Kenafric industries limited', 'BANK OF BARODA', '007', '2171438', '2021-02-23', 'inhouse', 'receipt', 'pending'),
('Kenafric Manufecture ltd', 'BANK OF BARODA', '6637', '796552', '2021-02-10', 'interbank', 'receipt', 'pending'),
('Kinga force security company ltd', 'BANK OF BARODA', '2215', '62300', '2021-02-03', 'interbank', 'pay', 'pending'),
('Kingsway tyres limited', 'BANK OF BARODA', '2209', '280742', '2021-02-20', 'interbank', 'pay', 'pending'),
('Lalji Ramji filling station ltd', 'BANK OF BARODA', '2301', '100000', '2021-02-20', 'interbank', 'pay', 'pending'),
('license-laikipia', 'BANK OF BARODA', '2262', '13300', '2021-02-06', 'interbank', 'pay', 'pending'),
('License-Makuni county', 'BANK OF BARODA', '2242', '13000', '2021-02-02', 'interbank', 'pay', 'pending'),
('License-mukuni', 'BANK OF BARODA', '2311', '27500', '2021-02-19', 'interbank', 'pay', 'pending'),
('License-Nyakamba Martha', 'BANK OF BARODA', '2284', '48000', '2021-02-12', 'interbank', 'pay', 'pending'),
('M.v.repair', 'BANK OF BARODA', '2243', '140000', '2021-02-02', 'interbank', 'pay', 'pending'),
('M.v.repair-ochiang', 'BANK OF BARODA', '2224', '75000', '2021-02-13', 'interbank', 'pay', 'pending'),
('M.v.repair-Supa haulier', 'BANK OF BARODA', '2131', '250000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Mabati Rolling Mills limited', 'BANK OF BARODA', '007', '386400', '2021-02-19', 'inhouse', 'receipt', 'pending'),
('Mafuko Industries ltd', 'BANK OF BARODA', '2197', '910000', '2021-02-06', 'interbank', 'pay', 'pending'),
('Mafuko Industries ltd', 'BANK OF BARODA', '2254', '910000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Mafuko Industries ltd', 'BANK OF BARODA', '2278', '860000', '2021-02-13', 'interbank', 'pay', 'pending'),
('Maisha steel EA LTD', 'BANK OF BARODA', '2251', '106120', '2021-02-13', 'interbank', 'pay', 'pending'),
('Maruti steel ltd', 'BANK OF BARODA', '2263', '990000', '2021-02-08', 'interbank', 'pay', 'pending'),
('Medical -nyadwe', 'BANK OF BARODA', '2212', '83799', '2021-02-02', 'interbank', 'pay', 'pending'),
('Member fee', 'BANK OF BARODA', '2277', '72400', '2021-02-10', 'interbank', 'pay', 'pending'),
('Ndegwa-store', 'BANK OF BARODA', '2238', '15500', '2021-02-06', 'interbank', 'pay', 'pending'),
('Nespete enterprises ltd', 'BANK OF BARODA', '2217', '122000', '2021-02-13', 'interbank', 'pay', 'pending'),
('Nespete enterprises ltd', 'BANK OF BARODA', '2218', '122000', '2021-02-20', 'interbank', 'pay', 'pending'),
('New age associates', 'BANK OF BARODA', '2043', '224000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Nihar Insurance brokers limited', 'BANK OF BARODA', '2233', '50000', '2021-02-27', 'interbank', 'pay', 'pending'),
('Nilkanth Suppliers ltd', 'BANK OF BARODA', '2268', '990000', '2021-02-10', 'interbank', 'pay', 'pending'),
('Nilkanth Suppliers ltd', 'BANK OF BARODA', '2269', '990000', '2021-02-10', 'interbank', 'pay', 'pending'),
('Nilkanth Suppliers ltd', 'BANK OF BARODA', '2270', '990000', '2021-02-10', 'interbank', 'pay', 'pending'),
('Nirav agencies ltd', 'BANK OF BARODA', '1276', '109760', '2021-02-11', 'interbank', 'receipt', 'pending'),
('Pearl energy EA ltd', 'BANK OF BARODA', '2232', '877150', '2021-02-13', 'interbank', 'pay', 'pending'),
('Pipe manufecturers ltd', 'BANK OF BARODA', '2148', '69740', '2021-02-13', 'interbank', 'pay', 'pending'),
('pushker', 'BANK OF BARODA', '2154', '50000', '2021-02-13', 'interbank', 'pay', 'pending'),
('pushker', 'BANK OF BARODA', '2155', '50000', '2021-02-13', 'interbank', 'pay', 'pending'),
('pushker', 'BANK OF BARODA', '2157', '50000', '2021-02-03', 'interbank', 'pay', 'pending'),
('Raghav industries limited', 'BANK OF BARODA', '960', '80000', '2021-02-15', 'interbank', 'receipt', 'pending'),
('Real auto spares ltd', 'BANK OF BARODA', '1962', '281570', '2021-02-13', 'interbank', 'pay', 'pending'),
('Real auto spares ltd', 'BANK OF BARODA', '1963', '281570', '2021-02-20', 'interbank', 'pay', 'pending'),
('Royal Oil company limited', 'BANK OF BARODA', '2235', '892874', '2021-02-13', 'interbank', 'pay', 'pending'),
('Sahin loan', 'BANK OF BARODA', '2122', '40000', '2021-02-04', 'interbank', 'pay', 'pending'),
('Sahin-salary', 'BANK OF BARODA', '2267', '68000', '2021-02-06', 'interbank', 'pay', 'pending'),
('Sai automobile ltd', 'BANK OF BARODA', '2206', '285000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Sai universal suppliers ltd', 'BANK OF BARODA', '2022', '200000', '2021-02-21', 'interbank', 'pay', 'pending'),
('Sainath steel ltd', 'BANK OF BARODA', '2142', '62925', '2021-02-02', 'interbank', 'pay', 'pending'),
('salary-employees', 'BANK OF BARODA', '2245', '369258', '2021-02-02', 'interbank', 'pay', 'pending'),
('Salman Holdings ltd', 'BANK OF BARODA', '2175', '510000', '2021-02-06', 'interbank', 'pay', 'pending'),
('Securex Agencies (k) ltd', 'BANK OF BARODA', '2228', '318000', '2021-02-20', 'interbank', 'pay', 'pending'),
('Shreeji parts', 'BANK OF BARODA', '2145', '252885', '2021-02-06', 'interbank', 'pay', 'pending'),
('Shreeji petrol and gas station ltd', 'BANK OF BARODA', '2257', '123032', '2021-02-13', 'interbank', 'pay', 'pending'),
('Shyam auto spares limited', 'BANK OF BARODA', '2287', '171728', '2021-02-13', 'interbank', 'pay', 'pending'),
('Speedex logistics limited', 'BANK OF BARODA', '28925', '505120', '2021-02-11', 'interbank', 'receipt', 'pending'),
('Sukari service station limited', 'BANK OF BARODA', '2127', '170000', '2021-02-02', 'interbank', 'pay', 'pending'),
('Sukari service station limited', 'BANK OF BARODA', '2288', '945000', '2021-02-20', 'interbank', 'pay', 'pending'),
('system work', 'BANK OF BARODA', '2285', '87000', '2021-02-12', 'interbank', 'pay', 'pending'),
('Techpride Ltd', 'BANK OF BARODA', '2221', '40376', '2021-02-13', 'interbank', 'pay', 'pending'),
('Tosha petroleum ltd', 'BANK OF BARODA', '2289', '78000', '2021-02-19', 'interbank', 'pay', 'pending'),
('transport', 'BANK OF BARODA', '2150', '200000', '2021-02-05', 'interbank', 'pay', 'pending'),
('transport', 'BANK OF BARODA', '2151', '200000', '2021-02-06', 'interbank', 'pay', 'pending'),
('transport', 'BANK OF BARODA', '2152', '200000', '2021-02-13', 'interbank', 'pay', 'pending'),
('Trojesee Traders limited', 'BANK OF BARODA', '2177', '130469', '2021-02-13', 'interbank', 'pay', 'pending'),
('Truckers paradise ltd', 'BANK OF BARODA', '2252', '74210', '2021-02-20', 'interbank', 'pay', 'pending'),
('Truckmart Africa ltd', 'BANK OF BARODA', '2247', '35789', '2021-02-13', 'interbank', 'pay', 'pending'),
('Tuff steel limited', 'BANK OF BARODA', '13712', '369600', '2021-02-19', 'interbank', 'receipt', 'pending'),
('vat 2016', 'BANK OF BARODA', '2312', '1000000', '2021-02-24', 'interbank', 'pay', 'pending'),
('vat withholding chg', 'BANK OF BARODA', '2286', '194814', '2021-02-12', 'inhouse', 'pay', 'pending'),
('Wentworth ventures limited', 'BANK OF BARODA', '2264', '787300', '2021-02-07', 'interbank', 'pay', 'pending'),
('Wentworth ventures limited', 'BANK OF BARODA', '2265', '787300', '2021-02-07', 'interbank', 'pay', 'pending'),
('Western Emporium (1975) Ltd', 'BANK OF BARODA', '1555', '123720', '2021-02-04', 'inhouse', 'receipt', 'pending'),
('Wise generation ltd', 'BANK OF BARODA', '2192', '250000', '2021-02-06', 'interbank', 'pay', 'pending'),
('Wise generation ltd', 'BANK OF BARODA', '2193', '250000', '2021-02-13', 'interbank', 'pay', 'pending'),
('Yashpoles limited', 'BANK OF BARODA', '3045', '392000', '2021-02-15', 'interbank', 'receipt', 'pending'),
('ZM petroleum ltd', 'BANK OF BARODA', '2134', '250000', '2021-02-20', 'interbank', 'pay', 'pending');

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
(1, 'Normal Shift', '10:00', '17:02', '8', '1');

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
  ADD `s_payment` int(11) NOT NULL AFTER `s_bank_branch`,
  ADD `status` varchar(15) NOT NULL DEFAULT 'pending' AFTER `s_payment`,
  ADD `branch` varchar(50) NOT NULL AFTER `status`;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`f_name`, `m_name`, `l_name`, `gender`, `dob`, `passport`, `nat_id`, `pin_no`, `res`, `nssf_no`, `nhif_no`, `off_mail`, `pers_mail`, `country`, `mobile_no`, `phone_no`, `ext_no`, `city`, `county`, `postal_code`, `job_no`, `account_no`, `begin_date`, `employ_date`, `duration`, `end_date`, `job_title`, `department`, `report_to`, `head_of`, `region`, `currency`, `shift`, `employ_type`, `off_days`, `pay_type`, `salary`, `income_tax`, `deduct_nhif`, `deduct_nssf`, `account_name`, `bank_name`, `sort_code`, `s_mobile_no`, `s_bank_branch`, `s_payment`, `status`, `branch`) VALUES
('George', 'Leigh Martinez', 'Fulton', 'Female', '1999-06-14', '/uploads/Screenshot from 2021-04-16 22-29-26.png', '18', '81', 'Resident', '3', '64', '', '', 'select country', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', '', 'all', 'Nairobi', 'KES', 'Regular', '', 'SUNDAY', 'Basic Pay', '', 'none', 'true', 'true', '', '', '', '', '', 0, 'pending', ''),
('Troy', 'Kessie Barnes', 'Roth', 'Female', '1997-06-27', '/uploads/2020-03-24-064540_421x191_scrot.png', '40', '87', 'Resident', '98', '86', 'cynigih@mailinator.com', 'jidyve@mailinator.com', 'Haiti', '15', '10', '79', 'Quia amet dignissim', 'Corporis sequi non o', '19636', '403', '', '1995-08-11', '2006-03-25', 'Consequat Dolore', '1970-03-10', 'Aute sit qui duis e', 'Sapiente ut blanditi', 'all', 'all', 'Nairobi', 'JPY', 'Regular', '2006-03-25', 'MONDAY', 'Net Pay', '4', 'none', 'true', 'false', '', '', '', '', '', 0, 'pending', 'mm2'),
('MacKensie', 'Brock Steele', 'Byers', 'Male', '2007-05-09', '/uploads/Screenshot from 2021-04-18 22-58-53.png', '88', '78', 'Resident', '60', '24', 'qudyberig@mailinator.com', 'wumyr@mailinator.com', 'Djibouti', '71', '53', '41', 'Nostrum similique sa', 'Aut recusandae Expl', '26860', '120', '', '2021-02-01', '2021-01-01', '7', '2021-07-31', 'Accountant', 'Workshop', '', 'all', 'Nairobi', 'JPY', 'Regular', '2021-01-01', 'FRIDAY', 'Consolidated', '9', 'primary', 'false', 'false', '', '', '', '', '', 0, 'pending', ''),
('Raja', 'Charissa Rosa', 'Ayala', 'Female', '1975-01-26', '/uploads/Screenshot from 2021-04-17 17-25-43.png', '93', '27', 'Resident', '53', '15', '', '', 'select country', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', '', 'all', 'Nairobi', 'KES', 'Regular', '', 'SUNDAY', 'Basic Pay', '', 'none', 'true', 'true', '', '', '', '', '', 0, 'pending', '');

-- -- --------------------------------------------------------

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
(1, 'Quos accusantium nes', '+1 (112) 198-4504', '+1 (112) 198-4504', 'Sit qui neque nostr'),
(2, 'Laborum eaque tempor', '+1 (652) 187-9049', '+1 (652) 187-9049', 'Dolor quidem volupta'),
(3, 'Alias magnam nisi a', '+1 (902) 166-9621', '+1 (902) 166-9621', 'Veritatis consequatu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_no` varchar(100) NOT NULL,
  `postal_address` varchar(50) NOT NULL,
  `physical_address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `name`, `email`, `tel_no`, `postal_address`, `physical_address`) VALUES
(1, 'Abyssinia Iron and Steel Ltd', 'info@abyssinia.com', '07', 'P.O', 'Nairobi'),
(2, 'Kinga force security company ltd', 'kingaforce0@gmail.com', '0720102892', '2', 'Ruiru'),
(3, 'D &amp; g insurance brokers ltd', 'accountant@dng.co.ke', '0719670555', '38093-00623', 'Nairobi'),
(4, 'Bidco africa limited', 'daniel.gachanja@bidcoafrica.com', '0713201365', '239-01000', 'Thika'),
(5, 'Sukari service station limited', 'sukariservicestation@gmail.com', '0722418875', '24880-00502', 'Ruiru'),
(6, 'Nyadwe medicare', 'moses.nyadwe@gmail.com', '0722740142', '02', 'Nairobi'),
(7, 'ZM petroleum ltd', 'zmpetroleum@yahoo.com', '0735973070', '03', 'Nairobi'),
(8, 'Kenafrica industries ltd', 'cwaihiga@kenafricind.com', '0730700000', '4', 'Babdogo road'),
(9, 'Mafuko Industries ltd', 'paresh@mafuko.com', '0736867766', '385-60200', 'Meru'),
(10, 'Salman Holdings ltd', 'salmanholdings@gmail.com', '0721598807', '255-006100', 'Nairobi'),
(11, 'Hass Petroleum ltd', 'Yusuf.Salah@HASSPETROLEUM.COM', '0720531351', '5', 'Thika'),
(12, 'Wise generation ltd', 'calebndege@gmail.com', '0733510903', '06', 'Nairo'),
(13, 'Sainath steel ltd', 'finance@rfl96.com', '073100007', '18379-00500', 'Nairobi'),
(14, 'Bobmak printerS LTD', 'bobmakprinters@gmail.com', '0720049281', '6266-01000', 'Thika'),
(15, 'Jamachar kenya ltd', 'dharmendra@kingswaytyres.com', '0733699501', '49644-00100', 'Nairobi'),
(16, 'Shreeji parts', 'shreejiparts@yahoo.com', '0723856229', '32771-00600', 'Nairobi'),
(17, 'Autoxpress limited', 'jigar.prajapati@auxpke.com', '0733752576', '14163-00800', 'Nairobi'),
(18, 'Real auto spares ltd', 'info.realautosparesltd@gmail.com', '0737923411', '11178-00400', 'Nairobi'),
(19, 'Trailmycar solutions ltd', 'patricia.mutua@sbmbank.co.ke', '0724510258', '01', 'Ruiru'),
(20, 'Truckmart Africa ltd', 'robert@leyland.co.ke', '0733 787 600', '49128 â€“ 00100', 'Nairobi'),
(21, 'Pearl energy EA ltd', 'info@pearlsenergy.com', '0727661200', '4190-00200', 'Nairobi'),
(22, 'Nespete enterprises ltd', 'info@nespete.com', '0722712411', '62165-00200', 'Nairobi'),
(24, 'Kingsway tyres limited', 'dharmendra@kingswaytyres.com', '0733699501', '63529-00619', 'Nairobi'),
(25, 'Maruti steel ltd', '', '0722521602', '42440-00100', 'Nairobi'),
(26, 'City radiators ltd', '', '', '', 'Nairobi'),
(27, 'Sainath steel ltd', '', '0731 000007', '', ''),
(28, 'Wentworth ventures limited', 'rakesh.patel@wentworthke.com', '0735692008', '18441-00500', 'Nairobi'),
(29, 'Nilkanth Suppliers ltd', '', '0722228161', '', 'Nairobi'),
(30, 'Chemigas ltd', '', '', '6487-00300', 'Nairobi'),
(31, 'Pipe manufecturers ltd', '', '', '18628-00500', 'Nairobi'),
(32, 'Maisha steel EA LTD', 'Pphpatel975@gmail.com', '0732859285', '891-00232', 'Nairobi'),
(33, 'Shreeji petrol and gas station ltd', '', '0733888544', '', ''),
(34, 'D.t.dobie &amp; company ltd', 'amunywoki@cfao.com', '0711057500', '30160-00200', 'Nairobi'),
(35, 'Apex Master build (K) ltd', 'k.patel@apex-steel.com', '0732668014', '18441-00500', 'Athi river'),
(36, 'Royal Oil company limited', 'info@royaloil.co.ke', '0722321372', '28142-00100', 'Nairobi'),
(37, 'Apex steel limited', 'k.patel@apex-steel.com', '0732668014', '18441-00500', 'Athi river'),
(38, 'Techpride Ltd', '', '', '', 'Nairobi'),
(39, 'Trojesee Traders limited', '', '0720 008118', '74474-00200', 'Nairobi'),
(40, 'Alvi trading company limited', 'collections@alvitrading.com', '0728 603499', '3429-00506', 'Nairobi'),
(41, 'Shyam auto spares limited', '', '0734 507160', '45474-00100', 'Nairobi'),
(42, 'Jivans automobiles k ltd', '', '', '', 'Nairobi'),
(43, 'Tosha petroleum ltd', '', '0794400516', '4348-40200', 'Ruiru'),
(44, 'Nihar Insurance brokers limited', 'info@niharinsurance.com', '0736 176066', '1046-00606', 'Nairobi'),
(45, 'Securex Agencies (k) ltd', 'invoice@securex.co.ke', '0723812263', '48399-00100', 'Nairobi'),
(46, 'Truckers paradise ltd', 'accounts@truckersparadise.co.ke', '0738 780517', '89766-80100', 'Mombasa'),
(47, 'Glad auto parts &amp; Hardware ltd', 'gladautoparts@yahoo.com', '0722787017', '72491-00200', 'Nairobi'),
(48, 'C.g.retread (Nrb) ltd', 'cgretread@gmail.com', '0713 800282', '45551-00100', 'Nairobi'),
(49, 'Sai automobile ltd', 'saiautoltd@yahoo.com', '0734822478', '31984-00600', 'Nairobi'),
(50, 'New age associates', 'newageasso@gmail.com', '0735727581', '38014-00623', 'Nairobi'),
(51, 'Sai universal suppliers ltd', 'accounts@saiuniversal.co.ke', '', '16069-0010', 'Nairobi'),
(52, 'Lalji Ramji filling station ltd', 'shelleasternbypass@lrstations.com', '0724635973', '385-60200', 'Meru'),
(53, 'Linumax Enterprises', '', '', '', ''),
(54, 'Nairobi Gymkhana', '', '', '', ''),
(55, 'Fredrick jaji', 'dgreyhtc@gmail.com', '0737 528000', '', '');

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
('finance@rfl96.com', '$2y$10$eGMZjIjE1dvc/YyUDWT3meEr4gFb4/cQ2By9tXsRsoA.piZxnD3Rm', 'accountant', 'MAIN', 'Sweta', 'Rawal', 'OFF', 'OFF'),
('pro@rfl.com', '$2y$10$6k7MhrmNzez4yVGYfv7puuj3sBd9Ruq.h4F5iSI9o13fx/jojQx.y', 'Procurement officer', 'MM1', 'James', 'Kevin', 'ON', 'OFF'),
('war2@rfl.com', '$2y$10$fZRa.4ynKAjy6utKTzpP0ew09leLuE2ZgyN.kpUt3T2/kAhOJz5Vu', 'Warehouse manager', 'MM1', 'Monica', 'Njeri', 'ON', 'OFF'),
('war@rfl.com', '$2y$10$6cjuL5jaX3lBxr8NpKZ5VunRdrSUoHGU7bEuFHGDZ4Jrzhp/5DS8u', 'Warehouse manager', 'MM2', 'Jael', 'Joel', 'OFF', 'ON');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
  ADD PRIMARY KEY (`bank_name`,`dis_date`,`loan_acc`);

--
-- Indexes for table `tbl_loan_schedule`
--
ALTER TABLE `tbl_loan_schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_muster`
--
ALTER TABLE `tbl_muster`
  ADD PRIMARY KEY (`must_year`,`must_month`,`emp_no`);

--
-- Indexes for table `tbl_nhif`
--
ALTER TABLE `tbl_nhif`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_companyloans`
--
ALTER TABLE `tbl_companyloans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_emp_benefit`
--
ALTER TABLE `tbl_emp_benefit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_emp_leave`
--
ALTER TABLE `tbl_emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_leavecat`
--
ALTER TABLE `tbl_leavecat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_loan_schedule`
--
ALTER TABLE `tbl_loan_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
  MODIFY `shift_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff_items`
--
ALTER TABLE `tbl_staff_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
