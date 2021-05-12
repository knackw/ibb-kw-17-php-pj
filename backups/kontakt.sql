-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Apr 2021 um 10:40
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `test`
--
USE `app_db`;
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) UNSIGNED NOT NULL,
  `anrede` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vorname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nachname` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `strasse` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plz` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stadt` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `letzte` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `kontakt`
--

INSERT INTO `kontakt` (`id`, `anrede`, `vorname`, `nachname`, `strasse`, `plz`, `stadt`, `telefon`, `letzte`) VALUES
(1, 'Herr', 'Charles', 'Xavier', 'Theodor-Heuss-Ring 6', '25836', 'Garding', '04862 / 85459063', '2020-12-30 09:27:46'),
(2, 'Herr', 'Dennis', 'Hudson', 'Wörthstr. 14', '46238', 'Bottrop', '02041 / 77262671', '2019-12-30 07:21:14'),
(3, 'Herr', 'Gregor', 'Watson', 'Theodor-Heuss-Ring 6', '25836', 'Garding', '04862 / 85459063', '2019-12-30 07:21:14'),
(4, 'Frau', 'Barbara', 'Allen', 'Simon-Meister-Str. 99', '86934', 'Reichling', '08194 / 44845600', '2019-12-30 07:21:14'),
(5, 'Frau', 'Lieselotte', 'Hollmann', 'Wörthstr. 120', '78166', 'Wolterdingen', '07705 / 6007296', '2019-12-30 07:21:14'),
(6, 'Herr Prof. Dr.', 'Leonardo', 'Kemmer', 'Eulenweg 199', '04711', 'Obersimten', '06331 / 94162804', '2020-01-31 09:14:41'),
(7, 'Frau', 'Karin', 'Kemmer', 'Sporckweg 85a', '26446', 'Friedeburg', '04465 / 46688739', '2019-12-30 07:21:14'),
(8, 'Frau', 'Lorena', 'Thamm', 'Holzweg 42', '83666', 'Waakirchen', '08021 / 72711979', '2020-12-18 09:02:53'),
(9, 'Herr', 'Fabio', 'Ehrens', 'Idenbrockplatz 93', '75203', 'Königsbach-Stein', '07232 / 16993197', '2019-12-30 07:21:14'),
(10, 'Herr', 'Ullrich', 'Funkenzeller', 'Bohlweg 174', '10779', 'Berlin', '030 / 69717476', '2019-12-30 07:21:14'),
(11, 'Frau', 'Luisa', 'Marx', 'Dorbaumstr. 69', '83536', 'Gars am Inn', '08073 / 29599604', '2019-12-30 07:21:14'),
(12, 'Frau', 'Emmily', 'Petersen', 'Frauenstr. 169', '56412', 'Heiligenroth', '02602 / 57287660', '2019-12-30 07:21:14'),
(13, 'Frau', 'Inge', 'Gans', 'Steinfurter Str. 141', '64665', 'Alsbach-Hähnlein', '06257 / 60826598', '2019-12-30 07:21:14'),
(14, 'Herr', 'Colin', 'Rettig', 'Rohrkampstr. 200', '26907', 'Walchum', '04963 / 46596413', '2019-12-30 07:21:14'),
(15, 'Frau', 'Angela', 'Budde', 'Sanddornweg 163', '14727', 'Premnitz', '03386 / 12738592', '2019-12-30 07:21:14'),
(17, 'Herr', 'David', 'Schwerdtfeger', 'Wörthstr. 178', '88483', 'Burgrieden', '07392 / 11324687', '2019-12-30 07:21:14'),
(18, 'Herr', 'Holger', 'Erpel', 'Gartenstr. 194', '87654', 'Münchhausen', '03601 / 42712272', '2019-12-30 07:21:14'),
(19, 'Herr', 'Manfred', 'Mahr', 'Marderweg 10', '86986', 'Schwabbruck', '08868 / 62725451', '2019-12-30 07:21:14'),
(20, 'Frau', 'Laura', 'O\'Donnel', 'Ripenhorst 198', '63825', 'Westerngrund', '06024 / 48452583', '2019-12-30 07:21:14'),
(25, 'Herr', 'Vicco', 'von Bülow', 'Waldweg 25', '12345', 'Berlin', '030 / 4711', '2019-12-30 07:21:14'),
(54, 'Herr', 'Ullrich', 'Finkenzeller', 'Bohlweg 174', '10779', 'Berlin', '030 / 69717476', '2019-12-30 07:21:14'),
(55, 'Herr', 'Charles', 'Watson', 'Theodor-Heuss-Ring 6', '25836', 'Garding', '04862 / 85459063', '2019-12-30 07:21:14'),
(58, 'Frau', 'Nadine', 'Willems', 'Mariendorfer Str. 166', '47798', 'Krefeld', '02151 / 17384624', '2019-12-30 07:21:14'),
(72, 'Frau', 'Luisa', 'Marx', 'Dorbaumstr. 69', '83536', 'Gars am Inn', '08073 / 29599604', '2019-12-30 07:21:14'),
(74, 'Herr', 'Manfred', 'Mahr', 'Marderweg 10', '86986', 'Schwabbruck', '08868 / 62725451', '2019-12-30 07:21:14'),
(117, 'Herr', 'Müller', 'Lüdenscheidt', 'Hochweg 12', '78945', 'Adorf', '123456', '2020-11-16 13:44:24');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
