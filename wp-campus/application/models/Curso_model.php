<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curso_model extends CI_Model {
    var $title;
    var $content;
    var $date;
    var $table;
    var $empresa;

    public function __construct(){
        $this->table          = "curso";
        $this->table_ciclo    = "ciclo";
        $this->table_profesor = "profesor";
        $this->table_persona  = "persona";
        $this->table_area     = "area";        
        $this->empresa = $this->session->userdata('empresa');
    }

    public function select($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        if($filter=="")  {$filter=new stdClass();$filter->order_by=array("c.CURSOC_Nombre"=>"asc");}
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->CURSOP_Codigo;
            $valor1    = $valor->CURSOC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function read($filter,$number_items='',$offset='')
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_ciclo.' as e','e.CICLOP_Codigo=c.CICLOP_Codigo','inner');
        $this->db->join($this->table_profesor.' as f','f.PROP_Codigo=c.PROP_Codigo','inner');
        $this->db->join($this->table_persona.' as g','g.PERSP_Codigo=f.PERSP_Codigo','inner');
        $this->db->join($this->table_area.' as h','h.AREAP_Codigo=c.AREAP_Codigo','inner');        
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa,"c.CURSOC_FlagEstado"=>1));
        if(isset($filter->profesor))   $this->db->where(array("c.PROP_Codigo"=>$filter->profesor)); 
        if(isset($filter->ciclo) && $filter->ciclo!='')    $this->db->where(array("c.CICLOP_Codigo"=>$filter->ciclo));
        if(isset($filter->estado) && $filter->estado!='')  $this->db->where(array("c.CURSOC_FlagEstado"=>$filter->estado));
        if(isset($filter->curso) && $filter->curso!='')    $this->db->where(array("c.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }  
        //$this->db->limit($number_items, $offset); 
        $query = $this->db->get();
        return $query->result();
    }

    public function obtener($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }    
    
    public function get($id)
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->table);
        $this->db->where('CURSOP_Codigo', $id); 
        $query = $this->db->get();
        return $query->row();
    }        

    public function insert($data)
    {
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function update($codigo,$data){
        $this->db->where("CURSOP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function delete($codigo){
        $this->db->delete($this->table,array('CURSOP_Codigo' => $codigo));        
    }

}