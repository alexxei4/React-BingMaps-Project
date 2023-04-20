-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 11:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locations`
--

-- --------------------------------------------------------

--
-- Table structure for table `studio_location`
--

CREATE TABLE `studio_location` (
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `name` text NOT NULL,
  `Address` text NOT NULL,
  `Rating` int(11) NOT NULL DEFAULT 0,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studio_location`
--

INSERT INTO `studio_location` (`longitude`, `latitude`, `name`, `Address`, `Rating`, `ID`) VALUES
(43.209, -79.8403, 'BlueSlash Studio', '9 Berrisfield Cresent', 0, 1),
(43.2333, -79.8014, 'Hive Studios ', '215 Cochrane Rd', 0, 2),
(43.2636, -79.8651, 'Downtown Sound Recording Studio', '20 Barton St E', 0, 3),
(43.2966, -79.9121, 'School House Studios', '635 York Road', 0, 4),
(43.2657, -79.8688, 'Catherine North Studios', '255 Park St N', 0, 5),
(43.2516, -79.8502, 'Grant Avenue Studios', '38 Grant Avenue', 0, 6),
(43.2586, -79.8637, 'Threshold Recording Studio', '110 Catharine St North', 0, 7),
(43.2594, -79.868, 'Sonic Unyon Records', '97 James St N', 0, 8),
(43.1834, -79.8323, 'ADS Media', '620 Trinity Church Rd', 0, 9),
(43.2517, -79.8685, 'Halo Music', '57 Augusta Street', 0, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studio_location`
--
ALTER TABLE `studio_location`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
