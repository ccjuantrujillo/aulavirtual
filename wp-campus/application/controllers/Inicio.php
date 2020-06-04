<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Inicio extends Layout{
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

        public function directo($curso){
            $datos = array(
                        'nomper'   => "Martin Trujillo",
                        'login'    => "demo",
                        'codusu'   => "demo",
                        'rolusu'   => 4,
                        'acceso'   => 1
                         );
            $this->session->set_userdata($datos);
            redirect(base_url()."curso/inicio/".$curso); 
        }
        
	public function index()
	{
            $filter = new stdClass();
            $data['selrol']     = form_dropdown('rol',$this->Rol_model->seleccionar($filter,"0"),0,"id='rol' class='form-control'");
            $data['selempresa'] = form_dropdown('empresa',$this->Empresa_model->seleccionar($filter),0,"id='empresa' class='form-control'");
            //$data['datosempresa'] = $this->Empresa_model->get($this->empresa);
            $this->load->view('inicio/index',$data);
	}

	public function ingresar(){
            $this->form_validation->set_rules('usuario','Nombre de Usuario','required|max_length[20]');
            $this->form_validation->set_rules('clave','Clave de Usuario','required|max_length[15]'); 
            $this->form_validation->set_rules('empresa','Empresa','required'); 
            if($this->form_validation->run() == FALSE){
                redirect('inicio/index');
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
                $filter->rol     = $rol;//6:Alumno,7:Profesor,4:Administrador
                $datos = $this->Usuario_model->login($filter);
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
        
        public function valida($curso){
            $usuario = $datos[0];
            $dataSession = array(
                        'nomper'   => "anonymous",
                        'login'    => "anonymous",
                        'codper'   => 1,
                        'codalu'   => 5,
                        'codprofe' => 0,
                        'rolusu'   => 3,//anonimo
                        'codrol'   => 6,
                        'empresa'  => 2
                         );
            if($curso==108 || $curso==122){
                 $dataSession = array(
                        'nomper'   => "anonymous",
                        'login'    => "anonymous",
                        'codper'   => 521,
                        'codalu'   => 123,
                        'codprofe' => 0,
                        'rolusu'   => 1,//alumno
                        'codrol'   => 6,
                        'empresa'  => 3
                         );
            }
            $this->session->set_userdata($dataSession);
            redirect(base_url()."curso/read");  
        }
        
        public function salir(){
            session_destroy();
            redirect('inicio/index');  
            //redirect(dirname(base_url()));
        }
}