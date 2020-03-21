<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Layout.php';

class Seccion extends Layout{
	private $datosCurso;

	public function __construct(){
		parent::__construct();
		$this->load->model('Seccion_model');
		$this->load->model('Leccion_model');
		$this->load->helper('menuizquierdo_helper');
	}

	public function inicio($id)
	{
		$seccion = $this->Seccion_model->get($id);
		$data['curso']    = $seccion->CURSOP_Codigo;
		$data['ordseccion']  = $seccion->SECCIONC_Orden;
		$data['nomcurso'] = $seccion->CURSOC_Nombre;
		$data['nomseccion'] = $seccion->SECCIONC_Descripcion;
		$data['menuizq']    = menu_izq($id);
		//Obtenemos secciones
		$filter = new stdClass();
		$filter->curso = $data['curso'];
		$secciones = $this->Seccion_model->read($filter);
		$fila = "";
		$filaizq = "";
		foreach($secciones as $value){
			$filaizq.="<li>";
			$filaizq.="<a href='".base_url()."seccion/inicio/".$value->SECCIONP_Codigo."'>".$value->SECCIONC_Orden.'. '.$value->SECCIONC_Descripcion."</a>";
			$filaizq.="</li>";
		}
		//Obtenemos lecciones
		$filter = new stdClass();
		$filter->seccion = $id;
		$lecciones = $this->Leccion_model->read($filter);
		$filalecciones = "<ul>";
		$i = 0;
		foreach($lecciones as $value){
			$filalecciones  .= "<li><a href='".base_url()."leccion/".$value->LECCIONP_Codigo."'>".$data['ordseccion'].".".++$i." ".$value->LECCIONC_Nombre."</a></li>";
		}
		$data['fila'] = $fila;
		$data['filaizq'] = $filaizq;		
		$data['filalecciones'] = $filalecciones;		
		$this->load_layout('seccion/inicio',$data);
	}

}
