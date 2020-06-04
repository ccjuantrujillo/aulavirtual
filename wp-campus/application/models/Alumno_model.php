<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct() {
        parent::__construct();
        $this->table     = "alumno";
        $this->table_per = "persona";
        $this->empresa = isset($_SESSION["empresa"])?$_SESSION["empresa"]:"";
    }
    
    public function select(){
        
    }
    
    public function read($filter){
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_per." as d","d.PERSP_Codigo=c.PERSP_Codigo","inner");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->persona))  $this->db->where(array("d.PERSP_Codigo"=>$filter->persona));
        if(isset($filter->alumno))   $this->db->where(array("c.ALUMP_Codigo"=>$filter->alumno));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get($filter){
        $resultado = new stdClass();
        $alumno = $this->read($filter);
        if(count($alumno)==1){
            $resultado = $alumno[0];
        }
        return $resultado;
    }    
    
    public function insert(){
        
    }
    
    public function update(){
        
    }
    
    public function delete(){
        
    }
}
