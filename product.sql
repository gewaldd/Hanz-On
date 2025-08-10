-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 06:36 PM
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
(1, 'Silent Hill', 31),
(2, 'Tomb Raider', 24),
(3, 'Resident Evil', 16),
(4, 'donkey-kong-64', 21),
(5, 'Crash Bandicoot', 21),
(6, 'duke-nukem-64', 27),
(7, 'Pepsiman', 31),
(8, 'legend-of-zelda', 13),
(9, 'goldeneye-007', 19),
(10, 'super-mario-64', 11),
(11, 'jetset-radio', 16),
(12, 'power-stone', 13),
(13, 'marvel-vs-capcom-2', 9),
(14, 'sonic-adventure', 11),
(15, 'crazy-taxi', 11),
(16, 'mirrors-edge', 7),
(17, 'forza-horizon', 12),
(18, 'fallout-3', 10),
(19, 'borderlands-2', 8),
(20, 'call-of-duty-black-ops-2', 6);

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
(86, 'Silent Hill', 19, 551.00),
(87, 'Duke Nukem 64', 5, 75.00),
(88, 'Resident Evil', 53, 1537.00),
(89, 'Power Stone', 1, 20.00),
(90, 'Fallout 3', 4, 120.00),
(91, 'Pepsiman', 25, 475.00),
(92, 'Sonic the Hedgehog', 5, 95.00),
(93, 'Crash Bandicoot', 6, 174.00),
(94, 'Tomb Raider', 15, 435.00),
(95, 'Donkey Kong 64', 3, 45.00),
(96, 'Super Mario 64', 2, 30.00),
(97, 'Mirrors Edge', 1, 30.00),
(98, 'Forza Horizon', 4, 120.00),
(99, 'Borderlands 2', 4, 120.00),
(100, 'JetSet Radio', 2, 40.00),
(101, 'Crazy Taxi', 3, 60.00);

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
(16, 56.00, 20, 46.40),
(17, 28.00, 20, 23.20),
(18, 55.68, 20, 46.40),
(19, 27.84, 20, 23.20),
(20, 46.40, 20, 46.40),
(21, 23.20, 20, 23.20),
(22, 29.00, 20, 23.20),
(23, 135.00, 20, 108.00),
(24, 116.00, 20, 92.80),
(25, 35.00, 20, 28.00),
(28, 19.00, 10, 17.10),
(29, 67.00, 10, 60.30),
(30, 106.00, 20, 84.80);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
