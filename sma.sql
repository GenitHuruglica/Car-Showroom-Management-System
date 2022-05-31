-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 01:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sma`
--

-- --------------------------------------------------------

--
-- Table structure for table `automjetet_sma`
--

CREATE TABLE `automjetet_sma` (
  `Id_SMA` int(11) NOT NULL,
  `Marka_Automjetit_SMA` varchar(100) NOT NULL,
  `Modeli_Automjetit_SMA` varchar(100) NOT NULL,
  `Viti_Prodhimit_SMA` int(11) NOT NULL,
  `Motorri_Automjetit_SMA` varchar(100) NOT NULL,
  `Numri_Uleseve_SMA` int(11) NOT NULL,
  `Ngjyra_Automjetit_SMA` varchar(100) NOT NULL,
  `Qmimi_Automjetit_SMA` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automjetet_sma`
--
ALTER TABLE `automjetet_sma`
  ADD PRIMARY KEY (`Id_SMA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automjetet_sma`
--
ALTER TABLE `automjetet_sma`
  MODIFY `Id_SMA` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
