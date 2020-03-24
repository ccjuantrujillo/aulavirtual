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
		redirect(base_url()."curso/read");
	}
}