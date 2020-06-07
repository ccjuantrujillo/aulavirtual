<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cabasistencia extends CI_Controller
{
    public $configuracion;
    public $codigo;

    public function __construct(){
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        $this->load->model('Cabasistencia_model');
        $this->load->model('Asistencia_model');
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
        $filter->order_by = array("f.PERSC_ApellidoPaterno"=>"asc","f.PERSC_ApellidoMaterno"=>"asc","f.PERSC_Nombre"=>"asc","c.CABASISTC_Fecha"=>"desc");
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
                $lista[$indice]->profesor    = $value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno; 
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."cabasistencia/listar";
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
         $filter = new stdClass();
         $filter->order_by = array("c.CURSOC_Nombre"=>"asc");
         $data['selcurso']     = form_dropdown('curso',$this->Curso_model->seleccionar('0',$filter),$lista->curso,"id='curso' class='comboMedio'");                
         $data['oculto']       = form_hidden(array("accion"=>$accion,"codigo"=>$codigo));
         $this->load->view("cabasistencia/cabasistencia_nuevo",$data);
    }
     
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $curso  = $this->input->get_post('curso');
        $fecha  = date_sql_ret($this->input->post('fecha'));
        $data   = array(
                        "CURSOP_Codigo"    => $curso,
                        "CABASISTC_Fecha"  => $fecha,
                        "CABASISTC_Descripcion"  => $this->input->post('descripcion')
                       );
        if($accion == "n"){
            $this->codigo = $this->Cabasistencia_model->insertar($data);
            $resultado = $this->codigo;
            //Creamos el detalle con marcacion falta
            $filter = new stdClass();
            $filter->curso = $curso;
            $alumnos = $this->Matricula_model->listar($filter);
            foreach($alumnos as $value){
                $data2 = array(
                    "CABASISTP_Codigo" => $this->codigo,
                    "MATRICP_Codigo"   => $value->MATRICP_Codigo,
                    "ASISTC_Marcacion" => NULL,//0:Falto,1:Asistio,2:Tardanza
                    "ASISTC_Fecha"     => $fecha
                );
                $this->Asistencia_model->insertar($data2);
            }
        }
        elseif($accion == "e"){
            $resultado = $this->Cabasistencia_model->modificar($codigo,$data);
        }
        return $resultado;
    }
    
    public function eliminar()
    {
        $resultado = true;
        $codigo  = $this->input->post('codigo');
        //Eliminamos asistencias
        $this->Asistencia_model->eliminarCab($codigo);        
        //Eliminamos cabasistencia
        $this->Cabasistencia_model->eliminar($codigo);
        echo json_encode($resultado);
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