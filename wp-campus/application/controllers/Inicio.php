<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Inicio extends Layout{
	var $empresa;

	public function __construct(){
            parent::__construct();
            $this->load->model('Empresa_model');
            $this->load->model('Usuario_model');
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
            $data['selrol'] = form_dropdown('rol',$this->Rol_model->seleccionar($filter),0,"id='rol' class='form-control'");
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
                $filter  = new stdClass();
                $filter->usuario = $usuario;
                $filter->clave   = md5($clave);
                $filter->empresa = $empresa;
                $usuario = $this->Usuario_model->ingresar($filter);
                if(is_object($usuario) && isset($usuario->USUAP_Codigo)){
                    $datos = array(
                                'nomper'   => $usuario->PERSC_Nombre." ".$usuario->PERSC_ApellidoPaterno,
                                'login'    => $usuario->USUAC_usuario,
                                'codusu'   => $usuario->USUAP_Codigo,
                                'rolusu'   => $usuario->ROL_Codigo,
                                'empresa'  => $empresa
                                 );
                    $this->session->set_userdata($datos);
                    redirect(base_url()."curso/read");  
                }
                else{
                    $msgError = "<br><div align='center' class='error'>Usuario y/o contrasena no valido para esta empresa.</div>";
                    echo $msgError;
                }
            }
	}
        
        public function salir(){
            session_destroy();
            //redirect('inicio/index');  Original
            redirect(dirname(base_url()));
        }
}