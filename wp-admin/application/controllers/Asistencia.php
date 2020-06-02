<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Asistencia extends CI_Controller
{
    public $configuracion;
    public $codigo;

    public function __construct()
    {
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model('Asistencia_model');
        $this->load->model('Cabasistencia_model');
        $this->load->model('Matricula_model');
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
        $filter->order_by = array("h.CABASISTC_Fecha"=>"desc","g.CURSOC_Nombre"=>"asc","f.PERSC_ApellidoPaterno"=>"asc");
        $registros = count($this->Asistencia_model->listar($filter));
        $asistencias = $this->Asistencia_model->listar($filter,"",$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($asistencias)>0){
            foreach($asistencias as $indice => $value){
                $lista[$indice]           = new stdClass();
                $lista[$indice]->codigo   = $value->ASISTP_Codigo;
                $lista[$indice]->curso    = $value->CURSOC_Nombre;
                $lista[$indice]->cabasistencia    = $value->CABASISTC_Fecha;              
                $lista[$indice]->marcacion = $value->ASISTC_Marcacion;  
                $lista[$indice]->alumno    = $value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno.", ".$value->PERSC_Nombre;  
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/asistencia/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        $data['lista']           = $lista;
        $data['titulo']          = "Asistencia de alumnos";
        $data['menu']            = $menu;
        $data['header']          = get_header();
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['arrMarca']        = array(""=>"--","0"=>"Falto","1"=>"Asistio","2"=>"Tardanza");
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("asistencia/asistencia_index",$data);
    }

     public function editar($accion,$codigo=""){   
         $lista = new stdClass();
         if($accion == "e"){
             $filter               = new stdClass();
             $filter->asistencia   = $codigo;
             $asistencia           = $this->Asistencia_model->obtener($filter);
             $lista->curso         = $asistencia->CURSOP_Codigo;
             $lista->codigo        = $asistencia->ASISTP_Codigo;
             $lista->matricula     = $asistencia->MATRICP_Codigo;
             $lista->marcacion     = $asistencia->ASISTC_Marcacion;
             $lista->cabasistencia = $asistencia->CABASISTP_Codigo;
         }
         elseif($accion == "n"){
             $lista->curso      = "";
             $lista->codigo     = "";
             $lista->matricula  = "";
             $lista->marcacion  = 1;
             $lista->cabasistencia = "";
         }
         $arrMarcacion = array("0"=>"Falto","1"=>"Asistio","2"=>"Tardanza");
         $data['titulo']       = $accion=="e"?"Editar Asistencia":"Crear Asistencia";
         $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close']   = form_close();
         $data['lista']	       = $lista;
         $data['selcurso']     = form_dropdown('curso',$this->Curso_model->seleccionar('0'),$lista->curso,"id='curso' class='comboMedio'"); 
         $filter2 = new stdClass();
         $filter2->curso = $lista->curso ;
         $filter2->order_by = array("c.CABASISTC_Fecha"=>"asc");
         $data['selcabasistencia'] = form_dropdown('cabasistencia',$this->Cabasistencia_model->seleccionar($filter2,'0'),$lista->cabasistencia,"id='cabasistencia' class='comboMedio'");   
         $filter = new stdClass();
         $filter->curso = $lista->curso;
         $data['selmatricula'] = form_dropdown('matricula',$this->Matricula_model->seleccionar($filter,'0'),$lista->matricula,"id='matricula' class='comboMedio'"); 
         $data['selmarcacion'] = form_dropdown('marcacion',$arrMarcacion,$lista->marcacion,"id='marcacion' class='comboMedio'");
         $data['oculto']       = form_hidden(array("accion"=>$accion,"codigo"=>$codigo));
         $this->load->view("asistencia/asistencia_nuevo",$data);
    }
     
    public function grabar(){
        $accion      = $this->input->get_post('accion');
        $codigo      = $this->input->get_post('codigo');
        $data   = array(
                        "MATRICP_Codigo"   => $this->input->post('matricula'),
                        "CABASISTP_Codigo" => $this->input->post('cabasistencia'),
                        "ASISTC_Marcacion" => $this->input->post('marcacion')
                       );
        if($accion == "n"){
            $this->codigo = $this->Asistencia_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->Asistencia_model->modificar($codigo,$data);
        }
    }
    
    public function eliminar()
    {
        $resultado = true;
        $codigo  = $this->input->post('codigo');
        $this->Asistencia_model->eliminar($codigo);
        echo json_encode($resultado);
    }
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $apertura = $this->Asistencia_model->obtener($filter);
        $resultado = json_encode($apertura);       
        echo $resultado; 
    }      
}
?>