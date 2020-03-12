<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Access_url_rel_course_model extends CI_Model{
    var $compania;
    var $table;

    public function __construct(){
        parent::__construct();
        $this->compania = $this->session->userdata('compania');
        $this->table   = "access_url_rel_course";
    }
    
    public function listar($filter="",$filter_not='',$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as a",$number_items,$offset);
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }   
        $query = $this->db->get();
        $resultado = array();
        if($query->num_rows > 0){
            $resultado = $query->result();
        }
        return $resultado; 
    }
    
    public function obtener($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else
            $resultado = (object)$listado[0];
        return $resultado;
    }
    
    public function insertar($data){
        $this->db->insert($this->table,$data);
    }
    
    public function modificar($codigo,$data){
        $this->db->where("c_id",$codigo);
        $this->db->update($this->table,$data);
    }
    
    public function eliminar($filter){
        if(isset($filter->code))  $this->db->where(array("course_code"=>$filter->code));
        $this->db->delete($this->table);
    }
}
?>