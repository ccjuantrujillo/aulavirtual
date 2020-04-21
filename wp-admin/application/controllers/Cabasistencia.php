<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cabasistencia extends CI_Controller
{
    public $configuracion;
    public $codigo;

    public function __construct()
    {
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model('Cabasistencia_model');
        $this->load->model('Asistencia_model');
        $this->load->model('Curso_model');
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
    }
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu');		
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);    
        $filter     = new stdClass();
        $filter->order_by = array("d.CURSOC_Nombre"=>"asc","c.CABASISTC_Fecha"=>"asc");
        $registros = count($this->Cabasistencia_model->listar($filter));
        $asistencias = $this->Cabasistencia_model->listar($filter,"",$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($asistencias)>0){
            foreach($asistencias as $indice => $value){
                $lista[$indice]              = new stdClass();
                $lista[$indice]->codigo      = $value->CABASISTP_Codigo;
                $lista[$indice]->curso       = $value->CURSOC_Nombre;
                $lista[$indice]->fecha       = $value->CABASISTC_Fecha;              
                $lista[$indice]->descripcion = $value->CABASISTC_Descripcion;     
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/cabasistencia/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        $data['lista']           = $lista;
        $data['titulo']          = "Maestro de Asistencia";
        $data['menu']            = $menu;
        $data['header']          = get_header();
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("cabasistencia/cabasistencia_index",$data);
    }

     public function editar($accion,$codigo=""){   
         $lista = new stdClass();
         if($accion == "e"){
             $filter                = new stdClass();
             $filter->cabasistencia = $codigo;
             $cabecera              = $this->Cabasistencia_model->obtener($filter);
             $lista->fecha          = date_sql($cabecera[0]->CABASISTC_Fecha);
             $lista->curso          = $cabecera[0]->CURSOP_Codigo;
             $lista->codigo         = $cabecera[0]->CABASISTP_Codigo;
             $lista->descripcion    = $cabecera[0]->CABASISTC_Descripcion;
         }
         elseif($accion == "n"){
             $lista->fecha       = date("d/m/Y",time());
             $lista->curso       = "";
             $lista->codigo      = "";
             $lista->descripcion = "";
         }
         $data['titulo']       = $accion=="e"?"Editar Asistencia":"Crear Asistencia";
         $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['descripcion']  = form_input(array( 'name'  => 'descripcion','id' => 'descripcion','value' => $lista->descripcion,'maxlength' => '100','class' => 'cajaGrande'));
         $data['form_close']   = form_close();
         $data['lista']	       = $lista;
         $data['selcurso']     = form_dropdown('curso',$this->Curso_model->seleccionar('0'),$lista->curso,"id='curso' class='comboMedio'");                
         $data['oculto']       = form_hidden(array("accion"=>$accion,"codigo"=>$codigo));
         $this->load->view("cabasistencia/cabasistencia_nuevo",$data);
    }
     
    public function grabar(){
        $accion      = $this->input->get_post('accion');
        $codigo      = $this->input->get_post('codigo');
        $data   = array(
                        "CURSOP_Codigo"    => $this->input->post('curso'),
                        "CABASISTC_Fecha"  => date_sql_ret($this->input->post('fecha')),
                        "CABASISTC_Descripcion"  => $this->input->post('descripcion')
                       );
        if($accion == "n"){
            $this->codigo = $this->Cabasistencia_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->Cabasistencia_model->modificar($codigo,$data);
        }
    }
    
    public function eliminar()
    {
        $resultado = true;
        $codigo  = $this->input->post('codigo');
        $this->Cabasistencia_model->eliminar($codigo);
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
        $data['form_open']       = form_open(base_url().'index.php/almacen/fabricante/buscar',array("name"=>"form_busquedaFabricante","id"=>"form_busquedaFabricante"));
        $data['form_close']      = form_close();
        $data['lista']           = $lista;
        $data['oculto']          = form_hidden(array('base_url'=>base_url()));
        $this->pagination->initialize($conf);
        $data['paginacion'] = $this->pagination->create_links();
        $this->load->view('maestros/aula_index',$data);
    }
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $apertura = $this->Cabasistencia_model->obtener($filter);
        $resultado = json_encode($apertura);       
        echo $resultado; 
    }  
}
?>