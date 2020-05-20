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
        $this->load->helper('menu_helper');
    }

    public function index(){
            echo "chau";
    }

    public function inicio($curso)
    {
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("c.SECCIONC_Orden"=>"asc");
        $secciones = $this->Seccion_model->read($filter);
        $menu = "";
        if(count($secciones)>0){
            foreach ($secciones as $value){
                $menu .= "<li class='mt'>".$value->SECCIONC_Descripcion;
                $filter2 = new stdClass();
                $filter2->curso = $curso;
                $filter2->seccion = $value->SECCIONP_Codigo;
                $filter2->order_by = array("c.LECCIONC_Orden"=>"asc");
                $lecciones = $this->Leccion_model->read($filter2);        
                if(count($lecciones)>0){
                    foreach ($lecciones as $val){
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
        $data['lecciones'] = $this->Leccion_model->read($filter);
        $data['secciones'] = $this->Seccion_model->read($filter);
        $data['curso']     = $this->Curso_model->get($curso);        
        $this->load_layout('curso/inicio',$data);
    }	

    public function read(){
        if($_SESSION["rolusu"]==1){//alumno
            $filter = new stdClass();
            $filter->alumno = $_SESSION["codalu"];
            $cursos = $this->Matricula_model->listar($filter);
        }
        elseif($_SESSION["rolusu"]==2){//profesor
            $filter = new stdClass();
            $filter->profesor = $_SESSION["codprofe"];
            $cursos = $this->Curso_model->read($filter);
        }
        $data['cursos']    = $cursos;
        $data['menuizq']   = menu_izq();
        $this->load_layout('curso/read',$data);
    }	
}