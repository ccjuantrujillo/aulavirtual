CREATE DATABASE  IF NOT EXISTS `admin` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `admin`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: admin
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
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad` (
  `ACTP_Codigo` int NOT NULL AUTO_INCREMENT,
  `ORDENP_Codigo` int NOT NULL,
  `ACTC_Accion` varchar(250) NOT NULL,
  `ACTC_Modulo` varchar(250) NOT NULL,
  `ACTC_Session` varchar(250) NOT NULL,
  `ACTC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACTP_Codigo`),
  KEY `FK_actividad_orden` (`ORDENP_Codigo`),
  CONSTRAINT `FK_actividad_orden` FOREIGN KEY (`ORDENP_Codigo`) REFERENCES `orden` (`ORDENP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=578 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES (525,26,'user_login','mi_curso','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:28:10'),(526,26,'view_micurso','mi_curso','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:37:12'),(527,26,'view_micuenta','mi_cuenta','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:50:38'),(528,26,'view_video9','mi_video','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:52:41'),(529,26,'view_video13','mi_video','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:52:49'),(530,26,'view_video23','mi_video','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:52:50'),(531,26,'view_mievaluacion','mi_evaluacion','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:54:58'),(532,26,'view_minota','mi_nota','8mdph0tgid5fcmhugr068h5ot3','2014-12-19 12:58:23'),(534,26,'user_login','mi_curso','t4ld16ujjbdbs49ais73m18t84','2014-12-19 13:18:10'),(535,26,'view_micurso','mi_curso','t4ld16ujjbdbs49ais73m18t84','2014-12-19 13:18:10'),(536,26,'view_video9','mi_video','t4ld16ujjbdbs49ais73m18t84','2014-12-19 13:18:36'),(537,26,'view_micuenta','mi_cuenta','t4ld16ujjbdbs49ais73m18t84','2014-12-19 13:22:12'),(538,26,'view_video13','mi_video','t4ld16ujjbdbs49ais73m18t84','2014-12-19 13:22:55'),(539,26,'view_video23','mi_video','t4ld16ujjbdbs49ais73m18t84','2014-12-19 13:24:37'),(541,26,'user_login','mi_curso','nq5aqutg2hm0d1gb79i4jnid92','2014-12-19 13:26:39'),(542,26,'view_micurso','mi_curso','nq5aqutg2hm0d1gb79i4jnid92','2014-12-19 13:26:39'),(543,26,'view_video9','mi_video','nq5aqutg2hm0d1gb79i4jnid92','2014-12-19 13:27:03'),(544,26,'view_video13','mi_video','nq5aqutg2hm0d1gb79i4jnid92','2014-12-19 13:27:13'),(545,26,'view_video23','mi_video','nq5aqutg2hm0d1gb79i4jnid92','2014-12-19 13:27:21'),(546,26,'view_micuenta','mi_cuenta','nq5aqutg2hm0d1gb79i4jnid92','2014-12-19 13:27:46'),(547,26,'view_minota','mi_nota','nq5aqutg2hm0d1gb79i4jnid92','2014-12-19 13:28:15'),(549,26,'user_login','mi_curso','999ohqcg8pnaebc7q7nikppqr1','2014-12-19 13:33:02'),(550,26,'view_micurso','mi_curso','999ohqcg8pnaebc7q7nikppqr1','2014-12-19 13:33:03'),(551,26,'view_video9','mi_video','999ohqcg8pnaebc7q7nikppqr1','2014-12-19 13:33:09'),(552,26,'view_mievaluacion','mi_evaluacion','999ohqcg8pnaebc7q7nikppqr1','2014-12-19 13:33:20'),(553,26,'view_video23','mi_video','999ohqcg8pnaebc7q7nikppqr1','2014-12-19 13:33:25'),(554,26,'view_video13','mi_video','999ohqcg8pnaebc7q7nikppqr1','2014-12-19 13:33:26'),(556,26,'user_login','mi_curso','cpsvoorgj9ae7mjlp4lb0n97v4','2014-12-19 14:53:44'),(557,26,'view_micurso','mi_curso','cpsvoorgj9ae7mjlp4lb0n97v4','2014-12-19 14:53:45'),(558,26,'view_video9','mi_video','cpsvoorgj9ae7mjlp4lb0n97v4','2014-12-19 14:53:48'),(559,26,'view_video13','mi_video','cpsvoorgj9ae7mjlp4lb0n97v4','2014-12-19 14:54:33'),(560,26,'view_video23','mi_video','cpsvoorgj9ae7mjlp4lb0n97v4','2014-12-19 14:54:37'),(563,27,'user_login','mi_curso','1ughkuopo2up5i3e9bd83v4de6','2014-12-22 15:57:45'),(564,27,'view_micurso','mi_curso','1ughkuopo2up5i3e9bd83v4de6','2014-12-22 15:57:45'),(565,27,'view_micuenta','mi_cuenta','1ughkuopo2up5i3e9bd83v4de6','2014-12-22 15:57:48'),(566,27,'view_video26','mi_video','1ughkuopo2up5i3e9bd83v4de6','2014-12-22 15:57:49'),(567,27,'view_mievaluacion','mi_evaluacion','1ughkuopo2up5i3e9bd83v4de6','2014-12-22 15:57:55'),(568,27,'view_minota','mi_nota','1ughkuopo2up5i3e9bd83v4de6','2014-12-22 15:58:08'),(571,26,'user_login','mi_curso','qchf8ldkjeo9o9hr1a3g42q4f0','2014-12-22 16:00:14'),(572,26,'view_micurso','mi_curso','qchf8ldkjeo9o9hr1a3g42q4f0','2014-12-22 16:00:15'),(573,26,'view_micuenta','mi_cuenta','qchf8ldkjeo9o9hr1a3g42q4f0','2014-12-22 16:00:16'),(574,26,'view_video9','mi_video','qchf8ldkjeo9o9hr1a3g42q4f0','2014-12-22 16:00:19'),(575,26,'view_mievaluacion','mi_evaluacion','qchf8ldkjeo9o9hr1a3g42q4f0','2014-12-22 16:00:22'),(576,26,'view_video13','mi_video','qchf8ldkjeo9o9hr1a3g42q4f0','2014-12-22 16:00:36'),(577,26,'view_video23','mi_video','qchf8ldkjeo9o9hr1a3g42q4f0','2014-12-22 16:00:40');
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `CLIP_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int NOT NULL,
  `PERSP_Codigo` int NOT NULL,
  `CLIC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CLIC_FechaModificacion` datetime DEFAULT NULL,
  `CLIC_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`CLIP_Codigo`),
  KEY `FK_cliente_compania` (`COMPP_Codigo`),
  KEY `FK_cliente_persona` (`PERSP_Codigo`),
  CONSTRAINT `FK_cliente_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_cliente_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `persona` (`PERSP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,1,63,'2014-10-20 15:37:06','2014-10-29 22:51:12','2'),(5,1,71,'2014-10-20 18:23:28','2014-10-29 21:38:32','2'),(7,1,73,'2014-10-27 16:14:52','2014-10-29 22:41:49','1'),(9,1,80,'2014-10-29 21:51:36','2014-12-22 14:24:01','1'),(10,1,81,'2014-10-29 21:52:41','2014-10-29 22:52:41','2'),(11,1,82,'2014-12-19 06:36:19','2014-12-22 16:07:14','1'),(15,1,86,'2014-12-19 06:37:47','2014-12-19 07:37:47','1'),(16,1,87,'2014-12-22 15:03:11','2014-12-22 16:03:11','1');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compania`
--

DROP TABLE IF EXISTS `compania`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compania` (
  `COMPP_Codigo` int NOT NULL AUTO_INCREMENT,
  `EMPRP_Codigo` int NOT NULL,
  `COMPC_Logo` varchar(250) NOT NULL,
  `COMPC_TipoValorizacion` char(1) NOT NULL DEFAULT '0' COMMENT '0:FIFO, 1:LIFO',
  `COMPC_FlagEstado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`COMPP_Codigo`),
  KEY `FK_cji_compania_cji_empresa` (`EMPRP_Codigo`),
  CONSTRAINT `FK_compania_empresa` FOREIGN KEY (`EMPRP_Codigo`) REFERENCES `empresa` (`EMPRP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compania`
--

LOCK TABLES `compania` WRITE;
/*!40000 ALTER TABLE `compania` DISABLE KEYS */;
INSERT INTO `compania` VALUES (1,1,'Mi loguito','0',1);
/*!40000 ALTER TABLE `compania` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `EMPRP_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int NOT NULL,
  `EMPRC_Ruc` varchar(11) DEFAULT NULL,
  `EMPRC_RazonSocial` varchar(150) DEFAULT NULL,
  `EMPRC_Telefono` varchar(50) DEFAULT NULL,
  `EMPRC_Movil` varchar(50) DEFAULT NULL,
  `EMPRC_Fax` varchar(50) DEFAULT NULL,
  `EMPRC_Web` varchar(250) DEFAULT NULL,
  `EMPRC_Email` varchar(250) DEFAULT NULL,
  `EMPRC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `EMPRC_FechaModificacion` datetime DEFAULT NULL,
  `EMPRC_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`EMPRP_Codigo`),
  KEY `FK_empresa_compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_empresa_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (0,1,NULL,'EMPRESA NO REGISTRADA',NULL,NULL,NULL,NULL,NULL,'2010-12-16 17:34:32',NULL,'1'),(1,1,'11111111111','W','','','','','','2011-01-09 04:30:35',NULL,'0');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `MENU_Codigo` int NOT NULL AUTO_INCREMENT,
  `MENU_Codigo_Padre` int NOT NULL DEFAULT '0',
  `MENU_Descripcion` varchar(150) DEFAULT NULL,
  `MENU_Comentario` varchar(250) DEFAULT NULL,
  `MENU_Url` varchar(250) DEFAULT NULL,
  `MENU_Imagen` varchar(100) DEFAULT NULL,
  `MENU_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MENU_FechaModificacion` datetime DEFAULT NULL,
  `MENU_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`MENU_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (2,1,'ALUMNOS','Aquí se podrán subir las imágenes o aniamciones que serán contenidas en la marquesina','index.php/ventas/cliente/listar','alumno.jpg','2014-10-20 14:38:07',NULL,'1'),(3,1,'CURSO','Aquí se podrán subir las imágenes tipo preview para el menú que contenga un enlace.','index.php/almacen/producto/listar','libros.jpg','2014-10-12 06:08:49',NULL,'1'),(4,1,'MATRICULA','Aquí se subirán la imagen del catálogo de la campaña actual.','index.php/ventas/orden/listar','matri.jpg','2014-10-20 19:13:07',NULL,'1'),(22,3,'Curso',NULL,'index.php/almacen/producto/listar','','2014-10-12 14:53:38',NULL,'1'),(31,3,'Video',NULL,'index.php/almacen/productoatributo/listar','','2014-10-12 14:53:52',NULL,'1'),(47,3,'Pregunta',NULL,'index.php/almacen/productoatributodetalle/listar','','2014-10-12 14:54:01',NULL,'1');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden`
--

DROP TABLE IF EXISTS `orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden` (
  `ORDENP_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int DEFAULT NULL,
  `CLIP_Codigo` int NOT NULL,
  `PROD_Codigo` int NOT NULL,
  `ORDENC_Numero` int DEFAULT NULL,
  `ORDENC_Tiempo` int DEFAULT NULL,
  `ORDENC_Observacion` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ORDENC_Usuario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ORDENC_Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ORDENC_Fecot` date DEFAULT NULL,
  `ORDENC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ORDENC_FechaModificacion` datetime DEFAULT NULL,
  `ORDENC_FlagEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ORDENP_Codigo`),
  KEY `FK_orden_compania` (`COMPP_Codigo`),
  KEY `FK_orden_cliente` (`CLIP_Codigo`),
  KEY `FK_orden_producto` (`PROD_Codigo`),
  CONSTRAINT `FK_orden_cliente` FOREIGN KEY (`CLIP_Codigo`) REFERENCES `cliente` (`CLIP_Codigo`),
  CONSTRAINT `FK_orden_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_orden_producto` FOREIGN KEY (`PROD_Codigo`) REFERENCES `producto` (`PROD_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden`
--

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` VALUES (10,1,2,81,10,4,'0','EGOMEZ  ','7179','2014-10-29','2014-10-29 22:01:55','2014-12-15 00:00:00','1'),(13,1,10,5,13,0,'0','EVARGAS','58665','2014-12-15','2014-12-15 16:33:28','2014-12-15 00:00:00','1'),(14,1,2,5,14,0,'0','EGOMEZ  ','57179','2014-12-15','2014-12-15 16:33:48','2014-12-15 00:00:00','1'),(15,1,7,5,0,0,'0','ERODRIGUEZ','8279','2014-12-15','2014-12-15 16:35:29','2014-12-15 00:00:00','1'),(21,1,5,5,0,30,'0','MPEREZ','58069','2014-12-15','2014-12-15 18:58:32','2014-12-15 00:00:00','1'),(25,1,5,1132,25,30,'0','MPEREZ4','11328069','2014-12-15','2014-12-15 19:24:16','2014-12-22 00:00:00','1'),(26,1,9,88,0,30,'0','RCANAZAS','886765','2014-12-19','2014-12-19 06:44:57','2014-12-19 00:00:00','1'),(27,1,16,1192,27,30,'0','EPAREDES','11928065','2014-12-22','2014-12-22 15:36:39','2014-12-22 00:00:00','1'),(28,1,9,1192,0,30,'0','RCANAZAS','11926765','2014-12-22','2014-12-22 15:37:30','2014-12-22 00:00:00','1');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permiso` (
  `PERM_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int NOT NULL,
  `ROL_Codigo` int NOT NULL,
  `MENU_Codigo` int NOT NULL,
  `PERM_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`PERM_Codigo`),
  UNIQUE KEY `ROL_Codigo_MENU_Codigo` (`ROL_Codigo`,`MENU_Codigo`),
  KEY `FK_cji_permiso_cji_menu` (`MENU_Codigo`),
  KEY `COMPP_Codigo` (`COMPP_Codigo`),
  CONSTRAINT `FK_cji_permiso_cji_menu` FOREIGN KEY (`MENU_Codigo`) REFERENCES `menu` (`MENU_Codigo`),
  CONSTRAINT `FK_cji_permiso_cji_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `rol` (`ROL_Codigo`),
  CONSTRAINT `permiso_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (2,1,4,2,'1'),(4,1,4,3,'1'),(5,1,4,4,'1'),(29,1,4,22,'1'),(30,1,4,31,'1'),(31,1,4,47,'1');
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `PERSP_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int NOT NULL,
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
  `PERSC_FechaNacimiento` date DEFAULT NULL,
  `PERSC_FechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PERSC_FechaModificacion` datetime DEFAULT NULL,
  `PERSC_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`PERSP_Codigo`),
  KEY `FK_persona_compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_persona_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,1,'TRUJILLO','BUSTAMANTE','MARTIN','23442342','SGSGSDFGSGSDG','435345345','345435','5345435','ewtrewtertter','SGSGSDFGSGSDG','dgsgsgd','','1980-05-01','2010-12-29 09:14:55',NULL,'1'),(63,1,'GOMEZ  ','PEREZ ','EDUARDO EDUARDOGF','45645664','','234423','0','0','eduardo@banich.com','','0','0','0000-00-00','2011-08-12 22:31:38',NULL,'1'),(71,1,'PEREZ','AGUILAR ','MARIA','40091852','av peru','456465','0','0','maria.aguilar@hotmail.com','','0','0','2014-02-05','2014-10-20 18:23:27',NULL,'1'),(73,1,'RODRIGUEZ','MEDRANO','ELISEO','40003256','los girasoles 4125','234234/43223434','0','0','luis.arnaldo@hotmail.com','','0','0','2014-05-11','2014-10-27 16:14:52',NULL,'1'),(80,1,'CANAZAS','QUISPE','RUTHCIÃ±A','40091814','MZ R LOTE 50 LOS NISPEROS','34234242','0','0','martin@trujillo.com','MZ R LOTE 50 LOS NISPEROS','0','0','2015-12-29','2014-10-29 21:51:36',NULL,'1'),(81,1,'VARGAS','RUIZ','ELIZABETH','21321321','MIMCO','sdfgdsfgdf','0','0','','','0','0','0000-00-00','2014-10-29 21:52:41',NULL,'1'),(82,1,'PEREZ','GUZMAN','ROBERTO','45645654','MZ P LOTE 15 LOS ALAMAMO','2342342343','0','0','roberto.perez@hotmail.com','MZ P LOTE 15 LOS ALAMAMO','0','0','1992-03-02','2014-12-19 06:36:19',NULL,'1'),(86,1,'RETET','ERTET','TERTRET','23465464','ERTERTERT','345345','0','0','','ERTERTERT','0','0','0000-00-00','2014-12-19 06:37:47',NULL,'1'),(87,1,'PAREDES','GONZALES','ETHEL','45645645','ASFASFF','343243','0','0','ethel.gonzales@hotmail.com','ASFASFF','0','0','1997-12-02','2014-12-22 15:03:11',NULL,'1');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `PROD_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int NOT NULL,
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
  `PROD_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PROD_FechaModificacion` datetime DEFAULT NULL,
  `PROD_FlagEstado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PROD_Codigo`),
  KEY `FK_cji_producto_cji_tipoproducto` (`TIPPROD_Codigo`),
  KEY `FK_producto_compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_cji_producto_cji_tipoproducto` FOREIGN KEY (`TIPPROD_Codigo`) REFERENCES `tipoproducto` (`TIPPROD_Codigo`),
  CONSTRAINT `FK_producto_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1193 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,1,'KM','NUESTRA EMPRESA','','',0,0,0,0,0,'km.png','capitulo23.pdf','2011-01-17 20:13:18','2014-12-22 16:55:17','1'),(4,1,1,'E-LEARNING','NUESTRA EMPRESA','','',6,0,0,15,0,'elearning.png','Carl Sagan - Contact.pdf','2011-01-17 20:19:46','2014-12-22 16:54:26','1'),(5,1,1,'ERP','SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM. ','','',88,3,2,5,14,'erp.png','capitulo06.pdf','2011-01-17 20:19:55','2014-12-22 16:55:01','1'),(80,1,1,'SCM','SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM. ','','',8,0,0,5,0,'scm.png','lengua perfecta.pdf','2011-06-07 10:50:16','2014-12-22 16:55:58','1'),(81,1,1,'MINERIA DE DATOS','NUESTRA EMPRESA','','',0,0,0,0,0,'mineria.png','principito[1].pdf','2011-06-07 10:53:17','2014-12-22 16:55:29','1'),(88,1,2,'SCRUM','EN ESTE CURSO SE DESARROLLAN Y DETALLAN LAS METODOLOGIAS AGILES DE SCRUM','','',7,10,5,8,14,'scrum.png','ElPrincipito.doc','2011-06-08 04:10:09','2014-12-22 16:55:45','1'),(1130,1,3,'CRM','NUESTRA EMPRESA','','',8,0,0,20,0,'crm.png','Gustavo Adolfo Becquer - Historia de una mariposa y una araÃ±.pdf','2014-10-12 15:21:29','2014-12-22 16:54:10','1'),(1131,1,2,'BPMN','SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM. ','','',5,3,3,15,3,'bpmn.png','Obediencia y dominio.pdf','2014-10-29 21:01:57','2014-12-22 16:53:56','1'),(1132,1,2,'BI','SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM. ','','',10,0,0,30,0,'bi.png','FRANCISBACON.pdf','2014-11-10 13:57:28','2014-12-22 16:53:40','1'),(1133,1,1,'E-PROCUREMENT','SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM. ','','',2,0,0,2,0,'eprocurement.png','Bucay-Jorge-Amarse-con-los-ojos-abiertos.pdf','2014-11-10 13:57:44','2014-12-22 16:54:41','1'),(1191,1,1,'GAEL','AWERWQR','','',324,5,5,30,14,'Flecha-Gris-Derecha.gif','CONSECUENCIAS_ECONOMICAS_PAZ_KEYNES.pdf','2014-12-20 05:15:14',NULL,'1'),(1192,1,1,'OYM','AWERWERWRWRERE','','',3,5,5,30,14,'crm.png','Beauvoir_Simone_de-_El_segundo_sexo.pdf','2014-12-22 15:15:17','2014-12-22 16:38:58','1');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productoatributo`
--

DROP TABLE IF EXISTS `productoatributo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productoatributo` (
  `PRODATRIB_Codigo` int NOT NULL AUTO_INCREMENT,
  `PROD_Codigo` int NOT NULL,
  `COMPP_Codigo` int NOT NULL,
  `PRODATRIB_Nombre` varchar(250) DEFAULT NULL,
  `PRODATRIB_Descripcion` varchar(250) DEFAULT NULL,
  `PRODATRIB_Preguntas` int NOT NULL,
  `PRODATRIB_Puntaje` double NOT NULL DEFAULT '0',
  `PRODATRIB_Vimeo` varchar(250) DEFAULT NULL,
  `PRODATRIB_NroIntentos` int NOT NULL,
  `PRODATRIB_FechaModificacion` datetime DEFAULT NULL,
  `PRODATRIB_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRODATRIB_Codigo`),
  KEY `FK_productoatributo_producto` (`PROD_Codigo`),
  KEY `FK_productoatributo_compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_productoatributo_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_productoatributo_producto` FOREIGN KEY (`PROD_Codigo`) REFERENCES `producto` (`PROD_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productoatributo`
--

LOCK TABLES `productoatributo` WRITE;
/*!40000 ALTER TABLE `productoatributo` DISABLE KEYS */;
INSERT INTO `productoatributo` VALUES (4,4,1,'FRAMEWORKS','ASDFASDF 123',5,0,'',0,NULL,'2014-10-07 00:37:20'),(5,5,1,'INTRODUCCION Y CONCEPTOS','ASDF',5,0,'http://vimeo.com/92884359',1,NULL,'2014-10-07 00:47:57'),(9,88,1,'INTERES COMPUESTO','QWER HJKJHKHJK R34 TGERT 53453454',5,0,'http://vimeo.com/92887820',1,NULL,'2014-10-07 19:49:16'),(10,81,1,'GESTION DE CAMBIOS','4243',5,0,'',0,NULL,'2014-10-07 19:49:24'),(13,88,1,'INTERES SIMPLE','4234',5,0,'http://vimeo.com/92884359',1,NULL,'2014-10-07 19:49:49'),(15,5,1,'COMPONENTES, CICLO DE VIDA 344','ESTE ES EL MEJOR CURSO DEL PERU.',5,0,'http://vimeo.com/92884359',0,NULL,'2014-10-12 15:39:41'),(16,5,1,'HERRAMIENTAS DE SOFTWARE','ASDF',5,0,'http://vimeo.com/92884359',1,NULL,'2014-10-12 15:40:43'),(17,1130,1,'CRM2','ASDFDASF',5,0,'http://vimeo.com/92884359',0,NULL,'2014-10-28 01:48:22'),(23,88,1,'PRINCIPIOS DE ECONOMIA','ESTE CURSO ES EL MAS IMPORTANTE DE TODOS LOS CURSOS DICTADOS POR NUESTRA INSTITUACION',5,0,'http://vimeo.com/92886253',1,NULL,'2014-10-28 15:32:33'),(24,4,1,'NBDFG','GDFGDFG',5,0,'',0,NULL,'2014-10-29 20:56:52'),(25,1130,1,'CRM 1','CRM NUEMRO 1',5,0,'http://vimeo.com/23868894',0,NULL,'2014-10-29 21:01:02'),(26,1192,1,'INGENIERIA DE MÃ©TODOS','ING. DE METODOS. ASD FASDFSDF',5,0,'http://vimeo.com/92884359',0,NULL,'2014-12-22 15:24:10');
/*!40000 ALTER TABLE `productoatributo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productoatributodetalle`
--

DROP TABLE IF EXISTS `productoatributodetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productoatributodetalle` (
  `PRODATRIBDET_Codigo` int NOT NULL AUTO_INCREMENT,
  `PRODATRIB_Codigo` int NOT NULL,
  `COMPP_Codigo` int NOT NULL,
  `PRODATRIBDET_Numero` int NOT NULL,
  `PRODATRIBDET_Descripcion` varchar(250) DEFAULT NULL,
  `PRODATRIBDET_Alternativa1` varchar(250) DEFAULT NULL,
  `PRODATRIBDET_Alternativa2` varchar(250) DEFAULT NULL,
  `PRODATRIBDET_Alternativa3` varchar(250) DEFAULT NULL,
  `PRODATRIBDET_Alternativa4` varchar(250) DEFAULT NULL,
  `PRODATRIBDET_Alternativa5` varchar(250) DEFAULT NULL,
  `PRODATRIBDET_FlagCorrecta` int NOT NULL DEFAULT '0',
  `PRODATRIBDET_FechaModificacion` datetime DEFAULT NULL,
  `PRODATRIBDET_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PRODATRIBDET_Codigo`),
  KEY `FK_productoatributodetalle_productoatributo` (`PRODATRIB_Codigo`),
  KEY `FK_productoatributodetalle_compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_productoatributodetalle_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_productoatributodetalle_productoatributo` FOREIGN KEY (`PRODATRIB_Codigo`) REFERENCES `productoatributo` (`PRODATRIB_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productoatributodetalle`
--

LOCK TABLES `productoatributodetalle` WRITE;
/*!40000 ALTER TABLE `productoatributodetalle` DISABLE KEYS */;
INSERT INTO `productoatributodetalle` VALUES (4,9,1,1,'EL MAS GRANDE  GENERAL DEL MUNDO ANITGUO','Pompeyo','Julio Cesar','Seneca','Plotino','Marcuse',2,'2014-10-08 12:47:30','2014-10-08 13:41:45'),(12,16,1,1,'Â¿CUALES SON LOS TIPOS DE INTERES?3','Primeariop','Seciundarios','Tercerarios','Ningu no de los anterioris','aasdfasdf',3,NULL,'2014-10-08 14:37:52'),(19,4,1,1,'DETERMINE LOS PRINCIPALES OBJETOS DE PHP','asdf','asdf','asdf','f','',4,NULL,'2014-10-28 01:44:15'),(20,9,1,1,'EL MEJOR BANCO PERUANO','Credimas','Visa master card','Banbif','Banco del nuevo mundo','Credito',5,NULL,'2014-10-28 01:46:26'),(21,13,1,2,'EXPONENTE DE LE EDAD MEDIA','ARCADI','SENECA 5','PLOTINO','SAN AGUSTIN','SOCRATES',4,NULL,'2014-10-28 15:56:16'),(22,9,1,2,'MARCA DE GASEOSA PERUANA','Coca cola','Kola Real','Inka Kola','Fanta','Pepsi',2,NULL,'2014-10-28 15:57:02'),(23,13,1,1,'LA CAPITAL DE LORETO\r\n','YURIMAGUAS','PUERTO MALDONADO','UCAYALI','IQUTOS','BAGUA',4,NULL,'2014-10-28 15:59:55'),(24,9,1,3,'EL RIO MAS CAUDALOSO','MaraÃ±on','Amazonas','Misisipi','Sena','Amsterdam',2,NULL,'2014-10-28 16:00:49'),(25,25,1,4,'TECNOLOGIA WEB DE MICROSOFT','ASP','PHP','JSP','ORACLE','PEOPLESOSFT',1,NULL,'2014-10-29 21:04:48'),(26,23,1,1,'CUAL ES LA CAPITAL DE FRANCIA','MADRID','CATALUÃ‘A','PARIS','AVIGÃ‘ON','LUXEMBURGO',3,NULL,'2014-11-24 20:15:47'),(27,23,1,2,'NOMBRE UN LIBRO DE MACROECONOMIA','SAMUELSON','SAAL','ROJAS','PEREZ','GONZALES',1,NULL,'2014-11-24 20:16:33'),(28,23,1,3,'DIGA EL NOMBRE DE UNA FRUTA','MESA','FRESA','MUEBLE','PARED','Arbol',2,NULL,'2014-11-24 20:17:12'),(29,25,1,2,'EL COMBATE DE ANGAMOS TUVO COMO HEROE','PEDRO SALINAS','MANUAL GONZALES PRADA','MIGUEL GRAU','BRYCE ECHENIQUE','CRUZ ZURITA',3,NULL,'2014-12-15 03:35:55'),(30,25,1,3,'ALFONSO UGARTE SE LANZO DESDE EL','BARRANCO','MORRO DE ARICA','CERRO SAN CRISTOBAL','MURIO EN COMBATE','NA',2,NULL,'2014-12-15 03:36:49'),(31,5,1,1,'WERWEQR','QWER','WEQR','WER','QWRE','WQER',4,NULL,'2014-12-15 03:43:32'),(32,5,1,2,'WER','WQER','SADF','ASDF','ASDF','ASDF',2,NULL,'2014-12-15 03:44:00'),(33,5,1,3,'DASFASF','ASDF','ASDF','ASDF','ASDF','AFDS',4,NULL,'2014-12-15 03:44:21'),(34,5,1,3,'ADSFASD','ASDF','ASDF','ASDF','ASDF','ASDFASDF',4,NULL,'2014-12-15 03:44:39'),(35,26,1,1,'QUIEN ES EL PADRE DE LA ING. INDUSTRIAL','fayo','drucker','baker','amir','hidalgo',2,NULL,'2014-12-22 15:29:39');
/*!40000 ALTER TABLE `productoatributodetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntaje`
--

DROP TABLE IF EXISTS `puntaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puntaje` (
  `PUNTP_Codigo` int NOT NULL AUTO_INCREMENT,
  `PRODATRIB_Codigo` int NOT NULL,
  `ORDENP_Codigo` int NOT NULL DEFAULT '0',
  `PUNTC_Puntaje` double NOT NULL DEFAULT '0',
  `PUNTC_FechaInicio` datetime DEFAULT NULL,
  `PUNTC_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PUNTP_Codigo`),
  KEY `FK_puntaje_productoatributo` (`PRODATRIB_Codigo`),
  KEY `FK_puntaje_orden` (`ORDENP_Codigo`),
  CONSTRAINT `FK_puntaje_orden` FOREIGN KEY (`ORDENP_Codigo`) REFERENCES `orden` (`ORDENP_Codigo`),
  CONSTRAINT `FK_puntaje_productoatributo` FOREIGN KEY (`PRODATRIB_Codigo`) REFERENCES `productoatributo` (`PRODATRIB_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntaje`
--

LOCK TABLES `puntaje` WRITE;
/*!40000 ALTER TABLE `puntaje` DISABLE KEYS */;
INSERT INTO `puntaje` VALUES (157,9,26,15,'2014-12-19 08:15:27','2014-12-19 13:15:45'),(158,23,26,13,'2014-12-19 08:15:58','2014-12-19 13:16:07'),(159,13,26,20,'2014-12-19 08:16:37','2014-12-19 13:16:48'),(160,26,27,20,'2014-12-22 10:58:02','2014-12-22 15:58:06');
/*!40000 ALTER TABLE `puntaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `ROL_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int NOT NULL,
  `ROL_Descripcion` varchar(150) DEFAULT NULL,
  `ROL_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ROL_FechaModificacion` datetime DEFAULT NULL,
  `ROL_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`ROL_Codigo`),
  KEY `FK_rol_compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_rol_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,1,'Usuario','2014-10-12 15:09:30',NULL,'1'),(4,1,'Administrador','2014-10-12 15:09:06',NULL,'1');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoproducto` (
  `TIPPROD_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int DEFAULT NULL,
  `TIPPROD_Descripcion` varchar(250) DEFAULT NULL,
  `TIPPROD_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TIPPROD_FechaModificacion` datetime DEFAULT NULL,
  `TIPPROD_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`TIPPROD_Codigo`),
  KEY `FK_tipoproducto_compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_tipoproducto_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
INSERT INTO `tipoproducto` VALUES (0,1,':::SELECCIONE::','2014-10-06 08:37:32',NULL,'1'),(1,1,'COMPUTACION','2011-01-03 17:30:46',NULL,'1'),(2,1,'IDIOMAS','2011-01-03 17:30:55',NULL,'1'),(3,1,'NEGOCIOS','2011-01-03 17:31:09',NULL,'1');
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `USUA_Codigo` int NOT NULL AUTO_INCREMENT,
  `COMPP_Codigo` int NOT NULL,
  `PERSP_Codigo` int NOT NULL,
  `ROL_Codigo` int NOT NULL,
  `USUA_usuario` varchar(20) DEFAULT NULL,
  `USUA_Password` varchar(50) DEFAULT NULL,
  `USUA_FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USUA_FechaModificacion` datetime DEFAULT NULL,
  `USUA_FlagEstado` char(1) DEFAULT '1',
  PRIMARY KEY (`USUA_Codigo`),
  KEY `FK_usuario_compania` (`COMPP_Codigo`),
  KEY `FK_usuario_persona` (`PERSP_Codigo`),
  KEY `FK_usuario_rol` (`ROL_Codigo`),
  CONSTRAINT `FK_usuario_compania` FOREIGN KEY (`COMPP_Codigo`) REFERENCES `compania` (`COMPP_Codigo`),
  CONSTRAINT `FK_usuario_persona` FOREIGN KEY (`PERSP_Codigo`) REFERENCES `persona` (`PERSP_Codigo`),
  CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`ROL_Codigo`) REFERENCES `rol` (`ROL_Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (7,1,1,4,'demo','e10adc3949ba59abbe56e057f20f883e','2014-09-24 09:23:07',NULL,'1');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2020-03-12 16:30:12
