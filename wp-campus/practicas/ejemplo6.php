<?php
//Ejemplo de clase final
final class Alimento{
	public function Prueba(){
		echo "Esto es una prueba";
	}
	final function masPrueba(){
		echo "Mas pruebas";
	}
}
class Maca extends Alimento{
	
}
?>