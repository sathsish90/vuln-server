-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 09:47 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivaxpayroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `ivax_users`
--

CREATE TABLE `ivax_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `employee_code` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ivax_users`
--

INSERT INTO `ivax_users` (`id`, `firstname`, `lastname`, `role`, `username`, `password`, `employee_code`, `created_date`) VALUES
(1, 'Admin firstname', 'Admin lastname', '', 'admin', '7b902e6ff1db9f560443f2048974fd7d386975b0', 'ADM1', '2018-08-21 10:50:04'),
(2, 'firstname1', 'lastname1', 'user', 'user1', '7b902e6ff1db9f560443f2048974fd7d386975b0', 'EMP01', '2014-04-02 13:26:28'),
(6, 'test', 'test', 'user', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', '2018-08-21 01:53:40'),
(7, 'sdfsd', 'adsfas', 'user', 'adfad', '25318a5755cba4f4147fcb2a535ba1caaebade1a', '123', '2018-08-21 01:54:58'),
(8, 'sdfsdsss', 'adsfasss', 'user', 'adfadss', 'c455582f41f589213a7d34ccb3954c67476077da', '123ssssss', '2018-08-21 01:55:54'),
(9, 'sdfsdsdss', 'adsfadsss', 'user', 'adfadsds', 'c455582f41f589213a7d34ccb3954c67476077da', '123sssddsss', '2018-08-21 01:56:23'),
(11, '', '', 'user', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '2018-08-22 01:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_details`
--

CREATE TABLE `payroll_details` (
  `id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `noofdays` int(11) NOT NULL,
  `daysworked` int(11) NOT NULL,
  `leaves` int(11) NOT NULL,
  `lop` int(11) NOT NULL,
  `basic_g` double(10,2) NOT NULL,
  `personalpay_g` double(10,2) NOT NULL,
  `hra_g` double(10,2) NOT NULL,
  `childedu_g` double(10,2) NOT NULL,
  `conveyance_g` double(10,2) NOT NULL,
  `total_g` double(10,2) NOT NULL,
  `basic_e` double(10,2) NOT NULL,
  `personalpay_e` double(10,2) NOT NULL,
  `hra_e` double(10,2) NOT NULL,
  `childedu_e` double(10,2) NOT NULL,
  `conveyance_e` double(10,2) NOT NULL,
  `other_e` double(10,2) NOT NULL,
  `total_e` double(10,2) NOT NULL,
  `pf` double(10,2) NOT NULL,
  `esi` double(10,2) NOT NULL,
  `ptax` double(10,2) NOT NULL,
  `tds` double(10,2) NOT NULL,
  `advance` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `netpay` double(10,2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_details`
--

INSERT INTO `payroll_details` (`id`, `year`, `month`, `emp_code`, `name`, `designation`, `place`, `noofdays`, `daysworked`, `leaves`, `lop`, `basic_g`, `personalpay_g`, `hra_g`, `childedu_g`, `conveyance_g`, `total_g`, `basic_e`, `personalpay_e`, `hra_e`, `childedu_e`, `conveyance_e`, `other_e`, `total_e`, `pf`, `esi`, `ptax`, `tds`, `advance`, `total`, `netpay`, `created_date`) VALUES
(1, '2013', 'November', 'ADM1', 'admin', 'Administrator', 'Hyderabad', 30, 30, 0, 0, 12000.00, 1200.00, 3000.00, 12.00, 10000.00, 120000.00, 2345.00, 67.00, 12345.00, 8.00, 100.00, 100.00, 13000.00, 120.00, 200.00, 250.00, 879.00, 0.00, 23456.00, 22500.00, '2014-04-02 10:40:23'),
(2, '2013', 'December', 'ADM1', 'admin', 'Administrator', 'Hyderabad', 30, 29, 1, 0, 12000.00, 1200.00, 3000.00, 12.00, 10000.00, 120000.00, 2345.00, 67.00, 12345.00, 8.00, 100.00, 100.00, 13000.00, 120.00, 200.00, 250.00, 879.00, 0.00, 23456.00, 22500.00, '2014-04-02 10:40:23'),
(3, '2014', 'January', 'ADM1', 'admin', 'Administrator', 'Hyderabad', 30, 24, 6, 2, 10000.00, 1200.00, 3000.00, 12.00, 10000.00, 120000.00, 2345.00, 67.00, 12345.00, 8.00, 100.00, 100.00, 13000.00, 120.00, 200.00, 250.00, 879.00, 0.00, 23456.00, 22500.00, '2014-04-02 10:40:23'),
(4, '2014', 'February', 'ADM1', 'admin', 'Administrator', 'Hyderabad', 30, 24, 6, 2, 10000.00, 1200.00, 3000.00, 12.00, 10000.00, 120000.00, 2345.00, 67.00, 12345.00, 8.00, 100.00, 100.00, 13000.00, 120.00, 200.00, 250.00, 879.00, 0.00, 23456.00, 22500.00, '2014-04-02 10:40:23'),
(5, '2014', 'March', 'ADM1', 'admin', 'Administrator', 'Hyderabad', 30, 24, 6, 2, 10000.00, 1200.00, 3000.00, 12.00, 10000.00, 120000.00, 2345.00, 67.00, 12345.00, 8.00, 100.00, 100.00, 13000.00, 120.00, 200.00, 250.00, 879.00, 0.00, 23456.00, 22500.00, '2014-04-02 10:40:23'),
(6, '2014', 'April', 'ADM1', 'admin', 'Administrator', 'Hyderabad', 30, 24, 6, 2, 10000.00, 1200.00, 3000.00, 12.00, 10000.00, 120000.00, 2345.00, 67.00, 12345.00, 8.00, 100.00, 100.00, 13000.00, 120.00, 200.00, 250.00, 879.00, 0.00, 23456.00, 22500.00, '2014-04-02 10:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `question` varchar(100) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `question`, `ans`) VALUES
(1, 'admin', '$2y$10$Z2qgVsqWisQa1iNZeVILA.PljUA9q4P0gxbVEarSW/502FeyygvKu', '2018-08-22 17:25:07', '0', '0'),
(2, 'hack', '$2y$10$fQt8U9wD7Yupm3babmtEQODVfUbnVt1CPyJ738knmMDz5EvIEcpb2', '2018-08-22 17:25:40', '0', '0'),
(3, 'admin1234', '$2y$10$8vaQRszKlSQvPrA4mm9J.eyk5voBNm9x.o/AZjAWbAh8GXZA6xeIm', '2018-08-23 12:13:24', '0', '0'),
(4, 'rakesh', '$2y$10$fnv1lK2.7kfsQcM9NpA/JuRlwhECIquPJ35srE6CjD/wanxD11tji', '2018-08-23 12:31:51', '0', '0'),
(5, 'adminhack', '$2y$10$lXunGS2PHB9tDakMyC9qbuu5b7o/ym/eYjzh2KFNsvWy/9sVRaz6m', '2018-08-23 16:19:03', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ivax_users`
--
ALTER TABLE `ivax_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_details`
--
ALTER TABLE `payroll_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ivax_users`
--
ALTER TABLE `ivax_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payroll_details`
--
ALTER TABLE `payroll_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
