/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.22-MariaDB : Database - vci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vci` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `vci`;

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodebarang` varchar(256) DEFAULT NULL,
  `namabarang` varchar(256) DEFAULT NULL,
  `customer` varchar(256) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` text DEFAULT NULL,
  `netto` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id`,`kodebarang`,`namabarang`,`customer`,`qty`,`harga`,`netto`,`created_at`,`updated_at`) values 
(1,'1001','Minyak Zaitun','Fahmi',2,'25000','50000','2023-03-18 17:18:56',NULL),
(2,'2001','Miranda Semir Hitam','Amrullah',3,'12000','36000','2023-03-18 17:18:58',NULL),
(3,'3001','Nuface Lip Cream','Fahmi',2,'35000','70000','2023-03-18 17:19:01',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`created_at`) values 
(1,'herborist','$2y$10$RynQJA6pi5v3WusErsb/VOq1ljtMF5/aIa87HYCzNMdt2rTSXxWtm','herborist@vci.co.id','2023-03-18 04:00:43'),
(2,'miranda\r\n','$2y$10$2muwL1ZDlbUEIi1qtM5Pa.G.GTtTdXsHcAeDdQFftLoWNyESTOu0u','miranda@vci.co.id','2023-03-18 18:27:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
