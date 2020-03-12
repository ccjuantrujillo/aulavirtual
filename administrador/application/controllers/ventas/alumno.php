<?php header("Content-type: text/html; charset=utf-8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/maestros/persona.php';
class Alumno extends Persona
{
    public function __construct(){
        parent::__construct();
        $this->load->model(ventas.'matricula_model');
        $this->load->model(ventas.'alumno_model');
        $this->load->model(maestros.'ciclo_model');
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
        $filter->order_by    = array("ALUMC_ApellidoPaterno"=>"asc","ALUMC_ApellidoMaterno"=>"asc","ALUMC_Nombres"=>"asc");
        $registros = count($this->alumno_model->listar($filter,$filter_not));
        $clientes  = $this->alumno_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($clientes)>0){
            foreach($clientes as $indice => $value){
                $arrFecha = explode(" ",$value->ALUMC_FechaRegistro);
                $lista[$indice]            = new stdClass();
                $lista[$indice]->nombres   = $value->ALUMC_Nombres;
                $lista[$indice]->paterno   = $value->ALUMC_ApellidoPaterno;
                $lista[$indice]->materno   = $value->ALUMC_ApellidoMaterno;
                $lista[$indice]->email     = $value->ALUMC_Email;
                $lista[$indice]->codigo    = $value->ALUMP_Codigo;
                $lista[$indice]->estado    = $value->ALUMC_FlagEstado;
                $lista[$indice]->fechareg  = $arrFecha[0];
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/ventas/alumno/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['menu']            = $menu;
        $data['header']          = get_header();
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("ventas/alumno_index",$data);
    }

    public function editar($accion,$codigo=""){
         $lista = new stdClass();
         if($accion == "e"){
             $filter            = new stdClass();
             $filter->alumno     = $codigo;
             $alumnos            = $this->alumno_model->obtener($filter);
             $lista->dni         = $alumnos->PERSC_NumeroDocIdentidad;
             $lista->direccion   = $alumnos->PERSC_Direccion;
             $lista->telefono    = $alumnos->PERSC_Telefono;
             $lista->email       = $alumnos->PERSC_Email;
             $lista->fnacimiento = date_sql($alumnos->PERSC_FechaNacimiento);
             $lista->paterno     = $alumnos->PERSC_ApellidoPaterno;
             $lista->materno     = $alumnos->PERSC_ApellidoMaterno;
             $lista->nombres     = $alumnos->PERSC_Nombre;
             $lista->estado      = $alumnos->ALUMC_FlagEstado;
             $lista->codigo      = $alumnos->ALUMP_Codigo;
             $lista->codigo_padre = $alumnos->PERSP_Codigo;
             $lista->ciclo        = $alumnos->CICLOP_Codigo;
         }
         elseif($accion == "n"){
             $lista->dni         = "";
             $lista->direccion   = "";
             $lista->telefono    = "";
             $lista->email       = "";
             $lista->fnacimiento = "";
             $lista->paterno     = "";
             $lista->materno     = "";
             $lista->nombres     = "";
             $lista->estado      = 1;
             $lista->codigo      = "";
             $lista->codigo_padre = "";
             $lista->ciclo        = 0;
         }
         $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
         $data['titulo']     = $accion=="e"?"Editar Alumno":"Crear Alumno";
         $data['form_open']  = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close'] = form_close();
         $data['lista']	     = $lista;
         $data['selestado']  = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
         $data['selciclo']   = form_dropdown('ciclo',$this->ciclo_model->seleccionar("0"),$lista->ciclo,"id='ciclo' class='comboMedio'");
         $data['oculto']     = form_hidden(array("accion"=>$accion,"codigo"=>$lista->codigo,"codigo_padre"=>$lista->codigo_padre));
         $this->load->view("ventas/alumno_nuevo",$data);
     }

    public function grabar(){
        print_r($_REQUEST);
        $accion    = $this->input->get_post('accion');
        $codigo    = $this->input->get_post('codigo');
        $resultado = true;
        $data      = array(
                        "ALUMC_NumeroDoc" => $this->input->post('dni'),
                        "ALUMC_Nombres" => $this->input->post('nombres'),
                        "ALUMC_ApellidoPaterno" => $this->input->post('paterno'),
                        "ALUMC_ApellidoMaterno" => $this->input->post('materno'),
                        "ALUMC_Email" => $this->input->post('email'),
                        "ALUMC_Telefono" => $this->input->post('telefono'),
                        "ALUMC_Direccion" => $this->input->post('direccion'),
                        "ALUMC_FechaNac" => $this->input->post('fnacimiento'),
                        "ALUMC_FlagEstado" => $this->input->post('estado'),
                        "user_id"          => 7
                       );
        if($accion == "n"){
            $this->alumno_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->alumno_model->modificar($codigo,$data);
        }
        echo json_encode($resultado);
    }

    public function eliminar(){
        $resultado = true;
        $codigo    = $this->input->post('codigo');
        $this->alumno_model->eliminar($codigo);
        echo json_encode($resultado);
    }
    
    public function buscar($j=0){
        $filter     = new stdClass();
        $filter_not = new stdClass();
        $filter->status = 5;
        //$filter->order_by    = array("d.PERSC_ApellidoPaterno"=>"asc","d.PERSC_ApellidoMaterno"=>"asc","d.PERSC_Nombre"=>"asc");
        $registros = count($this->user_model->listar($filter,$filter_not));
        $alumnos  = $this->user_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($alumnos)>0){
            foreach($alumnos as $indice => $value){
                $arrFecha = explode(" ",$value->registration_date);
                $lista[$indice]             = new stdClass();
                $lista[$indice]->numero   = $value->ant_dni;
                $lista[$indice]->nombres  = $value->firstname;
                $lista[$indice]->paterno  = $value->lastname;
                $lista[$indice]->materno  = $value->lastname;
                $lista[$indice]->telefono = $value->phone;
                $lista[$indice]->movil    = "";
                $lista[$indice]->codigo   = $value->user_id;
                $lista[$indice]->estado   = $value->status;
                $lista[$indice]->fechareg = $arrFecha[0];
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/ventas/alumno/buscar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("ventas/alumno_buscar",$data);
    }

    public function obtener($codigo){
        $filter    = new stdClass();
        $filter->alumno = $codigo;
        $clientes  = $this->alumno_model->obtener($filter);
        $resultado = json_encode($clientes);
        echo $resultado;
    }
}
?>