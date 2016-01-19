#بسم الله الرحمن الرحيم
# Host     : localhost
# Port     : 3309
# Database : AFix
# ---------------------------------------
# Host     : localhost
# Port     : 3309
# Database : AFix



# SQL Manager 2007 for MySQL 4.3.0.1
# ---------------------------------------
# Host     : localhost
# Port     : 3309
# Database : AFix


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `AFix`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `AFix`;

#
# Structure for the `coustemers` table :
#

CREATE TABLE `coustemers` (
  `ID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(90) COLLATE utf8_general_ci DEFAULT NULL,
  `MobileNumber` VARCHAR(140) COLLATE utf8_general_ci DEFAULT NULL,
  `DateAdded` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
)ENGINE=InnoDB
AUTO_INCREMENT=19 ROW_FORMAT=DYNAMIC
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='';

#
# Structure for the `devices` table :
#

CREATE TABLE `devices` (
  `idDevices` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `Serial` VARCHAR(90) COLLATE utf8_general_ci DEFAULT NULL,
  `IDTypeDevice` TINYINT(3) DEFAULT NULL,
  `Comment` VARCHAR(140) COLLATE utf8_general_ci DEFAULT '',
  `DateAdded` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdCustemer` INTEGER(5) NOT NULL,
  `Mony` INTEGER(9) DEFAULT '0',
  `Finsh` ENUM('0','1') DEFAULT '0',
  `Ref` VARCHAR(140) COLLATE utf8_general_ci DEFAULT NULL,
  `tracNumber` VARCHAR(99) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`idDevices`),
  UNIQUE KEY `ID` (`idDevices`)
)ENGINE=MyISAM
AUTO_INCREMENT=19 ROW_FORMAT=DYNAMIC
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='';

#
# Structure for the `statusdevices` table :
#

CREATE TABLE `statusdevices` (
  `ID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(99) COLLATE utf8_croatian_ci NOT NULL DEFAULT '',
  `idDevices` INTEGER(9) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
)ENGINE=InnoDB
AUTO_INCREMENT=63 ROW_FORMAT=DYNAMIC
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='';

#
# Structure for the `typedevices` table :
#

CREATE TABLE `typedevices` (
  `ID` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `NameDevices` VARCHAR(90) COLLATE utf8_general_ci DEFAULT NULL,
  `imageUrl` VARCHAR(140) COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
)ENGINE=MyISAM
AUTO_INCREMENT=56 ROW_FORMAT=DYNAMIC
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT='';


#
# Data for the `typedevices` table  (LIMIT 0,500)
#

INSERT INTO `typedevices` (`ID`, `NameDevices`, `imageUrl`) VALUES
  (1,'iPhone 6 Black','1452157834.png'),
  (2,'iPhone 6 Sliver','1452159335.png'),
  (3,'iPhone 6 Plus Black','1452159365.png'),
  (4,'iPhone 6 Plus Silver','1452159386.png'),
  (5,'iPhone 6S gold','1452159544.png'),
  (6,'iPhone 6S black','1452159571.png'),
  (7,'iPhone 6S rosegold','1452159586.png'),
  (8,'iPhone 6S silver','1452159598.png'),
  (9,'iPhone 6S plus black','1452160005.png'),
  (10,'iPhone 6S plus gold','1452160013.png'),
  (11,'iPhone 6S plus silver','1452160021.png'),
  (12,'iPhone 6S plus rosegold','1452160029.png'),
  (13,'iPhone 6 gold','1452171019.jpg'),
  (14,'iPhone 6 plus gold','1452171039.jpg'),
  (15,'MacBook Pro','1452171169.png'),
  (16,'MacBook-Pro 13 with retina display','1452171248.png'),
  (17,'MacBook Pro 15 with retina display','1452171265.png'),
  (18,'MacBook Air 11 inch','1452171346.png'),
  (19,'MacBook Air 13 inch','1452171355.png'),
  (20,'MacBook Silver 12 inch','1452171484.png'),
  (21,'MacBook gold 12 inch','1452171495.png'),
  (22,'MacBook spacegray 12 inch','1452171510.png'),
  (23,'iMac 21 inch','1452171678.png'),
  (24,'iMac 27 inch','1452171690.png'),
  (25,'iPad Mini Silver','1452171909.png'),
  (26,'iPad Mini Space Gray','1452171928.png'),
  (27,'iPad Mini Gold','1452171936.png'),
  (28,'iPad Silver','1452172139.png'),
  (29,'iPad SpaceGray','1452172153.png'),
  (30,'iPad Gold','1452172164.png'),
  (31,'iPod Touch Blue','1452172392.png'),
  (32,'iPod Touch Gold','1452172403.png'),
  (33,'iPod Touch Pink','1452172415.png'),
  (34,'iPod Touch Red','1452172423.png'),
  (35,'iPod Touch Sliver','1452172432.png'),
  (36,'iPod Touch Space Gray','1452172446.png'),
  (37,'Mac Mini','1452172507.png'),
  (38,'iPad Pro silver ','1452172622.png'),
  (39,'iPad Pro Gold ','1452172634.png'),
  (40,'iPad Pro Space Gray ','1452172650.png'),
  (41,'iPod Nano Blue','1452172772.png'),
  (42,'iPod Nano Gold','1452172786.png'),
  (43,'iPod Nano Pink','1452172795.png'),
  (44,'iPod Nano Red','1452172804.png'),
  (45,'iPod Nano Sliver','1452172814.png'),
  (46,'iPod Nano Space Gray','1452172828.png'),
  (47,'iPod Shuffle Blue','1452172937.png'),
  (48,'iPod Shuffle Gold','1452172946.png'),
  (49,'iPod Shuffle Pink','1452172953.png'),
  (50,'iPod Shuffle Red','1452172960.png'),
  (51,'iPod Shuffle Silver','1452172976.png'),
  (52,'iPod Shuffle Space Gray','1452172993.png'),
  (53,'Apple TV 4','1452173121.jpg'),
  (54,'Apple TV 3','1452173208.png'),
  (55,'Usp Super Drive','1452427921.jpg');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;