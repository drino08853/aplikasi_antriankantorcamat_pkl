-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 12:29 PM
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
  `nik` varchar(100) NOT NULL,
  `no_antrian` varchar(3) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `queue_antrian_admisi`
--

INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `nik`, `no_antrian`, `status`, `updated_date`) VALUES
(227, '2025-08-23', '940496044646', '001', '1', '2025-08-23 09:08:36'),
(228, '2025-08-23', '948496849694', '002', '1', '2025-08-23 09:09:58'),
(229, '2025-08-23', '9485945', '003', '1', '2025-08-23 09:19:21'),
(230, '2025-08-23', '4980486403', '004', '1', '2025-08-23 09:30:19'),
(231, '2025-08-28', '05964040460', '001', '1', '2025-08-28 10:23:22'),
(232, '2025-08-28', '049546404644', '002', '1', '2025-08-28 10:23:40'),
(233, '2025-08-28', '05695065605', '003', '1', '2025-08-28 11:09:39'),
(234, '2025-08-28', '9485944', '004', '1', '2025-08-28 11:10:26'),
(235, '2025-08-28', '948549584', '005', '1', '2025-08-28 11:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `queue_pendaftaran`
--

CREATE TABLE `queue_pendaftaran` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `queue_pendaftaran`
--

INSERT INTO `queue_pendaftaran` (`nik`, `nama`, `keperluan`) VALUES
('049546404644', 'Andika', 'Mengurus Akta Kelahiran'),
('05695065605', 'Puput', 'Mengurus Surat Warisa'),
('05964040460', 'Burhanudin', 'Urus KTP Hilang'),
('4980486403', 'Fahmi', 'Urus Surat Ahli Waris'),
('940496044646', 'Ubud', 'Mengurus Sim'),
('948496849694', 'Rizky', 'Mengurus Surat Nikah'),
('948549584', 'Reynold', 'Ngurus KTP Hilang'),
('9485944', 'Armon', 'Surat Cerai'),
('9485945', 'Tomi', 'Mengurus Surat Cerai');

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
-- Indexes for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `queue_antrian_admisi`
--
ALTER TABLE `queue_antrian_admisi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `queue_penggilan_antrian`
--
ALTER TABLE `queue_penggilan_antrian`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

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
  ADD CONSTRAINT `queue_antrian_admisi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `queue_pendaftaran` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
