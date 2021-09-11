-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 08:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `po_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_po`
--

CREATE TABLE `create_po` (
  `PO` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `d_date` date NOT NULL,
  `destination` varchar(100) NOT NULL,
  `price_term` varchar(100) NOT NULL,
  `pay_term` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_po`
--

INSERT INTO `create_po` (`PO`, `o_date`, `d_date`, `destination`, `price_term`, `pay_term`, `supplier`, `category`) VALUES
(0, '2021-08-25', '2021-08-20', 'ICD bangalore ', 'Factor ', '30 DAYS ', 'XYZ', 'def '),
(1, '2021-08-18', '2021-08-20', 'ICD bangalore ', 'C$F', '30 DAYS ', 'ACC ', 'abc '),
(3, '2021-08-04', '2021-08-04', 'ICD bangalore ', 'Factor ', 'COD ', 'ACC ', 'def '),
(4, '2021-08-11', '2021-08-18', 'ICD bangalore ', 'Factor ', 'COD ', 'ACC ', 'abc '),
(5, '2021-08-16', '2021-08-16', 'ICD bangalore ', 'C$F', '30 DAYS ', 'ACC ', 'abc ');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin@gmail.com', '12345', 'admin'),
(2, 'manager@gmail.com', '1234', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `CODE` int(11) NOT NULL,
  `DESCRIPTION` int(11) NOT NULL,
  `W(MM)` int(11) NOT NULL,
  `D(MM)` int(11) NOT NULL,
  `T(MM)` int(11) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `FINISH` varchar(100) NOT NULL,
  `QTY` int(100) NOT NULL,
  `COLOUR` varchar(100) NOT NULL,
  `SQM` float NOT NULL,
  `KGS` float NOT NULL,
  `RATE` int(11) NOT NULL,
  `INR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`CODE`, `DESCRIPTION`, `W(MM)`, `D(MM)`, `T(MM)`, `TYPE`, `FINISH`, `QTY`, `COLOUR`, `SQM`, `KGS`, `RATE`, `INR`) VALUES
(1, 34, 730, 150, 16, 'abc', 'xyz', 0, 'black', 0, 0, 1750, 0),
(2, 56, 830, 45, 65, 'def', 'sf', 2, 'black', 98, 78, 67, 0),
(3, 34, 730, 150, 16, 'ghi', 'sj', 10, 'green', 0.11, 14, 12, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_po`
--
ALTER TABLE `create_po`
  ADD PRIMARY KEY (`PO`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`CODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
