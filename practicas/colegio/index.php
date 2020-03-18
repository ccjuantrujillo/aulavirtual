<?php
define("BASE_URL","http://ceccos.org/practicas/colegio/");
require_once 'system/entity/Profesor.php';
require_once 'system/database/AccesoBD.php';
require_once 'system/models/ProfesorModel.php';
require_once 'system/controllers/ProfesorController.php';
//
$profe = new ProfesorController();
$profe->Index();
?>