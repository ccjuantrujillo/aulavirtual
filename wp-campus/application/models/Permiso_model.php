<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Permiso_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct() {
        parent::__construct();
        $this->table      = "permiso";
        $this->table_menu = "menu";
        $this->empresa = $this->session->userdata("empresa");
    }
    
    public function listar($filter){
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_menu." as d","d.MENU_Codigo=c.MENU_Codigo","inner");
        $this->db->where(array("d.MENU_FlagEstado"=>1));
        if(isset($filter->rol))     $this->db->where(array("c.ROL_Codigo"=>$filter->rol));
        if(isset($filter->codigo_padre))     $this->db->where(array("d.MENU_Codigo_Padre"=>$filter->codigo_padre));
        if(isset($filter->order_by) && is_array($filter->order_by)){
            foreach($filter->order_by as $indice=>$value) $this->db->order_by($indice,$value);
        } 
        $query = $this->db->get();        
        return $query->result();
    }
}
