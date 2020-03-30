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
        $this->load->helper('menu_helper');
    }

    public function index(){
            echo "chau";
    }

    public function inicio($curso)
    {
        $filter = new stdClass();
        $filter->curso = $curso;
        $secciones = $this->Seccion_model->read($filter);
        $menu = "";
        if(count($secciones)>0){
            foreach ($secciones as $value){
                $menu .= "<li class='mt'>".$value->SECCIONC_Descripcion."</li>";
                $filter = new stdClass();
                $filter->curso = $curso;
                $filter->seccion = $value->SECCIONP_Codigo;
                $lecciones = $this->Leccion_model->read($filter);        
                if(count($lecciones)>0){
                    foreach ($lecciones as $val){
                        $menu .= "<ul>";
                        $menu .= "<li class='mt'><a href='".base_url()."leccion/inicio/".$val->LECCIONP_Codigo."/1'>".
                                $val->LECCIONC_Orden." ".$val->LECCIONC_Nombre."</a></li>";
                        $menu .= "</ul>";                        
                    }
                }
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
        $data['cursos']    = $this->Curso_model->read();
        $data['menuizq']   = menu_izq();
        $this->load_layout('curso/read',$data);
    }	
}