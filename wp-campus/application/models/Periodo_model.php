<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodo_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct() {
        parent::__construct();
        $this->table   = "periodo";
        $this->empresa = $_SESSION["empresa"];
    }
    
    public function read($filter){
        $this->db->select("*",false);
        $this->db->from($this->table." as c");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }          
        $query = $this->db->get();
        return $query->result();
    }
}
