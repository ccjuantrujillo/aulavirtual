<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/Persona.php';

class Usuario extends Persona{
    var $configuracion;     
      
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");          
        $this->load->model('Usuario_model');          
        $this->load->model('Usuarioempresa_model');  
        $this->load->model('Rol_model');     
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
        $registros = count($this->Usuario_model->listar($filter));
        $usuarios  = $this->Usuario_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($usuarios)>0){
            foreach($usuarios as $indice => $value){
                $lista[$indice]           = new stdClass();
                $lista[$indice]->codigo   = $value->USUAP_Codigo;
                $lista[$indice]->login    = $value->USUAC_usuario;
                $lista[$indice]->nombres  = $value->PERSC_Nombre;
                $lista[$indice]->paterno  = $value->PERSC_ApellidoPaterno;
                $lista[$indice]->materno  = $value->PERSC_ApellidoMaterno;                
                $lista[$indice]->rol      = $value->ROL_Descripcion;
                $lista[$indice]->estado   = $value->USUAC_FlagEstado;
                $lista[$indice]->fechareg = $value->USUAC_FechaRegistro;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."seguridad/usuario/listar";
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
            $usuario            = $this->Usuario_model->obtener($filter);
            $lista->login       = $usuario->USUAC_usuario;
            $lista->clave       = $usuario->USUAC_Password;
            $lista->nombres     = $usuario->PERSC_Nombre;
            $lista->paterno     = $usuario->PERSC_ApellidoPaterno;
            $lista->materno     = $usuario->PERSC_ApellidoMaterno;
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
        $data['selrol']     = form_dropdown('rol',$this->Rol_model->seleccionar("0"),$lista->rol,"id='rol' class='comboMedio'");
        $filter             = new stdClass();
        $filter->order_by   = array("p.PROD_Nombre"=>"asc");
        $data['oculto']     = form_hidden(array('accion'=>$accion,'codigo'=>$codigo,'codigo_padre'=>''));
        $this->load->view('usuario/usuario_nuevo',$data);
    }

    public function grabar(){
        $accion    = $this->input->get_post('accion');
        $codigo    = $this->input->get_post('codigo');
        $clave     = trim($this->input->post('clave'));
        $rol       = trim($this->input->post('rol'));
        $resultado = true;	
        $data    = array(
                        "USUAC_usuario"    => trim($this->input->post('login')),
                        "USUAC_Password"   => $clave!=""?md5($clave):"",
                        "USUAC_FlagEstado" => $this->input->post('estado')
                       ); 
        if($accion == "n"){
            //Datos de usuario
            $data["PERSP_Codigo"] = $this->input->get_post('codigo_padre');
            $usuario = $this->Usuario_model->insertar($data);            

            //Datos de empresa
            $dataEmp = array(
                            "USUAP_Codigo" => $usuario,
                            "ROL_Codigo"   => $rol,
                            "CARGP_Codigo" => 1,
            );
            $this->Usuarioempresa_model->insert($dataEmp);                        
        }
        elseif($accion == "e"){
            $this->Usuario_model->modificar($codigo,$data);
        }
        $mensaje = "Se grabo exitosamente";  
        echo json_encode(array($resultado,$mensaje));
    }

    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $resultado   = true;
        $this->Usuario_model->eliminar($codigo);    
        echo json_encode($resultado);
    }
}