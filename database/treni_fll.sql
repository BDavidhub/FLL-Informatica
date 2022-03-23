-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 16, 2022 alle 14:27
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.0.13

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
-- Struttura della tabella `boxes`
--

CREATE TABLE `boxes` (
  `ID_B` int(10) UNSIGNED NOT NULL,
  `Size` int(5) NOT NULL,
  `ID_U` int(10) UNSIGNED NOT NULL,
  `ID_W` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `entersprises`
--

CREATE TABLE `entersprises` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `VAT` char(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `AccountingAddressE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `has`
--

CREATE TABLE `has` (
  `ID_T` int(10) UNSIGNED NOT NULL,
  `ID_W` int(10) UNSIGNED NOT NULL,
  `Entra` int(10) UNSIGNED NOT NULL,
  `Esce` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `hubs`
--

CREATE TABLE `hubs` (
  `ID_H` int(10) UNSIGNED NOT NULL,
  `NameH` varchar(50) NOT NULL,
  `CapacityH` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `passes_by`
--

CREATE TABLE `passes_by` (
  `ID_T` int(10) UNSIGNED NOT NULL,
  `ID_H` int(10) UNSIGNED NOT NULL,
  `PassageNumber` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `privates`
--

CREATE TABLE `privates` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `NameP` varchar(50) NOT NULL,
  `SurnameP` varchar(50) NOT NULL,
  `AccountingAddressP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `trains`
--

CREATE TABLE `trains` (
  `ID_T` int(10) UNSIGNED NOT NULL,
  `LimitT` int(5) UNSIGNED NOT NULL,
  `DataTimeDeparture` datetime NOT NULL,
  `SerialNumberT` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Telephone` char(15) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `usrhubs`
--

CREATE TABLE `usrhubs` (
  `ID_U` int(10) UNSIGNED NOT NULL,
  `ID_H` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `wagons`
--

CREATE TABLE `wagons` (
  `ID_W` int(10) UNSIGNED NOT NULL,
  `CapacityW` int(5) UNSIGNED NOT NULL,
  `SerialNumberW` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`ID_B`),
  ADD KEY `Box_Use` (`ID_U`),
  ADD KEY `Box_Wag` (`ID_W`);

--
-- Indici per le tabelle `entersprises`
--
ALTER TABLE `entersprises`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `UNIQUE` (`CompanyName`,`AccountingAddressE`);

--
-- Indici per le tabelle `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`ID_T`,`ID_W`),
  ADD KEY `Has_Wag` (`ID_W`);

--
-- Indici per le tabelle `hubs`
--
ALTER TABLE `hubs`
  ADD PRIMARY KEY (`ID_H`),
  ADD UNIQUE KEY `UNIQUE` (`NameH`);

--
-- Indici per le tabelle `passes_by`
--
ALTER TABLE `passes_by`
  ADD PRIMARY KEY (`ID_T`,`ID_H`),
  ADD KEY `Pas_Hub` (`ID_H`);

--
-- Indici per le tabelle `privates`
--
ALTER TABLE `privates`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `UNIQUE` (`AccountingAddressP`);

--
-- Indici per le tabelle `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`ID_T`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_U`),
  ADD UNIQUE KEY `UNIQUE` (`Mail`,`Telephone`);

--
-- Indici per le tabelle `usrhubs`
--
ALTER TABLE `usrhubs`
  ADD PRIMARY KEY (`ID_U`),
  ADD KEY `Usr_Hub` (`ID_H`);

--
-- Indici per le tabelle `wagons`
--
ALTER TABLE `wagons`
  ADD PRIMARY KEY (`ID_W`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `boxes`
--
ALTER TABLE `boxes`
  MODIFY `ID_B` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `entersprises`
--
ALTER TABLE `entersprises`
  MODIFY `ID_U` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `hubs`
--
ALTER TABLE `hubs`
  MODIFY `ID_H` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `privates`
--
ALTER TABLE `privates`
  MODIFY `ID_U` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `trains`
--
ALTER TABLE `trains`
  MODIFY `ID_T` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID_U` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `wagons`
--
ALTER TABLE `wagons`
  MODIFY `ID_W` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `boxes`
--
ALTER TABLE `boxes`
  ADD CONSTRAINT `Box_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`),
  ADD CONSTRAINT `Box_Wag` FOREIGN KEY (`ID_W`) REFERENCES `wagons` (`ID_W`);

--
-- Limiti per la tabella `entersprises`
--
ALTER TABLE `entersprises`
  ADD CONSTRAINT `Ent_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`);

--
-- Limiti per la tabella `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `Has_Tra` FOREIGN KEY (`ID_T`) REFERENCES `trains` (`ID_T`),
  ADD CONSTRAINT `Has_Wag` FOREIGN KEY (`ID_W`) REFERENCES `wagons` (`ID_W`);

--
-- Limiti per la tabella `passes_by`
--
ALTER TABLE `passes_by`
  ADD CONSTRAINT `Pas_Hub` FOREIGN KEY (`ID_H`) REFERENCES `hubs` (`ID_H`),
  ADD CONSTRAINT `Pas_Tra` FOREIGN KEY (`ID_T`) REFERENCES `trains` (`ID_T`);

--
-- Limiti per la tabella `privates`
--
ALTER TABLE `privates`
  ADD CONSTRAINT `Pri_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`);

--
-- Limiti per la tabella `usrhubs`
--
ALTER TABLE `usrhubs`
  ADD CONSTRAINT `Usr_Hub` FOREIGN KEY (`ID_H`) REFERENCES `hubs` (`ID_H`),
  ADD CONSTRAINT `Usr_Use` FOREIGN KEY (`ID_U`) REFERENCES `users` (`ID_U`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
