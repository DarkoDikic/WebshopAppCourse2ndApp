-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 12:21 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drugaapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

CREATE TABLE `artikal` (
  `idart` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `cena` double NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`idart`, `naziv`, `cena`, `img`) VALUES
(7, 'Fosil', 150, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYbo6H9STkZ5aRLpdzyBmfUoUxYOo5bqQVEkYUGPrECOCIuoF5FA'),
(8, 'Festina', 140, 'http://d1rkccsb0jf1bk.cloudfront.net/products/99943808/main/xlarge/f16573_1xxx.jpg'),
(9, 'Casio', 120, 'https://images.kogan.com/image/fetch/s--eEf-BbMA--/b_white,c_pad,f_auto,h_400,q_auto:good,w_600/https://assets.kogan.com/files/product/aub/cas/CAS-GA-100CB-1A.jpg'),
(10, 'Swatch', 160, 'http://brendovi.net/images/proizvodi-velike/Swatch/swatch-satovi-sailaway6.jpg'),
(11, 'Guess', 200, 'https://i.ebayimg.com/images/g/FHsAAOSwsYpaFIqq/s-l300.jpg'),
(12, 'Sector', 100, 'https://cdn.bluespirit.com/i/default/33081/orologio-sector-330-r3273794010.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kolicina`
--

CREATE TABLE `kolicina` (
  `idoso` int(11) NOT NULL,
  `idart` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kolicina`
--

INSERT INTO `kolicina` (`idoso`, `idart`, `kolicina`) VALUES
(17, 8, 1),
(17, 9, 1),
(17, 8, 1),
(17, 9, 1),
(17, 12, 1),
(17, 12, 1),
(17, 7, 1),
(17, 7, 1),
(17, 7, 1),
(17, 8, 1),
(17, 8, 1),
(17, 11, 1),
(17, 11, 1),
(17, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `osoba`
--

CREATE TABLE `osoba` (
  `idoso` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `osoba`
--

INSERT INTO `osoba` (`idoso`, `ime`, `prezime`, `email`, `username`, `password`) VALUES
(17, 'Zile', 'Kuzminac', 'zile@gmail.com', 'admin', 'admin'),
(18, 'zdravko', 'surlan', 'zile0906@gmail.com', 'zdravko', 'zdravko'),
(19, 'suzana', 'surlan', 'zile0906@gmail.com', 'suzana', 'suzana'),
(20, 'Darko', 'Dikic', 'darko@darko.com', 'darko', 'didami.');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `img` varchar(255) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `kolicina` varchar(255) NOT NULL,
  `ukupnacena` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `grad` varchar(255) NOT NULL,
  `drzava` varchar(255) NOT NULL,
  `broj` int(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikal`
--
ALTER TABLE `artikal`
  ADD PRIMARY KEY (`idart`),
  ADD KEY `idart` (`idart`);

--
-- Indexes for table `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`idoso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `idart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `osoba`
--
ALTER TABLE `osoba`
  MODIFY `idoso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
