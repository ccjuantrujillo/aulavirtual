<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Curso extends LayoutAdmin{
	var $datosCurso;
	var $menu;

	public function __construct(){
		parent::__construct();
		$this->load->model('Curso_model');
		$this->load->model('Leccion_model');
		$this->load->helper('menu_helper');
	}

	public function inicio($curso)
	{
		$data['menuizq']   = menu_izq($curso);
		$data['curso']     = $this->Curso_model->get($curso);
		$filter = new stdClass();
		$filter->curso = $curso;
		$data['lecciones'] = $this->Leccion_model->read($filter);
		$this->load_layout('curso/inicio',$data);
	}		
}