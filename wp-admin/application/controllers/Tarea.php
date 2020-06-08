<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarea extends CI_Controller {
    public function __construct(){
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model('Curso_model');   
        $this->load->model('Seccion_model');           
        $this->load->model('Leccion_model');        
        $this->load->model('Tarea_model');
        $this->load->model('Tipotarea_model'); 
        $this->load->model('Matricula_model'); 
        $this->load->model('Calificacion_model'); 
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
    }

    public function index()
    {
        $this->load->view('seguridad/inicio');	
    }

    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu');	
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);             
        $filter     = new stdClass();        
        $filter->order_by = array("g.CURSOC_Nombre"=>"asc","h.PERIODC_DESCRIPCION"=>"desc","c.TIPOTAREAP_Codigo"=>"asc","c.TAREAC_Nombre"=>"asc","c.TAREAC_Nombre"=>"desc");
        $filter_not = new stdClass(); 
        $registros = count($this->Tarea_model->listar($filter,$filter_not));
        $tareas   = $this->Tarea_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($tareas)>0){
            foreach($tareas as $indice => $value){
                $lista[$indice]           = new stdClass();
                $lista[$indice]->codigo   = $value->TAREAP_Codigo;
                $lista[$indice]->fecha    = date_sql($value->TAREAC_Fecha);
                $lista[$indice]->numero   = $value->TAREAC_Numero;
                $lista[$indice]->nombre   = $value->TAREAC_Nombre;
                $lista[$indice]->tipo     = $value->TIPOTAREAC_Nombre;
                $lista[$indice]->periodo  = $value->PERIODC_DESCRIPCION;
                $lista[$indice]->curso    = $value->CURSOC_Nombre;
                $lista[$indice]->leccion  = $value->LECCIONC_Nombre;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."tarea/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']        = $lista;
        $data['menu']         = $menu;          
        $data['titulo']       = "Tareas asignadas";
        $data['header']       = get_header();
        $data['j']            = $j;
        $data['registros']    = $registros;
        $data['paginacion']   = $this->pagination->create_links();
        $this->load->view("tarea/tarea_index",$data);
    }

    public function editar($accion,$codigo=""){
        $lista   = new stdClass();
        if($accion == "e"){
            $filter             = new stdClass();
            $filter->tarea      = $codigo;
            $tarea              = $this->Tarea_model->obtener($filter);   
            $lista->fecha       = date_sql($tarea->TAREAC_Fecha);  
            $lista->tarea       = $tarea->TAREAP_Codigo;
            $lista->tipotarea   = $tarea->TIPOTAREAP_Codigo;
            $lista->nombre      = $tarea->TAREAC_Nombre;
            $lista->descripcion = $tarea->TAREAC_Nombre;
            $lista->curso       = $tarea->CURSOP_Codigo;       
            $lista->leccion     = $tarea->LECCIONP_Codigo;
        }
        elseif($accion == "n"){ 
            $lista->fecha       = date("d/m/Y",time());
            $lista->tarea       = "";
            $lista->tipotarea   = 0;
            $lista->nombre      = "";
            $lista->descripcion = "";
            $lista->curso       = 0;
            $lista->leccion     = 0;
        } 
        $arrEstado             = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
        $data['titulo']        = $accion=="e"?"Editar Tarea":"Nueva Tarea"; 
        $data['form_open']     = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));     
        $data['form_close']    = form_close();         
        $data['lista']	       = $lista;   
        $data['accion']	       = $accion;   
        $filter = new stdClass();
        $filter->order_by = array("c.CURSOC_Nombre"=>"asc");
        $data['selcurso']      = form_dropdown('curso',$this->Curso_model->seleccionar('0',$filter),$lista->curso,"id='curso' class='comboGrande'");         
        $data['selseccion']    = form_dropdown('seccion',array(),0,"id='seccion' class='comboGrande'");         
        $data['selleccion']    = form_dropdown('leccion',$this->Leccion_model->seleccionar('0',new stdClass()),$lista->leccion,"id='leccion' class='comboGrande'"); 
        $data['seltipotarea']  = form_dropdown('tipotarea',$this->Tipotarea_model->seleccionar('0',new stdClass()),$lista->tipotarea,"id='tipotarea' class='comboGrande'"); 
        $data['oculto']       = form_hidden(array("accion"=>$accion,"codigo"=>$codigo));
        $this->load->view("tarea/tarea_nuevo",$data);
    }

    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "TIPOTAREAP_Codigo"    => $this->input->post('tipotarea'),
                        "LECCIONP_Codigo"      => $this->input->post('leccion'),
                        "TAREAC_Nombre"        => $this->input->post('nombre'),            
                        "TAREAC_Instrucciones" => $this->input->post('instrucciones'),
			"TAREAC_Fecha"         => date_sql_ret($this->input->post('fecha')),
                       );      
        if($accion == "n"){
            $resultado  = $codigo = $this->Tarea_model->insertar($data);
            //Creamos una calificacion
            $filter = new stdClass();
            $filter->curso = $this->input->post('curso');
            $alumnos = $this->Matricula_model->listar($filter);
            foreach($alumnos as $value){
                $data = array(
                    "TAREAP_Codigo"=>$codigo,
                    "MATRICP_Codigo"=>$value->MATRICP_Codigo,
                    "CALIFICAC_Puntaje"=>""
                );              
                $this->Calificacion_model->insertar($data); 
            }
        }
        elseif($accion == "e"){
            $resultado = $this->Tarea_model->modificar($codigo,$data);                                
        }  
        echo json_encode($resultado);
    }

    public function obtener(){
        $filter = (Object)$_REQUEST;
        $resultado = $this->Tarea_model->obtener($filter);
        echo json_encode($resultado);
    }
    
    public function eliminar(){
        $resultado = false;        
        $codigo = $this->input->post('codigo');
        //Elimino calificaciones
        $data = array("TAREAP_Codigo"=>$codigo);
        $this->Calificacion_model->eliminar($data);
        //Elimino la tarea
        $data = array("TAREAP_Codigo"=>$codigo);
        $this->Tarea_model->eliminar($data);
        $resultado = true;
        echo json_encode($resultado);
    }
}