-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2026 at 02:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gso_bfamed`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `acc_first_name` varchar(100) NOT NULL,
  `acc_middle_name` varchar(100) NOT NULL,
  `acc_last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `acc_first_name`, `acc_middle_name`, `acc_last_name`, `username`, `password`, `role`, `is_active`, `created_at`) VALUES
(1, '', '', '', 'admin', '$2a$12$97.zQ4qmFMAeXOipDIT.a..rakcY05nLvjdWojBOzLaaZqceARoVC', 'sys_admin', 1, '2025-08-05 14:59:37'),
(2, 'userFname', 'userMname', 'userLname', 'jm', '$2a$12$97.zQ4qmFMAeXOipDIT.a..rakcY05nLvjdWojBOzLaaZqceARoVC', 'user', 1, '2025-08-05 14:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `bfamed_tracking`
--

CREATE TABLE `bfamed_tracking` (
  `bfa_id` int(11) NOT NULL,
  `bfa_arp_pin` varchar(100) NOT NULL,
  `bfa_pin` varchar(100) NOT NULL,
  `bfa_taxdec` varchar(100) NOT NULL,
  `bfa_owner` varchar(100) NOT NULL,
  `bfa_beneficiary` varchar(100) NOT NULL,
  `bfa_kind` varchar(100) NOT NULL,
  `bfa_class` varchar(100) NOT NULL,
  `bfa_location` text NOT NULL,
  `bfa_brgy` int(11) NOT NULL,
  `bfa_district` varchar(100) NOT NULL,
  `bfa_lot_block` varchar(100) NOT NULL,
  `bfa_title_no` varchar(100) NOT NULL,
  `bfa_title_date` varchar(100) NOT NULL,
  `bfa_buiding_type` varchar(100) NOT NULL,
  `bfa_building_comp` varchar(100) NOT NULL,
  `bfa_building_occu` varchar(100) NOT NULL,
  `bfa_building_age` int(100) NOT NULL,
  `bfa_area_sqm` varchar(100) NOT NULL,
  `bfa_market_value` varchar(100) NOT NULL,
  `bfa_assessed_value` varchar(100) NOT NULL,
  `bfa_portfolio` varchar(100) NOT NULL,
  `bfa_account_type` varchar(100) NOT NULL,
  `bfa_tax_status` varchar(100) NOT NULL,
  `bfa_date_expire` date NOT NULL,
  `bfa_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bfamed_tracking`
--
ALTER TABLE `bfamed_tracking`
  ADD PRIMARY KEY (`bfa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bfamed_tracking`
--
ALTER TABLE `bfamed_tracking`
  MODIFY `bfa_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
