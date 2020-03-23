<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Inicio extends Layout{

	public function __construct(){
		parent::__construct();
		$this->load->model('Curso_model');
	}

	public function index()
	{
		redirect('/inicio/read');
	}

	public function read(){
		$data["cursos"] = $this->Curso_model->read();
		$this->load_layout('inicio/read',$data);
	}
}