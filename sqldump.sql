/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.38-MariaDB : Database - jeux_video_store
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jeux_video_store` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jeux_video_store`;

/*Table structure for table `commande` */

DROP TABLE IF EXISTS `commande`;

CREATE TABLE `commande` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateurID` int(11) DEFAULT NULL,
  `statutCommandeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `statutCommandeID` (`statutCommandeID`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`ID`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`statutCommandeID`) REFERENCES `statut_commande` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `commande` */

insert  into `commande`(`ID`,`utilisateurID`,`statutCommandeID`) values 
(5,10,1),
(6,10,1),
(7,19,1),
(8,19,1);

/*Table structure for table `commande_produit` */

DROP TABLE IF EXISTS `commande_produit`;

CREATE TABLE `commande_produit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `commandeID` int(11) DEFAULT NULL,
  `produitID` int(11) DEFAULT NULL,
  `Prix` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `commandeID` (`commandeID`),
  KEY `produitID` (`produitID`),
  CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`commandeID`) REFERENCES `commande` (`ID`),
  CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`produitID`) REFERENCES `produit` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `commande_produit` */

insert  into `commande_produit`(`ID`,`commandeID`,`produitID`,`Prix`) values 
(2,5,5,NULL),
(3,6,7,NULL),
(4,7,6,NULL),
(5,8,7,NULL);

/*Table structure for table `console` */

DROP TABLE IF EXISTS `console`;

CREATE TABLE `console` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `console` */

insert  into `console`(`ID`,`nom`) values 
(1,'xBox'),
(2,'PC'),
(3,'Playstation'),
(4,'Wii');

/*Table structure for table `genre` */

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `genre` */

insert  into `genre`(`ID`,`nom`) values 
(1,'RPG'),
(2,'FPS'),
(3,'Action'),
(4,'Sport'),
(5,'Stratégie'),
(6,'Combat'),
(7,'Sport'),
(8,'Automobile'),
(9,'VR');

/*Table structure for table `limite_age` */

DROP TABLE IF EXISTS `limite_age`;

CREATE TABLE `limite_age` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `limite_age` */

insert  into `limite_age`(`ID`,`nom`) values 
(1,3),
(2,7),
(3,12),
(4,16);

/*Table structure for table `multijoueur` */

DROP TABLE IF EXISTS `multijoueur`;

CREATE TABLE `multijoueur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `multijoueur` */

insert  into `multijoueur`(`ID`,`nom`) values 
(1,'solo'),
(2,'mmo'),
(3,'coop local'),
(4,'coop online'),
(5,'coop local & online');

/*Table structure for table `produit` */

DROP TABLE IF EXISTS `produit`;

CREATE TABLE `produit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prix` decimal(9,2) DEFAULT NULL,
  `consoleID` int(11) DEFAULT NULL,
  `genreID` int(11) DEFAULT NULL,
  `limite_ageID` int(11) DEFAULT NULL,
  `multijoueurID` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `consoleID` (`consoleID`),
  KEY `genreID` (`genreID`),
  KEY `limite_ageID` (`limite_ageID`),
  KEY `multijoueurID` (`multijoueurID`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`consoleID`) REFERENCES `console` (`ID`),
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`genreID`) REFERENCES `genre` (`id`),
  CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`limite_ageID`) REFERENCES `limite_age` (`id`),
  CONSTRAINT `produit_ibfk_4` FOREIGN KEY (`multijoueurID`) REFERENCES `multijoueur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `produit` */

insert  into `produit`(`ID`,`nom`,`prix`,`consoleID`,`genreID`,`limite_ageID`,`multijoueurID`,`image`,`description`) values 
(3,'testnasal',10.00,2,1,4,2,'','blabla'),
(4,'testcreateimage',15.00,1,1,1,1,'hitler.jpg','blablabis'),
(5,'testcreateimage2',11.00,1,1,1,1,NULL,'blablabisbis'),
(6,'testcreateimage3',13.00,1,1,1,1,NULL,''),
(7,'testcreateimage4',14.00,1,1,1,1,'BuzzLeclair.jpg','fgdfg'),
(8,'testcreateimage5',16.00,1,1,1,1,'','dfsdf'),
(9,'testcreateimage6',11.00,1,1,1,1,'public/images/DrinkOrDrive.jpg','qsdsq'),
(10,'testcreateimage8',12.00,1,1,1,1,'public/images/hitler.jpg','blablabis');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`ID`,`nom`) values 
(1,'Admin'),
(2,'Gérant'),
(3,'Client');

/*Table structure for table `statut_commande` */

DROP TABLE IF EXISTS `statut_commande`;

CREATE TABLE `statut_commande` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `statut_commande` */

insert  into `statut_commande`(`ID`,`nom`) values 
(1,'En attente');

/*Table structure for table `utilisateur` */

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `rue` varchar(25) DEFAULT NULL,
  `numero` varchar(25) DEFAULT NULL,
  `cp` varchar(25) DEFAULT NULL,
  `localite` varchar(25) DEFAULT NULL,
  `mail` varchar(25) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `roleID` (`roleID`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`ID`,`login`,`nom`,`prenom`,`rue`,`numero`,`cp`,`localite`,`mail`,`roleID`,`password`) values 
(6,'mail','mail','mail',NULL,NULL,NULL,NULL,'mail',NULL,'$2y$10$H9sLE4h30h/mgR.wyJ'),
(8,'456','46','456',NULL,NULL,NULL,NULL,'456',NULL,'456'),
(9,'789','789','789',NULL,NULL,NULL,NULL,'789',NULL,'$2y$10$JtseFP6coFAGT9G0iU'),
(10,'10','10','10',NULL,NULL,NULL,NULL,'10@mail.com',NULL,'$2y$10$zZh9HP/2Dxww12AGZCV6TOAJ99dUaGf5ziqY6tXSBGvezxnYDkHJe'),
(12,'11','11','11',NULL,NULL,NULL,NULL,'11@11.com',NULL,'$2y$10$0Ji75CWbB/GAPUYvFmymbuLV4bfA9EqNLLL4FXzFlQTfkc4Wu23w2'),
(13,'12','12','12',NULL,NULL,NULL,NULL,'12',NULL,'$2y$10$GAeP0cHLieXIMS/zQvR/XuYOP0X2c3avqhx5GU3/ImR/X6ojSVBR.'),
(14,'13','13','13',NULL,NULL,NULL,NULL,'13',NULL,'$2y$10$IS4dNQ9Mm9XitmSzq5LmKOnzQ4/4vopOjy0r91eN/dzL725fJZoTu'),
(15,'15','15','15',NULL,NULL,NULL,NULL,'15',NULL,'$2y$10$Z8JQn7ExmWNDCuj5R4G/KeJ6Mzd82/qg9r1lq8QdFnfkYpy9PGiGC'),
(16,'16','16','16',NULL,NULL,NULL,NULL,'16@mail.com',NULL,'$2y$10$uiMovWn30KixRNXZV1NC4eoKRc8cocLCGxbiioZ4aCnpRoc2h6tWq'),
(17,'test15','test15','test15',NULL,NULL,NULL,NULL,'test17@mail.com',2,'$2y$10$i8arpR9x97bj9ELGPPZnNO7DWYuIBJu53Wjk58J5pVE6.wRd1uoXO'),
(18,'admin','admin','admin',NULL,NULL,NULL,NULL,NULL,1,'$2y$10$UwNhrDKI6QbZb7V.g8ZyIO/VfjzZbVw1RX9rOntteWLT/wXIDnGZ6'),
(19,'user1','user1','user1',NULL,NULL,NULL,NULL,'user1@mail.com',3,'$2y$10$.uFsif4tidKLJEFn0/jH/.xDNAKcxRnZ3kn6t/HZFR41dNy2Bfa9i');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
