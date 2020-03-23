<?php
class Auto{
	public function Prueba(){
		echo "Esto es una prueba";
	}
	final function masPrueba(){
		echo "Mas pruebas";
	}
}
class Tico extends Auto{
	function masPrueba(){
		echo "Sobre rescribo la function";
	}
}
?>