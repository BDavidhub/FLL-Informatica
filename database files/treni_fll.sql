-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 04, 2022 alle 16:51
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
  `ID-B` char(10) NOT NULL,
  `Size` int(5) UNSIGNED NOT NULL,
  `ID-U` char(10) NOT NULL,
  `ID-W` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `enterprises`
--

CREATE TABLE `enterprises` (
  `ID-U` char(10) NOT NULL,
  `VAT` char(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `AccountingAddressE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `has`
--

CREATE TABLE `has` (
  `ID-T` char(10) NOT NULL,
  `ID-W` char(10) NOT NULL,
  `Entra` int(10) UNSIGNED NOT NULL,
  `Esce` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `hubs`
--

CREATE TABLE `hubs` (
  `ID-H` char(10) NOT NULL,
  `NameH` varchar(50) NOT NULL,
  `CapacityH` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `passes_by`
--

CREATE TABLE `passes_by` (
  `ID-T` char(10) NOT NULL,
  `ID-H` char(10) NOT NULL,
  `PassageNumber` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `privates`
--

CREATE TABLE `privates` (
  `ID-U` char(10) NOT NULL,
  `NameP` varchar(50) NOT NULL,
  `SurnameP` varchar(50) NOT NULL,
  `AccountingAddressP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `trains`
--

CREATE TABLE `trains` (
  `ID-T` char(10) NOT NULL,
  `LimitT` int(5) UNSIGNED NOT NULL,
  `DataTimeDeparture` datetime NOT NULL,
  `SerialNumberT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `ID-U` char(10) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Telephone` char(15) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `usrhubs`
--

CREATE TABLE `usrhubs` (
  `ID-U` char(10) NOT NULL,
  `ID-H` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `wagons`
--

CREATE TABLE `wagons` (
  `ID-W` char(10) NOT NULL,
  `CapacityW` int(5) UNSIGNED NOT NULL,
  `SerialNumberW` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`ID-B`),
  ADD KEY `box_use` (`ID-U`),
  ADD KEY `box_wag` (`ID-W`);

--
-- Indici per le tabelle `enterprises`
--
ALTER TABLE `enterprises`
  ADD PRIMARY KEY (`ID-U`),
  ADD UNIQUE KEY `UNIQUE` (`VAT`,`CompanyName`,`AccountingAddressE`);

--
-- Indici per le tabelle `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`ID-T`,`ID-W`),
  ADD KEY `has_wag` (`ID-W`);

--
-- Indici per le tabelle `hubs`
--
ALTER TABLE `hubs`
  ADD PRIMARY KEY (`ID-H`),
  ADD UNIQUE KEY `UNIQUE` (`NameH`);

--
-- Indici per le tabelle `passes_by`
--
ALTER TABLE `passes_by`
  ADD PRIMARY KEY (`ID-T`,`ID-H`),
  ADD KEY `pas_hub` (`ID-H`);

--
-- Indici per le tabelle `privates`
--
ALTER TABLE `privates`
  ADD PRIMARY KEY (`ID-U`),
  ADD UNIQUE KEY `UNIQUE` (`AccountingAddressP`);

--
-- Indici per le tabelle `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`ID-T`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID-U`),
  ADD UNIQUE KEY `UNIQUE` (`Mail`,`Telephone`);

--
-- Indici per le tabelle `usrhubs`
--
ALTER TABLE `usrhubs`
  ADD PRIMARY KEY (`ID-U`),
  ADD KEY `usr_hub` (`ID-H`);

--
-- Indici per le tabelle `wagons`
--
ALTER TABLE `wagons`
  ADD PRIMARY KEY (`ID-W`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `boxes`
--
ALTER TABLE `boxes`
  ADD CONSTRAINT `box_use` FOREIGN KEY (`ID-U`) REFERENCES `users` (`ID-U`),
  ADD CONSTRAINT `box_wag` FOREIGN KEY (`ID-W`) REFERENCES `wagons` (`ID-W`);

--
-- Limiti per la tabella `enterprises`
--
ALTER TABLE `enterprises`
  ADD CONSTRAINT `ent_use` FOREIGN KEY (`ID-U`) REFERENCES `users` (`ID-U`);

--
-- Limiti per la tabella `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `has_tra` FOREIGN KEY (`ID-T`) REFERENCES `trains` (`ID-T`),
  ADD CONSTRAINT `has_wag` FOREIGN KEY (`ID-W`) REFERENCES `wagons` (`ID-W`);

--
-- Limiti per la tabella `passes_by`
--
ALTER TABLE `passes_by`
  ADD CONSTRAINT `pas_hub` FOREIGN KEY (`ID-H`) REFERENCES `hubs` (`ID-H`),
  ADD CONSTRAINT `pas_tra` FOREIGN KEY (`ID-T`) REFERENCES `trains` (`ID-T`);

--
-- Limiti per la tabella `privates`
--
ALTER TABLE `privates`
  ADD CONSTRAINT `pri_use` FOREIGN KEY (`ID-U`) REFERENCES `users` (`ID-U`);

--
-- Limiti per la tabella `usrhubs`
--
ALTER TABLE `usrhubs`
  ADD CONSTRAINT `usr_hub` FOREIGN KEY (`ID-H`) REFERENCES `hubs` (`ID-H`),
  ADD CONSTRAINT `usr_use` FOREIGN KEY (`ID-U`) REFERENCES `users` (`ID-U`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
