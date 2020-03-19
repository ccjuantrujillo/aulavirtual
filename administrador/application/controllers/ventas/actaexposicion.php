<?php header("Content-type: text/html; charset=utf-8"); 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/UploadHandler.php';
class Actaexposicion extends CI_Controller {
    public function __construct(){
        parent::__construct(); 
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");           
        $this->load->model(ventas.'acta_model');
        $this->load->model(ventas.'actadetalle_model');
        $this->load->model(ventas.'profesor_model');
        $this->load->model(ventas.'actaprofesor_model');
        $this->load->model(ventas.'actaexposicion_model');
        $this->load->model(almacen.'tema_model');
        $this->load->helper('menu');
        $this->configuracion = $this->config->item('conf_pagina');
        $this->login   = $this->session->userdata('login');
    } 
    
    public function editar($acta=0,$curso=0){
        $filter     = new stdClass();
        $filter->acta  = $acta;
        $filter->order_by    = array("f.PERSC_ApellidoPaterno"=>"asc","f.PERSC_ApellidoMaterno"=>"asc","f.PERSC_Nombre"=>"asc");
        $actaexposiciones = $this->actaexposicion_model->listar($filter);
        $item       = 1;
        $lista      = array();
        if(count($actaexposiciones)>0){
            foreach($actaexposiciones as $indice => $value){
                $lista[$indice]             = new stdClass();
                $lista[$indice]->codigo   = $value->ACTAEXPOSP_Codigo;
                $lista[$indice]->profesor = $value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno." ".$value->PERSC_Nombre;
                $lista[$indice]->curso    = $value->PROD_Nombre;
                $lista[$indice]->tema         = $value->TEMAC_Descripcion;
                $lista[$indice]->descripcion  = $value->ACTAEXPOSC_Descripcion;
                $lista[$indice]->duracion  = $value->ACTAEXPOSC_Duracion;
                $lista[$indice]->archivo   = $value->ACTAEXPOSC_Archivo;
            }
        }
        /*Cargo el formulario*/
        $data['titulo']              = "Listado de exposiciones"; 
        $data['upload_max_filesize'] = return_bytes(ini_get('upload_max_filesize'))/(1024*1024);
        $data['form_open']           = form_open(base_url()."index.php/ventas/actaexposicion/grabar",array("name"=>"frmPersona","id"=>"frmPersona","enctype"=>"multipart/form-data","onsubmit"=>"return valida_frm_exposicion();"));     
        $data['form_profesor']       = form_input(array("name"=>"profesor","id"=>"profesor","value"=>"","class"=>"cajaMedia"));
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("d.PERSC_ApellidoPaterno"=>"asc","d.PERSC_ApellidoMaterno"=>"asc","d.PERSC_Nombre"=>"asc");
        $data['form_profesor']      = form_dropdown('profesor',$this->profesor_model->seleccionar("0",$filter),"","id='profesor' class='comboMedio'");        
        $filter = new stdClass();
        $filter->curso = $curso;
        $filter->order_by = array("c.TEMAC_Descripcion"=>"asc");
        $data['form_tema']        = form_dropdown('tema',$this->tema_model->seleccionar("0",$filter),"","id='tema' class='comboMedio'");        
        $data['form_descripcion'] = form_input(array("name"=>"descripcion","id"=>"descripcion","value"=>"","class"=>"cajaMedia"));
        $data['form_duracion'] = form_input(array("name"=>"duracion","id"=>"duracion","value"=>"","class"=>"cajaMinima","type"=>"time"));
        $data['form_close']    = form_close(); 
        $data['lista']         = $lista;
        $data['oculto']        = form_hidden(array("curso"=>$curso,"acta"=>$acta,"max_filesize"=>$data['upload_max_filesize']));
        $this->load->view("ventas/actaexposicion_nuevo",$data);
    } 
    
    public function upload(){
        $upload_handler = new UploadHandler();
    }
    
    public function grabar(){
        $originales   = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas  = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $codigo       = $this->input->get_post('codigo');
        $curso        = $this->input->get_post('curso');
        $acta         = $this->input->get_post('acta');
        $profesor     = $this->input->get_post('profesor');
        $tema         = $this->input->get_post('tema');
        $descripcion  = $this->input->get_post('descripcion');
        $duracion     = $this->input->get_post('duracion');
        $max_filesize = $this->input->get_post('max_filesize');
        $fichero      = $_FILES['file_exposicion'];
        $cadena       = utf8_decode($fichero['name']);
        $cadena       = strtr($cadena, utf8_decode($originales), $modificadas);
        $cadena       = strtolower($cadena);
        $cadena       = str_replace(" ","",$cadena);
        $cadena       = utf8_encode($cadena);
        $archivo      = rand(15,86).$cadena;
        if($curso!="" && $profesor!=0){
            if(($fichero["type"] == "application/pdf" 
                    || $fichero["type"] == "application/msword"  
                    || $fichero["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" 
                    || $fichero["type"] == "application/vnd.ms-excel" 
                    || $fichero["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" 
                    || $fichero["type"] == "application/vnd.ms-powerpoint" 
                    || $fichero["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation" 
                    || $fichero["type"] == "application/vnd.openxmlformats-officedocument.presentationml.slideshow"
                    )
                    && $fichero["size"] <= $max_filesize*1024*1024){
                if(move_uploaded_file($fichero['tmp_name'],"files/".$archivo)){
                    $data   = array(
                                    "ACTAP_Codigo"            => $acta,
                                    "PROP_Codigo"             => $profesor,
                                    "PRODATRIBDET_Codigo"     => $tema,
                                    "ACTAEXPOSC_Archivo"      => $archivo,
                                    "ACTAEXPOSC_Descripcion"  => $descripcion,
                                    "ACTAEXPOSC_Duracion"     => $duracion
                                   );
                    if($codigo==""){//Nuevo
                        $this->actaexposicion_model->insertar($data);    
                        $resultado = true;
                    }
                    else{//Editar
                        unset($data['ACTAP_Codigo']);
                        $this->actapexposicion_model->modificar($codigo[$item],$data);                                
                        $resultado = true; 
                    }
                    redirect('ventas/actaexposicion/editar/'.$acta.'/'.$curso); 
                }  
            }
            else{
                die("<script>alert('Error en la subida de archivos, verifique el tamaño del archivo o la extension'); window.location.href='editar/".$acta."/".$curso."';</script>");
            }
        }
    }
    
    public function eliminar(){
        $codigo = $this->input->post('codigo');
        $resultado = false;
        $filter = new stdClass();
        $filter->actaexposicion = $codigo;
        $this->actaexposicion_model->eliminar($filter);
        $resultado = true;
        echo json_encode($resultado);
    }    
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $cursos  = $this->actaexposicion_model->listar($filter);
        $resultado = json_encode($cursos);
        echo $resultado;
    }
}
?>