<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct() {
        parent::__construct();
        $this->table     = "alumno";
        $this->table_per = "persona";
        $this->empresa = isset($_SESSION["empresa"])?$_SESSION["empresa"]:"";
    }
    
    public function select($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->ALUMP_Codigo;
            $valor1    = $valor->PERSC_ApellidoPaterno." ".$valor->PERSC_ApellidoMaterno." ".$valor->PERSC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function read($filter,$number_items='',$offset=''){
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_per." as d","d.PERSP_Codigo=c.PERSP_Codigo","inner");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->persona))  $this->db->where(array("d.PERSP_Codigo" => trim($filter->persona)));
        if(isset($filter->alumno))   $this->db->where(array("c.ALUMP_Codigo" => $filter->alumno));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }
        //$this->db->limit($number_items, $offset);        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get($filter){
        $resultado = new stdClass();
        $alumno = $this->read($filter);

        if(count($alumno)==1){
            $resultado = $alumno[0];
        }
        return $resultado;
    }    
    
    public function insert($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }
    
    public function update($codigo,$data){
        $this->db->where("ALUMP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
    
    public function delete($codigo){
        return $this->db->delete($this->table,array('ALUMP_Codigo' => $codigo));
    }
}
