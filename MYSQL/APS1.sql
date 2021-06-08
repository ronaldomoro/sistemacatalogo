/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.52-0ubuntu0.14.04.1 : Database - trabalho_php
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`trabalho_php` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `trabalho_php`;

/*Table structure for table `ator` */

DROP TABLE IF EXISTS `ator`;

CREATE TABLE `ator` (
  `cod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `ator` */

insert  into `ator`(`cod`,`nome`) values (8,'ATOR 1'),(9,'ATOR 2'),(10,'ATOR 3');

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `cod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

insert  into `categoria`(`cod`,`nome`) values (1,'CATEGORIA 1'),(2,'CATEGORIA 2'),(3,'CATEGORIA 3');

/*Table structure for table `cinema` */

DROP TABLE IF EXISTS `cinema`;

CREATE TABLE `cinema` (
  `cod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `cinema` */

insert  into `cinema`(`cod`,`nome`,`endereco`) values (3,'CINEMA 1','ENDERECO 1'),(4,'CINEMA 2','ENDERECO 2'),(5,'CINEMA 3','ENDERECO 3');

/*Table structure for table `estudio` */

DROP TABLE IF EXISTS `estudio`;

CREATE TABLE `estudio` (
  `cod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `estudio` */

insert  into `estudio`(`cod`,`nome`) values (2,'ESTUDIO 1'),(3,'ESTUDIO 2'),(4,'ESTUDIO 3');

/*Table structure for table `filato` */

DROP TABLE IF EXISTS `filato`;

CREATE TABLE `filato` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `filme_cod` int(10) unsigned NOT NULL,
  `ator_cod` int(10) unsigned NOT NULL,
  `personagem` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod`,`filme_cod`,`ator_cod`),
  KEY `filme_has_ator_FKIndex1` (`filme_cod`),
  KEY `filme_has_ator_FKIndex2` (`ator_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `filato` */

insert  into `filato`(`cod`,`filme_cod`,`ator_cod`,`personagem`) values (1,1,8,'JOSE MAIER'),(2,4,10,'RAFAEL CABRAL');

/*Table structure for table `filme` */

DROP TABLE IF EXISTS `filme`;

CREATE TABLE `filme` (
  `cod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estudio_cod` int(10) unsigned NOT NULL,
  `categoria_cod` int(10) unsigned NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `ano` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `filmecat_FKIndex2` (`categoria_cod`),
  KEY `filmeest_FKIndex2` (`estudio_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `filme` */

insert  into `filme`(`cod`,`estudio_cod`,`categoria_cod`,`nome`,`ano`) values (1,2,1,'FILME 1',2017),(3,3,2,'FILME 2',2017),(4,4,3,'FILME 3',2017);

/*Table structure for table `horario` */

DROP TABLE IF EXISTS `horario`;

CREATE TABLE `horario` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `cinema_cod` int(10) unsigned NOT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`cod`,`data`),
  KEY `horario_FKIndex1` (`cinema_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `horario` */

insert  into `horario`(`cod`,`data`,`cinema_cod`,`hora`) values (2,'2017-11-25',5,'12:34:00'),(3,'2017-11-23',4,'09:45:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
