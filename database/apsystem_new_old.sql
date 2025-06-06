-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 07:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apsystem_new`
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
(1, 'admin', 'QWJjMTIzNDU2', 'Ronna', 'C', 'Sanchez', 'abe60f0ac45f6ace69b0f27e2b825258.jpg', '2019-04-30');

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
(88, 5, '2021-04-27', '05:00:00', 1, '03:00:00', 1),
(89, 6, '2021-05-22', '08:00:00', 1, '04:00:00', 4),
(91, 7, '2021-06-09', '07:00:00', 1, '15:00:00', 4),
(93, 9, '2021-06-08', '09:00:00', 1, '17:00:00', 4),
(94, 9, '2021-06-08', '09:00:00', 1, '17:30:00', 1),
(95, 5, '2021-06-09', '08:00:00', 1, '15:00:00', 1),
(97, 10, '2021-10-07', '08:00:00', 0, '16:00:00', 0),
(98, 10, '2021-10-08', '08:00:00', 0, '16:00:00', 0),
(99, 10, '2021-10-11', '08:00:00', 0, '16:00:00', 0),
(100, 10, '2021-10-12', '07:00:00', 0, '15:00:00', 1);

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
  `change_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `middlename`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`, `username`, `password`, `change_pass`) VALUES
(5, 'LBW045387926', 'Nicole', '', 'Raymundo', 'Blk 3A Bagong Silang\nQueens Row Central', '2021-04-01', '09469422766', 'Female', 3, 1, '', '2021-04-27', 'Nicole', 'QWJjMTIzNDU2', 0),
(6, 'HJZ798123046', 'Jhayne Marie', 'L', 'Sanjose', 'Blk 3A Bagong Silang\nQueens Row Central                            ', '2021-03-09', '09469422766', 'Female', 2, 2, '7c2778549264fee1cea5ea789d60e03b.png', '2021-05-18', 'Jhayne', 'QWJjMTIzNDU2', 0),
(7, 'NKJ936570248', 'Annika', 'C', 'Martinez', 'Blk 3A Bagong Silang\nQueens Row Central                            ', '2021-03-09', '09469422766', 'Female', 1, 1, 'fd40d05da210705bd02cf1d183ea8199.png', '2021-06-09', 'Annika', 'QWJjMTIzNDU2', 0),
(9, 'ZWJ681502937', 'Princess', 'C', 'Dacles', 'Blk 3A Bagong Silang\nQueens Row Central                            ', '2021-06-02', '09469422766', 'Female', 4, 3, '4e39d78c4e76568aea5d73c7177a1580.png', '2021-06-09', 'Princess', 'QWJjMTIzNDU2', 0),
(10, '13456789', 'Rodelyn', 'C', 'Dacles', 'Blk 3A Bagong Silang Queen\'s Row Central City of Bacoor, Cavite                                                                                                                                  ', '2000-10-27', '09124180030', 'Female', 1, 1, '2ee2db58af9048eaac3450d36a0ada0e.png', '2021-10-15', 'Rodelyn', 'QWJjMTIzNDU2', 0);

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
  `leave_type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_credits`
--

INSERT INTO `leave_credits` (`leave_id`, `date_leave`, `is_half_day`, `leave_added`, `leave_updated`, `hr_approved`, `employee_id`, `reason`, `leave_type`) VALUES
(1, '2021-10-16', 0, '2021-10-15 00:00:00', '0000-00-00 00:00:00', 1, 10, 'testing', 'annual'),
(2, '2021-10-16', 0, '2021-10-15 00:00:00', '0000-00-00 00:00:00', 1, 10, 'testing', 'annual'),
(3, '2021-10-14', 0, '2021-10-15 00:00:00', '0000-00-00 00:00:00', 2, 10, '                                ', 'annual'),
(4, '2021-10-06', 1, '2021-10-15 00:00:00', '0000-00-00 00:00:00', 1, 10, '                                ewqe', 'annual'),
(5, '2021-10-13', 0, '2021-10-15 00:00:00', '0000-00-00 00:00:00', 0, 10, 'qwewqe', 'sick'),
(6, '2021-10-18', 0, '2021-10-16 00:00:00', '0000-00-00 00:00:00', 1, 5, 'testing', 'annual');

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
(1, 'HR Manager', 10000),
(2, 'Supervisor', 20000),
(3, 'Accounting', 15000),
(4, 'Recruitment Associate', 10000),
(5, 'Process Trainer', 25000);

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
(1, 'New Year\'s Day', '2021-01-01'),
(2, ' Labour Day', '2021-05-01'),
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
(2, '08:00:00', '16:00:00'),
(3, '09:00:00', '17:00:00'),
(4, '10:00:00', '18:00:00');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_credits`
--
ALTER TABLE `leave_credits`
  MODIFY `leave_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regular_holiday`
--
ALTER TABLE `regular_holiday`
  MODIFY `regular_holiday` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
