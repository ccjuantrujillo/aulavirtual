<?php header("Content-type: text/html; charset=utf-8"); 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
    var $entidad;
    var $empresa;

    public function __construct(){
        parent::__construct();          
        $this->load->model('Usuario_model');
        $this->load->model('Persona_model');    
        $this->load->model('Permiso_model');  
        $this->load->model('Menu_model');
        $this->load->model('Acceso_model');
        $this->load->model('Ciclo_model');
        $this->load->model('Profesor_model');
        $this->load->model('Empresa_model');
        $this->load->model('Rol_model');
        $this->load->helper('menu');
        $this->empresa  = $this->config->item('empresa');          
    }

    public function index(){
        $data['form_open']  = form_open(base_url().'index.php/inicio/ingresar',array("name"=>"frmInicio","id"=>"frmInicio"));
        $filter = new stdClass();
        $filter->empresa    = $this->empresa;
        $data['empresa']    = $this->Empresa_model->obtener($filter);
        $data['form_close'] = form_close(); 
        $data['onload']     = "onload=\"$('#txtUsuario').focus();\"";   
        $data['header']     = get_header();
        $filter = new stdClass();
        $data['selempresa'] = form_dropdown('empresa',$this->Empresa_model->seleccionar('',$filter),"","id='empresa' class='comboMedio'");        
        //$data['selrol']     = form_dropdown('rol',$this->Rol_model->seleccionar('',$filter),"","id='rol' class='comboMedio'");        
        $this->load->view("inicio/index",$data);
    }
    
    public function ingresar(){
        //$this->form_validation->set_rules('txtUsuario','Nombre Usuario','required|max_length[20]');
        //$this->form_validation->set_rules('txtClave','Clave de Usuario','required|max_length[15]'); 
        //if($this->form_validation->run() == FALSE){
         //   redirect('inicio/index');
        //}
        //else{
            $txtUsuario = $this->input->post('txtUsuario');
            $txtClave   = $this->input->post('txtClave');
            $rol        = 4;
            $empresa    = $this->input->post('empresa');
            $usuarios   = $this->Usuario_model->ingresar(trim($txtUsuario),md5(trim($txtClave)),$rol,$empresa);
            if(count((array)$usuarios)>0){
                $data = array(
                            'login'    => $usuarios->USUAC_usuario,
                            'codusu'   => $usuarios->USUAP_Codigo,
                            'rolusu'   => $usuarios->ROL_Codigo,
                            'acceso'   => $usuarios->ROL_FlagAcceso,
                            'estado'   => $usuarios->USUAC_FlagEstado,
                            'empresa'  => $usuarios->EMPRP_Codigo
                             );
                $this->session->set_userdata($data);
                /*Graba acceso*/
                //$data = array("PERSP_Codigo" => $usuarios->PERSP_Codigo,"ACCESOC_Fecha"=>date("Y-m-d h:i:s",time()));
                //$this->acceso_model->insertar($data);
                redirect("inicio/principal");                
            }
            else{
                $msgError = "<br><div align='center' class='error'>Usuario99 y/o contrasena no valido para esta empresa.</div>";
                echo $msgError;
                $this->index();
            }
        //}
    }
    
    public function principal(){
        if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");             
        $arrmes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $mes    = date("m",time());
        $ano    = date("Y",time());
        $dia    = date("d",time());
        $ver    = "";
        $fecha  = $dia." DE ".strtoupper($arrmes[$mes-1])." DE ".$ano;
        $fecha_std = $dia."/".$mes."/".$ano;
        $fecha_red = $dia.$mes.$ano;
        $nombreusuario = $this->session->userdata('nomper');
        $codusu        = $this->session->userdata('codusu');
        $rolusu        = $this->session->userdata('rolusu');
        $filter           = new stdClass();
        $filter->rol      = $rolusu; 
        $filter->order_by = array("m.MENU_Orden"=>"asc");
        $menu             = get_menu($filter);
        /*Accesos*/
        $data['fecha']   = $fecha;
        $data['menu']    = $menu;
        $filter          = new stdClass();
        $filter->order_by = array("ACCESOP_Codigo"=>"desc");
        $data['accesos'] = $this->Acceso_model->listar($filter);
        $data['header']  = get_header();
        $data['oculto']  = form_hidden(array("serie"=>"","numero"=>"","codot"=>""));
        $this->load->view("seguridad/principal",$data);    
    }
    
    public function salir(){
        session_destroy();
        redirect('inicio/index');
    }
    
    public function contrasena_mensaje(){
        $data['form_open']  = form_open('',array("name"=>"frmContrasena","id"=>"frmContrasena"));
        $data['form_close'] = form_close();         
        $this->load->view("seguridad/contrasena_nuevo",$data);
    }
    
    public function contrasena_enviar(){
        $correo = $this->input->get_post('correo');
        return $correo;
    }    
}