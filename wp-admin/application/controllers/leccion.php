<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leccion extends CI_Controller
{
    var $configuracion;

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model('Leccion_model');
        $this->load->model('Seccion_model');
        $this->load->model('Curso_model');
        $this->load->model('Periodo_model');
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
        $filter->order_by    = array("e.CURSOC_Nombre"=>"asc","d.SECCIONC_Orden"=>"asc","c.LECCIONC_Orden"=>"asc");
        $registros = count($this->Leccion_model->listar($filter,$filter_not));
        $productoatrib = $this->Leccion_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($productoatrib)>0){
            foreach($productoatrib as $indice=>$valor){  
                $lista[$indice]               = new stdClass();
                $lista[$indice]->codigo       = $valor->LECCIONP_Codigo;
                $lista[$indice]->seccion      = $valor->SECCIONC_Descripcion;
                $lista[$indice]->nombre       = $valor->LECCIONC_Nombre;
                $lista[$indice]->descripcion  = $valor->LECCIONC_Descripcion;
                $lista[$indice]->curso        = $valor->CURSOC_Nombre;
                $lista[$indice]->orden        = $valor->LECCIONC_Orden;
                $lista[$indice]->periodo      = $valor->PERIODC_DESCRIPCION;
                $lista[$indice]->video        = trim($valor->LECCIONC_Video)!=""?"Si":"<span style='color:#FF0000'>No</span>";
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."leccion/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);        
        /*Datos para la vista*/ 
        $data['titulo']     = "Listado de Lecciones"; 
        $data['lista']      = $lista;
        $data['menu']       = $menu;  
        $data['header']     = get_header();        
        $data['registros']  = $registros;
        $data['j']          = $j;
        $data['paginacion'] = $this->pagination->create_links();        
        $this->load->view('leccion/leccion_index',$data);    
    }
    
     public function editar($accion,$codigo=""){
        $lista = new stdClass();
        if($accion == "e"){   
            $filter             = new stdClass();
            $filter->leccion    = $codigo;
            $lecciones          = $this->Leccion_model->obtener($filter);
            $lista->codigo      = $lecciones->LECCIONP_Codigo;
            $lista->descripcion = $lecciones->LECCIONC_Descripcion;
            $lista->nombre      = $lecciones->LECCIONC_Nombre;
            $lista->video       = $lecciones->LECCIONC_Video;
            $lista->seccion     = $lecciones->SECCIONP_Codigo;
            $lista->periodo     = $lecciones->PERIODP_Codigo;
            $lista->curso       = $lecciones->CURSOP_Codigo;
            $lista->orden       = $lecciones->LECCIONC_Orden;
        }
        elseif($accion == "n"){
            $lista->codigo       = "";
            $lista->descripcion  = "";
            $lista->nombre       = "";
            $lista->video        = "";
            $lista->seccion      = 0;
            $lista->periodo      = 0;
            $lista->curso        = 0;
            $lista->orden        = "";
        }
        $data['titulo']      = $accion=="e"?"Modificar Leccion":"Nuevo Leccion"; ;        
        $data['form_open']   = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"","method"=>"post","enctype"=>"multipart/form-data"));
        $data['form_close']  = form_close();
        $data['lista']       = $lista;
        $filter = new stdClass();
        $filter->estado = 1;
        $filter->curso  = $lista->curso;    
        $filter->order_by = array("c.SECCIONC_Orden"=>"asc","c.SECCIONC_Descripcion"=>"asc");
        $data['selseccion']  = form_dropdown('seccion',$this->Seccion_model->seleccionar('0',$filter),$lista->seccion,"id='seccion' class='comboGrande'");          
        $filter = new stdClass();
        $filter->estado   = 1;
        $data['selcurso'] = form_dropdown('curso',$this->Curso_model->seleccionar('0',$filter),$lista->curso,"id='curso' class='comboGrande'");                     
        $filter = new stdClass();
        $filter->periodo    = $lista->periodo; 
        $data['selperiodo'] = form_dropdown('periodo',$this->Periodo_model->seleccionar('0',$filter),$lista->periodo,"id='periodo' class='comboGrande'");                             
        $data['oculto']   = form_hidden(array('accion'=>$accion));
        $this->load->view('leccion/leccion_nuevo',$data);
    }
     
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "LECCIONC_Nombre"      => $this->input->post('nombre'),
                        "LECCIONC_Descripcion" => $this->input->post('descripcion'),
                        "SECCIONP_Codigo"      => $this->input->post('seccion'),
                        "LECCIONC_Video"       => $this->input->post('video'),
                        "LECCIONC_Orden"       => $this->input->post('orden'),
                        "CURSOP_Codigo"        => $this->input->post('curso'),
                        "PERIODP_Codigo"       => $this->input->post('periodo'),
                       );
        if($accion == "n"){
            $codigo = $this->Leccion_model->insertar($data);            
        }
        elseif($accion == "e"){
            $this->Leccion_model->modificar($codigo,$data);
        }
    }

    public function obtener(){
        $filter = (Object)$_REQUEST;
        $resultado  = $this->Leccion_model->listar($filter);
        echo json_encode($resultado);
    }       
    
    public function eliminar()
    {
        $resultado = true;        
        $codigo = $this->input->post('codigo');
        $this->Leccion_model->eliminar($codigo);
        echo json_encode($resultado);
    }
    public function ver($codigo)
    {
        $datos_fabricante       = $this->fabricante_model->obtener($codigo);
        $data['nombre_fabricante']= $datos_fabricante[0]->FABRIC_Descripcion;
        $data['fabricante']    = $datos_fabricante[0]->FABRIP_Codigo;
        $data['titulo']        = "VER FABRICANTE";
        $data['oculto']        = form_hidden(array('base_url'=>base_url()));
        $this->load->view('almacen/fabricante_ver',$data);
    }

    public function buscar($j=0)
    {
        $nombre_fabricante = $this->input->post('nombre_fabricante');
        $filter = new stdClass();
        $filter->FABRIC_Descripcion = $nombre_fabricante;
        $data['registros']      = count($this->aula_model->buscar($filter));
        $conf['base_url']       = site_url('maestros/almacen/buscar/');
        $conf['total_rows']     = $data['registros'];
        $conf['per_page']       = 10;
        $conf['num_links']      = 3;
        $conf['first_link']     = "&lt;&lt;";
        $conf['last_link']      = "&gt;&gt;";
        $offset                 = (int)$this->uri->segment(4);
        $listado                = $this->aula_model->buscar($filter,$conf['per_page'],$offset);
        $item                   = $j+1;
        $lista                  = array();
        if(count($listado)>0){
            foreach($listado as $indice=>$valor){
                $codigo       = $valor->FABRIP_Codigo;
                $editar       = "<a href='#' onclick='editar_fabricante(".$codigo.")' target='_parent'><img src='".base_url()."images/modificar.png' width='16' height='16' border='0' title='Modificar'></a>";
                $ver          = "<a href='#' onclick='ver_fabricante(".$codigo.")' target='_parent'><img src='".base_url()."images/ver.png' width='16' height='16' border='0' title='Modificar'></a>";
                $eliminar     = "<a href='#' onclick='eliminar_fabricante(".$codigo.")' target='_parent'><img src='".base_url()."images/eliminar.png' width='16' height='16' border='0' title='Modificar'></a>";
                $lista[]      = array($item++,$valor->FABRIC_Descripcion,$valor->FABRIC_CodigoUsuario,$editar,$ver,$eliminar);
            }
        }
        $data['titulo_tabla']    = "RESULTADO DE BUSQUEDA de FABRICANTES";
        $data['titulo_busqueda'] = "BUSCAR FABRICANTE";
        $data['nombre_fabricante']  = form_input(array( 'name'  => 'nombre_fabricante','id' => 'nombre_fabricante','value' => $nombre_fabricante,'maxlength' => '100','class' => 'cajaMedia'));
        $data['form_open']       = form_open(base_url().'almacen/fabricante/buscar',array("name"=>"form_busquedaFabricante","id"=>"form_busquedaFabricante"));
        $data['form_close']      = form_close();
        $data['lista']           = $lista;
        $data['oculto']          = form_hidden(array('base_url'=>base_url()));
        $this->pagination->initialize($conf);
        $data['paginacion'] = $this->pagination->create_links();
        $this->load->view('maestros/aula_index',$data);
    }
}
?>