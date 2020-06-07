<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabmatricula extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model("Cabmatricula_model");
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');        
    }
    
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu'); 
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);           
        $filter = new stdClass();
        $registros = count($this->Cabmatricula_model->listar($filter));
        $cabmatriculas = $this->Cabmatricula_model->listar($filter);
        $lista = array();
        if(count($cabmatriculas)>0){
            foreach($cabmatriculas as $indice => $value){
                $lista[$indice] = new stdClass();
                $lista[$indice]->codigo = $value->CABMATP_Codigo;
                $lista[$indice]->alumno = $value->CABMATP_Codigo;
                $lista[$indice]->ciclo  = $value->CABMATP_Codigo;
                $lista[$indice]->fecha  = $value->CABASISTC_Fecha;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."cabmatricula/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        //Enviamos los datos a las vistas
        $data["lista"]        = $lista;
        $data["menu"]         = $menu;
        $data['j']            = $j;
        $data['registros']    = $registros;
        $data['paginacion']   = $this->pagination->create_links();
        $this->load->view("cabmatricula/cabmatricula_index",$data);        
    }
    
    public function editar(){
        
        $data['titulo']     = $accion=="e"?"Editar Matricula":"Nueva Matricula"; 
    }
    
    public function grabar(){
        
    }
    
    public function eliminar(){
        
    }
    
    public function obtener(){
        
    }
}
