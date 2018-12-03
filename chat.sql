-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 03 Gru 2018, 19:34
-- Wersja serwera: 5.7.24-0ubuntu0.18.04.1
-- Wersja PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `chat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user` varchar(16) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `chat`
--

INSERT INTO `chat` (`id`, `user`, `text`, `date`) VALUES
(67, 'Dawid', 'Witam', '2018-12-03 19:31:58'),
(68, 'Patryk', 'Hej', '2018-12-03 19:32:02'),
(69, 'Dawid', 'Co tam', '2018-12-03 19:32:12'),
(70, 'Patryk', 'W porządku', '2018-12-03 19:32:18');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
