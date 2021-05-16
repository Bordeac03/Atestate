-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 15, 2021 la 11:40 PM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `cabinet`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `consultatii`
--

CREATE TABLE `consultatii` (
  `tip` varchar(100) NOT NULL,
  `specializare` varchar(30) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `consultatii`
--

INSERT INTO `consultatii` (`tip`, `specializare`, `ID`) VALUES
('Examinare clinica generala', 'general', 1),
('Consultatii de monitorizare activa', 'general', 2),
('Consultatii preventive', 'general', 3),
('Monitorizare a evolutiei sarcinii si lauziei', 'ginecolog', 4),
('Luarea in evidenta in primul trimestru', 'ginecolog', 5),
('Supravegherea lunara intre lunile 3-7', 'ginecolog', 6),
('Urmarirea lehuzei la externarea din maternitate', 'ginecolog', 7),
('Consulatie ortopedica', 'ortoped', 8),
('Control ortopedic', 'ortoped', 9),
('Consulatie cardiologie', 'cardiolog', 10),
('Test EKG', 'cardiolog', 11),
('Ecocardiografie', 'cardiolog', 12),
('Doppler artere carotide', 'cardiolog', 13),
('Ecografie pelvina', 'urolog', 14),
('Examenul fizic', 'urolog', 15),
('Trombectomie externa', 'proctolog', 16),
('Tratament hemoroizi de la gradul 1 la 4', 'proctolog', 17),
('Chiuretaj gingival', 'stomatolog', 18),
('Consultatie', 'stomatolog', 19),
('Endodontie', 'stomatolog', 20),
('Chirurgie dentara', 'stomatolog', 21),
('Consultatie', 'nutritionist', 22),
('Consult imagistica', 'pneumolog', 23),
('Interpretare analize', 'pneumolog', 24),
('Determinare dioptrii', 'oftalmolog', 25),
('Control oftalmologic', 'oftalmolog', 26),
('Consult', 'orlist', 27),
('Examinare videoendoscopica', 'orlist', 28),
('Consult psihiatric', 'psihiatru', 29);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `doctor`
--

CREATE TABLE `doctor` (
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `cnp` varchar(13) NOT NULL,
  `data_n` date NOT NULL,
  `specializare` varchar(30) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `doctor`
--

INSERT INTO `doctor` (`nume`, `prenume`, `cnp`, `data_n`, `specializare`, `ID`) VALUES
('Bordea', 'Cosmin', '5030212219701', '2003-02-12', 'cardiolog', 1),
('Ionescu', 'Dan', '5020614219066', '2002-06-14', 'pneumolog', 2),
('Bordea', 'Cosmin', '5030212219701', '2003-02-12', 'ortoped', 3),
('Ionescu', 'Dan', '5020614219066', '2002-06-14', 'oftalmolog', 4),
('Bordea', 'Cosmin', '5030212219701', '2003-02-12', 'urolog', 5),
('Ionescu', 'Dan', '5020614219066', '2002-06-14', 'orelist', 6),
('Bordea', 'Cosmin', '5030212219701', '2003-02-12', 'stomatolog', 7),
('Ionescu', 'Dan', '5020614219066', '2002-06-14', 'psihiatru', 8),
('Bordea', 'Cosmin', '5030212219701', '2003-02-12', 'ginecolog', 9),
('Ionescu', 'Dan', '5020614219066', '2002-06-14', 'ginecolog', 10),
('Bordea', 'Cosmin', '5030212219701', '2003-02-12', 'nutritionist', 11),
('Ionescu', 'Dan', '5020614219066', '2002-06-14', 'proctolog', 13),
('Bordea', 'Cosmin', '5030212219701', '2003-02-12', 'general', 14);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pacient`
--

CREATE TABLE `pacient` (
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `cnp` varchar(13) NOT NULL,
  `istoric` varchar(100) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `pacient`
--

INSERT INTO `pacient` (`nume`, `prenume`, `cnp`, `istoric`, `ID`) VALUES
('Bordea', 'Cosmin', '1234567890123', NULL, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `programari`
--

CREATE TABLE `programari` (
  `ID_Pacient` int(11) NOT NULL,
  `ID_Doctor` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `ID_Consultatie` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `consultatii`
--
ALTER TABLE `consultatii`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `pacient`
--
ALTER TABLE `pacient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `programari`
--
ALTER TABLE `programari`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Pacient` (`ID_Pacient`),
  ADD KEY `ID_Doctor` (`ID_Doctor`),
  ADD KEY `ID_Consultatie` (`ID_Consultatie`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `consultatii`
--
ALTER TABLE `consultatii`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pentru tabele `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `pacient`
--
ALTER TABLE `pacient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pentru tabele `programari`
--
ALTER TABLE `programari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `programari`
--
ALTER TABLE `programari`
  ADD CONSTRAINT `programari_ibfk_1` FOREIGN KEY (`ID_Pacient`) REFERENCES `pacient` (`ID`),
  ADD CONSTRAINT `programari_ibfk_2` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctor` (`ID`),
  ADD CONSTRAINT `programari_ibfk_3` FOREIGN KEY (`ID_Consultatie`) REFERENCES `consultatii` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
