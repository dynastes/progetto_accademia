-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2015 at 12:48 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progetto_accademia`
--

-- --------------------------------------------------------

--
-- Table structure for table `anagrafe`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `anagrafe`
--

INSERT INTO `anagrafe` (`Id`, `Nome`, `Cognome`, `Data_nascita`, `Codice_fiscale`, `Email`, `Indirizzo`, `Residenza`, `Telefono`, `Username`, `Password`) VALUES
(1, 'Salvo', 'Debora', '1992-04-15', 'facnulo', 'fanculo', 'fanculo', 'tette', 555, 'sd', 'ds'),
(2, 'Fabrizio', 'Asta', '1992-09-04', 'cazzocazocazz', 'ciao@hotmail.it', 'via ciolla , 16', '', 923554433, 'banana33', 'banana33');

-- --------------------------------------------------------

--
-- Table structure for table `crediti_cfa`
--

CREATE TABLE IF NOT EXISTS `crediti_cfa` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Valore` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `crediti_cfa`
--

INSERT INTO `crediti_cfa` (`Id`, `Valore`) VALUES
(1, 5),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dipartimenti`
--

CREATE TABLE IF NOT EXISTS `dipartimenti` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_dipartimento` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dipartimenti`
--

INSERT INTO `dipartimenti` (`Id`, `Nome_dipartimento`) VALUES
(1, 'Arti Visive'),
(2, 'Progettazione e Arti Applicate');

-- --------------------------------------------------------

--
-- Table structure for table `docenti`
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
-- Table structure for table `facolta`
--

CREATE TABLE IF NOT EXISTS `facolta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_facolta` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `facolta`
--

INSERT INTO `facolta` (`Id`, `Nome_facolta`) VALUES
(1, 'Pittura'),
(2, 'Scultura');

-- --------------------------------------------------------

--
-- Table structure for table `gestione_dip_fac_mat_cfa`
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
-- Dumping data for table `gestione_dip_fac_mat_cfa`
--

INSERT INTO `gestione_dip_fac_mat_cfa` (`Id`, `Id_dipartimento`, `Id_facolta`, `Id_materia`, `Id_cfa`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `materie`
--

CREATE TABLE IF NOT EXISTS `materie` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_materia` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `materie`
--

INSERT INTO `materie` (`Id`, `Nome_materia`) VALUES
(1, 'Pittura'),
(2, 'Scultura');

-- --------------------------------------------------------

--
-- Table structure for table `materie_studenti`
--

CREATE TABLE IF NOT EXISTS `materie_studenti` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_studente` int(11) NOT NULL,
  `Id_materia` int(11) NOT NULL,
  `Convalida` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `materie_studenti`
--

INSERT INTO `materie_studenti` (`Id`, `Id_studente`, `Id_materia`, `Convalida`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
