use aulavirtual;

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