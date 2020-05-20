<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct(){
        parent::__construct();
        $this->table     = "profesor";
        $this->table_per = "persona";
        $this->empresa = isset($_SESSION["empresa"])?$_SESSION["empresa"]:"";
    }
    
    public function login($filter){
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_per." as d","d.PERSP_Codigo=c.PERSP_Codigo","inner");
        if(isset($filter->empresa))   $this->db->where(array("c.EMPRP_Codigo"=>$filter->empresa));
        if(isset($filter->usuario))   $this->db->where(array("c.PROC_Usuario"=>$filter->usuario));
        if(isset($filter->clave))     $this->db->where(array("c.PROC_Password"=>$filter->clave));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function read($filter) {
        
    }
    
    public function create(){
        
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
