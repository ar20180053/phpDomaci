-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 03:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmoteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE `filmovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zanr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trajanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`id`, `naziv`, `zanr`, `trajanje`) VALUES
(2, 'We are the one', 'Drama', 120),
(22, 'Ride Along', 'Komedija', 116),
(24, 'Extraction', 'Akcija', 99),
(25, 'The Nun', 'Horor', 145);

-- --------------------------------------------------------

--
-- Table structure for table `izdavanja`
--

CREATE TABLE `izdavanja` (
  `id_korisnika` int(11) NOT NULL,
  `id_filma` int(11) NOT NULL,
  `datum_iznajmljivanja` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnika` int(11) NOT NULL,
  `ime` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `JMBG` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `ime`, `prezime`, `JMBG`) VALUES
(1, 'Petar', 'Petrovic', 1234567145),
(2, 'Jovan', 'Jovanovic', 987654321),
(3, 'admin', 'admin', 1212121212);

-- --------------------------------------------------------

--
-- Table structure for table `zanrovi`
--

CREATE TABLE `zanrovi` (
  `zanr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zanrovi`
--

INSERT INTO `zanrovi` (`zanr`, `opis`) VALUES
('Akcija', 'Akcija je filmski žanr u kojem akcijske sekvence, poput borbe, kaskaderskih scena, automobilskih potjera ili eksplozija, imaju prednost pred elementima kao što su karakterizacija ili kompleksna priča.'),
('Drama', 'Dramski film je filmski žanr koji ponajviše ovisi o unutarnjem razvoju stvarnih likova koji se suočavaju s emocionalnim temama.'),
('Horor', 'Horor filmovi, ponekad (arhaično) filmovi strave ili filmovi strave i užasa su filmovi koji bi trebalo da izazovu strah, strepnju i užas kod gledaoca.'),
('Komedija', 'Komedija je filmski žanr u kojem naglasak stavljen na humor. Filmovi u ovom stilu imaju sretni završetak (uz iznimku crne komedije). Komedija je jedan od najstarijih filmskih žanrova: neki od prvih nijemih filmova bile su komedije.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zanr` (`zanr`);

--
-- Indexes for table `izdavanja`
--
ALTER TABLE `izdavanja`
  ADD KEY `id_korisnika` (`id_korisnika`),
  ADD KEY `id_filma` (`id_filma`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `zanrovi`
--
ALTER TABLE `zanrovi`
  ADD PRIMARY KEY (`zanr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmovi`
--
ALTER TABLE `filmovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD CONSTRAINT `filmovi_ibfk_1` FOREIGN KEY (`zanr`) REFERENCES `zanrovi` (`zanr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `izdavanja`
--
ALTER TABLE `izdavanja`
  ADD CONSTRAINT `izdavanja_ibfk_1` FOREIGN KEY (`id_filma`) REFERENCES `filmovi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `izdavanja_ibfk_2` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnici` (`id_korisnika`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
