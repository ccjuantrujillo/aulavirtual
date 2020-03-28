<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Inicio extends Layout{
	var $empresa;

	public function __construct(){
		parent::__construct();
		$this->load->model('Curso_model');
		$this->load->model('Empresa_model');
        $this->empresa = $this->config->item('empresa');
	}

	public function index()
	{
		$data['datosempresa'] = $this->Empresa_model->get($this->empresa);
		$this->load->view('inicio/index',$data);
	}

	public function ingresar(){
            $this->form_validation->set_rules('usuario','Nombre de Usuario','required|max_length[20]');
            $this->form_validation->set_rules('clave','Clave de Usuario','required|max_length[15]'); 
            if($this->form_validation->run() == FALSE){
                redirect('inicio/index');
            }            
            else{
                $usuario = $this->input->post('usuario');
                $clave   = $this->input->post('clave');
                if($usuario=="demo" && $clave=="123456"){
                    $datos = array(
                                'nomper'   => "Martin Trujillo",
                                'login'    => "demo",
                                'codusu'   => "demo",
                                'rolusu'   => 4,
                                'acceso'   => 1
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
            redirect('inicio/index');            
        }
}