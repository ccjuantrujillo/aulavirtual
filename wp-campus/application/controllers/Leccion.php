<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Leccion extends LayoutAdmin{
	public function __construct(){
		parent::__construct();
		$this->load->model('Leccion_model');
		$this->load->helper('menu_helper');
		$this->load->helper('lecciones_helper');
	}

	public function inicio($lec,$indice="")
	{
		$leccion = $this->Leccion_model->get($lec);		
		$curso   = $leccion->CURSOP_Codigo;
		$seccion = $leccion->SECCIONP_Codigo;
		$data['descripcion'] = str_replace("images",base_url()."assets/img",$leccion->LECCIONC_Descripcion);
		$data['leccion']  = $leccion;
		$data['indice']   = $indice;
		$data['menulecc'] = menu_lecciones($seccion);
		$data['menuizq']  = menu_izq($curso);
		$data['menuhorz'] = menu_horiz_lecc($lec,$indice);
		$this->load_layout('leccion/inicio',$data);
	}

}