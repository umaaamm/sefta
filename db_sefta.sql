-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 20, 2018 at 03:20 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sefta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `level`) VALUES
(1, 'sefta', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gis_dosen`
--

CREATE TABLE `tbl_gis_dosen` (
  `id_gis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npp` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status_staff` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lon` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gis_dosen`
--

INSERT INTO `tbl_gis_dosen` (`id_gis`, `nama`, `npp`, `ttl`, `jk`, `jabatan`, `status_staff`, `prodi`, `alamat`, `email`, `telpon`, `lat`, `lon`, `gambar`) VALUES
(1, 'sefta', '123', '08/18/2018', 'ds', 'dosen', 'aktif', 'teknik informatika', 'bandar lampung', 'sefta@gmail.com', '098765432', '-7.360798', '111.7330538', 'Screen Shot 2018-08-06 at 19.02.17.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_gis_dosen`
--
ALTER TABLE `tbl_gis_dosen`
  ADD PRIMARY KEY (`id_gis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gis_dosen`
--
ALTER TABLE `tbl_gis_dosen`
  MODIFY `id_gis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
