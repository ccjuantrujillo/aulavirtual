<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'models/Seccion_model.php';
require_once APPPATH.'models/Leccion_model.php';
require_once APPPATH.'models/Curso_model.php';

if ( ! function_exists('menu_izq'))
{
    function menu_izq($curso="",$secc="")
   {
        $menu = "";
        if($curso!=""){
            $objCurso         = new Curso_model();		   	
            $cursos           = $objCurso->get($curso);
            //Obtenemos las leccioes
            $filter           = new stdClass();
            $filter->curso    = $curso;
            $filter->order_by = array("c.SECCIONC_Orden"=>"asc");		
            $objSeccion       = new Seccion_model();	
            $secciones        = $objSeccion->read($filter);	
            //Construimos el menu
            $menu .= "<div class='nav'>";
            $menu .= "<p></p>";
            $menu .= "<a class='nav-link' href='".base_url()."curso/read'>";
            $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>MIS CURSOS";
            $menu .= "</a>";
            $menu .= "<a class='nav-link collapsed active' href='#' data-toggle='collapse' data-target='#collapsePages' "
                    . "aria-expanded='true' aria-controls='collapsePages'>";
            $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-book-open'></i></div>".strtoupper($cursos->CURSOC_Nombre);
            $menu .= "<div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>";
            $menu .= "</a>";
            $menu .= "<div class='collapse ".($secc!=""?"show":"")."' id='collapsePages' aria-labelledby='headingTwo' data-parent='#sidenavAccordion'>";
            $menu .= "<nav class='sb-sidenav-menu-nested nav accordion' id='sidenavAccordionPages'>";
            $valor_ant = "";
            foreach($secciones as $indice=>$value){
                $menu.= "<a class='nav-link ' href='#' data-toggle='collapse' accesskey='' data-target='#pagesCollapseAuth".$indice."' "
                        . "aria-expanded='false' aria-controls='pagesCollapseAuth".$indice."'>".
                        $value->SECCIONC_Orden.'. '.$value->SECCIONC_Descripcion;
                $menu.= "<div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>";
                $menu.= "</a>";
                $filter2           = new stdClass();
                $filter2->curso    = $curso;
                $filter2->seccion  = $value->SECCIONP_Codigo;
                $objLeccion       = new Leccion_model();
                $lecciones        = $objLeccion->read($filter2);
                if(count($lecciones)>0){
                    $menu .= "<div class='collapse ".($secc==$value->SECCIONP_Codigo?"show":"")."' id='pagesCollapseAuth".$indice."' aria-labelledby='headingOne' "
                            . "data-parent='#sidenavAccordionPages'>";
                    $menu .= "<nav class='sb-sidenav-menu-nested nav'>";
                    foreach($lecciones as $ind=>$val){
                        $menu .= "<a class='nav-link' href='".base_url()."leccion/inicio/".$val->LECCIONP_Codigo."'>".$val->LECCIONC_Orden." ".$val->LECCIONC_Nombre."</a>";
                    }
                    $menu .= "</nav>";
                    $menu .= "</div>";                    
                }
            }
            $menu .= "</nav>";
            $menu .= "</div>";
            $menu .= "<a class='nav-link' href='".base_url()."archivos/index/".$cursos->CURSOP_Codigo."'>";
            $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-chart-area'></i></div>ARCHIVOS";
            $menu .= "</a>";
            $menu .= "<a class='nav-link' href='".base_url()."alumno/inicio/".$cursos->CURSOP_Codigo."'>";
            $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-table'></i></div>PARTICIPANTES";
            $menu .= "</a>";            
            $menu .= "</a>";
            $menu .= "<a class='nav-link' href='".base_url()."asistencia/inicio/".$cursos->CURSOP_Codigo."'>";
            $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-table'></i></div>ASISTENCIA";
            $menu .= "</a>";
            $menu .= "</div>";
        }
        else{
            $menu .= "<div class='nav'>";
            $menu .= "<p></p>";
            $menu .= "<a class='nav-link' href='".base_url()."curso/read'>";
            $menu .= "<div class='sb-nav-link-icon'><i class='fas fa-tachometer-alt'></i></div>MIS CURSOS";
            $menu .= "</a>";
            $menu .= "</div>";
        }
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