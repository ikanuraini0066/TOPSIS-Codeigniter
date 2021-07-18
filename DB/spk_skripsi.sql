-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 11:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'ika', 'ika'),
(3, 'enay', 'enay'),
(4, 'saya', '20c1a26a55');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(3) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` varchar(10) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `keterangan`) VALUES
('K01', 'IPK', '4', 'benefit'),
('K02', 'Penghasilan Orang Tua', '5', 'cost'),
('K03', 'Jarak Kampus Dengan Kos/Rumah', '3', 'benefit'),
('K04', 'Tanggungan Orang Tua', '4', 'benefit'),
('K05', 'Prestasi', '4', 'benefit'),
('K06', 'Kendaraan', '3', 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` varchar(3) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `nik` int(12) NOT NULL,
  `alamat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nik`, `alamat`) VALUES
('M01', 'yaya', 909, 'boyolali'),
('M02', 'Ika Nuraini', 2147483647, 'Candirejo'),
('M03', 'Enay', 9099999, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(4) NOT NULL,
  `id_mahasiswa` varchar(3) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL,
  `nilai` int(1) NOT NULL,
  `hkuadrat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_mahasiswa`, `id_kriteria`, `nilai`, `hkuadrat`) VALUES
(26, 'M03', 'K01', 4, 0),
(27, 'M03', 'K02', 3, 0),
(28, 'M03', 'K03', 4, 0),
(29, 'M03', 'K04', 4, 0),
(30, 'M03', 'K05', 2, 0),
(31, 'M03', 'K06', 3, 0),
(33, 'M02', 'K01', 3, 0),
(34, 'M02', 'K02', 4, 0),
(35, 'M02', 'K03', 2, 0),
(36, 'M02', 'K04', 2, 0),
(37, 'M02', 'K05', 3, 0),
(38, 'M02', 'K06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_jml_kuadrat`
--

CREATE TABLE `tmp_jml_kuadrat` (
  `id_kriteria` varchar(3) NOT NULL,
  `nilai_penjumlahan` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_matriks`
--

CREATE TABLE `tmp_matriks` (
  `id_mahasiswa` int(10) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `nilai` int(1) NOT NULL,
  `hkuadrat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tmp_jml_kuadrat`
--
ALTER TABLE `tmp_jml_kuadrat`
  ADD UNIQUE KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
