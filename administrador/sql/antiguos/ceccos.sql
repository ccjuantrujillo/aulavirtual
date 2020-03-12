-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: ceccos
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
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_acceso`
--

LOCK TABLES `ant_acceso` WRITE;
/*!40000 ALTER TABLE `ant_acceso` DISABLE KEYS */;
INSERT INTO `ant_acceso` VALUES (1,1,'2015-11-23 14:15:37'),(2,1,'2015-11-23 14:15:58'),(3,1,'2015-11-23 14:28:14'),(4,94,'2015-11-23 14:28:44'),(5,1,'2015-11-23 14:30:26'),(8,1,'2015-11-23 15:21:19'),(10,1,'2015-11-23 15:23:41'),(11,1,'2015-11-23 15:26:48'),(12,1,'2015-11-24 10:44:18'),(13,1,'2015-11-24 17:40:33'),(14,1,'2015-11-24 08:28:36'),(15,1,'2015-11-27 10:59:08'),(16,1,'2015-11-27 07:01:21'),(17,1,'2015-11-27 10:59:51'),(18,1,'2015-11-27 11:02:42'),(19,1,'2015-11-27 11:05:23'),(20,1,'2015-11-27 11:49:42'),(21,1,'2015-11-28 11:04:58'),(22,1,'2015-11-28 17:51:47'),(23,1,'2015-11-28 10:51:09'),(24,1,'2015-11-29 09:36:50'),(25,1,'2015-11-30 17:15:54'),(26,1,'2015-11-30 17:19:03'),(27,1,'2015-11-30 06:08:36'),(28,1,'2015-11-30 06:19:08'),(29,1,'2015-11-30 10:21:22'),(30,1,'2015-11-30 11:15:56'),(31,1,'2015-11-30 06:10:38'),(32,1,'2015-11-30 07:35:08'),(33,94,'2015-11-30 07:35:39'),(34,1,'2015-11-30 07:39:51'),(35,1,'2015-11-30 10:37:30'),(36,1,'2015-11-30 11:52:52'),(37,1,'2015-11-30 12:06:27'),(38,1,'2015-11-30 12:06:53'),(39,1,'2015-11-30 12:29:43'),(40,1,'2015-12-12 06:58:42'),(41,1,'2015-12-14 17:40:38'),(42,1,'2015-12-15 15:49:20'),(43,1,'2015-12-19 08:22:51'),(44,1,'2015-12-19 08:41:22'),(45,1,'2015-12-19 09:45:06'),(46,1,'2015-12-19 07:07:49'),(47,1,'2015-12-19 07:14:49'),(48,1,'2015-12-19 07:18:23'),(49,1,'2015-12-19 12:24:37'),(50,1,'2015-12-22 07:18:35'),(51,1,'2015-12-23 12:25:25'),(52,1,'2015-12-23 16:57:32'),(53,1,'2015-12-24 08:36:44'),(54,1,'2015-12-24 09:50:37'),(55,1,'2015-12-25 14:40:58'),(56,1,'2015-12-26 10:01:59'),(57,1,'2015-12-26 07:22:24'),(58,1,'2015-12-28 10:28:01'),(59,1,'2015-12-30 15:03:05'),(60,1,'2015-12-31 07:58:04'),(61,1,'2016-01-04 15:08:21'),(62,1,'2016-01-05 06:38:58'),(63,1,'2016-01-05 06:25:33'),(64,1,'2016-01-05 07:09:41'),(65,1,'2016-01-05 08:25:19'),(66,1,'2016-01-06 10:07:22'),(67,1,'2016-01-09 12:00:48'),(68,1,'2016-01-09 08:55:02'),(69,1,'2016-01-15 14:50:54'),(70,1,'2016-01-16 09:25:15'),(71,1,'2016-01-22 06:21:01'),(72,1,'2019-09-11 13:11:23'),(73,1,'2019-09-11 13:12:03'),(74,1,'2019-09-11 13:26:50'),(75,1,'2019-09-11 13:28:03'),(76,1,'2019-09-11 13:55:40'),(77,1,'2019-09-11 07:17:22'),(78,1,'2019-09-11 08:12:34'),(79,1,'2020-02-25 14:21:21'),(80,1,'2020-02-28 14:50:02'),(81,1,'2020-03-11 16:54:03'),(82,1,'2020-03-12 10:46:15'),(83,1,'2020-03-12 11:01:58'),(84,1,'2020-03-12 11:46:55'),(85,1,'2020-03-12 13:37:55');
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
  KEY `FK_acta_tipoestudiociclo` (`TIPCICLOP_Codigo`),
  CONSTRAINT `FK_acta_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_acta_tipoestudiociclo` FOREIGN KEY (`TIPCICLOP_Codigo`) REFERENCES `ant_tipoestudiociclo` (`TIPCICLOP_Codigo`),
  CONSTRAINT `FK_acta_usuario` FOREIGN KEY (`USUA_Codigo`) REFERENCES `ant_usuario` (`USUA_Codigo`)
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
  CONSTRAINT `FK_ant_actaexposicion_ant_tema` FOREIGN KEY (`PRODATRIBDET_Codigo`) REFERENCES `ant_tema` (`PRODATRIBDET_Codigo`)
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
-- Table structure for table `ant_actividad`
--

DROP TABLE IF EXISTS `ant_actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_actividad` (
  `ACTP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ORDENP_Codigo` int NOT NULL,
  `ACTC_Accion` varchar(250) NOT NULL,
  `ACTC_Modulo` varchar(250) NOT NULL,
  `ACTC_Session` varchar(250) NOT NULL,
  `ACTC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACTP_Codigo`),
  KEY `FK_actividad_orden` (`ORDENP_Codigo`),
  CONSTRAINT `FK_actividad_orden` FOREIGN KEY (`ORDENP_Codigo`) REFERENCES `ant_matricula` (`ORDENP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_actividad`
--

LOCK TABLES `ant_actividad` WRITE;
/*!40000 ALTER TABLE `ant_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_afiliacion`
--

DROP TABLE IF EXISTS `ant_afiliacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_afiliacion` (
  `AFILIAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `SOCIEDP_Codigo` int NOT NULL DEFAULT '0',
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `AFILIAC_Fecha` date NOT NULL DEFAULT '0000-00-00',
  `AFILIAC_FechaModificacion` datetime DEFAULT NULL,
  `AFILIAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AFILIAP_Codigo`),
  KEY `FK_afiliacion_sociedad` (`SOCIEDP_Codigo`),
  KEY `FK_afiliacion_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_afiliacion_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_afiliacion_sociedad` FOREIGN KEY (`SOCIEDP_Codigo`) REFERENCES `ant_sociedad` (`SOCIEDP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_afiliacion`
--

LOCK TABLES `ant_afiliacion` WRITE;
/*!40000 ALTER TABLE `ant_afiliacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_afiliacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_alumno`
--

DROP TABLE IF EXISTS `ant_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_alumno` (
  `ALUMP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ALUMC_Nombres` varchar(100) DEFAULT NULL,
  `ALUMC_ApellidoPaterno` varchar(100) DEFAULT NULL,
  `ALUMC_ApellidoMaterno` varchar(100) DEFAULT NULL,
  `TIPDOCP_Codigo` int DEFAULT NULL,
  `ALUMC_NumeroDoc` varchar(100) DEFAULT NULL,
  `ALUMC_Email` varchar(100) DEFAULT NULL,
  `ALUMC_Telefono` varchar(100) DEFAULT NULL,
  `ALUMC_Direccion` varchar(45) DEFAULT NULL,
  `ALUMC_FechaNac` date DEFAULT NULL,
  `ALUMC_FlagEstado` char(1) DEFAULT '1',
  `ALUMC_FechaModificacion` datetime DEFAULT NULL,
  `ALUMC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`ALUMP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_alumno`
--

LOCK TABLES `ant_alumno` WRITE;
/*!40000 ALTER TABLE `ant_alumno` DISABLE KEYS */;
INSERT INTO `ant_alumno` VALUES (75,'Hernan Martin','Trujillo','Bustamante',NULL,'40091818','martin_trujillo1105@hotmail.com','957595320','Mz R Lote50 SAMP','0000-00-00','1',NULL,'2020-03-12 07:32:47',7);
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
  UNIQUE KEY `CICLOP_Codigo_AULAP_Codigo_APERTUC_Turno` (`CICLOP_Codigo`,`AULAP_Codigo`,`TURNOP_Codigo`),
  KEY `FK_ant_apertura_ant_tipoestudiociclo` (`TIPCICLOP_Codigo`),
  KEY `FK_ant_apertura_ant_aula` (`AULAP_Codigo`),
  KEY `FK_ant_apertura_ant_turno` (`TURNOP_Codigo`),
  KEY `FK_ant_apertura_ant_modulo` (`MODULOP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_aula` FOREIGN KEY (`AULAP_Codigo`) REFERENCES `ant_aula` (`AULAP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_modulo` FOREIGN KEY (`MODULOP_Codigo`) REFERENCES `ant_modulo` (`MODULOP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_tipoestudiociclo` FOREIGN KEY (`TIPCICLOP_Codigo`) REFERENCES `ant_tipoestudiociclo` (`TIPCICLOP_Codigo`),
  CONSTRAINT `FK_ant_apertura_ant_turno` FOREIGN KEY (`TURNOP_Codigo`) REFERENCES `ant_turno` (`TURNOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_apertura`
--

LOCK TABLES `ant_apertura` WRITE;
/*!40000 ALTER TABLE `ant_apertura` DISABLE KEYS */;
INSERT INTO `ant_apertura` VALUES (35,1,1,1,1,6,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:42:30'),(36,1,1,2,1,6,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:42:46'),(37,1,1,3,1,5,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:43:01'),(43,1,1,4,1,5,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:43:35'),(56,1,1,5,1,5,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:45:45'),(57,1,1,6,1,5,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:46:33'),(58,1,1,7,1,5,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:46:47'),(59,1,1,8,1,1,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:47:00'),(60,1,1,9,1,5,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:47:18'),(61,1,1,10,1,5,'',NULL,'1','2015-12-24',NULL,'2015-12-24 18:47:37'),(62,1,1,13,1,5,'',NULL,'1','2016-01-09',NULL,'2016-01-09 15:48:47'),(65,1,1,13,2,7,'',NULL,'1','2016-01-22',NULL,'2016-01-22 01:08:53'),(81,1,3,14,2,3,'',NULL,'1','2016-01-22',NULL,'2016-01-22 06:32:22');
/*!40000 ALTER TABLE `ant_apertura` ENABLE KEYS */;
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
  KEY `FK_asignacion_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_asignacion_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_asignacion_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_asignacion`
--

LOCK TABLES `ant_asignacion` WRITE;
/*!40000 ALTER TABLE `ant_asignacion` DISABLE KEYS */;
INSERT INTO `ant_asignacion` VALUES (43,148,1,149,'0','0','2015-12-24 00:00:00','1',NULL,'2015-12-24 19:26:27'),(44,148,1,156,'0','0','2015-12-24 00:00:00','1',NULL,'2015-12-24 19:30:55'),(46,148,1,212,'0','0','2015-12-24 00:00:00','1',NULL,'2015-12-24 19:39:40'),(48,153,1,198,'0','0','2015-12-28 00:00:00','1',NULL,'2015-12-28 17:50:48'),(49,136,1,148,'0','0','2016-01-22 00:00:00','1',NULL,'2016-01-22 03:10:50'),(50,126,1,204,'0','0','2016-01-22 00:00:00','1',NULL,'2016-01-22 03:11:29');
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
INSERT INTO `ant_asignaciondetalle` VALUES (67,43,1,'10:20:00','12:10:00',NULL,'2016-01-22 03:09:42'),(68,43,3,'10:20:00','12:10:00',NULL,'2016-01-22 03:09:42'),(69,44,1,'10:20:00','12:10:00',NULL,'2016-01-22 03:09:57'),(70,44,3,'10:20:00','12:10:00',NULL,'2016-01-22 03:09:57'),(71,46,1,'08:10:00','10:00:00',NULL,'2016-01-22 03:10:04'),(72,46,3,'08:10:00','10:00:00',NULL,'2016-01-22 03:10:04'),(73,48,1,'07:30:00','10:00:00',NULL,'2016-01-22 03:10:12'),(74,48,3,'07:30:00','10:00:00',NULL,'2016-01-22 03:10:12'),(77,49,3,'08:10:00','10:00:00',NULL,'2016-01-22 03:10:50'),(78,49,5,'08:10:00','10:00:00',NULL,'2016-01-22 03:10:50'),(79,50,3,'10:20:00','12:10:00',NULL,'2016-01-22 03:11:29'),(80,50,5,'10:20:00','12:10:00',NULL,'2016-01-22 03:11:29');
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
  `AULAC_Nombre` varchar(100) DEFAULT NULL,
  `AULAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AULAP_Codigo`),
  KEY `FK_aula_local` (`LOCP_Codigo`),
  CONSTRAINT `FK_aula_local` FOREIGN KEY (`LOCP_Codigo`) REFERENCES `ant_local` (`LOCP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_aula`
--

LOCK TABLES `ant_aula` WRITE;
/*!40000 ALTER TABLE `ant_aula` DISABLE KEYS */;
INSERT INTO `ant_aula` VALUES (1,1,'D101','2015-05-16 17:46:43'),(2,1,'D102','2015-05-16 17:46:58'),(3,1,'D103','2015-05-16 17:47:11'),(4,1,'D104','2015-05-16 17:47:20'),(5,1,'D201','2015-05-16 17:47:30'),(6,1,'D202','2015-05-16 17:47:40'),(7,1,'D203','2015-05-16 17:47:49'),(8,1,'D204','2015-05-16 17:47:58'),(9,1,'D205','2015-05-16 17:48:06'),(10,1,'D206','2015-05-16 17:48:14'),(11,2,'A101','2015-05-16 17:48:30'),(12,2,'A102','2015-05-16 17:48:41'),(13,2,'A103','2015-05-16 17:48:54'),(14,2,'B101','2015-05-16 17:49:06'),(15,2,'B102','2015-05-16 17:49:14'),(16,2,'B103','2015-05-16 17:49:23'),(17,2,'C101','2015-05-16 17:49:32'),(18,2,'C102','2015-05-16 17:49:40'),(19,2,'C103','2015-05-16 17:49:48');
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
  `TIPOCICLOP_Codigo` int NOT NULL,
  `COMPC_Nombre` varchar(250) NOT NULL,
  `CICC_FECHA_INICIO` date NOT NULL,
  `CICC_FECHA_FIN` date NOT NULL,
  `CICC_DESCRIPCION` varchar(255) NOT NULL,
  `COMPC_FlagEstado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`CICLOP_Codigo`),
  KEY `FK_ciclo_tipociclo` (`TIPOCICLOP_Codigo`),
  CONSTRAINT `FK_ciclo_tipociclo` FOREIGN KEY (`TIPOCICLOP_Codigo`) REFERENCES `ant_tipociclo` (`TIPOCICLOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_ciclo`
--

LOCK TABLES `ant_ciclo` WRITE;
/*!40000 ALTER TABLE `ant_ciclo` DISABLE KEYS */;
INSERT INTO `ant_ciclo` VALUES (1,2,'2020-FEBRERO','0000-00-00','1990-05-11','CICLO 1',1),(2,2,'ADMISION 2015-2','2015-05-06','2015-10-25','CICLO DE FIN DE AÃ±O',2);
/*!40000 ALTER TABLE `ant_ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_conferencia`
--

DROP TABLE IF EXISTS `ant_conferencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_conferencia` (
  `CONFERP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL,
  `CONFERC_Nombre` varchar(50) DEFAULT NULL,
  `CONFERC_Descripcion` varchar(150) DEFAULT NULL,
  `CONFERC_Fecha` date DEFAULT '0000-00-00',
  `CONFERC_FechaModificacion` datetime DEFAULT NULL,
  `CONFERC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CONFERP_Codigo`),
  KEY `FK_conferencia_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_conferencia_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_conferencia`
--

LOCK TABLES `ant_conferencia` WRITE;
/*!40000 ALTER TABLE `ant_conferencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_conferencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_curso`
--

DROP TABLE IF EXISTS `ant_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_curso` (
  `PROD_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPPROD_Codigo` int NOT NULL,
  `PROD_Nombre` varchar(100) DEFAULT NULL,
  `PROD_DescripcionBreve` varchar(200) DEFAULT NULL,
  `PROD_EspecificacionPDF` varchar(100) DEFAULT NULL,
  `PROD_Comentario` text,
  `PROD_Cantidad` double DEFAULT NULL,
  `PROD_Intentos` double DEFAULT NULL,
  `PROD_Tiempo` double DEFAULT NULL,
  `PROD_TiempoExamen` double NOT NULL DEFAULT '30',
  `PROD_Puntaje` double DEFAULT '14',
  `PROD_Imagen` varchar(150) DEFAULT NULL,
  `PROD_Silabus` varchar(150) DEFAULT NULL,
  `PROD_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `PROD_FechaModificacion` datetime DEFAULT NULL,
  `PROD_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PROD_Codigo`),
  KEY `FK_cji_producto_cji_tipoproducto` (`TIPPROD_Codigo`),
  CONSTRAINT `FK_cji_producto_cji_tipoproducto` FOREIGN KEY (`TIPPROD_Codigo`) REFERENCES `ant_tipoproducto` (`TIPPROD_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_curso`
--

LOCK TABLES `ant_curso` WRITE;
/*!40000 ALTER TABLE `ant_curso` DISABLE KEYS */;
INSERT INTO `ant_curso` VALUES (5,1,'Trigonometria','','0','0',88,3,2,5,14,'erp.png','capitulo06.pdf','1','2015-10-16 16:24:21','2011-01-18 12:20:19'),(92,1,'Fisica','EDWARD 2','0','0',3,5,5,30,14,NULL,NULL,'1','2015-10-16 16:23:57','2015-03-25 23:01:35'),(93,1,'Geometria','EDWARD','0','0',4,5,5,30,14,NULL,NULL,'1','2015-10-16 16:24:05','2015-03-25 23:02:55'),(95,1,'Aritmetica','SDFASDF','0','0',12,5,5,30,14,NULL,NULL,'1','2015-10-16 16:23:49','2015-07-25 04:55:23'),(96,1,'Algebra','','0','0',11,5,5,30,14,NULL,NULL,'1','2015-10-16 16:23:41','2015-07-25 04:55:41'),(97,1,'Quimica','','0','0',0,5,5,30,14,NULL,NULL,'1','2015-10-16 16:24:12','2015-10-16 14:20:50'),(98,4,'Humanidades','','0','0',0,5,5,30,14,NULL,NULL,'1',NULL,'2015-10-16 14:24:30');
/*!40000 ALTER TABLE `ant_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_cursociclo`
--

DROP TABLE IF EXISTS `ant_cursociclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_cursociclo` (
  `CURSOCIP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROD_Codigo` int NOT NULL DEFAULT '0',
  `CICLOP_Codigo` int NOT NULL DEFAULT '0',
  `CURSOCIC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `CURSOCIC_FechaModificacion` datetime DEFAULT NULL,
  `CURSOCIC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CURSOCIP_Codigo`),
  UNIQUE KEY `PROD_Codigo_CICLOP_Codigo` (`PROD_Codigo`,`CICLOP_Codigo`),
  KEY `FK_cursociclo_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_cursociclo_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_cursociclo_curso` FOREIGN KEY (`PROD_Codigo`) REFERENCES `ant_curso` (`PROD_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_cursociclo`
--

LOCK TABLES `ant_cursociclo` WRITE;
/*!40000 ALTER TABLE `ant_cursociclo` DISABLE KEYS */;
INSERT INTO `ant_cursociclo` VALUES (4,93,1,'1',NULL,'2015-08-12 17:08:18'),(5,96,1,'1','2015-08-12 15:23:50','2015-08-12 17:08:33'),(6,95,1,'1',NULL,'2015-08-12 17:08:43'),(7,5,1,'1',NULL,'2015-08-12 17:09:17'),(8,92,1,'1',NULL,'2015-08-12 19:03:10'),(10,92,2,'1',NULL,'2015-08-12 20:10:46'),(12,5,2,'1',NULL,'2015-08-12 20:11:07'),(13,98,1,'1',NULL,'2015-12-01 05:13:15'),(14,97,1,'1',NULL,'2015-12-24 18:00:29');
/*!40000 ALTER TABLE `ant_cursociclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_cursotipoestudio`
--

DROP TABLE IF EXISTS `ant_cursotipoestudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_cursotipoestudio` (
  `CURSOTIPOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CURSOCIP_Codigo` int NOT NULL DEFAULT '0',
  `TIPP_Codigo` int NOT NULL DEFAULT '0',
  `CURSOTIPOC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `CURSOTIPOC_FechaModificacion` datetime DEFAULT NULL,
  `CURSOTIPOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CURSOTIPOP_Codigo`),
  KEY `FK_cursotipoestudio_cursociclo` (`CURSOCIP_Codigo`),
  KEY `FK_cursotipoestudio_tipoestudio` (`TIPP_Codigo`),
  CONSTRAINT `FK_cursotipoestudio_cursociclo` FOREIGN KEY (`CURSOCIP_Codigo`) REFERENCES `ant_cursociclo` (`CURSOCIP_Codigo`),
  CONSTRAINT `FK_cursotipoestudio_tipoestudio` FOREIGN KEY (`TIPP_Codigo`) REFERENCES `ant_tipoestudio` (`TIPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_cursotipoestudio`
--

LOCK TABLES `ant_cursotipoestudio` WRITE;
/*!40000 ALTER TABLE `ant_cursotipoestudio` DISABLE KEYS */;
INSERT INTO `ant_cursotipoestudio` VALUES (1,7,5,'1',NULL,'2015-12-26 13:22:56');
/*!40000 ALTER TABLE `ant_cursotipoestudio` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_empresa`
--

LOCK TABLES `ant_empresa` WRITE;
/*!40000 ALTER TABLE `ant_empresa` DISABLE KEYS */;
INSERT INTO `ant_empresa` VALUES (0,1,NULL,'EMPRESA NO REGISTRADA',NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'2010-12-17 09:34:56'),(1,1,'43242342342','Ferreteria de los olvisos','567567','3424','234234','234234','234','4234234234','1',NULL,'2011-01-09 20:30:59');
/*!40000 ALTER TABLE `ant_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_estudios`
--

DROP TABLE IF EXISTS `ant_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_estudios` (
  `ESTUDIOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `UNIVP_Codigo` int NOT NULL DEFAULT '0',
  `GRADOP_Codigo` int NOT NULL DEFAULT '0',
  `ESTUDIOC_Descripcion` varchar(150) DEFAULT NULL,
  `ESTUDIOC_Estado` char(1) NOT NULL DEFAULT '1' COMMENT '1:Culminado, 2:En curso,3:Abandonado',
  `ESTUDIOC_FechaInicio` date DEFAULT '0000-00-00',
  `ESTUDIOC_FechaFin` date DEFAULT '0000-00-00',
  `ESTUDIOC_FechaModificacion` datetime DEFAULT NULL,
  `ESTUDIOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ESTUDIOP_Codigo`),
  KEY `FK_estudios_universidad` (`UNIVP_Codigo`),
  KEY `FK_estudios_grado` (`GRADOP_Codigo`),
  KEY `FK_estudios_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_estudios_grado` FOREIGN KEY (`GRADOP_Codigo`) REFERENCES `ant_grado` (`GRADOP_Codigo`),
  CONSTRAINT `FK_estudios_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_estudios_universidad` FOREIGN KEY (`UNIVP_Codigo`) REFERENCES `ant_universidad` (`UNIVP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_estudios`
--

LOCK TABLES `ant_estudios` WRITE;
/*!40000 ALTER TABLE `ant_estudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_estudiosidiomas`
--

DROP TABLE IF EXISTS `ant_estudiosidiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_estudiosidiomas` (
  `ESTIDIOMP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `IDIOMP_Codigo` int NOT NULL DEFAULT '0',
  `ESTIDIOMC_Descripcion` varchar(150) DEFAULT NULL,
  `ESTIDIOMC_Nivel` char(1) NOT NULL DEFAULT '1',
  `ESTIDIOMC_Estado` char(1) DEFAULT '1' COMMENT '1:Culminado, 2:En curso,3:Abandonado',
  `ESTIDIOMC_FechaInicio` date DEFAULT '0000-00-00',
  `ESTIDIOMC_FechaFin` date DEFAULT '0000-00-00',
  `ESTIDIOMC_FechaModificacion` datetime DEFAULT NULL,
  `ESTIDIOMC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ESTIDIOMP_Codigo`),
  KEY `FK_estudiosidiomas_profesor` (`PROP_Codigo`),
  KEY `FK_estudiosidiomas_idiomas` (`IDIOMP_Codigo`),
  CONSTRAINT `FK_estudiosidiomas_idiomas` FOREIGN KEY (`IDIOMP_Codigo`) REFERENCES `ant_idiomas` (`IDIOMP_Codigo`),
  CONSTRAINT `FK_estudiosidiomas_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_estudiosidiomas`
--

LOCK TABLES `ant_estudiosidiomas` WRITE;
/*!40000 ALTER TABLE `ant_estudiosidiomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_estudiosidiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_experiencia`
--

DROP TABLE IF EXISTS `ant_experiencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_experiencia` (
  `EXPERP_Codigo` int NOT NULL AUTO_INCREMENT,
  `UNIVP_Codigo` int NOT NULL DEFAULT '0',
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `EXPERPC_Cargo` varchar(150) DEFAULT NULL,
  `EXPERPC_Empresa` varchar(150) DEFAULT NULL,
  `EXPERPC_Curso` varchar(150) DEFAULT NULL,
  `EXPERPC_FechaInicio` date DEFAULT '0000-00-00',
  `EXPERPC_FechaFin` date DEFAULT '0000-00-00',
  `EXPERPC_FechaModificacion` datetime DEFAULT NULL,
  `EXPERPC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`EXPERP_Codigo`),
  KEY `FK_experiencia_profesor` (`PROP_Codigo`),
  KEY `FK_experiencia_universidad` (`UNIVP_Codigo`),
  CONSTRAINT `FK_experiencia_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_experiencia_universidad` FOREIGN KEY (`UNIVP_Codigo`) REFERENCES `ant_universidad` (`UNIVP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_experiencia`
--

LOCK TABLES `ant_experiencia` WRITE;
/*!40000 ALTER TABLE `ant_experiencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_experiencia` ENABLE KEYS */;
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
-- Table structure for table `ant_local`
--

DROP TABLE IF EXISTS `ant_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_local` (
  `LOCP_Codigo` int NOT NULL AUTO_INCREMENT,
  `LOCC_Nombre` varchar(150) NOT NULL,
  `LOCC_Direccion` varchar(250) NOT NULL,
  `LOCC_Telefono` varchar(250) NOT NULL,
  `LOCC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`LOCP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_local`
--

LOCK TABLES `ant_local` WRITE;
/*!40000 ALTER TABLE `ant_local` DISABLE KEYS */;
INSERT INTO `ant_local` VALUES (1,'Sede Sucre','AVENIDA SUCRE 1239','4543278','2015-05-16 17:45:22'),(2,'Sede Javier Prado','Javier Prado 321','5640904','2015-05-16 17:45:32');
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
  KEY `FK_orden_compania` (`CICLOP_Codigo`),
  KEY `FK_orden_aula` (`AULAP_Codigo`),
  KEY `FK_matricula_tipoestudio` (`TIPP_Codigo`),
  KEY `FK_ant_matricula_ant_alumno` (`ALUMP_Codigo`),
  CONSTRAINT `FK_ant_matricula_ant_alumno` FOREIGN KEY (`ALUMP_Codigo`) REFERENCES `ant_alumno` (`ALUMP_Codigo`),
  CONSTRAINT `FK_matricula_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_menu`
--

LOCK TABLES `ant_menu` WRITE;
/*!40000 ALTER TABLE `ant_menu` DISABLE KEYS */;
INSERT INTO `ant_menu` VALUES (2,58,'Maestro de Alumnos','Aquí se podrán subir las imágenes o aniamciones que serán contenidas en la marquesina','index.php/ventas/alumno/listar',1,'alumno.jpg','1',NULL,'2015-08-04 01:06:30'),(3,1,'MANTENIMIENTOS','','index.php/almacen/curso/listar',1,'libros.jpg','1',NULL,'2015-06-21 03:04:31'),(4,1,'PROCESOS','','index.php/ventas/orden/listar',2,'matri.jpg','1',NULL,'2015-08-12 20:34:09'),(22,75,'Maestro de Cursos','Maestro de Cursos','index.php/almacen/curso/listar',1,'','1',NULL,'2015-08-11 13:27:54'),(48,4,'Matricula de alumnos','Matricula de alumnos','index.php/ventas/matricula/listar',3,'matri.jpg','1',NULL,'2015-12-23 21:58:57'),(49,4,'Cargas de trabajo','Cargas de trabajo','index.php/ventas/asignacion/listar',2,NULL,'1',NULL,'2015-12-23 21:56:18'),(52,3,'Documentos',NULL,'index.php/inicio/principal',4,NULL,'1',NULL,'2015-08-12 20:35:34'),(53,58,'Maestro de Profesores','Tabla de Profesores','index.php/ventas/profesor/listar',1,NULL,'1',NULL,'2015-08-04 01:06:22'),(55,3,'Ejemplo 1','Ejemplo 1','index.php/almacen/curso/listar',1,NULL,'1',NULL,'2015-04-03 01:40:06'),(56,3,'Ejemplo 3','Ejemplo 3','index.php/almacen/curso/listar',1,NULL,'1',NULL,'2015-08-05 16:48:18'),(57,56,'Ejemplo 5','Ejemplo 5','Ejemplo5',1,NULL,'1',NULL,'2015-04-03 02:18:33'),(58,3,'Configuracion Personal',NULL,'#',1,NULL,'1',NULL,'2015-08-04 01:05:22'),(59,74,'Maestro de Aulas','Maestro de Aulas','index.php/maestros/aula/listar',6,NULL,'1',NULL,'2015-11-16 17:29:53'),(61,74,'Maestro de Locales','Maestro de Locales','index.php/maestros/local/listar',5,NULL,'1',NULL,'2015-11-16 17:29:51'),(62,74,'Maestro de Ciclo','Maestro de Ciclo','index.php/maestros/ciclo/listar',1,NULL,'1',NULL,'2015-10-16 17:43:26'),(63,74,'Tipo Estudio ',NULL,'index.php/maestros/tipoestudio/listar',2,NULL,'1',NULL,'2015-09-08 05:20:56'),(64,1,'REPORTES Y CONSULTAS',NULL,NULL,3,NULL,'1',NULL,'2015-08-12 20:34:20'),(65,2,'Alumnos pequeños',NULL,NULL,1,NULL,'1',NULL,'2015-06-21 04:06:16'),(66,58,'Maestro de Usuarios','Usuarios','index.php/seguridad/usuario/listar',1,NULL,'1',NULL,'2015-08-04 01:05:56'),(67,4,'Reuniones de plana','Actas de reunion','index.php/ventas/acta/listar',4,NULL,'1',NULL,'2015-12-23 21:56:29'),(68,4,'Tareas asignadas','Tareas asignadas','index.php/ventas/tarea/listar',7,NULL,'1',NULL,'2015-12-23 21:56:56'),(69,4,'Vigilancia de practicas','Vigilancia de practicas','index.php/ventas/vigilancia/listar',8,NULL,'1',NULL,'2015-12-23 21:57:32'),(70,4,'Tardanzas Reemplazos','Tardanzas Reemplazos','index.php/ventas/tardanza/listar',9,NULL,'1',NULL,'2015-12-23 21:58:37'),(71,4,'Asistencia de alumnos','Asistencia de alumnos','index.php/ventas/asistencia/editar',6,NULL,'1',NULL,'2015-12-23 21:56:47'),(72,74,'Maestro de Semana','Maestro de Semana','index.php/almacen/semana/listar',4,NULL,'1',NULL,'2015-11-16 17:28:47'),(73,75,'Maestro de Temas','Maestro de Temas','index.php/almacen/tema/listar',4,NULL,'1',NULL,'2015-08-12 20:29:17'),(74,3,'Configuracion Sistema','Configuracion Sistema','#',3,NULL,'1',NULL,'2015-08-12 20:35:19'),(75,3,'Configuracion Cursos','Configuracion Cursos','#',2,NULL,'1',NULL,'2015-08-12 20:35:17'),(76,75,'Maestro de Cursos Ciclo','Maestro de Cursos Ciclo','index.php/almacen/cursociclo/listar',2,NULL,'1',NULL,'2015-08-12 20:28:56'),(77,75,'Maestro de Cursos Tipo','Maestro de Cursos Tipo','index.php/almacen/cursotipoestudio/listar',3,NULL,'1',NULL,'2015-08-12 21:08:25'),(78,74,'Tipo Estudio por ciclo',NULL,'index.php/maestros/tipoestudiociclo/listar',3,NULL,'1',NULL,'2015-09-20 03:19:29'),(79,74,'Maestro de Empresas','Maestro de Empresas','index.php/maestros/empresa/listar',7,NULL,'1',NULL,'2015-11-16 17:32:52'),(80,74,'Maestro de Sectores','Maestro de Sectores','index.php/maestros/sector/listar',8,NULL,'1',NULL,'2015-11-16 17:33:31'),(81,64,'Seguimiento tareas','Seguimiento tareas','index.php/ventas/tarea/rpt_seguimiento_tareas',1,NULL,'1',NULL,'2015-11-29 06:36:15'),(82,4,'Asistencia de profesores','Asistencia de profesores','#',5,NULL,'1',NULL,'2015-12-23 21:56:45'),(83,4,'Apertura de aulas','Apertura de aulas','index.php/ventas/apertura/listar',1,NULL,'1',NULL,'2015-12-19 15:26:01'),(84,64,'Asignacion de aulas','Asignacion de aulas','index.php/ventas/asignacion/rpt_asignacion_aulas',1,NULL,'1',NULL,'2016-01-04 21:49:16'),(85,64,'Horario por aula','Horario por aula','index.php/ventas/asignacion/rpt_horario_curso',1,NULL,'1',NULL,'2016-01-22 06:28:24'),(86,74,'Maestro de Modulos','Maestro de Modulos','index.php/ventas/modulo/listar',9,NULL,'1',NULL,'2016-01-16 03:26:06'),(87,1,'SALIR','Salir del sistema','index.php/inicio/index',4,NULL,'1',NULL,'2020-03-12 05:58:05');
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
INSERT INTO `ant_modulo` VALUES (1,1,3,'Modulo I',NULL,'2016-01-15 23:17:12'),(2,1,3,'Modulo II',NULL,'2016-01-15 23:17:22'),(3,2,3,'Modulo I',NULL,'2016-01-15 23:17:37'),(4,2,3,'Modulo II',NULL,'2016-01-15 23:17:47'),(5,1,5,'Modulo I',NULL,'2016-01-16 04:55:00'),(6,1,5,'Modulo II',NULL,'2016-01-16 04:55:21'),(7,2,5,'Modulo I',NULL,'2016-01-16 05:31:35'),(8,2,5,'Modulo II',NULL,'2016-01-16 05:35:28');
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
  CONSTRAINT `FK_ant_modulodetalle_ant_curso` FOREIGN KEY (`PROD_Codigo`) REFERENCES `ant_curso` (`PROD_Codigo`),
  CONSTRAINT `FK_ant_modulodetalle_ant_modulo` FOREIGN KEY (`MODULOP_Codigo`) REFERENCES `ant_modulo` (`MODULOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_modulodetalle`
--

LOCK TABLES `ant_modulodetalle` WRITE;
/*!40000 ALTER TABLE `ant_modulodetalle` DISABLE KEYS */;
INSERT INTO `ant_modulodetalle` VALUES (4,5,96,1,'08:10:00','10:00:00',NULL,'2016-01-16 05:14:46'),(5,5,5,1,'10:20:00','12:10:00',NULL,'2016-01-16 05:14:46'),(6,5,93,2,'08:10:00','10:00:00',NULL,'2016-01-16 05:14:46'),(7,5,92,2,'10:20:00','12:10:00',NULL,'2016-01-16 05:14:46'),(8,5,96,3,'08:10:00','10:00:00',NULL,'2016-01-16 05:18:17'),(9,5,95,3,'10:20:00','12:10:00',NULL,'2016-01-16 05:18:17'),(10,5,93,4,'08:10:00','10:00:00',NULL,'2016-01-16 05:18:17'),(11,5,92,4,'10:20:00','12:09:00',NULL,'2016-01-16 05:18:17'),(12,5,97,5,'08:10:00','10:00:00',NULL,'2016-01-16 05:18:17'),(13,5,95,5,'10:20:00','12:10:00',NULL,'2016-01-16 05:18:17'),(14,5,97,6,'08:10:00','10:00:00',NULL,'2016-01-16 05:18:17'),(15,5,5,6,'10:20:00','12:10:00',NULL,'2016-01-16 05:18:18'),(16,6,5,1,'08:10:00','10:00:00',NULL,'2016-01-16 05:26:05'),(17,6,96,1,'10:20:00','12:10:00',NULL,'2016-01-16 05:26:05'),(18,6,92,2,'08:10:00','10:00:00',NULL,'2016-01-16 05:26:05'),(19,6,93,2,'10:20:00','12:10:00',NULL,'2016-01-16 05:26:05'),(20,6,95,3,'08:10:00','10:00:00',NULL,'2016-01-16 05:26:06'),(21,6,96,3,'10:20:00','12:10:00',NULL,'2016-01-16 05:26:06'),(22,6,92,4,'08:10:00','10:00:00',NULL,'2016-01-16 05:26:06'),(23,6,93,4,'10:20:00','12:10:00',NULL,'2016-01-16 05:26:06'),(24,6,95,5,'08:10:00','10:00:00',NULL,'2016-01-16 05:26:06'),(25,6,97,5,'10:20:00','12:10:00',NULL,'2016-01-16 05:26:06'),(26,6,5,6,'08:10:00','10:00:00',NULL,'2016-01-16 05:26:06'),(27,6,97,6,'10:20:00','12:07:00',NULL,'2016-01-16 05:26:06'),(28,7,96,1,'16:00:00','17:50:00',NULL,'2016-01-16 05:31:35'),(29,7,5,1,'18:10:00','20:00:00',NULL,'2016-01-16 05:31:35'),(30,7,93,2,'16:00:00','17:50:00',NULL,'2016-01-16 05:31:35'),(31,7,92,2,'18:10:00','20:00:00',NULL,'2016-01-16 05:31:35'),(32,7,96,3,'16:00:00','17:50:00',NULL,'2016-01-16 05:31:35'),(33,7,95,3,'18:10:00','20:00:00',NULL,'2016-01-16 05:31:35'),(34,7,93,4,'16:00:00','17:50:00',NULL,'2016-01-16 05:31:35'),(35,7,92,4,'18:10:00','20:00:00',NULL,'2016-01-16 05:31:35'),(36,7,97,5,'16:00:00','17:50:00',NULL,'2016-01-16 05:31:35'),(37,7,95,5,'18:10:00','20:00:00',NULL,'2016-01-16 05:31:35'),(38,7,97,6,'16:00:00','17:50:00',NULL,'2016-01-16 05:31:35'),(39,7,5,6,'18:10:00','20:00:00',NULL,'2016-01-16 05:31:35'),(40,8,5,1,'16:00:00','17:50:00',NULL,'2016-01-16 05:35:28'),(41,8,96,1,'18:10:00','20:00:00',NULL,'2016-01-16 05:35:28'),(42,8,92,2,'16:00:00','17:50:00',NULL,'2016-01-16 05:35:28'),(43,8,93,2,'18:10:00','20:00:00',NULL,'2016-01-16 05:35:28'),(44,8,95,3,'16:00:00','17:50:00',NULL,'2016-01-16 05:35:28'),(45,8,96,3,'18:10:00','20:00:00',NULL,'2016-01-16 05:35:28'),(46,8,92,4,'16:00:00','17:50:00',NULL,'2016-01-16 05:35:28'),(47,8,93,4,'18:10:00','20:00:00',NULL,'2016-01-16 05:35:28'),(48,8,95,5,'16:00:00','17:50:00',NULL,'2016-01-16 05:35:29'),(49,8,97,5,'18:10:00','20:00:00',NULL,'2016-01-16 05:35:29'),(50,8,5,6,'16:00:00','17:50:00',NULL,'2016-01-16 05:35:29'),(51,8,97,6,'18:10:00','20:00:00',NULL,'2016-01-16 05:35:29'),(52,1,96,1,'07:30:00','10:00:00',NULL,'2016-01-16 05:41:32'),(53,1,5,1,'10:20:00','12:50:00',NULL,'2016-01-16 05:41:32'),(54,1,98,1,'12:50:00','13:45:00',NULL,'2016-01-16 05:41:32'),(55,1,93,2,'07:30:00','10:00:00',NULL,'2016-01-16 05:41:32'),(56,1,92,2,'10:20:00','12:50:00',NULL,'2016-01-16 05:41:32'),(57,1,98,2,'12:50:00','13:45:00',NULL,'2016-01-16 05:41:32'),(58,1,96,3,'07:30:00','10:00:00',NULL,'2016-01-16 05:41:32'),(59,1,95,3,'10:20:00','12:50:00',NULL,'2016-01-16 05:41:32'),(60,1,98,3,'12:50:00','13:45:00',NULL,'2016-01-16 05:41:32'),(61,1,93,4,'07:30:00','10:00:00',NULL,'2016-01-16 05:41:32'),(62,1,92,4,'10:20:00','12:50:00',NULL,'2016-01-16 05:41:32'),(63,1,98,4,'12:50:00','13:45:00',NULL,'2016-01-16 05:41:32'),(64,1,97,5,'07:30:00','10:00:00',NULL,'2016-01-16 05:41:32'),(65,1,95,5,'10:20:00','12:50:00',NULL,'2016-01-16 05:41:32'),(66,1,98,5,'12:50:00','13:45:00',NULL,'2016-01-16 05:41:33'),(67,1,97,6,'07:30:00','10:00:00',NULL,'2016-01-16 05:41:33'),(68,1,5,6,'10:20:00','12:47:00',NULL,'2016-01-16 05:41:33'),(69,1,98,6,'12:50:00','13:45:00',NULL,'2016-01-16 05:41:33'),(70,2,5,1,'07:30:00','10:00:00',NULL,'2016-01-16 05:47:59'),(71,2,96,1,'10:20:00','12:50:00',NULL,'2016-01-16 05:47:59'),(72,2,98,1,'12:50:00','13:45:00',NULL,'2016-01-16 05:47:59'),(73,2,92,2,'07:30:00','10:00:00',NULL,'2016-01-16 05:47:59'),(74,2,93,2,'10:20:00','12:50:00',NULL,'2016-01-16 05:47:59'),(75,2,98,2,'12:50:00','13:45:00',NULL,'2016-01-16 05:47:59'),(76,2,95,3,'07:30:00','10:00:00',NULL,'2016-01-16 05:47:59'),(77,2,96,3,'10:20:00','12:50:00',NULL,'2016-01-16 05:47:59'),(78,2,98,3,'12:50:00','13:45:00',NULL,'2016-01-16 05:47:59'),(79,2,92,4,'07:30:00','10:00:00',NULL,'2016-01-16 05:47:59'),(80,2,93,4,'10:20:00','12:50:00',NULL,'2016-01-16 05:47:59'),(81,2,98,4,'12:50:00','13:45:00',NULL,'2016-01-16 05:47:59'),(82,2,95,5,'07:30:00','10:00:00',NULL,'2016-01-16 05:47:59'),(83,2,97,5,'10:20:00','12:50:00',NULL,'2016-01-16 05:47:59'),(84,2,98,5,'12:50:00','13:45:00',NULL,'2016-01-16 05:47:59'),(85,2,5,6,'07:30:00','10:00:00',NULL,'2016-01-16 05:47:59'),(86,2,97,6,'10:20:00','12:50:00',NULL,'2016-01-16 05:47:59'),(87,2,98,6,'12:50:00','13:45:00',NULL,'2016-01-16 05:48:00'),(88,3,98,1,'14:25:00','15:20:00',NULL,'2016-01-16 05:54:11'),(89,3,96,1,'15:20:00','17:50:00',NULL,'2016-01-16 05:54:11'),(90,3,5,1,'18:10:00','20:40:00',NULL,'2016-01-16 05:54:11'),(91,3,98,2,'14:25:00','15:20:00',NULL,'2016-01-16 05:54:11'),(92,3,93,2,'15:20:00','17:50:00',NULL,'2016-01-16 05:54:11'),(93,3,92,2,'18:10:00','20:40:00',NULL,'2016-01-16 05:54:11'),(94,3,98,3,'14:25:00','15:20:00',NULL,'2016-01-16 05:54:11'),(95,3,96,3,'15:20:00','17:50:00',NULL,'2016-01-16 05:54:11'),(96,3,95,3,'18:10:00','20:40:00',NULL,'2016-01-16 05:54:11'),(97,3,98,4,'14:25:00','15:20:00',NULL,'2016-01-16 05:54:11'),(98,3,93,4,'15:20:00','17:50:00',NULL,'2016-01-16 05:54:11'),(99,3,92,4,'18:10:00','20:40:00',NULL,'2016-01-16 05:54:11'),(100,3,98,5,'14:25:00','15:20:00',NULL,'2016-01-16 05:54:11'),(101,3,97,5,'15:20:00','17:50:00',NULL,'2016-01-16 05:54:11'),(102,3,95,5,'18:10:00','20:40:00',NULL,'2016-01-16 05:54:11'),(103,3,98,6,'14:25:00','15:20:00',NULL,'2016-01-16 05:54:11'),(104,3,97,6,'15:20:00','17:50:00',NULL,'2016-01-16 05:54:11'),(105,3,5,6,'18:10:00','20:40:00',NULL,'2016-01-16 05:54:11'),(106,4,98,1,'14:25:00','15:20:00',NULL,'2016-01-16 06:01:54'),(107,4,5,1,'15:20:00','17:50:00',NULL,'2016-01-16 06:01:54'),(108,4,96,1,'18:10:00','20:40:00',NULL,'2016-01-16 06:01:54'),(109,4,98,2,'14:25:00','15:20:00',NULL,'2016-01-16 06:01:54'),(110,4,92,2,'15:20:00','17:50:00',NULL,'2016-01-16 06:01:55'),(111,4,93,2,'18:10:00','20:40:00',NULL,'2016-01-16 06:01:55'),(112,4,98,3,'14:25:00','15:20:00',NULL,'2016-01-16 06:01:55'),(113,4,95,3,'15:20:00','17:50:00',NULL,'2016-01-16 06:01:55'),(114,4,96,3,'18:10:00','20:40:00',NULL,'2016-01-16 06:01:55'),(115,4,98,4,'14:25:00','15:20:00',NULL,'2016-01-16 06:01:55'),(116,4,92,4,'15:20:00','17:50:00',NULL,'2016-01-16 06:01:55'),(117,4,93,4,'18:10:00','20:40:00',NULL,'2016-01-16 06:01:55'),(118,4,98,5,'14:25:00','15:20:00',NULL,'2016-01-16 06:01:55'),(119,4,95,5,'15:20:00','17:50:00',NULL,'2016-01-16 06:01:55'),(120,4,97,5,'18:10:00','20:40:00',NULL,'2016-01-16 06:01:55'),(121,4,98,6,'14:25:00','15:20:00',NULL,'2016-01-16 06:01:55'),(122,4,5,6,'15:20:00','17:50:00',NULL,'2016-01-16 06:01:55'),(123,4,97,6,'18:10:00','20:40:00',NULL,'2016-01-16 06:01:55');
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
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_permiso`
--

LOCK TABLES `ant_permiso` WRITE;
/*!40000 ALTER TABLE `ant_permiso` DISABLE KEYS */;
INSERT INTO `ant_permiso` VALUES (4,4,3,'1'),(5,4,4,'1'),(29,4,22,'1'),(33,4,49,'1'),(39,4,53,'1'),(45,4,57,'1'),(46,4,58,'1'),(47,4,59,'1'),(48,4,61,'1'),(49,4,62,'1'),(50,4,63,'1'),(51,4,64,'1'),(52,4,65,'1'),(53,4,66,'1'),(54,4,67,'1'),(55,4,68,'1'),(56,4,69,'1'),(57,4,70,'1'),(59,4,72,'1'),(60,4,73,'1'),(61,4,74,'1'),(62,4,75,'1'),(63,4,76,'1'),(64,4,77,'1'),(65,4,78,'1'),(66,6,3,'1'),(67,6,4,'1'),(68,6,22,'1'),(69,6,49,'1'),(71,6,53,'1'),(72,6,57,'1'),(73,6,58,'1'),(74,6,59,'1'),(75,6,61,'1'),(76,6,62,'1'),(77,6,63,'1'),(78,6,64,'1'),(79,6,65,'1'),(81,6,67,'1'),(82,6,68,'1'),(83,6,69,'1'),(84,6,70,'1'),(85,6,72,'1'),(86,6,73,'1'),(87,6,74,'1'),(88,6,75,'1'),(89,6,76,'1'),(91,6,78,'1'),(92,4,79,'1'),(93,4,80,'1'),(94,4,81,'1'),(96,4,2,'1'),(99,7,3,'1'),(100,7,58,'1'),(101,7,53,'1'),(102,4,83,'1'),(103,4,84,'1'),(104,4,85,'1'),(105,4,86,'1');
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
  `PROD_Codigo` int NOT NULL,
  `SUBCURSOP_Codigo` int NOT NULL,
  `PERSP_Codigo` int NOT NULL,
  `user_id` int NOT NULL,
  `PROC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `PROC_FlagBorrado` char(1) NOT NULL DEFAULT '1' COMMENT '1:Activo, 0: Borrado',
  `PROC_FechaModificacion` datetime DEFAULT NULL,
  `PROC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PROP_Codigo`),
  UNIQUE KEY `PERSP_Codigo` (`PERSP_Codigo`),
  KEY `FK_profesor_persona` (`PERSP_Codigo`),
  KEY `FK_profesor_curso` (`PROD_Codigo`),
  CONSTRAINT `FK_profesor_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `ant_persona` (`PERSP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_profesor`
--

LOCK TABLES `ant_profesor` WRITE;
/*!40000 ALTER TABLE `ant_profesor` DISABLE KEYS */;
INSERT INTO `ant_profesor` VALUES (95,0,0,1,0,'1','1','2016-01-05 14:05:43','2015-12-19 02:29:29'),(101,96,0,226,58,'1','1','2016-01-09 16:41:24','2015-12-24 18:11:23'),(102,93,0,227,59,'1','1','2015-12-24 19:12:47','2015-12-24 18:12:47'),(103,93,0,228,60,'1','1','2015-12-24 19:13:19','2015-12-24 18:13:19'),(104,93,0,229,61,'1','1','2015-12-24 19:14:45','2015-12-24 18:14:45'),(105,93,0,230,62,'1','1','2015-12-24 19:15:07','2015-12-24 18:15:07'),(106,93,0,231,63,'1','1','2015-12-24 19:15:50','2015-12-24 18:15:50'),(107,93,0,232,64,'1','1','2015-12-24 19:16:12','2015-12-24 18:16:12'),(108,93,0,233,65,'1','1','2015-12-24 19:16:37','2015-12-24 18:16:37'),(109,93,0,235,66,'1','1','2015-12-24 19:20:02','2015-12-24 18:20:02'),(110,93,0,236,67,'1','1','2015-12-24 19:21:00','2015-12-24 18:21:00'),(111,93,0,237,68,'1','1','2015-12-24 19:21:37','2015-12-24 18:21:37'),(112,93,0,238,69,'1','1','2015-12-24 19:22:01','2015-12-24 18:22:01'),(113,93,0,239,70,'1','1','2015-12-24 19:22:29','2015-12-24 18:22:29'),(114,93,0,240,71,'1','1','2015-12-24 19:22:54','2015-12-24 18:22:54'),(115,93,0,241,72,'1','1','2015-12-24 19:23:14','2015-12-24 18:23:14'),(116,93,0,242,73,'1','1','2015-12-24 19:28:44','2015-12-24 18:28:44'),(117,93,0,243,74,'1','1','2015-12-24 19:29:09','2015-12-24 18:29:09'),(118,93,0,244,75,'1','1','2015-12-24 19:29:31','2015-12-24 18:29:31'),(119,93,0,245,76,'1','1','2015-12-24 19:29:50','2015-12-24 18:29:50'),(120,93,0,246,77,'1','1','2015-12-24 19:30:12','2015-12-24 18:30:12'),(121,93,0,247,78,'1','1','2015-12-24 19:30:29','2015-12-24 18:30:29'),(122,93,0,248,79,'1','1','2015-12-24 19:30:53','2015-12-24 18:30:53'),(123,93,0,249,80,'1','1','2015-12-24 19:31:13','2015-12-24 18:31:13'),(124,93,0,250,81,'1','1','2015-12-24 19:31:35','2015-12-24 18:31:35'),(125,95,0,251,82,'1','1','2015-12-24 19:32:17','2015-12-24 18:32:17'),(126,95,0,252,83,'1','1','2015-12-24 19:32:43','2015-12-24 18:32:43'),(127,95,0,253,84,'1','1','2015-12-24 19:33:04','2015-12-24 18:33:04'),(128,95,0,254,85,'1','1','2015-12-24 19:33:30','2015-12-24 18:33:30'),(129,96,0,255,86,'1','1','2016-01-09 16:42:17','2015-12-24 18:34:11'),(130,95,0,256,87,'1','1','2015-12-24 19:34:35','2015-12-24 18:34:35'),(131,95,0,257,88,'1','1','2015-12-24 19:34:52','2015-12-24 18:34:52'),(132,95,0,258,89,'1','1','2015-12-24 19:35:16','2015-12-24 18:35:16'),(133,95,0,259,90,'1','1','2015-12-24 19:35:42','2015-12-24 18:35:42'),(134,95,0,260,91,'1','1','2015-12-24 19:36:08','2015-12-24 18:36:08'),(135,95,0,261,92,'1','1','2015-12-24 19:36:29','2015-12-24 18:36:29'),(136,95,0,262,93,'1','1','2015-12-24 19:36:51','2015-12-24 18:36:51'),(137,95,0,263,94,'1','1','2015-12-24 19:37:12','2015-12-24 18:37:12'),(138,95,0,264,95,'1','1','2015-12-24 19:37:31','2015-12-24 18:37:31'),(139,95,0,265,96,'1','1','2015-12-24 19:37:50','2015-12-24 18:37:50'),(140,95,0,266,97,'1','1','2015-12-24 19:38:19','2015-12-24 18:38:19'),(141,95,0,267,98,'1','1','2015-12-24 19:38:35','2015-12-24 18:38:35'),(142,95,0,268,99,'1','1','2015-12-24 19:38:55','2015-12-24 18:38:55'),(143,95,0,269,100,'1','1','2015-12-24 19:39:14','2015-12-24 18:39:14'),(144,95,0,270,101,'1','1','2015-12-24 19:39:30','2015-12-24 18:39:30'),(145,95,0,271,102,'1','1','2015-12-24 19:39:48','2015-12-24 18:39:48'),(146,95,0,272,103,'1','1','2015-12-24 19:40:07','2015-12-24 18:40:07'),(147,95,0,273,104,'1','1','2015-12-24 19:40:25','2015-12-24 18:40:25'),(148,96,0,274,105,'1','1','2015-12-24 19:49:30','2015-12-24 18:49:30'),(149,96,0,275,106,'1','1','2015-12-24 19:49:51','2015-12-24 18:49:51'),(150,96,0,276,107,'1','1','2015-12-24 19:50:14','2015-12-24 18:50:14'),(151,96,0,277,108,'1','1','2015-12-24 19:54:24','2015-12-24 18:54:24'),(152,96,0,278,109,'1','1','2015-12-24 19:54:47','2015-12-24 18:54:47'),(153,96,0,279,110,'1','1','2015-12-24 19:55:13','2015-12-24 18:55:13'),(154,96,0,280,111,'1','1','2015-12-24 19:55:37','2015-12-24 18:55:37'),(155,96,0,281,112,'1','1','2015-12-24 19:56:00','2015-12-24 18:56:00'),(156,96,0,282,113,'1','1','2015-12-24 19:56:40','2015-12-24 18:56:40'),(157,96,0,283,114,'1','1','2015-12-24 19:57:12','2015-12-24 18:57:12'),(158,96,0,284,115,'1','1','2015-12-24 19:58:11','2015-12-24 18:58:11'),(159,96,0,285,116,'1','1','2015-12-24 19:58:35','2015-12-24 18:58:35'),(160,96,0,286,117,'1','1','2015-12-24 19:59:07','2015-12-24 18:59:07'),(161,96,0,287,118,'1','1','2015-12-24 19:59:28','2015-12-24 18:59:28'),(162,96,0,288,119,'1','1','2015-12-24 20:00:00','2015-12-24 19:00:00'),(163,96,0,289,120,'1','1','2015-12-24 20:00:32','2015-12-24 19:00:32'),(164,96,0,290,121,'1','1','2015-12-24 20:01:01','2015-12-24 19:01:01'),(165,96,0,291,122,'1','1','2015-12-24 20:01:30','2015-12-24 19:01:30'),(166,96,0,292,123,'1','1','2015-12-24 20:02:01','2015-12-24 19:02:01'),(167,96,0,293,124,'1','1','2015-12-24 20:02:25','2015-12-24 19:02:25'),(168,96,0,294,125,'1','1','2015-12-24 20:02:48','2015-12-24 19:02:48'),(169,96,0,295,126,'1','1','2015-12-24 20:03:12','2015-12-24 19:03:12'),(170,96,0,296,127,'1','1','2015-12-24 20:03:32','2015-12-24 19:03:32'),(171,96,0,297,128,'1','1','2015-12-24 20:04:01','2015-12-24 19:04:01'),(172,5,0,298,129,'1','1','2015-12-24 20:05:12','2015-12-24 19:05:12'),(173,5,0,299,130,'1','1','2015-12-24 20:05:47','2015-12-24 19:05:47'),(174,5,0,300,131,'1','1','2015-12-24 20:06:15','2015-12-24 19:06:15'),(175,5,0,301,132,'1','1','2015-12-24 20:06:44','2015-12-24 19:06:44'),(176,5,0,302,133,'1','1','2015-12-24 20:07:12','2015-12-24 19:07:12'),(177,5,0,303,134,'1','1','2015-12-24 20:08:14','2015-12-24 19:08:14'),(178,5,0,304,135,'1','1','2015-12-24 20:08:36','2015-12-24 19:08:36'),(179,5,0,305,136,'1','1','2015-12-24 20:08:54','2015-12-24 19:08:54'),(180,5,0,306,137,'1','1','2015-12-24 20:09:15','2015-12-24 19:09:15'),(181,5,0,307,138,'1','1','2015-12-24 20:09:37','2015-12-24 19:09:37'),(182,5,0,308,139,'1','1','2015-12-24 20:10:07','2015-12-24 19:10:07'),(183,5,0,309,140,'1','1','2015-12-24 20:10:32','2015-12-24 19:10:32'),(184,5,0,310,141,'1','1','2015-12-24 20:10:55','2015-12-24 19:10:55'),(185,5,0,311,142,'1','1','2015-12-24 20:11:13','2015-12-24 19:11:13'),(186,5,0,312,143,'1','1','2015-12-24 20:11:31','2015-12-24 19:11:31'),(187,5,0,313,144,'1','1','2015-12-24 20:11:57','2015-12-24 19:11:57'),(188,5,0,314,145,'1','1','2015-12-24 20:12:23','2015-12-24 19:12:23'),(189,5,0,315,146,'1','1','2015-12-24 20:12:51','2015-12-24 19:12:51'),(190,5,0,316,147,'1','1','2015-12-24 20:13:12','2015-12-24 19:13:12'),(191,5,0,317,148,'1','1','2015-12-24 20:13:46','2015-12-24 19:13:46'),(192,5,0,318,149,'1','1','2015-12-24 20:14:06','2015-12-24 19:14:06');
/*!40000 ALTER TABLE `ant_profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_profesorsociedad`
--

DROP TABLE IF EXISTS `ant_profesorsociedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_profesorsociedad` (
  `PROFSOCP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROP_Codigo` int NOT NULL DEFAULT '0',
  `SOCIEDP_Codigo` int NOT NULL DEFAULT '0',
  `PROFSOCC_FechaSuscripcion` date NOT NULL DEFAULT '0000-00-00',
  `PROFSOCC_FechaModificacion` datetime DEFAULT NULL,
  `PROFSOCC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PROFSOCP_Codigo`),
  KEY `FK_profesorsociedad_profesor` (`PROP_Codigo`),
  KEY `FK_profesorsociedad_sociedad` (`SOCIEDP_Codigo`),
  CONSTRAINT `FK_profesorsociedad_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_profesorsociedad_sociedad` FOREIGN KEY (`SOCIEDP_Codigo`) REFERENCES `ant_sociedad` (`SOCIEDP_Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_profesorsociedad`
--

LOCK TABLES `ant_profesorsociedad` WRITE;
/*!40000 ALTER TABLE `ant_profesorsociedad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ant_profesorsociedad` ENABLE KEYS */;
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
INSERT INTO `ant_rol` VALUES (0,':::Seleccione:::','1','1',NULL,'2015-08-05 21:08:09'),(4,'Coordinador general','1','1',NULL,'2015-10-16 13:53:26'),(6,'Coordinador de plana','1','2',NULL,'2015-12-19 02:32:25'),(7,'Profesor','1','3',NULL,'2015-12-19 02:32:06');
/*!40000 ALTER TABLE `ant_rol` ENABLE KEYS */;
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
-- Table structure for table `ant_semana`
--

DROP TABLE IF EXISTS `ant_semana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_semana` (
  `PRODATRIB_Codigo` int NOT NULL AUTO_INCREMENT,
  `CICLOP_Codigo` int NOT NULL,
  `TIPCICLOP_Codigo` int NOT NULL,
  `PRODATRIB_Nombre` varchar(250) DEFAULT NULL,
  `PRODATRIB_Descripcion` varchar(250) DEFAULT NULL,
  `PRODATRIB_FechaInicio` date NOT NULL DEFAULT '0000-00-00',
  `PRODATRIB_FechaFin` date NOT NULL DEFAULT '0000-00-00',
  `PRODATRIB_FechaModificacion` datetime DEFAULT NULL,
  `PRODATRIB_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRODATRIB_Codigo`),
  KEY `FK_semana_ciclo` (`CICLOP_Codigo`),
  KEY `FK_semana_tipoestudiociclo` (`TIPCICLOP_Codigo`),
  CONSTRAINT `FK_semana_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_semana_tipoestudiociclo` FOREIGN KEY (`TIPCICLOP_Codigo`) REFERENCES `ant_tipoestudiociclo` (`TIPCICLOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_semana`
--

LOCK TABLES `ant_semana` WRITE;
/*!40000 ALTER TABLE `ant_semana` DISABLE KEYS */;
INSERT INTO `ant_semana` VALUES (1,1,1,'Semana 01','erty sdfsff fdassdf ','2015-09-02','2015-09-04','2015-09-21 10:27:04','2015-09-21 14:57:19'),(2,1,1,'Semana 02','','2015-09-09','2015-09-11',NULL,'2015-09-21 15:27:35'),(3,1,1,'Semana 03','','2015-09-16','2015-09-18',NULL,'2015-09-21 15:27:59'),(4,1,1,'Semana 04','','2015-09-23','2015-09-25',NULL,'2015-09-21 15:28:17'),(5,1,1,'Semana 05','','2015-09-30','2015-10-02',NULL,'2015-09-21 15:28:45'),(6,1,1,'Semana 06','','2015-10-07','2015-10-09',NULL,'2015-09-21 15:29:08'),(7,1,1,'Semana 07','','2015-10-14','2015-10-16',NULL,'2015-09-21 15:29:34'),(8,1,1,'Semana 08','','2015-10-21','2015-10-23',NULL,'2015-09-21 15:29:57'),(9,1,1,'Semana 09','','2015-10-28','2015-10-30',NULL,'2015-09-21 15:32:13'),(10,1,1,'Semana 10','','2015-11-04','2015-11-06',NULL,'2015-09-21 15:32:37'),(11,1,1,'Semana 11','','2015-11-11','2015-11-13',NULL,'2015-09-21 15:32:57'),(12,1,1,'Semana 12','','2015-11-18','2015-11-20','2015-09-21 10:35:59','2015-09-21 15:33:16'),(13,1,1,'Semana 13','','2015-11-25','2015-11-27',NULL,'2015-09-21 15:33:37'),(14,1,1,'Semana 14','','2015-12-02','2015-12-04',NULL,'2015-09-21 15:33:56'),(15,1,1,'Semana 15','','2015-12-09','2015-12-11',NULL,'2015-09-21 15:34:16'),(16,1,1,'Semana 16','','2015-12-16','2015-12-18',NULL,'2015-09-21 15:34:38'),(17,1,1,'Semana 17','','2015-12-23','2015-12-30',NULL,'2015-09-21 15:34:56'),(18,1,1,'Semana 18','','2016-01-06','2016-01-08',NULL,'2015-09-21 15:35:15'),(19,1,1,'Semana 19','','2016-02-13','2016-01-15','2015-09-21 10:36:09','2015-09-21 15:35:33'),(20,1,1,'Semana 20','','2016-01-20','2016-01-22',NULL,'2015-09-21 15:36:33'),(21,1,11,'Semana 01','','2016-01-05','2016-01-07',NULL,'2015-09-21 15:38:10'),(22,1,11,'Semana 02','','2016-01-12','2016-01-14',NULL,'2015-09-21 15:38:55'),(23,1,11,'Semana 03','','2016-01-19','2016-01-21','2015-09-21 10:39:52','2015-09-21 15:39:15'),(24,1,11,'Semana 04','','2016-01-26','2016-01-28',NULL,'2015-09-21 15:39:34'),(25,1,11,'Semana 05','','2016-02-02','2016-02-04',NULL,'2015-09-21 15:40:20'),(26,1,11,'Semana 06','','2016-02-09','2016-02-11',NULL,'2015-09-21 15:40:42'),(27,1,11,'Semana 07','','2016-02-16','2016-02-18',NULL,'2015-09-21 15:41:10'),(28,1,11,'Semana 08','','2016-02-23','2016-02-25',NULL,'2015-09-21 15:41:38'),(29,1,3,'Semana 01','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:23:54'),(30,1,3,'Semana 02','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:24:25'),(31,1,3,'Semana 03','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:24:36'),(32,1,3,'Semana 04','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:24:47'),(33,1,3,'Semana 05','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:28:24'),(34,1,3,'Semana 06','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:28:34'),(35,1,3,'Semana 07','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:28:43'),(36,1,3,'Semana 08','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:28:53'),(37,1,3,'Semana 09','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:29:02'),(38,1,3,'Semana 10','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:29:10'),(39,1,3,'Semana 11','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:29:20'),(40,1,3,'Semana 12','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:29:29'),(41,1,3,'Semana 13','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:29:37'),(42,1,3,'Semana 14','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:29:47'),(43,1,3,'Semana 15','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:29:55'),(44,1,3,'Semana 16','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:30:05'),(45,1,3,'Semana 17','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:30:14'),(46,1,3,'Semana 18','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:30:23'),(47,1,3,'Semana 19','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:30:31'),(48,1,3,'Semana 20','','0000-00-00','0000-00-00',NULL,'2015-11-27 18:30:41'),(49,1,5,'Semana 01','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:06:59'),(50,1,5,'Semana 02','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:07:13'),(51,1,5,'Semana 03','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:07:27'),(52,1,5,'Semana 04','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:08:57'),(53,1,5,'Semana 05','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:09:13'),(54,1,5,'Semana 06','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:09:24'),(55,1,5,'Semana 07','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:09:36'),(56,1,5,'Semana 08','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:09:47'),(57,1,12,'Semana 01','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:11:47'),(58,1,12,'Semana 02','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:12:01'),(59,1,12,'Semana 03','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:12:12'),(60,1,12,'Semana 04','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:12:24'),(61,1,12,'Semana 05','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:12:35'),(62,1,12,'Semana 06','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:12:48'),(63,1,12,'Semana 07','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:13:24'),(64,1,12,'Semana 08','','0000-00-00','0000-00-00',NULL,'2015-11-28 05:13:34');
/*!40000 ALTER TABLE `ant_semana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_sociedad`
--

DROP TABLE IF EXISTS `ant_sociedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_sociedad` (
  `SOCIEDP_Codigo` int NOT NULL AUTO_INCREMENT,
  `SOCIEDC_Nombre` varchar(50) NOT NULL,
  `SOCIEDC_Descripcion` varchar(150) NOT NULL,
  `SOCIEDC_FechaModificacion` datetime DEFAULT NULL,
  `SOCIEDC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SOCIEDP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_sociedad`
--

LOCK TABLES `ant_sociedad` WRITE;
/*!40000 ALTER TABLE `ant_sociedad` DISABLE KEYS */;
INSERT INTO `ant_sociedad` VALUES (1,'IEE','Instituto de Ingeniero Electricos Electricisas',NULL,'2015-11-06 17:30:09'),(2,'AEP','Asociacion Electrotecnica Peruana',NULL,'2015-11-06 17:30:26');
/*!40000 ALTER TABLE `ant_sociedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_subcurso`
--

DROP TABLE IF EXISTS `ant_subcurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_subcurso` (
  `SUBCURSOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROD_Codigo` int NOT NULL,
  `SUBCURSOC_Nombre` varchar(150) NOT NULL,
  `SUBCURSOC_FechaModificacion` datetime NOT NULL,
  `SUBCURSOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SUBCURSOP_Codigo`),
  KEY `FK_ant_subcurso_ant_curso` (`PROD_Codigo`),
  CONSTRAINT `FK_ant_subcurso_ant_curso` FOREIGN KEY (`PROD_Codigo`) REFERENCES `ant_curso` (`PROD_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_subcurso`
--

LOCK TABLES `ant_subcurso` WRITE;
/*!40000 ALTER TABLE `ant_subcurso` DISABLE KEYS */;
INSERT INTO `ant_subcurso` VALUES (1,98,'Historia','0000-00-00 00:00:00','2016-01-09 14:51:54'),(2,98,'R.Verbal','0000-00-00 00:00:00','2016-01-09 14:53:38'),(3,98,'Historia','0000-00-00 00:00:00','2016-01-09 14:53:48'),(4,98,'Economia','0000-00-00 00:00:00','2016-01-09 14:54:05'),(5,98,'Lenguaje','0000-00-00 00:00:00','2016-01-09 14:54:16'),(6,98,'Literatura','0000-00-00 00:00:00','2016-01-09 14:54:25');
/*!40000 ALTER TABLE `ant_subcurso` ENABLE KEYS */;
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
  KEY `FK_tarea_ciclo` (`CICLOP_Codigo`),
  KEY `FK_tarea_tipotarea` (`TIPOTAREAP_Codigo`),
  CONSTRAINT `FK_tarea_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_tarea_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_tarea_tipotarea` FOREIGN KEY (`TIPOTAREAP_Codigo`) REFERENCES `ant_tipotarea` (`TIPOTAREAP_Codigo`),
  CONSTRAINT `FK_tarea_usuario` FOREIGN KEY (`USUA_Codigo`) REFERENCES `ant_usuario` (`USUA_Codigo`)
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
  CONSTRAINT `FK_tareo_usuario` FOREIGN KEY (`USUA_Codigo`) REFERENCES `ant_usuario` (`USUA_Codigo`)
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
-- Table structure for table `ant_tema`
--

DROP TABLE IF EXISTS `ant_tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tema` (
  `PRODATRIBDET_Codigo` int NOT NULL AUTO_INCREMENT,
  `PRODATRIB_Codigo` int NOT NULL,
  `CURSOCIP_Codigo` int NOT NULL DEFAULT '0',
  `TIPCICLOP_Codigo` int NOT NULL DEFAULT '0',
  `TEMAC_Descripcion` varchar(250) DEFAULT NULL,
  `TEMAC_FechaModificacion` datetime DEFAULT NULL,
  `TEMAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRODATRIBDET_Codigo`),
  KEY `FK_tema_semana` (`PRODATRIB_Codigo`),
  KEY `FK_tema_cursociclo` (`CURSOCIP_Codigo`),
  KEY `FK_tema_tipoestudiociclo` (`TIPCICLOP_Codigo`),
  CONSTRAINT `FK_tema_cursociclo` FOREIGN KEY (`CURSOCIP_Codigo`) REFERENCES `ant_cursociclo` (`CURSOCIP_Codigo`),
  CONSTRAINT `FK_tema_semana` FOREIGN KEY (`PRODATRIB_Codigo`) REFERENCES `ant_semana` (`PRODATRIB_Codigo`),
  CONSTRAINT `FK_tema_tipoestudiociclo` FOREIGN KEY (`TIPCICLOP_Codigo`) REFERENCES `ant_tipoestudiociclo` (`TIPCICLOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tema`
--

LOCK TABLES `ant_tema` WRITE;
/*!40000 ALTER TABLE `ant_tema` DISABLE KEYS */;
INSERT INTO `ant_tema` VALUES (2,1,4,1,'Nociones basicas','2015-09-21 11:46:35','2015-09-21 16:45:31'),(3,1,4,1,'Segmentos de recta',NULL,'2015-09-21 16:46:52'),(4,2,4,1,'Triangulos',NULL,'2015-09-21 16:47:11'),(5,2,4,1,'Correspondecias entre agnulos y lados',NULL,'2015-09-21 16:47:32'),(6,3,4,1,'Congruencia de triangulos',NULL,'2015-09-21 16:47:57'),(7,3,4,1,'Aplicaciones de la congruencia',NULL,'2015-09-21 16:48:17'),(8,4,4,1,'Teorema de base media',NULL,'2015-09-21 16:48:35'),(9,4,4,1,'Poligonos',NULL,'2015-09-21 16:48:53'),(10,5,4,1,'Cuadrilateros',NULL,'2015-09-21 16:49:12'),(11,5,4,1,'Circunferencia',NULL,'2015-09-21 16:49:34'),(12,6,4,1,'Cuadrilaterio circunscrito y circunscriptible',NULL,'2015-09-21 16:50:03'),(13,6,4,1,'Angulos en la circunferencia',NULL,'2015-09-21 16:50:29'),(14,7,4,1,'Proporcionalidad',NULL,'2015-09-21 16:50:45'),(15,7,4,1,'Semejanza de triangulos',NULL,'2015-09-21 16:51:02'),(16,8,4,1,'Relacione metricas en el trianglo rectangulo',NULL,'2015-09-21 16:51:23'),(17,8,4,1,'Teorema de Heron',NULL,'2015-09-21 16:51:37'),(18,9,4,1,'Poligonos regulares',NULL,'2015-09-21 16:51:55'),(19,9,4,1,'Poligonos regulares notables inscritos',NULL,'2015-09-21 16:52:18'),(20,21,4,11,'Repaso de geometria plana',NULL,'2015-09-21 16:53:06'),(21,21,4,11,'Postulados y teroresmas de la congruencia de triangulos',NULL,'2015-09-21 16:53:32'),(22,22,4,11,'Teorema sobre paralelogramso trapecios',NULL,'2015-09-21 16:54:22'),(23,22,4,11,'Teorema de Thales',NULL,'2015-09-21 16:54:41'),(24,29,8,3,'Cantidades fisicas fundamentales y derivadas',NULL,'2015-11-27 18:31:50'),(25,29,8,3,'Vectores, componentes, vector unitario',NULL,'2015-11-27 18:32:34'),(26,30,8,3,'Cinematica de una particula',NULL,'2015-11-27 18:32:54'),(27,30,8,3,'Movimiento rectilineo (MRU)',NULL,'2015-11-28 05:15:36'),(28,31,8,3,'Cimetaica de una particula',NULL,'2015-11-28 05:42:50'),(29,31,8,3,'Movimiento en 2 direcciones',NULL,'2015-11-28 05:43:14'),(30,32,8,3,'Movimiento circular uniforme',NULL,'2015-11-28 05:44:02'),(31,32,8,3,'Leyes de Newton',NULL,'2015-11-28 05:44:26'),(32,33,8,3,'Conceptro de cuerpo rigido',NULL,'2015-11-28 05:44:59'),(33,33,8,3,'Aplicacion de la segunda ley de Newton',NULL,'2015-11-28 05:45:33'),(34,34,8,3,'Gravitacion Universal',NULL,'2015-11-28 05:46:02'),(35,34,8,3,'Trabajo y energia',NULL,'2015-11-28 05:46:22'),(36,35,8,3,'Impulso',NULL,'2015-11-28 05:47:08'),(37,35,8,3,'Cantidad de movimiento',NULL,'2015-11-28 05:47:35'),(38,36,8,3,'Oscilaciones',NULL,'2015-11-28 05:48:33'),(39,36,8,3,'Ondas sonoras',NULL,'2015-11-28 05:48:59');
/*!40000 ALTER TABLE `ant_tema` ENABLE KEYS */;
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
-- Table structure for table `ant_tipociclo`
--

DROP TABLE IF EXISTS `ant_tipociclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tipociclo` (
  `TIPOCICLOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPOCICLOC_Descripcion` varchar(100) DEFAULT NULL,
  `TIPOCICLOC_Comentario` varchar(100) DEFAULT NULL,
  `TIPOCICLOC_FechaRegistro` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIPOCICLOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipociclo`
--

LOCK TABLES `ant_tipociclo` WRITE;
/*!40000 ALTER TABLE `ant_tipociclo` DISABLE KEYS */;
INSERT INTO `ant_tipociclo` VALUES (1,'Ciclo 1','Ciclo de inicio de año','2015-08-10 23:14:14'),(2,'Ciclo 2','Ciclo de fin de año','2015-08-10 23:14:19');
/*!40000 ALTER TABLE `ant_tipociclo` ENABLE KEYS */;
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
-- Table structure for table `ant_tipoestudiociclo`
--

DROP TABLE IF EXISTS `ant_tipoestudiociclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tipoestudiociclo` (
  `TIPCICLOP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TIPP_Codigo` int NOT NULL DEFAULT '0',
  `CICLOP_Codigo` int NOT NULL DEFAULT '0',
  `TIPCICLOC_Observacion` varchar(150) DEFAULT NULL,
  `TIPCICLOC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `TIPCICLOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIPCICLOP_Codigo`),
  KEY `FK_tipoestudiociclo_tipoestudio` (`TIPP_Codigo`),
  KEY `FK_tipoestudiociclo_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_tipoestudiociclo_ciclo` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_tipoestudiociclo_tipoestudio` FOREIGN KEY (`TIPP_Codigo`) REFERENCES `ant_tipoestudio` (`TIPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipoestudiociclo`
--

LOCK TABLES `ant_tipoestudiociclo` WRITE;
/*!40000 ALTER TABLE `ant_tipoestudiociclo` DISABLE KEYS */;
INSERT INTO `ant_tipoestudiociclo` VALUES (1,5,1,'gfgdfgdfg','1','2015-09-20 03:47:46'),(2,4,1,'Por defecto','1','2015-09-21 13:29:31'),(3,3,1,'Ciclo pre','1','2015-09-21 13:31:14'),(4,6,1,'Este ciclo es intensico','1','2015-09-21 13:31:36'),(5,7,1,'escolar','1','2015-09-21 13:32:08'),(8,4,2,'sdfg','1','2015-09-21 13:33:59'),(9,6,2,'sdfg','1','2015-09-21 13:34:10'),(11,9,1,'Ciclo preparatoria','1','2015-09-21 15:37:27'),(12,8,1,'','1','2015-11-28 05:10:47');
/*!40000 ALTER TABLE `ant_tipoestudiociclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_tipoproducto`
--

DROP TABLE IF EXISTS `ant_tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_tipoproducto` (
  `TIPPROD_Codigo` int NOT NULL AUTO_INCREMENT,
  `CICLOP_Codigo` int DEFAULT NULL,
  `TIPPROD_Descripcion` varchar(250) DEFAULT NULL,
  `TIPPROD_FlagEstado` char(1) DEFAULT '1',
  `TIPPROD_FechaModificacion` datetime DEFAULT NULL,
  `TIPPROD_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIPPROD_Codigo`),
  KEY `FK_tipoproducto_compania` (`CICLOP_Codigo`),
  CONSTRAINT `FK_tipoproducto_compania` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipoproducto`
--

LOCK TABLES `ant_tipoproducto` WRITE;
/*!40000 ALTER TABLE `ant_tipoproducto` DISABLE KEYS */;
INSERT INTO `ant_tipoproducto` VALUES (0,1,':::SELECCIONE::','1',NULL,'2014-10-07 00:37:56'),(1,1,'Matematicas','1',NULL,'2011-01-04 09:31:10'),(4,1,'Letras','1',NULL,'2015-10-16 14:23:18');
/*!40000 ALTER TABLE `ant_tipoproducto` ENABLE KEYS */;
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
INSERT INTO `ant_universidad` VALUES (1,'Universidad Nacional Mayor de San Marcos','UNMSM',NULL,'2015-10-26 12:19:02'),(2,'Universidad Nacional de Ingenieria','UNI',NULL,'2015-10-26 12:20:02'),(3,'Universidad Nacional San Agustin','UNSA',NULL,'2015-10-26 12:20:24'),(4,'Universidad Nacional Federico Villareal','UNFV',NULL,'2015-10-26 12:20:43'),(5,'Universidad Nacional Agraria La Molina',NULL,NULL,'2015-10-26 12:21:07'),(6,'Universidad Privada del Norte','UPN',NULL,'2015-10-26 12:21:33'),(7,'Universidad Cesar Vallejo','UCV',NULL,'2015-10-26 12:21:45'),(8,'Universidad Catolica Sedes Sapientiae','UCSS',NULL,'2015-10-26 12:22:07'),(9,'Universidad Femenina del Sagrado Corazon','UNIFE',NULL,'2015-10-26 12:22:23'),(10,'Universidad Privada San Juan Bautista',NULL,NULL,'2015-10-26 12:23:08'),(11,'Universidad Privada Norbert Wiener',NULL,NULL,'2015-10-26 12:23:22'),(12,'Universidad Marcelino Champagnat',NULL,NULL,'2015-10-26 12:23:45'),(13,'Universidad Peruana de Ciencias Aplicadas','UPC',NULL,'2015-10-26 12:24:01'),(14,'Universidad del Pacifico',NULL,NULL,'2015-10-26 12:24:24'),(15,'Universidad Cientifica del Sur',NULL,NULL,'2015-10-26 12:24:39'),(16,'Universidad Peruana Cayetano Heredia','UCH',NULL,'2015-10-26 12:24:55'),(17,'Universidad Antonio Ruiz de Montoya','UARM',NULL,'2015-10-26 12:25:09'),(18,'Universidad Tecnologica del Peru','UTP',NULL,'2015-10-26 12:25:36');
/*!40000 ALTER TABLE `ant_universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_usuario`
--

DROP TABLE IF EXISTS `ant_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_usuario` (
  `USUA_Codigo` int NOT NULL AUTO_INCREMENT,
  `PERSP_Codigo` int NOT NULL,
  `ROL_Codigo` int NOT NULL,
  `USUA_usuario` varchar(20) DEFAULT NULL,
  `USUA_Password` varchar(50) DEFAULT NULL,
  `USUA_FlagEstado` char(1) DEFAULT '1',
  `USUA_FechaModificacion` datetime DEFAULT NULL,
  `USUA_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USUA_Codigo`),
  KEY `FK_usuario_persona` (`PERSP_Codigo`),
  KEY `FK_usuario_rol` (`ROL_Codigo`),
  CONSTRAINT `FK_usuario_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `ant_persona` (`PERSP_Codigo`),
  CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `ant_rol` (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_usuario`
--

LOCK TABLES `ant_usuario` WRITE;
/*!40000 ALTER TABLE `ant_usuario` DISABLE KEYS */;
INSERT INTO `ant_usuario` VALUES (7,1,4,'demo','e10adc3949ba59abbe56e057f20f883e','1','2015-08-05 12:09:17','2015-08-04 05:25:58');
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
  KEY `FK_vigilancia_tipoestudiociclo` (`TIPCICLOP_Codigo`),
  CONSTRAINT `FK_vigilancia_profesor` FOREIGN KEY (`PROP_Codigo`) REFERENCES `ant_profesor` (`PROP_Codigo`),
  CONSTRAINT `FK_vigilancia_tipoestudiociclo` FOREIGN KEY (`TIPCICLOP_Codigo`) REFERENCES `ant_tipoestudiociclo` (`TIPCICLOP_Codigo`)
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
  CONSTRAINT `FK_vigilanciadetalle_curso` FOREIGN KEY (`PROD_Codigo`) REFERENCES `ant_curso` (`PROD_Codigo`),
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
-- Dumping routines for database 'ceccos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-12 15:44:50
