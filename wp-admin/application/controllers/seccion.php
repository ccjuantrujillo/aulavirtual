<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seccion extends CI_Controller {
    var $configuracion;

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model('Seccion_model'); 
        $this->load->model('Periodo_model'); 
        $this->load->model('Curso_model'); 
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
        $filter->order_by    = array("e.CURSOC_Nombre"=>"asc","d.PERIODC_DESCRIPCION"=>"asc","c.SECCIONC_Orden"=>"asc");
        $registros = count($this->Seccion_model->listar($filter,$filter_not));
        $productoatrib = $this->Seccion_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($productoatrib)>0){
            foreach($productoatrib as $indice=>$valor){  
                $lista[$indice]               = new stdClass();
                $lista[$indice]->codigo       = $valor->SECCIONP_Codigo;
                $lista[$indice]->descripcion  = $valor->SECCIONC_Descripcion;
                $lista[$indice]->periodo      = $valor->PERIODC_DESCRIPCION;
                $lista[$indice]->orden        = $valor->SECCIONC_Orden;
                $lista[$indice]->estado       = $valor->SECCIONC_FlagEstado;
                $lista[$indice]->curso        = $valor->CURSOC_Nombre;
                $lista[$indice]->finicio      = date_sql($valor->SECCIONC_FechaInicio);
                $lista[$indice]->ffin         = date_sql($valor->SECCIONC_FechaFin);   
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/seccion/listar";
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
        $lista = new stdClass();
        if($accion == "e"){   
            $filter             = new stdClass();
            $filter->seccion    = $codigo;
            $secciones          = $this->Seccion_model->obtener($filter);
            $lista->codigo      = $secciones->SECCIONP_Codigo;
            $lista->descripcion = $secciones->SECCIONC_Descripcion;
            $lista->orden       = $secciones->SECCIONC_Orden;
            $lista->curso       = $secciones->CURSOP_Codigo;
            $lista->finicio     = date_sql($secciones->SECCIONC_FechaInicio);
            $lista->ffin        = date_sql($secciones->SECCIONC_FechaFin);
            $lista->estado      = $secciones->SECCIONC_FlagEstado; 	
            $lista->periodo     = $secciones->PERIODP_Codigo; 
        }
        elseif($accion == "n"){
            $lista->codigo       = "";
            $lista->descripcion  = "";
            $lista->orden        = "";
            $lista->curso        = "";
            $lista->finicio      = "";
            $lista->ffin         = "";
            $lista->estado       = 1;			
            $lista->periodo      = 0;	
        }
        $arrEstado           = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
        $data['titulo']      = $accion=="e"?"Modificar Seccion":"Nuevo Seccion"; ;        
        $data['form_open']   = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"","method"=>"post","enctype"=>"multipart/form-data"));
        $data['form_close']  = form_close();
	$data['selestado']   = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
        $data['lista']	     = $lista;    
        $filter = new stdClass();
        $data['selperiodo']  = form_dropdown('periodo',$this->Periodo_model->seleccionar('0',$filter),$lista->periodo,"id='periodo' class='comboGrande'");  
        $filter = new stdClass();        
        $data['selcurso']    = form_dropdown('curso',$this->Curso_model->seleccionar('0',$filter),$lista->curso,"id='curso' class='comboGrande'");                  
        $data['oculto']      = form_hidden(array('accion'=>$accion));
        $this->load->view('seccion/seccion_nuevo',$data);
    }  
    
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "SECCIONC_Descripcion" => $this->input->post('descripcion'),
                        "SECCIONC_Orden"       => $this->input->post('orden'),
                        "CURSOP_Codigo"        => $this->input->post('curso'),
                        "SECCIONC_FechaInicio" => date_sql_ret($this->input->post('finicio')),
                        "SECCIONC_FechaFin"    => date_sql_ret($this->input->post('ffin')),
                        "SECCIONC_FlagEstado"  => $this->input->post('estado'),						
                        "PERIODP_Codigo"       => $this->input->post('periodo')
                       );
        if($accion == "n"){
            $codigo = $this->Seccion_model->insertar($data);            
        }
        elseif($accion == "e"){
            $this->Seccion_model->modificar($codigo,$data);
        }
    }   
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $cursos  = $this->Seccion_model->listar($filter);
        $resultado = json_encode($cursos);
        echo $resultado;
    }    

    public function eliminar(){
        $resultado = true;        
        $codigo = $this->input->post('codigo');
        $this->Seccion_model->eliminar($codigo);
        echo json_encode($resultado);
    } 
}
?>