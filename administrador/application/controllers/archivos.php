<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archivos extends CI_Controller {
    var $compania;
    var $configuracion;

    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");        
        $this->load->model('curso_model');
        $this->load->model('seccion_model');
        $this->load->model('leccion_model');
        $this->load->model('archivos_model');
        $this->load->model(seguridad.'permiso_model');  
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
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
        $filter->order_by    = array("j.CURSOC_Nombre"=>"asc");
        $registros = count($this->archivos_model->listar($filter,$filter_not));
        $archivos     = $this->archivos_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($archivos)>0){
            foreach($archivos as $indice=>$valor){  
                $lista[$indice]              = new stdClass();
                $lista[$indice]->codigo      = $valor->ARCHIVP_Codigo;
                $lista[$indice]->descripcion = $valor->ARCHIVC_Descripcion;
                $lista[$indice]->nombre      = $valor->ARCHIVC_Nombre;
                $lista[$indice]->leccion     = $valor->LECCIONC_Nombre;
                $lista[$indice]->curso       = $valor->CURSOC_Nombre;                
                $lista[$indice]->adjunto     = $valor->ARCHIVC_Adjunto!=""?"Si":"<span style='color:red;'>No</span>";  
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/almacen/archivo/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);        
        /*Datos para la vista*/
        $data['titulo_tabla'] = "Listado de archivos";
        $data['lista']        = $lista;
        $data['menu']         = $menu;   
        $data['header']          = get_header();        
        $data['registros']    = $registros;
        $data['j']            = $j;        
        $data['paginacion']   = $this->pagination->create_links();        
        $this->load->view('archivos/archivo_index',$data);
    }

    public function editar($accion,$codigo=""){
        $curso       = $this->input->get_post('curso');
        $seccion     = $this->input->get_post('seccion');
        $leccion     = $this->input->get_post('leccion');
        $descripcion = $this->input->get_post('descripcion');
        $nombre      = $this->input->get_post('nombre');        
        $orden       = $this->input->get_post('orden');
        $adjunto     = $this->input->get_post('adjunto');
        $lista       = new stdClass();
        if($accion == "e"){
            $titulo             = "Editar Archivo";      
            $filter             = new stdClass();
            $filter->archivo    = $codigo;
            $archivos = $this->archivos_model->obtener($filter);
            $lista->curso       = $curso!=""?$curso:$archivos->CURSOP_Codigo;
            $lista->seccion     = $seccion!=""?$seccion:$archivos->SECCIONP_Codigo;
            $lista->leccion     = $leccion!=""?$leccion:$archivos->LECCIONP_Codigo;
            $lista->descripcion = $descripcion!=""?$descripcion:$archivos->ARCHIVC_Descripcion;
            $lista->nombre      = $nombre!=""?$nombre:$archivos->ARCHIVC_Nombre;
            $lista->orden       = $orden!=""?$orden:$archivos->ARCHIVC_Orden;
            $lista->adjunto     = $adjunto!=""?$adjunto:"<div>".$archivos->ARCHIVC_Adjunto."</div>";
        }
        elseif($accion == "n"){
            $titulo             = "Nuevo Archivo";            
			$lista->curso       = "";
			$lista->seccion     = "";
            $lista->leccion     = "";
            $lista->descripcion = "";
            $lista->nombre      = "";
            $lista->orden       = "";
            $lista->adjunto     = "";
        }  
        $data['titulo']     = $titulo;        
        $data['form_open']  = form_open_multipart(base_url()."index.php/archivos/grabar",array("name"=>"frmPersona","id"=>"frmPersona","method"=>"post"));
        $data['form_close'] = form_close();
        $data['lista']	    = $lista;
        $filter = new stdClass();
        $filter->estado = 1; 
        $data['selcurso']    = form_dropdown('curso',$this->curso_model->seleccionar('0',$filter),$lista->curso,"id='curso' class='comboGrande'");  
        $filter = new stdClass();
        $filter->curso  = $lista->curso;  
        $data['selseccion']  = form_dropdown('seccion',$this->seccion_model->seleccionar('0',$filter),$lista->seccion,"id='seccion' class='comboGrande'"); 
        $filter = new stdClass();
        $filter->seccion  = $lista->seccion;  
        $data['selleccion']    = form_dropdown('leccion',$this->leccion_model->seleccionar('0',$filter),$lista->leccion,"id='leccion' class='comboGrande'");          
        $data['oculto']      = form_hidden(array('accion'=>$accion,'codigo'=>$codigo));
        $this->load->view('archivos/archivo_nuevo',$data);
    }  
    
    public function grabar(){
        $accion = $this->input->get_post('accion');
        $codigo = $this->input->get_post('codigo');
        $data   = array(
                        "ARCHIVC_Descripcion" => ($this->input->post('descripcion')),
                        "ARCHIVC_Orden"   => $this->input->post('orden'),
                        "LECCIONP_Codigo" => $this->input->post('leccion'),
                        "ARCHIVC_Nombre" => $this->input->post('nombre')
                       );    
        //Subimos los archivos
        if(isset($_FILES['adjunto']['name']) && trim($_FILES['adjunto']['name'])!=""){
            $upload_folder  = "./files";
            $nombre_archivo = $_FILES["adjunto"]["name"];
            $nombre_archivo = date("YmdHis").str_replace(" ","_",$nombre_archivo);
            $tmp_archivo    = $_FILES["adjunto"]["tmp_name"];
            $archivador     = $upload_folder."/".$nombre_archivo;
            $mensaje["subarchivo"] = true;
            if (!move_uploaded_file($tmp_archivo, $archivador)) {
                $mensaje["subarchivo"] = false;
            }
            $data["ARCHIVC_Adjunto"] = $nombre_archivo;
        }
        //Grabamos o actualizamos el registro        
        if($accion == "n"){
            $codigo = $this->archivos_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->archivos_model->modificar($codigo,$data);
        }
        redirect('./archivos/listar');
    }   
    
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $this->archivos_model->eliminar($codigo);
    } 
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $profesores  = $this->tema_model->listar($filter);
        $resultado = json_encode($profesores);
        echo $resultado;
    }    
}
?>