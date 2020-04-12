/*
SQLyog Community Edition- MySQL GUI v8.17 
MySQL - 5.1.33-community : Database - CakeBattles
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`CakeBattles` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `CakeBattles`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`last_login`,`status`) values (1,'admin','a2491e2e9f0efef62b7f724a65fd71b5','2010-02-02 06:41:46',1);

/*Table structure for table `battles` */

DROP TABLE IF EXISTS `battles`;

CREATE TABLE `battles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contender_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `against` int(11) NOT NULL,
  `won` enum('yes','no') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'no',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);

/*Data for the table `battles` */

/*Table structure for table `contender_items` */

DROP TABLE IF EXISTS `contender_items`;

CREATE TABLE `contender_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contender_id` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);

/*Data for the table `contender_items` */

/*Table structure for table `contenders` */

DROP TABLE IF EXISTS `contenders`;

CREATE TABLE `contenders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `battles` int(11) NOT NULL DEFAULT '0',
  `won` int(11) NOT NULL DEFAULT '0',
  `lost` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);

/*Data for the table `contenders` */

/*Table structure for table `contenders_tags` */

DROP TABLE IF EXISTS `contenders_tags`;

CREATE TABLE `contenders_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contender_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

/*Data for the table `contenders_tags` */

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
);

/*Data for the table `tags` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
