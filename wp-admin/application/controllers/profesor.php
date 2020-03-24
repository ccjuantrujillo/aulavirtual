<?php header("Content-type: text/html; charset=utf-8");
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/maestros/persona.php';
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
                $lista[$indice]->numero   = $value->PROC_NumeroDocIdentidad;
                $lista[$indice]->nombres  = $value->PROC_Nombre;
                $lista[$indice]->paterno  = $value->PROC_ApellidoPaterno;
                $lista[$indice]->materno  = $value->PROC_ApellidoMaterno;
                $lista[$indice]->telefono = $value->PROC_Telefono;
                $lista[$indice]->movil    = $value->PROC_Movil;
                $lista[$indice]->codigo   = $value->PROP_Codigo;
                $lista[$indice]->estado   = $value->PROC_FlagEstado;
                $lista[$indice]->fechareg = $value->fechareg;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/ventas/profesor/listar";
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
        $curso     = $this->input->get_post('curso');
        $paterno   = $this->input->get_post('paterno');
        $materno   = $this->input->get_post('materno');
        $nombres   = $this->input->get_post('nombres');
        $telefono  = $this->input->get_post('telefono');
        $sexo      = $this->input->get_post('sexo');
        $numero    = $this->input->get_post('numero');
        $movil     = $this->input->get_post('movil');
        $email     = $this->input->get_post('email');
        $direccion = $this->input->get_post('direccion');
        $fnacimiento = $this->input->get_post('fnacimiento');
        $lista = new stdClass();
  	    $lista->accion = $accion;		
         if($accion == "e"){
             $filter            = new stdClass();
             $filter->profesor  = $codigo;
             $profesores        = $this->Profesor_model->obtener($filter);
             $lista->numerodoc  = $numero!=""?$numero:$profesores->PROC_NumeroDocIdentidad;
             $lista->sexo       = $sexo!=""?$sexo:$profesores->PROC_Sexo;
             $lista->direccion  = $direccion!=""?$direccion:$profesores->PROC_Direccion;
             $lista->telefono   = $telefono!=""?$telefono:$profesores->PROC_Telefono;
             $lista->email      = $email!=""?$email:$profesores->PROC_Email;
             $lista->movil      = $movil!=""?$movil:$profesores->PROC_Movil;
             $lista->fnac       = $fnacimiento!=""?$fnacimiento:date_sql($profesores->PROC_FechaNacimiento);
             $lista->paterno    = $paterno!=""?$paterno:$profesores->PROC_ApellidoPaterno;
             $lista->materno    = $materno!=""?$materno:$profesores->PROC_ApellidoMaterno;
             $lista->nombres    = $nombres!=""?$nombres:$profesores->PROC_Nombre;
             $lista->codigo     = $codigo;
             $lista->estado     = $profesores->PROC_FlagEstado;
             $lista->tipodoc    = $profesores->TIPDOCP_Codigo;    
             $lista->user_id    = $profesores->user_id;    
         }
         elseif($accion == "n"){
             $lista->numerodoc  = $numero;
             $lista->sexo       = $sexo;
             $lista->direccion  = $direccion;
             $lista->telefono   = $telefono;
             $lista->email      = $email;
             $lista->movil      = $movil;
             $lista->fnac       = $fnacimiento;
             $lista->paterno    = $paterno;
             $lista->materno    = $materno;
             $lista->nombres    = $nombres;
             $lista->sexo       = $sexo;
             $lista->codigo     = "";
             $lista->estado     = 1;
             $lista->tipodoc    = 1;  
             $lista->user_id    = 0;
         }
		 $data['principal'] = $this->editar_principal($lista);
         $data['experiencia'] = $this->editar_experiencia($lista);
         $this->load->view("profesor/profesor_nuevo",$data);
     }

	public function editar_experiencia($lista){
		$filter = new stdClass();
		$filter->profesor = $lista->codigo;
		$lista->experiencia = array();
		$lista->profesor    = $lista->codigo;
		$arrMes             = array("00"=>"Mes","01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Setiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
		$arrAno[0]="Año";
		for($i=1950;$i<=2020;$i++)  $arrAno[$i]=$i;
		$data['arrmes']     = $arrMes;         
		$data['lista']      = $lista;
		return $this->load->view("profesor/profesor_nuevo_experiencia",$data,true);   
	}

	public function editar_principal($lista){
        $arrSexo            = array("0"=>"::Seleccione::","1"=>"MASCULINO","2"=>"FEMENINO");
         $arrEstado          = array("0"=>"::Seleccione::","1"=>"ACTIVO","2"=>"INACTIVO");
         $arrMes             = array("0"=>"Mes","1"=>"Enero","2"=>"Febrero","3"=>"Marzo","4"=>"Abril","5"=>"Mayo","6"=>"Junio","7"=>"Julio","8"=>"Agosto","9"=>"Setiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
         $arrAno[0]="Año";
         for($i=1950;$i<=2020;$i++)  $arrAno[$i]=$i;
         $data['titulo']      = $lista->accion=="e"?"Editar Profesor":"Crear Profesor";
         $data['form_open']   = form_open('',array("name"=>"frmPersona","id"=>"frmPersona","onsubmit"=>"return valida_guiain();"));
         $data['form_close']  = form_close();
         $data['lista']	      = $lista;
         $data['selsexo']     = form_dropdown('sexo',$arrSexo,$lista->sexo,"id='sexo' class='comboMedio'");
         $data['selestado']   = form_dropdown('estado',$arrEstado,$lista->estado,"id='estado' class='comboMedio'");
         $data['seltipodoc']  = form_dropdown('tipodoc',$this->tipodocumento_model->seleccionar(),$lista->tipodoc,"id='tipodoc' class='comboMedio'"); 
         $data['oculto']      = form_hidden(array("accion"=>$lista->accion,"codigo"=>$lista->codigo,"user_id"=>$lista->user_id));
		 return $this->load->view("profesor/profesor_nuevo_principal",$data,true);
	}       
     
    public function grabar(){
		$accion       = $this->input->get_post('accion');
		$user_id      = $this->input->get_post('user_id');
		$codigo       = $this->input->get_post('codigo');		
		$data         = array(
						"PROC_ApellidoPaterno" => $this->input->post('paterno'),
						"PROC_ApellidoMaterno" => $this->input->post('materno'),
						"PROC_Nombre"          => $this->input->post('nombres'),
						"PROC_FechaNacimiento" => $this->input->post('fnacimiento'),
						"TIPDOCP_Codigo"       => $this->input->post('tipodoc'),	
						"PROC_NumeroDocIdentidad" => $this->input->post('numero'),	
						"PROC_Telefono"        => $this->input->post('telefono'),	
						"PROC_Movil"           => $this->input->post('movil'),	
						"PROC_Sexo"            => $this->input->post('sexo'),	
						"PROC_FlagEstado"      => $this->input->post('estado'),	
						"PROC_Email"           => $this->input->post('email'),	
						"PROC_Direccion"       => $this->input->post('direccion'),																																													
                        "PROC_FechaModificacion" => date('Y-m-d H:i:s',time()),																				
						"user_id"                => $user_id
					   );
		if($accion == "n"){
			$profesor = $this->Profesor_model->insertar($data);
		}
		elseif($accion == "e"){
			$this->Profesor_model->modificar($codigo,$data);
		}            
    }

    public function eliminar(){
        $codigo  = $this->input->post('codigo');
        $resultado = true;
        $filter = new stdClass();
        $filter->profesor = $codigo;
        $profesor = $this->Profesor_model->obtener($filter);
        $persona = $profesor->PERSP_Codigo;
        $user_id = $profesor->user_id;
        $filter = new stdClass();
        $filter->user_id = $user_id;
        $this->user_model->eliminar($filter);
        $this->Profesor_model->eliminar($codigo);
        //$this->Persona_model->eliminar($persona);
        echo json_encode($resultado);
    }
    
    public function borrar(){
        $codigo    = $this->input->post('codigo');
        $resultado = true;
        $data      = array("PROC_FlagBorrado" => 0);
        $this->Profesor_model->modificar($codigo,$data);   
         echo json_encode($resultado);
    }

    public function buscar($j=0){
        $filter = new stdClass();
        if(isset($_SESSION["rolusu"]) && $_SESSION["rolusu"]!=4)  $filter->curso = $_SESSION["codcurso"];
        $filter_not = new stdClass();
        $filter_not->profesor   = "0";
        $filter_not->rol        = 7;
        $filter->order_by       = array("e.CURSOC_Nombre"=>"asc","d.PERSC_ApellidoPaterno"=>"asc","d.PERSC_ApellidoMaterno"=>"asc","d.PERSC_Nombre"=>"asc");
        $registros = count($this->Profesor_model->listar($filter,$filter_not));
        $profesores = $this->Profesor_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item       = 1;
        $lista      = array();
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
                $lista[$indice]->profesor = $value->PROP_Codigo;
                $lista[$indice]->estado   = $value->PROC_FlagEstado;
                $lista[$indice]->fechareg = $value->fechareg;
                $lista[$indice]->curso    = $value->CURSOC_Nombre;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/ventas/profesor/buscar";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("ventas/profesor_buscar",$data);
    }

    public function buscar2($j=0){
        $filter     = new stdClass();
        if(isset($_SESSION["codcurso"]) && $_SESSION["codcurso"]!=0)  $filter->curso = $_SESSION["codcurso"];
        $filter_not = new stdClass();
        $filter_not->profesor = "0";
        $filter->order_by    = array("d.PERSC_ApellidoPaterno"=>"asc","d.PERSC_ApellidoMaterno"=>"asc","d.PERSC_Nombre"=>"asc");
        $registros = count($this->Profesor_model->listar($filter,$filter_not));
        $profesores = $this->Profesor_model->listar($filter,$filter_not,$this->configuracion['per_page'],$j);
        $item       = 1;
        $lista      = array();
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
                $lista[$indice]->profesor = $value->PROP_Codigo;
                $lista[$indice]->estado   = $value->PROC_FlagEstado;
                $lista[$indice]->fechareg = $value->fechareg;
                $lista[$indice]->curso    = $value->CURSOC_Nombre;
            }
        }
        $configuracion = $this->configuracion;
        $configuracion['base_url']    = base_url()."index.php/ventas/profesor/buscar2";
        $configuracion['total_rows']  = $registros;
        $this->pagination->initialize($configuracion);
        /*Enviamos los datos a la vista*/
        $data['lista']           = $lista;
        $data['j']               = $j;
        $data['registros']       = $registros;
        $data['paginacion']      = $this->pagination->create_links();
        $this->load->view("ventas/profesor_buscar2",$data);
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