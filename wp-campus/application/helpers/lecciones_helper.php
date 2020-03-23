<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('menu_lecciones'))
{
    function menu_lecciones($seccion)
   {
		//Recuperamos las lecciones de la seccion
		$filter = new stdClass();
		$filter->seccion = $seccion;	
		$objLeccion    = new Leccion_model();				
		$lecciones     = $objLeccion->read($filter);
		$filalecciones = "";
		$i = 0;
		foreach($lecciones as $value){
			$i++;
			$filalecciones .= "<div>";
			$filalecciones .= "<a href='".base_url()."leccion/inicio/".$value->LECCIONP_Codigo."/".$i."'>".$value->SECCIONC_Orden.".".$i." ".$value->LECCIONC_Nombre."</a>";
			$filalecciones .= "</div>";
		}
		return $filalecciones;
   }
}
?>