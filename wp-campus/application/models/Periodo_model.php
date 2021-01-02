<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodo_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct() {
        parent::__construct();
        $this->table   = "periodo";
        $this->empresa = $this->session->userdata('empresa');  
    }
    
    public function read($filter,$number_items='',$offset=''){
        $this->db->select("*",false);
        $this->db->from($this->table." as c");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->estado) && $filter->estado!='')  $this->db->where(array("c.PERIODC_FLAGESTADO"=>$filter->estado));  
        if(isset($filter->periodo) && $filter->periodo!='')  $this->db->where(array("c.PERIODP_Codigo"=>$filter->periodo));
        if(isset($filter->ciclo))  $this->db->where(array("c.CICLOP_Codigo"=>$filter->ciclo));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }          
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }
	
    public function insert($data){
       $data["EMPRP_Codigo"] = $this->empresa; 
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }
	
    public function update($id,$filter){
        $this->db->where("PERIODP_Codigo",$id);
        $this->db->update($this->table,(array)$filter);
    }
	
    public function delete($codigo){
        $this->db->delete($this->table,array('PERIODP_Codigo' => $codigo));
    }
}
