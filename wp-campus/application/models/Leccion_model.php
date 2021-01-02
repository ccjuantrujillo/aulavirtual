<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

class Leccion_model extends CI_Model {

    var $title;
    var $content;
    var $date;
    var $empresa;
    var $tabla;

    public function __construct(){
        $this->tabla   = "leccion";
        $this->tabla_seccion = "seccion";
        $this->table_periodo = "periodo";
        $this->tabla_curso   = "curso";
        $this->empresa =  $_SESSION["empresa"];
    }

    public function select($default="",$filter="",$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->LECCIONP_Codigo;
            $valor1    = $valor->LECCIONC_Orden." ".$valor->LECCIONC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }        
        
    public function read($filter="",$number_items='',$offset='')
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        $this->db->join($this->tabla_seccion.' as d','d.SECCIONP_Codigo=c.SECCIONP_Codigo','inner');
        $this->db->join($this->tabla_curso.' as e','e.CURSOP_Codigo=c.CURSOP_Codigo','inner');
        $this->db->join($this->table_periodo.' as f','f.PERIODP_Codigo=c.PERIODP_Codigo','inner');          
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->curso))    $this->db->where(array("e.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->seccion))  $this->db->where(array("c.SECCIONP_Codigo"=>$filter->seccion));
        if(isset($filter->leccion))  $this->db->where(array("c.LECCIONP_Codigo"=>$filter->leccion));
        if(isset($filter->estadoseccion))  $this->db->where(array("d.SECCIONC_FlagEstado"=>$filter->estadoseccion));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }               
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
       $data["EMPRP_Codigo"] = $this->empresa;       
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }
	
    public function update($id,$filter){
        $this->db->where("LECCIONP_Codigo",$id);
        $this->db->update($this->table,(array)$filter);
    }
	
    public function delete($codigo){
        $this->db->delete($this->table,array("LECCIONP_Codigo"=>$codigo));
    }

}