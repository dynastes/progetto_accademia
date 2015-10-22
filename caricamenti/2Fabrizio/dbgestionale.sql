-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Set 08, 2015 alle 15:48
-- Versione del server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbgestionale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anagrafe`
--

CREATE TABLE IF NOT EXISTS `anagrafe` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(20) NOT NULL,
  `Cognome` varchar(20) NOT NULL,
  `Data_nascita` date NOT NULL,
  `Codice_fiscale` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Indirizzo` varchar(20) NOT NULL,
  `Residenza` varchar(25) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `anagrafe`
--

INSERT INTO `anagrafe` (`Id`, `Nome`, `Cognome`, `Data_nascita`, `Codice_fiscale`, `Email`, `Indirizzo`, `Residenza`, `Telefono`, `Username`, `Password`) VALUES
(1, 'Salvo', 'Debora', '1992-04-15', 'facnulo', 'fanculo', 'fanculo', 'tette', 555, 'sd', 'ds');

-- --------------------------------------------------------

--
-- Struttura della tabella `crediti_cfa`
--

CREATE TABLE IF NOT EXISTS `crediti_cfa` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Valore` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_dipartimento` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_anagrafe` int(11) NOT NULL,
  `Cv` varchar(20) NOT NULL,
  `Insegnamenti` varchar(50) NOT NULL,
  `Orari_lezione` datetime NOT NULL,
  `Orari_ricevimento` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `facolta`
--

CREATE TABLE IF NOT EXISTS `facolta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_facolta` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_dipartimento` int(11) NOT NULL,
  `Id_facolta` int(11) NOT NULL,
  `Id_materia` int(11) NOT NULL,
  `Id_cfa` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_materia` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_studente` int(11) NOT NULL,
  `Id_materia` int(11) NOT NULL,
  `Convalida` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_anagrafe` int(11) NOT NULL,
  `Anno_accademico` varchar(10) NOT NULL,
  `Matricola` int(10) NOT NULL,
  `Diploma` varchar(20) NOT NULL,
  `Id_dipartimento` int(11) NOT NULL,
  `Id_facolta` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`Id`, `Id_anagrafe`, `Anno_accademico`, `Matricola`, `Diploma`, `Id_dipartimento`, `Id_facolta`) VALUES
(1, 1, '2015-2016', 123, 'fanculo', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
