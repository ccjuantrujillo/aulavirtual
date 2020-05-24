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
            $arrRol = array("0"=>"::Seleccione::","1"=>"Alumno","2"=>"Profesor"); 
            $data['selrol']     = form_dropdown('rol',$arrRol,0,"id='rol' class='form-control'");
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
                $empresa = $this->input->post('empresa');
                $rol     = $this->input->post('rol');
                $filter  = new stdClass();
                $filter->usuario = $usuario;
                $filter->clave   = md5($clave);
                $filter->empresa = $empresa;                
                if($rol=="1"){//Alumno
                    $datos = $this->Alumno_model->login($filter);
                }
                elseif($rol=="2"){//Profesor
                    $datos = $this->Profesor_model->login($filter);
                }
                if(!empty($datos)){
                    if(count($datos)==1){
                        $usuario = $datos[0];
                        $dataSession = array(
                                    'nomper'   => $usuario->PERSC_Nombre." ".$usuario->PERSC_ApellidoPaterno,
                                    'login'    => isset($usuario->ALUMC_Usuario)?$usuario->ALUMC_Usuario:$usuario->PROC_Usuario,
                                    'codper'   => $usuario->PERSP_Codigo,
                                    'codalu'   => isset($usuario->ALUMP_Codigo)?$usuario->ALUMP_Codigo:0,
                                    'codprofe' => isset($usuario->PROP_Codigo)?$usuario->PROP_Codigo:0,
                                    'rolusu'   => isset($usuario->ALUMP_Codigo)?1:2,
                                    'empresa'  => $usuario->EMPRP_Codigo
                                     );
                        $this->session->set_userdata($dataSession);
                        redirect(base_url()."curso/read");  
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