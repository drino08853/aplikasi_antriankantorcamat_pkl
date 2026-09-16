-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2025 at 03:41 AM
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(8, 'SKCK'),
(9, 'SKBD'),
(10, 'SURAT KETERANGAN TIDAK MAMPU'),
(11, 'SUSUNAN KELUARGA'),
(12, 'DEPRESIASI NIKAH'),
(13, 'SURAT AHLI WARIS TANAH'),
(14, 'SURAT AHLI WARIS BIASA'),
(15, 'PEREKAMAN KTP EL'),
(16, 'PENDAFTARAN KTP EL'),
(17, 'MEMBUAT KK BARU'),
(20, 'SURAT PINDAH'),
(21, 'SURAT PINDAH DATANG'),
(22, 'REKOMENDASI PENELITIAN'),
(23, 'PERIBAHAN KK');

-- --------------------------------------------------------

--
-- Table structure for table `queue_antrian_admisi`
--

CREATE TABLE `queue_antrian_admisi` (
  `id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `no_antrian` varchar(3) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `queue_antrian_admisi`
--

INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `id_kategori`, `no_antrian`, `status`, `updated_date`) VALUES
(263, '2025-12-25', 9, '001', '1', '2025-12-25 17:31:55'),
(264, '2025-12-25', 10, '002', '0', NULL),
(265, '2025-12-25', 12, '003', '1', '2025-12-25 17:34:22'),
(266, '2025-12-25', 9, '004', '0', NULL),
(267, '2025-12-25', 9, '005', '0', NULL),
(268, '2025-12-25', 8, '006', '0', NULL),
(269, '2025-12-26', 13, '001', '1', '2025-12-26 09:05:15'),
(270, '2025-12-26', 12, '002', '1', '2025-12-26 09:05:47'),
(271, '2025-12-26', 13, '003', '1', '2025-12-26 09:08:05'),
(272, '2025-12-26', 13, '004', '1', '2025-12-26 09:08:10'),
(273, '2025-12-26', 13, '005', '1', '2025-12-26 09:08:21');

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
(1, 'PELAYANAN TERPADU CAMAT PADANG SELATAN ', 'kota-padang-seeklogo.png', 'Jl. Sutan Syahrir No.250, Mata Air, Kec. Padang Sel., Kota Padang, Sumatera Barat 25121', '558450845', 'koki12@gmail.com', 'SELAMAT DATANG DI KANTOR CAMAT PADANG SELATAN', 'aRVfc4yzY8E', '#11B72A', '#C39292', '#6083A9', '#36BA3F', '#FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `foto`) VALUES
(13, 'admin', 'admin', 'Loket', 'letter-l.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `queue_penggilan_antrian`
--
ALTER TABLE `queue_penggilan_antrian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `queue_setting`
--
ALTER TABLE `queue_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  ADD CONSTRAINT `queue_antrian_admisi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
