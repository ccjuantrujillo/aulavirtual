<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Archivos_model extends CI_Model {
    var $title;
    var $content;
    var $date;
    var $empresa;
    var $tabla;

    public function __construct(){
            $this->tabla     = "archivos";
            $this->tabla_lec = "leccion";
            $this->tabla_sec = "seccion";
            $this->empresa   =  $_SESSION["empresa"];
    }

	public function read($filter="")
	{
	    $this->db->select('*',FALSE);
	    $this->db->from($this->tabla." as c");
	    $this->db->join($this->tabla_lec.' as d','d.LECCIONP_Codigo=c.LECCIONP_Codigo','inner');
	    $this->db->join($this->tabla_sec.' as e','e.SECCIONP_Codigo=d.SECCIONP_Codigo','inner');
	    $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
	    if(isset($filter->archivo))    $this->db->where(array("c.ARCHIVP_Codigo"=>$filter->archivo));
	    if(isset($filter->leccion))    $this->db->where(array("c.LECCIONP_Codigo"=>$filter->leccion));
	    if(isset($filter->seccion))    $this->db->where(array("e.SECCIONP_Codigo"=>$filter->seccion));
	    if(isset($filter->curso))      $this->db->where(array("e.CURSOP_Codigo"=>$filter->curso));
	    $query = $this->db->get();
	    return $query->result();
	}

}