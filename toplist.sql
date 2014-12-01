-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 01 dec 2014 kl 11:02
-- Serverversion: 5.6.14
-- PHP-version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `uppgifter`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `toplist`
--

CREATE TABLE IF NOT EXISTS `toplist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(20) NOT NULL,
  `ranking` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumpning av Data i tabell `toplist`
--

INSERT INTO `toplist` (`id`, `namn`, `ranking`) VALUES
(1, 'LDLC', 4000),
(2, 'Fnatic', 3000),
(3, 'NiP', 3500),
(4, 'Virtus.Pro', 2000),
(5, 'Na´Vi', 2500),
(6, 'Dignitas', 1500),
(7, 'Hellraisers', 1000),
(8, 'Titan', 1500),
(9, 'Cloud9', 500),
(10, 'Denial', 2000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
