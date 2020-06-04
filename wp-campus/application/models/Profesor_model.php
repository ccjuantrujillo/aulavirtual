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
    
    public function read($filter) {
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_per." as d","d.PERSP_Codigo=c.PERSP_Codigo","inner");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->profesor)) $this->db->where(array("c.PROP_Codigo"=>$filter->profesor));
        if(isset($filter->persona))  $this->db->where(array("d.PERSP_Codigo"=>$filter->persona));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get($filter){
        $resultado = new stdClass();
        $profesor = $this->read($filter);
        if(count($profesor)==1){
            $resultado = $profesor[0];
        }
        return $resultado;
    }    
    
    public function create(){
        
    }
    
    public function insert(){
        
    }
    
    public function update(){
        
    }
    
    public function delete(){
        
    }
}
