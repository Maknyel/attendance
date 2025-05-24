-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2022 at 12:36 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u809164488_apsystem_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` longtext NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', 'QWJjMTIzNDU2', 'Callmax', '', 'Admin', 'abe60f0ac45f6ace69b0f27e2b825258.jpg', '2019-04-30'),
(2, 'Admin2', 'QWJjMTIzNDU2', 'Callmax', '', 'Admin 2', '336f77c699fe40fee09fa6220fadf2b2.jpg', '2022-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(109, 7, '2022-01-03', '07:00:00', 0, '15:00:00', 2),
(110, 7, '2022-01-04', '07:00:00', 0, '15:00:00', 1),
(111, 7, '2022-01-05', '07:00:00', 0, '15:00:00', 2),
(112, 7, '2022-01-06', '07:00:00', 0, '15:00:00', 2),
(113, 7, '2022-01-07', '07:00:00', 0, '15:00:00', 2),
(114, 7, '2022-01-10', '07:00:00', 0, '15:00:00', 2),
(115, 7, '2022-01-11', '07:00:00', 0, '15:00:00', 2),
(116, 7, '2022-01-12', '07:00:00', 0, '15:00:00', 2),
(117, 7, '2022-01-13', '07:00:00', 0, '15:00:00', 1),
(118, 7, '2022-01-14', '07:00:00', 0, '19:00:00', 2),
(120, 10, '2021-12-16', '07:00:00', 0, '15:00:00', 2),
(121, 10, '2021-12-17', '09:00:00', 0, '15:00:00', 2),
(122, 10, '2021-12-20', '07:00:00', 0, '22:00:00', 2),
(125, 10, '2021-12-21', '07:00:00', 0, '15:00:00', 2),
(126, 10, '2021-12-22', '07:00:00', 0, '15:00:00', 2),
(127, 10, '2021-12-24', '07:00:00', 0, '12:00:00', 2),
(128, 10, '2021-12-23', '07:00:00', 0, '15:00:00', 2),
(129, 10, '2021-12-27', '07:00:00', 0, '15:00:00', 2),
(130, 10, '2021-12-28', '07:00:00', 0, '18:00:00', 2),
(131, 10, '2021-12-29', '07:00:00', 0, '15:00:00', 2),
(132, 10, '2021-12-01', '07:00:00', 0, '15:00:00', 1),
(133, 10, '2021-12-02', '09:00:00', 0, '17:00:00', 1),
(134, 10, '2021-12-03', '07:00:00', 0, '20:00:00', 1),
(135, 10, '2021-12-06', '07:00:00', 0, '14:00:00', 1),
(136, 10, '2021-12-07', '07:00:00', 0, '15:00:00', 1),
(137, 10, '2021-12-08', '10:00:00', 0, '16:00:00', 1),
(138, 10, '2021-12-09', '07:00:00', 0, '15:00:00', 1),
(139, 10, '2021-12-10', '07:00:00', 0, '15:00:00', 1),
(140, 10, '2021-12-13', '05:00:00', 0, '15:00:00', 1),
(141, 10, '2021-12-14', '07:00:00', 0, '15:00:00', 1),
(142, 10, '2021-12-15', '07:00:00', 0, '15:00:00', 1),
(144, 13, '2022-01-03', '13:00:00', 0, '21:00:00', 2),
(146, 13, '2022-01-04', '13:00:00', 0, '21:00:00', 2),
(147, 13, '2021-12-20', '13:00:00', 0, '21:00:00', 2),
(148, 13, '2021-12-21', '13:00:00', 0, '21:00:00', 2),
(149, 6, '2021-12-22', '13:00:00', 0, '21:00:00', 2),
(150, 13, '2021-12-23', '13:00:00', 0, '22:00:00', 2),
(151, 6, '2021-12-24', '13:00:00', 0, '22:00:00', 2),
(152, 13, '2021-12-28', '13:00:00', 0, '21:00:00', 2),
(153, 13, '2021-12-27', '13:00:00', 0, '21:00:00', 2),
(154, 7, '2021-12-16', '07:00:00', 0, '15:00:00', 1),
(155, 7, '2021-12-17', '07:00:00', 0, '15:00:00', 1),
(156, 13, '2021-12-22', '13:00:00', 0, '21:00:00', 2),
(157, 7, '2021-12-20', '07:00:00', 0, '15:00:00', 1),
(158, 13, '2021-12-24', '13:00:00', 0, '21:00:00', 2),
(159, 7, '2021-12-21', '07:00:00', 0, '16:00:00', 1),
(160, 13, '2021-12-29', '13:00:00', 0, '23:00:00', 2),
(161, 7, '2021-12-22', '07:15:00', 0, '15:30:00', 1),
(163, 13, '2021-12-30', '13:00:00', 0, '21:00:00', 2),
(164, 11, '2022-01-19', '07:00:00', 0, '15:00:00', 1),
(165, 13, '2021-12-31', '13:00:00', 0, '21:00:00', 2),
(166, 13, '2021-12-16', '13:00:00', 0, '21:00:00', 2),
(167, 13, '2021-12-17', '13:00:00', 0, '21:00:00', 2),
(168, 7, '2021-12-23', '07:02:00', 0, '12:00:00', 1),
(169, 7, '2021-12-24', '07:00:00', 0, '15:00:00', 1),
(170, 7, '2021-12-27', '07:00:00', 0, '16:00:00', 1),
(171, 7, '2021-12-28', '07:00:00', 0, '15:00:00', 1),
(172, 7, '2021-12-29', '06:00:00', 0, '15:00:00', 1),
(173, 7, '2021-12-30', '08:00:00', 0, '16:00:00', 1),
(174, 7, '2021-12-31', '07:00:00', 0, '15:00:00', 1),
(175, 11, '2022-01-20', '07:00:00', 0, '14:00:00', 1),
(177, 7, '2022-01-26', '08:54:24', 0, '00:00:00', 0),
(178, 10, '2022-01-26', '09:11:19', 0, '00:00:00', 0),
(179, 7, '2022-01-27', '06:57:00', 0, '15:46:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `id` int(11) NOT NULL,
  `date_advance` date NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`id`, `date_advance`, `employee_id`, `amount`) VALUES
(4, '2021-05-18', '5', 100);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `description`, `amount`) VALUES
(1, 'SSS', 100),
(2, 'Pagibig', 150),
(3, 'PhilHealth', 150);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` longtext NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  `change_pass` int(11) NOT NULL,
  `login_auth` longtext NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `email` longtext NOT NULL,
  `employee_type` int(11) NOT NULL,
  `sss` longtext NOT NULL,
  `philhealth` longtext NOT NULL,
  `landbank` longtext NOT NULL,
  `tin` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `middlename`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`, `username`, `password`, `change_pass`, `login_auth`, `is_deleted`, `email`, `employee_type`, `sss`, `philhealth`, `landbank`, `tin`) VALUES
(5, 'LBW045387926', 'Nicole', '', 'Raymundo', 'Blk 3A Bagong Silang\nQueens Row Central', '2021-04-01', '09469422766', 'Female', 3, 1, '', '2021-04-27', 'Nicole', 'QWJjMTIzNDU2', 0, '', 1, 'nicoleraymundo@gmail.com', 0, '', '', '', ''),
(6, 'HJZ798123046', 'Jhayne Marie', 'L', 'Sanjose', 'Blk 3A Bagong Silang\nQueens Row Central                            ', '2021-03-09', '09469422766', 'Female', 2, 2, '7c2778549264fee1cea5ea789d60e03b.png', '2021-05-18', 'Jhayne', 'QWJjMTIzNDU2', 0, '', 1, 'jhaynemarie.sanjose@cvsu.edu.ph ', 0, '', '', '', ''),
(7, 'NKJ936570248', 'Annika', 'C', 'Martinez', 'Blk 3A Bagong Silang\nQueens Row Central                            ', '1999-03-09', '09469422766', 'Female', 1, 1, 'fd40d05da210705bd02cf1d183ea8199.png', '2021-06-09', 'Annika', 'QWxpeWFoZGFuYTAz', 0, '', 0, 'annika.martinez@cvsu.edu.ph', 1, '', '', '', ''),
(9, 'ZWJ681502937', 'Princess', 'C', 'Dacles', 'Blk 3A Bagong Silang\nQueens Row Central                            ', '2021-06-02', '09469422766', 'Female', 4, 3, '4e39d78c4e76568aea5d73c7177a1580.png', '2021-06-09', 'Princess', 'QWJjMTIzNDU2', 0, '', 1, 'princessdacles1205@gmail.com', 0, '', '', '', ''),
(10, '13456789', 'Rodelyn', 'C', 'Dacles', 'Blk 3A Bagong Silang Queen\'s Row Central City of Bacoor, Cavite                                                                                                                                  ', '2000-10-27', '09124180030', 'Female', 4, 1, '2ee2db58af9048eaac3450d36a0ada0e.png', '2021-10-15', 'Rodelyn', 'QWJjMTIzNDU2', 0, '', 0, 'rodelyn.dacles@cvsu.edu.ph', 0, '', '', '', ''),
(11, 'sddsfdsfa', 'Mariella', '', 'Leyba', 'assdsgfdg', '2022-01-16', '0988777662', 'Female', 1, 1, '', '2022-01-05', 'Mariella', 'QWJjMTIzNDU2', 0, '', 1, '', 0, '', '', '', ''),
(12, '1234567', 'Dela Cruz', '', 'Annabelle', 'Panapaan 3 Bacoor Cavite ', '1990-12-07', '09512246000', 'Female', 3, 1, '', '2022-01-08', 'Annabelle', 'QWJjMTIzNDU2', 0, '', 1, 'annabelle.delacruz@gmail.com', 0, '', '', '', ''),
(13, '201810629', 'Jhayne Marie', '', 'San Jose ', 'Panapaan 4 Bacoor Cavite', '2000-03-17', '09512246000', 'Female', 4, 5, '', '2022-01-25', 'JhayneMarie', 'QWJjMTIzNDU2', 0, '', 0, 'jmsanjosee@gmail.com', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `id` int(10) NOT NULL,
  `type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`id`, `type`) VALUES
(1, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(10) NOT NULL,
  `leave_type` longtext NOT NULL,
  `leave_name` longtext NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `leave_type`, `leave_name`, `date_added`) VALUES
(1, 'paid', 'Annual Leave', '0000-00-00 00:00:00'),
(2, 'paid', 'Sick Leave', '0000-00-00 00:00:00'),
(3, 'not_paid', 'No Pay Leave', '0000-00-00 00:00:00'),
(4, 'not_paid', 'Public Holiday', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_credits`
--

CREATE TABLE `leave_credits` (
  `leave_id` int(10) NOT NULL,
  `date_leave` date NOT NULL,
  `is_half_day` int(11) NOT NULL,
  `leave_added` datetime NOT NULL,
  `leave_updated` datetime NOT NULL,
  `hr_approved` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `reason` longtext NOT NULL,
  `leave_type` longtext NOT NULL,
  `decline_reason` longtext NOT NULL,
  `file_uploaded` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_credits`
--

INSERT INTO `leave_credits` (`leave_id`, `date_leave`, `is_half_day`, `leave_added`, `leave_updated`, `hr_approved`, `employee_id`, `reason`, `leave_type`, `decline_reason`, `file_uploaded`) VALUES
(8, '2021-12-08', 0, '2022-01-05 00:00:00', '0000-00-00 00:00:00', 0, 11, '                                jufhkfkfk', '3', '', ''),
(13, '2022-01-24', 0, '2022-01-24 00:00:00', '0000-00-00 00:00:00', 1, 10, 'High Fever', '2', '', '85e5cefbcf5f8111ffab66f49fdadbbe.png'),
(14, '2022-01-26', 0, '2022-01-25 00:00:00', '0000-00-00 00:00:00', 2, 7, 'flu', '2', 'reason', '');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `employee_id`, `hours`, `rate`, `date_overtime`) VALUES
(4, '5', 112, 100, '2021-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `PID` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact_info` varchar(15) NOT NULL,
  `workdays` int(11) NOT NULL,
  `absents` int(11) NOT NULL,
  `paydate` date NOT NULL,
  `bprate` float NOT NULL,
  `bpcutoff` float NOT NULL,
  `bpincome` float NOT NULL,
  `honrate` float NOT NULL,
  `honcutoff` float NOT NULL,
  `honincome` float NOT NULL,
  `otherrate` float NOT NULL,
  `othercutoff` float NOT NULL,
  `otherincome` float NOT NULL,
  `sss` float NOT NULL,
  `philhealth` float NOT NULL,
  `pagibig` float NOT NULL,
  `tax` float NOT NULL,
  `sssloan` float NOT NULL,
  `pagibigloan` float NOT NULL,
  `fsdeposit` float NOT NULL,
  `fsloan` float NOT NULL,
  `salaryloan` float NOT NULL,
  `otherloan` float NOT NULL,
  `grossincome` float NOT NULL,
  `netincome` float NOT NULL,
  `totaldeduction` float NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`PID`, `employee_id`, `firstname`, `lastname`, `gender`, `address`, `contact_info`, `workdays`, `absents`, `paydate`, `bprate`, `bpcutoff`, `bpincome`, `honrate`, `honcutoff`, `honincome`, `otherrate`, `othercutoff`, `otherincome`, `sss`, `philhealth`, `pagibig`, `tax`, `sssloan`, `pagibigloan`, `fsdeposit`, `fsloan`, `salaryloan`, `otherloan`, `grossincome`, `netincome`, `totaldeduction`, `photo`) VALUES
(4, 'LBW045387926', 'Rodelyn', 'Dacles', 'Female', 'Blk 3A Bagong SilangQueens Row Central', '09469422766', 1, 26, '2021-06-09', 1500, 8, 13500, 700, 7, 4900, 900, 8, 7200, 1125, 896, 100, 2560, 10, 10, 10, 10, 10, 10, 25600, 20859, 4741, '25374.jpg'),
(15, 'HJZ798123046', 'Keiko', 'Eijichi', 'Female', 'Blk 3A Bagong SilangQueens Row Central', '09469422766', 2, 25, '2021-06-07', 150, 16, 2400, 300, 5, 1500, 900, 8, 7200, 495, 388.5, 100, 1110, 0, 0, 0, 0, 0, 0, 11100, 9006.5, 2093.5, 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'HR Manager', 30000),
(2, 'Supervisor', 20000),
(4, 'Recruitment Associate', 10000),
(6, 'CSR', 14000),
(7, 'IT Specialist ', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `regular_holiday`
--

CREATE TABLE `regular_holiday` (
  `regular_holiday` int(10) NOT NULL,
  `name` longtext NOT NULL,
  `holiday_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regular_holiday`
--

INSERT INTO `regular_holiday` (`regular_holiday`, `name`, `holiday_date`) VALUES
(2, 'Example Holiday', '2021-12-30'),
(3, ' Philippines Independence Day', '2021-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '15:00:00'),
(4, '10:00:00', '18:00:00'),
(5, '13:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `name` longtext NOT NULL,
  `variable` longtext NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `variable`, `value`) VALUES
(1, 'About Us', 'about_us', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `leave_credits`
--
ALTER TABLE `leave_credits`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regular_holiday`
--
ALTER TABLE `regular_holiday`
  ADD PRIMARY KEY (`regular_holiday`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_credits`
--
ALTER TABLE `leave_credits`
  MODIFY `leave_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `regular_holiday`
--
ALTER TABLE `regular_holiday`
  MODIFY `regular_holiday` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
