-- Active: 1742045345930@@127.0.0.1@3306@laravellaporanpembangunan
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 09:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduanlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `kategori`) VALUES
(1, 'Kriminal'),
(3, 'Fasilitas'),
(4, 'Bencana');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `idpengaduan` INT(11) NOT NULL AUTO_INCREMENT,
  `idpengguna` INT(11) NOT NULL,
  `idkategori` INT(11) NOT NULL,
  `judul` TEXT NOT NULL,
  `isi` TEXT NOT NULL,
  `alamat` TEXT NOT NULL,
  `file` TEXT NOT NULL,
  `jenis_permasalahan` VARCHAR(250) NOT NULL,
  `tingkat_kepentingan` VARCHAR(255) DEFAULT NULL,
  `deskripsi_kerusakan` TEXT NOT NULL,
  `status_pengaduan` VARCHAR(255) NOT NULL,
  `tanggal_pengaduan` DATE NOT NULL,
  `catatan` TEXT DEFAULT NULL,
  `dampak_insiden` TEXT NOT NULL,
  PRIMARY KEY (`idpengaduan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nik` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `telepon` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `fotoprofil` text DEFAULT NULL,
  `level` text NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `jekel` varchar(100) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kec` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `nik`, `username`, `email`, `password`, `telepon`, `alamat`, `fotoprofil`, `level`, `tgl_lahir`, `tempat_lahir`, `jekel`, `provinsi`, `kota`, `kec`, `kode_pos`) VALUES
(1, 'Fahrul Adib', '', '', 'fahruladib9@gmail.com', '123', '082282076702', 'Jl. Prapanca Raya No. 9', 'Untitled.png', 'User', '2002-07-08', 'Jakarta', 'Laki-laki', 'DKI Jakarta', 'Jakarta Selatan', 'Ciganjur', '12170'),
(2, 'Administrator', '', 'admin', 'admin@gmail.com', 'admin', '081293827383', 'Palembang', '', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Feby Saputra', '', '', 'feby@gmail.com', '123', '082673828283', 'kenten', NULL, 'User', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'M. Ridwan Tri Saputra', '', '', 'ridwan@gmail.com', '123', '082783929302', 'Pangkalan Balai', NULL, 'User', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Sugeng', '12345', 'sugeng', 'sugeng@gmail.com', 'sugeng', '0123123', '-', NULL, 'User', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`idpengaduan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `idpengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
