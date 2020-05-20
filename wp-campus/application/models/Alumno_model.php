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
    
    public function login($filter){
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_per." as d","d.PERSP_Codigo=c.PERSP_Codigo","inner");
        if(isset($filter->empresa))   $this->db->where(array("c.EMPRP_Codigo"=>$filter->empresa));
        if(isset($filter->usuario))   $this->db->where(array("c.ALUMC_Usuario"=>$filter->usuario));
        if(isset($filter->clave))     $this->db->where(array("c.ALUMC_Password"=>$filter->clave));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function read($filter){
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_per." as d","d.ALUMP_Codigo=c.ALUMP_Codigo","inner");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->persona))   $this->db->where(array("d.PERSP_Codigo"=>$this->empresa));
        if(isset($filter->usuario))   $this->db->where(array("d.PERSP_Codigo"=>$this->usuario));
        if(isset($filter->clave))     $this->db->where(array("d.PERSP_Codigo"=>$this->clave));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert(){
        
    }
    
    public function update(){
        
    }
    
    public function delete(){
        
    }
    
    public function get(){
        
    }
}
