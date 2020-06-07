<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Curso extends LayoutAdmin{
    var $datosCurso;
    var $menu;

    public function __construct(){
        parent::__construct();                
        $this->load->model('Curso_model');
        $this->load->model('Leccion_model');
        $this->load->model('Seccion_model');
        $this->load->model('Matricula_model');
        $this->load->model('Profesor_model');
        $this->load->model('Alumno_model');
        $this->load->helper('menu_helper');
    }

    public function index(){
            echo "chau";
    }

    public function listar(){
        $filter = new stdClass();
        $filter->persona = $_SESSION["codper"];    
        if($_SESSION["rolusu"]==6){//alumno
            $alumno = $this->Alumno_model->get($filter);
            $filter = new stdClass();
            $filter->alumno = $alumno->ALUMP_Codigo;
            $cursos = $this->Matricula_model->listar($filter);
        }
        elseif($_SESSION["rolusu"]==7){//profesor
            $profesor = $this->Profesor_model->get($filter);
            $filter = new stdClass();
            $filter->profesor = $profesor->PROP_Codigo;
            $cursos = $this->Curso_model->read($filter);
        }
        elseif($_SESSION["rolusu"]==3){//usuario anonimo
            $filter = new stdClass();
            $cursos = $this->Curso_model->read($filter);
        }
        elseif($_SESSION["rolusu"]==4){//Administador
            $filter = new stdClass();
            $cursos = $this->Curso_model->read($filter);
        }
        $data['cursos']    = $cursos;
        $data['menuizq']   = menu_izq();
        $this->load_layout('curso/read',$data);
    }	
    
   public function inicio($curso)
    {
       $filter = new stdClass();
       $filter->curso = $curso;
       $secciones = $this->Seccion_model->read($filter);
       $menu = "";
       if(count($secciones)>0){
          foreach($secciones as $value){
             $menu .= "<li class='mt'>".$value->SECCIONC_Descripcion;
             $filtro = new stdClass();
             $filtro->curso   = $curso;
             $filtro->seccion = $value->SECCIONP_Codigo;
             $filtro->order_by = array("c.LECCIONC_Orden"=>"asc");
             $lecciones = $this->Leccion_model->read($filtro);
             if(count($lecciones)>0){
                 foreach($lecciones as $val){
                    $menu .= "<ul>";
                    $menu .= "<li class='mt'><a href='".base_url()."leccion/inicio/".$val->LECCIONP_Codigo."/1'>".
                            $val->LECCIONC_Orden." ".$val->LECCIONC_Nombre."</a></li>";
                    $menu .= "</ul>";  
                 }
             }
             $menu .= "</li>";
          }
       }
       $data['menu']      = $menu;
       $data['menuizq']   = menu_izq($curso);
       $data['menucent']  = menu_cent($curso);
       $data['curso']     = $this->Curso_model->get($curso);        
       $this->load_layout('curso/inicio',$data);
    }	    
}