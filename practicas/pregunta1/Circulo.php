<?php
class Circulo extends Figura{
	private $radio;
	public function __construct($ejex,$ejey,$radio){
		parent::__construct($ejex,$ejey);
		$this->radio = $radio;
	}
	public function calcularArea(){
		return $this->radio*$this->radio*3.141516;
	}
}
?>