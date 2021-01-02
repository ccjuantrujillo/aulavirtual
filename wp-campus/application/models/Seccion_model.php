<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seccion_model extends CI_Model {
    var $title;
    var $content;
    var $date;
    var $empresa;
    var $tabla;

    public function __construct(){
        $this->tabla = "seccion";
        $this->table_periodo = "periodo";
        $this->tabla_curso = "curso";
        $this->empresa =  $_SESSION["empresa"];
    }

    public function select($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->SECCIONP_Codigo;
            $valor1    = $valor->SECCIONC_Orden." - ".$valor->SECCIONC_Descripcion;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }    
    
    public function read($filter="")
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        $this->db->join($this->tabla_curso." as d","d.CURSOP_Codigo=c.CURSOP_Codigo","inner");
        $this->db->join($this->table_periodo.' as e','e.PERIODP_Codigo=c.PERIODP_Codigo','inner');        
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->seccion))  $this->db->where(array("c.SECCIONP_Codigo"=>$filter->seccion));	
        if(isset($filter->curso))    $this->db->where(array("d.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->periodo))    $this->db->where(array("c.PERIODP_Codigo"=>$filter->periodo));
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
        if(count($listado)>1){
            $resultado = "Existe mas de un resultado";
        }
        else
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }

    public function insert($data){
       $data["EMPRP_Codigo"] = $this->empresa;         
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function update($codigo,$data){
        $this->db->where("SECCIONP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function delete($codigo){
        $this->db->delete($this->table,array('SECCIONP_Codigo' => $codigo));        
    }

}