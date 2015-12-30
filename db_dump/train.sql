-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2015 at 10:44 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train`
--
CREATE DATABASE IF NOT EXISTS `train` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `train`;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `purchase_ID` int(11) NOT NULL,
  `time_stamp` datetime NOT NULL,
  `username` varchar(40) NOT NULL,
  `fee` double NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_ID`, `time_stamp`, `username`, `fee`, `type`) VALUES
(5, '2015-12-04 04:13:43', 'lenmor', 2.75, 'Single'),
(6, '2015-12-04 04:13:44', 'lenmor', 2.75, 'Single'),
(7, '2015-12-04 04:13:46', 'lenmor', 11, 'Booklet'),
(8, '2015-12-04 04:13:48', 'lenmor', 2.75, 'Single'),
(9, '2015-12-04 04:21:13', 'lenmor', 11, 'Booklet'),
(10, '2015-12-04 04:21:17', 'lenmor', 11, 'Booklet'),
(11, '2015-12-04 04:21:19', 'lenmor', 2.75, 'Single'),
(12, '2015-12-04 04:21:21', 'lenmor', 11, 'Booklet'),
(13, '2015-12-04 06:30:51', 'lenmor', 2.75, 'Single'),
(14, '2015-12-04 09:47:02', 'Demostenis', 2.75, 'Single'),
(15, '2015-12-04 09:47:04', 'Demostenis', 2.75, 'Single'),
(16, '2015-12-04 09:47:04', 'Demostenis', 2.75, 'Single'),
(17, '2015-12-04 09:47:05', 'Demostenis', 2.75, 'Single'),
(18, '2015-12-04 09:47:05', 'Demostenis', 2.75, 'Single'),
(19, '2015-12-04 09:47:08', 'Demostenis', 11, 'Booklet'),
(20, '2015-12-04 09:47:08', 'Demostenis', 2.75, 'Single'),
(21, '2015-12-04 09:47:08', 'Demostenis', 2.75, 'Single'),
(22, '2015-12-04 09:47:13', 'Demostenis', 2.75, 'Single'),
(23, '2015-12-04 09:47:14', 'Demostenis', 2.75, 'Single'),
(24, '2015-12-04 09:47:29', 'Demostenis', 11, 'Booklet'),
(25, '2015-12-04 10:20:49', 'jachan', 11, 'Booklet'),
(26, '2015-12-04 10:23:36', 'jachan', 11, 'Booklet'),
(27, '2015-12-04 10:23:40', 'jachan', 11, 'Booklet'),
(28, '2015-12-04 10:27:52', 'stephc', 4.5, 'Single'),
(29, '2015-12-04 10:27:56', 'stephc', 4.5, 'Single'),
(30, '2015-12-04 10:27:58', 'stephc', 4.5, 'Single'),
(31, '2015-12-04 10:27:59', 'stephc', 18.5, 'Booklet'),
(33, '2015-12-04 10:30:18', 'mandymm', 6.5, 'Single'),
(34, '2015-12-04 10:30:21', 'mandymm', 25.75, 'Booklet'),
(35, '2015-12-04 10:40:47', 'marie23', 3.25, 'Single'),
(36, '2015-12-04 10:40:49', 'marie23', 13, 'Booklet'),
(37, '2015-12-04 10:40:54', 'marie23', 13, 'Booklet'),
(38, '2015-12-04 10:40:55', 'marie23', 3.25, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

DROP TABLE IF EXISTS `stations`;
CREATE TABLE `stations` (
  `line` varchar(30) NOT NULL,
  `station` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`line`, `station`) VALUES
('Vaudreuil-Hudson', 'Baie-D''Urfe'),
('Vaudreuil-Hudson', 'Beaconsfield'),
('Vaudreuil-Hudson', 'Beaurepaire'),
('Deux-Montagnes', 'Bois-Franc'),
('Deux-Montagnes', 'Canora'),
('Vaudreuil-Hudson', 'Cedar Park'),
('Deux-Montagnes', 'Deux-Montagnes'),
('Vaudreuil-Hudson', 'Dorion'),
('Vaudreuil-Hudson', 'Dorval'),
('Deux-Montagnes', 'Du Ruisseau'),
('Deux-Montagnes', 'Gare Centrale'),
('Deux-Montagnes', 'Grand-Moulin'),
('Vaudreuil-Hudson', 'Hudson'),
('Deux-Montagnes', 'Ile-Bigras'),
('Vaudreuil-Hudson', 'Ile-Perrot'),
('Vaudreuil-Hudson', 'Lachine'),
('Vaudreuil-Hudson', 'Lucien-L''Allier'),
('Deux-Montagnes', 'Mont-Royal'),
('Deux-Montagnes', 'Montpelier'),
('Vaudreuil-Hudson', 'Montreal-Ouest'),
('Vaudreuil-Hudson', 'Pincourtâ€“Terrasse-Vaudreuil'),
('Vaudreuil-Hudson', 'Pine Beach'),
('Vaudreuil-Hudson', 'Pointe-Claire'),
('Deux-Montagnes', 'Roxboro-Pierrefonds'),
('Deux-Montagnes', 'Saint-Dorothee'),
('Vaudreuil-Hudson', 'Sainte-Anne-de-Bellevue'),
('Deux-Montagnes', 'Sunnybrooke'),
('Vaudreuil-Hudson', 'Valois'),
('Vaudreuil-Hudson', 'Vaudreuil'),
('Vaudreuil-Hudson', 'Vendome');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

DROP TABLE IF EXISTS `times`;
CREATE TABLE `times` (
  `station` varchar(30) NOT NULL,
  `direction` varchar(30) NOT NULL,
  `times_string` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`station`, `direction`, `times_string`) VALUES
('Gare Centrale', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Canora', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Mont-Royal', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Montpelier', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Du Ruisseau', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Bois-Franc', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Sunnybrooke', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Roxboro-Pierrefonds', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Ile-Bigras', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Saint-Dorothee', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Grand-Moulin', 'Deux-Montagnes', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Deux-Montagnes', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Grand-Moulin', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Saint-Dorothee', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Ile-Bigras', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Roxboro-Pierrefonds', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Sunnybrooke', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Bois-Franc', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Du Ruisseau', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Montpelier', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Mont-Royal', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Canora', 'Gare-Centrale', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Lucien-L''Allier', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Vendome', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Montreal-Ouest', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Lachine', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Dorval', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Pine Beach', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Valois', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Pointe-Claire', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Cedar Park', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Beaconsfield', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Beaurepaire', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Baie-D''Urfe', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Sainte-Anne-de-Bellevue', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Ile-Perrot', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Pincourtâ€“Terrasse-Vaudreuil', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Dorion', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Vaudreuil', 'Hudson', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Hudson', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Vaudreuil', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Dorion', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Pincourtâ€“Terrasse-Vaudreuil', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Ile-Perrot', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Sainte-Anne-de-Bellevue', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Baie-D''Urfe', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Beaurepaire', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Beaconsfield', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Cedar Park', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Pointe-Claire', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Valois', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Pine Beach', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Dorval', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Lachine', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Montreal-Ouest', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Vendome', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Lucien-L''Allier', 'Candiac', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Vendome', 'Candiac', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Montreal-Ouest', 'Candiac', '00h30,06h45,08h45,09h30,10h30,11h30,12h30,13h30,14h30,15h00,15h45,16h05,16h30,16h50,17h10,18h20,19h05,19h30,20h30,21h30,22h30,23h30,23h45,23h50,23h55'),
('Montreal-Ouest', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55'),
('Vendome', 'Lucien-L''Allier', '00h35,06h40,08h50,09h45,10h45,11h25,12h40,13h35,14h35,15h05,15h50,16h10,16h40,16h45,17h20,18h30,19h15,19h35,20h40,21h40,22h35,22h40,23h10,23h40,23h55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(20) NOT NULL,
  `postal` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone1` varchar(12) NOT NULL,
  `phone2` varchar(12) DEFAULT NULL,
  `birthday` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `cpassword` varchar(20) NOT NULL,
  `zone` tinyint(1) NOT NULL,
  `carpool` tinyint(1) DEFAULT NULL,
  `carpoolBuddies` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `address`, `city`, `province`, `postal`, `email`, `phone1`, `phone2`, `birthday`, `username`, `password`, `cpassword`, `zone`, `carpool`, `carpoolBuddies`) VALUES
('Annette', 'Couto', '446 Spring Garden', 'Sao Paulo', 'Quebec', 'H9B 1S8', 'acouto@lbpsb.qc.ca', '514 673 6452', '514 784 6424', '1957-08-06', 'acouto5', '12345', '12345', 2, 0, NULL),
('Carlod', 'Venturaq', '671 Grey Zone', 'Montreal', 'Quebec', 'H8Y 1C2', 'ventura53@gmail.com', '514 724 9012', '672 513 7214', '1990-10-11', 'ceventura2', '1652', '1652', 3, 1, NULL),
('what', 'what', 'whatff', 'what', 'no', 'a2n 3n2', '0hewr@xxx.com', '234 234 2344', '', '2005-08-11', 'Demostenis', 'abc123', 'abc123', 1, 0, NULL),
('Dexter', 'Moore', '8907 SAint-Cristophe', 'Montreal', 'QC', 'P4V 8N9', 'mm@m.com', '123 111 1114', '', '1990-01-04', 'dexy12', '123', '123', 3, 1, 'jachan,lebron'),
('Mila', 'Hernandez', '73 Hot', 'Chicago', 'Illinois', 'J8U 7V5', 'hende24@gmail.com', '907 873 6723', '835 723 7823', '2000-02-02', 'hedley1234', 'abcd5678', 'abcd5678', 3, 0, NULL),
('Owen', 'Hernandez', '73 Hot', 'Chicago', 'Illinois', 'J8U 7V5', 'hende24@gmail.com', '907 873 6723', '835 723 7823', '1943-06-28', 'hende8923', '6789', '6789', 3, 1, NULL),
('sexy', 'mama', '1234 mybutt', 'you', 'on', 'M3B 4B7', 'sexy@hotmail.com', '514 322 3232', '400 232 2495', '2004-12-08', 'heysexy', 'lolol', 'lolol', 1, 1, NULL),
('Jackie', 'Chan', '0912 Road', 'Road', 'RD', 'A1B 2C3', 'l@l.com', '123 123 1234', '123 123 1234', '2003-03-03', 'jachan', 'abc1234', 'abc1234', 1, 1, NULL),
('Jorge', 'Correira', '621 Grit Bot', 'Toronto', 'Ontario', 'K9G 5Y7', 'jorgebut@hotmail.com', '934 752 9814', '934 671 7824', '1964-03-05', 'jorgeb65', '1091', '1091', 3, 1, NULL),
('Kyle', 'Ventura', '152 Athenes', 'Rio', 'Montreal', 'J8T 5D2', 'vent62@yahoo.com', '901 521 7612', '901 672 7623', '1998-12-11', 'kyle12', '1761', '1761', 3, 0, NULL),
('Miranda', 'Larroza', '87 Mentana', 'Bramptom', 'Montreal', 'K9D 5S3', 'larry52@gmail.com', '903 762 6723', '904 672 4523', '1992-06-12', 'larr671', '8901', '8901', 1, 1, NULL),
('LeBron', 'James', '1234 Cleveland', 'Cleveland', 'Ohio', 'R2B 5Y5', 'lb@gmail.com', '123 123 1234', '123 123 1234', '1991-01-07', 'lebron', 'abc123', 'abc123', 1, 1, NULL),
('Lenny', 'Dimanalata', '4015 Saint-Andre', 'Montreal', 'QC', 'H2L 3W2', 'lenny@l.com', '123 123 1234', '123 123 1234', '1999-05-03', 'lenmor', 'markoj2049', 'markoj2049', 1, 1, 'hende8923,heysexy,jachan'),
('Mandynga', 'Moore', '8907 SAint-Cristophe', 'Montreal', 'QC', 'P4V 8N9', 'mm@m.com', '123 111 1114', '', '1990-01-04', 'mandymm', '1234', '1234', 3, 1, NULL),
('Marie', 'Digby', '4546 Golden State', 'GS2', 'GS', 'A1B 2C3', 'm@ma.com', '123 123 1234', '', '2004-02-01', 'marie23', 'abc123', 'abc123', 2, 1, 'jorgeb65,larr671,lebron,lenmor'),
('Maria', 'Magdalene', '188 Monny', 'Mon', 'QC', 'B7B 6H2', 'l@l.cpp', '123 111 1111', '', '1992-02-14', 'peter34', '123', '123', 3, 0, NULL),
('marivi', 'Magdalene', '188 Monny', 'Mon', 'QC', 'B7B 6H2', 'l@l.cpp', '123 111 1111', '', '1992-02-14', 'peter78', '12345', '12345', 3, 0, NULL),
('Mandy', 'Moore', '8907 SAint-Cristophe', 'Montreal', 'QC', 'P4V 8N9', 'mm@m.com', '123 111 1114', '', '1990-01-04', 'polenta', 'asd', 'asd', 2, 0, NULL),
('Mandy', 'Moore', '8907 SAint-Cristophe', 'Montreal', 'QC', 'P4V 8N9', 'mm@m.com', '123 111 1114', '', '1990-01-04', 'polenta12', '123', '123', 2, 0, NULL),
('WAhahadsdsa', 'Hernandez', '73 Hot', 'Chicago', 'Illinois', 'J8U 7V5', 'hende24@gmail.com', '907 873 6723', '835 723 7823', '2002-03-06', 'rareqw123', 'aaa', 'aaa', 3, 1, NULL),
('Elise', 'Sanchez', '43 Fox', 'Pierrefonds', 'Ontario', 'N8Y 6F4', 'eli82@gmail.com', '873 652 3412', '762 651 6723', '1993-06-14', 'sanche54', '8923', '8923', 3, 1, NULL),
('Stephen', 'Curry', '4546 Golden State', 'GS', 'California', 'R2N 5Y6', 'sc@gmail.com', '123 123 1234', '123 123 1234', '1977-03-10', 'stephc', 'abc124', 'abc124', 1, 1, 'dexy12,hende8923,jorgeb65,larr671');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_ID`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD KEY `station` (`station`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `times`
--
ALTER TABLE `times`
  ADD CONSTRAINT `times_ibfk_1` FOREIGN KEY (`station`) REFERENCES `stations` (`station`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
