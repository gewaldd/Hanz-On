-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2025 at 05:23 AM
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
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Stock`) VALUES
(1, 'Silent Hill', 2),
(2, 'Tomb Raider', 12),
(3, 'Resident Evil', 8),
(4, 'Crash Bandicoot', 20),
(5, 'Pepsiman', 27),
(6, 'Legend of Zelda', 6),
(7, 'GoldenEye 007', 14),
(8, 'Duke Nukem 64', 5),
(9, 'Super Mario 64', 12),
(10, 'Donkey Kong 64', 10),
(11, 'Sonic Adventure', 13),
(12, 'Marvel vs Capcom 2', 8),
(13, 'Power Stone', 11),
(14, 'JetSet Radio', 11),
(15, 'Crazy Taxi', 18),
(16, 'Call of Duty Black Ops 2', 17),
(17, 'Borderlands 2', 4),
(18, 'Fallout 3', 7),
(19, 'Forza Horizon', 6),
(20, 'Mirrors Edge', 7),
(45, 'GLOCK 18', 4),
(46, 'CZ P-10C C02', 1),
(47, 'KJW CZ TS2', 1),
(48, 'WG 701 BLK', 1),
(49, 'KJW KP-06 HICAPA', 1),
(50, 'D BELL VSR 10 WOOD DESIGN', 2),
(51, 'DBELL VSR10 BLACK', 1),
(52, 'MOD 24 SSG GSPEC', 1),
(53, 'LT-28AB LANCER TACTICAL M24', 2),
(54, 'EC 501C L96 BLACK', 2),
(55, 'Heckler & Koch - HK416', 3),
(56, 'Tokyo Marui VSR-10', 1),
(57, 'AK74 SERIES', 1),
(58, 'M4A1 SERIES', 1),
(59, 'FN SCAR', 2),
(60, 'CZ P-10C C02 BLK', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `ID` int(10) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`ID`, `Name`, `Quantity`, `Price`) VALUES
(2, 'Pepsiman', 1, 19.00),
(6, 'Resident Evil', 1, 29.00),
(7, 'Silent Hill', 7, 29.00),
(9, 'KJW CZ TS2', 3, 29.00),
(10, 'KJW KP-06 HICAPA', 1, 19.00),
(11, 'Heckler & Koch - HK416', 2, 19.00),
(12, 'Tokyo Marui VSR-10', 2, 20.00),
(13, 'CZ P-10C C02 BLK', 3, 29.00),
(15, 'MOD 24 SSG GSPEC', 1, 15.00),
(16, 'GLOCK 18', 8, 29.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(10) NOT NULL,
  `Total` decimal(11,2) NOT NULL,
  `Discount` int(10) NOT NULL,
  `Discounted` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `Total`, `Discount`, `Discounted`) VALUES
(1, 87.00, 20, 69.60),
(2, 29.00, 10, 26.10),
(3, 145.00, 0, 145.00),
(4, 58.00, 10, 52.20);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `data_name` varchar(100) DEFAULT NULL,
  `data_color` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `coupon_applied` varchar(50) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `data_name`, `data_color`, `quantity`, `coupon_applied`, `total_price`, `created_at`) VALUES
(15, 'RetroGlow Tee', 'Mirage', 1, '', 163.00, '2025-05-16 02:05:37'),
(16, 'ExecutiveEdge Trousers', 'Woodsmoke', 1, '', 142.00, '2025-05-16 02:24:17'),
(17, 'RetroGlow Tee', 'Mirage', 1, '', 163.00, '2025-08-07 09:47:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
