-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Set 15, 2015 alle 12:07
-- Versione del server: 5.6.26
-- Versione PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database gestionale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anagrafe`
--

CREATE TABLE IF NOT EXISTS `anagrafe` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Data_nascita` date NOT NULL,
  `Codice_fiscale` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Indirizzo` varchar(20) NOT NULL,
  `Residenza` varchar(25) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `anagrafe`
--

INSERT INTO `anagrafe` (`Id`, `Nome`, `Cognome`, `Data_nascita`, `Codice_fiscale`, `Email`, `Indirizzo`, `Residenza`, `Telefono`, `Username`, `Password`) VALUES
(1, 'Salvo', 'Debora', '1992-04-15', 'facnulo', 'fanculo', 'fanculo', 'tette', 555, 'sd', 'ds'),
(2, 'Fabrizio', 'Asta', '1992-09-04', 'cazzocazocazz', 'ciao@hotmail.it', 'via ciolla , 16', '', 923554433, 'banana33', 'banana33');

-- --------------------------------------------------------

--
-- Struttura della tabella `crediti_cfa`
--

CREATE TABLE IF NOT EXISTS `crediti_cfa` (
  `Id` int(11) NOT NULL,
  `Valore` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `crediti_cfa`
--

INSERT INTO `crediti_cfa` (`Id`, `Valore`) VALUES
(1, 5),
(2, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `dipartimenti`
--

CREATE TABLE IF NOT EXISTS `dipartimenti` (
  `Id` int(11) NOT NULL,
  `Nome_dipartimento` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `dipartimenti`
--

INSERT INTO `dipartimenti` (`Id`, `Nome_dipartimento`) VALUES
(1, 'Arti Visive'),
(2, 'Progettazione e Arti Applicate');

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti`
--

CREATE TABLE IF NOT EXISTS `docenti` (
  `Id` int(11) NOT NULL,
  `Id_anagrafe` int(11) NOT NULL,
  `Cv` varchar(20) NOT NULL,
  `Insegnamenti` varchar(50) NOT NULL,
  `Orari_lezione` datetime NOT NULL,
  `Orari_ricevimento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `facolta`
--

CREATE TABLE IF NOT EXISTS `facolta` (
  `Id` int(11) NOT NULL,
  `Nome_facolta` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `facolta`
--

INSERT INTO `facolta` (`Id`, `Nome_facolta`) VALUES
(1, 'Pittura'),
(2, 'Scultura');

-- --------------------------------------------------------

--
-- Struttura della tabella `gestione_dip_fac_mat_cfa`
--

CREATE TABLE IF NOT EXISTS `gestione_dip_fac_mat_cfa` (
  `Id` int(11) NOT NULL,
  `Id_dipartimento` int(11) NOT NULL,
  `Id_facolta` int(11) NOT NULL,
  `Id_materia` int(11) NOT NULL,
  `Id_cfa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `gestione_dip_fac_mat_cfa`
--

INSERT INTO `gestione_dip_fac_mat_cfa` (`Id`, `Id_dipartimento`, `Id_facolta`, `Id_materia`, `Id_cfa`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE IF NOT EXISTS `materie` (
  `Id` int(11) NOT NULL,
  `Nome_materia` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`Id`, `Nome_materia`) VALUES
(1, 'Pittura'),
(2, 'Scultura');

-- --------------------------------------------------------

--
-- Struttura della tabella `materie_studenti`
--

CREATE TABLE IF NOT EXISTS `materie_studenti` (
  `Id` int(11) NOT NULL,
  `Id_studente` int(11) NOT NULL,
  `Id_materia` int(11) NOT NULL,
  `Convalida` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `materie_studenti`
--

INSERT INTO `materie_studenti` (`Id`, `Id_studente`, `Id_materia`, `Convalida`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE IF NOT EXISTS `studenti` (
  `Id` int(11) NOT NULL,
  `Id_anagrafe` int(11) NOT NULL,
  `Anno_accademico` varchar(10) NOT NULL,
  `Matricola` int(10) NOT NULL,
  `Diploma` varchar(20) NOT NULL,
  `Id_dipartimento` int(11) NOT NULL,
  `Id_facolta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `anagrafe`
--
ALTER TABLE `anagrafe`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `crediti_cfa`
--
ALTER TABLE `crediti_cfa`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `dipartimenti`
--
ALTER TABLE `dipartimenti`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `docenti`
--
ALTER TABLE `docenti`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `facolta`
--
ALTER TABLE `facolta`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `gestione_dip_fac_mat_cfa`
--
ALTER TABLE `gestione_dip_fac_mat_cfa`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `materie_studenti`
--
ALTER TABLE `materie_studenti`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `anagrafe`
--
ALTER TABLE `anagrafe`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `crediti_cfa`
--
ALTER TABLE `crediti_cfa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `dipartimenti`
--
ALTER TABLE `dipartimenti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `docenti`
--
ALTER TABLE `docenti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `facolta`
--
ALTER TABLE `facolta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `gestione_dip_fac_mat_cfa`
--
ALTER TABLE `gestione_dip_fac_mat_cfa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `materie_studenti`
--
ALTER TABLE `materie_studenti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
