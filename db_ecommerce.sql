-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 30, 2024 alle 09:30
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `aggiunta`
--

CREATE TABLE `aggiunta` (
  `ID` int(11) NOT NULL,
  `idCarrello` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `Quantita` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `ID` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`ID`, `idUtente`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(32) NOT NULL,
  `Descrizione` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorizzazione`
--

CREATE TABLE `categorizzazione` (
  `ID` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `Voto` int(2) NOT NULL,
  `Commernto` varchar(32) NOT NULL,
  `Data` date NOT NULL,
  `idUtente` int(11) NOT NULL,
  `idOrdine` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `foto`
--

CREATE TABLE `foto` (
  `ID` int(11) NOT NULL,
  `Descrizione` varchar(32) NOT NULL,
  `Nome` varchar(32) NOT NULL,
  `Path` varchar(32) NOT NULL,
  `idProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `foto`
--

INSERT INTO `foto` (`ID`, `Descrizione`, `Nome`, `Path`, `idProdotto`) VALUES
(1, 'Casse per computer', 'Casse', 'casse.jpg', 1),
(2, 'Cuffie on-ear', 'Cuffie', 'cuffie.jpeg', 2),
(3, 'Monitor per computer', 'Monitor', 'monitor.jpeg', 3),
(4, 'Mouse da gaming', 'Mouse', 'mouse.png', 4),
(5, 'Tastiera da gaming', 'Tastiera', 'tastiera.jpg', 5),
(7, 'Tappetino per mouse', 'Tappetino', 'tappetino.png', 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `ID` int(11) NOT NULL,
  `Stato` varchar(32) NOT NULL,
  `Indirizzo` varchar(32) NOT NULL,
  `DataAggiunta` date NOT NULL,
  `idCarrello` int(11) NOT NULL,
  `idPagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `pagamento`
--

CREATE TABLE `pagamento` (
  `ID` int(11) NOT NULL,
  `NumeroCarta` varchar(32) NOT NULL,
  `Scadenza` date NOT NULL,
  `CVV` int(3) NOT NULL,
  `idUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(32) NOT NULL,
  `Descrizione` varchar(32) NOT NULL,
  `Quantita` int(11) NOT NULL,
  `Prezzo` int(11) NOT NULL,
  `DataAggiunta` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`ID`, `Nome`, `Descrizione`, `Quantita`, `Prezzo`, `DataAggiunta`) VALUES
(1, 'Casse', 'Casse per computer', 50, 70, '2024-04-09'),
(2, 'Cuffie', 'Cuffie on-ear', 50, 100, '2024-04-09'),
(3, 'Monitor', 'Monitor per computer', 50, 300, '2024-04-09'),
(4, 'Mouse', 'Mouse da gaming', 50, 50, '2024-04-09'),
(5, 'Tastiera', 'Tastiera da gaming', 50, 60, '2024-04-09'),
(7, 'Tappetino', 'Tappetino per mouse', 50, 30, '2024-04-28');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `EMail` varchar(32) NOT NULL,
  `Telefono` varchar(32) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `EMail`, `Telefono`, `Admin`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', '123', 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '123', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `aggiunta`
--
ALTER TABLE `aggiunta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK1_aggiuta` (`idCarrello`),
  ADD KEY `FK2_aggiunta` (`idProdotto`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK1_carrello` (`idUtente`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `categorizzazione`
--
ALTER TABLE `categorizzazione`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK1_categ` (`idCategoria`),
  ADD KEY `FK2_categ` (`idProdotto`);

--
-- Indici per le tabelle `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK1_feedback` (`idOrdine`),
  ADD KEY `FK2_feedback` (`idProdotto`),
  ADD KEY `Fk3_feedback` (`idUtente`);

--
-- Indici per le tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK1_foto` (`idProdotto`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK1_ordine` (`idCarrello`),
  ADD KEY `FK2_ordine` (`idPagamento`);

--
-- Indici per le tabelle `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK1_pagamento` (`idUtente`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `aggiunta`
--
ALTER TABLE `aggiunta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `categorizzazione`
--
ALTER TABLE `categorizzazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `foto`
--
ALTER TABLE `foto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `aggiunta`
--
ALTER TABLE `aggiunta`
  ADD CONSTRAINT `FK1_aggiuta` FOREIGN KEY (`idCarrello`) REFERENCES `carrello` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_aggiunta` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `FK1_carrello` FOREIGN KEY (`idUtente`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `categorizzazione`
--
ALTER TABLE `categorizzazione`
  ADD CONSTRAINT `FK1_categ` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_categ` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK1_feedback` FOREIGN KEY (`idOrdine`) REFERENCES `ordine` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_feedback` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk3_feedback` FOREIGN KEY (`idUtente`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK1_foto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `FK1_ordine` FOREIGN KEY (`idCarrello`) REFERENCES `carrello` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_ordine` FOREIGN KEY (`idPagamento`) REFERENCES `pagamento` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `FK1_pagamento` FOREIGN KEY (`idUtente`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
