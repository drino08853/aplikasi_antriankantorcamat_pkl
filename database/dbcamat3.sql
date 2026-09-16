/*
SQLyog Trial v13.1.9 (64 bit)
MySQL - 10.4.32-MariaDB : Database - db_antrian_kantorcamat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_antrian_kantorcamat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_antrian_kantorcamat`;

/*Table structure for table `queue_antrian_admisi` */

DROP TABLE IF EXISTS `queue_antrian_admisi`;

CREATE TABLE `queue_antrian_admisi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `no_antrian` varchar(3) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nik` (`nik`),
  CONSTRAINT `queue_antrian_admisi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `queue_pendaftaran` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `queue_antrian_admisi` */

insert  into `queue_antrian_admisi`(`id`,`tanggal`,`nik`,`no_antrian`,`status`,`updated_date`) values 
(227,'2025-08-23','940496044646','001','1','2025-08-23 09:08:36'),
(228,'2025-08-23','948496849694','002','1','2025-08-23 09:09:58'),
(229,'2025-08-23','9485945','003','1','2025-08-23 09:19:21'),
(230,'2025-08-23','4980486403','004','1','2025-08-23 09:30:19');

/*Table structure for table `queue_pendaftaran` */

DROP TABLE IF EXISTS `queue_pendaftaran`;

CREATE TABLE `queue_pendaftaran` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `queue_pendaftaran` */

insert  into `queue_pendaftaran`(`nik`,`nama`,`keperluan`) values 
('4980486403','Fahmi','Urus Surat Ahli Waris'),
('940496044646','Ubud','Mengurus Sim'),
('948496849694','Rizky','Mengurus Surat Nikah'),
('9485945','Tomi','Mengurus Surat Cerai');

/*Table structure for table `queue_penggilan_antrian` */

DROP TABLE IF EXISTS `queue_penggilan_antrian`;

CREATE TABLE `queue_penggilan_antrian` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `antrian` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_antrian` (`antrian`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `queue_penggilan_antrian` */

/*Table structure for table `queue_setting` */

DROP TABLE IF EXISTS `queue_setting`;

CREATE TABLE `queue_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `warna_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `queue_setting` */

insert  into `queue_setting`(`id`,`nama_instansi`,`logo`,`alamat`,`telpon`,`email`,`running_text`,`youtube_id`,`warna_primary`,`warna_secondary`,`warna_accent`,`warna_background`,`warna_text`) values 
(1,'PELAYANAN TERPADU CAMAT PADANG SELATAN ','kota-padang-seeklogo.png','Jl. Sutan Syahrir No.250, Mata Air, Kec. Padang Sel., Kota Padang, Sumatera Barat 25121','558450845','koki12@gmail.com','SELAMAT DATANG DI KANTOR CAMAT PADANG SELATAN','aRVfc4yzY8E','#11B72A','#C39292','#6083A9','#36BA3F','#FFFFFF');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama_lengkap`,`foto`) values 
(13,'admin','admin','Loket','letter-l.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
