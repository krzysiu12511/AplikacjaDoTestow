-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lut 2023, 18:41
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `grupy`
--

INSERT INTO `grupy` (`ID`, `Nazwa`, `id_users`) VALUES
(16, 'Klasa A', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `ID` int(6) NOT NULL,
  `Nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `ocena`
--

INSERT INTO `ocena` (`ID`, `id_user`, `id_testu`, `ilosc_pytan`, `punkty`, `wynik`, `ocena`) VALUES
(10, 5, 15, 10, 0, 0, 0),
(11, 5, 16, 5, 5, 100, 5),
(12, 5, 17, 7, 7, 100, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `ID` int(6) NOT NULL,
  `id_pytania` int(6) NOT NULL,
  `poprawna` bit(1) NOT NULL,
  `odpowiedz` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`ID`, `id_pytania`, `poprawna`, `odpowiedz`) VALUES
(73, 33, b'0', 'Przesyłania plików między komputerem a urządzeniem przenośnym'),
(74, 33, b'1', 'Wysyłania poczty e-mail'),
(75, 33, b'0', 'Surfowania w sieci'),
(76, 34, b'0', 'Wide World Web'),
(77, 34, b'0', 'Whole World Web'),
(78, 34, b'1', 'World Wide Web'),
(79, 35, b'1', 'Tak'),
(80, 35, b'0', 'Nie'),
(81, 36, b'0', 'HDD, SSD i Pendrive'),
(82, 36, b'1', 'Klawiaturę, skaner, myszkę'),
(83, 36, b'0', 'Płytę główną, drukarkę, procesor'),
(84, 37, b'0', 'PDF'),
(85, 37, b'0', 'HDD'),
(86, 37, b'1', 'ISO'),
(87, 38, b'1', 'CSS'),
(88, 38, b'0', 'HTML'),
(89, 38, b'0', 'PHP'),
(90, 39, b'0', 'Linux'),
(91, 39, b'0', 'Unix'),
(92, 39, b'1', 'Word'),
(93, 39, b'0', 'MacOS'),
(94, 40, b'0', 'TXT'),
(95, 40, b'1', 'RAW'),
(96, 40, b'0', 'DOC'),
(97, 41, b'0', 'Polskich liter'),
(98, 41, b'0', 'Cyfr'),
(99, 41, b'1', 'Spacji'),
(100, 42, b'0', 'Przenosi na stronę główną'),
(101, 42, b'1', 'Przenosi na górę strony'),
(102, 42, b'0', 'Odświeża pulpit'),
(103, 43, b'0', 'Blokuje wstawianie cyfr w tekście'),
(104, 43, b'0', 'Usypia komputer'),
(105, 43, b'1', 'Włącza klawiaturę numeryczną'),
(106, 44, b'1', 'Przejście do pulpitu'),
(107, 44, b'0', 'Włącza okno ustawień systemu Windows'),
(108, 44, b'0', 'Kopiowanie tekstu'),
(109, 45, b'0', '10 000 MB'),
(110, 45, b'1', '1 TB'),
(111, 45, b'0', '100 GB'),
(112, 46, b'0', 'Sieć globalna'),
(113, 46, b'1', 'Sieć lokalna'),
(114, 46, b'0', 'Sieć LAN'),
(115, 47, b'0', 'Obsługi serwera WWW'),
(116, 47, b'0', 'Skanowania plików'),
(117, 47, b'1', 'Obrony przed hakerami'),
(118, 48, b'0', 'Hiperlink'),
(119, 48, b'1', 'Hiperłącze'),
(120, 48, b'0', 'Hyperłącze'),
(121, 49, b'1', '8 bitów'),
(122, 49, b'0', '12 bitów'),
(123, 49, b'0', '10 bitów');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `ID` int(6) NOT NULL,
  `id_kategori` int(6) NOT NULL,
  `pytanie` varchar(300) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`ID`, `id_kategori`, `pytanie`) VALUES
(33, 3, 'DO CZEGO UŻYWANY JEST PROTOKÓŁ SMTP?'),
(34, 3, 'CZY POTRAFISZ ROZWINĄĆ SKRÓT \"WWW\"?'),
(35, 3, 'CZY E-MAIL WYSŁANY NA ADRES \"JAN.N.O.W.A.K@GMAIL.COM\" DOTRZE DO UŻYTKOWNIKA POCZTY \"JANNOWAK@GMAIL.COM\"'),
(36, 3, 'CO ZALICZAMY DO URZĄDZEŃ PERYFERYJNYCH KOMPUTER'),
(37, 3, 'ROZSZERZENIEM PLIKU WYKORZYSTYWANYM DO ZAPISU OBRAZU PŁYTY CD/DVD JEST'),
(38, 3, 'SKRÓT OD KASKADOWYCH ARKUSZY STYLÓW TO:'),
(39, 3, 'KTÓRY Z PONIŻSZYCH NIE JEST SYSTEMEM OPERACYJNYM?'),
(40, 3, 'W KTÓRYM ROZSZERZENIU ZAPISZESZ OBRAZ?'),
(41, 3, 'CZEGO NIE UŻYWA SIĘ W ADRESACH E-MAIL PO \"@\"?'),
(42, 3, 'CO ROBI KLAWISZ \"HOME\", KTÓRY ZNAJDUJE SIĘ NA KLAWIATURZE PC?'),
(43, 3, 'CO ROBI KLAWISZ \"NUM LOCK\"?'),
(44, 3, 'NA CO POZWALA SKRÓT KLAWIATUROWY WINDOWS+D?'),
(45, 3, 'KTÓRA WARTOŚĆ JEST NAJWIĘKSZA?'),
(46, 3, 'CO TO JEST INTRANET?'),
(47, 3, 'DO CZEGO SŁUŻY FIREWALL?'),
(48, 3, 'SŁOWO \"LINK\" PRZETŁUMACZONE NA JĘZYK POLSKI TO:'),
(49, 3, 'ZWYKLE PRZYJMUJE SIĘ, ŻE JEDEN BAJT TO:');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytanie_w_tescie`
--

CREATE TABLE `pytanie_w_tescie` (
  `ID` int(6) NOT NULL,
  `id_testu` int(6) NOT NULL,
  `id_pytania` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `pytanie_w_tescie`
--

INSERT INTO `pytanie_w_tescie` (`ID`, `id_testu`, `id_pytania`) VALUES
(65, 17, 41),
(66, 17, 37),
(67, 17, 43),
(68, 17, 44),
(69, 17, 38),
(70, 17, 45),
(71, 17, 33);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `testy`
--

INSERT INTO `testy` (`ID`, `Nazwa`, `id_kategori`, `id_grupy`, `waga`, `ilosc_pytan`, `id_user`) VALUES
(17, 'Test z Informatyki cz.1', 3, 16, 5, 7, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen_w_grupie`
--

CREATE TABLE `uczen_w_grupie` (
  `ID` int(6) NOT NULL,
  `id_grupy` int(6) NOT NULL,
  `id_user` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `uczen_w_grupie`
--

INSERT INTO `uczen_w_grupie` (`ID`, `id_grupy`, `id_user`) VALUES
(15, 16, 5),
(16, 16, 6),
(17, 16, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(6) NOT NULL,
  `Imie` varchar(20) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nauczyciel` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `Imie`, `Nazwisko`, `email`, `haslo`, `nauczyciel`) VALUES
(1, 'Krzysiu', 'Juszczak', 'admin@admin.pl', 'admin', b'1'),
(5, 'Kuba', 'Kowalski', 'kuba.kowalski@gmail.com', 'kuba', b'0'),
(6, 'Kacper', 'Piechota', 'kacper.piechota@gmail.com', 'kacper', b'0'),
(7, 'Marek', 'Mariusz', 'marek.mariusz@gmail.com', 'marek', b'0');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `ocena`
--
ALTER TABLE `ocena`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `pytanie_w_tescie`
--
ALTER TABLE `pytanie_w_tescie`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT dla tabeli `testy`
--
ALTER TABLE `testy`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `uczen_w_grupie`
--
ALTER TABLE `uczen_w_grupie`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
