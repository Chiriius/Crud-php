/*!40101 SET NAMES utf8 */;
/*!40101 SET SQL_MODE='' */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bdmvc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `bdmvc`;

/* Table structure for table `t_usuario` */
DROP TABLE IF EXISTS `t_usuario`;
CREATE TABLE `t_usuario` (
  `USU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USU_NOMBRES` varchar(30) DEFAULT NULL,
  `USU_APELLIDOS` varchar(100) DEFAULT NULL,
  `USU_EMAIL` varchar(3213) DEFAULT NULL,
  `USU_PASSWORD` varchar(123) DEFAULT NULL,
  `USU_TELEFONO` int(11) DEFAULT NULL,
  `USU_FCH_NAC` date DEFAULT NULL,
  `USU_UID` varchar(10) DEFAULT NULL,
  `USU_ROL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`USU_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* Data for the table `t_usuario` */
INSERT INTO `t_usuario` (`USU_ID`, `USU_NOMBRES`, `USU_APELLIDOS`, `USU_EMAIL`, `USU_PASSWORD`, `USU_TELEFONO`, `USU_FCH_NAC`, `USU_UID`, `USU_ROL`) VALUES
(99, 'Erwin', 'Bustos', 'Erwin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 2312312, '3323-02-23', '65d4c7d9d6', '1'),
(100, 'Mario', 'Buendia', 'Mario@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2323232, '2024-02-15', '65d5f67716', '3'),
(101, 'Mbappe', 'sds', 'asads@gmail.com', 'c7a9f84bb5ac28e434238294999c298637e77cce', 132312, '2024-02-07', '65df457cae', '3');

/* Table structure for table `t_programa` */
DROP TABLE IF EXISTS `t_programa`;
CREATE TABLE `t_programa` (
  `proNombre` varchar(50) DEFAULT NULL,
  `proCod` varchar(10) NOT NULL,
  `proUid` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`proCod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* Data for the table `t_programa` */
INSERT INTO `t_programa` (`proNombre`, `proCod`, `proUid`) VALUES
('Construcción', '333', '65c389e8c49c5'),
('Programación', '555', '65c389b93acb3');

/* Table structure for table `t_us_pro` */
DROP TABLE IF EXISTS `t_us_pro`;
CREATE TABLE `t_us_pro` (
  `USPRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USPRO_UID` varchar(10) DEFAULT NULL,
  `USPRO_USU_ID` int(11) DEFAULT NULL,
  `USPRO_PRO_ID` varchar(10) DEFAULT NULL,
  `USPRO_FCH_INS` date DEFAULT NULL,
  PRIMARY KEY (`USPRO_ID`),
  KEY `t_us_pro_ibfk_1` (`USPRO_USU_ID`),
  KEY `t_us_pro_ibfk_2` (`USPRO_PRO_ID`),
  CONSTRAINT `t_us_pro_ibfk_1` FOREIGN KEY (`USPRO_USU_ID`) REFERENCES `t_usuario` (`USU_ID`) ON DELETE CASCADE,
  CONSTRAINT `t_us_pro_ibfk_2` FOREIGN KEY (`USPRO_PRO_ID`) REFERENCES `t_programa` (`proCod`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* Data for the table `t_us_pro` */
INSERT INTO `t_us_pro` (`USPRO_ID`, `USPRO_UID`, `USPRO_USU_ID`, `USPRO_PRO_ID`, `USPRO_FCH_INS`) VALUES
(3, '65e1ca13e7', 99, '555', '2024-03-14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
