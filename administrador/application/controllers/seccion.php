<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once "Spreadsheet/Excel/Writer.php";
class Seccion extends CI_Controller {
    var $configuracion;

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");        
        $this->load->model('seccion_model');
        $this->load->model(seguridad.'permiso_model');  
        $this->load->model('curso_model'); 
        $this->load->model('permiso_model'); 
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
        $filter_not = new stdClass(); 
        $filter->order_by    = array("c.SECCIONC_Orden"=>"asc");
        $registros = count($this->seccion_model->listar($filter,$filter_not));
        $productoatrib = $this->seccion_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($productoatrib)>0){
            foreach($productoatrib as $indice=>$valor){  
                $lista[$indice]               = new stdClass();
                $lista[$indice]->codigo       = $valor->SECCIONP_Codigo;
                $lista[$indice]->curso        = $valor->CURSOC_Nombre;
                $lista[$indice]->descripcion  = $valor->SECCIONC_Descripcion;
                $lista[$indice]->orden        = $valor->SECCIONC_Orden;
                $lista[$indice]->finicio      = date_sql($valor->SECCIONC_FechaInicio);
                $lista[$indice]->ffin         = date_sql($valor->SECCIONC_FechaFin);   
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/almacen/semana/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);        
        /*Datos para la vista*/ 
        $data['titulo']     = "Listado de Secciones"; 
        $data['lista']      = $lista;
        $data['menu']       = $menu;  
        $data['header']     = get_header();        
        $data['registros']  = $registros;
        $data['j']          = $j;
        $data['paginacion'] = $this->pagination->create_links();        
        $this->load->view('seccion/seccion_index',$data);
    }

    public function editar($accion,$codigo=""){
        $curso       = $this->input->get_post('curso'); 
        $periodo     = $this->input->get_post('periodo'); 
        $descripcion = $this->input->get_post('descripcion'); 
        $orden       = $this->input->get_post('orden'); 
        $finicio     = $this->input->get_post('finicio'); 
        $ffin        = $this->input->get_post('ffin'); 
        $lista = new stdClass();
        if($accion == "e"){   
            $filter             = new stdClass();
            $filter->seccion    = $codigo;
            $secciones          = $this->seccion_model->obtener($filter);
            $lista->descripcion = $descripcion!=""?$descripcion:$secciones->SECCIONC_Descripcion;
            $lista->orden       = $orden!=""?$orden:$secciones->SECCIONC_Orden;
            $lista->finicio     = $finicio!=""?$finicio:date_sql($secciones->SECCIONC_FechaInicio);
            $lista->ffin        = $ffin!=""?$ffin:date_sql($secciones->SECCIONC_FechaFin);
            $lista->curso       = $curso!=""?$curso:$secciones->CURSOP_Codigo; 
        }
        elseif($accion == "n"){
            $lista->descripcion  = $descripcion;
            $lista->orden        = $orden;
            $lista->finicio      = $finicio;
            $lista->ffin         = $ffin;
            $lista->curso        = 0;
        }
        $data['titulo']      = $accion=="e"?"Modificar Seccion":"Nuevo Seccion"; ;        
        $data['form_open']   = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"","method"=>"post","enctype"=>"multipart/form-data"));
        $data['form_close']  = form_close();
        $data['lista']	     = $lista;
        $filter = new stdClass();
        $filter->estado = 1;
        $data['selcurso']    = form_dropdown('curso',$this->curso_model->seleccionar('0',$filter),$lista->curso,"id='curso' class='comboGrande'");     
        $data['oculto']         = form_hidden(array('accion'=>$accion,'codigo'=>$codigo));
        $this->load->view('seccion/seccion_nuevo',$data);
    }  
    
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "SECCIONC_Descripcion" => $this->input->post('descripcion'),
                        "SECCIONC_Orden"     => $this->input->post('orden'),
                        "CURSOP_Codigo"      => $this->input->post('curso'),
                        "SECCIONC_FechaInicio" => date_sql_ret($this->input->post('finicio')),
                        "SECCIONC_FechaFin"    => date_sql_ret($this->input->post('ffin'))
                       );
        if($accion == "n"){
            $codigo = $this->seccion_model->insertar($data);            
        }
        elseif($accion == "e"){
            $this->seccion_model->modificar($codigo,$data);
        }
    }   
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $cursos  = $this->seccion_model->listar($filter);
        $resultado = json_encode($cursos);
        echo $resultado;
    }    

    public function eliminar(){
        $resultado = true;        
        $codigo = $this->input->post('codigo');
        $this->seccion_model->eliminar($codigo);
        echo json_encode($resultado);
    } 
}
?>