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
  `nik` int(100) DEFAULT NULL,
  `no_antrian` varchar(3) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `queue_antrian_admisi_ibfk_1` (`nik`),
  CONSTRAINT `queue_antrian_admisi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `queue_pendaftaran` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `queue_antrian_admisi` */

insert  into `queue_antrian_admisi`(`id`,`tanggal`,`nik`,`no_antrian`,`status`,`updated_date`) values 
(174,'2025-08-18',95395389,'001','1','2025-08-18 09:24:14'),
(175,'2025-08-18',2147483647,'002','1','2025-08-18 09:28:06'),
(176,'2025-08-18',56904694,'003','1','2025-08-18 09:29:37'),
(177,'2025-08-18',868484,'004','1','2025-08-18 09:30:29'),
(178,'2025-08-18',904850454,'005','1','2025-08-18 09:36:43'),
(179,'2025-08-18',506950,'006','1','2025-08-18 09:52:03');

/*Table structure for table `queue_pendaftaran` */

DROP TABLE IF EXISTS `queue_pendaftaran`;

CREATE TABLE `queue_pendaftaran` (
  `nik` int(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `queue_pendaftaran` */

insert  into `queue_pendaftaran`(`nik`,`nama`,`keperluan`) values 
(506950,'kgpdpp','pdikfgpdgdpp'),
(868484,'ksfskfskk','ksfsfjsfosfso'),
(56904694,'skfsofkso','osdfksofkso'),
(95395389,'kfskfsk','kfskfjskfsjks'),
(904850454,'odkfod','osifosfos'),
(2147483647,'oddfkofks','sidpsfspsp');

/*Table structure for table `queue_penggilan_antrian` */

DROP TABLE IF EXISTS `queue_penggilan_antrian`;

CREATE TABLE `queue_penggilan_antrian` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `antrian` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_antrian` (`antrian`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(1,'PELAYANAN TERPADU CAMAT PADANG SELATAN ','kota-padang-seeklogo.png','Jl. Sutan Syahrir No.250, Mata Air, Kec. Padang Sel., Kota Padang, Sumatera Barat 25121','558450845','oki2mail.com','SELAMAT DATANG DI KANTOR CAMAT PADANG SELATAN','aRVfc4yzY8E','#26b54a','#c39292','#6083a9','#36ba3f','#ffffff');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
