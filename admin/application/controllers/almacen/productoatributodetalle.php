<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once "Spreadsheet/Excel/Writer.php";
class Productoatributodetalle extends CI_Controller {
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
        $filter->order_by    = array("PROD_Nombre"=>"asc","d.PRODATRIB_Descripcion"=>"asc","c.PRODATRIBDET_Descripcion"=>"asc");
        $registros = count($this->productoatributodetalle_model->listar($filter,$filter_not));
        $productoatribdet = $this->productoatributodetalle_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($productoatribdet)>0){
            foreach($productoatribdet as $indice=>$valor){  
                $lista[$indice]                 = new stdClass();
                $lista[$indice]->codigo         = $valor->PRODATRIBDET_Codigo;
                $lista[$indice]->producto       = $valor->PROD_Nombre;
                $lista[$indice]->atributo       = $valor->PRODATRIB_Nombre;
                $lista[$indice]->descripcion    = $valor->PRODATRIBDET_Descripcion;
                $lista[$indice]->numero         = $valor->PRODATRIBDET_Numero;
                
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/almacen/productoatributodetalle/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);        
        /*Datos para la vista*/
        $data['titulo_tabla'] = "Listado de preguntas";
        $data['lista']        = $lista;
        $data['menu']         = $menu_padre;
        $data['menu_hijo']    = $menu_hijo;         
        $data['registros']    = $registros;
        $data['j']            = $j;        
        $data['paginacion']   = $this->pagination->create_links();        
        $this->load->view('almacen/productoatributodetalle_index',$data);
    }

    public function editar($accion,$codigo=""){
        $atributo = $this->input->get_post('atributo');
        $producto = $this->input->get_post('producto');
        if($atributo == "") $atributo = 0;
        if($producto == "") $producto = 0;
        $lista    = new stdClass();
        if($accion == "e"){
            $titulo                   = "Editar Pregunta";      
            $filter                   = new stdClass();
            $filter->productoatributodetalle = $codigo;
            $productoatributodet = $this->productoatributodetalle_model->obtener($filter);               
            $lista->numero       = $productoatributodet->PRODATRIBDET_Numero;
            $lista->descripcion  = $productoatributodet->PRODATRIBDET_Descripcion;
            $lista->alternativa1 = $productoatributodet->PRODATRIBDET_Alternativa1;
            $lista->alternativa2 = $productoatributodet->PRODATRIBDET_Alternativa2;
            $lista->alternativa3 = $productoatributodet->PRODATRIBDET_Alternativa3;
            $lista->alternativa4 = $productoatributodet->PRODATRIBDET_Alternativa4;
            $lista->alternativa5 = $productoatributodet->PRODATRIBDET_Alternativa5;
            $lista->flgcorrecta  = trim($productoatributodet->PRODATRIBDET_FlagCorrecta);
            $lista->nombre       = $productoatributodet->PROD_Nombre;
            $lista->atributo     = $productoatributodet->PRODATRIB_Codigo;
            $lista->producto     = $productoatributodet->PROD_Codigo;
        }
        elseif($accion == "n"){
            $titulo              = "Nueva Pregunta";            
            $lista->descripcion  = "";
            $lista->alternativa1 = "";
            $lista->alternativa2 = "";
            $lista->alternativa3 = "";
            $lista->alternativa4 = "";
            $lista->alternativa5 = "";
            $lista->flgcorrecta  = "";
            $lista->nombre       = "";
            $lista->atributo     = $atributo;
            $lista->producto     = $producto;
            $lista->numero       = "";
        }
        $data['titulo']      = $titulo;        
        $data['form_open']   = form_open('',array("name"=>"form1","id"=>"form1","onsubmit"=>"","method"=>"post","enctype"=>"multipart/form-data"));
        $data['form_close']  = form_close();
        $data['lista']	     = $lista;
        $filter              = new stdClass();
        $filter->order_by    = array("p.PROD_Nombre"=>"asc");
        $data['selproducto'] = form_dropdown('producto',$this->producto_model->seleccionar('0',$filter),$lista->producto,"id='producto' class='comboGrande''");
        $filter              = new stdClass();
        $filter->producto    = $lista->producto;
        $filter->order_by    = array("c.PRODATRIB_Descripcion"=>"asc");
        $data['selatributo'] = form_dropdown('atributo',$this->productoatributo_model->seleccionar('0',$filter),$lista->atributo,"id='atributo' class='comboGrande'");
        $data['oculto']      = form_hidden(array('accion'=>$accion,'codigo'=>$codigo));
        $this->load->view('almacen/productoatributodetalle_nuevo',$data);
    }  
    
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "PRODATRIBDET_Numero"         => strtoupper($this->input->post('numero')),
                        "PRODATRIBDET_Descripcion" => strtoupper($this->input->post('descripcion')),
                        "PRODATRIBDET_Alternativa1"     => $this->input->post('alternativa1'),
                        "PRODATRIBDET_Alternativa2"     => $this->input->post('alternativa2'),
                        "PRODATRIBDET_Alternativa3"     => $this->input->post('alternativa3'),
                        "PRODATRIBDET_Alternativa4"     => $this->input->post('alternativa4'),
                        "PRODATRIBDET_Alternativa5"     => $this->input->post('alternativa5'),
                        "PRODATRIBDET_FlagCorrecta"     => $this->input->post('flgcorrecta'),
                        "PRODATRIB_Codigo"              => $this->input->post('atributo')
                       );
        if($accion == "n"){
            $this->productoatributodetalle_model->insertar($data);            
        }
        elseif($accion == "e"){
            $this->productoatributodetalle_model->modificar($codigo,$data);            
        }
    }   
    
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $this->productoatributodetalle_model->eliminar($codigo);
    } 
}
?>