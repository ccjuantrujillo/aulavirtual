<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Archivos extends LayoutAdmin{
    public function __construct(){
        parent::__construct();                       
        $this->load->model('Archivos_model');
        $this->load->model('Leccion_model');
        $this->load->helper('menu_helper');
        $this->load->helper('lecciones_helper');
    }

    public function inicio($lec,$indice="")
    {
        $filter = new stdClass();
        $filter->leccion = $lec;
        $leccion = $this->Leccion_model->get($filter);		
        $curso   = $leccion->CURSOP_Codigo;
        $seccion = $leccion->SECCIONP_Codigo;
        $data['sgtelec']  = sgte_leccion($lec);        
        $data['leccion']  = $leccion;
        $data['indice']   = $indice;
        $data['menulecc'] = menu_lecciones($seccion);
        $data['menuizq']  = menu_izq($curso,$seccion);
        $data['menuhorz'] = menu_horiz_lecc($lec,$indice);
        //Obtenemos los archivos de la leccion
        $filter = new stdClass();
        $filter->leccion  = $lec;	
        $objArchivos      = new Archivos_model();				
        $data["archivos"] = $objArchivos->read($filter);
        $this->load_layout('archivos/inicio',$data);
    }

    public function index($curso){
        $filter = new stdClass();
        $filter->curso = $curso;
        $objArchivos      = new Archivos_model();				
        $data["archivos"] = $objArchivos->read($filter);
        $data['menuizq']  = menu_izq($curso);
        $this->load_layout('archivos/index',$data);		
    }
}