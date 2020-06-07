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