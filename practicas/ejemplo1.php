<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
abstract class Mueble{
	private $alto;
	private $ancho;
	private $largo;
	function setData($h,$w,$l){
		$this->alto  = $h;
		$this->ancho = $w;
		$this->largo = $l;
	}
	abstract function getPrice();
}
class Estante extends Mueble{
	private $price;
	function setData($h,$w,$l,$p){
		parent::setData($h,$w,$l);
		$this->price = $p;
	}
	function getPrice(){
		return $this->price;
	}
}
//Creamos un objeto de la clase abstracta
$estante1 = new Estante();
$estante1->setData(15,12,14,18);
echo $estante1->getPrice();
?>