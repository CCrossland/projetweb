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
  `total` decimal(9,2) DEFAULT '0.00',
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `utilisateurID` (`utilisateurID`),
  KEY `statutCommandeID` (`statutCommandeID`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`utilisateurID`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`statutCommandeID`) REFERENCES `statut_commande` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `commande` */

insert  into `commande`(`ID`,`utilisateurID`,`statutCommandeID`,`total`,`date`) values 
(40,29,1,9.99,'2020-04-19 21:40:56'),
(41,29,1,29.99,'2020-04-19 21:41:39'),
(42,29,1,69.98,'2020-04-19 21:42:43'),
(43,29,1,249.95,'2020-04-19 21:44:11'),
(44,19,1,89.98,'2020-04-20 12:16:17'),
(45,19,1,59.99,'2020-04-20 12:17:10'),
(46,19,1,179.99,'2020-04-20 12:18:50'),
(47,19,1,29.99,'2020-04-20 12:19:59'),
(48,19,1,59.99,'2020-04-20 12:20:28'),
(49,19,1,59.99,'2020-04-20 12:26:17'),
(50,18,1,179.97,'2020-04-21 02:04:22'),
(51,19,1,89.98,'2020-04-21 14:42:48'),
(52,19,1,199.95,'2020-04-21 15:18:37'),
(53,19,1,189.94,'2020-04-21 15:25:22'),
(54,30,1,109.98,'2020-04-22 11:29:00'),
(55,18,1,49.99,'2020-04-24 12:21:55'),
(56,18,1,59.99,'2020-04-24 12:30:12'),
(57,18,1,169.97,'2020-04-24 13:49:20'),
(58,32,1,119.98,'2020-04-24 13:52:43'),
(59,30,1,59.99,'2020-04-28 16:49:09');

/*Table structure for table `commande_produit` */

DROP TABLE IF EXISTS `commande_produit`;

CREATE TABLE `commande_produit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `commandeID` int(11) DEFAULT NULL,
  `produitID` int(11) DEFAULT NULL,
  `prix` decimal(9,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`ID`),
  KEY `commandeID` (`commandeID`),
  KEY `produitID` (`produitID`),
  CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`commandeID`) REFERENCES `commande` (`ID`),
  CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`produitID`) REFERENCES `produit` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

/*Data for the table `commande_produit` */

insert  into `commande_produit`(`ID`,`commandeID`,`produitID`,`prix`) values 
(55,40,22,9.99),
(56,41,30,29.99),
(57,42,22,9.99),
(58,42,25,59.99),
(59,43,22,9.99),
(60,43,25,59.99),
(61,43,28,59.99),
(62,43,19,59.99),
(63,43,16,59.99),
(64,44,25,59.99),
(65,44,17,29.99),
(66,45,28,59.99),
(67,46,15,179.99),
(68,47,17,29.99),
(69,48,24,59.99),
(70,49,20,59.99),
(71,50,36,59.99),
(72,50,37,59.99),
(73,50,40,59.99),
(74,51,38,59.99),
(75,51,17,29.99),
(76,52,39,59.99),
(77,52,22,9.99),
(78,52,26,49.99),
(79,52,33,19.99),
(80,52,25,59.99),
(81,53,29,19.99),
(82,53,34,19.99),
(83,53,33,19.99),
(84,53,34,19.99),
(85,53,21,59.99),
(86,53,26,49.99),
(87,54,28,59.99),
(88,54,26,49.99),
(89,55,26,49.99),
(90,56,28,59.99),
(91,57,26,49.99),
(92,57,27,59.99),
(93,57,32,59.99),
(94,58,27,59.99),
(95,58,28,59.99),
(96,59,44,59.99);

/*Table structure for table `console` */

DROP TABLE IF EXISTS `console`;

CREATE TABLE `console` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `console` */

insert  into `console`(`ID`,`nom`) values 
(1,'xBox'),
(2,'PC'),
(3,'Playstation'),
(4,'Wii'),
(5,'Switch');

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
(4,16),
(5,18);

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
(5,'coop local & online'),
(6,'online');

/*Table structure for table `produit` */

DROP TABLE IF EXISTS `produit`;

CREATE TABLE `produit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prix` decimal(9,2) NOT NULL DEFAULT '0.00',
  `consoleID` int(11) DEFAULT NULL,
  `genreID` int(11) DEFAULT NULL,
  `limite_ageID` int(11) DEFAULT NULL,
  `multijoueurID` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT '1',
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `consoleID` (`consoleID`),
  KEY `genreID` (`genreID`),
  KEY `limite_ageID` (`limite_ageID`),
  KEY `multijoueurID` (`multijoueurID`),
  CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`consoleID`) REFERENCES `console` (`ID`),
  CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`genreID`) REFERENCES `genre` (`id`),
  CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`limite_ageID`) REFERENCES `limite_age` (`id`),
  CONSTRAINT `produit_ibfk_4` FOREIGN KEY (`multijoueurID`) REFERENCES `multijoueur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `produit` */

insert  into `produit`(`ID`,`nom`,`prix`,`consoleID`,`genreID`,`limite_ageID`,`multijoueurID`,`image`,`description`,`actif`,`video`) values 
(15,'Fallout_76',179.99,2,1,3,2,'public/images/turd76jpg.jpg','Consulte un médecin pour ton état de santé mentale si tu comptes acheter ce truc',0,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(16,'Fortnight',59.99,2,2,1,6,'public/images/15-Brilliant-Toys-For-Autistic-Children-To-Play-And-Learn.jpg','Dégâts mentaux irréversibles garantis',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(17,'Darkest_Dungeon',29.99,2,5,4,1,'public/images/91b2e81e9b5482d1c64f7875317317c6_390x400_1x-0.jpg','Parfait pour s\'occuper en cours du soir',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(18,'Walking_Simulator',59.99,3,1,5,1,'public/images/Death-Stranding-PS4.jpg','ft. Daryl & Seydoux (Dieu sait ce qui les a embarqué à jouer dans cette daube)',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(19,'The_Witcher_3',59.99,2,1,5,1,'public/images/1422469608-7141-jaquette-avant.jpeg','Le seul jeu underrated en ayant 20/20',1,'https://www.youtube.com/embed/c0i88t0Kacs'),
(20,'Metal_Gear_Solid_5',59.99,3,1,5,1,'public/images/1425933401-9477-jaquette-avant.jpg','Potable mais pourquoi un bras bionique ROUGE ???',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(21,'DOOM_Eternal',59.99,5,2,4,1,'public/images/1560427186-2226-jaquette-avant.jpeg','Donc on se réveille sur un autre monde et on doit bash du démon et des mort-vivants... pourquoi déjà? parce que ta gueule',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(22,'League_of_Legend',9.99,2,5,3,2,'public/images/jaquette-league-of-legends-pc-cover-avant-g.jpeg','Source de revenu principale des petits réparateurs de PC',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(23,'Call_of_Duty_(PS4)',59.99,3,2,5,6,'public/images/Call-of-Duty-Modern-Warfare-PS4.jpg','Le même jeu recyclé depuis 1998, enjoy!',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(24,'Call_of_Duty_(PC)',59.99,2,2,4,6,'public/images/call-of-duty-modern-warfare-2019_large.png','Le même jeu recyclé depuis 1998, enjoy!',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(25,'The_Last_of_Us_2',59.99,3,1,4,1,'public/images/FIGFP4824_1.jpg','Coming soon -- Le scénario a intérêt à être un chef d\'oeuvre',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(26,'Lost_Ember',49.99,4,1,1,1,'public/images/lost_ember_xBox.jpg','Vous aimez bien les renards? Jouez à ce jeu',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(27,'Past_Cure_(PC)',59.99,3,1,1,1,'public/images/past_cure_ps4_.jpg','Aucune idée de quoi ce jeu parle',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(28,'Past_Cure_(xBox)',59.99,1,1,3,1,'public/images/PastCure_box_pc.png','Aucune idée de quoi ce jeu parle',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(29,'Minecraft',19.99,2,1,2,2,'public/images/minecraft-cover.jpeg','Apparemment des gens deviennent riches en farmant de l\'or sur ce jeu sorti des années 60, faudrait que je m\'y mette',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(30,'Les_Simpson',29.99,4,3,2,1,'public/images/lsljwi0f.jpg','Tu aimes te moquer des gros chauves? Ce jeu est pour toi.',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(31,'Animal_Crossing',49.99,5,5,1,2,'public/images/Animal-Croing-New-Horizons-Nintendo-Switch.jpg','Substitut d\'environnement social en période de confinement',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(32,'Jumanji',59.99,5,3,1,1,'public/images/819E5rW6diL._AC_SY500_.jpg','Jouer the Rock n\'augmente pas ton sex appeal',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(33,'Overcooked',19.99,5,3,2,3,'public/images/10019750510622.jpg','Responsable de 98% des ruptures et des meurtres multiples au milieu d\'une \"petite soirée entre amis\"',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(34,'Interville',19.99,4,4,1,1,'public/images/jaquette-intervilles-wii-cover-avant-g.jpg','Bonus: Cécile de Ménibus ne ressemblait pas encore à une momie!',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(35,'Just_Cause_4',59.99,1,3,5,1,'public/images/518ad1bb22784b5a8755c0879fbaf68a.jpeg','Exploseur de vaches simulator',0,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(36,'Just_Cause_4',59.99,1,3,5,1,'public/images/518ad1bb22784b5a8755c0879fbaf68a.jpeg','Exploseur de vaches simulator',1,'https://www.youtube.com/embed/Lfek7Kcq16g'),
(37,'The_division_2',59.99,1,1,5,1,'public/images/9908369260574.jpg','Un jeu post-apocalyptique sans zombies? Quel gâchis...',1,'https://www.youtube.com/embed/sli7AbX2bEk'),
(38,'Far_Cry_3',59.99,1,1,5,1,'public/images/9935665561630.jpg','Avant que les far cry soient des daubes recyclées il ya eu cette claque',1,'https://www.youtube.com/embed/rKMMCPeiQoc'),
(39,'Gears_5',59.99,1,2,5,1,'public/images/badae48cf2a4a14d9c0744e193c0b1d3.jpg','Ils ont fait un jeu pour les macho manque de virilité.',1,'https://www.youtube.com/embed/SEpWlFfpEkU'),
(40,'Far_Cry_5',59.99,1,1,5,4,'public/images/far-cry-5-jeu-xbox-one.jpg','Cas d\'école sur comment détruire une bonne licence',1,'https://www.youtube.com/embed/Kdaoe4hbMso'),
(41,'Ghost_Recon',59.99,3,3,5,6,'public/images/91pvt7NzDpL._AC_SL1500_.jpg','\'Un_jour_normal_en_Colombie\' Simulator',1,'https://www.youtube.com/embed/y-9_d3IT_yA'),
(42,'Fallout_76',666.66,2,1,4,2,'public/images/turd76jpg.jpg','le jeu du diable',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(44,'Red_Dead_Redemption_2',59.99,3,1,5,1,'public/images/red-dead-redemption-2-standard-edition-cover.jpg','N\'oubliez pas de retirer votre chapeau en sortant de chez vous après',1,'https://www.youtube.com/embed/dQw4w9WgXcQ'),
(45,'Resident_Evil_3',59.99,3,3,5,1,'public/images/1576066738-4915-jaquette-avant.jpg','Une question demeure : Pourquoi donner cette coupe à Carlos???',1,'https://www.youtube.com/embed/9LrLM4Hvr9U');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `statut_commande` */

insert  into `statut_commande`(`ID`,`nom`) values 
(1,'En attente'),
(2,'Panier'),
(3,'Payé'),
(4,'Livraison en cours'),
(5,'Archive');

/*Table structure for table `utilisateur` */

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `roleID` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `roleID` (`roleID`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `utilisateur` */

insert  into `utilisateur`(`ID`,`login`,`nom`,`prenom`,`mail`,`roleID`,`password`,`actif`) values 
(18,'admin','admin','admin','admin@admin.admin',1,'$2y$10$UwNhrDKI6QbZb7V.g8ZyIO/VfjzZbVw1RX9rOntteWLT/wXIDnGZ6',1),
(19,'user1','user1','user1','user1@mail.com',3,'$2y$10$.uFsif4tidKLJEFn0/jH/.xDNAKcxRnZ3kn6t/HZFR41dNy2Bfa9i',1),
(25,'RobertLeGamer42','LeChauffeur','Robert','Robert@yahoo.fr',3,'$2y$10$Zyr9SmKoKb514sfvw07fDOwtZpHX9ua4KSLo4NQ1ceNVIvvdm2Uwq',1),
(26,'Kevin666','LeMorveux','Kévin','KevinKilleur666@bing.fr',3,'$2y$10$DhDhcpW9liNWhJnHfDaFZeASyRePW9Ivc9U2RSzOxnj8MZQyPY2Wi',1),
(27,'Random','Blublu','Je ne sais plus','Jenesaisplusnonplus@jesai',3,'$2y$10$QodDDYg4bJNFnr2/lmOaVelpNLZ3Llhw0vP7DaTQSgysUUBpDn8q2',1),
(28,'BryanKillerRoxxor404','Kévin','Bryan','Bryan@gmail.com',3,'$2y$10$cpKMPXjqz9FgKQtM9yS9D..3OeUkRMIktgGCl.A5JFZCWgUZ1y9Hm',1),
(29,'Pseudo','NomAléatoire','PrénomCommeça','mail@mail.com',3,'$2y$10$nov2PLYLBdEwMLb1H/KqV.zm7zW7Iw//n88TnUu6/bHsWgFWsv4AW',1),
(30,'bidon','bidon','bidon','bidon@bidon.bidon',3,'$2y$10$7WwguWIl6VXT53fOMHtk5.Jsgl3SHld.no1ZAlaJAKr7EiwFR1OdC',1),
(31,'testAchat','testGamer','testGamer','testAchat@testAchat.com',3,'$2y$10$8Ao1FQZmkTe5aafkiPx7q.LhEC3R9a7/eUd2q.yH8uwg60HNrRTUS',0),
(32,'BertrandBamboozer','Bertrand','JsuisUnOuf','Bertrand007@hotmail.srilanka',3,'$2y$10$p9tFYQxOxUtLnVGBsRGEt.BQ0Tuse/qeMGzxCfnF0CZGFYi95boO.',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
