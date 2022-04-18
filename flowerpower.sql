-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 06:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowerpower`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikelcode` int(11) NOT NULL,
  `artikel` varchar(255) DEFAULT NULL,
  `prijs` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikelcode`, `artikel`, `prijs`) VALUES
(6, 'orchidee ', '4.90'),
(7, 'roos', '6.00'),
(8, 'madelief', '3.50');

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `artikelcode` int(11) DEFAULT NULL,
  `winkelcode` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `klantcode` int(11) DEFAULT NULL,
  `medewerkerscode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `factuurnummer` int(11) NOT NULL,
  `factuurdatum` date DEFAULT NULL,
  `klantcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `factuurregel`
--

CREATE TABLE `factuurregel` (
  `factuurnummer` int(11) DEFAULT NULL,
  `artikelcode` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `prijs` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klantcode` int(11) NOT NULL,
  `voorletters` varchar(10) DEFAULT NULL,
  `tussenvoegsels` varchar(50) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `woonplaats` varchar(255) DEFAULT NULL,
  `geboortedatum` date DEFAULT NULL,
  `gebruikersnaam` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klantcode`, `voorletters`, `tussenvoegsels`, `achternaam`, `adres`, `postcode`, `woonplaats`, `geboortedatum`, `gebruikersnaam`, `wachtwoord`) VALUES
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'walid', '$2y$10$XP26.eS3hnrftA3aFaqyvufH1V7w9fxRgPBzb2e.8.B0W504H0NEq'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'walid', '$2y$10$Kz5A.E0pBVHb4LoJBNpMB.nMZf4G8Eg.aviTqV/XLlgWSxigi5RfO'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE `medewerker` (
  `medewerkerscode` int(11) NOT NULL,
  `voorletters` varchar(10) DEFAULT NULL,
  `voorvoegsels` varchar(50) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `gebruikersnaam` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`medewerkerscode`, `voorletters`, `voorvoegsels`, `achternaam`, `gebruikersnaam`, `wachtwoord`) VALUES
(37, NULL, NULL, NULL, 'walid', '$2y$10$Tq7AYmVb1dOx37igQx3V/eNhKemfQp6AnGIAW0PpW/ZIAR8RRtBWi');

-- --------------------------------------------------------

--
-- Table structure for table `winkel`
--

CREATE TABLE `winkel` (
  `winkelcode` int(11) NOT NULL,
  `winkelnaam` varchar(255) DEFAULT NULL,
  `winkeladres` varchar(255) DEFAULT NULL,
  `winkelpostcode` varchar(255) DEFAULT NULL,
  `vestigingsplaats` varchar(255) DEFAULT NULL,
  `telefoonnummer` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikelcode`);

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD KEY `artikelcode` (`artikelcode`),
  ADD KEY `winkelcode` (`winkelcode`),
  ADD KEY `klantcode` (`klantcode`),
  ADD KEY `medewerkerscode` (`medewerkerscode`);

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`factuurnummer`),
  ADD KEY `klantcode` (`klantcode`);

--
-- Indexes for table `factuurregel`
--
ALTER TABLE `factuurregel`
  ADD KEY `factuurnummer` (`factuurnummer`),
  ADD KEY `artikelcode` (`artikelcode`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klantcode`);

--
-- Indexes for table `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`medewerkerscode`);

--
-- Indexes for table `winkel`
--
ALTER TABLE `winkel`
  ADD PRIMARY KEY (`winkelcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikelcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `factuurnummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klantcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `medewerkerscode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `winkel`
--
ALTER TABLE `winkel`
  MODIFY `winkelcode` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`artikelcode`) REFERENCES `artikel` (`artikelcode`),
  ADD CONSTRAINT `bestelling_ibfk_2` FOREIGN KEY (`winkelcode`) REFERENCES `winkel` (`winkelcode`),
  ADD CONSTRAINT `bestelling_ibfk_3` FOREIGN KEY (`klantcode`) REFERENCES `klant` (`klantcode`),
  ADD CONSTRAINT `bestelling_ibfk_4` FOREIGN KEY (`medewerkerscode`) REFERENCES `medewerker` (`medewerkerscode`);

--
-- Constraints for table `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `factuur_ibfk_1` FOREIGN KEY (`klantcode`) REFERENCES `klant` (`klantcode`);

--
-- Constraints for table `factuurregel`
--
ALTER TABLE `factuurregel`
  ADD CONSTRAINT `factuurregel_ibfk_1` FOREIGN KEY (`factuurnummer`) REFERENCES `factuur` (`factuurnummer`),
  ADD CONSTRAINT `factuurregel_ibfk_2` FOREIGN KEY (`artikelcode`) REFERENCES `artikel` (`artikelcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
