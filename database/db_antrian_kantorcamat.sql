-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2025 at 05:17 PM
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
-- Database: `db_antrian_kantorcamat`
--

-- --------------------------------------------------------

--
-- Table structure for table `queue_antrian_admisi`
--

CREATE TABLE `queue_antrian_admisi` (
  `id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` int(100) DEFAULT NULL,
  `no_antrian` varchar(3) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `queue_antrian_admisi`
--

INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `nik`, `no_antrian`, `status`, `updated_date`) VALUES
(174, '2025-08-18', 95395389, '001', '1', '2025-08-18 09:24:14'),
(175, '2025-08-18', 2147483647, '002', '1', '2025-08-18 09:28:06'),
(176, '2025-08-18', 56904694, '003', '1', '2025-08-18 09:29:37'),
(177, '2025-08-18', 868484, '004', '1', '2025-08-18 09:30:29'),
(178, '2025-08-18', 904850454, '005', '1', '2025-08-18 09:36:43'),
(179, '2025-08-18', 506950, '006', '1', '2025-08-18 09:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `queue_pendaftaran`
--

CREATE TABLE `queue_pendaftaran` (
  `nik` int(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `queue_pendaftaran`
--

INSERT INTO `queue_pendaftaran` (`nik`, `nama`, `keperluan`) VALUES
(506950, 'kgpdpp', 'pdikfgpdgdpp'),
(868484, 'ksfskfskk', 'ksfsfjsfosfso'),
(56904694, 'skfsofkso', 'osdfksofkso'),
(95395389, 'kfskfsk', 'kfskfjskfsjks'),
(904850454, 'odkfod', 'osifosfos'),
(2147483647, 'oddfkofks', 'sidpsfspsp');

-- --------------------------------------------------------

--
-- Table structure for table `queue_penggilan_antrian`
--

CREATE TABLE `queue_penggilan_antrian` (
  `id` bigint(20) NOT NULL,
  `antrian` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queue_setting`
--

CREATE TABLE `queue_setting` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `running_text` varchar(255) DEFAULT NULL,
  `youtube_id` varchar(255) DEFAULT NULL,
  `warna_primary` varchar(255) DEFAULT NULL,
  `warna_secondary` varchar(255) DEFAULT NULL,
  `warna_accent` varchar(255) DEFAULT NULL,
  `warna_background` varchar(255) DEFAULT NULL,
  `warna_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `queue_setting`
--

INSERT INTO `queue_setting` (`id`, `nama_instansi`, `logo`, `alamat`, `telpon`, `email`, `running_text`, `youtube_id`, `warna_primary`, `warna_secondary`, `warna_accent`, `warna_background`, `warna_text`) VALUES
(1, 'PELAYANAN TERPADU CAMAT PADANG SELATAN ', 'kota-padang-seeklogo.png', 'Jl. Sutan Syahrir No.250, Mata Air, Kec. Padang Sel., Kota Padang, Sumatera Barat 25121', '558450845', 'oki2mail.com', 'SELAMAT DATANG DI KANTOR CAMAT PADANG SELATAN', 'aRVfc4yzY8E', '#26b54a', '#c39292', '#6083a9', '#36ba3f', '#ffffff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queue_antrian_admisi_ibfk_1` (`nik`);

--
-- Indexes for table `queue_pendaftaran`
--
ALTER TABLE `queue_pendaftaran`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `queue_penggilan_antrian`
--
ALTER TABLE `queue_penggilan_antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_antrian` (`antrian`);

--
-- Indexes for table `queue_setting`
--
ALTER TABLE `queue_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `queue_penggilan_antrian`
--
ALTER TABLE `queue_penggilan_antrian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `queue_setting`
--
ALTER TABLE `queue_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  ADD CONSTRAINT `queue_antrian_admisi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `queue_pendaftaran` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
