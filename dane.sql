-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Maj 2020, 18:14
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dane`
--
CREATE DATABASE IF NOT EXISTS `dane` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dane`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `Profilowe` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `exp` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL,
  `wyk` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL,
  `jezyki` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL,
  `skills` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL,
  `zain` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `numer` varchar(9) COLLATE utf8mb4_polish_ci NOT NULL,
  `Urodzony` date NOT NULL,
  `miasto` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`id`, `imie`, `nazwisko`, `Profilowe`, `exp`, `wyk`, `jezyki`, `skills`, `zain`, `email`, `numer`, `Urodzony`, `miasto`, `opis`) VALUES
(1, 'Michał ', 'Kobyła', '', 'Brak', 'Brak', 'Brak', 'Brak', 'Brak', 'testowy@o2.pl', '534656346', '2005-12-11', 'Brak', 'Brak'),
(2, 'Janusz', 'Brak', '', 'Brak', 'Brak', 'Brak', 'Brak', 'Brak', 'testowy2@o2.pl', '543565467', '2003-03-02', 'Warszawa', 'Brak'),
(3, 'Janusz', 'Koparka', '', 'Brak', 'Brak', 'Brak', 'Brak', 'Brak', 'testowy10@o2.pl', '776974578', '2000-08-09', 'Kraków', 'Brak');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`numer`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `dane`
--
ALTER TABLE `dane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
