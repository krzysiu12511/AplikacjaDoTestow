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
-- Struktura tabeli dla tabeli `grupy`
--

CREATE TABLE `grupy` (
  `ID` int(11) NOT NULL,
  `Nazwa` varchar(20) NOT NULL,
  `id_users` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `grupy`
--

INSERT INTO `grupy` (`ID`, `Nazwa`, `id_users`) VALUES
(13, 'Klasa B', 1),
(14, 'Klasa C', 1),
(15, 'grupÄ™ d', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `ID` int(6) NOT NULL,
  `Nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`ID`, `Nazwa`) VALUES
(3, 'Informatyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ocena`
--

CREATE TABLE `ocena` (
  `ID` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_testu` int(6) NOT NULL,
  `ilosc_pytan` int(1) NOT NULL,
  `punkty` int(1) NOT NULL,
  `wynik` int(1) NOT NULL,
  `ocena` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `ocena`
--

INSERT INTO `ocena` (`ID`, `id_user`, `id_testu`, `ilosc_pytan`, `punkty`, `wynik`, `ocena`) VALUES
(1, 3, 1, 2, 2, 100, 5),
(2, 3, 3, 4, 4, 100, 5),
(3, 3, 4, 4, 3, 75, 4),
(4, 3, 5, 4, 1, 25, 2),
(5, 4, 6, 4, 1, 25, 2),
(6, 4, 7, 4, 0, 0, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `ID` int(6) NOT NULL,
  `id_pytania` int(6) NOT NULL,
  `poprawna` bit(1) NOT NULL,
  `odpowiedz` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`ID`, `id_pytania`, `poprawna`, `odpowiedz`) VALUES
(50, 26, b'1', '1'),
(51, 26, b'0', '2'),
(52, 26, b'0', 'C'),
(53, 26, b'0', 'D'),
(54, 27, b'1', 'jÄ™zyk programowania'),
(55, 27, b'0', 'zmienna'),
(56, 27, b'0', 'C'),
(57, 27, b'0', 'D'),
(58, 28, b'0', 'jÄ™zyk programowania'),
(59, 28, b'1', 'jÄ™zyk znacznikÃ³w'),
(60, 28, b'0', 'C'),
(61, 28, b'0', 'D'),
(62, 29, b'0', '1'),
(63, 29, b'1', '2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `ID` int(6) NOT NULL,
  `id_kategori` int(6) NOT NULL,
  `pytanie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`ID`, `id_kategori`, `pytanie`) VALUES
(26, 3, 'Co to router'),
(27, 3, 'Co oznacza \"C++\"'),
(28, 3, 'Co oznacza \"HTML\"'),
(29, 3, 'elo');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytanie_w_tescie`
--

CREATE TABLE `pytanie_w_tescie` (
  `ID` int(6) NOT NULL,
  `id_testu` int(6) NOT NULL,
  `id_pytania` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pytanie_w_tescie`
--

INSERT INTO `pytanie_w_tescie` (`ID`, `id_testu`, `id_pytania`) VALUES
(1, 1, 26),
(2, 1, 27),
(6, 3, 29),
(7, 3, 28),
(8, 3, 26),
(9, 3, 27),
(10, 4, 28),
(11, 4, 27),
(12, 4, 26),
(13, 4, 29),
(14, 5, 28),
(15, 5, 27),
(16, 5, 29),
(17, 5, 26),
(18, 6, 29),
(19, 6, 26),
(20, 6, 28),
(21, 6, 27),
(22, 7, 26),
(23, 7, 29),
(24, 7, 27),
(25, 7, 28),
(26, 0, 27),
(27, 0, 26),
(28, 0, 29),
(29, 0, 26),
(30, 9, 27),
(31, 9, 26);

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
(9, 'Test z Informatyki cz.1 poprawa', 3, 0, 5, 2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen_w_grupie`
--

CREATE TABLE `uczen_w_grupie` (
  `ID` int(6) NOT NULL,
  `id_grupy` int(6) NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uczen_w_grupie`
--

INSERT INTO `uczen_w_grupie` (`ID`, `id_grupy`, `id_user`) VALUES
(13, 13, 3),
(14, 14, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(6) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `haslo` varchar(30) NOT NULL,
  `nauczyciel` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `Imie`, `Nazwisko`, `email`, `haslo`, `nauczyciel`) VALUES
(1, 'Krzysiu', 'Juszczak', 'admin@admin.pl', 'admin', b'1'),
(3, 'Adam', 'Krakowski', 'adam@adam.pl', 'adam', b'0'),
(4, 'Karol', 'Kaleta', 'karol@kaleta.pl', 'karol', b'0');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `grupy`
--
ALTER TABLE `grupy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `pytanie_w_tescie`
--
ALTER TABLE `pytanie_w_tescie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `testy`
--
ALTER TABLE `testy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `uczen_w_grupie`
--
ALTER TABLE `uczen_w_grupie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `grupy`
--
ALTER TABLE `grupy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `ocena`
--
ALTER TABLE `ocena`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `pytanie_w_tescie`
--
ALTER TABLE `pytanie_w_tescie`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT dla tabeli `testy`
--
ALTER TABLE `testy`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `uczen_w_grupie`
--
ALTER TABLE `uczen_w_grupie`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
