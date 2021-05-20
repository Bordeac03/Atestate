-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 16, 2021 la 07:54 PM
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
-- Bază de date: `secretariat`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `adeverinta`
--

CREATE TABLE `adeverinta` (
  `ID` int(11) NOT NULL,
  `data` date NOT NULL,
  `ID_student` int(11) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `adeverinta`
--

INSERT INTO `adeverinta` (`ID`, `data`, `ID_student`, `link`) VALUES
(3, '2021-04-23', 2, '/adeverinte/MODEL.pdf'),
(4, '2021-04-15', 2, '/adeverinte/MODEL.pdf');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `elev`
--

CREATE TABLE `elev` (
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(40) NOT NULL,
  `cnp` varchar(13) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `elev`
--

INSERT INTO `elev` (`nume`, `prenume`, `cnp`, `ID`) VALUES
('testa', 'test', '1234567890124', 2);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `adeverinta`
--
ALTER TABLE `adeverinta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `elev`
--
ALTER TABLE `elev`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `adeverinta`
--
ALTER TABLE `adeverinta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `elev`
--
ALTER TABLE `elev`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
