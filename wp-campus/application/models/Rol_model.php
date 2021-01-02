<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rol_model extends CI_Model {
    var $empresa;
    var $tabla;

    public function __construct(){
        $this->tabla = "rol";
    }

    public function seleccionar($filter='',$filter_not=''){
       foreach($this->read($filter,$filter_not) as $indice=>$valor){
            $arreglo[$valor->ROL_Codigo] = $valor->ROL_Descripcion;
       }
       return $arreglo;
    }

    public function read($filter="",$filter_not="")
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        if(isset($filter->rol))        $this->db->where(array("c.ROL_Codigo"=>$filter->rol));
        if(isset($filter_not->rol))    $this->db->where(array("c.ROL_Codigo!="=>$filter_not->rol));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }   
        $this->db->limit($number_items, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function get($filter,$number_items='',$offset='')
    {
        $listado = $this->read($filter,$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else if(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = 0;
        return $resultado;
    }        

    public function insert($data){
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();        
    }
    
    public function update($codigo,$data){
        $this->db->where("ROL_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
    
    public function delete($codigo){
        $this->db->delete($this->table,array('ROL_Codigo' => $codigo));    
    }
}