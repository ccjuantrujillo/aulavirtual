<?php
abstract class Molde{
	abstract public function ingresarNombre($nom);
	abstract public function obtenerNombre();

}
class Persona extends Molde{
	private $mensaje = "Hola gente de codigo facilito";
	private $nombre;
	function mostrar(){
		print $this->mensaje;
	}
	function ingresarNombre($nom){
		$this->nombre = $nom;
	}
	function obtenerNombre(){
		return $this->nombre;
	}
}
$obj = new Persona();
$obj->ingresarNombre("Susan");
$obj->obtenerNombre();
$obj->mostrar();
?>