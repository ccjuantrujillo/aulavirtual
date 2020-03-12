<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once "Spreadsheet/Excel/Writer.php";
class Productoatributo extends CI_Controller {
    var $configuracion;
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");        
        $this->load->model(almacen.'producto_model');
        $this->load->model(almacen.'productoatributo_model');
        $this->load->model(almacen.'productoatributodetalle_model');
        $this->load->model(almacen.'unidadmedida_model');
        $this->load->model(seguridad.'permiso_model');  
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
    }

    public function index(){
        $this->load->view('seguridad/inicio');
    }
    
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->codigo   = 1; 
        $filter->rol      = 4; 
        $filter->order_by = array("p.MENU_Codigo"=>"asc");
        $menu_padre = $this->permiso_model->listar($filter); 
        $filter           = new stdClass();
        $filter->codigo   = 3;
        $filter->rol      = 4; 
        $menu_hijo  = $this->permiso_model->listar($filter);         
        $filter     = new stdClass();
        $filter_not = new stdClass(); 
        $filter->order_by    = array("d.PROD_Nombre"=>"asc","c.PRODATRIB_Nombre"=>"asc");
        $registros = count($this->productoatributo_model->listar($filter,$filter_not));
        $productoatrib = $this->productoatributo_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($productoatrib)>0){
            foreach($productoatrib as $indice=>$valor){  
                $filter                       = new stdClass();
                $filter->productoatributo     = $valor->PRODATRIB_Codigo;
                $preguntas                    = $this->productoatributodetalle_model->listar($filter);
                $lista[$indice]               = new stdClass();
                $lista[$indice]->codigo       = $valor->PRODATRIB_Codigo;
                $lista[$indice]->producto     = $valor->PROD_Nombre;
                $lista[$indice]->nombre       = $valor->PRODATRIB_Nombre;
                $lista[$indice]->descripcion  = $valor->PRODATRIB_Descripcion;
                $lista[$indice]->preguntasnec = $valor->PRODATRIB_Preguntas;
                $lista[$indice]->preguntas    = count($preguntas);
                $lista[$indice]->vimeo        = trim($valor->PRODATRIB_Vimeo);
                $lista[$indice]->estado       = $valor->PROD_FlagEstado;     
                $lista[$indice]->fechareg     = $valor->fechareg;     
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/almacen/productoatributo/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);        
        /*Datos para la vista*/ 
        $data['lista']      = $lista;
        $data['menu']       = $menu_padre;
        $data['menu_hijo']  = $menu_hijo;        
        $data['registros']  = $registros;
        $data['j']          = $j;
        $data['paginacion'] = $this->pagination->create_links();        
        $this->load->view('almacen/productoatributo_index',$data);
    }

    public function editar($accion,$codigo=""){
        $lista = new stdClass();
        if($accion == "e"){   
            $filter                   = new stdClass();
            $filter->productoatributo = $codigo;
            $productoatributo         = $this->productoatributo_model->obtener($filter);
            $filter                   = new stdClass();
            $filter->productoatributo = $codigo;
            $preguntas                = $this->productoatributodetalle_model->listar($filter);            
            $filter                   = new stdClass();
            $filter->producto         = $productoatributo->PROD_Codigo;
            $productos                = $this->producto_model->obtener($filter);                  
            $lista->nombre            = $productoatributo->PRODATRIB_Nombre;
            $lista->descripcion       = $productoatributo->PRODATRIB_Descripcion;
            $lista->preguntasnec      = $productoatributo->PRODATRIB_Preguntas;
            $lista->preguntas         = count($preguntas);
            $lista->vimeo             = $productoatributo->PRODATRIB_Vimeo;
            $lista->producto          = $productoatributo->PROD_Codigo;
        }
        elseif($accion == "n"){
            $lista->nombre       = "";
            $lista->descripcion  = "";
            $lista->preguntas    = "";
            $lista->preguntasnec = 5;
            $lista->vimeo        = "";
            $lista->producto     = "";
        }
        $data['titulo']      = $accion=="e"?"Modificar Video":"Nuevo Video"; ;        
        $data['form_open']   = form_open('',array("name"=>"form1","id"=>"form1","onsubmit"=>"","method"=>"post","enctype"=>"multipart/form-data"));
        $data['form_close']  = form_close();
        $data['lista']	     = $lista;
        $filter              = new stdClass();
        $filter->order_by    = array("p.PROD_Nombre"=>"asc");
        $data['selproducto'] = form_dropdown('producto',$this->producto_model->seleccionar('0',$filter),$lista->producto,"id='producto' class='comboGrande'");
        $data['oculto']      = form_hidden(array('accion'=>$accion,'codigo'=>$codigo));
        $this->load->view('almacen/productoatributo_nuevo',$data);
    }  
    
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "PRODATRIB_Nombre"      => strtoupper($this->input->post('nombre')),
                        "PRODATRIB_Descripcion" => strtoupper($this->input->post('descripcion')),
                        "PRODATRIB_Preguntas"   => $this->input->post('preguntas'),
                        "PRODATRIB_Vimeo"       => $this->input->post('vimeo'),
                        "PROD_Codigo"           => $this->input->post('producto')
                       );
        if($accion == "n"){
            $this->productoatributo_model->insertar($data);            
        }
        elseif($accion == "e"){
            $this->productoatributo_model->modificar($codigo,$data);            
        }
    }   
    
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $filter = new stdClass();
        $filter->productoatributo = $codigo;
        $preguntas = $this->productoatributodetalle_model->listar($filter);
        $resultado = false;
        if(count($preguntas)==0){
            $resultado = true;
            $this->productoatributo_model->eliminar($codigo);            
        }
        echo json_encode($resultado);
    } 
}
?>