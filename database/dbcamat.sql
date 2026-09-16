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
  KEY `nik` (`nik`),
  CONSTRAINT `queue_antrian_admisi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `queue_pendaftaran` (`nik`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `queue_antrian_admisi` */

insert  into `queue_antrian_admisi`(`id`,`tanggal`,`nik`,`no_antrian`,`status`,`updated_date`) values 
(121,'2025-08-16',454545454,'001','1','2025-08-16 01:40:35'),
(122,'2025-08-16',94546494,'002','0',NULL),
(123,'2025-08-16',2147483647,'003','0',NULL),
(124,'2025-08-16',3530533,'004','0',NULL),
(125,'2025-08-16',94649643,'005','0',NULL),
(126,'2025-08-16',49604,'006','0',NULL),
(127,'2025-08-16',564646463,'007','0',NULL),
(128,'2025-08-16',484044,'008','0',NULL),
(129,'2025-08-16',9454954,'009','0',NULL),
(130,'2025-08-16',4540044,'010','1','2025-08-16 01:40:16');

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
(5353,'sfsfs','sfsfsfs'),
(35353,'sfsfsf','sfsfsfsf'),
(45454,'Remos','Hilng Di Ambil Orang'),
(49604,'Obos Besar','Pas Photo'),
(353533,'sfsfs','Pengurusan Pajak'),
(353535,'sdsfs','sffsfsfs'),
(435353,'sfsfs','sffsfsfs'),
(484044,'Sonia','Pengisian Battery'),
(604640,'Somai','urus ktp hilang'),
(656556,'gdgd','etetetet'),
(3530533,'Salman','Pengurusan Bansos'),
(4540044,'Muse','Pengurusan Buku Nikah'),
(8080000,'sds','sfsfsf'),
(9359359,'Ci Om','Urus Anak Hilang'),
(9454954,'Reino','Mengurus KK'),
(30538053,'sfsfsfs','kfksfjsksfs'),
(33535353,'sfsfsf','gsgsgsgs'),
(45445467,'ssfsf','pai makan'),
(45454542,'sotoy','spfsofsofsos'),
(53535353,'wrwdw','fsfsfsfsfs'),
(80384035,'Farah','Urus Surat - Menyurat'),
(94546494,'Bebe','Mengurus KTP Hilang'),
(94649643,'Oki','Mengurus Surat Kesehatan'),
(454545454,'Hadi','Mengurus Surat Cerai'),
(564646463,'Hendrik','Pengurusan KTP Hilang'),
(954954444,'Nana','Mengurus Surat Nikah'),
(958408044,'sfsfs','makan'),
(2147483647,'Syahrul','Mengurs Akta Kelahiran');

/*Table structure for table `queue_penggilan_antrian` */

DROP TABLE IF EXISTS `queue_penggilan_antrian`;

CREATE TABLE `queue_penggilan_antrian` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `antrian` varchar(255) DEFAULT NULL,
  `loket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_antrian` (`antrian`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `list_loket` longtext DEFAULT NULL,
  `warna_primary` varchar(255) DEFAULT NULL,
  `warna_secondary` varchar(255) DEFAULT NULL,
  `warna_accent` varchar(255) DEFAULT NULL,
  `warna_background` varchar(255) DEFAULT NULL,
  `warna_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `queue_setting` */

insert  into `queue_setting`(`id`,`nama_instansi`,`logo`,`alamat`,`telpon`,`email`,`running_text`,`youtube_id`,`list_loket`,`warna_primary`,`warna_secondary`,`warna_accent`,`warna_background`,`warna_text`) values 
(1,'PELAYANAN TERPADU CAMAT PADANG SELATAN ','kota-padang-seeklogo.png','Jl. Sutan Syahrir No.250, Mata Air, Kec. Padang Sel., Kota Padang, Sumatera Barat 25121','558450845','oki2mail.com','SELAMAT DATANG DI KANTOR CAMAT PADANG SELATAN','Dfzmsb_57XM','[{\"no_loket\":\"1\",\"nama_loket\":\"Loket 1\"},{\"no_loket\":\"2\",\"nama_loket\":\"Loket 2\"},{\"no_loket\":\"3\",\"nama_loket\":\"Loket 3\"}]','#26b54a','#c39292','#6083a9','#36ba3f','#ffffff');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
