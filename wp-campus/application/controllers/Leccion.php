<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Leccion extends LayoutAdmin{
    public function __construct(){
        parent::__construct();
        $this->load->model('Archivos_model');        
        $this->load->model('Leccion_model');
        $this->load->helper('menu_helper');
        $this->load->helper('lecciones_helper');
    }

    public function inicio($lec,$indice="")
    {
        //Obtenemos las lecciones
        $filter = new stdClass();
        $filter->leccion = $lec;
        $leccion = $this->Leccion_model->get($filter);
        $curso   = $leccion->CURSOP_Codigo;
        $seccion = $leccion->SECCIONP_Codigo;
        //Obtenemos los archivos
        $filter = new stdClass();
        $filter->leccion  = $lec;	
        $archivos         = new Archivos_model();				
        $data["archivos"] = $archivos->read($filter);    
        $data['leccion']  = $leccion; 
        $data['descripcion'] = str_replace("images",base_url()."assets/img",$leccion->LECCIONC_Descripcion);
        $data['sgtelec']  = sgte_leccion($lec);
        $data['indice']   = $indice;
        $data['menulecc'] = menu_lecciones($seccion);
        $data['menuizq']  = menu_izq($curso,$seccion);
        $data['menuhorz'] = menu_horiz_lecc($lec,$indice);        
        $this->load_layout('leccion/inicio',$data);
    }

}