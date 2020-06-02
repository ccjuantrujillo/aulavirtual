<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matricula extends CI_Controller {
    
    public function __construct(){
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");            
        $this->load->model('Matricula_model');      
        $this->load->model('Curso_model');   
        $this->load->model('Aula_model');  
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
        $filter->order_by = array("e.CURSOC_Nombre"=>"asc","g.PERSC_ApellidoPaterno"=>"asc","g.PERSC_ApellidoMaterno"=>"asc","g.PERSC_Nombre"=>"asc");
        $filter_not = new stdClass(); 
        $registros = count($this->Matricula_model->listar($filter));
        $ordenes   = $this->Matricula_model->listar($filter,"",$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($ordenes)>0){
            foreach($ordenes as $indice => $value){
                $lista[$indice]           = new stdClass();
                $lista[$indice]->codigo   = $value->MATRICP_Codigo;
                $lista[$indice]->nombres  = $value->PERSC_Nombre;
                $lista[$indice]->paterno  = $value->PERSC_ApellidoPaterno;
                $lista[$indice]->materno  = $value->PERSC_ApellidoMaterno;
                $lista[$indice]->curso    = $value->CURSOC_Nombre;
                $lista[$indice]->aula     = $value->AULAC_Descripcion;
                $lista[$indice]->fechareg = $value->fechareg;
                $lista[$indice]->fecha    = $value->MATRICC_Fecha;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/matricula/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']        = $lista;
        $data['menu']         = $menu;
        $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));     
        $data['form_close']   = form_close();         
        $data['j']            = $j;
        $data['registros']    = $registros;
        $data['paginacion']   = $this->pagination->create_links();
        $this->load->view("matricula/matricula_index",$data);
    }

    public function editar($accion,$codigo=""){
        $lista = new stdClass();
        $lista->accion = $accion;
        $lista->codigo = $codigo;
        if($accion == "e"){
            $filter            = new stdClass();
            $filter->matricula = $codigo;
            $matricula         = $this->Matricula_model->obtener($filter);
            $lista->paterno    = $matricula->PERSC_ApellidoPaterno;  
            $lista->materno    = $matricula->PERSC_ApellidoMaterno;  
            $lista->nombres    = $matricula->PERSC_Nombre;  
            $lista->curso      = $matricula->CURSOP_Codigo; 
            $lista->fecha      = date_sql($matricula->MATRICC_Fecha);  
            $lista->alumno     = $matricula->ALUMP_Codigo; 
            $lista->matricula  = $matricula->MATRICP_Codigo;
            $lista->aula       = $matricula->AULAP_Codigo;
            $lista->observacion= $matricula->MATRICC_Observacion;
        }
        elseif($accion == "n"){ 
            $lista->paterno    = "";  
            $lista->materno    = ""; 
            $lista->nombres    = "";  
            $lista->curso      = $this->input->get_post('curso'); 
            $lista->fecha      = date("d/m/Y",time());
            $lista->alumno     = "";
            $lista->matricula  = "";
            $lista->aula       = "";
            $lista->observacion= "";
        } 
        $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
        $lista->cantidad   = 0;
        $lista->intentos   = 0;
        $data['titulo']     = $accion=="e"?"Editar Matricula":"Nueva Matricula"; 
        $data['form_open']  = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));     
        $data['form_close'] = form_close();         
        $data['lista']	    = $lista;  
        $data['accion']	    = $accion;  
        $data['txtobservacion'] = form_textarea('observacion', '');
        $filter = new stdClass();
        $filter->order_by = array("e.CICLOC_DESCRIPCION"=>"asc","c.CURSOC_Nombre"=>"asc");
        $data['selcurso']   = form_dropdown('curso',$this->Curso_model->seleccionar('0',$filter),$lista->curso,"id='curso' class='comboMedio'");          
        $data['selaula']  = form_dropdown('aula',$this->Aula_model->seleccionar('0'),$lista->aula,"id='aula' class='comboMedio'");
        $data['oculto']     = form_hidden(array("accion"=>$accion,"codigo"=>$codigo));
	$this->load->view("matricula/matricula_nuevo",$data);
    }

    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "MATRICC_Fecha"       => $this->input->post('fecha'),
                        "CURSOP_Codigo"       => $this->input->post('curso'),
                        "AULAP_Codigo"        => $this->input->post('aula'),
                        "ALUMP_Codigo"        => $this->input->post('alumno'),
                        "MATRICC_Observacion" => $this->input->post('observacion')
                       );
        $resultado = false;
        if($accion == "n"){
            $resultado = true;
            $this->Matricula_model->insertar($data);                      
        }
        elseif($accion == "e"){ 
            $resultado = true;
            $this->Matricula_model->modificar($codigo,$data);                                
        }                                     
        echo json_encode($resultado);
    }
	
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $resultado = true;
        $this->Matricula_model->eliminar($codigo);
        echo json_encode($resultado);
    }

    public function obtener(){
        $filter = (object)$_REQUEST;
        $filter->order_by = array("g.PERSC_ApellidoPaterno"=>"asc","g.PERSC_ApellidoMaterno"=>"asc");        
        $matriculas = $this->Matricula_model->obtener($filter);
        echo json_encode($matriculas);
    }    
}