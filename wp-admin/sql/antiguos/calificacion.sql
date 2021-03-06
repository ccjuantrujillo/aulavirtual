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