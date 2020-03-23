<?php
class Cuadrado extends Figura{
	private $lado;
	public function __construct($ejex,$ejey,$lado){
		parent::__construct($ejex,$ejey);
		$this->lado = $lado;
	}
	public function calcularArea(){
		return $this->lado*$this->lado;
	}
}
?>