<?php header("Content-type: text/html; charset=utf-8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/Persona.php';

class Profesor extends Persona
{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");   
        $this->load->model('Profesor_model');
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
        $filter_not->profesor = "0";
        $filter->order_by    = array("c.PROC_ApellidoPaterno"=>"asc","c.PROC_ApellidoMaterno"=>"asc","c.PROC_Nombre"=>"asc");	
        $registros = count($this->Profesor_model->listar($filter,$filter_not));
        $profesores  = $this->Profesor_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item      = 1;
        $lista     = array();
        if(count($profesores)>0){
            foreach($profesores as $indice => $value){
                $lista[$indice]             = new stdClass();
                $lista[$indice]->numero   = $value->PERSC_NumeroDocIdentidad;
                $lista[$indice]->nombres  = $value->PERSC_Nombre;
                $lista[$indice]->paterno  = $value->PERSC_ApellidoPaterno;
                $lista[$indice]->materno  = $value->PERSC_ApellidoMaterno;
                $lista[$indice]->telefono = $value->PERSC_Telefono;
                $lista[$indice]->movil    = $value->PERSC_Movil;
                $lista[$indice]->codigo   = $value->PROP_Codigo;
                $lista[$indice]->estado   = $value->PROC_FlagEstado;
                $lista[$indice]->fechareg = $value->fechareg;
                $lista[$indice]->usuario  = $value->PROC_Usuario;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."ventas/profesor/listar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['menu']            = $menu;
        $data['header']          = get_header();
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("profesor/profesor_index",$data);
    }

    public function editar($accion,$codigo=""){      
        $lista = new stdClass();
         if($accion == "e"){
             $filter            = new stdClass();
             $filter->profesor  = $codigo;
             $profesores        = $this->Profesor_model->obtener($filter);
             $lista->numerodoc  = $profesores->PERSC_NumeroDocIdentidad;
             $lista->sexo       = $profesores->PERSC_Sexo;
             $lista->direccion  = $profesores->PERSC_Direccion;
             $lista->telefono   = $profesores->PERSC_Telefono;
             $lista->email      = $profesores->PERSC_Email;
             $lista->movil      = $profesores->PERSC_Movil;
             $lista->fnac       = date_sql($profesores->PERSC_FechaNacimiento);
             $lista->paterno    = $profesores->PERSC_ApellidoPaterno;
             $lista->materno    = $profesores->PERSC_ApellidoMaterno;
             $lista->nombres    = $profesores->PERSC_Nombre;
             $lista->codigo     = $codigo;
             $lista->codigo_padre = $profesores->PERSP_Codigo;
             $lista->estado     = $profesores->PROC_FlagEstado;
             $lista->tipodoc    = $profesores->TIPDOCP_Codigo;    
             $lista->user_id    = $profesores->user_id;   
             $lista->usuario    = $profesores->PROC_Usuario;  
             $lista->clave      = $profesores->PROC_Password;  
         }
         elseif($accion == "n"){
             $lista->numerodoc  = "";
             $lista->sexo       = "";
             $lista->direccion  = "";
             $lista->telefono   = "";
             $lista->email      = "";
             $lista->movil      = "";
             $lista->fnac       = "";
             $lista->paterno    = "";
             $lista->materno    = "";
             $lista->nombres    = "";
             $lista->codigo     = "";
             $lista->codigo_padre = "";
             $lista->estado     = 1;
             $lista->tipodoc    = 1;  
             $lista->user_id    = 0;
             $lista->usuario    = "";
             $lista->clave      = "";
         }
        $arrSexo            = array("0"=>"::Seleccione::","1"=>"MASCULINO","2"=>"FEMENINO");
         $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
         $arrMes             = array("0"=>"Mes","1"=>"Enero","2"=>"Febrero","3"=>"Marzo","4"=>"Abril","5"=>"Mayo","6"=>"Junio","7"=>"Julio","8"=>"Agosto","9"=>"Setiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
         $arrAno[0]="Año";
         for($i=1950;$i<=2020;$i++)  $arrAno[$i]=$i;
         $data['titulo']      = $accion=="e"?"Editar Profesor":"Crear Profesor";
         $data['form_open']   = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close']  = form_close();
         $data['lista']	      = $lista;
         $data['selsexo']     = form_dropdown('sexo',$arrSexo,$lista->sexo,"id='sexo' class='comboMedio'");
         $data['selestado']   = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
         $data['seltipodoc']  = form_dropdown('tipodoc',$this->Tipodocumento_model->seleccionar(),$lista->tipodoc,"id='tipodoc' class='comboMedio'"); 
         $data['txtusuario']  = form_input(["name"=>"usuario","id"=>"usuario","class"=>"cajaMedia"],$lista->usuario);
         $data['txtclave']    = form_password(["name"=>"clave","id"=>"clave","class"=>"cajaMedia"],$lista->clave);
         $data['oculto']      = form_hidden(array("accion"=>$accion,"codigo"=>$lista->codigo,"codigo_padre"=>$lista->codigo_padre));
         $this->load->view("profesor/profesor_nuevo_principal",$data);
     }    
     
    public function grabar(){
        parent::grabar();
        $accion    = $this->input->get_post('accion');
        $codigo    = $this->input->get_post('codigo');
        $clave     = $this->input->get_post('clave');
        $resultado = true;		
        $data    = array(	
                    "PROC_Usuario"           => $this->input->post('usuario'),	
                    "PROC_Password"          => $clave!=""?md5($clave):"",   
                    "PROC_FlagEstado"        => $this->input->post('estado'),	
                    "PROC_FechaModificacion" => date('Y-m-d H:i:s',time())
                );
        if($accion == "n"){
            $data["PERSP_Codigo"] = $this->codigo;
            $profesor = $this->Profesor_model->insertar($data);
        }
        elseif($accion == "e"){
            $this->Profesor_model->modificar($codigo,$data);
        }       
        echo json_encode($resultado);        
    }

    public function eliminar(){
        $resultado = 0;
        $codigo    = $this->input->post('codigo');
        $profesor  = $this->Profesor_model->obtener($codigo);
        $this->codigo = $profesor->PERSP_Codigo;
        if(parent::eliminar()=="1"){
            $resultado = $this->Profesor_model->eliminar($codigo);  
        }
        echo json_encode($resultado);
    }
    
    public function borrar(){
        $codigo    = $this->input->post('codigo');
        $resultado = true;
        $data      = array("PROC_FlagBorrado" => 0);
        $this->Profesor_model->modificar($codigo,$data);   
         echo json_encode($resultado);
    } 
    
    public function obtener(){
        $obj    = $this->input->post('objeto');
        $filter = json_decode($obj);
        $profesores  = $this->Profesor_model->listar($filter);
        $resultado = json_encode($profesores);
        echo $resultado;
    }
}
?>