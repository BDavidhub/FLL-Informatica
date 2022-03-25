-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 23, 2022 at 01:36 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treni_fll`
--

-- --------------------------------------------------------

--
-- Table structure for table `boxes`
--

CREATE TABLE `boxes` (
  `ID_B` int(10) UNSIGNED NOT NULL,
  `Size` int(5) NOT NULL,
  `ID_U` int(10) UNSIGNED NOT NULL,
  `ID_W` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entersprises`
--

CREATE TABLE `entersprises` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `VAT` char(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `AccountingAddressE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `ID_T` int(10) UNSIGNED NOT NULL,
  `ID_W` int(10) UNSIGNED NOT NULL,
  `Entra` int(10) UNSIGNED NOT NULL,
  `Esce` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hubs`
--

CREATE TABLE `hubs` (
  `ID_H` int(10) UNSIGNED NOT NULL,
  `NameH` varchar(50) NOT NULL,
  `CapacityH` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passes_by`
--

CREATE TABLE `passes_by` (
  `ID_T` int(10) UNSIGNED NOT NULL,
  `ID_H` int(10) UNSIGNED NOT NULL,
  `PassageNumber` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `privates`
--

CREATE TABLE `privates` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `NameP` varchar(50) NOT NULL,
  `SurnameP` varchar(50) NOT NULL,
  `AccountingAddressP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privates`
--

INSERT INTO `privates` (`ID_U`, `NameP`, `SurnameP`, `AccountingAddressP`) VALUES
(62, 'Venezia', 've', 'Venezia@FLL.it');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `ID_T` int(10) UNSIGNED NOT NULL,
  `LimitT` int(5) UNSIGNED NOT NULL,
  `DataTimeDeparture` datetime NOT NULL,
  `SerialNumberT` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Telephone` char(15) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_U`, `Mail`, `Telephone`, `Password`) VALUES
(62, 'Venezia@FLL.it', '123456789', 'Venezia');

-- --------------------------------------------------------

--
-- Table structure for table `usrhubs`
--

CREATE TABLE `usrhubs` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `ID_H` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wagons`
--

CREATE TABLE `wagons` (
  `ID_W` int(10) UNSIGNED NOT NULL,
  `CapacityW` int(5) UNSIGNED NOT NULL,
  `SerialNumberW` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`ID_B`),
  ADD KEY `Box_Use` (`ID_U`),
  ADD KEY `Box_Wag` (`ID_W`);

--
-- Indexes for table `entersprises`
--
ALTER TABLE `entersprises`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `UNIQUE` (`CompanyName`,`AccountingAddressE`);

--
-- Indexes for table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`ID_T`,`ID_W`),
  ADD KEY `Has_Wag` (`ID_W`);

--
-- Indexes for table `hubs`
--
ALTER TABLE `hubs`
  ADD PRIMARY KEY (`ID_H`),
  ADD UNIQUE KEY `UNIQUE` (`NameH`);

--
-- Indexes for table `passes_by`
--
ALTER TABLE `passes_by`
  ADD PRIMARY KEY (`ID_T`,`ID_H`),
  ADD KEY `Pas_Hub` (`ID_H`);

--
-- Indexes for table `privates`
--
ALTER TABLE `privates`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `UNIQUE` (`AccountingAddressP`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`ID_T`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `UNIQUE` (`Mail`,`Telephone`);

--
-- Indexes for table `usrhubs`
--
ALTER TABLE `usrhubs`
  ADD PRIMARY KEY (`ID_U`),
  ADD KEY `Usr_Hub` (`ID_H`);

--
-- Indexes for table `wagons`
--
ALTER TABLE `wagons`
  ADD PRIMARY KEY (`ID_W`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boxes`
--
ALTER TABLE `boxes`
  MODIFY `ID_B` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entersprises`
--
ALTER TABLE `entersprises`
  MODIFY `ID_U` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hubs`
--
ALTER TABLE `hubs`
  MODIFY `ID_H` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privates`
--
ALTER TABLE `privates`
  MODIFY `ID_U` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `ID_T` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_U` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `wagons`
--
ALTER TABLE `wagons`
  MODIFY `ID_W` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boxes`
--
ALTER TABLE `boxes`
  ADD CONSTRAINT `Box_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`),
  ADD CONSTRAINT `Box_Wag` FOREIGN KEY (`ID_W`) REFERENCES `wagons` (`ID_W`);

--
-- Constraints for table `entersprises`
--
ALTER TABLE `entersprises`
  ADD CONSTRAINT `Ent_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`);

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `Has_Tra` FOREIGN KEY (`ID_T`) REFERENCES `trains` (`ID_T`),
  ADD CONSTRAINT `Has_Wag` FOREIGN KEY (`ID_W`) REFERENCES `wagons` (`ID_W`);

--
-- Constraints for table `passes_by`
--
ALTER TABLE `passes_by`
  ADD CONSTRAINT `Pas_Hub` FOREIGN KEY (`ID_H`) REFERENCES `hubs` (`ID_H`),
  ADD CONSTRAINT `Pas_Tra` FOREIGN KEY (`ID_T`) REFERENCES `trains` (`ID_T`);

--
-- Constraints for table `privates`
--
ALTER TABLE `privates`
  ADD CONSTRAINT `Pri_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`);

--
-- Constraints for table `usrhubs`
--
ALTER TABLE `usrhubs`
  ADD CONSTRAINT `Usr_Hub` FOREIGN KEY (`ID_H`) REFERENCES `hubs` (`ID_H`),
  ADD CONSTRAINT `Usr_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
