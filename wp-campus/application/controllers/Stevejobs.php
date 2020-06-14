<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Stevejobs extends Layout{
	var $empresa;

	public function __construct(){
            parent::__construct();
            $this->load->model('Empresa_model');
            $this->load->model('Usuario_model');
            $this->load->model('Profesor_model');
            $this->load->model('Alumno_model');
            $this->load->model('Rol_model');
            $this->empresa = $this->config->item('empresa');
	}
        
	public function index()
	{
            $filter = new stdClass();
            $filter_not = new stdClass();
            $filter_not->rol = 4;
            $data['selrol'] = form_dropdown('rol',$this->Rol_model->seleccionar($filter,$filter_not,"0"),0,"id='rol' class='form-control'");
            $this->load->view('stevejobs/index',$data);
	}

	public function ingresar(){
            $this->form_validation->set_rules('usuario','Nombre de Usuario','required|max_length[20]');
            $this->form_validation->set_rules('clave','Clave de Usuario','required|max_length[15]'); 
            //$this->form_validation->set_rules('empresa','Empresa','required'); 
            if($this->form_validation->run() == FALSE){
                redirect('stevejobs/index');
            }            
            else{
                $usuario = $this->input->post('usuario');
                $clave   = $this->input->post('clave');
                $rol     = $this->input->post('rol');
                $filter  = new stdClass();
                $filter->usuario = $usuario;
                $filter->clave   = md5($clave);
                $filter->empresa = 3;   
                $filter->rol     = $rol;//6:Alumno,7:Profesor,4:Administrador
                print_r($filter);
                $datos = $this->Usuario_model->login($filter);
                print_r($datos);
                if(!empty($datos)){
                    if(isset($datos->USUAP_Codigo)){
                        $dataSession = array(
                                    'nomper'   => $datos->PERSC_Nombre." ".$datos->PERSC_ApellidoPaterno,
                                    'login'    => $datos->USUAC_usuario,
                                    'codper'   => $datos->PERSP_Codigo,
                                    'rolusu'   => $datos->ROL_Codigo,//6:Alumno,7:Profesor,4:Administrador
                                    'empresa'  => $datos->EMPRP_Codigo
                                     );
                        $this->session->set_userdata($dataSession);
                        redirect(base_url()."curso/listar");  
                    }
                    else{
                        $msgError = "<br><div align='center' class='error'>Existen 2 registros para el usuario, favor contactarse con el administrador</div>";
                    }
                }
                else{
                    $msgError = "<br><div align='center' class='error'>Usuario y/o contrasena no valido para esta empresa.</div>";
                }
                echo $msgError;
            }
	}
        
        public function salir(){
            session_destroy();
            redirect('stevejobs/index');  
            //redirect(dirname(base_url()));
        }
}