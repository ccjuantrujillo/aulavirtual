<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Inicio extends Layout{
	var $empresa;

	public function __construct(){
            parent::__construct();
            $this->load->model('Empresa_model');
            $this->load->model('Usuario_model');
            $this->load->model('Usuarioempresa_model');
            $this->load->model('Profesor_model');
            $this->load->model('Alumno_model');
            $this->load->model('Rol_model');
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
            $this->load->view('inicio/index');
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
                $filter  = new stdClass();
                $filter->usuario = $usuario;
                $filter->clave   = md5($clave);
                $usuarios = $this->Usuario_model->login($filter);
                if(!empty($usuarios)){
                    $filter  = new stdClass();
                    $filter->usuario = $usuario;    
                    $filter->defecto = 1;  
                    $usuarioempresa = $this->Usuarioempresa_model->read($filter);                   
                    if(!is_null($usuarioempresa)){
                        $rol     = $usuarioempresa[0]->ROL_Codigo;
                        $empresa = $usuarioempresa[0]->EMPRP_Codigo;
                        $dataSession = array(
                                    'nomper'   => $usuarios->PERSC_Nombre." ".$usuarios->PERSC_ApellidoPaterno,
                                    'login'    => $usuarios->USUAC_usuario,
                                    'codper'   => $usuarios->PERSP_Codigo,
                                    'rolusu'   => $rol,
                                    'empresa'  => $empresa,
                                    'user'     => $usuarios->USUAC_usuario,
                                    'persona'  => $usuarios->PERSP_Codigo,
                                    'nombre_persona'  => $usuarios->PERSC_Nombre." ".$usuarios->PERSC_ApellidoPaterno,
                                    'rol'      => $rol
                                     );                          
                        $this->session->set_userdata($dataSession);
                        redirect(base_url()."curso/listar");                          
                    }
                    else{
                        $msgError = "<br><div align='center' class='error'>No existen permisos para el usuario/div>";
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
                        'rolusu'   => 3,//anonimo
                        'codrol'   => 6,
                        'empresa'  => 3
                         );
            }
            $this->session->set_userdata($dataSession);
            redirect(base_url()."curso/listar");  
        }
        
        public function cambiar_sesion(){
            $empresa = $this->input->post('empresa');
            $filter  = new stdClass();
            $filter->usuario = $_SESSION["user"];;    
            $filter->empresa = $empresa;  
            $usuarioempresa = $this->Usuarioempresa_model->read($filter);                  
            if(!is_null($usuarioempresa)){
                $rol     = $usuarioempresa[0]->ROL_Codigo;
                $empresa = $usuarioempresa[0]->EMPRP_Codigo;
                $dataSession = array(
                            'rolusu'   => $rol,
                            'empresa'  => $empresa,
                            'rol'      => $rol
                             );   
                $this->session->set_userdata($dataSession);
                $json = array("result" => "success", "message" => 'Cambio completo, actualice la página.');               
            }
            else{
                $json = array("result" => "success", "message" => 'Datos de la empresa no disponible.');
            }
            echo json_encode($json);
            die;
        }
        
        public function salir(){
            session_destroy();
            redirect('inicio/index');  
            //redirect(dirname(base_url()));
        }
}