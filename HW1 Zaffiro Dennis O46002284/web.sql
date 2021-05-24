-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2021 alle 21:19
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquisto`
--

CREATE TABLE `acquisto` (
  `tipologia` varchar(1024) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `prodotto` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `acquisto`
--

INSERT INTO `acquisto` (`tipologia`, `cliente`, `prodotto`, `quantità`) VALUES
('dg.png', 'ayrtonsenna', 154, 2),
('un.png', 'ayrtonsenna', 285, 1),
('pro.png', 'ayrtonsenna', 497, 4),
('pro.png', 'dennis', 497, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ak`
--

CREATE TABLE `ak` (
  `matricola` int(11) NOT NULL,
  `città` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ak`
--

INSERT INTO `ak` (`matricola`, `città`, `telefono`) VALUES
(1, 'siracusa', 115367247),
(2, 'catania', 2147483647),
(3, 'gela', 236724743);

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `cf` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`cf`, `telefono`) VALUES
('ayrtonsenna', '$2y$10$x3oSIKIvmYf8tG26Pq9NaeuCHVhHJorlTwmkpBR4.5lVvZSee0uZe');

-- --------------------------------------------------------

--
-- Struttura della tabella `commesso`
--

CREATE TABLE `commesso` (
  `cf` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ind` varchar(255) NOT NULL,
  `piano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `commesso`
--

INSERT INTO `commesso` (`cf`, `password`, `ind`, `piano`) VALUES
('Worker1', '0001', 'corso verdi', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `newsletter`
--

CREATE TABLE `newsletter` (
  `mail` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `newsletter`
--

INSERT INTO `newsletter` (`mail`, `nome`) VALUES
('carla@virgilio.it', 'Carlotta'),
('email1@libero.it', 'Mario'),
('email2@gmail.it', 'Sebastiano');

-- --------------------------------------------------------

--
-- Struttura della tabella `pezzo`
--

CREATE TABLE `pezzo` (
  `codice` int(11) NOT NULL,
  `anno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `pezzo`
--

INSERT INTO `pezzo` (`codice`, `anno`) VALUES
(111, 11111),
(222, 2019),
(333, 2020),
(444, 2018),
(12345, 2019);

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiti`
--

CREATE TABLE `preferiti` (
  `cf` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`cf`, `id`) VALUES
('ayrtonsenna', 222),
('ayrtonsenna', 333);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `componente` varchar(255) NOT NULL,
  `cod` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `immagine` varchar(1024) DEFAULT NULL,
  `descrizione` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`componente`, `cod`, `costo`, `immagine`, `descrizione`) VALUES
('Cuffie Logitech', 333, 50, 'https://images-na.ssl-images-amazon.com/images/I/61MZw1pfltL._AC_SL1382_.jpg', 'Meraviglioso Headset gaming Dolby Surround 7.1'),
('Mouse Corsair M65', 222, 45, 'https://www.corsair.com/medias/sys_master/images/images/h11/h09/9110647701534/-CH-9300111-EU-Gallery-M65-PRO-RGB-WHT-01.png', 'Mouse Gaming Incredibile'),
('OutRiders -PS4', 444, 79, 'https://images-na.ssl-images-amazon.com/images/I/81pDxkZxFSL._AC_SL1500_.jpg', 'Nuovo capolavoro targato \'People Can Fly\'!!!'),
('scheda video asus', 111, 400, 'https://images-na.ssl-images-amazon.com/images/I/71GODu4sFjL._AC_SX466_.jpg', 'Nuovo hardware top di gamma!!!');

-- --------------------------------------------------------

--
-- Struttura della tabella `sede`
--

CREATE TABLE `sede` (
  `indirizzo` varchar(255) NOT NULL,
  `piano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sede`
--

INSERT INTO `sede` (`indirizzo`, `piano`) VALUES
('corso verdi', 3),
('piazza roma', 1),
('via milano', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `ubicazione`
--

CREATE TABLE `ubicazione` (
  `città` varchar(255) NOT NULL,
  `matricola` int(11) NOT NULL,
  `data_i` date NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `piano` int(11) NOT NULL,
  `data_f` date DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ubicazione`
--

INSERT INTO `ubicazione` (`città`, `matricola`, `data_i`, `indirizzo`, `piano`, `data_f`, `tipo`) VALUES
('catania', 2, '0000-00-00', 'piazza roma', 1, '0000-00-00', 0),
('gela', 3, '0000-00-00', 'via milano', 4, '0000-00-00', 0),
('siracusa', 1, '0000-00-00', 'corso verdi', 3, '0000-00-00', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ak`
--
ALTER TABLE `ak`
  ADD PRIMARY KEY (`matricola`,`città`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cf`);

--
-- Indici per le tabelle `commesso`
--
ALTER TABLE `commesso`
  ADD PRIMARY KEY (`cf`),
  ADD KEY `i` (`ind`),
  ADD KEY `p` (`piano`),
  ADD KEY `ind` (`ind`,`piano`);

--
-- Indici per le tabelle `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`mail`);

--
-- Indici per le tabelle `pezzo`
--
ALTER TABLE `pezzo`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `preferiti`
--
ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`cf`,`id`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`componente`,`cod`),
  ADD KEY `cod` (`cod`);

--
-- Indici per le tabelle `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`indirizzo`,`piano`);

--
-- Indici per le tabelle `ubicazione`
--
ALTER TABLE `ubicazione`
  ADD PRIMARY KEY (`città`,`matricola`,`data_i`,`indirizzo`,`piano`),
  ADD KEY `c` (`città`),
  ADD KEY `m` (`matricola`),
  ADD KEY `i` (`indirizzo`),
  ADD KEY `p` (`piano`),
  ADD KEY `matricola` (`matricola`,`città`),
  ADD KEY `indirizzo` (`indirizzo`,`piano`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commesso`
--
ALTER TABLE `commesso`
  ADD CONSTRAINT `commesso_ibfk_1` FOREIGN KEY (`ind`,`piano`) REFERENCES `sede` (`indirizzo`, `piano`);

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`cod`) REFERENCES `pezzo` (`codice`);

--
-- Limiti per la tabella `ubicazione`
--
ALTER TABLE `ubicazione`
  ADD CONSTRAINT `ubicazione_ibfk_1` FOREIGN KEY (`matricola`,`città`) REFERENCES `ak` (`matricola`, `città`),
  ADD CONSTRAINT `ubicazione_ibfk_2` FOREIGN KEY (`indirizzo`,`piano`) REFERENCES `sede` (`indirizzo`, `piano`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
