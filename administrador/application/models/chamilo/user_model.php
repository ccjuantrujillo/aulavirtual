<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    var $compania;
    var $table;

    public function __construct(){
        parent::__construct();
        $this->compania = $this->session->userdata('compania');
        $this->table   = "user";
    }
    
    public function seleccionar($default='',$filter="",$filter_not='',$number_items='',$offset=''){   
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not='',$number_items='',$offset='') as $indice=>$valor)
        {
            $indice1   = $valor->id;
            $valor1    = $valor->title;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter="",$filter_not='',$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as a",$number_items,$offset);
        if(isset($filter->user_id))   $this->db->where(array("a.user_id"=>$filter->user_id));
        if(isset($filter->status))    $this->db->where(array("a.status"=>$filter->status));
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
        return $this->db->insert_id();
    }
    
    public function modificar($codigo,$data){
        $this->db->where("user_id",$codigo);
        $this->db->update($this->table,$data);
    }
    
    public function eliminar($filter){
        if(isset($filter->user_id))   $this->db->where(array("user_id"=>$filter->user_id));
        $this->db->delete($this->table);
    }
}
?>