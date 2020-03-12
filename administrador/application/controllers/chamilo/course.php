<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course extends CI_Controller
{
    public $configuracion;
    public $codigo;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('chamilo/course_model');
        $this->load->model('seguridad/permiso_model');
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
    }
    public function listar($j=0){
        $filter           = new stdClass();
        $filter->rol      = $this->session->userdata('rolusu');		
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu       = get_menu($filter);  
        $filter     = new stdClass();
        $filter_not = new stdClass();
        $filter_not->persona = "0";
//        $filter->order_by    = array("p.PERSC_ApellidoPaterno"=>"asc","p.PERSC_ApellidoMaterno"=>"asc","p.PERSC_Nombre"=>"asc");
        $registros = count($this->ciclo_model->listar($filter,$filter_not));
        $personas  = $this->ciclo_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($personas)>0){
            foreach($personas as $indice => $value){
                $lista[$indice]         = new stdClass();
                $lista[$indice]->codigo = $value->CICLOP_Codigo;
                $lista[$indice]->nombre = $value->COMPC_Nombre;
                $lista[$indice]->fecha_inicio = date_sql(substr($value->CICC_FECHA_INICIO,0,10));
                $lista[$indice]->fecha_fin    = date_sql(substr($value->CICC_FECHA_FIN,0,10));
                $lista[$indice]->descripcion  = $value->CICC_DESCRIPCION;
                $lista[$indice]->tipociclo    = $value->TIPOCICLOC_Descripcion;
                $lista[$indice]->estado       = $value->COMPC_FlagEstado;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/maestros/persona/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['menu']            = $menu;
        $data['header']          = get_header();
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("maestros/ciclo_index",$data);
    }

     public function editar($accion,$codigo=""){
         $lista = new stdClass();
         if($accion == "e"){
             $filter             = new stdClass();
             $filter->ciclo      = $codigo;
             $ciclos             = $this->ciclo_model->obtener($filter);
             $lista->finicio     = date_sql(substr($ciclos->CICC_FECHA_INICIO,0,10));
             $lista->ffin        = date_sql(substr($ciclos->CICC_FECHA_FIN,0,10));
             $lista->descripcion = $ciclos->CICC_DESCRIPCION;
             $lista->codigo      = $ciclos->CICLOP_Codigo;
             $lista->nombre      = $ciclos->COMPC_Nombre;
             $lista->tipociclo   = $ciclos->TIPOCICLOP_Codigo;
         }
         elseif($accion == "n"){
             $lista->finicio     = "";
             $lista->ffin        = "";
             $lista->descripcion = "";
             $lista->codigo      = "";
             $lista->nombre      = "";
             $lista->tipociclo   = "";
         }
         $arrTipociclo         = array("0"=>"::Seleccione::","1"=>"Ciclo 1","2"=>"Ciclo 2");
         $data['titulo']       = $accion=="e"?"Editar Ciclo":"Crear Ciclo";
         $data['form_open']    = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close']   = form_close();
         $data['lista']	       = $lista;
         $data['seltipociclo'] = form_dropdown('tipociclo',$arrTipociclo,$lista->tipociclo,"id='tipociclo' class='comboMedio'");
         $data['oculto']       = form_hidden(array("accion"=>$accion,"codigo_padre"=>$codigo,"codigo"=>$lista->codigo));
         $this->load->view("maestros/ciclo_nuevo",$data);
    }
     
    public function grabar(){
        $accion      = $this->input->get_post('accion');
        $codigo      = $this->input->get_post('codigo');
        $data   = array(
                        "COMPC_Nombre"      => strtoupper($this->input->post('nombre')),
                        "CICC_FECHA_INICIO" => date_sql_ret($this->input->post('finicio')),
                        "CICC_FECHA_FIN"    => date_sql_ret($this->input->post('ffin')),
                        "CICC_DESCRIPCION"  => strtoupper($this->input->post('descripcion')),
                        "TIPOCICLOP_Codigo" => strtoupper($this->input->post('tipociclo'))
                       );
        if($accion == "n"){
            $this->codigo = $this->ciclo_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->ciclo_model->modificar($codigo,$data);
        }
    }
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $apertura = $this->course_model->obtener($filter);
        $resultado = json_encode($apertura);       
        echo $resultado; 
    }
    
    public function eliminar()
    {
        $codigo  = $this->input->post('codigo');
        $this->ciclo_model->eliminar($codigo);
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

    public function buscar($j=0){
        $filter = new stdClass();
        $filter_not = new stdClass();
        $filter->ciclo = $this->input->get_post('ciclo'); 
        $filter->curso = $this->input->get_post('curso'); 
        if(isset($_SESSION["rolusu"]) && $_SESSION["rolusu"]!=4)  $filter->curso = $_SESSION["codcurso"];
        $filter->estado   = 1;
        $filter->asignado = 0;
        $filter->order_by = array("a.title"=>"asc");
        $registros = count($this->course_model->listar($filter,$filter_not));
        //$cursos  = $this->course_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $cursos  = $this->course_model->listar($filter,$filter_not);
        $lista      = array();
        if(count($cursos)>0){
            foreach($cursos as $indice => $value){
                $lista[$indice]         = new stdClass();
                $lista[$indice]->codigo = $value->id;
                $lista[$indice]->aula   = $value->AULAC_Nombre;
                $lista[$indice]->turno  = $value->TURNOP_Codigo;
                $lista[$indice]->modulo = $value->MODULOC_Descripcion;
                $lista[$indice]->estado = $value->APERTUC_FlagEstado;
                $lista[$indice]->code   = $value->code;
                $lista[$indice]->title  = $value->title;
                $lista[$indice]->tipoestudio  = $value->TIPC_Nombre;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/chamilo/course/buscar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']      = $lista;
        $data['titulo']     = "Buscar aulas";
        $data['j']          = $j;
        $data['registros']  = $registros;
        //$data['paginacion'] = $this->pagination->create_links();
        $data['paginacion'] = "";
        $this->load->view("chamilo/course_buscar",$data);
    }
}
?>