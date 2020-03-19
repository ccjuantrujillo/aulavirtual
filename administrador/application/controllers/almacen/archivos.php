<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once "Spreadsheet/Excel/Writer.php";
class Archivos extends CI_Controller {
    var $configuracion;
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");        
        $this->load->model(almacen.'curso_model');
        $this->load->model(almacen.'cursociclo_model');
        $this->load->model(almacen.'cursotipoestudio_model');
        $this->load->model(almacen.'semana_model');
        $this->load->model(almacen.'archivos_model');
        $this->load->model(almacen.'unidadmedida_model');
        $this->load->model(seguridad.'permiso_model');  
        $this->load->model(maestros.'ciclo_model');  
        $this->load->model(maestros.'tipoestudio_model');  
        $this->load->model(maestros.'tipoestudiociclo_model');  
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
    }

    public function index(){
        $this->load->view('seguridad/inicio');
    }
    
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu');	
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);        
        $filter     = new stdClass();
        if($_SESSION["acceso"]==2)  $filter->curso = $_SESSION["codcurso"];
        if($_SESSION["acceso"]==3)  $filter->profesor = $_SESSION["codprofesor"];       
        $filter_not = new stdClass(); 
        $filter->order_by    = array("h.CURSOC_Nombre"=>"asc");
        $registros = count($this->archivos_model->listar($filter,$filter_not));
        $temas     = $this->archivos_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($temas)>0){
            foreach($temas as $indice=>$valor){  
                $lista[$indice]                 = new stdClass();
                $lista[$indice]->codigo         = $valor->ARCHIVP_Codigo;
                $lista[$indice]->curso          = $valor->CURSOC_Nombre;
                $lista[$indice]->descripcion    = $valor->ARCHIVC_Descripcion;
                $lista[$indice]->periodo        = $valor->PERIODC_DESCRIPCION;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/almacen/archivo/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);        
        /*Datos para la vista*/
        $data['titulo_tabla'] = "Listado de archivos";
        $data['lista']        = $lista;
        $data['menu']         = $menu;   
        $data['header']          = get_header();        
        $data['registros']    = $registros;
        $data['j']            = $j;        
        $data['paginacion']   = $this->pagination->create_links();        
        $this->load->view('almacen/archivo_index',$data);
    }

    public function editar($accion,$codigo=""){
        $archivo     = $this->input->get_post('archivo');
        $periodo     = $this->input->get_post('periodo');
        $descripcion = $this->input->get_post('descripcion');
        $lista       = new stdClass();
        if($accion == "e"){
            $titulo               = "Editar Archivo";      
            $filter               = new stdClass();
            $filter->archivo      = $codigo;
            $archivos = $this->archivos_model->obtener($filter);
            $lista->descripcion  = $descripcion!=""?$descripcion:$archivos->TEMAC_Descripcion;
            $lista->nombre       = $archivos->PROD_Nombre;
            $lista->curso        = $curso!=""?$curso:$archivos->CURSOP_Codigo;
            $lista->periodo      = $periodo!=""?$periodo:$archivos->CICLOP_Codigo;
        }
        elseif($accion == "n"){
            $titulo              = "Nuevo Archivo";            
            $lista->descripcion  = $descripcion;
            $lista->periodo      = "";
			$lista->tipoestudiociclo = "";
			$lista->semana = "";
        }  
        $data['titulo']     = $titulo;        
        $data['form_open']  = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"","method"=>"post","enctype"=>"multipart/form-data"));
        $data['form_close'] = form_close();
        $data['lista']	    = $lista;
        $data['selcurso']   = form_dropdown('curso',array(),0,"id='curso' class='comboGrande'");
		$data['semana']     = form_input(array( 'name'  => 'semana','id' => 'semana','value' => '','maxlength' => '100','class' => 'cajaMedia'));
        $data['oculto']      = form_hidden(array('accion'=>$accion,'codigo'=>$codigo));
        $this->load->view('almacen/archivo_nuevo',$data);
    }  
    
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "TEMAC_Descripcion" => ($this->input->post('descripcion')),
                        "PRODATRIB_Codigo"  => 0,
                        "TIPCICLOP_Codigo"  => $this->input->post('tipoestudiociclo'),
                        "CURSOCIP_Codigo"   => $this->input->post('cursociclo')
                       );
        if($accion == "n"){
            $this->tema_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->tema_model->modificar($codigo,$data);
        }
    }   
    
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $this->tema_model->eliminar($codigo);
    } 
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $profesores  = $this->tema_model->listar($filter);
        $resultado = json_encode($profesores);
        echo $resultado;
    }    
}
?>