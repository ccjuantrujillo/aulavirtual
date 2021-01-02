<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesor_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct(){
        parent::__construct();
        $this->table     = "profesor";
        $this->table_per = "persona";
        $this->empresa = isset($_SESSION["empresa"])?$_SESSION["empresa"]:"";
    }
    
    public function select($default='',$filter='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->read($filter,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->PROP_Codigo;
            $valor1    = $valor->PERSC_Nombre." ".$valor->PERSC_ApellidoPaterno;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }    
    
    public function read($filter,$number_items='',$offset='') {
        $this->db->select('*,DATE_FORMAT(c.PROC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c");
        $this->db->join($this->table_per." as d","d.PERSP_Codigo=c.PERSP_Codigo","inner");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->profesor)) $this->db->where(array("c.PROP_Codigo"=>$filter->profesor));
        if(isset($filter->persona))  $this->db->where(array("d.PERSP_Codigo"=>$filter->persona));
        if(isset($filter->borrado))         $this->db->where(array("c.PROC_FlagBorrado"=>$filter->borrado));
        if(isset($filter->flgcoordinador))  $this->db->where(array("c.PROC_FlagCoordinador"=>$filter->flgcoordinador));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }
        $this->db->limit($number_items, $offset);        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get($filter,$number_items='',$offset=''){
        $resultado = new stdClass();
        $profesor = $this->read($filter,$number_items='',$offset='');
        if(count($profesor)==1){
            $resultado = $profesor[0];
        }
        return $resultado;
    }    
    
    public function insert($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function update($codigo,$data){
        $this->db->where("PROP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function delete($codigo){
        $this->db->delete($this->table,array('PROP_Codigo' => $codigo));
    }
}
