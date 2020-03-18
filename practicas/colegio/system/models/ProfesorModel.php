<?php
class ProfesorModel extends AccesoBD{

	public function __construct(){
		$this->getConexion();
	}

	public function read(){
		$result = $this->cn->prepare("select * from profesor");
		$result->setFechMode(PDO::OBJECT);
		$result->execute();
		return $result->fetchAll();
	}
	
	public function create($objProfesor){
		$result = $this->cn->prepare("insert into profesor values (?,?,?,?,?)");
		$result->bindParam(1,$objProfesor->Codigo);
		$result->bindParam(1,$objProfesor->Codigo);
		$result->bindParam(1,$objProfesor->Codigo);
		$result->execute();
	}

	public function delete(){

	}

	public functiOn update(){

	}
}
?>