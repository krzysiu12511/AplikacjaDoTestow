-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Gru 2022, 15:41
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy`
--

CREATE TABLE `testy` (
  `ID` int(6) NOT NULL,
  `Nazwa` varchar(40) NOT NULL,
  `id_kategori` int(6) NOT NULL,
  `id_grupy` int(6) DEFAULT NULL,
  `waga` int(1) NOT NULL,
  `ilosc_pytan` int(6) NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `testy`
--

INSERT INTO `testy` (`ID`, `Nazwa`, `id_kategori`, `id_grupy`, `waga`, `ilosc_pytan`, `id_user`) VALUES
(1, 'Test z Informatyki cz.1', 3, 13, 5, 2, 0),
(3, 'Test z Informatyki cz.2', 3, 13, 3, 4, 0),
(4, 'Test z Informatyki cz.3', 3, 13, 5, 4, 0),
(5, 'Test z Informatyki cz.4', 3, 13, 5, 4, 0),
(6, 'Test cz.1', 3, 14, 5, 4, 0),
(7, 'Test cz.2', 3, 14, 5, 4, 0),
(9, 'Test z Informatyki cz.1 poprawa', 3, NULL, 5, 2, 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `testy`
--
ALTER TABLE `testy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `testy`
--
ALTER TABLE `testy`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
