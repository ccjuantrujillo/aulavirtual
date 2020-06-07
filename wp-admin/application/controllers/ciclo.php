<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciclo extends CI_Controller
{
    private $configuracion;
    private $codigo;

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");          
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
        $filter->order_by    = array("c.CICLOC_DESCRIPCION"=>"asc");
        $registros = count($this->Ciclo_model->listar($filter,$filter_not));
        $personas  = $this->Ciclo_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($personas)>0){
            foreach($personas as $indice => $value){
                $lista[$indice]         = new stdClass();
                $lista[$indice]->codigo = $value->CICLOP_Codigo;
                $lista[$indice]->descripcion = $value->CICLOC_DESCRIPCION;
                $lista[$indice]->fecha_inicio = date_sql(substr($value->CICLOC_FECHA_INICIO,0,10));
                $lista[$indice]->fecha_fin    = date_sql(substr($value->CICLOC_FECHA_FIN,0,10));
                $lista[$indice]->estado       = $value->CICLOC_FlagEstado;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."maestros/persona/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['menu']            = $menu;
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("ciclo/ciclo_index",$data);
    }

     public function editar($accion,$codigo=""){
         $lista = new stdClass();
         if($accion == "e"){
             $filter             = new stdClass();
             $filter->ciclo      = $codigo;
             $ciclos             = $this->Ciclo_model->obtener($filter);
             $lista->finicio     = date_sql(substr($ciclos->CICLOC_FECHA_INICIO,0,10));
             $lista->ffin        = date_sql(substr($ciclos->CICLOC_FECHA_FIN,0,10));
             $lista->descripcion = $ciclos->CICLOC_DESCRIPCION;
             $lista->codigo      = $ciclos->CICLOP_Codigo;
             $lista->estado      = $ciclos->CICLOC_FlagEstado;
         }
         elseif($accion == "n"){
             $lista->finicio     = "";
             $lista->ffin        = "";
             $lista->descripcion = "";
             $lista->codigo      = "";
             $lista->estado      = 1;
         }
         $arrEstado            = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
         $data['titulo']       = $accion=="e"?"Editar Ciclo":"Crear Ciclo";
         $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close']   = form_close();
         $data['lista']	       = $lista;
         $data['selestado']  = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
         $data['oculto']       = form_hidden(array("accion"=>$accion,"codigo"=>$lista->codigo));
         $this->load->view("ciclo/ciclo_nuevo",$data);
    }
     
    public function grabar(){
        $accion      = $this->input->get_post('accion');
        $codigo      = $this->input->get_post('codigo');
        $data   = array(
                        "CICLOC_DESCRIPCION"  => strtoupper($this->input->post('descripcion')),
                        "CICLOC_FECHA_INICIO" => date_sql_ret($this->input->post('finicio')),
                        "CICLOC_FECHA_FIN"    => date_sql_ret($this->input->post('ffin')),
                        "CICLOC_FlagEstado"   => $this->input->post('estado')
                       );
        if($accion == "n"){
            $codigo = $this->Ciclo_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->Ciclo_model->modificar($codigo,$data);
        }
    }
    
    public function eliminar()
    {
        $codigo  = $this->input->post('codigo');
        $this->Ciclo_model->eliminar($codigo);
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
        $this->load->view('ciclo/aula_index',$data);
    }
    
    public function seleccionar(){
        $filter = (Object)$_REQUEST;
        $data = array('ciclo'=>$filter->ciclo);
        $this->session->set_userdata($data);
        $resultado = true;
        echo json_encode($resultado);
    }
}
?>