<?php
require_once 'Figura.php';
require_once 'Cuadrado.php';
require_once 'Circulo.php';
//Creamos el objeto cuadrado
echo "Creamos un objeto Cuadrado<br>";
$q1 = new Cuadrado(15,20,8);
$q1->mostrarUbicacion();
$area = $q1->calcularArea();
echo "El area del cuadrado es: ".$area."<br>";
echo "--------------------------------------------<br>";
echo "Creamos un objeto Circulo<br>";
$c1 = new Circulo(4,5,9);
$c1->mostrarUbicacion();
$area = $c1->calcularArea();
echo "El area del circulo es: ".$area."<br>";
?>