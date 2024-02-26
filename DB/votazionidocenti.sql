-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 26, 2024 alle 20:07
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votazionidocenti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `classi`
--

CREATE TABLE `classi` (
  `ID` int(11) NOT NULL,
  `nome` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `classi`
--

INSERT INTO `classi` (`ID`, `nome`) VALUES
(3, '3b inf'),
(2, '4b inf'),
(1, '5b inf');

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti`
--

CREATE TABLE `docenti` (
  `ID` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `nomeClasse` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `docenti`
--

INSERT INTO `docenti` (`ID`, `nome`, `nomeClasse`) VALUES
(1, 'doc1', '5b inf'),
(2, 'doc2', '5b inf'),
(3, 'doc3', '4b inf'),
(4, 'doc4', '3b inf');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `ID` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `votato` int(11) NOT NULL DEFAULT 0,
  `nomeClasse` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`ID`, `username`, `password`, `admin`, `votato`, `nomeClasse`) VALUES
(1, 'mario', '2bf65275cb7f5dc95febd7d46cd7d0af', 0, 0, '5b inf');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `classi`
--
ALTER TABLE `classi`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indici per le tabelle `docenti`
--
ALTER TABLE `docenti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `classe` (`nomeClasse`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `classe` (`nomeClasse`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `classi`
--
ALTER TABLE `classi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `docenti`
--
ALTER TABLE `docenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `docenti`
--
ALTER TABLE `docenti`
  ADD CONSTRAINT `docenti_ibfk_1` FOREIGN KEY (`nomeClasse`) REFERENCES `classi` (`nome`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`nomeClasse`) REFERENCES `classi` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
