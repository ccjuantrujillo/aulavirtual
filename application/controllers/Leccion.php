<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'LayoutAdmin.php';

class Leccion extends LayoutAdmin{
	public function __construct(){
		parent::__construct();
		$this->load->model('Leccion_model');
		$this->load->model('Seccion_model');		
		$this->load->model('Curso_model');
		$this->load->helper('menuizquierdo_helper');
	}

	public function inicio($seccion,$lec,$indice="")
	{
		$curso   = $this->Seccion_model->get($seccion);
		$leccion = $this->Leccion_model->get($lec);		
		//Recuperamos las lecciones de la seccion
		$filter = new stdClass();
		$filter->seccion = $seccion;		
		$lecciones = $this->Leccion_model->read($filter);
		$filalecciones = "";
		$i = 0;
		foreach($lecciones as $value){
			$i++;
			$filalecciones .= "<li><a href='".base_url()."leccion/inicio/".$value->SECCIONP_Codigo."/".$value->LECCIONP_Codigo."/".$i."'>".$curso->SECCIONC_Orden.".".$i." ".$value->LECCIONC_Nombre."</a></li>";
		}
		$data['descripcion'] = str_replace("images",base_url()."assets/img",$leccion->LECCIONC_Descripcion);
		$data['fila']    = "";
		$data['filalecciones']    = $filalecciones;
		$data['curso']   = $curso;
		$data['leccion'] = $leccion;
		$data['indice']  = $indice;
		$data['menuizq'] = menu_izq($curso->CURSOP_Codigo);
		$this->load_layout('leccion/inicio',$data);
	}

}