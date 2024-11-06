-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 11:11 PM
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
-- Database: `rongai-poultry`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_broodery`
--

CREATE TABLE `batch_broodery` (
  `broodery_no` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `sold_date` datetime NOT NULL,
  `initial_qty` int(11) NOT NULL,
  `sold_qty` int(11) NOT NULL,
  `broodery_cost` decimal(2,0) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_broodery`
--

INSERT INTO `batch_broodery` (`broodery_no`, `start_date`, `sold_date`, `initial_qty`, `sold_qty`, `broodery_cost`, `notes`) VALUES
(456, '2024-08-01 00:00:00', '2024-08-30 00:00:00', 280, 250, 99, '30 dead'),
(67890, '2024-08-01 00:00:00', '2024-08-31 00:00:00', 280, 250, 99, '30 dead and sold 100kes each');

-- --------------------------------------------------------

--
-- Table structure for table `batch_hatchery`
--

CREATE TABLE `batch_hatchery` (
  `hatchery_no` int(11) NOT NULL,
  `hatchery_initial_qty` int(11) NOT NULL,
  `hatchery_start_date` datetime NOT NULL,
  `estimated_hatch_date` datetime NOT NULL,
  `hatchery_actual_date` datetime NOT NULL,
  `hatchery_final_qty` int(11) NOT NULL,
  `machine_size` int(11) NOT NULL,
  `machine_no` int(11) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_hatchery`
--

INSERT INTO `batch_hatchery` (`hatchery_no`, `hatchery_initial_qty`, `hatchery_start_date`, `estimated_hatch_date`, `hatchery_actual_date`, `hatchery_final_qty`, `machine_size`, `machine_no`, `notes`) VALUES
(134, 528, '2024-08-01 00:00:00', '2024-08-22 00:00:00', '2024-08-24 00:00:00', 485, 1056, 2, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `sales_qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `sales_date` datetime NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`customer_name`, `customer_phone`, `sales_qty`, `amount`, `sales_date`, `notes`) VALUES
('samuel', '07123456789', 200, 6000.00, '2024-08-10 00:00:00', 'sold');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
