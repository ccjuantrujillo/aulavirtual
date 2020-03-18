<?php
class Figura {
	protected $x;
	protected $y;
	public function __construct($ejex,$ejey){
		$this->x = $ejex;
		$this->y = $ejey;
	}
	public function mostrarUbicacion(){
		echo "Ubicacion: <br>";
		echo "Coordenada en el eje x: ".$this->x."<br>";
		echo "Coordenada en el eje y: ".$this->y."<br>";
	}
}
?>