-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 03:20 PM
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
-- Database: `aaafullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `matakuliah` varchar(7) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `matakuliah`, `kelas`, `nama_dosen`) VALUES
(1, 'RKPL', 'A', 'Feby'),
(2, 'RBPL', 'B', 'Hatma'),
(4, 'SE', 'A', 'Muja'),
(5, 'SE', 'F', 'Mahe'),
(6, 'SE', 'G', 'Andre'),
(7, 'DMJK', 'B', 'Bekti'),
(8, 'DMJK', 'D', 'Soni');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tahun_masuk` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `asal`, `tanggal_lahir`, `tahun_masuk`) VALUES
(5211, 'Arbi', 'Bekasi', '1993-02-19', 2012),
(5219, 'Khanza', 'Surabaya', '1998-12-13', 2017),
(5299, 'Ari', 'Kediri', '1999-08-01', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matkul` int(3) NOT NULL,
  `nama_matkul` varchar(30) NOT NULL,
  `sks` int(11) NOT NULL,
  `kategori` enum('Wajib','Pilihan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matkul`, `nama_matkul`, `sks`, `kategori`) VALUES
(911, 'SE', 4, 'Wajib'),
(912, 'RKPL', 3, 'Wajib'),
(913, 'DMJK', 3, 'Wajib'),
(921, 'SKBM', 3, 'Pilihan');

-- --------------------------------------------------------

--
-- Table structure for table `tempuh`
--

CREATE TABLE `tempuh` (
  `tempuh_nrp_mhs` int(4) NOT NULL,
  `tempuh_id_matkul` int(3) NOT NULL,
  `nilai` enum('A','AB','B','BC','C','D','E') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempuh`
--

INSERT INTO `tempuh` (`tempuh_nrp_mhs`, `tempuh_id_matkul`, `nilai`) VALUES
(5211, 911, NULL),
(5211, 912, NULL),
(5211, 912, NULL),
(5211, 912, NULL),
(5211, 912, NULL),
(5211, 911, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tempuh`
--
ALTER TABLE `tempuh`
  ADD KEY `tempuh_nrp_mhs` (`tempuh_nrp_mhs`),
  ADD KEY `tempuh_id_matkul` (`tempuh_id_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tempuh`
--
ALTER TABLE `tempuh`
  ADD CONSTRAINT `id_matkul_cons` FOREIGN KEY (`tempuh_id_matkul`) REFERENCES `matakuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nrp_mhs_cons` FOREIGN KEY (`tempuh_nrp_mhs`) REFERENCES `mahasiswa` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
