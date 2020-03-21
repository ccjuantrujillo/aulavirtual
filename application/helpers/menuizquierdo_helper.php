<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(APPPATH.'models/Seccion_model.php');

if ( ! function_exists('menu_izq'))
{
    function menu_izq($curso)
   {
   		//Obtenemos las secciones
		$filter        = new stdClass();
		$filter->curso = $curso;
		$filter->estadoseccion = 1;
		$objLeccion    = new Leccion_model();		
		$lecciones     = $objLeccion->Leccion_model->read($filter);
		//Construimos el menu
		$menu = "<div id='Menu'>";
		$menu.= "<aside>";
		$menu.= "<div id='sidebar' class='nav-collapse'>";
		$menu.= "<ul class='sidebar-menu' id='nav-accordion'>";
		$menu.= "<li class='mt'>";
		$menu.= "<a href='".base_url()."curso/inicio/".$curso."'>";
		$menu.= "<i class='fa fa-dashboard'></i>";
		$menu.= "<span>Inicio</span>";
		$menu.= "</a>";
		$menu.= "</li>";
		$menu.= "<li class='sub-menu'>";
		$menu.= "<a href='javascript:;'>";
		$menu.= "<i class='fa fab fa-black-tie'></i>";
		$menu.= "<span>Programa</span>";
		$menu.= "</a>";
		$menu.= "<ul class='sub'>";
		$valor_ant = "";
		foreach($lecciones as $value){
			if($value->SECCIONC_Descripcion!=$valor_ant){
				$menu.= "<li><a href='".base_url()."leccion/inicio/".$value->SECCIONP_Codigo."/".$value->LECCIONP_Codigo."/1'><i class='fa fa-pencil'></i>".$value->SECCIONC_Orden.'. '.$value->SECCIONC_Descripcion."</a></li>";
			}
			$valor_ant = $value->SECCIONC_Descripcion;
		}
		$menu.= "</ul>";
		$menu.= "</li>";
		$menu.= "<li class='sub-menu'>";
		$menu.= "<a href='javascript:;'>";
		$menu.= "<i class='fa fab fa-black-tie'></i>";
		$menu.= "<span>Archivos</span>";
		$menu.= "</a>";
		$menu.= "</li>";
		$menu.= "<li class='sub-menu'>";
		$menu.= "<a href='javascript:;''>";
		$menu.= "<i class='fa fab fa-black-tie'></i>";				
		$menu.= "<span>Tareas</span>";		
		$menu.= "</a>";		
		$menu.= "</li>";		
		$menu.= "<li class='sub-menu'>";		
		$menu.= "<a href='javascript:;'>";		
		$menu.= "<i class='fa fab fa-black-tie'></i>";		
		$menu.= "<span>Evaluaciones</span>";		
		$menu.= "</a>";													
		$menu.= "</li>";		
		$menu.= "<li class='sub-menu'>";		
		$menu.= "<a href='javascript:;'>";		
		$menu.= "<i class='fa fab fa-black-tie'></i>";		
		$menu.= "<span>Calificaciones</span>";		
		$menu.= "</a>";		
		$menu.= "</li>";		
		$menu.= "</ul>";		
		$menu.= "</div>";	
		$menu.= "</aside>";		
		$menu.= "</div>";	
        return $menu;
    }
}
