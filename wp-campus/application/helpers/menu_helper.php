<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/Seccion_model.php';
require_once APPPATH.'models/Leccion_model.php';
require_once APPPATH.'models/Curso_model.php';
require_once APPPATH.'models/Permiso_model.php';

if ( ! function_exists('menu_izq'))
{
    function menu_izq($curso="",$secc="")
   {
        $menu = "";
        $objPermiso         = new Permiso_model();		   	
        $filter = new stdClass();
        $rol = $_SESSION["codrol"];
        $filter->rol = $rol;
        $filter->codigo_padre = 1;
        $filter->order_by = array("d.MENU_Orden"=>"asc");
        $listamenu = $objPermiso->listar($filter);   
        $menu .= "<div class='nav'>";            
        if(count($listamenu)>0){
            foreach ($listamenu as $val){
                $menu .= "<div class='sb-sidenav-menu-heading'>".$val->MENU_Descripcion."</div>";  
                $filter = new stdClass();
                $filter->rol = $rol;
                $filter->codigo_padre = $val->MENU_Codigo;
                $filter->order_by = array("d.MENU_Orden"=>"asc");
                $submenu = $objPermiso->listar($filter); 
                if(count($submenu)>0){
                    foreach($submenu as $val2){
                        $menu .= "<a class='nav-link' href='".base_url().$val2->MENU_Url2."'>";
                        $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>";
                        $menu .= $val2->MENU_Descripcion;
                        $menu .= "</a>";
                        if($curso!="" && $val2->MENU_Codigo==22){
                            $objCurso = new Curso_model();		   	
                            $cursos   = $objCurso->get($curso);                                
                            $menu .= "<a class='nav-link' href='".base_url()."curso/inicio/".$cursos->CURSOP_Codigo."'>";
                            $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>";
                            $menu .= strtoupper($cursos->CURSOC_Nombre);
                            $menu .= "</a>";
                        }
                    }
                }
            }
        }
        $menu .= "</div>";
        return $menu;
    }
}

if(!function_exists('menu_cent')){
    function menu_cent($curso){
        $objCurso = new Curso_model();
        $cursos   = $objCurso->get($curso); 
        $menu = "<ul class='nav nav-pills flex-column'>";
        $menu.= "<li class='nav-item active'>";
        $menu.= "<a href='".base_url()."curso/inicio/".$cursos->CURSOP_Codigo."' class='nav-link'>";
        $menu.= "<i class='far fa-file-alt'></i> INICIO</a></li>";
        $menu.= "<li class='nav-item'>";
        $menu.= "<a href='".base_url()."asistencia/inicio/".$cursos->CURSOP_Codigo."' class='nav-link'>";
        $menu.= "<i class='far fa-file-alt'></i> ASISTENCIA</a></li>";     
        $menu.= "<li class='nav-item'>";
        $menu.= "<a href='".base_url()."calificacion/inicio/".$cursos->CURSOP_Codigo."' class='nav-link'>";
        $menu.= "<i class='far fa-file-alt'></i> CALIFICACIONES</a></li>";            
        $menu.= "</ul>";
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