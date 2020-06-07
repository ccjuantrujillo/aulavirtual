<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Periodo extends CI_Controller
{
    private $configuracion;
    private $codigo;

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");          
        $this->load->model('Periodo_model');
        $this->load->model('Ciclo_model');
        $this->load->model('Permiso_model');
        $this->load->helper('menu');
        $this->somevar['compania'] = $this->session->userdata('compania');
		$this->configuracion = $this->config->item('conf_pagina');
    }
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu');		
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);  
        $filter     = new stdClass();
        $filter_not = new stdClass();
        $filter_not->persona = "0";
        $registros = count($this->Periodo_model->listar($filter,$filter_not));
        $personas  = $this->Periodo_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($personas)>0){
            foreach($personas as $indice => $value){
                $lista[$indice]         = new stdClass();
                $lista[$indice]->codigo = $value->PERIODP_Codigo;
                $lista[$indice]->descripcion  = $value->PERIODC_DESCRIPCION;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."maestros/periodo/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['menu']            = $menu;
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("periodo/periodo_index",$data);
    }

     public function editar($accion,$codigo=""){
         $lista = new stdClass();
         if($accion == "e"){
             $filter             = new stdClass();
             $filter->periodo    = $codigo;
             $periodos           = $this->Periodo_model->obtener($filter);
             $lista->descripcion = $periodos->PERIODC_DESCRIPCION;
             $lista->codigo      = $periodos->PERIODP_Codigo;
         }
         elseif($accion == "n"){
             $lista->descripcion = "";
             $lista->codigo      = "";
         }
         $data['titulo']       = $accion=="e"?"Editar Periodo":"Crear Periodo";
         $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close']   = form_close();       
         $data['lista']	       = $lista;
         $data['oculto']       = form_hidden(array("accion"=>$accion));
         $this->load->view("periodo/periodo_nuevo",$data);
    }
     
    public function grabar(){
        $accion = $this->input->get_post('accion');
	$codigo = $this->input->get_post('codigo');
        $data   = array("PERIODC_DESCRIPCION"  => strtoupper($this->input->post('descripcion')));
        if($accion == "n"){
            $codigo = $this->Periodo_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->Periodo_model->modificar($codigo,$data);
        }
    }
    
    public function eliminar()
    {
        $codigo  = $this->input->post('codigo');
        $this->Periodo_model->eliminar($codigo);
    }
  
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $periodos  = $this->Periodo_model->listar($filter);
        $resultado = json_encode($periodos);
        echo $resultado;
    }     
}
?>