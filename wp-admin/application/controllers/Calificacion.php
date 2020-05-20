<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calificacion extends CI_Controller{
    public function __construct(){
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");  
        $this->load->model('Calificacion_model');   
        $this->load->model('Matricula_model'); 
        $this->load->model('Curso_model'); 
        $this->load->model('Tarea_model');  
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
    }
    
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu'); 
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);           
        $filter     = new stdClass();
        $filter_not = new stdClass(); 
        $filter->order_by = array("j.CURSOC_Nombre"=>"asc","i.PERSC_ApellidoPaterno"=>"asc","i.PERSC_ApellidoMaterno"=>"asc","g.TAREAC_Nombre"=>"asc");
        $registros = count($this->Calificacion_model->listar($filter,$filter_not));
        $calificacioes = $this->Calificacion_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $lista     = array();
        if(count($calificacioes)>0){
            foreach($calificacioes as $indice => $value){
                $lista[$indice]            = new stdClass();
                $lista[$indice]->codigo    = $value->CALIFICAP_Codigo;
                $lista[$indice]->tarea     = $value->TAREAC_Nombre;
                $lista[$indice]->matricula = $value->MATRICP_Codigo;
                $lista[$indice]->puntaje   = $value->CALIFICAC_Puntaje;
                $lista[$indice]->situacion = $value->CALIFICAC_Situacion;
                $lista[$indice]->paterno   = $value->PERSC_ApellidoPaterno;
                $lista[$indice]->materno   = $value->PERSC_ApellidoMaterno;
                $lista[$indice]->nombres   = $value->PERSC_Nombre;
                $lista[$indice]->curso     = $value->CURSOC_Nombre;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/calificacion/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']        = $lista;
        $data['menu']         = $menu;
        $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona"));     
        $data['titulo']       = "Nueva Calificacion";
        $data['selcurso']     = form_dropdown('curso',$this->Curso_model->seleccionar('0'),0,"id='curso' class='comboGrande'");        
        $data['oculto']       = form_hidden(array("accion"=>"n"));
        $data['form_close']   = form_close();         
        $data['j']            = $j;
        $data['registros']    = $registros;
        $data['paginacion']   = $this->pagination->create_links();
        $this->load->view("calificacion/calificacion_index",$data);
    }
    
    public function editar(){
        $filter = (object)$_REQUEST;
        $resultado = $this->Calificacion_model->obtener($filter);
        echo json_encode($resultado);
    }
    
    public function grabar(){
        $filter = (object)$_REQUEST;
        $accion = $filter->accion;
        $codigo = $filter->codigo;
        $data = array(
            "TAREAP_Codigo"=>$filter->tarea,
            "MATRICP_Codigo"=>$filter->matricula,
            "CALIFICAC_Puntaje"=>$filter->puntaje
        );
        $resultado = false;
        if($accion=="n"){
            $resultado = $this->Calificacion_model->insertar($data);
        }
        elseif($accion=="e"){
            $resultado = $this->Calificacion_model->modificar($codigo,$data);
        }
        echo json_encode($resultado);
    }
    
    public function eliminar(){
        $filter = (object)$_REQUEST;
        $resultado = $this->Calificacion_model->eliminar($filter->calificacion);
        echo json_encode($resultado);
    }
}
