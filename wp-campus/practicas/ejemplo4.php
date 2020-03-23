<?php
class Instituto{
	public static $nombre = "SISE";
	
	function obtenerNombre(){
		return self::$nombre;
	}
}
class Sede extends Instituto{
	function mostrar(){
		return parent::$nombre;
	}
}

print Instituto::$nombre."<br>";
Instituto::$nombre = "IDATT";
$instituto1 = new Instituto();
echo $instituto1->obtenerNombre();
///
echo "hola";
ECHO Sede::$nombre;
?>