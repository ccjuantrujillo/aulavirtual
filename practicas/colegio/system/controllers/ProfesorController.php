<?php
class ProfesorController{
	private $profeModel;

	public function __construct(){
		$this->profeModel = new ProfesorModel();
	}

	public function Index(){
		$profesores = $this->profeModel->read();
		print_r($profesores);
		require_once 'system/views/profesor/index.php';
	}

	public function Create($objProfesor){

	}

	public function Edit($objProfesor){

	}

	public function Delete($id){

	}
}
?>