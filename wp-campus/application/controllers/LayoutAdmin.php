<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class LayoutAdmin  extends CI_Controller {
    private $empresa;
    protected $script;
    
    public function __construct () {
        parent::__construct();
        $this->load->helper('url');
        //if(!isset($_SESSION['login'])) die("Sesion terminada. <a href='".  base_url()."'>Registrarse e ingresar.</a> ");
        if(!isset($_SESSION['login'])) redirect('inicio/index');
        $this->load->model('Empresa_model');
        $this->load->model('Usuarioempresa_model');
        $this->empresa = $this->session->userdata('empresa');
        $this->user    = $this->session->userdata('user');
    }

    public function load_layout($view, $params = null)
    {
        $data['script']  = $this->script;
        $data['empresa'] = $this->Empresa_model->get($this->empresa);
        $data['content'] = $this->load->view($view, $params, true);
        $filter          = new stdClass();
        $filter->usuario = $this->user;
        $data['lista_compania'] = $this->Usuarioempresa_model->read($filter);
        $this->load->view('layoutadmin/load_layout',$data, false);
 
    }
}