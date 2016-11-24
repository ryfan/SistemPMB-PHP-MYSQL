# Host: localhost  (Version: 5.6.20)
# Date: 2016-09-01 17:12:22
# Generator: MySQL-Front 5.2  (Build 5.66)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;

DROP DATABASE IF EXISTS `skripsi_pmb`;
CREATE DATABASE `skripsi_pmb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `skripsi_pmb`;

#
# Source for table "bayar"
#

DROP TABLE IF EXISTS `bayar`;
CREATE TABLE `bayar` (
  `no_bayar` varchar(4) NOT NULL DEFAULT '',
  `tgl_bayar` date DEFAULT NULL,
  `no_form` varchar(4) DEFAULT NULL,
  `nama_panitia` varchar(30) DEFAULT NULL,
  `jml_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_bayar`),
  KEY `no_form` (`no_form`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabel bayar';

#
# Data for table "bayar"
#

INSERT INTO `bayar` VALUES ('0001','2016-08-10','0001','admin',250000),('0002','2016-05-18','0002','ryfan',500000),('0003','2016-08-01','0003','ryfan',250000),('0004','2016-08-02','0004','iqbal',250000),('0005','2016-08-21','0005','iqbal',250000),('0006','2016-02-02','0007','ryfan',250000);

#
# Source for table "calon_mhs"
#

DROP TABLE IF EXISTS `calon_mhs`;
CREATE TABLE `calon_mhs` (
  `id_cln` varchar(4) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `no_ijasah` varchar(16) DEFAULT NULL,
  `nem` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_cln`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabel calon mahasiswa';

#
# Data for table "calon_mhs"
#

INSERT INTO `calon_mhs` VALUES ('0001','Ryfan Aditya Indra','Karawaci','085966235018','DN-30 Ma 0016880','40,22'),('0002','Edi Susanto','Bintaro','094209402922','DN-30 Ma 0016890','42,22'),('0004','Muhamad Ade Kurniawan','Jl.Ciledug Raya Petukangan Utara\r\nUniversitas Budi Luhur','08987000443','DN-30 Ma 0016887','40,00'),('0005','Jokoooo','Pondokkk Arenn','4874837847','DN-30 Ma 0016882','45.00'),('0006','Saraaa','Pondokk Jagunk','48298392','DN-30 Ma 0016890','46,00'),('0007','Agusss','Klaten','92839283','DN-30 Ma 0016822','39,00'),('0008','Jono','kampung rambutan','84787429','DN-249829-AMAS-A','40.33');

#
# Source for table "formulir"
#

DROP TABLE IF EXISTS `formulir`;
CREATE TABLE `formulir` (
  `no_form` varchar(4) NOT NULL DEFAULT '',
  `tgl_form` date DEFAULT NULL,
  `id_cln` varchar(4) DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`no_form`),
  KEY `id_cln` (`id_cln`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabel formulir';

#
# Data for table "formulir"
#

INSERT INTO `formulir` VALUES ('0001','2016-07-01','0001','77722-ryfan.docx','application/vnd.openxmlformats',12),('0002','2016-07-02','0002','35366-ryfan.docx','application/vnd.openxmlformats',12),('0003','2016-08-11','0004','74909-penilaian-pembimbing.docx','application/vnd.openxmlformats',456),('0004','2016-08-17','0007','85157-penilaian-sidang-skripsi.docx','application/vnd.openxmlformats',465),('0005','2016-08-21','0005','53905-formulir.zip','application/x-zip-compressed',608),('0006','2016-02-02','0008','70715-jcreator.exe','application/octet-stream',4972),('0007','2016-02-02','0006','46729-tag-completion.xml','text/xml',69);

#
# Source for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='tabel user';

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','admin','admin'),(3,'iqbal','iqbal','iqbal'),(7,'ryfan','ryfan','ryfan');

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
