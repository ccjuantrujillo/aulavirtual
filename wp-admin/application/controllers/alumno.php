<?php header("Content-type: text/html; charset=utf-8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/Persona.php';

class Alumno extends Persona
{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");   
        $this->load->model('Alumno_model');
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
        $filter_not = new stdClass();
        $filter->status = 5;
        $filter->order_by    = array("PERSC_ApellidoPaterno"=>"asc","PERSC_ApellidoMaterno"=>"asc","PERSC_Nombre"=>"asc");
        $registros = count($this->Alumno_model->listar($filter,$filter_not));
        $clientes  = $this->Alumno_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($clientes)>0){
            foreach($clientes as $indice => $value){
                $arrFecha = explode(" ",$value->ALUMC_FechaRegistro);
                $lista[$indice]            = new stdClass();
                $lista[$indice]->nombres   = $value->PERSC_Nombre;
                $lista[$indice]->paterno   = $value->PERSC_ApellidoPaterno;
                $lista[$indice]->materno   = $value->PERSC_ApellidoMaterno;
                $lista[$indice]->email     = $value->PERSC_Email;
                $lista[$indice]->emailinst = $value->PERSC_EmailInstitucional;
                $lista[$indice]->telefono  = $value->PERSC_Telefono;
                $lista[$indice]->codigo    = $value->ALUMP_Codigo;
                $lista[$indice]->identificador = $value->ALUMC_Identificador;
                $lista[$indice]->estado    = $value->ALUMC_FlagEstado;
                $lista[$indice]->usuario   = $value->ALUMC_Usuario;
                $lista[$indice]->fechareg  = $arrFecha[0];
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."alumno/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['menu']            = $menu;
        $data['header']          = get_header();
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("alumno/alumno_index",$data);
    }

    public function editar($accion,$codigo=""){
         $lista = new stdClass();
         if($accion == "e"){
             $filter              = new stdClass();
             $filter->alumno      = $codigo;
             $alumnos             = $this->Alumno_model->obtener($filter);
             $lista->dni          = $alumnos->PERSC_NumeroDocIdentidad;
             $lista->identificador = $alumnos->ALUMC_Identificador;
             $lista->direccion    = $alumnos->PERSC_Direccion;
             $lista->telefono     = $alumnos->PERSC_Telefono;
             $lista->email        = $alumnos->PERSC_Email;
             $lista->emailinst    = $alumnos->PERSC_EmailInstitucional;
             $lista->fnacimiento  = date_sql($alumnos->PERSC_FechaNacimiento);
             $lista->paterno      = $alumnos->PERSC_ApellidoPaterno;
             $lista->materno      = $alumnos->PERSC_ApellidoMaterno;
             $lista->nombres      = $alumnos->PERSC_Nombre;
             $lista->estado       = $alumnos->ALUMC_FlagEstado;
             $lista->codigo       = $alumnos->ALUMP_Codigo;
             $lista->codigo_padre = $alumnos->PERSP_Codigo;
             $lista->usuario      = $alumnos->ALUMC_Usuario;
             $lista->clave        = $alumnos->ALUMC_Password;             
         }
         elseif($accion == "n"){
             $lista->dni          = "";
             $lista->identificador = "";
             $lista->direccion    = "";
             $lista->telefono     = "";
             $lista->email        = "";
             $lista->emailinst    = "";
             $lista->fnacimiento  = "";
             $lista->paterno      = "";
             $lista->materno      = "";
             $lista->nombres      = "";
             $lista->estado       = 1;
             $lista->codigo       = "";
             $lista->codigo_padre = "";
             $lista->usuario      = "";
             $lista->clave        = "";
         }
         $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
         $data['titulo']     = $accion=="e"?"Editar Alumno":"Crear Alumno";
         $data['form_open']  = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close'] = form_close();
         $data['lista']	     = $lista;
         $data['selestado']  = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
         $data['txtusuario'] = form_input(["name"=>"usuario","id"=>"usuario","class"=>"cajaMedia"],$lista->usuario);
         $data['txtclave']   = form_password(["name"=>"clave","id"=>"clave","class"=>"cajaMedia"],$lista->clave);
         $data['oculto']     = form_hidden(array("accion"=>$accion,"codigo"=>$lista->codigo,"codigo_padre"=>$lista->codigo_padre,"tipodoc"=>1));
         $this->load->view("alumno/alumno_nuevo",$data);
     }

    public function grabar(){
        parent::grabar();
        $accion    = $this->input->get_post('accion');
        $codigo    = $this->input->get_post('codigo');
        $clave     = $this->input->get_post('clave');
        $resultado = true;
        $data      = array(
                        "ALUMC_Usuario"    => $this->input->post('usuario'),
                        "ALUMC_Password"   => $clave!=""?md5($clave):"",
                        "ALUMC_FlagEstado" => $this->input->post('estado'),
                        "ALUMC_Identificador" => $this->input->post('identificador'),
                        "user_id"          => 7
                       );
        if($accion == "n"){
            $data["PERSP_Codigo"] = $this->codigo;
            $this->Alumno_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->Alumno_model->modificar($codigo,$data);
        }
        echo json_encode($resultado);
    }

    public function eliminar(){
        $resultado = 0;
        $codigo  = $this->input->post('codigo');
        $alumno  = $this->Alumno_model->obtener($codigo);
        $this->codigo = $alumno->PERSP_Codigo;
        if(parent::eliminar()=="1"){
            $resultado = $this->Alumno_model->eliminar($codigo);  
        }
        echo json_encode($resultado);
    }
    
    public function buscar($j=0){
        $filter     = new stdClass();
        $filter_not = new stdClass();
        $filter->status = 5;
        $filter->order_by    = array("PERSC_ApellidoPaterno"=>"asc","PERSC_ApellidoMaterno"=>"asc","PERSC_Nombre"=>"asc");
        $registros = count($this->Alumno_model->listar($filter,$filter_not));
        $alumnos  = $this->Alumno_model->listar($filter,$filter_not);
        $item      = 1;
        $lista     = array();
        if(count($alumnos)>0){
            foreach($alumnos as $indice => $value){
                $lista[$indice]            = new stdClass();
                $lista[$indice]->nombres   = $value->PERSC_Nombre;
                $lista[$indice]->paterno   = $value->PERSC_ApellidoPaterno;
                $lista[$indice]->materno   = $value->PERSC_ApellidoMaterno;
                $lista[$indice]->email     = $value->PERSC_Email;
                $lista[$indice]->emailinst = $value->PERSC_EmailInstitucional;
                $lista[$indice]->telefono  = $value->PERSC_Telefono;
                $lista[$indice]->codigo    = $value->ALUMP_Codigo;
                $lista[$indice]->identificador = $value->ALUMC_Identificador;
                $lista[$indice]->estado    = $value->ALUMC_FlagEstado;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."alumno/buscar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("alumno/alumno_buscar",$data);
    }

    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $clientes  = $this->Alumno_model->obtener($filter);
        $resultado = json_encode($clientes);
        echo $resultado;        
    }
}
?>