<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/Seccion_model.php';
require_once APPPATH.'models/Leccion_model.php';
require_once APPPATH.'models/Curso_model.php';

if ( ! function_exists('menu_izq'))
{
    function menu_izq($curso)
   {
		$objCurso        = new Curso_model();		   	
   		$cursos          = $objCurso->get($curso);
   		//Obtenemos las leccioes
		$filter          = new stdClass();
		$filter->curso   = $curso;
		$filter->estadoseccion  = 1;
		$objLeccion      = new Leccion_model();		
		$lecciones       = $objLeccion->read($filter);		
		//Construimos el menu
		$menu = "<div id='Menu'>";
		$menu.= "<aside>";
		$menu.= "<div id='sidebar' class='nav-collapse'>";
		$menu.= "<ul class='sidebar-menu' id='nav-accordion'>";
		$menu.= "<li class='mt'>";
		$menu.= "<a href='".base_url()."curso/inicio/".$cursos->CURSOP_Codigo."'>";
		//$menu.= "<i class='fa fa-dashboard'></i>";
		$menu.= "<span>".strtoupper($cursos->CURSOC_Nombre)."</span>";
		$menu.= "</a>";
		$menu.= "</li>";
		$menu.= "<li class='sub-menu'>";
		$menu.= "<a href='javascript:;'>";
		$menu.= "<i class='fa fab fa-black-tie'></i>";
		$menu.= "<span>PROGRAMA</span>";
		$menu.= "</a>";
		$menu.= "<ul class='sub'>";
		$valor_ant = "";
		foreach($lecciones as $value){
			if($value->SECCIONC_Descripcion!=$valor_ant){
				$menu.= "<li><a href='".base_url()."leccion/inicio/".$value->LECCIONP_Codigo."/1'><i class='fa fa-pencil'></i>".$value->SECCIONC_Orden.'. '.$value->SECCIONC_Descripcion."</a></li>";
			}
			$valor_ant = $value->SECCIONC_Descripcion;
		}
		$menu.= "</ul>";
		$menu.= "</li>";
		$menu.= "<li class='sub-menu'>";
		$menu.= "<a href='".base_url()."archivos/index/".$cursos->CURSOP_Codigo."'>";
		$menu.= "<i class='fa fab fa-black-tie'></i>";
		$menu.= "<span>ARCHIVOS</span>";
		$menu.= "</a>";
		$menu.= "</li>";
		$menu.= "<li class='sub-menu'>";
		$menu.= "<a href='javascript:;''>";
		$menu.= "<i class='fa fab fa-black-tie'></i>";				
		$menu.= "<span>TAREAS</span>";		
		$menu.= "</a>";		
		$menu.= "</li>";		
		$menu.= "<li class='sub-menu'>";		
		$menu.= "<a href='javascript:;'>";		
		$menu.= "<i class='fa fab fa-black-tie'></i>";		
		$menu.= "<span>EVALUACIONES</span>";		
		$menu.= "</a>";													
		$menu.= "</li>";		
		$menu.= "<li class='sub-menu'>";		
		$menu.= "<a href='javascript:;'>";		
		$menu.= "<i class='fa fab fa-black-tie'></i>";		
		$menu.= "<span>CALIFICACIONES</span>";		
		$menu.= "</a>";		
		$menu.= "</li>";		
		$menu.= "</ul>";		
		$menu.= "</div>";	
		$menu.= "</aside>";		
		$menu.= "</div>";	
        return $menu;
    }
}

if( ! function_exists('menu_horiz_lecc')){
    function menu_horiz_lecc($leccion,$indice="")
   {
		$menu = "<div class='row'>";
		$menu .= "<a class='navbar-brand' href='".base_url()."leccion/inicio/".$leccion."/".$indice."'>Contenido</a>";
		$menu .= "<a class='navbar-brand' href='".base_url()."archivos/inicio/".$leccion."/".$indice."'>Archivos</a>";
		$menu .= "<a class='navbar-brand' href='#'>Tareas</a>";
		$menu .= "</div>"; 
		return $menu;  		
   }
}