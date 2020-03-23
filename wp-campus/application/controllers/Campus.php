<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Campus extends LayoutAdmin{
	var $datosCurso;
	var $menu;

	public function __construct(){
		parent::__construct();
		$this->load->model('Curso_model');
		$this->load->model('Seccion_model');
		$this->load->model('Leccion_model');
		$this->load->helper('menuizquierdo_helper');
	}
}