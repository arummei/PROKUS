-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2013 at 02:05 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `butik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(3) NOT NULL DEFAULT '0',
  `nama_barang` varchar(30) NOT NULL,
  `stok_barang` int(2) NOT NULL,
  `harga_jual` int(7) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok_barang`, `harga_jual`) VALUES
(1, 'Antic Orange (AO_1)', 10, 300000),
(2, 'Boot Shoe in Green (BS_2)', 10, 250000),
(3, 'Elastis Leather Jacket (LJ_3)', 5, 400000),
(4, 'Gelang Turkis (GT_4)', 20, 100000),
(5, 'Beads Bracelets (BB_5)', 20, 100000),
(6, 'Points in Black Clucth (PBC_6)', 15, 250000),
(7, 'Resin (Rs_7)', 25, 80000),
(8, 'White Leather Jacket (WLJ_8)', 2, 400000),
(9, 'Antic Black (AB_9)', 2, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pengurus` int(3) NOT NULL,
  `nama_pengurus` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nama_pengurus`, `password`) VALUES
(123, 'arum', 'arummei');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
