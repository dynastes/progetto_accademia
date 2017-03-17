-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Mar 17, 2017 alle 10:15
-- Versione del server: 5.5.46-0ubuntu0.14.04.2
-- Versione PHP: 5.5.9-1ubuntu4.14

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
-- Struttura della tabella `amministratori`
--

CREATE TABLE IF NOT EXISTS `amministratori` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_anagrafe` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `amministratori`
--

INSERT INTO `amministratori` (`Id`, `Id_anagrafe`) VALUES
(1, 3);

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
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Dump dei dati per la tabella `anagrafe`
--

INSERT INTO `anagrafe` (`Id`, `Nome`, `Cognome`, `Data_nascita`, `Codice_fiscale`, `Email`, `Indirizzo`, `Residenza`, `Telefono`, `Username`, `Password`) VALUES
(1, 'Fabrizio', 'Ritz', '0000-00-00', 'nadisfvbadifv', 'ric@ric.ric', 'Semplicemente Via', 'Resipocodensa', 632145, 'Ric', 'ric'),
(2, 'Fabrizio', 'Asta', '1992-09-04', 'cazzocazocazz', 'ciao@hotmail.it', 'via prova , 16', '', 923554433, 'banana33', 'banana33'),
(3, 'Dom', 'Garitta', '0000-00-00', '', 'dom@dom.dom', '', '', 0, 'dom', 'dom'),
(9, 'Marcello', 'Billeci', '0000-00-00', '', 'professore@prof.it', '', '', 0, NULL, 'mar.bill'),
(10, 'Patrizia', 'Barbera', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(11, 'Claudia', 'Torrente', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(12, 'Alessandro', 'Barracco', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(13, 'Giovanni', 'Paterna', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(14, 'Maurizio', 'Oddo', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(15, 'Sonia', 'Fortunato', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(16, 'Vincenzo', 'Di Stefano', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(17, 'Giuseppa', 'Todaro', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(18, 'Antonio', 'Sammartano', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(19, 'Valentina', 'La Via Colli', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(20, 'Rosolino', 'Chifari', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(21, 'Fabio', 'Savagnone', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(22, 'Maria Francesca', 'Scalisi', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(23, 'Maria Giovanna', 'Marchese', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(24, 'Alfredo', 'Cassataro', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(25, 'Domenico', 'Messina', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(26, 'Massimo', 'Mantia', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(27, 'Rosa Letizia', 'La Commare', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(28, 'Maria Gabriella', 'De Maria', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(29, 'Stefania', 'Albero', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(30, 'Emanuela', 'Balsano', '0000-00-00', '', '', '', 'Capaci', 0, NULL, NULL),
(31, 'Valentina', 'Filingeri', '0000-00-00', '', '', '', 'Erice', 0, NULL, NULL),
(32, 'Irene', 'Gramignano', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(33, 'Sergio', 'Pace', '0000-00-00', '', '', '', 'Erice', 0, NULL, NULL),
(34, 'Carlo', 'Ruisi', '0000-00-00', '', '', '', 'Paceco', 0, NULL, NULL),
(35, 'Anna', 'Tosto', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(36, 'Ramona', 'Adragna', '0000-00-00', '', '', '', 'Erice', 0, NULL, NULL),
(37, 'Elisabetta', 'Aliotta', '0000-00-00', '', '', '', 'Palermo', 0, NULL, NULL),
(38, 'Laura', 'Attardo', '0000-00-00', '', '', '', 'Palermo', 0, NULL, NULL),
(39, 'Rosaria', 'Battaglia', '0000-00-00', '', '', '', 'Alcamo', 0, NULL, NULL),
(40, 'Giovanni', 'Collica', '0000-00-00', '', '', '', 'Castellammare del golfo', 0, NULL, NULL),
(41, 'Alessia', 'Costa', '0000-00-00', '', '', '', 'Buseto Palizzolo', 0, NULL, NULL),
(42, 'Ilenia', 'Criscenti', '0000-00-00', '', '', '', 'Buseto Palizzolo', 0, NULL, NULL),
(43, 'Lisanna', 'Ferrantelli', '0000-00-00', '', '', '', 'Castellammare del golfo', 0, NULL, NULL),
(44, 'Luisa', 'Gabriele', '0000-00-00', '', '', '', 'Pantelleria', 0, NULL, NULL),
(45, 'Alessia', 'Giardina', '0000-00-00', '', '', '', 'Mazzara del vallo', 0, NULL, NULL),
(46, 'Arianna', 'Livolsi', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(47, 'Francesca', 'Maltese', '0000-00-00', '', '', '', 'Salemi', 0, NULL, NULL),
(48, 'Vincenzo', 'Mantello', '0000-00-00', '', '', '', 'Pozzano', 0, NULL, NULL),
(49, 'Valentina', 'Miceli', '0000-00-00', '', '', '', 'Custonaci', 0, NULL, NULL),
(50, 'Paolo Massimiliano', 'Paterna', '0000-00-00', '', '', '', 'Palermo', 0, NULL, NULL),
(51, 'Alessandro', 'Pedroni', '0000-00-00', '', '', '', 'Cagliari', 0, NULL, NULL),
(52, 'Alessia', 'Vario', '0000-00-00', '', '', '', 'Custonaci', 0, NULL, NULL),
(53, 'Bianca Maria', 'Zanta', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(54, 'Roberto', 'Astronomo', '0000-00-00', '', '', '', 'Siracusa', 0, NULL, NULL),
(55, 'Francesca', 'Cusenza', '0000-00-00', '', '', '', 'Erice', 0, NULL, NULL),
(56, 'Federica', 'Di Stefano', '0000-00-00', '', '', '', 'Castellammare del golfo', 0, NULL, NULL),
(57, 'Djelassi', 'Kouloud', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(58, 'Dzhamila', 'Abbasalieva', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(59, 'Francesca', 'Ferrara', '0000-00-00', '', '', '', 'Alcamo', 0, NULL, NULL),
(60, 'Elena', 'Mantello', '0000-00-00', '', '', '', 'Pozzallo', 0, NULL, NULL),
(61, 'Monica', 'Scorsone', '0000-00-00', '', '', '', 'Castelvetrano', 0, NULL, NULL),
(62, 'Giulia Florentina', 'Tilotta', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(63, 'Yu Qing', 'Xia', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(64, 'Maria Cristina', 'Caruso', '0000-00-00', '', '', '', 'Valderice', 0, NULL, NULL),
(65, 'Marianna', 'D''aguanno', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(66, 'Stefania Caterina Ma', 'Di Girolamo', '0000-00-00', '', '', '', 'Marsala', 0, NULL, NULL),
(67, 'Anna', 'Lucifora', '0000-00-00', '', '', '', 'Modica', 0, NULL, NULL),
(68, 'Letizia', 'Russo', '0000-00-00', '', '', '', 'Città Giardina', 0, NULL, NULL),
(69, 'Davide', 'Sansica', '0000-00-00', '', '', '', 'Buseto Palizzolo', 0, NULL, NULL),
(70, 'Antonino', 'Tusarolo', '0000-00-00', '', '', '', 'Poggio Reale', 0, NULL, NULL),
(71, 'Ferdinando', 'Amico', '0000-00-00', '', '', '', 'Erice', 0, NULL, NULL),
(72, 'Mariangela', 'De Gaetano', '0000-00-00', '', '', '', 'Calatafimi', 0, NULL, NULL),
(73, 'Maria Giuseppina', 'Mancuso', '0000-00-00', '', '', '', 'Erice', 0, NULL, NULL),
(74, 'Leonardo Maria', 'Sieli', '0000-00-00', '', '', '', 'San Vito Lo Capo', 0, NULL, NULL),
(75, 'Carlo', 'Pavia', '0000-00-00', '', '', '', '', 0, NULL, NULL),
(76, 'Arianna', 'D''Aleo', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(77, 'Valeria', 'Gabriele', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(78, 'Ezio VIncenzo', 'Genna', '0000-00-00', '', '', '', 'Marsala', 0, NULL, NULL),
(79, 'Agnese ', 'Giacalone', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(80, 'Andreea Cerasea', 'Potorac', '0000-00-00', '', '', '', 'Santa Ninfa', 0, NULL, NULL),
(81, 'Nicoletta', 'Schio', '0000-00-00', '', '', '', 'San Vito Lo Capo', 0, NULL, NULL),
(82, 'Dalila', 'Cuturi', '0000-00-00', '', '', '', 'Erice', 0, NULL, NULL),
(83, 'Roberto', 'Mascellino', '0000-00-00', '', '', '', 'Palermo', 0, NULL, NULL),
(84, 'Salvatore', 'Scola', '0000-00-00', '', '', '', 'San Vito Lo Capo', 0, NULL, NULL),
(85, 'Serena', 'Virgilio', '0000-00-00', '', '', '', 'Trapani', 0, NULL, NULL),
(95, 'Giuseppe', 'Fontana', '0000-00-00', 'GGPPFFNNTT', 'g@g.g', 'Via Aiuto Angelo, 34', 'Italia', 0, 'giu.fon', 'giu.fon'),
(96, 'Domenico', 'Garitta', '1950-01-01', 'sfvsfvsfvs', 'domenico.garitta@gma', 'Via Barcellona, 2 B', 'svdsfvsfv', 0, 'dom.gar', 'dom.gar'),
(97, 'nome', 'cognome', '1950-01-17', 'codicefiscale', 'email', 'indirizzo', 'residenza', 0, 'nom.cog', 'password'),
(98, 'ciao', 'ciao', '1969-07-09', 'ciao', 'ciao', 'ciao', 'ciao', 0, 'cia.cia', 'ciao'),
(99, 'ciao', 'ciao', '1969-07-09', 'ciao', 'ciao', 'ciao', 'ciao', 0, 'cia.cia', 'ciao');

-- --------------------------------------------------------

--
-- Struttura della tabella `avvisi`
--

CREATE TABLE IF NOT EXISTS `avvisi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_docente` int(11) NOT NULL,
  `Testo` text NOT NULL,
  `Data_pubblicazione` date NOT NULL,
  `Visibilita` varchar(8) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dump dei dati per la tabella `avvisi`
--

INSERT INTO `avvisi` (`Id`, `Id_docente`, `Testo`, `Data_pubblicazione`, `Visibilita`) VALUES
(8, 2, 'Avviso di prova numero 2', '2015-10-02', 'pubblico'),
(9, 5, 'prova prova prova', '2015-10-14', 'pubblico'),
(11, 5, 'Altro avviso strano tanto per verificare.', '2015-10-14', 'pubblico'),
(12, 5, 'fjyffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2015-10-14', 'pubblico'),
(14, 5, 'eargrwt', '2015-10-14', 'pubblico'),
(15, 5, 'favedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrtfavedvbd tsdtbrt', '2015-10-14', 'pubblico'),
(16, 5, 'sadcsc', '2015-10-14', 'pubblico'),
(17, 5, 'Avviso privato solo per amministratori', '2015-10-19', 'privato'),
(18, 5, 'Avviso pubblico per tutti gli amanti degli avvisi pubici', '2015-10-19', 'pubblico'),
(19, 5, 'rfgbfgb', '2015-10-23', 'privato'),
(20, 5, 'PER AMMINISTRATORE', '2015-10-23', 'privato');

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi`
--

CREATE TABLE IF NOT EXISTS `corsi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_dipartimento` int(11) NOT NULL,
  `Nome_corso` varchar(50) NOT NULL,
  `Attivi` int(11) NOT NULL COMMENT 'Se il corso è attivo scrivere 1. Altrimenti 0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dump dei dati per la tabella `corsi`
--

INSERT INTO `corsi` (`Id`, `Id_dipartimento`, `Nome_corso`, `Attivi`) VALUES
(1, 1, 'Pittura', 0),
(2, 1, 'Scultura', 0),
(3, 1, 'Decorazione', 0),
(4, 1, 'Grafica', 0),
(5, 2, 'Scenografia', 0),
(6, 2, 'Fashion Design', 0),
(7, 2, 'Graphic Design', 0),
(8, 2, 'Nuove Tecnologie dell’Arte', 0),
(9, 3, 'Valorizzazione Dei Beni Culturali', 0),
(10, 3, 'Comunicazione e Didattica dell''Arte', 0),
(11, 0, 'Terapeutica Artistica', 0),
(12, 0, 'Scenografia Progettazione Plastica', 0),
(13, 0, 'Product Design', 0),
(14, 0, 'Arti Multimediali del Cinema e del Video', 0),
(15, 0, 'Fotografia', 0),
(16, 0, 'Applicazioni Digitali per i Beni Culturali', 0),
(17, 0, 'Didattica Multimediale', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `dipartimenti`
--

CREATE TABLE IF NOT EXISTS `dipartimenti` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_dipartimento` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `dipartimenti`
--

INSERT INTO `dipartimenti` (`Id`, `Nome_dipartimento`) VALUES
(1, 'Arti Visive'),
(2, 'Progettazione e Arti Applicate'),
(3, 'Comunicazione e didattica dell’arte');

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti`
--

CREATE TABLE IF NOT EXISTS `docenti` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_anagrafe` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dump dei dati per la tabella `docenti`
--

INSERT INTO `docenti` (`Id`, `Id_anagrafe`) VALUES
(2, 9),
(3, 10),
(4, 11),
(5, 12),
(6, 13),
(7, 14),
(8, 15),
(9, 16),
(10, 17),
(11, 18),
(12, 19),
(13, 20),
(14, 21),
(15, 22),
(16, 23),
(17, 24),
(18, 25),
(19, 26),
(20, 27),
(21, 28);

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti_programmi_caricati`
--

CREATE TABLE IF NOT EXISTS `docenti_programmi_caricati` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_docente` int(11) NOT NULL,
  `Percorso_file` varchar(50) NOT NULL,
  `Nome_file` varchar(50) NOT NULL,
  `Data_caricamento` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dump dei dati per la tabella `docenti_programmi_caricati`
--

INSERT INTO `docenti_programmi_caricati` (`Id`, `Id_docente`, `Percorso_file`, `Nome_file`, `Data_caricamento`) VALUES
(5, 5, './caricamenti/5Prof. Agamennone/', 'downloaded.pdf', '2015-10-12'),
(6, 5, './caricamenti/5Prof. Agamennone/', 'dbgestionale.sql', '2015-10-12'),
(7, 5, './caricamenti/5Prof. Agamennone/', 'hdd.png', '2015-10-12'),
(8, 5, './caricamenti/5Prof. Agamennone/', 'downloaded.pdf', '2015-10-12'),
(9, 2, './caricamenti/2Fabrizio/', '12168698_10206198598536914_601659139_o.jpg', '2015-10-22'),
(10, 2, './caricamenti/2Fabrizio/', 'database_gestionale.sql', '2015-10-22'),
(11, 2, './caricamenti/2Fabrizio/', 'dbgestionale.sql', '2015-10-22'),
(12, 2, './caricamenti/2Fabrizio/', 'hdd.png', '2015-10-22'),
(13, 2, './caricamenti/2Fabrizio/', 'progetto_accademia.sql', '2015-10-22');

-- --------------------------------------------------------

--
-- Struttura della tabella `materie_anagrafica`
--

CREATE TABLE IF NOT EXISTS `materie_anagrafica` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_materia` varchar(60) NOT NULL,
  `Id_settore` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=331 ;

--
-- Dump dei dati per la tabella `materie_anagrafica`
--

INSERT INTO `materie_anagrafica` (`Id`, `Nome_materia`, `Id_settore`) VALUES
(1, 'Anatomia artistica', 1),
(2, 'Anatomia dell''immagine', 1),
(3, 'Elementi di morfologia e dinamiche della forma', 1),
(4, 'Fenomenologia del corpo', 1),
(5, 'Iconografia e disegno anatomico', 1),
(6, 'Illustrazione scientifica', 1),
(7, 'Semiologia del corpo', 1),
(8, 'Tecniche dell’incisione - Grafica d’arte', 2),
(9, 'Litografia', 2),
(10, 'Serigrafia', 2),
(11, 'Tecniche dell''incisione calcografica', 2),
(12, 'Tecniche calcografiche sperimentali', 2),
(13, 'Stampa d’arte', 2),
(14, 'Xilografia', 2),
(15, 'Illustrazione', 2),
(16, 'Editoria d’arte', 2),
(17, 'Disegno per l’incisione', 3),
(18, 'Disegno per la pittura', 3),
(19, 'Disegno per la scultura', 3),
(20, 'Disegno per la decorazione', 3),
(21, 'Tecniche grafiche speciali', 4),
(22, 'Tecniche dei procedimenti a stampa', 4),
(23, 'Tecniche e tecnologie della grafica', 4),
(24, 'Pittura', 5),
(25, 'Metodi e tecniche di pittura sacra contemporanea', 5),
(26, 'Progettazione per la Pittura', 5),
(27, 'Metodologie e tecniche dell''affresco', 5),
(28, 'Tecniche pittoriche', 6),
(29, 'Tecniche e tecnologie per la pittura', 6),
(30, 'Cromatologia', 6),
(31, 'Tecniche e tecnologie delle arti visive', 6),
(32, 'Tecniche extramediali', 6),
(33, 'Scultura', 7),
(34, 'Metodi e tecniche di scultura sacra contemporanea', 7),
(35, 'Videoscultura', 7),
(36, 'Tecniche della scultura', 8),
(37, 'Formatura, tecnologia e tipologia dei materiali', 8),
(38, 'Tecniche del marmo e delle pietre dure', 9),
(39, 'Tecniche di fonderia', 10),
(40, 'Decorazione', 11),
(41, 'Metodi e tecniche di decorazione sacra contemporanea', 11),
(42, 'Tecniche e tecnologie della decorazione', 12),
(43, 'Tecniche dei materiali', 12),
(44, 'Tecniche del mosaico', 12),
(45, 'Tecniche della ceramica', 12),
(46, 'Tecniche della vetrata', 12),
(47, 'Tecniche della doratura', 12),
(48, 'Plastica ornamentale', 13),
(49, 'Tecniche plastiche contemporanee', 13),
(50, 'Elementi di architettura e urbanistica', 14),
(51, 'Analisi del territorio e progettazione del paesaggio', 14),
(52, 'Architettura sacra', 14),
(53, 'Urban design', 14),
(54, 'Metodologia della progettazione', 15),
(55, 'Disegno architettonico di stile e arredo', 15),
(56, 'Architettura degli interni', 15),
(57, 'Progettazione di interventi urbani e territoriali', 15),
(58, 'Rappresentazione dell’architettura', 15),
(59, 'Tecniche di rappresentazione dello spazio', 15),
(60, 'Disegno e rilievo dei beni culturali', 16),
(61, 'Disegno tecnico e progettuale', 16),
(62, 'Tecniche e tecnologie del disegno', 16),
(63, 'Teoria e pratica del disegno prospettico', 16),
(64, 'Fondamenti di disegno informatico', 16),
(65, 'Design', 17),
(66, 'Cultura del progetto', 17),
(67, 'Design per l’arte sacra', 17),
(68, 'Design system', 17),
(69, 'Product design', 17),
(70, 'Design del gioiello', 17),
(71, 'Ecodesign', 17),
(72, 'Landscape design', 18),
(73, 'Light design', 18),
(74, 'Graphic design', 19),
(75, 'Elementi di grafica editoriale', 19),
(76, 'Progettazione grafica', 19),
(77, 'Design per l’editoria', 19),
(78, 'Lettering', 19),
(79, 'Grafica multimediale', 19),
(80, 'Layout e tecniche di visualizzazione', 19),
(81, 'Web design', 19),
(82, 'Restyling dei siti web', 19),
(83, 'Arte del fumetto', 20),
(84, 'Modellistica', 21),
(85, 'Scenografia', 22),
(86, 'Teatro della festa', 22),
(87, 'Scenografia per la televisione', 22),
(88, 'Scenografia per il cinema', 22),
(89, 'Scenotecnica', 23),
(90, 'Illuminotecnica', 23),
(91, 'Rappresentazione architettonica dello spazio scenico', 23),
(92, 'Tecnologia e materiali applicati alla scenografia', 23),
(93, 'Restauro dei dipinti su tela e su tavola', 24),
(94, 'Restauro degli affreschi e dei dipinti murari', 24),
(95, 'Restauro del tessuto', 24),
(96, 'Restauro dell’arte contemporanea', 24),
(97, 'Restauro dei materiali lapidei', 25),
(98, 'Restauro dei metalli', 25),
(99, 'Restauro del legno', 25),
(100, 'Restauro della ceramica', 26),
(101, 'Restauro delle terrecotte, dei gessi e degli stucchi', 26),
(102, 'Restauro della carta', 27),
(103, 'Restauro del cinema e del video', 28),
(104, 'Restauro della fotografia', 28),
(105, 'Chimica per il restauro dell’arte contemporanea', 29),
(106, 'Chimica propedeutica', 29),
(107, 'Metodologie chimicofisiche', 29),
(108, 'Tecniche e tecnologie della diagnostica', 29),
(109, 'Tecnologia dei materiali per la grafica', 30),
(110, 'Tecnologia dei nuovi materiali', 30),
(111, 'Tecnologia della carta', 30),
(112, 'Tipologia dei materiali', 30),
(113, 'Arti applicate e tipologia dei materiali', 30),
(114, 'Fotografia', 31),
(115, 'Documentazione fotografica', 31),
(116, 'Fotografia digitale', 31),
(117, 'Fotografia per i beni culturali', 31),
(118, 'Fotografia scientifica', 31),
(119, 'Direzione della fotografia', 31),
(120, 'Costume per lo spettacolo', 32),
(121, 'Progettazione per il costume', 32),
(122, 'Tecniche di elaborazione per il costume', 32),
(123, 'Tecniche sartoriali per il costume', 32),
(124, 'Trucco e maschera teatrale', 33),
(125, 'Teatro di figura', 33),
(126, 'Fashion design', 34),
(127, 'Ambientazione moda', 34),
(128, 'Cultura dei materiali di moda', 34),
(129, 'Cultura tessile', 34),
(130, 'Design del tessuto', 34),
(131, 'Design dell''accessorio', 34),
(132, 'Editoria per il fashion design', 34),
(133, 'Regia', 35),
(134, 'Pratica e cultura dello spettacolo', 35),
(135, 'Tecniche performative per le arti visive', 36),
(136, 'Tecniche di produzione video teatro', 36),
(137, 'Videoinstallazione', 36),
(138, 'Installazioni multimediali', 36),
(139, 'Art direction', 37),
(140, 'Brand design', 37),
(141, 'Metodologia progettuale della comunicazione visiva', 37),
(142, 'Packaging', 37),
(143, 'Applicazioni digitali per l''arte', 38),
(144, 'Computer art', 38),
(145, 'Computer graphic', 38),
(146, 'Tecniche di animazione digitale', 38),
(147, 'Tecnologie e applicazioni digitali', 38),
(148, 'Informatica per la grafica', 38),
(149, 'Elaborazione digitale dell''immagine', 38),
(150, 'Videografica', 38),
(151, 'Tecniche e tecnologie della stampa digitale', 38),
(152, 'Coreografia digitale', 38),
(153, 'Drammaturgia multimediale', 38),
(154, 'Fondamenti di informatica', 39),
(155, 'Tecnologie dell’informatica', 39),
(156, 'Progettazione multimediale', 40),
(157, 'Processi e tecniche per lo spettacolo multimediale', 40),
(158, 'Tecniche multimediali della decorazione', 40),
(159, 'Multimedialità per i beni culturali', 40),
(160, 'Regia per i video giochi', 40),
(161, 'Sceneggiatura per i video giochi', 40),
(162, 'Linguaggi multimediali', 40),
(163, 'Architettura virtuale', 41),
(164, 'Tecniche di modellazione digitalecomputer 3D', 41),
(165, 'Rendering 3D', 41),
(166, 'Cibernetica e teoria dell''informazione', 42),
(167, 'Concept planning', 42),
(168, 'Estetica delle interfacce', 42),
(169, 'Interaction design', 42),
(170, 'Net art', 42),
(171, 'rogettazione di software interattivi', 42),
(172, 'Uso dei software per il web', 42),
(173, 'Sistemi interattivi', 42),
(174, 'Software art', 42),
(175, 'Tecniche audiovisive per web', 42),
(176, 'Teorie e tecniche dell’interazione', 42),
(177, 'Computer games', 42),
(178, 'Tecniche e metodologie dei video giochi', 42),
(179, 'Audivisi lineari', 43),
(180, 'Tecniche di documentazione audiovisiva', 43),
(181, 'Digital video', 43),
(182, 'Cinematografia', 43),
(183, 'Video editing', 43),
(184, 'Tecniche di montaggio', 43),
(185, 'Tecniche di ripresa', 43),
(186, 'Elementi di produzione video', 43),
(187, 'Tecniche dei nuovi media integrati', 43),
(188, 'Sound design', 44),
(189, 'Audio e mixaggio', 44),
(190, 'Progettazione spazi sonori', 44),
(191, 'Video music', 44),
(192, 'Culture digitali', 45),
(193, 'Estetica dei new media', 45),
(194, 'Comunicazione multimediale', 45),
(195, 'Teorie del mercato multimediale dell’arte', 45),
(196, 'Realtà virtuali e paradigmi della complessità', 45),
(197, 'Estetica', 46),
(198, 'Elementi di filosofia contemporanea', 46),
(199, 'Estetica delle arti visive', 46),
(200, 'Fenomenologia dell’immagine', 46),
(201, 'Filosofia dell’arte', 46),
(202, 'Estetica e storia dell''arte mussulmana', 46),
(203, 'Estetica del sacro', 46),
(204, 'Estetica delle religioni orientali', 46),
(205, 'Stile, storia dell''arte e del costume', 47),
(206, 'Elementi di iconologia e iconografia', 47),
(207, 'Storia dell’arte antica', 47),
(208, 'Storia dell’arte contemporanea', 47),
(209, 'Storia dell’arte medievale', 47),
(210, 'Storia dell’arte moderna', 47),
(211, 'Storia dell''arte cristiano-ortodossa', 47),
(212, 'Storia dell''arte sacra moderna e contemporanea', 47),
(213, 'Storia del costume', 47),
(214, 'Storia della decorazione', 47),
(215, 'Storia del disegno e della grafica d''arte', 47),
(216, 'Storia del design', 48),
(217, 'Storia della moda', 48),
(218, 'Storia della stampa e dell''editoria', 48),
(219, 'Storia delle arti applicate', 48),
(220, 'Storia delle tecniche artistiche', 48),
(221, 'Metodologie del restauro', 49),
(222, 'Problematiche nel restauro dell''arte contemporanea', 49),
(223, 'Storia delle tecniche di restauro', 49),
(224, 'Teoria e storia del restauro', 49),
(225, 'Storia dell’architettura e dell’urbanistica', 50),
(226, 'Storia dell''architettura teatrale', 50),
(227, 'Storia dell''architettura contemporanea', 50),
(228, 'Fenomenologia delle arti contemporanee', 51),
(229, 'Fenomenologia degli stili', 51),
(230, 'Linguaggi dell’arte contemporanea', 51),
(231, 'Problemi espressivi del contemporaneo', 51),
(232, 'Ultime tendenze nelle arti visive', 51),
(233, 'Storia e metodologia della critica d’arte', 52),
(234, 'Metodologia e teoria della storia dell’arte', 52),
(235, 'Metodologie e tecniche del contemporaneo', 52),
(236, 'Teoria e storia dei metodi di rappresentazione', 52),
(237, 'Storia dello spettacolo', 53),
(238, 'Letteratura e filosofia del teatro', 53),
(239, 'Storia e teoria della scenografia', 53),
(240, 'Storia della musica contemporanea', 54),
(241, 'Storia della musica e del teatro musicale', 54),
(242, 'Antropologia culturale', 55),
(243, 'Antropologia dell''arte', 55),
(244, 'Antropologia delle società complesse', 55),
(245, 'Archetipi dell’immaginario', 55),
(246, 'Storia della religiosità popolare', 55),
(247, 'Sociologia dei nuovi media', 56),
(248, 'Sociologia dei processi culturali', 56),
(249, 'Sociologia dell''arte', 56),
(250, 'Sociologia della comunicazione', 56),
(251, 'Iconografia biblica', 57),
(252, 'Letteratura biblica', 57),
(253, 'Liturgia', 57),
(254, 'Teoria della percezione e psicologia della forma', 58),
(255, 'Psicologia dell''arte', 58),
(256, 'Psicosociologia dei consumi culturali', 58),
(257, 'Pedagogia e didattica dell''arte', 59),
(258, 'Didattica della multimedialità', 59),
(259, 'Didattica per il museo', 59),
(260, 'Letteratura ed illustrazione per l''infanzia', 59),
(261, 'Metodologie didattiche dei linguaggi audiovisivi', 59),
(262, 'Didattica dei linguaggi artistici', 59),
(263, 'Pratiche di animazione ludico-creative', 59),
(264, 'Storia della pedagogia', 59),
(265, 'Tecnologia dell''educazione', 59),
(266, 'Pratiche creative per l''infanzia', 60),
(267, 'Principi e tecniche della terapeutica artistica', 60),
(268, 'Storie e modelli dell''arte terapia', 60),
(269, 'Tecniche espressive integrate', 60),
(270, 'Beni culturali dell''età contemporanea', 61),
(271, 'Beni culturali e ambientali', 61),
(272, 'Catalogazione e gestione degli archivi', 61),
(273, 'Storia e documentazione dei beni architettonici', 61),
(274, 'Teoria e storia dei beni culturali', 61),
(275, 'Teorie del paesaggio', 61),
(276, 'Comunicazione e valorizzazione dei beni archivistici', 62),
(277, 'Comunicazione e valorizzazione delle collezioni museali', 62),
(278, 'Valorizzazione dei beni archeologici', 62),
(279, 'Valorizzazione dei beni architettonici e paesaggistici', 62),
(280, 'Valorizzazione e gestione dei siti e delle aree archeologich', 62),
(281, 'Metodologie di archiviazione e conservazione dell''arte digit', 62),
(282, 'Museologia del contemporaneo', 63),
(283, 'Museologia e gestione dei sistemi espositivi', 63),
(284, 'Museologia e storia del collezionismo', 63),
(285, 'Allestimento degli spazi espositivi', 64),
(286, 'Comunicazione espositiva', 64),
(287, 'Ergonomia delle esposizioni', 64),
(288, 'Museografia', 64),
(289, 'Progettazione di allestimenti', 64),
(290, 'Teoria e metodo dei mass media', 65),
(291, 'Fenomenologia dei media', 65),
(292, 'Teoria degli audiovisivi', 65),
(293, 'Etica della comunicazione', 65),
(294, 'Teoria e analisi del cinema e dell’audiovisivo', 65),
(295, 'Storia del cinema e del video', 66),
(296, 'Storia della fotografia', 66),
(297, 'Storia della critica fotografica', 66),
(298, 'Storia della televisione e dello spettacolo televisivo', 66),
(299, 'Storia e teoria dei nuovi media', 66),
(300, 'Storia dell''illustrazione e della pubblicità', 66),
(301, 'Comunicazione pubblicitaria', 67),
(302, 'Copy writing', 67),
(303, 'Sistemi Editoriali per l''arte', 67),
(304, 'Elementi di comunicazione giornalistica', 67),
(305, 'Scrittura creativa', 67),
(306, 'Informazione per l''arte: mezzi e metodi', 67),
(307, 'Elementi di storia della comunicazione sociale', 68),
(308, 'Semiologia e retorica dei sistemi espositivi', 68),
(309, 'Semiotica dell’arte', 68),
(310, 'Management per l''arte', 69),
(311, 'Fondamenti di marketing culturale', 69),
(312, 'Net marketing', 69),
(313, 'Design management', 69),
(314, 'Project management per la scultura', 69),
(315, 'Organizzazione e produzione dell''arte mediale', 69),
(316, 'Organizzazione delle attività editoriali', 69),
(317, 'Progettazione della professionalità', 69),
(318, 'Relazioni pubbliche', 69),
(319, 'Organizzazione grandi eventi', 69),
(320, 'Logica e organizzazione d''impresa', 69),
(321, 'Diritto, legislazione ed economia dello spettacolo', 70),
(322, 'Economia e mercato dell’arte', 70),
(323, 'Economia e mercato della grafica', 70),
(324, 'Legislazione dei beni culturali', 70),
(325, 'Legislazione del mercato dell''arte', 70),
(326, 'Legislazione per lo spettacolo', 70),
(327, 'Diritto dell''informazione e della comunicazione digitale', 70),
(328, 'Inglese', 71),
(329, 'Inglese per la comunicazione artistica', 71),
(330, 'Lingua e letteratura inglese', 71);

-- --------------------------------------------------------

--
-- Struttura della tabella `materie_corsi`
--

CREATE TABLE IF NOT EXISTS `materie_corsi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_materia` int(11) NOT NULL,
  `Id_corso` int(11) NOT NULL,
  `Cfa` int(10) DEFAULT NULL,
  `Tipo` varchar(12) NOT NULL COMMENT 'Valori: Fondamentale, Secondaria',
  `Descrizione` varchar(15) NOT NULL COMMENT 'Base, Caratterizzanti, Integrative',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Per le materie Fond&Opz, scriverlo nella colonna adeguata' AUTO_INCREMENT=383 ;

--
-- Dump dei dati per la tabella `materie_corsi`
--

INSERT INTO `materie_corsi` (`Id`, `Id_materia`, `Id_corso`, `Cfa`, `Tipo`, `Descrizione`) VALUES
(3, 3, 0, 6, '', ''),
(4, 4, 0, 6, '', ''),
(5, 5, 0, 6, '', ''),
(6, 6, 0, 6, '', ''),
(7, 7, 0, 6, '', ''),
(8, 8, 0, 10, '', ''),
(9, 9, 0, 6, '', ''),
(10, 10, 0, 6, '', ''),
(11, 11, 0, 6, '', ''),
(12, 12, 0, 12, '', ''),
(13, 13, 0, 8, '', ''),
(14, 14, 0, 10, '', ''),
(15, 15, 0, 6, '', ''),
(16, 16, 0, 8, '', ''),
(17, 17, 0, 6, '', ''),
(18, 18, 0, 12, '', ''),
(19, 19, 0, 6, '', ''),
(20, 20, 0, 6, '', ''),
(21, 21, 0, 6, '', ''),
(22, 22, 0, 6, '', ''),
(23, 145, 10, 10, 'Fondamentale', 'Base'),
(24, 138, 2, 6, 'Fondamentale', 'Base'),
(25, 139, 2, 6, 'Fondamentale', 'Base'),
(26, 140, 2, 6, 'Fondamentale', 'Base'),
(27, 141, 2, 6, 'Fondamentale', 'Base'),
(28, 142, 2, 6, 'Fondamentale', 'Base'),
(29, 143, 2, 6, 'Fondamentale', 'Base'),
(30, 144, 2, 6, 'Fondamentale', 'Base'),
(31, 145, 2, 6, 'Fondamentale', 'Base'),
(32, 146, 2, 12, 'Fondamentale', 'Base'),
(33, 147, 2, 12, 'Fondamentale', 'Base'),
(34, 148, 2, 6, 'Fondamentale', 'Base'),
(35, 149, 2, 6, 'Fondamentale', 'Base'),
(36, 150, 2, 6, 'Fondamentale', 'Base'),
(37, 151, 2, 6, 'Fondamentale', 'Base'),
(38, 152, 2, 6, 'Fondamentale', 'Base'),
(39, 153, 2, 6, 'Secondaria', 'Integrativa'),
(40, 154, 7, 10, 'Fondamentale', 'Base'),
(41, 155, 6, 6, 'Secondaria', 'Integrativa'),
(42, 156, 2, 6, 'Secondaria', 'Integrativa'),
(43, 157, 7, 6, 'Fondamentale', 'Base'),
(44, 158, 2, 6, 'Secondaria', 'Integrativa'),
(45, 159, 2, 6, 'Secondaria', 'Integrativa'),
(46, 160, 7, 6, 'Fondamentale', 'Base'),
(47, 161, 2, 6, 'Secondaria', 'Integrativa'),
(48, 162, 7, 6, 'Fondamentale', 'Base'),
(49, 163, 2, 6, 'Secondaria', 'Integrativa'),
(50, 164, 2, 6, 'Secondaria', 'Integrativa'),
(51, 165, 2, 4, 'Secondaria', 'Integrativa'),
(52, 166, 2, 6, 'Secondaria', 'Integrativa'),
(53, 167, 7, 6, 'Fondamentale', 'Base'),
(54, 168, 7, 6, 'Fondamentale', 'Base'),
(55, 169, 2, 4, 'Fondamentale', 'Base'),
(56, 170, 7, 6, 'Fondamentale', 'Base'),
(57, 171, 2, 4, 'Fondamentale', 'Base'),
(58, 172, 7, 8, 'Fondamentale', 'Base'),
(59, 173, 7, 12, 'Fondamentale', 'Base'),
(60, 174, 7, 12, 'Fondamentale', 'Base'),
(61, 175, 7, 12, 'Fondamentale', 'Base'),
(62, 176, 7, 10, 'Fondamentale', 'Base'),
(63, 177, 7, 8, 'Fondamentale', 'Base'),
(64, 178, 7, 6, 'Fondamentale', 'Base'),
(65, 179, 7, 6, 'Secondaria', 'Integrativa'),
(66, 180, 7, 6, 'Secondaria', 'Integrativa'),
(67, 181, 7, 6, 'Secondaria', 'Integrativa'),
(68, 182, 7, 6, 'Secondaria', 'Integrativa'),
(69, 183, 7, 6, 'Secondaria', 'Integrativa'),
(70, 184, 7, 6, 'Secondaria', 'Integrativa'),
(71, 185, 7, 6, 'Secondaria', 'Integrativa'),
(72, 186, 7, 6, 'Secondaria', 'Integrativa'),
(73, 187, 7, 6, 'Secondaria', 'Integrativa'),
(74, 188, 7, 6, 'Secondaria', 'Integrativa'),
(75, 189, 7, 4, 'Secondaria', 'Integrativa'),
(76, 190, 7, 6, 'Secondaria', 'Integrativa'),
(77, 191, 7, 4, 'Fondamentale', 'Base'),
(78, 192, 7, 4, 'Fondamentale', 'Base'),
(79, 193, 7, 8, 'Fondamentale', 'Base'),
(80, 194, 8, 6, 'Fondamentale', 'Base'),
(81, 195, 8, 6, 'Fondamentale', 'Base'),
(82, 196, 8, 6, 'Fondamentale', 'Base'),
(83, 197, 8, 6, 'Fondamentale', 'Base'),
(84, 198, 8, 6, 'Fondamentale', 'Base'),
(85, 199, 8, 6, 'Fondamentale', 'Base'),
(86, 200, 8, 6, 'Fondamentale', 'Base'),
(87, 201, 8, 12, 'Fondamentale', 'Base'),
(88, 202, 8, 6, 'Fondamentale', 'Base'),
(89, 203, 8, 8, 'Fondamentale', 'Base'),
(90, 204, 8, 8, 'Fondamentale', 'Base'),
(91, 205, 8, 6, 'Fondamentale', 'Base'),
(92, 206, 8, 10, 'Fondamentale', 'Base'),
(93, 207, 8, 6, 'Fondamentale', 'Base'),
(94, 208, 8, 10, 'Fondamentale', 'Base'),
(95, 209, 8, 6, 'Secondaria', 'Integrativa'),
(96, 210, 8, 6, 'Secondaria', 'Integrativa'),
(97, 211, 8, 6, 'Secondaria', 'Integrativa'),
(98, 212, 8, 6, 'Secondaria', 'Integrativa'),
(99, 213, 8, 6, 'Secondaria', 'Integrativa'),
(100, 214, 8, 6, 'Secondaria', 'Integrativa'),
(101, 215, 8, 6, 'Secondaria', 'Integrativa'),
(102, 216, 8, 6, 'Secondaria', 'Integrativa'),
(103, 217, 8, 6, 'Secondaria', 'Integrativa'),
(104, 218, 8, 6, 'Secondaria', 'Integrativa'),
(105, 219, 8, 6, 'Secondaria', 'Integrativa'),
(106, 220, 8, 6, 'Secondaria', 'Integrativa'),
(107, 221, 8, 6, 'Secondaria', 'Integrativa'),
(108, 222, 8, 6, 'Secondaria', 'Integrativa'),
(109, 223, 8, 6, 'Secondaria', 'Integrativa'),
(110, 224, 8, 6, 'Secondaria', 'Integrativa'),
(111, 225, 8, 6, 'Secondaria', 'Integrativa'),
(112, 226, 8, 4, 'Fondamentale', 'Base'),
(113, 227, 8, 4, 'Fondamentale', 'Base'),
(114, 228, 10, 6, 'Fondamentale', 'Base'),
(115, 229, 10, 6, 'Fondamentale', 'Base'),
(116, 230, 10, 6, 'Fondamentale', 'Base'),
(117, 231, 10, 6, 'Fondamentale', 'Base'),
(118, 232, 10, 6, 'Fondamentale', 'Base'),
(119, 233, 10, 6, 'Fondamentale', 'Base'),
(120, 234, 10, 6, 'Fondamentale', 'Base'),
(121, 235, 3, 6, 'Secondaria', 'Integrativa'),
(122, 236, 10, 6, 'Fondamentale', 'Base'),
(123, 237, 10, 10, 'Fondamentale', 'Base'),
(124, 238, 3, 6, 'Secondaria', 'Integrativa'),
(125, 239, 10, 10, 'Fondamentale', 'Base'),
(126, 240, 3, 8, 'Fondamentale', 'Base'),
(127, 241, 3, 6, 'Fondamentale', 'Base'),
(128, 242, 3, 12, 'Fondamentale', 'Base'),
(129, 243, 3, 6, 'Secondaria', 'Integrativa'),
(130, 244, 10, 10, 'Fondamentale', 'Base'),
(131, 245, 3, 6, 'Fondamentale', 'Base'),
(132, 246, 10, 6, 'Fondamentale', 'Base'),
(133, 247, 10, 6, 'Fondamentale', 'Base'),
(134, 248, 3, 6, 'Secondaria', 'Integrativa'),
(135, 249, 10, 6, 'Fondamentale', 'Base'),
(136, 250, 3, 6, 'Secondaria', 'Integrativa'),
(137, 251, 10, 6, 'Fondamentale', 'Base'),
(138, 252, 3, 4, 'Secondaria', 'Integrativa'),
(139, 253, 10, 6, 'Fondamentale', 'Base'),
(140, 254, 10, 6, 'Fondamentale', 'Base'),
(141, 255, 10, 8, 'Secondaria', 'Integrativa'),
(142, 256, 10, 6, 'Fondamentale', 'Base'),
(143, 257, 3, 6, 'Fondamentale', 'Base'),
(144, 258, 3, 8, 'Fondamentale', 'Base'),
(145, 259, 10, 6, 'Secondaria', 'Integrativa'),
(146, 260, 3, 12, 'Fondamentale', 'Base'),
(147, 261, 10, 6, 'Secondaria', 'Integrativa'),
(148, 262, 3, 6, 'Secondaria', 'Integrativa'),
(149, 263, 3, 6, 'Secondaria', 'Integrativa'),
(150, 264, 10, 6, 'Secondaria', 'Integrativa'),
(151, 265, 10, 6, 'Secondaria', 'Integrativa'),
(152, 266, 10, 4, 'Secondaria', 'Integrativa'),
(153, 267, 10, 4, 'Secondaria', 'Integrativa'),
(154, 268, 10, 6, 'Secondaria', 'Integrativa'),
(155, 269, 10, 6, 'Secondaria', 'Integrativa'),
(156, 270, 10, 6, 'Secondaria', 'Integrativa'),
(157, 271, 10, 6, 'Secondaria', 'Integrativa'),
(158, 272, 10, 4, 'Secondaria', 'Integrativa'),
(159, 273, 10, 6, 'Secondaria', 'Integrativa'),
(160, 274, 10, 6, 'Secondaria', 'Integrativa'),
(161, 275, 10, 6, 'Secondaria', 'Integrativa'),
(162, 276, 10, 4, 'Secondaria', 'Integrativa'),
(163, 277, 10, 4, 'Secondaria', 'Integrativa'),
(164, 278, 3, 6, 'Fondamentale', 'Base'),
(165, 279, 3, 6, 'Fondamentale', 'Base'),
(166, 280, 3, 6, 'Fondamentale', 'Base'),
(167, 281, 3, 12, 'Fondamentale', 'Base'),
(168, 282, 3, 8, 'Fondamentale', 'Base'),
(169, 283, 3, 6, 'Secondaria', 'Integrativa'),
(170, 284, 3, 6, 'Secondaria', 'Integrativa'),
(171, 285, 3, 6, 'Secondaria', 'Integrativa'),
(172, 286, 1, 6, 'Fondamentale', 'Base'),
(173, 287, 3, 4, 'Secondaria', 'Integrativa'),
(174, 288, 3, 6, 'Fondamentale', 'Base'),
(175, 289, 1, 6, 'Fondamentale', 'Base'),
(176, 290, 3, 6, 'Fondamentale', 'Base'),
(177, 291, 1, 6, 'Fondamentale', 'Base'),
(178, 292, 3, 12, 'Fondamentale', 'Base'),
(179, 293, 1, 12, 'Fondamentale', 'Base'),
(180, 294, 1, 6, 'Fondamentale', 'Base'),
(181, 295, 3, 8, 'Fondamentale', 'Base'),
(182, 296, 1, 8, 'Fondamentale', 'Base'),
(183, 297, 3, 6, 'Secondaria', 'Integrativa'),
(184, 298, 1, 9, 'Fondamentale', 'Base'),
(185, 299, 1, 12, 'Fondamentale', 'Base'),
(186, 300, 3, 6, 'Secondaria', 'Integrativa'),
(187, 301, 1, 6, 'Fondamentale', 'Base'),
(188, 302, 1, 6, 'Secondaria', 'Integrativa'),
(189, 303, 2, 6, 'Fondamentale', 'Base'),
(190, 304, 3, 4, 'Secondaria', 'Integrativa'),
(191, 305, 3, 12, 'Secondaria', 'Integrativa'),
(192, 306, 1, 6, 'Secondaria', 'Integrativa'),
(193, 307, 2, 6, 'Secondaria', 'Integrativa'),
(194, 308, 1, 6, 'Secondaria', 'Integrativa'),
(195, 309, 2, 6, 'Secondaria', 'Integrativa'),
(196, 310, 2, 6, 'Secondaria', 'Integrativa'),
(197, 311, 2, 4, 'Secondaria', 'Integrativa'),
(198, 312, 2, 8, 'Fondamentale', 'Base'),
(199, 313, 2, 6, 'Fondamentale', 'Base'),
(200, 314, 1, 6, 'Secondaria', 'Integrativa'),
(201, 315, 2, 12, 'Fondamentale', 'Base'),
(202, 316, 1, 4, 'Secondaria', 'Integrativa'),
(203, 317, 2, 6, 'Fondamentale', 'Base'),
(204, 318, 2, 6, 'Secondaria', 'Integrativa'),
(205, 319, 2, 6, 'Secondaria', 'Integrativa'),
(206, 320, 2, 4, 'Secondaria', 'Integrativa'),
(207, 321, 2, 12, 'Secondaria', 'Integrativa'),
(208, 322, 4, 6, 'Fondamentale', 'Base'),
(209, 323, 1, 6, 'Secondaria', 'Integrativa'),
(210, 324, 4, 6, 'Fondamentale', 'Base'),
(211, 325, 1, 6, 'Secondaria', 'Integrativa'),
(212, 326, 4, 12, 'Fondamentale', 'Base'),
(213, 327, 4, 6, 'Fondamentale', 'Base'),
(214, 328, 1, 12, 'Fondamentale', 'Base'),
(215, 329, 4, 6, 'Fondamentale', 'Base'),
(216, 330, 1, 9, 'Fondamentale', 'Base'),
(217, 331, 4, 6, 'Secondaria', 'Integrativa'),
(218, 332, 4, 6, 'Secondaria', 'Integrativa'),
(219, 333, 4, 6, 'Secondaria', 'Integrativa'),
(220, 334, 4, 6, 'Secondaria', 'Integrativa'),
(221, 335, 4, 6, 'Fondamentale', 'Base'),
(222, 336, 4, 6, 'Fondamentale', 'Base'),
(223, 337, 4, 6, 'Fondamentale', 'Base'),
(224, 338, 4, 12, 'Fondamentale', 'Base'),
(225, 339, 4, 6, 'Fondamentale', 'Base'),
(226, 340, 11, 6, 'Fondamentale', 'Base'),
(227, 341, 11, 6, 'Fondamentale', 'Base'),
(228, 342, 11, 6, 'Fondamentale', 'Base'),
(229, 343, 11, 6, 'Fondamentale', 'Base'),
(230, 344, 1, 9, 'Fondamentale', 'Base'),
(231, 345, 11, 6, 'Fondamentale', 'Base'),
(232, 346, 1, 6, 'Secondaria', 'Integrativa'),
(233, 347, 11, 6, 'Secondaria', 'Integrativa'),
(234, 348, 1, 6, 'Secondaria', 'Integrativa'),
(235, 349, 11, 6, 'Secondaria', 'Integrativa'),
(236, 350, 4, 6, 'Secondaria', 'Integrativa'),
(237, 351, 11, 6, 'Secondaria', 'Integrativa'),
(238, 352, 1, 4, 'Secondaria', 'Integrativa'),
(239, 353, 4, 4, 'Secondaria', 'Integrativa'),
(240, 354, 11, 6, 'Secondaria', 'Integrativa'),
(241, 355, 11, 6, 'Secondaria', 'Integrativa'),
(242, 356, 4, 4, 'Secondaria', 'Integrativa'),
(243, 357, 1, 12, 'Secondaria', 'Integrativa'),
(244, 358, 4, 10, 'Secondaria', 'Integrativa'),
(245, 359, 11, 6, 'Fondamentale', 'Base'),
(246, 360, 11, 6, 'Fondamentale', 'Base'),
(247, 361, 11, 6, 'Fondamentale', 'Base'),
(248, 362, 12, 6, 'Fondamentale', 'Base'),
(249, 363, 11, 6, 'Fondamentale', 'Base'),
(250, 364, 12, 6, 'Fondamentale', 'Base'),
(251, 365, 11, 6, 'Fondamentale', 'Base'),
(252, 366, 12, 10, 'Fondamentale', 'Base'),
(253, 367, 11, 4, 'Fondamentale', 'Base'),
(254, 368, 11, 4, 'Fondamentale', 'Base'),
(255, 369, 12, 10, 'Fondamentale', 'Base'),
(256, 370, 11, 4, 'Fondamentale', 'Base'),
(257, 371, 6, 6, 'Fondamentale', 'Base'),
(258, 372, 12, 8, 'Fondamentale', 'Base'),
(259, 373, 11, 6, 'Secondaria', 'Integrativa'),
(260, 374, 11, 4, 'Secondaria', 'Integrativa'),
(261, 375, 12, 6, 'Secondaria', 'Integrativa'),
(262, 376, 6, 6, 'Fondamentale', 'Base'),
(263, 377, 11, 12, 'Secondaria', 'Integrativa'),
(264, 378, 12, 4, 'Secondaria', 'Integrativa'),
(265, 379, 12, 6, 'Secondaria', 'Integrativa'),
(266, 380, 6, 6, 'Fondamentale', 'Base'),
(267, 381, 12, 4, 'Secondaria', 'Integrativa'),
(268, 382, 12, 6, 'Fondamentale', 'Base'),
(269, 383, 12, 6, 'Fondamentale', 'Base'),
(270, 384, 12, 8, 'Fondamentale', 'Base'),
(271, 385, 12, 10, 'Fondamentale', 'Base'),
(272, 386, 12, 10, 'Fondamentale', 'Base'),
(273, 387, 6, 12, 'Fondamentale', 'Base'),
(274, 388, 6, 8, 'Fondamentale', 'Base'),
(275, 390, 6, 6, 'Secondaria', 'Integrativa'),
(276, 392, 6, 4, 'Secondaria', 'Integrativa'),
(277, 394, 6, 6, 'Secondaria', 'Integrativa'),
(278, 396, 6, 6, 'Secondaria', 'Integrativa'),
(279, 397, 6, 6, 'Fondamentale', 'Base'),
(280, 398, 6, 6, 'Fondamentale', 'Base'),
(281, 400, 1, 12, 'Fondamentale', 'Base'),
(282, 401, 1, 8, 'Fondamentale', 'Base'),
(283, 402, 1, 6, 'Secondaria', 'Integrativa'),
(284, 404, 1, 6, 'Secondaria', 'Integrativa'),
(285, 405, 6, 6, 'Secondaria', 'Integrativa'),
(286, 407, 6, 10, 'Secondaria', 'Integrativa'),
(287, 411, 12, 0, 'Secondaria', 'Integrativa'),
(288, 412, 12, 0, 'Secondaria', 'Integrativa'),
(289, 413, 12, 6, 'Secondaria', 'Integrativa'),
(290, 415, 12, 0, 'Secondaria', 'Integrativa'),
(291, 416, 12, 0, 'Secondaria', 'Integrativa'),
(292, 417, 1, 6, 'Fondamentale', 'Base'),
(293, 418, 13, 6, 'Fondamentale', 'Base'),
(294, 419, 1, 10, 'Fondamentale', 'Base'),
(295, 420, 13, 6, 'Fondamentale', 'Base'),
(296, 421, 1, 8, 'Fondamentale', 'Base'),
(297, 422, 13, 6, 'Fondamentale', 'Base'),
(298, 423, 13, 6, 'Secondaria', 'Integrativa'),
(299, 424, 1, 6, 'Secondaria', 'Integrativa'),
(300, 425, 1, 6, 'Secondaria', 'Integrativa'),
(301, 426, 1, 6, 'Fondamentale', 'Base'),
(302, 427, 13, 6, 'Fondamentale', 'Base'),
(303, 428, 13, 6, 'Fondamentale', 'Base'),
(304, 429, 13, 10, 'Fondamentale', 'Base'),
(305, 430, 13, 6, 'Fondamentale', 'Base'),
(306, 431, 13, 6, 'Fondamentale', 'Base'),
(307, 432, 13, 6, 'Secondaria', 'Integrativa'),
(308, 433, 13, 4, 'Secondaria', 'Integrativa'),
(309, 434, 13, 10, 'Secondaria', 'Integrativa'),
(310, 435, 8, 6, 'Fondamentale', 'Base'),
(311, 436, 8, 6, 'Fondamentale', 'Base'),
(312, 437, 8, 9, 'Fondamentale', 'Base'),
(313, 438, 8, 9, 'Fondamentale', 'Base'),
(314, 439, 8, 6, 'Fondamentale', 'Base'),
(315, 440, 8, 9, 'Fondamentale', 'Base'),
(316, 441, 8, 6, 'Fondamentale', 'Base'),
(317, 442, 8, 6, 'Fondamentale', 'Base'),
(318, 443, 8, 6, 'Fondamentale', 'Base'),
(319, 444, 8, 6, 'Fondamentale', 'Base'),
(320, 445, 8, 6, 'Fondamentale', 'Base'),
(321, 446, 8, 6, 'Fondamentale', 'Base'),
(322, 447, 1, 6, 'Fondamentale', 'Base'),
(323, 448, 8, 8, 'Fondamentale', 'Base'),
(324, 449, 8, 6, 'Fondamentale', 'Base'),
(325, 450, 8, 6, 'Secondaria', 'Integrativa'),
(326, 451, 8, 6, 'Secondaria', 'Integrativa'),
(327, 452, 8, 4, 'Secondaria', 'Integrativa'),
(328, 453, 8, 12, 'Secondaria', 'Integrativa'),
(329, 454, 15, 6, 'Fondamentale', 'Base'),
(330, 455, 16, 9, 'Fondamentale', 'Base'),
(331, 456, 16, 6, 'Fondamentale', 'Base'),
(332, 457, 16, 9, 'Fondamentale', 'Base'),
(333, 458, 16, 9, 'Fondamentale', 'Base'),
(334, 459, 16, 6, 'Fondamentale', 'Base'),
(335, 460, 16, 8, 'Secondaria', 'Integrativa'),
(336, 461, 16, 6, 'Secondaria', 'Integrativa'),
(337, 462, 16, 6, 'Secondaria', 'Integrativa'),
(338, 463, 1, 6, 'Fondamentale', 'Base'),
(339, 464, 16, 8, 'Fondamentale', 'Base'),
(340, 465, 15, 6, 'Fondamentale', 'Base'),
(341, 466, 15, 10, 'Fondamentale', 'Base'),
(342, 467, 15, 8, 'Fondamentale', 'Base'),
(343, 468, 17, 6, 'Fondamentale', 'Base'),
(344, 469, 17, 6, 'Fondamentale', 'Base'),
(345, 470, 16, 6, 'Fondamentale', 'Base'),
(346, 471, 17, 6, 'Fondamentale', 'Base'),
(347, 472, 17, 6, 'Fondamentale', 'Base'),
(348, 473, 17, 6, 'Fondamentale', 'Base'),
(349, 474, 16, 9, 'Fondamentale', 'Base'),
(350, 475, 17, 6, 'Fondamentale', 'Base'),
(351, 476, 17, 6, 'Fondamentale', 'Base'),
(352, 477, 17, 6, 'Secondaria', 'Integrativa'),
(353, 478, 16, 9, 'Fondamentale', 'Base'),
(354, 479, 15, 6, 'Secondaria', 'Integrativa'),
(355, 480, 17, 6, 'Secondaria', 'Integrativa'),
(356, 481, 15, 6, 'Secondaria', 'Integrativa'),
(357, 482, 16, 6, 'Secondaria', 'Integrativa'),
(358, 483, 17, 6, 'Secondaria', 'Integrativa'),
(359, 484, 15, 6, 'Secondaria', 'Integrativa'),
(360, 485, 17, 6, 'Fondamentale', 'Base'),
(361, 486, 15, 6, 'Secondaria', 'Integrativa'),
(362, 487, 17, 6, 'Fondamentale', 'Base'),
(363, 488, 16, 6, 'Secondaria', 'Integrativa'),
(364, 489, 17, 6, 'Fondamentale', 'Base'),
(365, 490, 17, 6, 'Fondamentale', 'Base'),
(366, 491, 16, 4, 'Secondaria', 'Integrativa'),
(367, 492, 17, 6, 'Fondamentale', 'Base'),
(368, 493, 17, 6, 'Fondamentale', 'Base'),
(369, 494, 15, 6, 'Fondamentale', 'Base'),
(370, 495, 16, 12, 'Secondaria', 'Integrativa'),
(371, 496, 15, 6, 'Fondamentale', 'Base'),
(372, 497, 17, 6, 'Secondaria', 'Integrativa'),
(373, 498, 15, 12, 'Fondamentale', 'Base'),
(374, 499, 17, 6, 'Secondaria', 'Integrativa'),
(375, 500, 15, 8, 'Fondamentale', 'Base'),
(376, 501, 17, 6, 'Secondaria', 'Integrativa'),
(377, 502, 17, 12, 'Secondaria', 'Integrativa'),
(378, 503, 15, 6, 'Secondaria', 'Integrativa'),
(379, 504, 15, 6, 'Secondaria', 'Integrativa'),
(380, 505, 15, 6, 'Secondaria', 'Integrativa'),
(381, 506, 15, 6, 'Secondaria', 'Integrativa'),
(382, 507, 15, 10, 'Secondaria', 'Integrativa');

-- --------------------------------------------------------

--
-- Struttura della tabella `materie_studenti`
--

CREATE TABLE IF NOT EXISTS `materie_studenti` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_studente` int(11) NOT NULL,
  `Id_materia` int(11) NOT NULL,
  `Convalida` varchar(15) DEFAULT NULL,
  `Data` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `materie_studenti`
--

INSERT INTO `materie_studenti` (`Id`, `Id_studente`, `Id_materia`, `Convalida`, `Data`) VALUES
(1, 1, 1, NULL, '2015-11-11'),
(2, 2, 2, NULL, '2015-11-08');

-- --------------------------------------------------------

--
-- Struttura della tabella `settore`
--

CREATE TABLE IF NOT EXISTS `settore` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Codice` varchar(8) NOT NULL,
  `Settore` varchar(80) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `settore`
--

INSERT INTO `settore` (`Id`, `Codice`, `Settore`) VALUES
(1, 'ABAV1', 'Anatomia artistica'),
(2, 'ABAV2', 'Tecniche dell''Incisione - Grafica d''Arte'),
(3, 'ABAV3', 'Disegno'),
(4, 'ABAV4', 'Tecniche grafiche speciali'),
(5, 'ABAV5', 'Pittura'),
(6, 'ABAV6', 'Tecniche per la pittura'),
(7, 'ABAV7', 'Scultura'),
(8, 'ABAV8', 'Tecniche per la scultura'),
(9, 'ABAV9', 'Tecniche del marmo e pietre dure'),
(10, 'ABAV10', 'Tecniche di fonderia'),
(11, 'ABAV11', 'Decorazione'),
(12, 'ABAV12', 'Tecniche per la decorazione'),
(13, 'ABAV13', 'Plastica ornamentale'),
(14, 'ABPR14', 'Elementi di architettura e urbanistica'),
(15, 'ABPR15', 'Metodologia della progettazione'),
(16, 'ABPR16', 'Disegno per la progettazione'),
(17, 'ABPR17', 'Design'),
(18, 'ABPR18', 'Land design'),
(19, 'ABPR19', 'Graphic design'),
(20, 'ABPR20', 'Arte del fumetto'),
(21, 'ABPR21', 'Modellistica'),
(22, 'ABPR22', 'Scenografia'),
(23, 'ABPR23', 'Scenotecnica'),
(24, 'ABPR24', 'Restauro per la pittura'),
(25, 'ABPR25', 'Restauro per la scultura'),
(26, 'ABPR26', 'Restauro per la decorazione'),
(27, 'ABPR27', 'Restauro dei materiali cartacei'),
(28, 'ABPR28', 'Restauro dei supporti audiovisivi'),
(29, 'ABPR29', 'Chimica e fisica per il restauro'),
(30, 'ABPR30', 'Tecnologia dei materiali'),
(31, 'ABPR31', 'Fotografia'),
(32, 'ABPR32', 'Costume per lo spettacolo'),
(33, 'ABPR33', 'Tecniche applicate per la produzione teatrale'),
(34, 'ABPR34', 'Fashion design'),
(35, 'ABPR35', 'Regia'),
(36, 'ABPR36', 'Tecniche performative per le arti visive'),
(37, 'ABTEC37', 'Metodologia progettuale della comunicazione visiva'),
(38, 'ABTEC38', 'Applicazioni digitali per le arti visive'),
(39, 'ABTEC39', 'Tecnologie per l’informatica'),
(40, 'ABTEC40', 'Progettazione multimediale'),
(41, 'ABTEC41', 'Tecniche della modellazione digitale'),
(42, 'ABTEC42', 'Sistemi interattivi'),
(43, 'ABTEC43', 'Linguaggi e tecniche dell’audiovisivo'),
(44, 'ABTEC44', 'Sound design'),
(45, 'ABST45', 'Teorie delle arti multimediali'),
(46, 'ABST46', 'Estetica'),
(47, 'ABST47', 'Stile, Storia dell’arte e del costume'),
(48, 'ABST48', 'Storia delle arti applicate'),
(49, 'ABST49', 'Teoria e storia del restauro'),
(50, 'ABST50', 'Storia dell’architettura'),
(51, 'ABST51', 'Fenomenologia delle arti contemporanee'),
(52, 'ABST52', 'Storia e metodologia della critica d’arte'),
(53, 'ABST53', 'Storia dello spettacolo'),
(54, 'ABST54', 'Storia della musica'),
(55, 'ABST55', 'Antropologia culturale'),
(56, 'ABST56', 'Discipline sociologiche'),
(57, 'ABST57', 'Fenomenologie del sacro'),
(58, 'ABST58', 'Teoria della percezione e psicologia della forma'),
(59, 'ABST59', 'Pedagogia e didattica dell''arte'),
(60, 'ABST60', 'Metodi e tecniche dell''arte-terapia'),
(61, 'ABVPA61', 'Beni culturali e ambientali'),
(62, 'ABVPA62', 'Teorie e pratiche della valorizzazione dei beni culturali'),
(63, 'ABVPA63', 'Museologia'),
(64, 'ABVPA64', 'Museografia e progettazione di sistemi espositivi'),
(65, 'ABPC65', 'Teoria e metodo dei mass media'),
(66, 'ABPC66', 'Storia dei nuovi media'),
(67, 'ABPC67', 'Metodologie e tecniche della comunicazione'),
(68, 'ABPC68', 'Analisi dei processi comunicativi'),
(69, 'ABLE69', 'Marketing e management'),
(70, 'ABLE70', 'Legislazione ed economia delle arti e dello spettacolo'),
(71, 'ABLIN71', 'Lingue');

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE IF NOT EXISTS `studenti` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_anagrafe` int(11) NOT NULL,
  `Anno_accademico` varchar(10) NOT NULL,
  `Matricola` int(10) DEFAULT NULL,
  `Diploma` varchar(40) NOT NULL,
  `Id_dipartimento` int(11) NOT NULL COMMENT 'DA CANCELLARE (FORSE)',
  `Id_corso` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`Id`, `Id_anagrafe`, `Anno_accademico`, `Matricola`, `Diploma`, `Id_dipartimento`, `Id_corso`) VALUES
(1, 1, '0', 1, 'la cacca', 1, 3),
(2, 2, '1', 0, '', 1, 10),
(5, 11, '', 0, '', 0, 0),
(6, 12, '', 0, '', 0, 0),
(7, 13, '', 0, '', 0, 0),
(8, 14, '', 0, '', 0, 0),
(9, 15, '', 0, '', 0, 0),
(10, 16, '', 0, '', 0, 0),
(11, 17, '', 0, '', 0, 0),
(12, 18, '', 0, '', 0, 0),
(13, 19, '', 0, '', 0, 0),
(14, 20, '', 0, '', 0, 0),
(15, 21, '', 0, '', 0, 0),
(16, 22, '', 0, '', 0, 0),
(17, 23, '', 0, '', 0, 0),
(18, 24, '', 0, '', 0, 0),
(19, 25, '', 0, '', 0, 0),
(20, 26, '', 0, '', 0, 0),
(21, 27, '', 0, '', 0, 0),
(22, 28, '', 0, '', 0, 0),
(23, 29, '', 0, '', 0, 0),
(24, 30, '', 0, '', 0, 0),
(25, 31, '', 0, '', 0, 0),
(26, 32, '', 0, '', 0, 0),
(27, 33, '', 0, '', 0, 0),
(28, 34, '', 0, '', 0, 0),
(29, 35, '', 0, '', 0, 0),
(30, 36, '', 0, '', 0, 0),
(31, 37, '', 0, '', 0, 0),
(32, 38, '', 0, '', 0, 0),
(33, 39, '', 0, '', 0, 0),
(34, 40, '', 0, '', 0, 0),
(35, 41, '', 0, '', 0, 0),
(36, 42, '', 0, '', 0, 0),
(37, 43, '', 0, '', 0, 0),
(38, 44, '', 0, '', 0, 0),
(39, 45, '', 0, '', 0, 0),
(40, 46, '', 0, '', 0, 0),
(41, 47, '', 0, '', 0, 0),
(42, 48, '', 0, '', 0, 0),
(43, 49, '', 0, '', 0, 0),
(44, 50, '', 0, '', 0, 0),
(45, 51, '', 0, '', 0, 0),
(46, 52, '', 0, '', 0, 0),
(47, 53, '', 0, '', 0, 0),
(48, 54, '', 0, '', 0, 0),
(49, 55, '', 0, '', 0, 0),
(50, 56, '', 0, '', 0, 0),
(51, 57, '', 0, '', 0, 0),
(52, 58, '', 0, '', 0, 0),
(53, 59, '', 0, '', 0, 0),
(54, 60, '', 0, '', 0, 0),
(55, 61, '', 0, '', 0, 0),
(56, 62, '', 0, '', 0, 0),
(57, 63, '', 0, '', 0, 0),
(58, 64, '', 0, '', 0, 0),
(59, 65, '', 0, '', 0, 0),
(60, 66, '', 0, '', 0, 0),
(61, 67, '', 0, '', 0, 0),
(62, 68, '', 0, '', 0, 0),
(63, 69, '', 0, '', 0, 0),
(64, 70, '', NULL, '', 0, 0),
(65, 71, '', 0, '', 0, 0),
(66, 72, '', 0, '', 0, 0),
(67, 73, '', 0, '', 0, 0),
(68, 74, '', 0, '', 0, 0),
(69, 75, '', 0, '', 0, 0),
(70, 76, '', 0, '', 0, 0),
(71, 77, '', 0, '', 0, 0),
(72, 78, '', 0, '', 0, 0),
(73, 79, '', 0, '', 0, 0),
(74, 80, '', 0, '', 0, 0),
(75, 81, '', 0, '', 0, 0),
(76, 82, '', 0, '', 0, 0),
(77, 83, '', 0, '', 0, 0),
(78, 84, '', 0, '', 0, 0),
(79, 85, '', 0, '', 0, 0),
(83, 95, '1', 114455, 'PILOMA', 0, 1),
(84, 96, '1', 0, 'afsdcsds', 0, 1),
(85, 99, '0', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti_documenti_caricati`
--

CREATE TABLE IF NOT EXISTS `studenti_documenti_caricati` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_studente` int(11) NOT NULL,
  `Percorso_file` varchar(50) NOT NULL,
  `Nome_file` varchar(50) NOT NULL,
  `Data_caricamento` date NOT NULL,
  `Tipo` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dump dei dati per la tabella `studenti_documenti_caricati`
--

INSERT INTO `studenti_documenti_caricati` (`Id`, `Id_studente`, `Percorso_file`, `Nome_file`, `Data_caricamento`, `Tipo`) VALUES
(16, 2, './caricamenti/studenti/2Fabrizio/', 'hdd.png', '2015-11-09', 1),
(21, 2, './caricamenti/studenti/2Fabrizio/', 'dbgestionale (3).sql', '2015-11-12', 1),
(22, 2, './caricamenti/studenti/2Fabrizio/', 'hard_disk_256.png', '2015-11-12', 3),
(23, 2, './caricamenti/studenti/2Fabrizio/', 'hard_disk_256.png', '2015-11-12', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti_richieste`
--

CREATE TABLE IF NOT EXISTS `studenti_richieste` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_anagrafe` int(11) NOT NULL,
  `Stato_richiesta` varchar(15) NOT NULL COMMENT 'Non letto; Confermato',
  `Data_invio` datetime NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Testo` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dump dei dati per la tabella `studenti_richieste`
--

INSERT INTO `studenti_richieste` (`Id`, `Id_anagrafe`, `Stato_richiesta`, `Data_invio`, `Tipo`, `Testo`) VALUES
(4, 2, 'Confermato', '2015-11-10 00:00:00', 1, ''),
(5, 2, 'Confermato', '2015-11-10 00:00:00', 1, ''),
(6, 3, 'Confermato', '2015-11-10 00:00:00', 1, ''),
(7, 2, 'Confermato', '2015-11-11 00:00:00', 1, ''),
(8, 2, 'Confermato', '2015-11-12 00:00:00', 1, ''),
(9, 2, 'Confermato', '2015-11-12 00:00:00', 1, ''),
(10, 2, 'Confermato', '2015-11-12 00:00:00', 3, ''),
(11, 2, 'Confermato', '2015-11-12 00:00:00', 2, ''),
(12, 2, 'Confermato', '2015-11-12 00:00:00', 4, 'Cambiare matematica in fisica'),
(13, 2, 'Confermato', '2015-11-12 00:00:00', 2, ''),
(14, 2, 'Confermato', '2015-11-12 00:00:00', 3, ''),
(15, 2, 'Confermato', '2015-11-12 00:00:00', 1, ''),
(16, 2, 'Confermato', '2015-11-12 16:51:06', 1, ''),
(17, 2, 'Confermato', '2015-11-12 16:51:56', 4, 'sdvsdvdfsbs');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_documenti_caricati`
--

CREATE TABLE IF NOT EXISTS `tipo_documenti_caricati` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_file` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `tipo_documenti_caricati`
--

INSERT INTO `tipo_documenti_caricati` (`Id`, `Tipo_file`) VALUES
(1, 'Bollettino'),
(2, 'Bonifico'),
(3, 'Foto');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_richieste`
--

CREATE TABLE IF NOT EXISTS `tipo_richieste` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `tipo_richieste`
--

INSERT INTO `tipo_richieste` (`Id`, `Tipo`) VALUES
(1, 'Certificato di frequenza'),
(2, 'Certificato di iscrizione'),
(3, 'Certificato per materie sostenute'),
(4, 'Modifica piano di studi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
