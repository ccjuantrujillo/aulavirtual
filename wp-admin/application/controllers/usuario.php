<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller{
    var $configuracion;       
    public function __construct(){
        parent::__construct();
        $this->load->model('usuario_model');          
        $this->load->model(seguridad.'rol_model');     
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
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
        $filter_not  = new stdClass();
        //$filter->order_by    = array("d.PERSC_ApellidoPaterno"=>"asc","d.PERSC_ApellidoMaterno"=>"asc","d.PERSC_Nombre"=>"asc");
        $registros = count($this->usuario_model->listar($filter));
        $usuarios  = $this->usuario_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($usuarios)>0){
            foreach($usuarios as $indice => $value){
                $lista[$indice]           = new stdClass();
                $lista[$indice]->codigo   = $value->USUAP_Codigo;
                $lista[$indice]->login    = $value->USUAC_usuario;
                $lista[$indice]->nombres  = $value->USUAC_Nombres;
                $lista[$indice]->paterno  = $value->USUAC_ApellidoPaterno;
                $lista[$indice]->materno  = $value->USUAC_ApellidoMaterno;                
                $lista[$indice]->rol      = $value->ROL_Descripcion;
                $lista[$indice]->estado   = $value->USUAC_FlagEstado;
                $lista[$indice]->fechareg = $value->USUAC_FechaRegistro;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/seguridad/usuario/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']     = $lista;
        $data['titulo_tabla']    = "RELACIÓN DE USUARIOS";      
        $data['titulo_busqueda'] = "BUSCAR USUARIO";
         $data['menu']            = $menu;
        $data['header']          = get_header();         
        $data['registros']       = $registros;
        $data['form_open']       = form_open('',array("name"=>"form1","id"=>"form1","onsubmit"=>"return valida_guiain();"));     
        $data['form_close']      = form_close();
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("usuario/usuario_index",$data);        
    }

    public function editar($accion,$codigo=""){
        $lista = new stdClass();
        if($accion == "e"){
            $filter             = new stdClass();
            $filter->usuario    = $codigo;
            $usuario            = $this->usuario_model->obtener($filter);
            $lista->login       = $usuario->USUAC_usuario;
            $lista->clave       = $usuario->USUAC_Password;
            $lista->nombres     = $usuario->USUAC_Nombres;
            $lista->paterno     = $usuario->USUAC_ApellidoPaterno;
            $lista->materno     = $usuario->USUAC_ApellidoMaterno;
            $lista->estado      = $usuario->USUAC_FlagEstado;
            $lista->usuario     = $usuario->USUAP_Codigo;
            $lista->rol         = $usuario->ROL_Codigo;
        }    
        elseif($accion == "n"){
            $lista->login     = "";
            $lista->clave     = ""; 
            $lista->nombres   = ""; 
            $lista->paterno   = ""; 
            $lista->materno   = ""; 
            $lista->estado    = 1;
            $lista->usuario   = "";
            $lista->rol       = "";
        }
        $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
        $data['titulo']     = "EDITAR USUARIO";        
        $data['form_open']  = form_open('',array("name"=>"form1","id"=>"form1"));
        $data['form_close'] = form_close();
        $data['lista']	    = $lista;
        $data['accion']	    = $accion;  
        $data['onload']     = "onload=\"$('#paterno').focus();\"";   
        $data['selestado']  = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
        $data['selrol']     = form_dropdown('rol',$this->rol_model->seleccionar("0"),$lista->rol,"id='rol' class='comboMedio'");
        $filter             = new stdClass();
        $filter->order_by   = array("p.PROD_Nombre"=>"asc");
        $data['oculto']     = form_hidden(array('accion'=>$accion,'codigo'=>$codigo));
        $this->load->view('usuario/usuario_nuevo',$data);
    }

    public function grabar(){
        $accion  = $this->input->get_post('accion');
        $codigo  = $this->input->get_post('codigo');
        $clave   = trim($this->input->post('clave'));
        $data    = array(
                        "USUAC_Nombres"         => trim($this->input->post('nombres')),
                        "USUAC_ApellidoPaterno" => trim($this->input->post('paterno')),
                        "USUAC_ApellidoMaterno" => trim($this->input->post('materno')),
                        "USUAC_usuario"    => trim($this->input->post('login')),
                        "USUAC_Password"    => $clave!=""?md5($clave):"",
                        "USUAC_FlagEstado" => $this->input->post('estado'),
                        "ROL_Codigo"       => $this->input->post('rol'),
                        
                       ); 
        if($accion == "n")
            $this->usuario_model->insertar($data);            
        elseif($accion == "e")
            $this->usuario_model->modificar($codigo,$data);
        $resultado = true;
        $mensaje = "Se grabo exitosamente";  
        echo json_encode(array($resultado,$mensaje));
    }

    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $resultado   = true;
        $this->usuario_model->eliminar($codigo);    
        echo json_encode($resultado);
    }

    public function ver($codigo){

    }

    public function buscar(){

    }
}