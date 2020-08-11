-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 28, 2020 at 12:40 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabajo_integral`
--

-- --------------------------------------------------------

--
-- Table structure for table `camion`
--

CREATE TABLE `camion` (
  `PATENTE` varchar(6) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camion`
--

INSERT INTO `camion` (`PATENTE`, `id`) VALUES
('CDGX21', 1),
('CSZX65', 2),
('DFQF32', 3),
('LKHM56', 4),
('LXDS45', 5),
('NFCH98', 6),
('QWTF71', 7),
('LKHM55', 8),
('WEVF12', 9),
('POGF87', 10),
('fgdgfd', 12);

-- --------------------------------------------------------

--
-- Table structure for table `centro_distribucion`
--

CREATE TABLE `centro_distribucion` (
  `CODIGO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hoja_de_ruta`
--

CREATE TABLE `hoja_de_ruta` (
  `ID_HOJARUTA` varchar(50) NOT NULL,
  `PATENTE_` varchar(6) DEFAULT NULL,
  `CANT_PRODUCTOS` varchar(50) DEFAULT NULL,
  `CENTRO_DISTRIBUCION` varchar(50) DEFAULT NULL,
  `PUNTOS_VENTAS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `puntos_de_venta`
--

CREATE TABLE `puntos_de_venta` (
  `CODIGO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`PATENTE`),
  ADD KEY `codigo` (`id`) USING BTREE;

--
-- Indexes for table `centro_distribucion`
--
ALTER TABLE `centro_distribucion`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `hoja_de_ruta`
--
ALTER TABLE `hoja_de_ruta`
  ADD PRIMARY KEY (`ID_HOJARUTA`),
  ADD KEY `PATENTE_` (`PATENTE_`);

--
-- Indexes for table `puntos_de_venta`
--
ALTER TABLE `puntos_de_venta`
  ADD PRIMARY KEY (`CODIGO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camion`
--
ALTER TABLE `camion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoja_de_ruta`
--
ALTER TABLE `hoja_de_ruta`
  ADD CONSTRAINT `hoja_de_ruta_ibfk_1` FOREIGN KEY (`PATENTE_`) REFERENCES `camion` (`PATENTE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
