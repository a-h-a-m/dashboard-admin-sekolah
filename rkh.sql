/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.28-MariaDB : Database - rkh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rkh` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rkh`;

/*Table structure for table `tb_kerja` */

DROP TABLE IF EXISTS `tb_kerja`;

CREATE TABLE `tb_kerja` (
  `id_kerja` tinyint(10) NOT NULL AUTO_INCREMENT,
  `tanggal_shift` varchar(10) DEFAULT NULL,
  `masalah` varchar(300) DEFAULT NULL,
  `solusi` varchar(300) DEFAULT NULL,
  `hasil` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kerja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kerja` */

/*Table structure for table `tb_shift` */

DROP TABLE IF EXISTS `tb_shift`;

CREATE TABLE `tb_shift` (
  `tgl_shift` varchar(10) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `id_staff` tinyint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_shift` */

/*Table structure for table `tb_staff` */

DROP TABLE IF EXISTS `tb_staff`;

CREATE TABLE `tb_staff` (
  `id_staff` varchar(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(10) DEFAULT NULL,
  `no_hp` int(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_staff`),
  UNIQUE KEY `id_staff` (`id_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_staff` */

insert  into `tb_staff`(`id_staff`,`nama`,`alamat`,`tgl_lahir`,`no_hp`,`email`,`status`) values ('ST1','Agus','Padangsambian','1992-03-01',2147483647,'wirayasa.agus@gmail.com','1'),('ST2','Wirayasa','Denpasar Barat','1883-01-01',2147483647,'wira_ichigo@yahoo.com','1'),('ST3','Indra Lesmana','Gunung Penangkaran','1994-09-01',2147483647,'wirayasa.agus@gmail.com','1'),('ST4','Wirayasa','Gunung Indrakila','2019-03-20',2147483647,'wira_ichigo@yahoo.com','0');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`user_role`) values (1,'admin','admin','admin'),(2,'staff','staff','staff'),(3,'wirahul','wirahul','admin'),(4,'user','user','staff'),(5,'pondoku','pondoku','staff');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
