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
/*!40000 ALTER TABLE `ant_acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_alumno`
--

DROP TABLE IF EXISTS `ant_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_alumno` (
  `ALUMP_Codigo` int NOT NULL AUTO_INCREMENT,
  `EMPRP_Codigo` int DEFAULT NULL,
  `PERSP_Codigo` int DEFAULT NULL,
  `ALUMC_Identificador` varchar(100) DEFAULT NULL,
  `ALUMC_Usuario` varchar(50) DEFAULT NULL,
  `ALUMC_Password` varchar(100) DEFAULT NULL,
  `ALUMC_FlagEstado` char(1) DEFAULT '1',
  `ALUMC_FechaModificacion` datetime DEFAULT NULL,
  `ALUMC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`ALUMP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_alumno`
--

LOCK TABLES `ant_alumno` WRITE;
/*!40000 ALTER TABLE `ant_alumno` DISABLE KEYS */;
INSERT INTO `ant_alumno` VALUES (128,2,436,'',NULL,NULL,'1',NULL,'2020-03-28 18:10:31',7),(129,2,437,'',NULL,NULL,'1',NULL,'2020-03-28 18:24:12',7),(130,2,438,'',NULL,NULL,'1',NULL,'2020-03-28 18:25:50',7),(134,2,442,'',NULL,NULL,'1',NULL,'2020-03-28 18:51:43',7),(139,3,450,'999999',NULL,NULL,'1',NULL,'2020-03-29 02:24:49',7),(140,3,451,'999999',NULL,NULL,'1',NULL,'2020-03-29 02:25:17',7),(141,2,454,'',NULL,NULL,'1',NULL,'2020-03-29 17:01:09',7),(142,2,455,'',NULL,NULL,'1',NULL,'2020-03-29 17:01:17',7),(143,1,459,'','jcheca','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-04-02 02:55:13',7),(144,1,460,'','jgomez','e10adc3949ba59abbe56e057f20f883e','2',NULL,'2020-04-02 02:55:27',7);
/*!40000 ALTER TABLE `ant_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_archivos`
--

DROP TABLE IF EXISTS `ant_archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_archivos` (
  `ARCHIVP_Codigo` int NOT NULL AUTO_INCREMENT,
  `LECCIONP_Codigo` int NOT NULL DEFAULT '0',
  `EMPRP_Codigo` int DEFAULT NULL,
  `ARCHIVC_Nombre` varchar(150) DEFAULT NULL,
  `ARCHIVC_Descripcion` text,
  `ARCHIVC_Adjunto` varchar(250) NOT NULL,
  `ARCHIVC_Orden` int DEFAULT NULL,
  `ARCHIVC_FechaModificacion` datetime DEFAULT NULL,
  `ARCHIVC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ARCHIVP_Codigo`),
  KEY `fk_leccion_archivos_idx` (`LECCIONP_Codigo`),
  KEY `fk_empresa_archivos_idx` (`EMPRP_Codigo`),
  CONSTRAINT `fk_empresa_archivos` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `fk_leccion_archivos` FOREIGN KEY (`LECCIONP_Codigo`) REFERENCES `ant_leccion` (`LECCIONP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_archivos`
--

LOCK TABLES `ant_archivos` WRITE;
/*!40000 ALTER TABLE `ant_archivos` DISABLE KEYS */;
INSERT INTO `ant_archivos` VALUES (66,109,1,'Diapositivias de clase','','',1,NULL,'2020-05-08 03:33:29');
/*!40000 ALTER TABLE `ant_archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_area`
--

DROP TABLE IF EXISTS `ant_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_area` (
  `AREAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `EMPRP_Codigo` int DEFAULT NULL,
  `AREAC_Descripcion` varchar(250) DEFAULT NULL,
  `AREAC_FlagEstado` char(1) DEFAULT '1',
  `AREAC_FechaModificacion` datetime DEFAULT NULL,
  `AREAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AREAP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_area`
--

LOCK TABLES `ant_area` WRITE;
/*!40000 ALTER TABLE `ant_area` DISABLE KEYS */;
INSERT INTO `ant_area` VALUES (1,3,'MATEMATICA','1',NULL,'2020-03-29 03:27:10'),(7,3,'LENGUAJE','1',NULL,'2020-03-29 03:59:07'),(8,1,'COMPUTACIÓN E INFORMATICA','1',NULL,'2020-04-02 02:08:04');
/*!40000 ALTER TABLE `ant_area` ENABLE KEYS */;
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
-- Table structure for table `ant_asistencia`
--

DROP TABLE IF EXISTS `ant_asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_asistencia` (
  `ASISTP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CABASISTP_Codigo` int DEFAULT NULL,
  `MATRICP_Codigo` int DEFAULT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `ASISTC_Marcacion` int DEFAULT '0',
  `ASISTC_Fecha` date DEFAULT NULL,
  `ASISTC_FechaModificacion` datetime DEFAULT NULL,
  `ASISTC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ASISTP_Codigo`),
  KEY `FK_MATRICULA_ASISTENCIA_idx` (`MATRICP_Codigo`),
  KEY `FK_CABASISTENCIA_ASISTENCIA_idx` (`CABASISTP_Codigo`),
  CONSTRAINT `FK_CABASISTENCIA_ASISTENCIA` FOREIGN KEY (`CABASISTP_Codigo`) REFERENCES `ant_cabasistencia` (`CABASISTP_Codigo`),
  CONSTRAINT `FK_MATRICULA_ASISTENCIA` FOREIGN KEY (`MATRICP_Codigo`) REFERENCES `ant_matricula` (`MATRICP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_asistencia`
--

LOCK TABLES `ant_asistencia` WRITE;
/*!40000 ALTER TABLE `ant_asistencia` DISABLE KEYS */;
INSERT INTO `ant_asistencia` VALUES (2,9,4,1,2,NULL,NULL,'2020-04-02 23:57:52'),(3,10,3,1,0,NULL,NULL,'2020-04-03 00:29:02'),(4,9,3,1,0,NULL,NULL,'2020-04-03 00:29:10');
/*!40000 ALTER TABLE `ant_asistencia` ENABLE KEYS */;
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
  `AULAC_Descripcion` varchar(100) DEFAULT NULL,
  `AULAC_FechaModificacion` datetime DEFAULT NULL,
  `AULAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AULAP_Codigo`),
  KEY `FK_aula_local` (`LOCP_Codigo`),
  KEY `FK_EMPRESA_AULA_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_aula_local` FOREIGN KEY (`LOCP_Codigo`) REFERENCES `ant_local` (`LOCP_Codigo`),
  CONSTRAINT `FK_EMPRESA_AULA` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_aula`
--

LOCK TABLES `ant_aula` WRITE;
/*!40000 ALTER TABLE `ant_aula` DISABLE KEYS */;
INSERT INTO `ant_aula` VALUES (23,6,2,'SALON 1',NULL,'2020-03-18 00:03:11'),(24,6,2,'SALON 2',NULL,'2020-03-18 00:03:24'),(25,6,2,'SALON 3',NULL,'2020-03-18 00:03:32'),(27,9,1,'LABORATORIO 1',NULL,'2020-04-02 02:15:07'),(28,9,1,'LABORATORIO 2',NULL,'2020-04-02 02:15:17'),(29,9,1,'LABORATORIO 3',NULL,'2020-04-02 02:15:24'),(30,9,1,'LABORATORIO 4',NULL,'2020-04-02 02:15:32'),(31,9,1,'LABORATORIO 5',NULL,'2020-04-02 02:15:40'),(32,9,1,'LABORATORIO 6',NULL,'2020-04-02 02:15:47'),(33,9,1,'LABORATORIO 7',NULL,'2020-04-02 02:15:55'),(34,9,1,'LABORATORIO 8',NULL,'2020-04-02 02:16:04'),(35,9,1,'LABORATORIO 9',NULL,'2020-04-02 02:16:13'),(36,9,1,'LABORATORIO 10',NULL,'2020-04-02 02:16:20'),(37,9,1,'LABORATORIO 11',NULL,'2020-04-02 02:16:28');
/*!40000 ALTER TABLE `ant_aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_cabasistencia`
--

DROP TABLE IF EXISTS `ant_cabasistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_cabasistencia` (
  `CABASISTP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CURSOP_Codigo` int DEFAULT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `CABASISTC_Fecha` date DEFAULT NULL,
  `CABASISTC_Descripcion` varchar(150) DEFAULT NULL,
  `CABASISTC_Modificacion` datetime DEFAULT NULL,
  `CABASISTC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CABASISTP_Codigo`),
  KEY `FK_CURSO_CABASISTENCIA_idx` (`CURSOP_Codigo`),
  KEY `FK_EMPRESA_CABASISTENCIA_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_CURSO_CABASISTENCIA` FOREIGN KEY (`CURSOP_Codigo`) REFERENCES `ant_curso` (`CURSOP_Codigo`),
  CONSTRAINT `FK_EMPRESA_CABASISTENCIA` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_cabasistencia`
--

LOCK TABLES `ant_cabasistencia` WRITE;
/*!40000 ALTER TABLE `ant_cabasistencia` DISABLE KEYS */;
INSERT INTO `ant_cabasistencia` VALUES (2,103,NULL,'2012-08-11',NULL,NULL,'2020-04-02 21:02:00'),(9,107,1,'2020-04-02','123',NULL,'2020-04-02 22:11:47'),(10,107,1,'2020-04-03',NULL,NULL,'2020-04-03 00:28:30');
/*!40000 ALTER TABLE `ant_cabasistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_calificacion`
--

DROP TABLE IF EXISTS `ant_calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_calificacion` (
  `CALIFICAP_Codigo` int NOT NULL AUTO_INCREMENT,
  `TAREAP_Codigo` int NOT NULL,
  `MATRICP_Codigo` int NOT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `CALIFICAC_Puntaje` double DEFAULT '0',
  `CALIFICAC_Situacion` char(1) DEFAULT '1' COMMENT '1: Pendiente, 2:OK, 3:Leve, 4:Retraso',
  `CALIFICAC_Fecha` date NOT NULL DEFAULT '0000-00-00',
  `CALIFICAC_FechaModificacion` datetime DEFAULT NULL,
  `CALIFICAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CALIFICAP_Codigo`),
  KEY `FK_TAREA_CALIFICACION` (`TAREAP_Codigo`),
  KEY `FK_MATRICULA_CALIFICACION_idx` (`MATRICP_Codigo`),
  CONSTRAINT `FK_MATRICULA_CALIFICACION` FOREIGN KEY (`MATRICP_Codigo`) REFERENCES `ant_matricula` (`MATRICP_Codigo`),
  CONSTRAINT `FK_TAREA_CALIFICACION` FOREIGN KEY (`TAREAP_Codigo`) REFERENCES `ant_tarea` (`TAREAP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_calificacion`
--

LOCK TABLES `ant_calificacion` WRITE;
/*!40000 ALTER TABLE `ant_calificacion` DISABLE KEYS */;
INSERT INTO `ant_calificacion` VALUES (1,9,4,1,36,'1','0000-00-00',NULL,'2020-05-08 06:14:42'),(3,9,3,1,99,'1','0000-00-00',NULL,'2020-05-12 04:46:35'),(10,9,3,1,999,'1','0000-00-00',NULL,'2020-05-12 22:27:21');
/*!40000 ALTER TABLE `ant_calificacion` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_ciclo`
--

LOCK TABLES `ant_ciclo` WRITE;
/*!40000 ALTER TABLE `ant_ciclo` DISABLE KEYS */;
INSERT INTO `ant_ciclo` VALUES (16,2,'INVIERNO 2019','2020-03-01','2020-07-31',1),(17,1,'FEBRERO 2020','2020-02-03','2020-04-10',1),(18,3,'2020','2020-03-01','2020-12-31',1);
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
  `AREAP_Codigo` int DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_curso`
--

LOCK TABLES `ant_curso` WRITE;
/*!40000 ALTER TABLE `ant_curso` DISABLE KEYS */;
INSERT INTO `ant_curso` VALUES (103,16,197,2,1,'YOB ENGLISH FOR CHILDREN','as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe',NULL,'',12,3,5,30,14,'https://www.youtube.com/embed/DWNNnSBUPT8',NULL,NULL,'1','2020-03-18 23:38:16','2020-03-17 23:13:09'),(104,16,197,2,1,'FLAUTA DULCE PARA NIÑOS','as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe',NULL,'',0,5,5,30,14,'https://www.youtube.com/embed/DWNNnSBUPT8',NULL,NULL,'1','2020-03-19 22:17:29','2020-03-18 23:17:01'),(107,17,194,1,8,'Taller de Programacion web - 2','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1','2020-05-19 00:22:57','2020-03-24 02:10:24'),(108,18,199,3,1,'Trigonometria','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1','2020-03-29 04:05:25','2020-03-24 02:33:50'),(109,18,199,3,1,'Geometria','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1','2020-03-29 04:05:30','2020-03-24 02:34:00'),(110,18,199,3,7,'Fisica','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1','2020-03-29 04:05:36','2020-03-24 02:34:07'),(111,18,199,3,7,'Quimica','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1','2020-03-29 04:05:39','2020-03-24 02:34:16'),(112,17,205,1,8,'Base de datos avanzado','',NULL,'',0,5,5,0,14,'',NULL,NULL,'2','2020-05-19 00:04:56','2020-05-19 00:03:03'),(113,17,194,1,8,'Android','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1',NULL,'2020-05-19 00:03:12'),(114,17,194,1,8,'Taller de programacion Java','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1',NULL,'2020-05-19 00:03:28'),(115,17,194,1,8,'Base de datos I','',NULL,'',0,5,5,0,14,'',NULL,NULL,'1',NULL,'2020-05-19 00:03:41');
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
  `EMPRC_DescripcionBreve` varchar(250) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_empresa`
--

LOCK TABLES `ant_empresa` WRITE;
/*!40000 ALTER TABLE `ant_empresa` DISABLE KEYS */;
INSERT INTO `ant_empresa` VALUES (1,1,'43242342342','Aula Virtual','Capacitación online','567567','3424','234234','234234','aulavirtual@gmail.com','Lima - Lima - Lima','1',NULL,'2011-01-09 20:30:59'),(2,1,'12132121321','CECCOS S.R.L','Capacitacion y comunicacion social','957595320','952 465 968','','','ceccos.lima@gmail.com','Mz R Lote 50 Los Nisperos - San Martin de Porres','1',NULL,'2020-03-17 22:20:36'),(3,1,'23424234234','Colegio Mayor',NULL,'957859665','6653','','','martin_trujillo1105@hotmail.com','','1',NULL,'2020-03-24 01:48:15');
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
  `LECCIONC_Orden` varchar(6) DEFAULT NULL,
  `LECCIONC_Video` varchar(50) DEFAULT NULL,
  `LECCIONC_FechaModificacion` datetime DEFAULT NULL,
  `LECCIONC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`LECCIONP_Codigo`),
  KEY `fk_seccion_leccion_idx` (`SECCIONP_Codigo`),
  KEY `fk_empresa_leccion_idx` (`EMPRP_Codigo`),
  CONSTRAINT `fk_empresa_leccion` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `fk_seccion_leccion` FOREIGN KEY (`SECCIONP_Codigo`) REFERENCES `ant_seccion` (`SECCIONP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_leccion`
--

LOCK TABLES `ant_leccion` WRITE;
/*!40000 ALTER TABLE `ant_leccion` DISABLE KEYS */;
INSERT INTO `ant_leccion` VALUES (82,88,2,'Clase 1','loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew loreim ipsu sumere re rew ',NULL,'https://www.youtube.com/embed/DWNNnSBUPT8',NULL,'2020-03-18 23:12:38'),(83,88,2,'Clase 2','as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe as dwq eqw eqw eqwe qwe ',NULL,'https://www.youtube.com/embed/66alSuH1-bA',NULL,'2020-03-18 23:13:44'),(84,89,2,'Clase 3','ds ew ewr wer we rwe rwe rew rwe rew ds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rewds ew ewr wer we rwe rwe rew rwe rew',NULL,'https://www.youtube.com/embed/4JUvuqoA7Fo',NULL,'2020-03-18 23:13:57'),(85,92,2,'Postura de la flauta','',NULL,'https://www.youtube.com/embed/oZG5Lq_wnHk',NULL,'2020-03-18 23:49:09'),(86,93,2,'Tocando la flauta','',NULL,'https://www.youtube.com/embed/oZG5Lq_wnHk',NULL,'2020-03-18 23:49:34'),(107,103,2,'Mary tiene un corderito','<p>Mary tiene un corderito<br></p>\r\n<p>\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/sol.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>																		\r\n	</div>\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>	\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n	</div>	\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/sol.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>	\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>																\r\n	</div>		\r\n	<div class=\"row\">\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>	\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/si.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/la.png\" width=\"58\" height=\"202\"></div>\r\n		<div class=\"col-md-2 col-sm-3 col-xs-4\"><img src=\"images/sol.png\" width=\"58\" height=\"202\"></div>							\r\n	</div>																		\r\n</p>',NULL,'',NULL,'2020-03-20 22:51:15'),(108,103,2,'Gravity Falls','<div class=\"title-box clearfix \">\r\n  <h2 class=\"title-box_primary\">Gravity Falls</h2>\r\n</div> 			\r\n<div class=\"col col-lg-auto col-md-auto col-sm-auto\">\r\n	<p align=\"center\"><img src=\"images/gravity_falls.jpg\" class=\"img-fluid\"></p>\r\n</div>',NULL,'',NULL,'2020-03-20 22:51:30'),(109,104,1,'Estructuras de control','',NULL,'',NULL,'2020-03-24 02:16:43'),(110,104,1,'Funciones','',NULL,'',NULL,'2020-03-24 02:17:01'),(111,104,1,'Matrices','',NULL,'',NULL,'2020-03-24 02:17:30'),(112,105,1,'Clases y objetos','',NULL,'',NULL,'2020-03-24 02:18:02'),(113,106,1,'Uso de Mysql Workbench','',NULL,'',NULL,'2020-03-24 02:18:33'),(114,106,1,'Procedimeintos almacenados en Mysql','',NULL,'',NULL,'2020-03-24 02:19:02'),(115,107,1,'Conexion con BD utilizando PDO','',NULL,'',NULL,'2020-03-24 02:19:43'),(116,108,1,'Mantenimiento utilizando PDO','',NULL,'',NULL,'2020-03-24 02:20:20'),(117,109,1,'Concepto Modelo - Vista - Controlador','',NULL,'',NULL,'2020-03-24 02:21:01'),(118,110,1,'Utilizando bootstrap','',NULL,'',NULL,'2020-03-24 02:21:35'),(119,110,1,'Utilizando Ajax','',NULL,'',NULL,'2020-03-24 02:21:47'),(120,110,1,'Uso de sesiones y cookies','',NULL,'',NULL,'2020-03-24 02:22:05'),(121,111,1,'Catalogo de productos','',NULL,'',NULL,'2020-03-24 02:22:29'),(122,112,1,'Carrito de compras','',NULL,'',NULL,'2020-03-24 02:22:42'),(123,113,3,'Angulo trigonometrico','','1.1','',NULL,'2020-03-24 02:37:09'),(124,113,3,'Razones trigonometricas','','1.2','',NULL,'2020-03-24 02:37:29'),(125,113,3,'Identidades Trigonometricas','','1.3','',NULL,'2020-03-24 02:37:49');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_local`
--

LOCK TABLES `ant_local` WRITE;
/*!40000 ALTER TABLE `ant_local` DISABLE KEYS */;
INSERT INTO `ant_local` VALUES (6,2,'Sede San Martin de Porres','Mz R lote 50 Los Nisperos','952465968','2020-03-17 23:57:53'),(7,2,'Sede Lima','Jr Mariano Angulo 1975','3360032','2020-04-02 00:41:07'),(9,1,'SEDE SURCO','AV','','2020-04-02 02:14:02'),(10,1,'SEDE VILLA EL SALVADOR','','','2020-04-02 02:14:12'),(11,1,'SEDE SAN JUAN DE MIRAFLORES','','','2020-04-02 02:14:42');
/*!40000 ALTER TABLE `ant_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_matricula`
--

DROP TABLE IF EXISTS `ant_matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_matricula` (
  `MATRICP_Codigo` int NOT NULL AUTO_INCREMENT,
  `CURSOP_Codigo` int DEFAULT NULL,
  `ALUMP_Codigo` int NOT NULL,
  `EMPRP_Codigo` int DEFAULT NULL,
  `AULAP_Codigo` int NOT NULL,
  `MATRICC_Observacion` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `MATRICC_Fecha` date DEFAULT NULL,
  `MATRICC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `MATRICC_FechaModificacion` datetime DEFAULT NULL,
  `MATRICC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MATRICP_Codigo`),
  KEY `FK_EMPRESA_MATRICULA_idx` (`EMPRP_Codigo`),
  KEY `FK_ALUMNO_MATRICULA_idx` (`ALUMP_Codigo`),
  KEY `FK_CURSO_MATRICULA_idx` (`CURSOP_Codigo`),
  KEY `FK_AULA_MATRICULA_idx` (`AULAP_Codigo`),
  CONSTRAINT `FK_ALUMNO_MATRICULA` FOREIGN KEY (`ALUMP_Codigo`) REFERENCES `ant_alumno` (`ALUMP_Codigo`),
  CONSTRAINT `FK_AULA_MATRICULA` FOREIGN KEY (`AULAP_Codigo`) REFERENCES `ant_aula` (`AULAP_Codigo`),
  CONSTRAINT `FK_CURSO_MATRICULA` FOREIGN KEY (`CURSOP_Codigo`) REFERENCES `ant_curso` (`CURSOP_Codigo`),
  CONSTRAINT `FK_EMPRESA_MATRICULA` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_matricula`
--

LOCK TABLES `ant_matricula` WRITE;
/*!40000 ALTER TABLE `ant_matricula` DISABLE KEYS */;
INSERT INTO `ant_matricula` VALUES (3,107,143,1,27,'','0000-00-00','1',NULL,'2020-04-02 04:00:41'),(4,107,144,1,27,'','0000-00-00','1',NULL,'2020-04-02 04:00:51');
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
INSERT INTO `ant_menu` VALUES (2,58,'Maestro de Alumnos','Aquí se podrán subir las imágenes o aniamciones que serán contenidas en la marquesina','index.php/alumno/listar',1,'alumno.jpg','1',NULL,'2020-03-17 20:08:17'),(3,1,'MANTENIMIENTOS','','index.php/almacen/curso/listar',1,'libros.jpg','1',NULL,'2015-06-21 03:04:31'),(4,1,'PROCESOS','','index.php/ventas/orden/listar',2,'matri.jpg','1',NULL,'2015-08-12 20:34:09'),(22,75,'Maestro de Cursos','Maestro de Cursos','index.php/curso/listar',1,'','1',NULL,'2020-03-17 19:44:30'),(48,4,'Matricula de alumnos','Matricula de alumnos','index.php/ventas/matricula/listar',3,'matri.jpg','1',NULL,'2015-12-23 21:58:57'),(49,4,'Cargas de trabajo','Cargas de trabajo','index.php/ventas/asignacion/listar',2,NULL,'1',NULL,'2015-12-23 21:56:18'),(52,3,'Documentos',NULL,'index.php/inicio/principal',4,NULL,'1',NULL,'2015-08-12 20:35:34'),(53,58,'Maestro de Profesores','Tabla de Profesores','index.php/profesor/listar',1,NULL,'1',NULL,'2020-03-17 19:56:53'),(57,56,'Ejemplo 5','Ejemplo 5','Ejemplo5',1,NULL,'1',NULL,'2015-04-03 02:18:33'),(58,3,'Configuracion Personal',NULL,'#',1,NULL,'1',NULL,'2015-08-04 01:05:22'),(59,74,'Maestro de Aulas','Maestro de Aulas','index.php/aula/listar',7,NULL,'1',NULL,'2020-04-02 00:38:05'),(61,74,'Maestro de Locales','Maestro de Locales','index.php/local/listar',6,NULL,'1',NULL,'2020-04-02 00:38:05'),(62,74,'Maestro de Ciclo','Maestro de Ciclo','index.php/ciclo/listar',1,NULL,'1',NULL,'2020-03-17 16:11:24'),(64,1,'REPORTES Y CONSULTAS',NULL,NULL,3,NULL,'1',NULL,'2015-08-12 20:34:20'),(65,2,'Alumnos pequeños',NULL,NULL,1,NULL,'1',NULL,'2015-06-21 04:06:16'),(66,58,'Maestro de Usuarios','Usuarios','index.php/usuario/listar',1,NULL,'1',NULL,'2020-03-17 20:48:35'),(67,4,'Reuniones de plana','Actas de reunion','index.php/ventas/acta/listar',4,NULL,'1',NULL,'2015-12-23 21:56:29'),(68,4,'Calificacion','Calificacion','index.php/calificacion/listar',7,NULL,'1',NULL,'2020-05-08 05:50:08'),(69,4,'Vigilancia de practicas','Vigilancia de practicas','index.php/ventas/vigilancia/listar',8,NULL,'1',NULL,'2015-12-23 21:57:32'),(70,4,'Maestro de Asistencia','Maestro de Asistencia','index.php/cabasistencia/listar',9,NULL,'1',NULL,'2020-04-03 00:16:07'),(71,4,'Asistencia de alumnos','Asistencia de alumnos','index.php/asistencia/listar',2,NULL,'1',NULL,'2020-04-02 22:34:20'),(72,74,'Maestro de Secciones','Maestro de Secciones','index.php/seccion/listar',3,NULL,'1',NULL,'2020-03-18 15:30:37'),(73,75,'Maestro de Archivos','Maestro de Archivos','index.php/archivos/listar',4,NULL,'1',NULL,'2020-03-21 03:52:00'),(74,3,'Configuracion Sistema','Configuracion Sistema','#',3,NULL,'1',NULL,'2015-08-12 20:35:19'),(75,3,'Configuracion Cursos','Configuracion Cursos','#',2,NULL,'1',NULL,'2015-08-12 20:35:17'),(79,74,'Maestro de Empresas','Maestro de Empresas','index.php/empresa/listar',5,NULL,'1',NULL,'2020-03-18 16:25:55'),(81,75,'Maestro de Tareas','Maestro de Tareas','index.php/tarea/listar',1,NULL,'1',NULL,'2020-05-08 03:47:14'),(82,4,'Asistencia de profesores','Asistencia de profesores','#',5,NULL,'1',NULL,'2015-12-23 21:56:45'),(83,4,'Matricula','Matricula','index.php/matricula/listar',1,NULL,'1',NULL,'2020-03-21 01:26:25'),(84,64,'Asignacion de aulas','Asignacion de aulas','index.php/ventas/asignacion/rpt_asignacion_aulas',1,NULL,'1',NULL,'2016-01-04 21:49:16'),(85,64,'Horario por aula','Horario por aula','index.php/ventas/asignacion/rpt_horario_curso',1,NULL,'1',NULL,'2016-01-22 06:28:24'),(86,74,'Maestro de Modulos','Maestro de Modulos','index.php/modulo/listar',9,NULL,'1',NULL,'2020-04-02 00:52:51'),(87,1,'SALIR','Salir del sistema','index.php/inicio/salir',4,NULL,'1',NULL,'2020-03-17 22:48:45'),(88,74,'Maestro de Periodo','Maestro de Periodo','index.php/periodo/listar',2,NULL,'1',NULL,'2020-03-17 16:23:55'),(89,74,'Maestro de Lecciones','Maestro de Lecciones','index.php/leccion/listar',4,NULL,'1',NULL,'2020-03-18 16:24:39');
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
  `EMPRP_Codigo` int DEFAULT NULL,
  `MODULOC_Descripcion` varchar(250) DEFAULT NULL,
  `MODULOC_FechaModificacion` datetime DEFAULT NULL,
  `MODULOC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MODULOP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_modulo`
--

LOCK TABLES `ant_modulo` WRITE;
/*!40000 ALTER TABLE `ant_modulo` DISABLE KEYS */;
INSERT INTO `ant_modulo` VALUES (9,2,'PRIMERO AÑO',NULL,'2020-04-02 01:47:51'),(10,1,'I CICLO',NULL,'2020-04-02 02:08:51'),(11,1,'II CICLO',NULL,'2020-04-02 02:09:12'),(12,1,'III CICLO',NULL,'2020-04-02 02:09:23'),(13,1,'IV CICLO',NULL,'2020-04-02 02:09:32'),(14,1,'V CICLO',NULL,'2020-04-02 02:09:40'),(15,1,'VI CICLO',NULL,'2020-04-02 02:09:47');
/*!40000 ALTER TABLE `ant_modulo` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_periodo`
--

LOCK TABLES `ant_periodo` WRITE;
/*!40000 ALTER TABLE `ant_periodo` DISABLE KEYS */;
INSERT INTO `ant_periodo` VALUES (7,16,2,'PERIODO UNICO',1),(8,17,1,'SEMANA 1',1),(9,17,1,'SEMANA 2',1),(10,17,1,'SEMANA 3',1),(11,17,1,'SEMANA 4',1),(12,17,1,'SEMANA 5',1),(13,17,1,'SEMANA 6',1),(14,17,1,'SEMANA 7',1),(15,17,1,'SEMANA 8',1),(16,17,1,'SEMANA 9',1),(17,18,3,'PRIMER BMIESTRE',1),(18,18,3,'SEGUNDO BIMESTRE',1),(19,18,3,'TERCER BIMESTRE',1),(20,18,3,'CUARTO BIMESTRE',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_permiso`
--

LOCK TABLES `ant_permiso` WRITE;
/*!40000 ALTER TABLE `ant_permiso` DISABLE KEYS */;
INSERT INTO `ant_permiso` VALUES (4,4,3,'1'),(5,4,4,'1'),(29,4,22,'1'),(33,4,49,'1'),(39,4,53,'1'),(45,4,57,'1'),(46,4,58,'1'),(47,4,59,'1'),(48,4,61,'1'),(49,4,62,'1'),(51,4,64,'1'),(52,4,65,'1'),(53,4,66,'1'),(54,4,67,'1'),(55,4,68,'1'),(56,4,69,'1'),(57,4,70,'1'),(59,4,72,'1'),(60,4,73,'1'),(61,4,74,'1'),(62,4,75,'1'),(66,6,3,'1'),(67,6,4,'1'),(68,6,22,'1'),(69,6,49,'1'),(71,6,53,'1'),(72,6,57,'1'),(73,6,58,'1'),(74,6,59,'1'),(75,6,61,'1'),(76,6,62,'1'),(78,6,64,'1'),(79,6,65,'1'),(81,6,67,'1'),(82,6,68,'1'),(83,6,69,'1'),(84,6,70,'1'),(85,6,72,'1'),(86,6,73,'1'),(87,6,74,'1'),(88,6,75,'1'),(92,4,79,'1'),(94,4,81,'1'),(96,4,2,'1'),(102,4,83,'1'),(103,4,84,'1'),(104,4,85,'1'),(105,4,86,'1'),(106,4,88,'1'),(107,4,87,'1'),(108,7,2,'1'),(109,7,3,'1'),(110,7,4,'1'),(111,7,22,'1'),(112,7,49,'1'),(113,7,53,'1'),(114,7,57,'1'),(115,7,58,'1'),(116,7,59,'1'),(117,7,61,'1'),(118,7,62,'1'),(119,7,64,'1'),(120,7,65,'1'),(138,4,89,'1'),(140,7,87,'1'),(141,4,71,'1');
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
  `EMPRP_Codigo` int DEFAULT NULL,
  `TIPDOCP_Codigo` int NOT NULL DEFAULT '1',
  `PERSC_ApellidoPaterno` varchar(150) DEFAULT NULL,
  `PERSC_ApellidoMaterno` varchar(150) DEFAULT NULL,
  `PERSC_Nombre` varchar(150) DEFAULT NULL,
  `PERSC_NumeroDocIdentidad` char(8) DEFAULT NULL,
  `PERSC_Direccion` varchar(250) DEFAULT NULL,
  `PERSC_Telefono` varchar(20) DEFAULT NULL,
  `PERSC_Movil` varchar(20) DEFAULT NULL,
  `PERSC_Fax` varchar(20) DEFAULT NULL,
  `PERSC_Email` varchar(200) DEFAULT NULL,
  `PERSC_EmailInstitucional` varchar(250) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=461 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_persona`
--

LOCK TABLES `ant_persona` WRITE;
/*!40000 ALTER TABLE `ant_persona` DISABLE KEYS */;
INSERT INTO `ant_persona` VALUES (445,1,1,'admin','admin','admin','25652','','','',NULL,'','','',NULL,'1','0000-00-00','1',NULL,'2020-04-02 02:00:29'),(446,1,1,'Perez','Prado','Angel','werwer','','5747158','992425058',NULL,'','','',NULL,'1','2020-03-09','1',NULL,'2020-03-28 19:31:09'),(447,2,1,'TRUJILLO','BUSTAMANTE','HERNAN MARTI',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','1',NULL,'2020-04-02 00:47:56'),(448,3,1,'PEREZ','SALAZAR','LUIS ALBERTO',NULL,'','',NULL,NULL,'',NULL,'',NULL,NULL,'0000-00-00','1',NULL,'2020-03-29 01:38:02'),(449,3,1,'BUSTAMANTE','SANCHEZ','YOLANDA','23424324','','','',NULL,'',NULL,'',NULL,'1','2020-03-26','1',NULL,'2020-03-29 01:47:45'),(450,3,1,'CHECA','SALARZAR','OSE ANTONIO',NULL,'','',NULL,NULL,'',NULL,'',NULL,NULL,'0000-00-00','1',NULL,'2020-03-29 02:24:49'),(451,3,1,'ALTUVE','RICARDO','CARLOS',NULL,'','',NULL,NULL,'',NULL,'',NULL,NULL,'0000-00-00','1',NULL,'2020-03-29 02:25:17'),(452,2,1,'TRUJILLO','BUSTAMANTE','HERNÁN MARTÍN','WER','','','',NULL,'',NULL,'',NULL,'1','2020-03-12','1',NULL,'2020-03-29 16:59:18'),(453,2,1,'BUSTAMANTE','SANCHEZ','YOLANDA','23423423','','','',NULL,'',NULL,'',NULL,'2','2020-03-20','1',NULL,'2020-03-29 16:59:53'),(454,2,1,'VAYOLET','','',NULL,'','',NULL,NULL,'',NULL,'',NULL,NULL,'0000-00-00','1',NULL,'2020-03-29 17:01:09'),(455,2,1,'RODRIGO','','',NULL,'','',NULL,NULL,'',NULL,'',NULL,NULL,'0000-00-00','1',NULL,'2020-03-29 17:01:17'),(456,1,1,'GUZMAN','','WILLIAN','23423423','','','',NULL,'','','',NULL,'1','0000-00-00','1',NULL,'2020-04-02 02:04:09'),(457,1,1,'VILDOSO','','PAUL','234234','','','',NULL,'','','',NULL,'1','0000-00-00','1',NULL,'2020-04-02 02:04:30'),(458,1,1,'SANCHEZ','','JUAN','23423423','','','',NULL,'','','',NULL,'1','0000-00-00','1',NULL,'2020-04-02 02:05:14'),(459,1,1,'CHECA','EUSEBIO','JUAN',NULL,'','',NULL,NULL,'','martin@ccjuantrujillo.org','',NULL,NULL,'0000-00-00','1',NULL,'2020-04-02 02:55:13'),(460,1,1,'JULCAHUANCA','GOMEZ','LISBETH',NULL,'','',NULL,NULL,'','','',NULL,NULL,'0000-00-00','1',NULL,'2020-04-02 02:55:27');
/*!40000 ALTER TABLE `ant_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ant_profesor`
--

DROP TABLE IF EXISTS `ant_profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ant_profesor` (
  `PROP_Codigo` int NOT NULL AUTO_INCREMENT,
  `EMPRP_Codigo` int DEFAULT NULL,
  `PERSP_Codigo` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `PROC_Usuario` varchar(50) DEFAULT NULL,
  `PROC_Password` varchar(100) DEFAULT NULL,
  `PROC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  `PROC_FlagBorrado` char(1) NOT NULL DEFAULT '1' COMMENT '1:Activo, 0: Borrado',
  `PROC_FechaModificacion` datetime DEFAULT NULL,
  `PROC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PROP_Codigo`),
  KEY `FK_EMPRESA_PROFESOR_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_EMPRESA_PROFESOR` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_profesor`
--

LOCK TABLES `ant_profesor` WRITE;
/*!40000 ALTER TABLE `ant_profesor` DISABLE KEYS */;
INSERT INTO `ant_profesor` VALUES (194,1,446,0,'pprado','e10adc3949ba59abbe56e057f20f883e','1','1','2020-05-19 00:25:22','2020-03-17 02:51:29'),(195,1,445,0,'admin','21232f297a57a5a743894a0e4a801fc3','2','1','2020-05-18 23:21:09','2020-03-17 04:18:50'),(197,2,447,0,NULL,NULL,'1','1','2020-03-17 23:23:30','2020-03-17 23:23:30'),(199,3,448,0,NULL,NULL,'1','1','2020-03-29 01:37:31','2020-03-24 02:32:22'),(202,3,449,0,NULL,NULL,'1','1','2020-03-29 01:47:45','2020-03-29 01:47:45'),(203,2,452,0,NULL,NULL,'1','1','2020-03-29 16:59:18','2020-03-29 16:59:18'),(204,2,453,0,NULL,NULL,'1','1','2020-03-29 16:59:53','2020-03-29 16:59:53'),(205,1,456,0,'wguzman','e10adc3949ba59abbe56e057f20f883e','1','1','2020-05-18 23:21:12','2020-04-02 02:04:09'),(206,1,457,0,'pvildoso','e10adc3949ba59abbe56e057f20f883e','1','1','2020-05-18 23:21:16','2020-04-02 02:04:30'),(207,1,458,0,'jsanchez','e10adc3949ba59abbe56e057f20f883e','1','1','2020-05-18 23:21:19','2020-04-02 02:05:14');
/*!40000 ALTER TABLE `ant_profesor` ENABLE KEYS */;
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
INSERT INTO `ant_rol` VALUES (4,'Administrador','1','1',NULL,'2020-03-17 21:03:17'),(6,'Alumno','1','2',NULL,'2020-03-17 21:03:17'),(7,'Profesor','1','3',NULL,'2015-12-19 02:32:06');
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
  `PERIODP_Codigo` int DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_seccion`
--

LOCK TABLES `ant_seccion` WRITE;
/*!40000 ALTER TABLE `ant_seccion` DISABLE KEYS */;
INSERT INTO `ant_seccion` VALUES (88,103,2,10,'Semana 1',1,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:12'),(89,103,2,10,'Semana 2',2,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:25'),(90,103,2,10,'Semana 3',3,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:39'),(91,103,2,10,'Semana 4',4,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:10:53'),(92,104,2,10,'Estudio de la nota SI',1,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:47:29'),(93,104,2,10,'Estudio de la nota La',2,'0000-00-00','0000-00-00','1',NULL,'2020-03-18 23:47:43'),(103,104,2,10,'Parituras',1,'0000-00-00','0000-00-00','1',NULL,'2020-03-20 22:50:41'),(104,107,1,10,'Fundamentos del lenguaje',1,'0000-00-00','0000-00-00','2',NULL,'2020-03-24 02:12:00'),(105,107,1,10,'Introduccion a POO',2,'0000-00-00','0000-00-00','2',NULL,'2020-03-24 02:12:20'),(106,107,1,10,'Manejo de base de datos',3,'0000-00-00','0000-00-00','2',NULL,'2020-03-24 02:12:43'),(107,107,1,10,'PDO 1',4,'0000-00-00','0000-00-00','2',NULL,'2020-03-24 02:13:06'),(108,107,1,10,'PDO 2',5,'0000-00-00','0000-00-00','2',NULL,'2020-03-24 02:13:17'),(109,107,1,10,'Uso del patron MVC',6,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:13:36'),(110,107,1,10,'MVC y Ajax',7,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:14:04'),(111,107,1,10,'Proyecto 1',8,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:14:21'),(112,107,1,10,'Proyecto 2',9,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:14:32'),(113,108,3,17,'1er bimestre',1,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:34:57'),(114,108,3,18,'2do bimestre',2,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:35:10'),(115,108,3,19,'3er bimestre',3,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:35:26'),(116,108,3,20,'4to bimestre',4,'0000-00-00','0000-00-00','1',NULL,'2020-03-24 02:35:54');
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
  `TIPOTAREAP_Codigo` int NOT NULL,
  `LECCIONP_Codigo` int NOT NULL,
  `EMPRP_Codigo` int NOT NULL,
  `TAREAC_Nombre` varchar(500) NOT NULL,
  `TAREAC_Instrucciones` varchar(500) DEFAULT NULL,
  `TAREAC_Numero` int DEFAULT NULL,
  `TAREAC_Fecha` date DEFAULT '0000-00-00',
  `TAREAC_FechaEntrega` date DEFAULT '0000-00-00',
  `TAREAC_FechaModificacion` datetime DEFAULT NULL,
  `TAREAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TAREAP_Codigo`),
  KEY `FK_tarea_tipotarea` (`TIPOTAREAP_Codigo`),
  KEY `FK_LECCION_TAREA_idx` (`LECCIONP_Codigo`),
  KEY `FK_EMPRESA_TAREA_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_EMPRESA_TAREA` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `FK_LECCION_TAREA` FOREIGN KEY (`LECCIONP_Codigo`) REFERENCES `ant_leccion` (`LECCIONP_Codigo`),
  CONSTRAINT `FK_tarea_tipotarea` FOREIGN KEY (`TIPOTAREAP_Codigo`) REFERENCES `ant_tipotarea` (`TIPOTAREAP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tarea`
--

LOCK TABLES `ant_tarea` WRITE;
/*!40000 ALTER TABLE `ant_tarea` DISABLE KEYS */;
INSERT INTO `ant_tarea` VALUES (9,4,109,1,'O1 - Sistemas de medicion angular','O1 - Sistemas de medicion angular',NULL,'2020-05-08','0000-00-00',NULL,'2020-05-08 05:42:58'),(14,1,112,1,'Tarea 2','po',NULL,'2020-05-11','2020-05-11',NULL,'2020-05-11 02:44:59');
/*!40000 ALTER TABLE `ant_tarea` ENABLE KEYS */;
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
  `CICLOP_Codigo` int NOT NULL,
  `EMPRP_Codigo` int NOT NULL,
  `TIPOTAREAC_Nombre` varchar(100) DEFAULT NULL,
  `TIPOTAREAC_Peso` int DEFAULT NULL,
  `TIPOTAREAC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TIPOTAREAP_Codigo`),
  KEY `FK_CICLO_TIPOTAREA_idx` (`CICLOP_Codigo`),
  KEY `FK_EMPRESA_TIPOTAREA_idx` (`EMPRP_Codigo`),
  CONSTRAINT `FK_CICLO_TIPOTAREA` FOREIGN KEY (`CICLOP_Codigo`) REFERENCES `ant_ciclo` (`CICLOP_Codigo`),
  CONSTRAINT `FK_EMPRESA_TIPOTAREA` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_tipotarea`
--

LOCK TABLES `ant_tipotarea` WRITE;
/*!40000 ALTER TABLE `ant_tipotarea` DISABLE KEYS */;
INSERT INTO `ant_tipotarea` VALUES (1,17,1,'Eval.Oral',NULL,'2015-09-29 19:17:08'),(2,17,1,'Eval.Tareas',NULL,'2015-09-29 19:17:05'),(3,17,1,'Eval.Semanal',NULL,'2015-09-29 19:17:07'),(4,17,1,'Ex.Mensual',NULL,'2020-05-08 03:03:58'),(5,17,1,'Ex.Bimestral',NULL,'2020-05-08 03:03:58');
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
  `PERSP_Codigo` int DEFAULT NULL,
  `USUAC_usuario` varchar(20) DEFAULT NULL,
  `USUAC_Password` varchar(50) DEFAULT NULL,
  `USUAC_FlagEstado` char(1) DEFAULT '1',
  `USUAC_FechaModificacion` datetime DEFAULT NULL,
  `USUAC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USUAP_Codigo`),
  KEY `FK_usuario_rol` (`ROL_Codigo`),
  KEY `fk_empresa_usuario_idx` (`EMPRP_Codigo`),
  CONSTRAINT `fk_empresa_usuario` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `ant_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `ant_rol` (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ant_usuario`
--

LOCK TABLES `ant_usuario` WRITE;
/*!40000 ALTER TABLE `ant_usuario` DISABLE KEYS */;
INSERT INTO `ant_usuario` VALUES (7,4,2,445,'admin','e10adc3949ba59abbe56e057f20f883e','1','2015-08-05 12:09:17','2015-08-04 05:25:58'),(10,4,1,445,'admin','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-03-24 01:46:38'),(12,4,3,445,'mtrujillo','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-03-24 02:28:06'),(13,7,3,448,'psalazar','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-03-29 02:22:21'),(14,6,3,450,'demo','61b80f94cdd6d632f7bc38fd9ed91d9c','1',NULL,'2020-03-29 02:26:37'),(15,4,2,452,'demo','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-03-29 17:02:19'),(16,7,2,453,'ybustamante','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-03-29 17:02:47'),(17,6,2,455,'rodrigo','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-03-29 17:09:50'),(18,6,1,459,'jcheca','e10adc3949ba59abbe56e057f20f883e','1',NULL,'2020-04-03 00:38:59');
/*!40000 ALTER TABLE `ant_usuario` ENABLE KEYS */;
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

-- Dump completed on 2020-05-20 11:36:17
