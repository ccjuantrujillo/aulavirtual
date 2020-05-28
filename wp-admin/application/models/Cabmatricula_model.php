<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cabmatricula_model extends CI_Model{
    var $table;
    
    public function __construct(){
        parent::__construct();
        $this->table   = "ant_cabmatricula";
        $this->table_alumno = "ant_alumno";
        $this->table_ciclo  = "ant_ciclo";
        $this->empresa = $this->session->userdata('empresa');
    }
    
    public function seleccionar(){
        
    }
    
    public function listar($filter){
        $this->db->select("*");
        $this->db->from($this->table." as c");
        $this->db->join($this->table_alumno." as d","d.ALUMP_Codigo=c.ALUMP_Codigo","inner");
        $this->db->join($this->table_ciclo." as e","e.CICLOP_Codigo=c.CICLOP_Codigo","inner");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->cabmatricula))   $this->db->where(array("c.CABMATP_Codigo"=>$filter->cabmatricula));
        if(isset($filter->alumno))         $this->db->where(array("d.ALUMP_Codigo"=>$filter->alumno));
        if(isset($filter->ciclo))          $this->db->where(array("e.CICLOP_Codigo"=>$filter->ciclo));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        } 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insertar(){
        
    }
    
    public function modificar(){
        
    }
    
    public function eliminar(){
        
    }
}
