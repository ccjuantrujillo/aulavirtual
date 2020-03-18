<?php
class miclase{
	public $mensaje = "Hola";
	
	public static function metodo(){
		return 1;
	}
}
echo miclase::metodo();
?>