CREATE DATABASE  IF NOT EXISTS `aulavirtual` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `aulavirtual`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: aulavirtual
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ant_acceso`
--

DROP TABLE IF EXISTS `ant_acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_acceso` (
  `ACCESOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PERSP_Codigo` int NOT NULL DEFAULT '0',
  `ACCESOC_Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACCESOP_Codigo`),
  KEY `FK_acceso_persona` (`PERSP_Codigo`),
  CONSTRAINT `FK_acceso_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `ant_persona` (`PERSP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_acceso`
--

LOCK TABLES `ant_acceso` WRITE;
/*!40000 ALTER TABLE `ant_acceso` DISABLE KEYS */;
INSERT INTO `ant_acceso` VALUES (1,1,'2015-11-23 14:15:37'),(2,1,'2015-11-23 14:15:58'),(3,1,'2015-11-23 14:28:14'),(4,94,'2015-11-23 14:28:44'),(5,1,'2015-11-23 14:30:26'),(8,1,'2015-11-23 15:21:19'),(10,1,'2015-11-23 15:23:41'),(11,1,'2015-11-23 15:26:48'),(12,1,'2015-11-24 10:44:18'),(13,1,'2015-11-24 17:40:33'),(14,1,'2015-11-24 08:28:36'),(15,1,'2015-11-27 10:59:08'),(16,1,'2015-11-27 07:01:21'),(17,1,'2015-11-27 10:59:51'),(18,1,'2015-11-27 11:02:42'),(19,1,'2015-11-27 11:05:23'),(20,1,'2015-11-27 11:49:42'),(21,1,'2015-11-28 11:04:58'),(22,1,'2015-11-28 17:51:47'),(23,1,'2015-11-28 10:51:09'),(24,1,'2015-11-29 09:36:50'),(25,1,'2015-11-30 17:15:54'),(26,1,'2015-11-30 17:19:03'),(27,1,'2015-11-30 06:08:36'),(28,1,'2015-11-30 06:19:08'),(29,1,'2015-11-30 10:21:22'),(30,1,'2015-11-30 11:15:56'),(31,1,'2015-11-30 06:10:38'),(32,1,'2015-11-30 07:35:08'),(33,94,'2015-11-30 07:35:39'),(34,1,'2015-11-30 07:39:51'),(35,1,'2015-11-30 10:37:30'),(36,1,'2015-11-30 11:52:52'),(37,1,'2015-11-30 12:06:27'),(38,1,'2015-11-30 12:06:53'),(39,1,'2015-11-30 12:29:43'),(40,1,'2015-12-12 06:58:42'),(41,1,'2015-12-14 17:40:38'),(42,1,'2015-12-15 15:49:20'),(43,1,'2015-12-19 08:22:51'),(44,1,'2015-12-19 08:41:22'),(45,1,'2015-12-19 09:45:06'),(46,1,'2015-12-19 07:07:49'),(47,1,'2015-12-19 07:14:49'),(48,1,'2015-12-19 07:18:23'),(49,1,'2015-12-19 12:24:37'),(50,1,'2015-12-22 07:18:35'),(51,1,'2015-12-23 12:25:25'),(52,1,'2015-12-23 16:57:32'),(53,1,'2015-12-24 08:36:44'),(54,1,'2015-12-24 09:50:37'),(55,1,'2015-12-25 14:40:58'),(56,1,'2015-12-26 10:01:59'),(57,1,'2015-12-26 07:22:24'),(58,1,'2015-12-28 10:28:01'),(59,1,'2015-12-30 15:03:05'),(60,1,'2015-12-31 07:58:04'),(61,1,'2016-01-04 15:08:21'),(62,1,'2016-01-05 06:38:58'),(63,1,'2016-01-05 06:25:33'),(64,1,'2016-01-05 07:09:41'),(65,1,'2016-01-05 08:25:19'),(66,1,'2016-01-06 10:07:22'),(67,1,'2016-01-09 12:00:48'),(68,1,'2016-01-09 08:55:02'),(69,1,'2016-01-15 14:50:54'),(70,1,'2016-01-16 09:25:15'),(71,1,'2016-01-22 06:21:01'),(72,1,'2019-09-11 13:11:23'),(73,1,'2019-09-11 13:12:03'),(74,1,'2019-09-11 13:26:50'),(75,1,'2019-09-11 13:28:03'),(76,1,'2019-09-11 13:55:40'),(77,1,'2019-09-11 07:17:22'),(78,1,'2019-09-11 08:12:34'),(79,1,'2020-02-25 14:21:21'),(80,1,'2020-02-28 14:50:02'),(81,1,'2020-03-11 16:54:03'),(82,1,'2020-03-12 10:46:15'),(83,1,'2020-03-12 11:01:58'),(84,1,'2020-03-12 11:46:55'),(85,1,'2020-03-12 13:37:55'),(86,1,'2020-03-12 13:50:14'),(87,1,'2020-03-12 14:02:22'),(88,1,'2020-03-12 14:37:46'),(89,1,'2020-03-16 11:20:41'),(90,1,'2020-03-16 11:48:52'),(91,1,'2020-03-16 14:08:53'),(92,1,'2020-03-16 14:09:27'),(93,1,'2020-03-17 06:17:22'),(94,1,'2020-03-17 09:56:18'),(95,1,'2020-03-17 10:22:09'),(96,1,'2020-03-17 07:56:45');
/*!40000 ALTER TABLE `ant_acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_acta`
--

DROP TABLE IF EXISTS `ant_acta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_acta` (
  `ACTAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `USUA_Codigo` int NOT NULL,
  `PROP_Codigo` int NOT NULL,
  `TIPCICLOP_Codigo` int NOT NULL,
  `ACTAC_Tipo` char(2) DEFAULT '',
  `ACTAC_Fecha` date NOT NULL DEFAULT '0000-00-00',
  `ACTAC_Titulo` varchar(500) NOT NULL,
  `ACTAC_Agenda` text NOT NULL,
  `ACTAC_Detalle` text NOT NULL,
  `ACTAC_Hinicio` time NOT NULL,
  `ACTAC_Hfin` time NOT NULL,
  `ACTAC_FechaModificacion` datetime DEFAULT NULL,
  `ACTAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACTAP_Codigo`),
  KEY `FK_acta_usuario` (`USUA_Codigo`),
  KEY `FK_acta_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_acta_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_acta_usuario` FOREIGN KEY (`USUA_Codigo`) REFERENCES `ant_usuario` (`USUAP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_acta`
--

LOCK TABLES `ant_acta` WRITE;
/*!40000 ALTER TABLE `ant_acta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_acta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_actadetalle`
--

DROP TABLE IF EXISTS `ant_actadetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_actadetalle` (
  `ACTADETP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ACTAP_Codigo` int NOT NULL DEFAULT '0',
  `ACTADETC_Nombre` varchar(150) DEFAULT NULL,
  `ACTADETC_Observacion` text,
  `ACTADETC_FechaModificacion` datetime DEFAULT NULL,
  `ACTADETC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACTADETP_Codigo`),
  KEY `FK_actadetalle_acta` (`ACTAP_Codigo`),
  CONSTRAINT `FK_actadetalle_acta` FOREIGN KEY (`ACTAP_Codigo`) REFERENCES `ant_acta` (`ACTAP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_actadetalle`
--

LOCK TABLES `ant_actadetalle` WRITE;
/*!40000 ALTER TABLE `ant_actadetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_actadetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_actaexposicion`
--

DROP TABLE IF EXISTS `ant_actaexposicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_actaexposicion` (
  `ACTAEXPOSP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ACTAP_Codigo` int NOT NULL,
  `PROP_Codigo` int NOT NULL,
  `PRODATRIBDET_Codigo` int NOT NULL COMMENT '//Id Tema',
  `ACTAEXPOSC_Archivo` varchar(50) NOT NULL,
  `ACTAEXPOSC_Descripcion` varchar(250) NOT NULL,
  `ACTAEXPOSC_Duracion` int NOT NULL,
  `ACTAEXPOSC_FechaModificacion` datetime DEFAULT NULL,
  `ACTAEXPOSC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACTAEXPOSP_Codigo`),
  KEY `FK_ant_actaexposicion_ant_acta` (`ACTAP_Codigo`),
  KEY `FK_ant_actaexposicion_ant_profesor` (`PROP_Codigo`),
  KEY `FK_ant_actaexposicion_ant_tema` (`PRODATRIBDET_Codigo`),
  CONSTRAINT `FK_ant_actaexposicion_ant_acta` FOREIGN KEY (`ACTAP_Codigo`) REFERENCES `ant_acta` (`ACTAP_Codigo`),
  CONSTRAINT `FK_ant_actaexposicion_ant_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_ant_actaexposicion_ant_tema` FOREIGN KEY (`PRODATRIBDET_Codigo`) REFERENCES `ant_archivos` (`ARCHIVP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_actaexposicion`
--

LOCK TABLES `ant_actaexposicion` WRITE;
/*!40000 ALTER TABLE `ant_actaexposicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_actaexposicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_actaprofesor`
--

DROP TABLE IF EXISTS `ant_actaprofesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_actaprofesor` (
  `ACTAPROFP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ACTAP_Codigo` int NOT NULL DEFAULT '0',
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `ACTAPROFC_Hingreso` time DEFAULT NULL,
  `ACTAPROFC_Hsalida` time DEFAULT NULL,
  `ACTAPROFC_Observacion` varchar(150) DEFAULT NULL,
  `ACTAPROFC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACTAPROFP_Codigo`),
  KEY `FK_actaprofesor_acta` (`ACTAP_Codigo`),
  KEY `FK_actaprofesor_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_actaprofesor_acta` FOREIGN KEY (`ACTAP_Codigo`) REFERENCES `ant_acta` (`ACTAP_Codigo`),
  CONSTRAINT `FK_actaprofesor_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_actaprofesor`
--

LOCK TABLES `ant_actaprofesor` WRITE;
/*!40000 ALTER TABLE `ant_actaprofesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_actaprofesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_alumno`
--

DROP TABLE IF EXISTS `ant_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_alumno` (
  `ALUMP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPDOCP_Codigo` int DEFAULT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `ALUMC_NumeroDoc` varchar(100) DEFAULT NULL,
  `ALUMC_Nombres` varchar(100) DEFAULT NULL,
  `ALUMC_ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ALUMC_ApellidoMaterno` varchar(100) DEFAULT NULL,
  `ALUMC_Identificador` varchar(100) DEFAULT NULL,
  `ALUMC_Email` varchar(100) DEFAULT NULL,
  `ALUMC_Telefono` varchar(100) DEFAULT NULL,
  `ALUMC_Direccion` varchar(45) DEFAULT NULL,
  `ALUMC_FechaNac` date DEFAULT NULL,
  `ALUMC_FlagEstado` char(1) DEFAULT '1',
  `ALUMC_FechaModificacion` datetime DEFAULT NULL,
  `ALUMC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`ALUMP_Codigo`),
  KEY `fk_tipodoc_alumno_idx` (`TIPDOCP_Codigo`),
  CONSTRAINT `fk_tipodoc_alumno` FOREIGN KEY (`TIPDOCP_Codigo`) REFERENCES `ant_tipodocumento` (`TIPDOCP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_alumno`
--

LOCK TABLES `ant_alumno` WRITE;
/*!40000 ALTER TABLE `ant_alumno` DISABLE KEYS */;
INSERT INTO `ant_alumno` VALUES (75,NULL,1,'40091818','JUAN ANTONIO','CHECA ','AUSEJO','9201420212','martin_trujillo1105@hotmail.com','957595320','Mz R Lote50 SAMP','0000-00-00','1',NULL,'2020-03-12 07:32:47',7),(77,NULL,1,'324234','DAVID SADUJ','CHAVEZ ','VASQUEZ','8201511747','martin_trujillo1105@hotmail.com','tert','ret','0000-00-00','1',NULL,'2020-03-17 05:05:00',7),(78,NULL,1,'','CRISTIAN JESUS','CUYA ','DEL RISCO','2017063958','','','','0000-00-00','1',NULL,'2020-03-17 20:30:38',7),(79,NULL,1,'','JUAN OCTAVIO','FERNANDEZ ','MILIAN','8201711074','','','','0000-00-00','1',NULL,'2020-03-17 20:31:20',7),(80,NULL,1,'','JHONATAN BERNARD','FLORES ','BURGA','8201511660','','','','0000-00-00','1',NULL,'2020-03-17 20:31:56',7),(81,NULL,1,'','ANGEL JUNIOR','GOMEZ ','SUAREZ','2017038753','','','','0000-00-00','1',NULL,'2020-03-17 20:32:34',7),(82,NULL,1,'','SEBASTIAN RODRIGO','INJANTE ','ASTO','2017039044','','','','0000-00-00','1',NULL,'2020-03-17 20:33:09',7),(83,NULL,1,'','ELISBETH','JULCAHUANCA ','MORE','2017010195','','','','0000-00-00','1',NULL,'2020-03-17 20:33:39',7),(84,NULL,1,'','ALEXANDER MANUEL','MALASQUEZ ','ROSAS','2017067123','','','','0000-00-00','1',NULL,'2020-03-17 20:34:13',7),(85,NULL,1,'','YANINA','QUINTANO ','ARROYO','8201710463','','','','0000-00-00','1',NULL,'2020-03-17 20:34:48',7),(86,NULL,1,'','BRANDOL SILVESTRE','RAMIREZ ','CARRANZA','8201610457','','','','0000-00-00','1',NULL,'2020-03-17 20:35:27',7),(87,NULL,1,'','ROSMERY','ROJAS ','BAZAN','2017064917','','','','0000-00-00','1',NULL,'2020-03-17 20:36:00',7),(88,NULL,1,'','GELACIO','SOTO ','CANTE?O','2017016835','','','','0000-00-00','1',NULL,'2020-03-17 20:36:35',7),(89,NULL,1,'','JHOAN LUIGGI','BUSTOS ','CONDORI','9201300736','','','','0000-00-00','1',NULL,'2020-03-17 20:37:45',7),(90,NULL,1,'','JUAN JESUS','CACERES ','PINEKI','2017083028','','','','0000-00-00','1',NULL,'2020-03-17 20:38:37',7),(91,NULL,1,'','KELLY WENDY','CHAVEZ ','QUISPE','2017047815','','','','0000-00-00','1',NULL,'2020-03-17 20:39:11',7),(92,NULL,1,'','EDGAR EDUARDO','CRISOSTOMO ','CARPIO','2017025390','','','','0000-00-00','1',NULL,'2020-03-17 20:39:43',7),(93,NULL,1,'','JHOSET DAYORT','DAVILA ','ROJAS','2017074190','','','','0000-00-00','1',NULL,'2020-03-17 20:40:18',7),(94,NULL,1,'','NICOLAS DANIEL','DEL PINO','BULLON','2017079811','','','','0000-00-00','1',NULL,'2020-03-17 20:40:55',7),(95,NULL,1,'','JOSE MARCELINO','EVANGELISTA ','CUCHO','2017073576','','','','0000-00-00','1',NULL,'2020-03-17 20:41:23',7),(96,NULL,1,'','EDGAR ENRIQUE','GARCIA ','GARCIA ','2017055150','','','','0000-00-00','1',NULL,'2020-03-17 20:41:50',7),(97,NULL,1,'','JUAN IVAN','GASPAR ','QUISPE','2017076320','','','','0000-00-00','1',NULL,'2020-03-17 20:42:20',7),(98,NULL,1,'','CINDY CAROLINA','JOHN ','JOHN ','2017076872','','','','0000-00-00','1',NULL,'2020-03-17 20:42:49',7),(99,NULL,1,'','JUAN FARIK OMAR','LARRAIN ','MANRIQUE','2017062780','','','','0000-00-00','1',NULL,'2020-03-17 20:43:18',7),(100,NULL,1,'','EDDY ROGERS','MAGALLANES ','PASACHE','2017082225','','','','0000-00-00','1',NULL,'2020-03-17 20:43:49',7),(101,NULL,1,'','FRANCISCO JAVIER','MARROQUIN ','TICONA','2017082540','','','','0000-00-00','1',NULL,'2020-03-17 20:44:15',7),(102,NULL,1,'','ANTHONNY PACIFICO RAUL','MERCADO ','MEDINA','2017062630','','','','0000-00-00','1',NULL,'2020-03-17 20:44:45',7),(103,NULL,1,'','RODRIGO ISMAEL','SALVATIERRA ','PALOMINO','2017042896','','','','0000-00-00','1',NULL,'2020-03-17 20:45:13',7),(104,NULL,1,'','MIGUEL ANGEL','SANDOVAL ','BERROCAL','2017035896','','','','0000-00-00','1',NULL,'2020-03-17 20:45:40',7),(105,NULL,1,'','SEGUNDO HERNANDO','SANDOVAL ','PADILLA','2017081930','','','','0000-00-00','1',NULL,'2020-03-17 20:46:13',7),(106,NULL,1,'','JEFFERSON','SHAHUANO ','HUANAQUIRI','2017082358','','','','0000-00-00','1',NULL,'2020-03-17 20:46:42',7),(107,NULL,1,'','VICTOR DANIEL','TERAN ','BUSTINZA','2017092377','','','','0000-00-00','1',NULL,'2020-03-17 20:47:09',7),(108,NULL,1,'','ERNESTO EDGAR','VILCA ','MENDOZA','9201420737','','','','0000-00-00','1',NULL,'2020-03-17 20:47:39',7),(109,NULL,2,'23423423','Vallolet','Vallolet 2','Gonzales','','','','','0000-00-00','1',NULL,'2020-03-17 23:19:39',7),(110,NULL,2,'','DAVID SADUJ','CHAVEZ ','VASQUEZ','8201511747','i47521221@isise.edu.pe','','','0000-00-00','1',NULL,'2020-03-20 19:22:16',7),(111,NULL,2,'','JUAN ANTONIO','CHECA','AUSEJO','9201420212','j.checa@outlook.es','','','0000-00-00','1',NULL,'2020-03-20 19:22:51',7),(112,NULL,2,'','CRISTIAN JESUS','CUYA','DEL RISCO','2017063958','cristian1592@hotmail.com','','','0000-00-00','1',NULL,'2020-03-20 19:23:22',7),(113,NULL,2,'','JHONATAN BERNARD','FLORES','BURGA','8201511660','ovelisk_007@hotmail.com','','','0000-00-00','1',NULL,'2020-03-20 19:23:52',7),(114,NULL,2,'','ANGEL JUNIOR','GOMEZ ','SUAREZ','2017038753','i74205516@isise.edu.pe','','','0000-00-00','1',NULL,'2020-03-20 19:26:05',7),(115,NULL,2,'','SEBASTIAN RODRIGO','INJANTE','ASTO','2017039044','i76004842@isise.edu.pe','','','0000-00-00','1',NULL,'2020-03-20 19:26:40',7),(116,NULL,2,'','ELISBETH','JULCAHUANCA ','MORE','2017010195','i78011079@isise.edu.pe','','','0000-00-00','1',NULL,'2020-03-20 19:27:02',7),(117,NULL,2,'','ALEXANDER MANUEL','MALASQUEZ ','ROSAS','2017067123','i47486289@isise.edu.pe','','','0000-00-00','1',NULL,'2020-03-20 19:27:27',7),(118,NULL,2,'','YANINA','QUINTANO ','ARROYO','8201710463','yanina_q22@hotmail.com','','','0000-00-00','1',NULL,'2020-03-20 19:28:06',7),(119,NULL,2,'','BRANDOL SILVESTRE','RAMIREZ ','CARRANZA','8201610457','','','','0000-00-00','1',NULL,'2020-03-20 19:28:31',7),(120,NULL,2,'','GELACIO','SOTO ','CANTEÑO','2017016835','gelsotcan@gmail.com','','','0000-00-00','1',NULL,'2020-03-20 19:29:01',7),(121,NULL,2,'','JUAN OCTAVIO','FERNANDEZ ','MILIAN','8201711074','fernandofernandezgeronimo@gmail.com','','','0000-00-00','1',NULL,'2020-03-20 19:29:20',7),(122,NULL,2,'','ROSMERY','ROJAS','BAZAN','2017064917','rojasbazanrosmery@gmail.com','','','0000-00-00','1',NULL,'2020-03-20 19:29:39',7);
/*!40000 ALTER TABLE `ant_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_apertura`
--

DROP TABLE IF EXISTS `ant_apertura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_apertura` (
  `APERTUP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CICLOP_Codigo` int NOT NULL DEFAULT '0',
  `TIPCICLOP_Codigo` int NOT NULL DEFAULT '0',
  `AULAP_Codigo` int NOT NULL DEFAULT '0',
  `TURNOP_Codigo` int NOT NULL,
  `MODULOP_Codigo` int NOT NULL,
  `APERTUC_Descripcion` varchar(250) DEFAULT NULL,
  `APERTUC_Observacion` varchar(250) DEFAULT NULL,
  `APERTUC_FlagEstado` char(1) DEFAULT '1' COMMENT '1:Activo,2;Inactivo',
  `APERTUC_Fecha` date DEFAULT '0000-00-00',
  `APERTUC_FechaModificacion` datetime DEFAULT NULL,
  `APERTUC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`APERTUP_Codigo`),
  KEY `FK_ant_apertura_ant_aula` (`AULAP_Codigo`),
  KEY `FK_ant_apertura_ant_turno` (`TURNOP_Codigo`),
  KEY `FK_ant_apertura_ant_modulo` (`MODULOP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_aula` FOREIGN KEY (`AULAP_Codigo`) REFERENCES `ant_aula` (`AULAP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_modulo` FOREIGN KEY (`MODULOP_Codigo`) REFERENCES `ant_modulo` (`MODULOP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_turno` FOREIGN KEY (`TURNOP_Codigo`) REFERENCES `ant_turno` (`TURNOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_apertura`
--

LOCK TABLES `ant_apertura` WRITE;
/*!40000 ALTER TABLE `ant_apertura` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_apertura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_archivos`
--

DROP TABLE IF EXISTS `ant_archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_archivos` (
  `ARCHIVP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CURSOP_Codigo` int NOT NULL DEFAULT '0',
  `ARCHIVC_Descripcion` varchar(250) DEFAULT NULL,
  `ARCHIVC_Url` varchar(250) NOT NULL,
  `ARCHIVC_Orden` int DEFAULT NULL,
  `ARCHIVC_FechaModificacion` datetime DEFAULT NULL,
  `ARCHIVC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ARCHIVP_Codigo`),
  KEY `fk_curso_archivo_idx` (`CURSOP_Codigo`),
  CONSTRAINT `fk_curso_archivo` FOREIGN KEY (`CURSOP_Codigo`) REFERENCES `ant_curso` (`CURSOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_archivos`
--

LOCK TABLES `ant_archivos` WRITE;
/*!40000 ALTER TABLE `ant_archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_asignacion`
--

DROP TABLE IF EXISTS `ant_asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_asignacion` (
  `ASIGP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `CICLOP_Codigo` int NOT NULL DEFAULT '0',
  `course_id` int NOT NULL DEFAULT '0',
  `ASIGC_Grupo` char(1) DEFAULT NULL COMMENT '1,2',
  `ASIGC_Descripcion` varchar(250) NOT NULL DEFAULT '0',
  `ASIGC_Fecha` datetime NOT NULL,
  `ASIGC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `ASIGC_FechaModificacion` datetime DEFAULT NULL,
  `ASIGC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ASIGP_Codigo`),
  KEY `FK_asignacion_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_asignacion_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_asignacion`
--

LOCK TABLES `ant_asignacion` WRITE;
/*!40000 ALTER TABLE `ant_asignacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_asignaciondetalle`
--

DROP TABLE IF EXISTS `ant_asignaciondetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_asignaciondetalle` (
  `ASIGDETP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ASIGP_Codigo` int NOT NULL DEFAULT '0',
  `ASIGDETC_Dia` int NOT NULL DEFAULT '0',
  `ASIGDETC_Desde` time DEFAULT NULL,
  `ASIGDETC_Hasta` time DEFAULT NULL,
  `ASIGDETC_FechaModificacion` datetime DEFAULT NULL,
  `ASIGDETC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ASIGDETP_Codigo`),
  KEY `FK_asignaciondetalle_asignacion` (`ASIGP_Codigo`),
  CONSTRAINT `FK_asignaciondetalle_asignacion` FOREIGN KEY (`ASIGP_Codigo`) REFERENCES `ant_asignacion` (`ASIGP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_asignaciondetalle`
--

LOCK TABLES `ant_asignaciondetalle` WRITE;
/*!40000 ALTER TABLE `ant_asignaciondetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_asignaciondetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_aula`
--

DROP TABLE IF EXISTS `ant_aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_aula` (
  `AULAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `LOCP_Codigo` int NOT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `AULAC_Nombre` varchar(100) DEFAULT NULL,
  `AULAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AULAP_Codigo`),
  KEY `FK_aula_local` (`LOCP_Codigo`),
  KEY `FK_EMPRESA_AULA_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_aula_local` FOREIGN KEY (`LOCP_Codigo`) REFERENCES `ant_local` (`LOCP_Codigo`),
  CONSTRAINT `FK_EMPRESA_AULA` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_aula`
--

LOCK TABLES `ant_aula` WRITE;
/*!40000 ALTER TABLE `ant_aula` DISABLE KEYS */;
INSERT INTO `ant_aula` VALUES (20,1,1,'LABORATORIO 8','2020-03-17 22:15:13'),(21,1,1,'LABORATORIO 3','2020-03-17 22:15:56'),(22,1,1,'LABORATORIO 11','2020-03-17 22:16:15'),(23,6,2,'AULA 1','2020-03-18 00:03:11'),(24,6,2,'AULA 2','2020-03-18 00:03:24'),(25,6,2,'AULA 3','2020-03-18 00:03:32');
/*!40000 ALTER TABLE `ant_aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_ciclo`
--

DROP TABLE IF EXISTS `ant_ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_ciclo` (
  `CICLOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `EMPRP_Codigo` int DEFAULT NULL,
  `CICLOC_DESCRIPCION` varchar(255) NOT NULL,
  `CICLOC_FECHA_INICIO` date NOT NULL,
  `CICLOC_FECHA_FIN` date NOT NULL,
  `CICLOC_FlagEstado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`CICLOP_Codigo`),
  KEY `FK_EMPRESA_CICLO_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_EMPRESA_CICLO` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_ciclo`
--

LOCK TABLES `ant_ciclo` WRITE;
/*!40000 ALTER TABLE `ant_ciclo` DISABLE KEYS */;
INSERT INTO `ant_ciclo` VALUES (11,1,'2020-1','2020-03-04','2020-06-18',1),(14,1,'2019-3','2019-12-18','2019-12-27',2),(16,2,'INVIERNO 2019','2020-03-01','2020-07-31',1);
/*!40000 ALTER TABLE `ant_ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_curso`
--

DROP TABLE IF EXISTS `ant_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_curso` (
  `CURSOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CICLOP_Codigo` int DEFAULT NULL,
  `PROP_Codigo` int DEFAULT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `CURSOC_Nombre` varchar(100) DEFAULT NULL,
  `CURSOC_DescripcionBreve` varchar(200) DEFAULT NULL,
  `CURSOC_EspecificacionPDF` varchar(100) DEFAULT NULL,
  `CURSOC_Comentario` text,
  `CURSOC_Cantidad` double DEFAULT NULL,
  `CURSOC_Intentos` double DEFAULT NULL,
  `CURSOC_Tiempo` double DEFAULT NULL,
  `CURSOC_TiempoExamen` double NOT NULL DEFAULT '30',
  `CURSOC_Puntaje` double DEFAULT '14',
  `CURSOC_Video` varchar(150) DEFAULT NULL,
  `CURSOC_Imagen` varchar(150) DEFAULT NULL,
  `CURSOC_Silabus` varchar(150) DEFAULT NULL,
  `CURSOC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `CURSOC_FechaModificacion` datetime DEFAULT NULL,
  `CURSOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CURSOP_Codigo`),
  KEY `FK_CURSO_CICLO_idx` (`CICLOP_Codigo`),
  KEY `FK_PROFESOR_CURSO_idx` (`PROP_Codigo`),
  KEY `FK_EMPRESA_CURSO_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_CURSO_CICLO` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_EMPRESA_CURSO` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `FK_PROFESOR_CURSO` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_curso`
--

LOCK TABLES `ant_curso` WRITE;
/*!40000 ALTER TABLE `ant_curso` DISABLE KEYS */;
INSERT INTO `ant_curso` VALUES (98,11,195,1,'Base de datos Avanzado','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',NULL,'',0,5,5,30,14,NULL,NULL,NULL,'1','2020-03-17 21:50:51','2015-10-16 14:24:30'),(99,11,194,1,'Taller de Programacion web','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',NULL,NULL,5,5,5,30,14,NULL,NULL,NULL,'1','2020-03-17 21:30:07','2020-03-12 21:04:29'),(100,11,194,1,'Adm. de base de datos','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',NULL,NULL,0,5,5,30,14,NULL,NULL,NULL,'1',NULL,'2020-03-12 21:23:33'),(101,11,194,1,'Flauta','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',NULL,NULL,0,5,5,30,14,NULL,NULL,NULL,'1','2020-03-17 21:21:49','2020-03-16 03:51:27'),(102,11,194,1,'English for Vallolet','',NULL,NULL,0,5,5,30,14,NULL,NULL,NULL,'1','2020-03-16 20:03:42','2020-03-16 20:01:34'),(103,16,197,2,'YOB ENGLISH FOR CHILDREN','as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe',NULL,'',12,3,5,30,14,'https://www.youtube.com/embed/DWNNnSBUPT8',NULL,NULL,'1','2020-03-18 23:38:16','2020-03-17 23:13:09'),(104,16,197,2,'FLAUTA DULCE PARA NIÑOS','as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe',NULL,'',0,5,5,30,14,'https://www.youtube.com/embed/DWNNnSBUPT8',NULL,NULL,'1','2020-03-19 22:17:29','2020-03-18 23:17:01'),(105,16,197,2,'TALLER DE PROGRAMACION WEB','',NULL,'',0,5,5,30,14,NULL,NULL,NULL,'1',NULL,'2020-03-19 22:18:59');
/*!40000 ALTER TABLE `ant_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_empresa`
--

DROP TABLE IF EXISTS `ant_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_empresa` (
  `EMPRP_Codigo` int NOT NULL AUTO_INCREMENT,
  `SECTORP_Codigo` int NOT NULL,
  `EMPRC_Ruc` char(11) DEFAULT NULL,
  `EMPRC_RazonSocial` varchar(150) DEFAULT NULL,
  `EMPRC_Telefono` varchar(50) DEFAULT NULL,
  `EMPRC_Movil` varchar(50) DEFAULT NULL,
  `EMPRC_Fax` varchar(50) DEFAULT NULL,
  `EMPRC_Web` varchar(250) DEFAULT NULL,
  `EMPRC_Email` varchar(250) DEFAULT NULL,
  `EMPRC_Direccion` varchar(300) DEFAULT NULL,
  `EMPRC_FlagEstado` char(1) DEFAULT '1',
  `EMPRC_FechaModificacion` datetime DEFAULT NULL,
  `EMPRC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`EMPRP_Codigo`),
  KEY `FK_empresa_sector` (`SECTORP_Codigo`),
  CONSTRAINT `FK_empresa_sector` FOREIGN KEY (`SECTORP_Codigo`) REFERENCES `ant_sector` (`SECTORP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_empresa`
--

LOCK TABLES `ant_empresa` WRITE;
/*!40000 ALTER TABLE `ant_empresa` DISABLE KEYS */;
INSERT INTO `ant_empresa` VALUES (1,1,'43242342342','Instituto SISE','567567','3424','234234','234234','234','4234234234','1',NULL,'2011-01-09 20:30:59'),(2,1,'12132121321','CECCOS S.R.L','957595320','','','','','','1',NULL,'2020-03-17 22:20:36');
/*!40000 ALTER TABLE `ant_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_grado`
--

DROP TABLE IF EXISTS `ant_grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_grado` (
  `GRADOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `GRADOC_Descripcion` varchar(150) NOT NULL,
  `GRADOC_FechaModificacion` datetime DEFAULT NULL,
  `GRADOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`GRADOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_grado`
--

LOCK TABLES `ant_grado` WRITE;
/*!40000 ALTER TABLE `ant_grado` DISABLE KEYS */;
INSERT INTO `ant_grado` VALUES (1,'Bachiller',NULL,'2015-10-26 12:29:06'),(2,'Titulado',NULL,'2015-10-26 12:29:11'),(3,'Maestria',NULL,'2015-10-26 12:29:16'),(4,'Doctorado',NULL,'2015-10-26 12:29:21'),(5,'Licenciado',NULL,'2015-10-26 13:48:33');
/*!40000 ALTER TABLE `ant_grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_idiomas`
--

DROP TABLE IF EXISTS `ant_idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_idiomas` (
  `IDIOMP_Codigo` int NOT NULL AUTO_INCREMENT,
  `IDIOMC_Descripcion` varchar(150) DEFAULT NULL,
  `IDIOMC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDIOMP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_idiomas`
--

LOCK TABLES `ant_idiomas` WRITE;
/*!40000 ALTER TABLE `ant_idiomas` DISABLE KEYS */;
INSERT INTO `ant_idiomas` VALUES (1,'Ingles','2015-10-29 12:57:58'),(2,'Frances','2015-10-29 12:58:03'),(3,'Aleman','2015-10-29 12:58:14'),(4,'Portugues','2015-10-29 12:58:23'),(5,'Italiano','2015-10-29 12:58:28'),(6,'Otros','2015-10-29 12:59:02');
/*!40000 ALTER TABLE `ant_idiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_leccion`
--

DROP TABLE IF EXISTS `ant_leccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_leccion` (
  `LECCIONP_Codigo` int NOT NULL AUTO_INCREMENT,
  `SECCIONP_Codigo` int NOT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `LECCIONC_Nombre` varchar(250) DEFAULT NULL,
  `LECCIONC_Descripcion` text,
  `LECCIONC_Video` varchar(50) DEFAULT NULL,
  `LECCIONC_FechaModificacion` datetime DEFAULT NULL,
  `LECCIONC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`LECCIONP_Codigo`),
  KEY `fk_seccion_leccion_idx` (`SECCIONP_Codigo`),
  KEY `fk_empresa_leccion_idx` (`EMPRP_Codigo`),
  CONSTRAINT `fk_empresa_leccion` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `fk_seccion_leccion` FOREIGN KEY (`SECCIONP_Codigo`) REFERENCES `ant_seccion` (`SECCIONP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_leccion`
--

LOCK TABLES `ant_leccion` WRITE;
/*!40000 ALTER TABLE `ant_leccion` DISABLE KEYS */;
INSERT INTO `ant_leccion` VALUES (1,65,1,'Estructuras de control','345345','https://www.youtube.com/embed/sYQtjaszIPM',NULL,'2020-03-18 16:19:48'),(68,65,1,'Funciones y matrices','YUI','YUI',NULL,'2020-03-18 17:32:50'),(69,66,1,'Características de la POO','','',NULL,'2020-03-18 17:38:20'),(70,66,1,'Herencia y clases abstractas','','',NULL,'2020-03-18 17:38:42'),(71,66,1,'Métodos de acceso ','','',NULL,'2020-03-18 17:41:47'),(72,67,1,'Instalación y manejo de MySQL Workbench','','',NULL,'2020-03-18 17:42:04'),(73,67,1,'Procedimientos almacenados','','',NULL,'2020-03-18 17:42:25'),(74,67,1,'Conexión a BD utilizando PDO.','','',NULL,'2020-03-18 17:42:43'),(75,68,1,'Listar, Editar','','',NULL,'2020-03-18 17:43:17'),(76,68,1,'Insertar, eliminar','','',NULL,'2020-03-18 17:43:32'),(77,69,1,'Modelo, vista y controlador','','',NULL,'2020-03-18 17:43:56'),(78,70,1,'Usando Ajax y Bootstrap','','',NULL,'2020-03-18 17:44:16'),(79,71,1,'Manejo de templates','','',NULL,'2020-03-18 17:45:02'),(80,72,1,'Parte 1','','',NULL,'2020-03-18 17:45:14'),(81,87,1,'Parte 2','','',NULL,'2020-03-18 17:45:29'),(82,88,2,'Clase 1','loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew ','https://www.youtube.com/embed/DWNNnSBUPT8',NULL,'2020-03-18 23:12:38'),(83,88,2,'Clase 2','as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe ','https://www.youtube.com/embed/66alSuH1-bA',NULL,'2020-03-18 23:13:44'),(84,89,2,'Clase 3','ds ew ewr wer we rwe rwe rew rwe rew ds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rew','https://www.youtube.com/embed/4JUvuqoA7Fo',NULL,'2020-03-18 23:13:57'),(85,92,2,'Postura de la flauta','','https://www.youtube.com/embed/oZG5Lq_wnHk',NULL,'2020-03-18 23:49:09'),(86,93,2,'Tocando la flauta','','https://www.youtube.com/embed/oZG5Lq_wnHk',NULL,'2020-03-18 23:49:34'),(87,100,2,'Utilizando Bootstrap','<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\r\n<title>Untitled Document</title>\r\n</head>\r\n\r\n<body>\r\n<ol>\r\n  <li>Descargando bootstrap<br />\r\n      <img src=\"images/bootstrap1.png\" width=\"774\" height=\"276\" /><br />\r\n  </li>\r\n  <li>Utilizando CDN de bootstrap<br />\r\n      <img src=\"images/bootstrap2.png\" width=\"770\" height=\"292\" /><br />\r\n  </li>\r\n  <li>Plantillas con bootstrap<br />\r\n      <img src=\"images/bootstrap31.png\" width=\"720\" height=\"484\" /><br />\r\n        <img src=\"images/bootstrap32.png\" width=\"739\" height=\"336\" /><br />\r\n  </li>\r\n  <li>Formularios en bootstrap    <br />\r\n    <img src=\"images/bootstrap4.png\" width=\"746\" height=\"649\" /></li>\r\n</ol>\r\n</body>\r\n</html>\r\n','',NULL,'2020-03-20 04:42:48'),(88,96,2,'Conectar PHP con BD','','',NULL,'2020-03-20 04:46:03'),(90,94,2,'Variables y Operadores','','',NULL,'2020-03-20 19:47:49'),(91,94,2,'Estructuras de control','','',NULL,'2020-03-20 19:48:14'),(92,94,2,'Funciones','','',NULL,'2020-03-20 19:48:57'),(93,94,2,'Matrices y fechas','','',NULL,'2020-03-20 19:49:10'),(94,95,2,'Introduccion a la POO','','',NULL,'2020-03-20 19:50:24'),(95,96,2,'Introduccion y manejo de Mysql Workbench','','',NULL,'2020-03-20 19:51:21'),(96,96,2,'Procedimientos almacenados en Mysql','','',NULL,'2020-03-20 19:52:03'),(97,97,2,'Conexion a BD utilizando PDO','','',NULL,'2020-03-20 19:53:41'),(98,97,2,'Operaciones de mantenimiento utilizando PDO','','',NULL,'2020-03-20 19:55:26'),(99,98,2,'Operaciones de Mantenimiento con PDO utiliznado procedimientos','','',NULL,'2020-03-20 19:57:40'),(100,99,2,'Funcionamiento MVC','','',NULL,'2020-03-20 19:59:03'),(101,99,2,'Inclusion de plantillas','','',NULL,'2020-03-20 19:59:38'),(102,100,2,'Utilizando Ajax','','',NULL,'2020-03-20 20:01:52'),(103,100,2,'Uso de sesiones y cookies','','',NULL,'2020-03-20 20:02:22'),(104,101,2,'Catalogo de Productos','','',NULL,'2020-03-20 20:03:11'),(105,102,2,'Carrito de compras','\r\n<ol>\r\n  <li>Introduccion  \r\n    <ul>\r\n      <li>Un carrito de compras o tienda virtual, se reifiere a un comercio convencional que usa como medio principal para realizar sus ventas un sitio web.</li>\r\n      <li>Los vendedores de productos o servicios ponen a disposici&oacute;n de sus clientes un sitio web en el cual los clientes pueden observar im&aacute;genes de los productos y finalmente adquirirlos.</li>\r\n      <li>Este servicio le da al cliente rapidez en la compra, la posibilidad de hacerlo desde cualquier lugar y a cualquier hora.<br />\r\n        <img src=\"images/carrito1.PNG\" width=\"484\" height=\"131\" /><br />\r\n      </li>\r\n    </ul>\r\n  </li>\r\n\r\n  <li>Tipos de pagos  </li>\r\n  <ul>\r\n    <li>T&igrave;picamente estos productos se pagan con tarjeta de cr&eacute;dito y se le env&iacute;a por correo al cliente.</li>\r\n    <li>Existen otras opciones como paypal, tarjetas de d&eacute;bito, transferencias de banco.<br />\r\n      <img src=\"images/carrito2.png\" width=\"197\" height=\"200\" /><br>\r\n      <br /> \r\n     </li>\r\n  </ul>\r\n  <li>Dise&ntilde;o de p&aacute;ginas web principales<br />\r\n      <img src=\"images/carrito3.png\" width=\"786\" height=\"540\" /><br>\r\n      <br />\r\n  </li>\r\n\r\n  <li>Registrar cliente<br />\r\n      <img src=\"images/carrito4.png\" width=\"581\" height=\"502\" /><br>\r\n      <br />\r\n  </li>\r\n  <li>Listado de productos para agregar al carrito<br />\r\n    <img src=\"images/carrito5.png\" width=\"786\" height=\"522\" /><br>\r\n    <br>\r\n  </li>\r\n  <li>Agregar al carrito<br />\r\n    <img src=\"images/carrito6.png\" width=\"642\" height=\"532\" /></li>\r\n</ol>\r\n\r\n','',NULL,'2020-03-20 20:03:28'),(106,100,2,'Utilizando Jquery','\r\n<ol>\r\n  <li>Document Ready<br />\r\n      <img src=\"images/ajax1.png\" width=\"750\" height=\"150\" /><br />\r\n        <img src=\"images/ajax2.png\" width=\"731\" height=\"148\" /><br />\r\n  </li>\r\n  <li>Selecci&oacute;n de elementos<br />\r\n      <img src=\"images/ajax3.png\" width=\"733\" height=\"362\" /><br />\r\n  </li>\r\n  <li>CSS, estilos y dimensiones<br>\r\n      <img src=\"images/ajax31.png\" width=\"762\" height=\"364\"><br>\r\n  </li>\r\n  <li>Utilizando clases para aplicar estilos<br>\r\n    <img src=\"images/ajax4.png\" width=\"756\" height=\"265\"></li>\r\n  <li>Establecer atributos<br>\r\n      <img src=\"images/ajax5.png\" width=\"720\" height=\"226\"><br>\r\n  </li>\r\n  <li>Recorrer el DOM<br>\r\n      <img src=\"images/ajax61.png\" width=\"756\" height=\"456\"><br>\r\n        <img src=\"images/ajax62.png\" width=\"791\" height=\"248\"><br>\r\n  </li>\r\n  <li>Manipulaci&oacute;n de elementos<br>\r\n    <img src=\"images/ajax71.png\" width=\"775\" height=\"142\"><br>\r\n    <img src=\"images/ajax72.png\" width=\"786\" height=\"285\"><br>\r\n      <img src=\"images/ajax73.png\" width=\"787\" height=\"252\"><br>\r\n  </li>\r\n</ol>\r\n','',NULL,'2020-03-20 21:20:24'),(107,103,2,'Mary tiene un corderito','<p>Mary tiene un corderito<br></p>\r\n<p>\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/sol.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>																		\r\n	</div>\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>	\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n	</div>	\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/sol.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>	\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>																\r\n	</div>		\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>	\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/sol.png\" width=\"58\" height=\"202\"></div>							\r\n	</div>																		\r\n</p>','',NULL,'2020-03-20 22:51:15'),(108,103,2,'Gravity Falls','<div class=\"title-box clearfix \">\r\n  <h2 class=\"title-box_primary\">Gravity Falls</h2>\r\n</div> 			\r\n<div class=\"col col-lg-auto col-md-auto col-sm-auto\">\r\n	<p align=\"center\"><img src=\"images/gravity_falls.jpg\" class=\"img-fluid\"></p>\r\n</div>','',NULL,'2020-03-20 22:51:30');
/*!40000 ALTER TABLE `ant_leccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_local`
--

DROP TABLE IF EXISTS `ant_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_local` (
  `LOCP_Codigo` int NOT NULL AUTO_INCREMENT,
  `EMPRP_Codigo` int DEFAULT NULL,
  `LOCC_Nombre` varchar(150) NOT NULL,
  `LOCC_Direccion` varchar(250) NOT NULL,
  `LOCC_Telefono` varchar(250) NOT NULL,
  `LOCC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`LOCP_Codigo`),
  KEY `FK_EMPRESA_LOCAL_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_EMPRESA_LOCAL` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_local`
--

LOCK TABLES `ant_local` WRITE;
/*!40000 ALTER TABLE `ant_local` DISABLE KEYS */;
INSERT INTO `ant_local` VALUES (1,1,'Sede Suco','Av. Tomas Marsano 124 Surco','4543278','2015-05-16 17:45:22'),(6,2,'Sede principal','Mz R lote 50 Los Nisperos','952465968','2020-03-17 23:57:53');
/*!40000 ALTER TABLE `ant_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_matricula`
--

DROP TABLE IF EXISTS `ant_matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_matricula` (
  `ORDENP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CICLOP_Codigo` int DEFAULT NULL,
  `AULAP_Codigo` int NOT NULL,
  `TIPP_Codigo` int NOT NULL,
  `ALUMP_Codigo` int NOT NULL,
  `user_id` int NOT NULL,
  `ORDENC_Observacion` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ORDENC_Fecot` date DEFAULT NULL,
  `ORDENC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `ORDENC_FechaModificacion` datetime DEFAULT NULL,
  `ORDENC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ORDENP_Codigo`),
  KEY `FK_orden_aula` (`AULAP_Codigo`),
  KEY `FK_matricula_tipoestudio` (`TIPP_Codigo`),
  KEY `FK_ant_matricula_ant_alumno` (`ALUMP_Codigo`),
  CONSTRAINT `FK_ant_matricula_ant_alumno` FOREIGN KEY (`ALUMP_Codigo`) REFERENCES `ant_alumno` (`ALUMP_Codigo`),
  CONSTRAINT `FK_matricula_tipoestudio` FOREIGN KEY (`TIPP_Codigo`) REFERENCES `ant_tipoestudio` (`TIPP_Codigo`),
  CONSTRAINT `FK_orden_aula` FOREIGN KEY (`AULAP_Codigo`) REFERENCES `ant_aula` (`AULAP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_matricula`
--

LOCK TABLES `ant_matricula` WRITE;
/*!40000 ALTER TABLE `ant_matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_menu`
--

DROP TABLE IF EXISTS `ant_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_menu` (
  `MENU_Codigo` int NOT NULL AUTO_INCREMENT,
  `MENU_Codigo_Padre` int NOT NULL DEFAULT '0',
  `MENU_Descripcion` varchar(150) DEFAULT NULL,
  `MENU_Comentario` varchar(250) DEFAULT NULL,
  `MENU_Url` varchar(250) DEFAULT '#',
  `MENU_Orden` int DEFAULT '1',
  `MENU_Imagen` varchar(100) DEFAULT NULL,
  `MENU_FlagEstado` char(1) DEFAULT '1',
  `MENU_FechaModificacion` datetime DEFAULT NULL,
  `MENU_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`MENU_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_menu`
--

LOCK TABLES `ant_menu` WRITE;
/*!40000 ALTER TABLE `ant_menu` DISABLE KEYS */;
INSERT INTO `ant_menu` VALUES (2,58,'Maestro de Alumnos','Aquí se podrán subir las imágenes o aniamciones que serán contenidas en la marquesina','index.php/alumno/listar',1,'alumno.jpg','1',NULL,'2020-03-17 20:08:17'),(3,1,'MANTENIMIENTOS','','index.php/almacen/curso/listar',1,'libros.jpg','1',NULL,'2015-06-21 03:04:31'),(4,1,'PROCESOS','','index.php/ventas/orden/listar',2,'matri.jpg','1',NULL,'2015-08-12 20:34:09'),(22,75,'Maestro de Cursos','Maestro de Cursos','index.php/curso/listar',1,'','1',NULL,'2020-03-17 19:44:30'),(48,4,'Matricula de alumnos','Matricula de alumnos','index.php/ventas/matricula/listar',3,'matri.jpg','1',NULL,'2015-12-23 21:58:57'),(49,4,'Cargas de trabajo','Cargas de trabajo','index.php/ventas/asignacion/listar',2,NULL,'1',NULL,'2015-12-23 21:56:18'),(52,3,'Documentos',NULL,'index.php/inicio/principal',4,NULL,'1',NULL,'2015-08-12 20:35:34'),(53,58,'Maestro de Profesores','Tabla de Profesores','index.php/profesor/listar',1,NULL,'1',NULL,'2020-03-17 19:56:53'),(57,56,'Ejemplo 5','Ejemplo 5','Ejemplo5',1,NULL,'1',NULL,'2015-04-03 02:18:33'),(58,3,'Configuracion Personal',NULL,'#',1,NULL,'1',NULL,'2015-08-04 01:05:22'),(59,74,'Maestro de Aulas','Maestro de Aulas','index.php/maestros/aula/listar',7,NULL,'1',NULL,'2020-03-18 16:27:10'),(61,74,'Maestro de Locales','Maestro de Locales','index.php/maestros/local/listar',6,NULL,'1',NULL,'2020-03-18 16:27:10'),(62,74,'Maestro de Ciclo','Maestro de Ciclo','index.php/ciclo/listar',1,NULL,'1',NULL,'2020-03-17 16:11:24'),(64,1,'REPORTES Y CONSULTAS',NULL,NULL,3,NULL,'1',NULL,'2015-08-12 20:34:20'),(65,2,'Alumnos pequeños',NULL,NULL,1,NULL,'1',NULL,'2015-06-21 04:06:16'),(66,58,'Maestro de Usuarios','Usuarios','index.php/usuario/listar',1,NULL,'1',NULL,'2020-03-17 20:48:35'),(67,4,'Reuniones de plana','Actas de reunion','index.php/ventas/acta/listar',4,NULL,'1',NULL,'2015-12-23 21:56:29'),(68,4,'Tareas asignadas','Tareas asignadas','index.php/ventas/tarea/listar',7,NULL,'1',NULL,'2015-12-23 21:56:56'),(69,4,'Vigilancia de practicas','Vigilancia de practicas','index.php/ventas/vigilancia/listar',8,NULL,'1',NULL,'2015-12-23 21:57:32'),(70,4,'Tardanzas Reemplazos','Tardanzas Reemplazos','index.php/ventas/tardanza/listar',9,NULL,'1',NULL,'2015-12-23 21:58:37'),(71,4,'Asistencia de alumnos','Asistencia de alumnos','index.php/ventas/asistencia/editar',6,NULL,'1',NULL,'2015-12-23 21:56:47'),(72,74,'Maestro de Secciones','Maestro de Secciones','index.php/seccion/listar',3,NULL,'1',NULL,'2020-03-18 15:30:37'),(73,75,'Maestro de Archivos','Maestro de Archivos','index.php/almacen/archivos/listar',4,NULL,'1',NULL,'2020-03-16 20:26:58'),(74,3,'Configuracion Sistema','Configuracion Sistema','#',3,NULL,'1',NULL,'2015-08-12 20:35:19'),(75,3,'Configuracion Cursos','Configuracion Cursos','#',2,NULL,'1',NULL,'2015-08-12 20:35:17'),(79,74,'Maestro de Empresas','Maestro de Empresas','index.php/empresa/listar',5,NULL,'1',NULL,'2020-03-18 16:25:55'),(81,64,'Seguimiento tareas','Seguimiento tareas','index.php/ventas/tarea/rpt_seguimiento_tareas',1,NULL,'1',NULL,'2015-11-29 06:36:15'),(82,4,'Asistencia de profesores','Asistencia de profesores','#',5,NULL,'1',NULL,'2015-12-23 21:56:45'),(83,4,'Apertura de aulas','Apertura de aulas','index.php/ventas/apertura/listar',1,NULL,'1',NULL,'2015-12-19 15:26:01'),(84,64,'Asignacion de aulas','Asignacion de aulas','index.php/ventas/asignacion/rpt_asignacion_aulas',1,NULL,'1',NULL,'2016-01-04 21:49:16'),(85,64,'Horario por aula','Horario por aula','index.php/ventas/asignacion/rpt_horario_curso',1,NULL,'1',NULL,'2016-01-22 06:28:24'),(86,74,'Maestro de Modulos','Maestro de Modulos','index.php/ventas/modulo/listar',9,NULL,'1',NULL,'2016-01-16 03:26:06'),(87,1,'SALIR','Salir del sistema','index.php/inicio/salir',4,NULL,'1',NULL,'2020-03-17 22:48:45'),(88,74,'Maestro de Periodo','Maestro de Periodo','index.php/periodo/listar',2,NULL,'1',NULL,'2020-03-17 16:23:55'),(89,74,'Maestro de Lecciones','Maestro de Lecciones','index.php/leccion/listar',4,NULL,'1',NULL,'2020-03-18 16:24:39');
/*!40000 ALTER TABLE `ant_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_modulo`
--

DROP TABLE IF EXISTS `ant_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_modulo` (
  `MODULOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TURNOP_Codigo` int NOT NULL,
  `TIPP_Codigo` int NOT NULL,
  `MODULOC_Descripcion` varchar(250) DEFAULT NULL,
  `MODULOC_FechaModificacion` datetime DEFAULT NULL,
  `MODULOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MODULOP_Codigo`),
  KEY `FK_ant_modulo_ant_turno` (`TURNOP_Codigo`),
  KEY `FK_ant_modulo_ant_tipoestudio` (`TIPP_Codigo`),
  CONSTRAINT `FK_ant_modulo_ant_tipoestudio` FOREIGN KEY (`TIPP_Codigo`) REFERENCES `ant_tipoestudio` (`TIPP_Codigo`),
  CONSTRAINT `FK_ant_modulo_ant_turno` FOREIGN KEY (`TURNOP_Codigo`) REFERENCES `ant_turno` (`TURNOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_modulo`
--

LOCK TABLES `ant_modulo` WRITE;
/*!40000 ALTER TABLE `ant_modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_modulodetalle`
--

DROP TABLE IF EXISTS `ant_modulodetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_modulodetalle` (
  `MODULODETP_Codigo` int NOT NULL AUTO_INCREMENT,
  `MODULOP_Codigo` int DEFAULT NULL,
  `PROD_Codigo` int DEFAULT NULL,
  `MODULODETC_Dia` int NOT NULL DEFAULT '0',
  `MODULODETC_Desde` time DEFAULT NULL,
  `MODULODETC_Hasta` time DEFAULT NULL,
  `MODULODETC_FechaModificacion` datetime DEFAULT NULL,
  `MODULODETC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MODULODETP_Codigo`),
  KEY `FK_ant_modulodetalle_ant_modulo` (`MODULOP_Codigo`),
  KEY `FK_ant_modulodetalle_ant_curso` (`PROD_Codigo`),
  CONSTRAINT `FK_ant_modulodetalle_ant_curso` FOREIGN KEY (`PROD_Codigo`) REFERENCES `ant_curso` (`CURSOP_Codigo`),
  CONSTRAINT `FK_ant_modulodetalle_ant_modulo` FOREIGN KEY (`MODULOP_Codigo`) REFERENCES `ant_modulo` (`MODULOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_modulodetalle`
--

LOCK TABLES `ant_modulodetalle` WRITE;
/*!40000 ALTER TABLE `ant_modulodetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_modulodetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_nacionalidad`
--

DROP TABLE IF EXISTS `ant_nacionalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_nacionalidad` (
  `NACP_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int DEFAULT NULL,
  `NACC_Descripcion` varchar(150) DEFAULT NULL,
  `NACC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NACP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_nacionalidad`
--

LOCK TABLES `ant_nacionalidad` WRITE;
/*!40000 ALTER TABLE `ant_nacionalidad` DISABLE KEYS */;
INSERT INTO `ant_nacionalidad` VALUES (0,1,'::Seleccione::','2014-10-06 09:27:07'),(1,1,'BOUVET ISLAND','2010-12-13 22:54:36'),(2,1,'COTE D IVOIRE','2010-12-13 22:54:36'),(3,1,'FALKLAND ISLANDS (MALVINAS)','2010-12-13 22:54:36'),(4,1,'FRANCE, METROPOLITAN','2010-12-13 22:54:36'),(5,1,'FRENCH SOUTHERN TERRITORIES','2010-12-13 22:54:36'),(6,1,'HEARD AND MC DONALD ISLANDS','2010-12-13 22:54:36'),(7,1,'MAYOTTE','2010-12-13 22:54:36'),(8,1,'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS','2010-12-13 22:54:36'),(9,1,'SVALBARD AND JAN MAYEN ISLANDS','2010-12-13 22:54:36'),(10,1,'UNITED STATES MINOR OUTLYING ISLANDS','2010-12-13 22:54:36'),(11,1,'OTROS PAISES O LUGARES','2010-12-13 22:54:36'),(12,1,'AFGANISTAN','2010-12-13 22:54:36'),(13,1,'ALBANIA','2010-12-13 22:54:36'),(14,1,'ALDERNEY','2010-12-13 22:54:36'),(15,1,'ALEMANIA','2010-12-13 22:54:36'),(16,1,'ARMENIA','2010-12-13 22:54:36'),(17,1,'ARUBA','2010-12-13 22:54:36'),(18,1,'ASCENCION','2010-12-13 22:54:36'),(19,1,'BOSNIA-HERZEGOVINA','2010-12-13 22:54:36'),(20,1,'BURKINA FASO','2010-12-13 22:54:36'),(21,1,'ANDORRA','2010-12-13 22:54:36'),(22,1,'ANGOLA','2010-12-13 22:54:36'),(23,1,'ANGUILLA','2010-12-13 22:54:36'),(24,1,'ANTIGUA Y BARBUDA','2010-12-13 22:54:36'),(25,1,'ANTILLAS HOLANDESAS','2010-12-13 22:54:36'),(26,1,'ARABIA SAUDITA','2010-12-13 22:54:36'),(27,1,'ARGELIA','2010-12-13 22:54:36'),(28,1,'ARGENTINA','2010-12-13 22:54:36'),(29,1,'AUSTRALIA','2010-12-13 22:54:36'),(30,1,'AUSTRIA','2010-12-13 22:54:36'),(31,1,'AZERBAIJÁN','2010-12-13 22:54:36'),(32,1,'BAHAMAS','2010-12-13 22:54:36'),(33,1,'BAHREIN','2010-12-13 22:54:36'),(34,1,'BANGLA DESH','2010-12-13 22:54:36'),(35,1,'BARBADOS','2010-12-13 22:54:36'),(36,1,'BÉLGICA','2010-12-13 22:54:36'),(37,1,'BELICE','2010-12-13 22:54:36'),(38,1,'BERMUDAS','2010-12-13 22:54:36'),(39,1,'BELARUS','2010-12-13 22:54:36'),(40,1,'MYANMAR','2010-12-13 22:54:36'),(41,1,'BOLIVIA','2010-12-13 22:54:36'),(42,1,'BOTSWANA','2010-12-13 22:54:36'),(43,1,'BRASIL','2010-12-13 22:54:36'),(44,1,'BRUNEI DARUSSALAM','2010-12-13 22:54:36'),(45,1,'BULGARIA','2010-12-13 22:54:36'),(46,1,'BURUNDI','2010-12-13 22:54:36'),(47,1,'BUTÁN','2010-12-13 22:54:36'),(48,1,'CABO VERDE','2010-12-13 22:54:36'),(49,1,'CAIMÁN, ISLAS','2010-12-13 22:54:36'),(50,1,'CAMBOYA','2010-12-13 22:54:36'),(51,1,'CAMERÚN, REPUBLICA UNIDA DEL','2010-12-13 22:54:36'),(52,1,'CAMPIONE D TALIA','2010-12-13 22:54:36'),(53,1,'CANADÁ','2010-12-13 22:54:36'),(54,1,'CANAL (NORMANDAS), ISLAS','2010-12-13 22:54:36'),(55,1,'CANTÓN Y ENDERBURRY','2010-12-13 22:54:36'),(56,1,'SANTA SEDE','2010-12-13 22:54:36'),(57,1,'COCOS (KEELING),ISLAS','2010-12-13 22:54:36'),(58,1,'COLOMBIA','2010-12-13 22:54:36'),(59,1,'COMORAS','2010-12-13 22:54:36'),(60,1,'CONGO','2010-12-13 22:54:36'),(61,1,'COOK, ISLAS','2010-12-13 22:54:36'),(62,1,'COREA (NORTE), REPUBLICA POPULAR DEMOCRATICA DE','2010-12-13 22:54:36'),(63,1,'COREA (SUR), REPUBLICA DE','2010-12-13 22:54:36'),(64,1,'COSTA DE MARFIL','2010-12-13 22:54:36'),(65,1,'COSTA RICA','2010-12-13 22:54:36'),(66,1,'CROACIA','2010-12-13 22:54:36'),(67,1,'CUBA','2010-12-13 22:54:36'),(68,1,'CHAD','2010-12-13 22:54:36'),(69,1,'CHECOSLOVAQUIA','2010-12-13 22:54:36'),(70,1,'CHILE','2010-12-13 22:54:36'),(71,1,'CHINA','2010-12-13 22:54:36'),(72,1,'TAIWAN (FORMOSA)','2010-12-13 22:54:36'),(73,1,'CHIPRE','2010-12-13 22:54:36'),(74,1,'BENIN','2010-12-13 22:54:36'),(75,1,'DINAMARCA','2010-12-13 22:54:36'),(76,1,'DOMINICA','2010-12-13 22:54:36'),(77,1,'ECUADOR','2010-12-13 22:54:36'),(78,1,'EGIPTO','2010-12-13 22:54:36'),(79,1,'EL SALVADOR','2010-12-13 22:54:36'),(80,1,'ERITREA','2010-12-13 22:54:36'),(81,1,'EMIRATOS ARABES UNIDOS','2010-12-13 22:54:36'),(82,1,'ESPANA','2010-12-13 22:54:36'),(83,1,'ESLOVAQUIA','2010-12-13 22:54:36'),(84,1,'ESLOVENIA','2010-12-13 22:54:36'),(85,1,'ESTADOS UNIDOS','2010-12-13 22:54:36'),(86,1,'ESTONIA','2010-12-13 22:54:36'),(87,1,'ETIOPIA','2010-12-13 22:54:36'),(88,1,'FEROE, ISLAS','2010-12-13 22:54:36'),(89,1,'FILIPINAS','2010-12-13 22:54:36'),(90,1,'FINLANDIA','2010-12-13 22:54:36'),(91,1,'FRANCIA','2010-12-13 22:54:36'),(92,1,'GABON','2010-12-13 22:54:36'),(93,1,'GAMBIA','2010-12-13 22:54:36'),(94,1,'GAZA Y JERICO','2010-12-13 22:54:36'),(95,1,'GEORGIA','2010-12-13 22:54:36'),(96,1,'GHANA','2010-12-13 22:54:36'),(97,1,'GIBRALTAR','2010-12-13 22:54:36'),(98,1,'GRANADA','2010-12-13 22:54:36'),(99,1,'GRECIA','2010-12-13 22:54:36'),(100,1,'GROENLANDIA','2010-12-13 22:54:36'),(101,1,'GUADALUPE','2010-12-13 22:54:36'),(102,1,'GUAM','2010-12-13 22:54:36'),(103,1,'GUATEMALA','2010-12-13 22:54:36'),(104,1,'GUAYANA FRANCESA','2010-12-13 22:54:36'),(105,1,'GUERNSEY','2010-12-13 22:54:36'),(106,1,'GUINEA','2010-12-13 22:54:36'),(107,1,'GUINEA ECUATORIAL','2010-12-13 22:54:36'),(108,1,'GUINEA-BISSAU','2010-12-13 22:54:36'),(109,1,'GUYANA','2010-12-13 22:54:36'),(110,1,'HAITI','2010-12-13 22:54:36'),(111,1,'HONDURAS','2010-12-13 22:54:36'),(112,1,'HONDURAS BRITANICAS','2010-12-13 22:54:36'),(113,1,'HONG KONG','2010-12-13 22:54:36'),(114,1,'HUNGRIA','2010-12-13 22:54:36'),(115,1,'INDIA','2010-12-13 22:54:36'),(116,1,'INDONESIA','2010-12-13 22:54:36'),(117,1,'IRAK','2010-12-13 22:54:36'),(118,1,'IRAN, REPUBLICA ISLAMICA DEL','2010-12-13 22:54:36'),(119,1,'IRLANDA (EIRE)','2010-12-13 22:54:36'),(120,1,'ISLA AZORES','2010-12-13 22:54:36'),(121,1,'ISLA DEL MAN','2010-12-13 22:54:36'),(122,1,'ISLANDIA','2010-12-13 22:54:36'),(123,1,'ISLAS CANARIAS','2010-12-13 22:54:36'),(124,1,'ISLAS DE CHRISTMAS','2010-12-13 22:54:36'),(125,1,'ISLAS QESHM','2010-12-13 22:54:36'),(126,1,'ISRAEL','2010-12-13 22:54:36'),(127,1,'ITALIA','2010-12-13 22:54:36'),(128,1,'JAMAICA','2010-12-13 22:54:36'),(129,1,'JONSTON, ISLAS','2010-12-13 22:54:36'),(130,1,'JAPON','2010-12-13 22:54:36'),(131,1,'JERSEY','2010-12-13 22:54:36'),(132,1,'JORDANIA','2010-12-13 22:54:36'),(133,1,'KAZAJSTAN','2010-12-13 22:54:36'),(134,1,'KENIA','2010-12-13 22:54:36'),(135,1,'KIRIBATI','2010-12-13 22:54:36'),(136,1,'KIRGUIZISTAN','2010-12-13 22:54:36'),(137,1,'KUWAIT','2010-12-13 22:54:36'),(138,1,'LABUN','2010-12-13 22:54:36'),(139,1,'LAOS, REPUBLICA POPULAR DEMOCRATICA DE','2010-12-13 22:54:36'),(140,1,'LESOTHO','2010-12-13 22:54:36'),(141,1,'LETONIA','2010-12-13 22:54:36'),(142,1,'LIBANO','2010-12-13 22:54:36'),(143,1,'LIBERIA','2010-12-13 22:54:36'),(144,1,'LIBIA','2010-12-13 22:54:36'),(145,1,'LIECHTENSTEIN','2010-12-13 22:54:36'),(146,1,'LITUANIA','2010-12-13 22:54:36'),(147,1,'LUXEMBURGO','2010-12-13 22:54:36'),(148,1,'MACAO','2010-12-13 22:54:36'),(149,1,'MACEDONIA','2010-12-13 22:54:36'),(150,1,'MADAGASCAR','2010-12-13 22:54:36'),(151,1,'MADEIRA','2010-12-13 22:54:36'),(152,1,'MALAYSIA','2010-12-13 22:54:36'),(153,1,'MALAWI','2010-12-13 22:54:36'),(154,1,'MALDIVAS','2010-12-13 22:54:36'),(155,1,'MALI','2010-12-13 22:54:36'),(156,1,'MALTA','2010-12-13 22:54:36'),(157,1,'MARIANAS DEL NORTE, ISLAS','2010-12-13 22:54:36'),(158,1,'MARSHALL, ISLAS','2010-12-13 22:54:36'),(159,1,'MARRUECOS','2010-12-13 22:54:36'),(160,1,'MARTINICA','2010-12-13 22:54:36'),(161,1,'MAURICIO','2010-12-13 22:54:36'),(162,1,'MAURITANIA','2010-12-13 22:54:36'),(163,1,'MEXICO','2010-12-13 22:54:36'),(164,1,'MICRONESIA, ESTADOS FEDERADOS DE','2010-12-13 22:54:36'),(165,1,'MIDWAY ISLAS','2010-12-13 22:54:36'),(166,1,'MOLDAVIA','2010-12-13 22:54:36'),(167,1,'MONGOLIA','2010-12-13 22:54:36'),(168,1,'MONACO','2010-12-13 22:54:36'),(169,1,'MONTSERRAT, ISLA','2010-12-13 22:54:36'),(170,1,'MOZAMBIQUE','2010-12-13 22:54:36'),(171,1,'NAMIBIA','2010-12-13 22:54:36'),(172,1,'NAURU','2010-12-13 22:54:36'),(173,1,'NAVIDAD (CHRISTMAS), ISLA','2010-12-13 22:54:36'),(174,1,'NEPAL','2010-12-13 22:54:36'),(175,1,'NICARAGUA','2010-12-13 22:54:36'),(176,1,'NIGER','2010-12-13 22:54:36'),(177,1,'NIGERIA','2010-12-13 22:54:36'),(178,1,'NIUE, ISLA','2010-12-13 22:54:36'),(179,1,'NORFOLK, ISLA','2010-12-13 22:54:36'),(180,1,'NORUEGA','2010-12-13 22:54:36'),(181,1,'NUEVA CALEDONIA','2010-12-13 22:54:36'),(182,1,'PAPUASIA NUEVA GUINEA','2010-12-13 22:54:36'),(183,1,'NUEVA ZELANDA','2010-12-13 22:54:36'),(184,1,'VANUATU','2010-12-13 22:54:36'),(185,1,'OMAN','2010-12-13 22:54:36'),(186,1,'PACIFICO, ISLAS DEL','2010-12-13 22:54:36'),(187,1,'PAISES BAJOS','2010-12-13 22:54:36'),(188,1,'PAKISTAN','2010-12-13 22:54:36'),(189,1,'PALAU, ISLAS','2010-12-13 22:54:36'),(190,1,'TERRITORIO AUTONOMO DE PALESTINA.','2010-12-13 22:54:36'),(191,1,'PANAMA','2010-12-13 22:54:36'),(192,1,'PARAGUAY','2010-12-13 22:54:36'),(193,1,'PERÚ','2010-12-13 22:54:36'),(194,1,'PITCAIRN, ISLA','2010-12-13 22:54:36'),(195,1,'POLINESIA FRANCESA','2010-12-13 22:54:36'),(196,1,'POLONIA','2010-12-13 22:54:36'),(197,1,'PORTUGAL','2010-12-13 22:54:36'),(198,1,'PUERTO RICO','2010-12-13 22:54:36'),(199,1,'QATAR','2010-12-13 22:54:36'),(200,1,'REINO UNIDO','2010-12-13 22:54:36'),(201,1,'ESCOCIA','2010-12-13 22:54:36'),(202,1,'REPUBLICA ARABE UNIDA','2010-12-13 22:54:36'),(203,1,'REPUBLICA CENTROAFRICANA','2010-12-13 22:54:36'),(204,1,'REPUBLICA CHECA','2010-12-13 22:54:36'),(205,1,'REPUBLICA DE SWAZILANDIA','2010-12-13 22:54:36'),(206,1,'REPUBLICA DE TUNEZ','2010-12-13 22:54:36'),(207,1,'REPUBLICA DOMINICANA','2010-12-13 22:54:36'),(208,1,'REUNION','2010-12-13 22:54:36'),(209,1,'ZIMBABWE','2010-12-13 22:54:36'),(210,1,'RUMANIA','2010-12-13 22:54:36'),(211,1,'RUANDA','2010-12-13 22:54:36'),(212,1,'RUSIA','2010-12-13 22:54:36'),(213,1,'SALOMON, ISLAS','2010-12-13 22:54:36'),(214,1,'SAHARA OCCIDENTAL','2010-12-13 22:54:36'),(215,1,'SAMOA OCCIDENTAL','2010-12-13 22:54:36'),(216,1,'SAMOA NORTEAMERICANA','2010-12-13 22:54:36'),(217,1,'SAN CRISTOBAL Y NIEVES','2010-12-13 22:54:36'),(218,1,'SAN MARINO','2010-12-13 22:54:36'),(219,1,'SAN PEDRO Y MIQUELON','2010-12-13 22:54:36'),(220,1,'SAN VICENTE Y LAS GRANADINAS','2010-12-13 22:54:36'),(221,1,'SANTA ELENA','2010-12-13 22:54:36'),(222,1,'SANTA LUCIA','2010-12-13 22:54:36'),(223,1,'SANTO TOME Y PRINCIPE','2010-12-13 22:54:36'),(224,1,'SENEGAL','2010-12-13 22:54:36'),(225,1,'SEYCHELLES','2010-12-13 22:54:36'),(226,1,'SIERRA LEONA','2010-12-13 22:54:36'),(227,1,'SINGAPUR','2010-12-13 22:54:36'),(228,1,'SIRIA, REPUBLICA ARABE DE','2010-12-13 22:54:36'),(229,1,'SOMALIA','2010-12-13 22:54:36'),(230,1,'SRI LANKA','2010-12-13 22:54:36'),(231,1,'SUDAFRICA, REPUBLICA DE','2010-12-13 22:54:36'),(232,1,'SUDAN','2010-12-13 22:54:36'),(233,1,'SUECIA','2010-12-13 22:54:36'),(234,1,'SUIZA','2010-12-13 22:54:36'),(235,1,'SURINAM','2010-12-13 22:54:36'),(236,1,'SAWSILANDIA','2010-12-13 22:54:36'),(237,1,'TADJIKISTAN','2010-12-13 22:54:36'),(238,1,'TAILANDIA','2010-12-13 22:54:36'),(239,1,'TANZANIA, REPUBLICA UNIDA DE','2010-12-13 22:54:36'),(240,1,'DJIBOUTI','2010-12-13 22:54:36'),(241,1,'TERRITORIO ANTARTICO BRITANICO','2010-12-13 22:54:36'),(242,1,'TERRITORIO BRITANICO DEL OCEANO INDICO','2010-12-13 22:54:36'),(243,1,'TIMOR DEL ESTE','2010-12-13 22:54:36'),(244,1,'TOGO','2010-12-13 22:54:36'),(245,1,'TOKELAU','2010-12-13 22:54:36'),(246,1,'TONGA','2010-12-13 22:54:36'),(247,1,'TRINIDAD Y TOBAGO','2010-12-13 22:54:36'),(248,1,'TRISTAN DA CUNHA','2010-12-13 22:54:36'),(249,1,'TUNICIA','2010-12-13 22:54:36'),(250,1,'TURCAS Y CAICOS, ISLAS','2010-12-13 22:54:36'),(251,1,'TURKMENISTAN','2010-12-13 22:54:36'),(252,1,'TURQUIA','2010-12-13 22:54:36'),(253,1,'TUVALU','2010-12-13 22:54:36'),(254,1,'UCRANIA','2010-12-13 22:54:36'),(255,1,'UGANDA','2010-12-13 22:54:36'),(256,1,'URSS','2010-12-13 22:54:36'),(257,1,'URUGUAY','2010-12-13 22:54:36'),(258,1,'UZBEKISTAN','2010-12-13 22:54:36'),(259,1,'VENEZUELA','2010-12-13 22:54:36'),(260,1,'VIET NAM','2010-12-13 22:54:36'),(261,1,'VIETNAM (DEL NORTE)','2010-12-13 22:54:36'),(262,1,'VIRGENES, ISLAS (BRITANICAS)','2010-12-13 22:54:36'),(263,1,'VIRGENES, ISLAS (NORTEAMERICANAS)','2010-12-13 22:54:36'),(264,1,'FIJI','2010-12-13 22:54:36'),(265,1,'WAKE, ISLA','2010-12-13 22:54:36'),(266,1,'WALLIS Y FORTUNA, ISLAS','2010-12-13 22:54:36'),(267,1,'YEMEN','2010-12-13 22:54:36'),(268,1,'YUGOSLAVIA','2010-12-13 22:54:36'),(269,1,'ZAIRE','2010-12-13 22:54:36'),(270,1,'ZAMBIA','2010-12-13 22:54:36'),(271,1,'ZONA DEL CANAL DE PANAMA','2010-12-13 22:54:36'),(272,1,'ZONA LIBRE OSTRAVA','2010-12-13 22:54:36'),(273,1,'ZONA NEUTRAL (PALESTINA)','2010-12-13 22:54:36');
/*!40000 ALTER TABLE `ant_nacionalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_periodo`
--

DROP TABLE IF EXISTS `ant_periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_periodo` (
  `PERIODP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CICLOP_Codigo` int DEFAULT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `PERIODC_DESCRIPCION` varchar(255) NOT NULL,
  `PERIODC_FLAGESTADO` int DEFAULT '1',
  PRIMARY KEY (`PERIODP_Codigo`),
  KEY `fk_periodo_ciclo_idx` (`CICLOP_Codigo`),
  CONSTRAINT `fk_periodo_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_periodo`
--

LOCK TABLES `ant_periodo` WRITE;
/*!40000 ALTER TABLE `ant_periodo` DISABLE KEYS */;
INSERT INTO `ant_periodo` VALUES (4,11,1,'I BIMESTRE',1),(7,16,2,'PERIODO UNICO',1);
/*!40000 ALTER TABLE `ant_periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_permiso`
--

DROP TABLE IF EXISTS `ant_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_permiso` (
  `PERM_Codigo` int NOT NULL AUTO_INCREMENT,
  `ROL_Codigo` int NOT NULL,
  `MENU_Codigo` int NOT NULL,
  `PERM_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`PERM_Codigo`),
  UNIQUE KEY `ROL_Codigo_MENU_Codigo` (`ROL_Codigo`,`MENU_Codigo`),
  KEY `FK_cji_permiso_cji_menu` (`MENU_Codigo`),
  CONSTRAINT `FK_ant_permiso_ant_menu` FOREIGN KEY (`MENU_Codigo`) REFERENCES `ant_menu` (`MENU_Codigo`),
  CONSTRAINT `FK_ant_permiso_ant_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `ant_rol` (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_permiso`
--

LOCK TABLES `ant_permiso` WRITE;
/*!40000 ALTER TABLE `ant_permiso` DISABLE KEYS */;
INSERT INTO `ant_permiso` VALUES (4,4,3,'1'),(5,4,4,'1'),(29,4,22,'1'),(33,4,49,'1'),(39,4,53,'1'),(45,4,57,'1'),(46,4,58,'1'),(47,4,59,'1'),(48,4,61,'1'),(49,4,62,'1'),(51,4,64,'1'),(52,4,65,'1'),(53,4,66,'1'),(54,4,67,'1'),(55,4,68,'1'),(56,4,69,'1'),(57,4,70,'1'),(59,4,72,'1'),(60,4,73,'1'),(61,4,74,'1'),(62,4,75,'1'),(66,6,3,'1'),(67,6,4,'1'),(68,6,22,'1'),(69,6,49,'1'),(71,6,53,'1'),(72,6,57,'1'),(73,6,58,'1'),(74,6,59,'1'),(75,6,61,'1'),(76,6,62,'1'),(78,6,64,'1'),(79,6,65,'1'),(81,6,67,'1'),(82,6,68,'1'),(83,6,69,'1'),(84,6,70,'1'),(85,6,72,'1'),(86,6,73,'1'),(87,6,74,'1'),(88,6,75,'1'),(92,4,79,'1'),(94,4,81,'1'),(96,4,2,'1'),(102,4,83,'1'),(103,4,84,'1'),(104,4,85,'1'),(105,4,86,'1'),(106,4,88,'1'),(107,4,87,'1'),(108,7,2,'1'),(109,7,3,'1'),(110,7,4,'1'),(111,7,22,'1'),(112,7,49,'1'),(113,7,53,'1'),(114,7,57,'1'),(115,7,58,'1'),(116,7,59,'1'),(117,7,61,'1'),(118,7,62,'1'),(119,7,64,'1'),(120,7,65,'1'),(121,7,66,'1'),(122,7,67,'1'),(123,7,68,'1'),(124,7,69,'1'),(125,7,70,'1'),(126,7,72,'1'),(127,7,73,'1'),(128,7,74,'1'),(129,7,75,'1'),(131,7,81,'1'),(132,7,83,'1'),(133,7,84,'1'),(134,7,85,'1'),(135,7,86,'1'),(136,7,87,'1'),(137,7,88,'1'),(138,4,89,'1'),(139,7,89,'1');
/*!40000 ALTER TABLE `ant_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_persona`
--

DROP TABLE IF EXISTS `ant_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_persona` (
  `PERSP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPDOCP_Codigo` int NOT NULL DEFAULT '0',
  `PERSC_ApellidoPaterno` varchar(150) DEFAULT NULL,
  `PERSC_ApellidoMaterno` varchar(150) DEFAULT NULL,
  `PERSC_Nombre` varchar(150) DEFAULT NULL,
  `PERSC_NumeroDocIdentidad` char(8) DEFAULT NULL,
  `PERSC_Direccion` varchar(250) DEFAULT NULL,
  `PERSC_Telefono` varchar(20) DEFAULT NULL,
  `PERSC_Movil` varchar(20) DEFAULT NULL,
  `PERSC_Fax` varchar(20) DEFAULT NULL,
  `PERSC_Email` varchar(200) DEFAULT NULL,
  `PERSC_Domicilio` varchar(250) DEFAULT NULL,
  `PERSC_Web` varchar(250) DEFAULT NULL,
  `PERSC_Sexo` char(2) DEFAULT NULL,
  `PERSC_FechaNacimiento` date DEFAULT '0000-00-00',
  `PERSC_FlagEstado` char(1) DEFAULT '1',
  `PERSC_FechaModificacion` datetime DEFAULT NULL,
  `PERSC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PERSP_Codigo`),
  KEY `FK_persona_tipodocumento` (`TIPDOCP_Codigo`),
  CONSTRAINT `FK_persona_tipodocumento` FOREIGN KEY (`TIPDOCP_Codigo`) REFERENCES `ant_tipodocumento` (`TIPDOCP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=433 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_persona`
--

LOCK TABLES `ant_persona` WRITE;
/*!40000 ALTER TABLE `ant_persona` DISABLE KEYS */;
INSERT INTO `ant_persona` VALUES (1,1,'Administrador','General','Adm. General','0','0','0','0','0','','0','0','1','2015-12-03','1','2015-08-05 11:53:24','2010-12-30 01:15:19'),(88,1,'FIGUEROA','MALDONADO','EDWARD','40772496','AV. ABANCAY 986 S.M.P.','5681903','0','0','edward.figueroa.ing@gmail.com','AV. ABANCAY 986 S.M.P.','0','0','1980-03-19','1','2015-08-05 00:27:56','2015-03-21 16:32:00'),(89,1,'FIGUEROA','MALDONADO','EDWARD','40772496','ABANCAY 986 SMP','5681903','0','0','edward.figueroa.ing@gmail.com','ABANCAY 986 SMP','0','0','2015-03-18','1','2015-08-05 00:27:56','2015-03-21 16:32:58'),(94,1,'Arevalo','Villanueva','Manuel','234234','','324234324','2','0','','','0','1','0000-00-00','1','2015-10-16 09:50:38','2015-05-16 17:25:47'),(136,0,'sanchez','calderon','josefina','0','0','0','0','0','','0','0','0','0000-00-00','1',NULL,'2015-08-05 23:53:28'),(137,0,'Alvarado','Jaramillo','Luis','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-10-16 14:07:14'),(185,1,'Espirime','Ortega','David','','','','','0','','','0','0','0000-00-00','1',NULL,'2015-11-30 11:12:05'),(186,1,'Espirime','Ortega','David','','','','','0','','','0','0','0000-00-00','1',NULL,'2015-11-30 11:12:16'),(187,1,'Espirime','Ortega','David','','','','','0','','','0','0','0000-00-00','1',NULL,'2015-11-30 11:13:04'),(218,1,'Barrientos','Apumayta','Enrique','','','','','0','','','0','0','0000-00-00','1',NULL,'2015-11-30 11:29:47'),(219,1,'Barrientos','Apumayta','Enrique','','','','','0','','','0','0','0000-00-00','1',NULL,'2015-11-30 11:29:51'),(226,1,'Aguilar','Fuentes','Inocente','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:11:23'),(227,1,'Almora','Rivas','Enrique','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:12:47'),(228,1,'Alva','Gallegos','Fernando MartÃ­n','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:13:19'),(229,1,'Arevalo','Villanueva','Manuel','','','','','0','','','0','1','2015-12-09','1',NULL,'2015-12-24 18:14:45'),(230,1,'Arias','Antonio','Leandro','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:15:07'),(231,1,'Carhuay','Pampas','Enrique','','','','','0','','','0','1','2015-12-02','1',NULL,'2015-12-24 18:15:50'),(232,1,'Cribillero','Aching','Juan','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:16:12'),(233,1,'Custodio','Chung','Victor','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:16:37'),(234,1,'Figueroa','Maldonado','Edward','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:16:57'),(235,1,'Figueroa','Maldonado','Edward','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:20:02'),(236,1,'Flor','Vicente','Carlos Daniel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:21:00'),(237,1,'GodiÃ±ez ','De la Cruz ','Ernesto Juan','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:21:37'),(238,1,'Leon','Villanueva','Jhony','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:22:01'),(239,1,'Luna','Martinez','Julio','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:22:28'),(240,1,'MadueÃ±o','Sulca','CÃ©sar','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:22:54'),(241,1,'Mendoza','Reyes','Carlos Alberto','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:23:14'),(242,1,'Obregon','Sotelo','Jose','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:28:44'),(243,1,'Ramos','Riofrio','Arturo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:29:09'),(244,1,'Rios','Ibarra','Alejandro','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:29:31'),(245,1,'Roca','Meneses','Roni','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:29:50'),(246,1,'Rodriguez','De los Rios','Rolando','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:30:12'),(247,1,'Salazar','MInaya','Angel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:30:29'),(248,1,'Vasquez','Dominguez','Riquelmer','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:30:53'),(249,1,'Vila','Zavala','Herbert','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:31:13'),(250,1,'Vivas','Fajardo','Ramon','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:31:35'),(251,1,'Alvarado','Jaramillo','Luis','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:32:16'),(252,1,'Arevalo','Castro','Victor Manuel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:32:43'),(253,1,'Arias','Chumpitaz','Ulises','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:33:04'),(254,1,'Barzola','Esteban','Marcelo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:33:30'),(255,1,'Espirme','Ortega','David','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:34:11'),(256,1,'Lopez','Esquivel','Miguel Angel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:34:35'),(257,1,'Mamani','Sulca','Oscar','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:34:52'),(258,1,'Mas','HuamÃ¡n','Ronald JesÃºs','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:35:16'),(259,1,'MejÃ­a','Rodrigo','Edwin','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:35:42'),(260,1,'Minaya','Ames','Julio CÃ©sar','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:36:08'),(261,1,'Nizama','Victoria','Luis Enrique','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:36:29'),(262,1,'Norabuena','Meza','Edgard','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:36:50'),(263,1,'Ã‘aupari','Huatuco','Zocimo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:37:12'),(264,1,'PÃ©rez','Cupe','RÃ³sulo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:37:31'),(265,1,'Reyes','MuÃ±oz','Elva','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:37:50'),(266,1,'Silva','Santiesteban','Mario','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:38:19'),(267,1,'Silvestre','Valer','Jim','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:38:35'),(268,1,'Sotelo','Chico','JosÃ© Carlos','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:38:55'),(269,1,'Tori','Loza','JosÃ©','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:39:14'),(270,1,'Valderrama','Soto','Ericka','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:39:30'),(271,1,'Vidal','DomÃ­nguez','Emilio','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:39:48'),(272,1,'Visurraga','Reinoso','Roberto','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:40:07'),(273,1,'Zamudio','Peves','JosÃ© Fernando','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:40:25'),(274,1,'Cabrera','Chavez','Julio Cesar','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:49:30'),(275,1,'Escudero','Acero','Phamela','','','','','0','','','0','2','0000-00-00','1',NULL,'2015-12-24 18:49:51'),(276,1,'Espinoza','Vasquez','Manuel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:50:14'),(277,1,'Gallardo','Vasquez','Pablo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:54:24'),(278,1,'Gamarra','Lezcano','Melbert','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:54:47'),(279,1,'Huaccha','Quiroz','Eduardo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:55:13'),(280,1,'Huaranca','Tanta','Sergio','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:55:37'),(281,1,'Iquise','Mamani','Luis Alberto','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:56:00'),(282,1,'Juscamayta','Tineo','Nerio Hermes','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:56:40'),(283,1,'Laurente','Artola','Victor Hugo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:57:11'),(284,1,'Mamani','Quea','Loo Javier','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:58:11'),(285,1,'Mayta','Guillermo','Jorge Enrique','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:58:35'),(286,1,'Moya','Guevara','Paulo CÃ©sar','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:59:07'),(287,1,'MuÃ±oz','Ramos','Luis Daniel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 18:59:28'),(288,1,'Naupay','GUSUKUMA','Alvarado Miguel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:00:00'),(289,1,'Pacheco','Colquicocha','Vladimir Gonzalo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:00:32'),(290,1,'Palomino','Vildoso','Rolando Raul','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:01:01'),(291,1,'Perez','Diaz','Elbert','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:01:29'),(292,1,'Rodriguez','Soto','Victor Eduardo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:02:01'),(293,1,'Rojas','Cerna','Victor Daniel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:02:25'),(294,1,'Torres','Matos','Carlos','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:02:48'),(295,1,'Valencia','Miranda','Angel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:03:12'),(296,1,'Villalobos','Solano','Juan Javier','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:03:32'),(297,1,'Yarasca','Moscol','Julio Eduardo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:04:01'),(298,1,'Andi','Chinchay','Alberto Julio','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:05:12'),(299,1,'Arambulo','Ostos','Carlos Eduardo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:05:47'),(300,1,'Carbonel','Olazabal','Daniel Roberto','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:06:15'),(301,1,'Castro','Montesino','Jorge Antonio','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:06:44'),(302,1,'Correa','GarcÃ­a','Manuel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:07:12'),(303,1,'Cortez','Galindo','Cancio Nicolas','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:08:14'),(304,1,'Chavez','Vivar','Javier','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:08:36'),(305,1,'Chilet','Cama','Wilber','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:08:54'),(306,1,'Diaz','Chavez','Henry Jose','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:09:15'),(307,1,'Garcia','Rodas','Wilfredo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:09:37'),(308,1,'Huaman','Sanchez','Alejandro Apolinario','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:10:07'),(309,1,'Huilca','Guevara','Ruben Elias','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:10:32'),(310,1,'Kurokawa','Guerrero','Manuel','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:10:55'),(311,1,'Lazo','Ochoa','Domingo Pedro','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:11:13'),(312,1,'Lopez','Arroyo','Jorge','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:11:31'),(313,1,'Oria','Chavarria','Mario','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:11:57'),(314,1,'Pachas','Salhuana','Jose Teodoro','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:12:23'),(315,1,'Pozo','Vilchez','Manuel Ignacio','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:12:51'),(316,1,'Tito','CCOICCA','Saul Gregorio','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:13:12'),(317,1,'Valverde','Sandoval','Oscar Guillermo','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:13:46'),(318,1,'Vilca','Mucha','Henry Alonso','','','','','0','','','0','1','0000-00-00','1',NULL,'2015-12-24 19:14:06'),(431,0,'aaaaaaaaa','aaaaa','Aaaaaaaaaaaaa','0','24234','324234','0','0','','24234','0','0','0000-00-00','1',NULL,'2015-12-31 02:46:34'),(432,0,'aaaaaaaaa','aaaaa','Aaaaaaaaaaaaa','0','24234','324234','0','0','','24234','0','0','0000-00-00','1',NULL,'2015-12-31 02:46:39');
/*!40000 ALTER TABLE `ant_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_productoatributo2`
--

DROP TABLE IF EXISTS `ant_productoatributo2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_productoatributo2` (
  `PRODATRIB2_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROD_Codigo` int DEFAULT NULL,
  `COMPP_Codigo` int DEFAULT NULL,
  `PRODATRIB2_Descripcion` varchar(150) DEFAULT NULL,
  `PRODATRIB2_FechaModificacion` datetime DEFAULT NULL,
  `PRODATRIB2_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRODATRIB2_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_productoatributo2`
--

LOCK TABLES `ant_productoatributo2` WRITE;
/*!40000 ALTER TABLE `ant_productoatributo2` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_productoatributo2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_productoprecio`
--

DROP TABLE IF EXISTS `ant_productoprecio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_productoprecio` (
  `PRODPREP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROD_Codigo` int NOT NULL,
  `MONED_Codigo` int NOT NULL,
  `PRODPREC_Precio` double NOT NULL,
  `PRODPREC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `PRODPREC_FechaModificacion` datetime DEFAULT NULL,
  `PRODPREC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRODPREP_Codigo`),
  UNIQUE KEY `PROD_Codigo` (`PROD_Codigo`,`MONED_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_productoprecio`
--

LOCK TABLES `ant_productoprecio` WRITE;
/*!40000 ALTER TABLE `ant_productoprecio` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_productoprecio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_profesor`
--

DROP TABLE IF EXISTS `ant_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_profesor` (
  `PROP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPDOCP_Codigo` int DEFAULT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `PROC_ApellidoPaterno` varchar(150) DEFAULT NULL,
  `PROC_ApellidoMaterno` varchar(150) DEFAULT NULL,
  `PROC_Nombre` varchar(150) DEFAULT NULL,
  `PROC_NumeroDocIdentidad` char(8) DEFAULT NULL,
  `PROC_FechaNacimiento` date DEFAULT NULL,
  `PROC_Telefono` varchar(20) DEFAULT NULL,
  `PROC_Movil` varchar(20) DEFAULT NULL,
  `PROC_Sexo` char(2) DEFAULT NULL,
  `PROC_Email` varchar(150) DEFAULT NULL,
  `PROC_Direccion` varchar(150) DEFAULT NULL,
  `user_id` int NOT NULL,
  `PROC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `PROC_FlagBorrado` char(1) NOT NULL DEFAULT '1' COMMENT '1:Activo, 0: Borrado',
  `PROC_FechaModificacion` datetime DEFAULT NULL,
  `PROC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PROP_Codigo`),
  KEY `FK_EMPRESA_PROFESOR_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_EMPRESA_PROFESOR` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_profesor`
--

LOCK TABLES `ant_profesor` WRITE;
/*!40000 ALTER TABLE `ant_profesor` DISABLE KEYS */;
INSERT INTO `ant_profesor` VALUES (194,1,1,'Trujillo','Bustamante','Hernan Martin','40091818','0000-00-00','3360032','957595320','1','martin_trujillo1105@hotmail.com','Mz R Lote 50 Los NIisperos',0,'1','1','2020-03-17 15:37:39','2020-03-17 02:51:29'),(195,1,1,'Bustamante','Sanchez','Yolanda','23423423','0000-00-00','92729325','957595320','2','','',0,'1','1','2020-03-17 20:03:10','2020-03-17 04:18:50'),(196,1,1,'Trujillo','Gironda','Luis Hernan','234234','0000-00-00','234234','234234','1','martin_trujillo1105@hotmail.com','23',0,'1','1','2020-03-17 20:02:55','2020-03-17 20:02:55'),(197,1,2,'Bustamante ','Sanchez','Yolanda','23423422','0000-00-00','234234','','2','','',0,'1','1','2020-03-17 23:23:30','2020-03-17 23:23:30'),(198,1,2,'Trujillo','Bustamante','Hernan Martin','23423423','0000-00-00','23424234','','1','','',0,'1','1','2020-03-17 23:23:53','2020-03-17 23:23:53');
/*!40000 ALTER TABLE `ant_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_puntaje`
--

DROP TABLE IF EXISTS `ant_puntaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_puntaje` (
  `PUNTP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PRODATRIB_Codigo` int NOT NULL,
  `ORDENP_Codigo` int NOT NULL DEFAULT '0',
  `PUNTC_Puntaje` double NOT NULL DEFAULT '0',
  `PUNTC_FechaInicio` datetime DEFAULT NULL,
  `PUNTC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PUNTP_Codigo`),
  KEY `FK_puntaje_productoatributo` (`PRODATRIB_Codigo`),
  KEY `FK_puntaje_orden` (`ORDENP_Codigo`),
  CONSTRAINT `FK_puntaje_orden` FOREIGN KEY (`ORDENP_Codigo`) REFERENCES `ant_matricula` (`ORDENP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_puntaje`
--

LOCK TABLES `ant_puntaje` WRITE;
/*!40000 ALTER TABLE `ant_puntaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_puntaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_rol`
--

DROP TABLE IF EXISTS `ant_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_rol` (
  `ROL_Codigo` int NOT NULL AUTO_INCREMENT,
  `ROL_Descripcion` varchar(150) DEFAULT NULL,
  `ROL_FlagEstado` char(1) DEFAULT '1',
  `ROL_FlagAcceso` char(1) DEFAULT '3' COMMENT '1:Total, 2:Por curso,3: Por profesor ',
  `ROL_FechaModificacion` datetime DEFAULT NULL,
  `ROL_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_rol`
--

LOCK TABLES `ant_rol` WRITE;
/*!40000 ALTER TABLE `ant_rol` DISABLE KEYS */;
INSERT INTO `ant_rol` VALUES (0,':::Seleccione:::','1','1',NULL,'2015-08-05 21:08:09'),(4,'Administrador','1','1',NULL,'2020-03-17 21:03:17'),(6,'Alumno','1','2',NULL,'2020-03-17 21:03:17'),(7,'Profesor','1','3',NULL,'2015-12-19 02:32:06');
/*!40000 ALTER TABLE `ant_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_seccion`
--

DROP TABLE IF EXISTS `ant_seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_seccion` (
  `SECCIONP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CURSOP_Codigo` int DEFAULT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `SECCIONC_Descripcion` text,
  `SECCIONC_Orden` int DEFAULT NULL,
  `SECCIONC_FechaInicio` date DEFAULT '0000-00-00',
  `SECCIONC_FechaFin` date DEFAULT '0000-00-00',
  `SECCIONC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `SECCIONC_FechaModificacion` datetime DEFAULT NULL,
  `SECCIONC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SECCIONP_Codigo`),
  KEY `fk_curso_seccion_idx` (`CURSOP_Codigo`),
  KEY `fk_empresa_seccion_idx` (`EMPRP_Codigo`),
  CONSTRAINT `fk_curso_seccion` FOREIGN KEY (`CURSOP_Codigo`) REFERENCES `ant_curso` (`CURSOP_Codigo`),
  CONSTRAINT `fk_empresa_seccion` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_seccion`
--

LOCK TABLES `ant_seccion` WRITE;
/*!40000 ALTER TABLE `ant_seccion` DISABLE KEYS */;
INSERT INTO `ant_seccion` VALUES (65,99,1,'Fundamentos del lenguaje',1,'2020-03-01','2020-03-08','1',NULL,'2020-03-17 18:08:07'),(66,99,1,'Programacion orientada a objetos',2,'2020-03-10','2020-03-11','1',NULL,'2020-03-17 19:22:00'),(67,99,1,'Manejo de base de datos',3,'2020-03-02','2020-03-26','1',NULL,'2020-03-17 19:25:52'),(68,99,1,'CRUD utilizando PDO',4,'2020-03-10','2020-03-18','1',NULL,'2020-03-17 19:29:04'),(69,99,1,'Uso del patron MVC',5,'2020-03-09','2020-03-12','1',NULL,'2020-03-17 19:29:18'),(70,99,1,'Ajax con MVC',6,'2020-03-23','2020-03-18','1',NULL,'2020-03-17 19:29:30'),(71,99,1,'Manejo de plantillas',7,'2020-03-03','2020-03-18','1',NULL,'2020-03-17 19:29:52'),(72,99,1,'Proyecto final 1',8,'2020-03-10','2020-03-25','1',NULL,'2020-03-17 19:30:08'),(87,99,1,'Proyecto final 2',9,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 15:58:27'),(88,103,2,'Semana 1',1,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:12'),(89,103,2,'Semana 2',2,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:25'),(90,103,2,'Semana 3',3,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:39'),(91,103,2,'Semana 4',4,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:53'),(92,104,2,'Estudio de la nota SI',1,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:47:29'),(93,104,2,'Estudio de la nota La',2,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:47:43'),(94,105,2,'Fundamentos de PHP',1,'0000-00-00','0000-00-00','-',NULL,'2020-03-20 04:19:04'),(95,105,2,'Programacion POO',2,'0000-00-00','0000-00-00','-',NULL,'2020-03-20 04:19:33'),(96,105,2,'Manejo de BD',3,'0000-00-00','0000-00-00','-',NULL,'2020-03-20 04:31:47'),(97,105,2,'Mantenimiento PDO-1',4,'0000-00-00','0000-00-00','-',NULL,'2020-03-20 04:32:09'),(98,105,2,'Mantenimiento PDO-2',5,'0000-00-00','0000-00-00','-',NULL,'2020-03-20 04:32:33'),(99,105,2,'MVC',6,'0000-00-00','0000-00-00','-',NULL,'2020-03-20 04:32:49'),(100,105,2,'Ajax con MVC',7,'0000-00-00','0000-00-00','1',NULL,'2020-03-20 04:33:15'),(101,105,2,'Proyecto 1',8,'0000-00-00','0000-00-00','1',NULL,'2020-03-20 04:33:46'),(102,105,2,'Proyecto 2',9,'0000-00-00','0000-00-00','1',NULL,'2020-03-20 04:33:59'),(103,104,2,'Parituras',1,'0000-00-00','0000-00-00','1',NULL,'2020-03-20 22:50:41');
/*!40000 ALTER TABLE `ant_seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_sector`
--

DROP TABLE IF EXISTS `ant_sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_sector` (
  `SECTORP_Codigo` int NOT NULL AUTO_INCREMENT,
  `SECTORC_Descripcion` varchar(150) DEFAULT NULL,
  `SECTORC_FechaModificacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SECTORC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SECTORP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_sector`
--

LOCK TABLES `ant_sector` WRITE;
/*!40000 ALTER TABLE `ant_sector` DISABLE KEYS */;
INSERT INTO `ant_sector` VALUES (1,'Educacion','0000-00-00 00:00:00','2015-11-16 16:32:23'),(2,'Pesqueria','0000-00-00 00:00:00','2015-11-16 16:32:30'),(3,'Mineria','0000-00-00 00:00:00','2015-11-16 16:32:36'),(4,'Construccion','0000-00-00 00:00:00','2015-11-16 16:32:43'),(5,'Metalmecanico','0000-00-00 00:00:00','2015-11-16 16:32:50'),(6,'Electricidad','0000-00-00 00:00:00','2015-11-16 16:32:57');
/*!40000 ALTER TABLE `ant_sector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tarea`
--

DROP TABLE IF EXISTS `ant_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tarea` (
  `TAREAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `USUA_Codigo` int NOT NULL,
  `PROP_Codigo` int NOT NULL,
  `CICLOP_Codigo` int NOT NULL,
  `TIPOTAREAP_Codigo` int DEFAULT NULL,
  `TAREAC_Nombre` varchar(500) NOT NULL,
  `TAREAC_Descripcion` varchar(500) NOT NULL,
  `TAREAC_Numero` int DEFAULT NULL,
  `TAREAC_Fecha` date NOT NULL DEFAULT '0000-00-00',
  `TAREAC_FechaEntrega` date NOT NULL DEFAULT '0000-00-00',
  `TAREAC_FechaModificacion` datetime DEFAULT NULL,
  `TAREAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TAREAP_Codigo`),
  KEY `FK_tarea_usuario` (`USUA_Codigo`),
  KEY `FK_tarea_profesor` (`PROP_Codigo`),
  KEY `FK_tarea_tipotarea` (`TIPOTAREAP_Codigo`),
  CONSTRAINT `FK_tarea_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_tarea_tipotarea` FOREIGN KEY (`TIPOTAREAP_Codigo`) REFERENCES `ant_tipotarea` (`TIPOTAREAP_Codigo`),
  CONSTRAINT `FK_tarea_usuario` FOREIGN KEY (`USUA_Codigo`) REFERENCES `ant_usuario` (`USUAP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tarea`
--

LOCK TABLES `ant_tarea` WRITE;
/*!40000 ALTER TABLE `ant_tarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tareadetalle`
--

DROP TABLE IF EXISTS `ant_tareadetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tareadetalle` (
  `TAREADETP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TAREAP_Codigo` int NOT NULL DEFAULT '0',
  `TIPCICLOP_Codigo` int NOT NULL DEFAULT '0',
  `PROP_Codigo` int DEFAULT '0',
  `PRODATRIBDET_Codigo` int DEFAULT '0',
  `TAREADETC_Cantidad` varchar(50) DEFAULT NULL,
  `TAREADETC_CantidadEntregada` varchar(50) DEFAULT NULL,
  `TAREADETC_Situacion` char(1) DEFAULT '1' COMMENT '1: Pendiente, 2:OK, 3:Leve, 4:Retraso',
  `TAREADETC_FechaEntrega` date NOT NULL DEFAULT '0000-00-00',
  `TAREADETC_FechaModificacion` datetime DEFAULT NULL,
  `TAREADETC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TAREADETP_Codigo`),
  KEY `FK_tareadetalle_tarea` (`TAREAP_Codigo`),
  KEY `FK_tareadetalle_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_tareadetalle_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_tareadetalle_tarea` FOREIGN KEY (`TAREAP_Codigo`) REFERENCES `ant_tarea` (`TAREAP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tareadetalle`
--

LOCK TABLES `ant_tareadetalle` WRITE;
/*!40000 ALTER TABLE `ant_tareadetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_tareadetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tareo`
--

DROP TABLE IF EXISTS `ant_tareo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tareo` (
  `TAREOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `AULAP_Codigo` int NOT NULL DEFAULT '0',
  `TAREOC_Tipo` int NOT NULL DEFAULT '0' COMMENT '1:Asistencia,2:Reemplazo;3:Falta',
  `USUA_Codigo` int NOT NULL DEFAULT '0',
  `TAREOC_ProfesorReemplazado` int NOT NULL DEFAULT '0',
  `TAREOC_Fecha` date NOT NULL DEFAULT '0000-00-00',
  `TAREOC_Hinicio` time NOT NULL,
  `TAREOC_Hfin` time NOT NULL,
  `TAREOC_Costo` double NOT NULL,
  `TAREOC_FechaModificacion` datetime DEFAULT NULL,
  `TAREOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TAREOP_Codigo`),
  KEY `FK_tareo_profesor` (`PROP_Codigo`),
  KEY `FK_tareo_aula` (`AULAP_Codigo`),
  KEY `FK_tareo_tipoasistencia` (`TAREOC_Tipo`),
  KEY `FK_tareo_usuario` (`USUA_Codigo`),
  CONSTRAINT `FK_tareo_aula` FOREIGN KEY (`AULAP_Codigo`) REFERENCES `ant_aula` (`AULAP_Codigo`),
  CONSTRAINT `FK_tareo_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_tareo_tipoasistencia` FOREIGN KEY (`TAREOC_Tipo`) REFERENCES `ant_tipoasistencia` (`TIPOASISP_Codigo`),
  CONSTRAINT `FK_tareo_usuario` FOREIGN KEY (`USUA_Codigo`) REFERENCES `ant_usuario` (`USUAP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tareo`
--

LOCK TABLES `ant_tareo` WRITE;
/*!40000 ALTER TABLE `ant_tareo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_tareo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tipoasistencia`
--

DROP TABLE IF EXISTS `ant_tipoasistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tipoasistencia` (
  `TIPOASISP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPOASISC_Nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`TIPOASISP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipoasistencia`
--

LOCK TABLES `ant_tipoasistencia` WRITE;
/*!40000 ALTER TABLE `ant_tipoasistencia` DISABLE KEYS */;
INSERT INTO `ant_tipoasistencia` VALUES (1,'Tardanza'),(2,'Reemplazo');
/*!40000 ALTER TABLE `ant_tipoasistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tipodocumento`
--

DROP TABLE IF EXISTS `ant_tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tipodocumento` (
  `TIPDOCP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPDOCC_Descripcion` varchar(150) DEFAULT NULL,
  `TIPOCC_Inciales` varchar(150) DEFAULT NULL,
  `TIPOCC_FlagEstado` char(1) DEFAULT '1',
  `TIPOCC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIPDOCP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipodocumento`
--

LOCK TABLES `ant_tipodocumento` WRITE;
/*!40000 ALTER TABLE `ant_tipodocumento` DISABLE KEYS */;
INSERT INTO `ant_tipodocumento` VALUES (0,'::Seleccione::','::Seleccione::','1','2014-10-06 09:19:27'),(1,'Documento Nacional de Identidad','D.N.I.','1','2010-12-16 17:50:42'),(2,'Carnet de Extranjeria','C.E.','1','2010-12-16 17:50:46');
/*!40000 ALTER TABLE `ant_tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tipoestudio`
--

DROP TABLE IF EXISTS `ant_tipoestudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tipoestudio` (
  `TIPP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPC_Nombre` varchar(100) DEFAULT NULL,
  `TIPC_Descripcion` varchar(100) DEFAULT NULL,
  `TIPC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `TIPC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipoestudio`
--

LOCK TABLES `ant_tipoestudio` WRITE;
/*!40000 ALTER TABLE `ant_tipoestudio` DISABLE KEYS */;
INSERT INTO `ant_tipoestudio` VALUES (3,'Pre','Tipo de Estudio para los alumnos que van a postular a la UNI','1','2015-05-15 09:19:44'),(4,'Repaso','Tipo de estudio para los alumnos que requieren un repaso antes de postular a la UNI','1','2015-05-15 09:19:49'),(5,'Basico','Tipo de Estudio para los alumnos que recien egresan del colegio','1','2015-05-15 09:20:23'),(6,'Intensivo','Tipo de Estudio para resolver problemas antes de dar el examen de la UNI','1','2015-05-15 09:20:28'),(7,'Escolar 3ero','Tipo de Estudio para resolver problemas antes de dar el examen de la UNI','1','2015-08-10 17:16:34'),(8,'Escolar 4to','Tipo de Estudio para resolver problemas antes de dar el examen de la UNI','1','2015-08-10 17:18:30'),(9,'Escolar 5to','Tipo de Estudio para resolver problemas antes de dar el examen de la UNI','1','2015-08-10 17:18:46');
/*!40000 ALTER TABLE `ant_tipoestudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tipotarea`
--

DROP TABLE IF EXISTS `ant_tipotarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tipotarea` (
  `TIPOTAREAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPOTAREAC_Nombre` varchar(100) DEFAULT NULL,
  `TIPOTAREAC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIPOTAREAP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipotarea`
--

LOCK TABLES `ant_tipotarea` WRITE;
/*!40000 ALTER TABLE `ant_tipotarea` DISABLE KEYS */;
INSERT INTO `ant_tipotarea` VALUES (1,'Problemas para PC','2015-09-29 19:17:08'),(2,'Problemas para Seminario','2015-09-29 19:17:05'),(3,'Revisión de probemas','2015-09-29 19:17:07');
/*!40000 ALTER TABLE `ant_tipotarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_trabajo`
--

DROP TABLE IF EXISTS `ant_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_trabajo` (
  `TRABAJP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `EMPRP_Codigo` int NOT NULL DEFAULT '0',
  `TRABAJC_Descripcion` varchar(150) DEFAULT NULL,
  `TRABAJC_FechaInicio` date NOT NULL DEFAULT '0000-00-00',
  `TRABAJC_FechaFin` date NOT NULL DEFAULT '0000-00-00',
  `TRABAJC_FechaModificacion` datetime DEFAULT NULL,
  `TRABAJC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TRABAJP_Codigo`),
  KEY `FK_trabajo_profesor` (`PROP_Codigo`),
  KEY `FK_trabajo_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `FK_trabajo_empresa` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `FK_trabajo_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_trabajo`
--

LOCK TABLES `ant_trabajo` WRITE;
/*!40000 ALTER TABLE `ant_trabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_turno`
--

DROP TABLE IF EXISTS `ant_turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_turno` (
  `TURNOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TURNOC_Descripcion` varchar(250) DEFAULT NULL,
  `TURNOC_Estado` char(1) NOT NULL DEFAULT '1' COMMENT '1:Activo,2:Inactivo',
  `TURNOC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TURNOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_turno`
--

LOCK TABLES `ant_turno` WRITE;
/*!40000 ALTER TABLE `ant_turno` DISABLE KEYS */;
INSERT INTO `ant_turno` VALUES (1,'Mañana','1','2015-12-25 21:37:54'),(2,'Tarde','1','2015-12-25 21:38:00'),(3,'Noche','2','2015-12-25 21:38:05');
/*!40000 ALTER TABLE `ant_turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_universidad`
--

DROP TABLE IF EXISTS `ant_universidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_universidad` (
  `UNIVP_Codigo` int NOT NULL AUTO_INCREMENT,
  `UNIVC_Nombre` varchar(150) NOT NULL,
  `UNIVC_Iniciales` varchar(50) DEFAULT NULL,
  `UNIVC_FechaModificacion` datetime DEFAULT NULL,
  `UNIVC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UNIVP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_universidad`
--

LOCK TABLES `ant_universidad` WRITE;
/*!40000 ALTER TABLE `ant_universidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_usuario`
--

DROP TABLE IF EXISTS `ant_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_usuario` (
  `USUAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ROL_Codigo` int NOT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `USUAC_Nombres` varchar(100) DEFAULT NULL,
  `USUAC_ApellidoPaterno` varchar(100) DEFAULT NULL,
  `USUAC_ApellidoMaterno` varchar(100) DEFAULT NULL,
  `USUAC_usuario` varchar(20) DEFAULT NULL,
  `USUAC_Password` varchar(50) DEFAULT NULL,
  `USUAC_FlagEstado` char(1) DEFAULT '1',
  `USUAC_FechaModificacion` datetime DEFAULT NULL,
  `USUAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USUAP_Codigo`),
  KEY `FK_usuario_rol` (`ROL_Codigo`),
  CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `ant_rol` (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_usuario`
--

LOCK TABLES `ant_usuario` WRITE;
/*!40000 ALTER TABLE `ant_usuario` DISABLE KEYS */;
INSERT INTO `ant_usuario` VALUES (7,4,1,'Martin','Trujillo','Bustamante','mtrujillo','e10adc3949ba59abbe56e057f20f883e','1','2015-08-05 12:09:17','2015-08-04 05:25:58'),(8,7,2,'Yolanda','Bustamante','Sanchez','ybustamante','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-03-17 21:20:59'),(9,6,2,'Angela','Trujillo','Busamante','atrujillo','','1',NULL,'2020-03-17 23:26:20');
/*!40000 ALTER TABLE `ant_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_vigilancia`
--

DROP TABLE IF EXISTS `ant_vigilancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_vigilancia` (
  `VIGILAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `TIPCICLOP_Codigo` int NOT NULL DEFAULT '0',
  `VIGILAC_Nombre` varchar(50) NOT NULL,
  `VIGILAC_Numero` int DEFAULT NULL,
  `VIGILAC_Descripcion` varchar(250) NOT NULL,
  `VIGILAC_Fecha` date NOT NULL,
  `VIGILAC_FechaModificacion` datetime DEFAULT NULL,
  `VIGILAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`VIGILAP_Codigo`),
  KEY `FK_vigilancia_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_vigilancia_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_vigilancia`
--

LOCK TABLES `ant_vigilancia` WRITE;
/*!40000 ALTER TABLE `ant_vigilancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_vigilancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_vigilanciadetalle`
--

DROP TABLE IF EXISTS `ant_vigilanciadetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_vigilanciadetalle` (
  `VIGILADETP_Codigo` int NOT NULL AUTO_INCREMENT,
  `VIGILAP_Codigo` int NOT NULL DEFAULT '0',
  `PROD_Codigo` int NOT NULL DEFAULT '0',
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `VIGILADETC_FechaModificacion` datetime DEFAULT NULL,
  `VIGILADETC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`VIGILADETP_Codigo`),
  KEY `FK_vigilanciadetalle_vigilancia` (`VIGILAP_Codigo`),
  KEY `FK_vigilanciadetalle_curso` (`PROD_Codigo`),
  KEY `FK_vigilanciadetalle_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_vigilanciadetalle_curso` FOREIGN KEY (`PROD_Codigo`) REFERENCES `ant_curso` (`CURSOP_Codigo`),
  CONSTRAINT `FK_vigilanciadetalle_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_vigilanciadetalle_vigilancia` FOREIGN KEY (`VIGILAP_Codigo`) REFERENCES `ant_vigilancia` (`VIGILAP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_vigilanciadetalle`
--

LOCK TABLES `ant_vigilanciadetalle` WRITE;
/*!40000 ALTER TABLE `ant_vigilanciadetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_vigilanciadetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'aulavirtual'
--

--
-- Dumping routines for database 'aulavirtual'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-20 19:24:16
