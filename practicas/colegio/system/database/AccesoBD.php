<?php
abstract class AccesoBD{
	private $cn;
	private $dbase = "Colegio";
	private $host="localhost";
	private $user="root";
	private $password = "950162";
	
	public function getConexion(){
		try{
			$dsn = "mysql:host=".$this->host.";dbname=".$this->dbase."";
			$this->cn = new PDO($dsn,$this->user,$this->password);	
			$this->cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
		}
	}
}
?>