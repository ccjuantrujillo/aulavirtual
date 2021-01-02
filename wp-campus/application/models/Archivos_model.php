<?php 
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
class Archivos_model extends CI_Model {
    var $title;
    var $content;
    var $date;
    var $empresa;
    var $tabla;

    public function __construct(){
            $this->tabla     = "archivos";
            $this->tabla_lec = "leccion";
            $this->tabla_sec = "seccion";
            $this->table_curso   = "curso";
            $this->table_periodo = "periodo";
            $this->empresa   =  $_SESSION["empresa"];
    }

    public function select($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->ARCHIVP_Codigo;
            $valor1    = $valor->ARCHIVC_Descripcion;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }    
    
    public function read($filter="",$campos="*",$number_items='',$offset='')
    {
        $campos = $campos!="*"?implode(",",$campos):$campos;
        $this->db->select($campos,FALSE);
        $this->db->from($this->tabla." as c");
        $this->db->join($this->tabla_lec.' as d','d.LECCIONP_Codigo=c.LECCIONP_Codigo','inner');
        $this->db->join($this->tabla_sec.' as e','e.SECCIONP_Codigo=d.SECCIONP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->archivo))    $this->db->where(array("c.ARCHIVP_Codigo"=>$filter->archivo));
        if(isset($filter->leccion))    $this->db->where(array("c.LECCIONP_Codigo"=>$filter->leccion));
        if(isset($filter->seccion))    $this->db->where(array("e.SECCIONP_Codigo"=>$filter->seccion));
        if(isset($filter->curso))      $this->db->where(array("e.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }       
        $this->db->limit($number_items, $offset); 
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
    
    public function update($codigo,$data){
        $this->db->where("ARCHIVP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function delete($codigo){
        $this->db->delete($this->table,array('ARCHIVP_Codigo' => $codigo));        
    }

}