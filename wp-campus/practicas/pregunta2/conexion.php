<?php
$conexion = new mysqli("localhost","root","950162","ferreteria");
if($conexion->connect_errno){
	echo "La conexion fallo: ".$conexion->connect_error."<br>";	
}
//print_r($conexion);
?>