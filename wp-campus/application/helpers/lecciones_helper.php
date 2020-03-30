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
            $filalecciones .= "<div class='row'>";
            $filalecciones .= "<a href='".base_url()."leccion/inicio/".$value->LECCIONP_Codigo."/".$i."'>".$value->SECCIONC_Orden.".".$i." ".$value->LECCIONC_Nombre."</a>";
            $filalecciones .= "</div>";
        }
        return $filalecciones;
   }
}

if( ! function_exists('sgte_leccion')){
       
   function sgte_leccion($leccion){
        $filter = new stdClass();
        $objLeccion  = new Leccion_model();				
        $lecciones   = $objLeccion->read($filter);
        $curso_ant   = "";
        $sgteleccion = "";
        foreach($lecciones as $value){
            if($curso_ant==$value->CURSOP_Codigo){
                $sgteleccion = $value->LECCIONP_Codigo;
                break;
            }
            if($leccion==$value->LECCIONP_Codigo){
                $curso_ant = $value->CURSOP_Codigo;
            }            
        }
        return $sgteleccion;
   }
}
?>