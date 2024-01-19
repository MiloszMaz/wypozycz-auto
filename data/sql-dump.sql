-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 19, 2024 at 04:27 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wypozycz_auto`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `pesel` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `pesel`) VALUES
(1, 'asd', 'asd', '12345678901'),
(2, 'Paweł', 'Nowak', '98761234123'),
(3, 'Paweł', 'Test', '12345678922'),
(4, 'Test', 'test', '98761234423'),
(5, 'Maciek', 'Maciek', '12245678901'),
(6, 'Paweł', 'Test', '12245178901'),
(7, 'Jan', 'Mak', '12312312312'),
(8, 'Michał', 'Kowal', '12345671234'),
(9, 'Łukasz', 'jjjj', '12345678123'),
(10, 'xxx', 'xxxx', '12345678912'),
(11, 'Maciej', 'Ryba', '12345123456'),
(12, 'Karol', 'Karol', '12345678913'),
(13, 'Konrad', 'Konrad', '12345678987'),
(14, 'Marek', 'Marek', '12345612345'),
(15, 'Mariusz', 'MAriusz', '12341234567'),
(16, 'Jan', 'Jan', '12345678902'),
(17, 'Michał', 'Michał', '12345678904'),
(18, 'Mirek', 'Mirek', '34567890123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `id` int(11) NOT NULL,
  `marka` varchar(32) NOT NULL,
  `kolor` varchar(32) NOT NULL,
  `numer_rejestracyjny` varchar(32) NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `cena_za_jeden_dzien` double NOT NULL,
  `hide` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `samochod`
--

INSERT INTO `samochod` (`id`, `marka`, `kolor`, `numer_rejestracyjny`, `rok_produkcji`, `cena_za_jeden_dzien`, `hide`) VALUES
(1, 'Fiat Grande Punto', 'Srebrny', 'QWE1234', '0000', 125.22, 0),
(3, 'Audi Q5', 'Biały', 'RTY1234', '2010', 212.52, 0),
(4, 'BMW X1', 'Czarny', 'UIO1242', '2009', 321.42, 0),
(5, 'Renault C', 'Zielony', 'POI421', '2020', 201.11, 0),
(6, 'Hyundai X35', 'Szary', 'ZXC1223', '2018', 201, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `role`) VALUES
(1, 'milosz', '$2y$10$WMiqPblGQc4bP8PCrPPDlOG.nNurVC09Sj.P9iPdNkYYj0wAHa5y6', 'administrator'),
(2, 'michal', '$2y$10$WMiqPblGQc4bP8PCrPPDlOG.nNurVC09Sj.P9iPdNkYYj0wAHa5y6', 'pracownik'),
(3, 'jan', '$2y$10$WMiqPblGQc4bP8PCrPPDlOG.nNurVC09Sj.P9iPdNkYYj0wAHa5y6', 'kierownik'),
(17, 'admin', '$2y$10$IcWnlUS.wFWadGsw0DNGvO80plsq6VYAMGiXijDBRhOEE4r5xD6Ay', 'pracownik'),
(18, 'admin', '$2y$10$jB4E5w3Z0tG9jwmheQAet.2uBIuGLzmMue4RnMyeSrvvtF4ELRekq', 'pracownik'),
(19, 'admin', '$2y$10$A4bAWpHBBorGCG4/wIFe/uK1cK95wzS6aFPXIMixyFuacX/mwsz7K', 'pracownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_samochodu` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `ilosc_dni` int(11) NOT NULL,
  `uwagi` varchar(255) NOT NULL,
  `przyjete` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id`, `id_klienta`, `id_samochodu`, `data`, `ilosc_dni`, `uwagi`, `przyjete`) VALUES
(2, 1, 1, '2024-01-22 00:00:00', 12, 'sad', 1),
(5, 2, 3, '2024-02-01 00:00:00', 12, 'test test', 1),
(7, 3, 3, '2024-02-11 00:00:00', 22, 'test test', 1),
(9, 4, 4, '2024-01-11 00:00:00', 23, 'asd sad', 1),
(11, 5, 4, '2024-02-04 00:00:00', 23, 'sad', 1),
(12, 5, 4, '2024-02-04 00:00:00', 23, 'sad', 1),
(13, 5, 4, '2024-02-04 00:00:00', 23, 'sad', 1),
(14, 5, 4, '2024-02-04 00:00:00', 23, 'sad', 1),
(15, 5, 4, '2024-02-04 00:00:00', 23, 'sad', 1),
(16, 5, 4, '2024-02-04 00:00:00', 23, 'sad', 1),
(17, 6, 4, '2024-01-22 00:00:00', 22, 'sad', 1),
(18, 7, 1, '2024-02-23 00:00:00', 1, 'byke co', 1),
(19, 8, 3, '2024-03-13 00:00:00', 6, 'sad', 1),
(20, 9, 5, '2024-03-15 00:00:00', 6, 'asd', 1),
(22, 11, 5, '2024-03-30 00:00:00', 5, 'xxx', 1),
(23, 12, 1, '2024-04-04 00:00:00', 4, 'xxx', 1),
(24, 13, 1, '2024-03-05 00:00:00', 14, 'xxx', 1),
(25, 14, 1, '2024-05-08 00:00:00', 16, 'xxx', 1),
(26, 15, 1, '2024-06-11 00:00:00', 20, 'xxx', 1),
(27, 16, 3, '2024-06-07 00:00:00', 60, 'xxx', 1),
(28, 17, 3, '2024-01-01 00:00:00', 20, 'xxx', 1),
(29, 18, 5, '2024-08-20 00:00:00', 7, 'xx', 1),
(30, 6, 6, '2024-12-01 00:00:00', 29, 'xxx', 1),
(31, 18, 6, '2024-09-04 00:00:00', 3, 'xx', 1),
(32, 14, 5, '2024-10-20 00:00:00', 9, 'xxx', 1),
(33, 7, 5, '2024-11-11 00:00:00', 11, 'xx', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_samochodu` (`id_samochodu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `samochod`
--
ALTER TABLE `samochod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`),
  ADD CONSTRAINT `wypozyczenia_ibfk_2` FOREIGN KEY (`id_samochodu`) REFERENCES `samochod` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
