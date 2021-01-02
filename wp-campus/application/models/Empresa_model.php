<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_model extends CI_Model {

    var $title;
    var $content;
    var $date;
    var $empresa;

    public function __construct(){
        $this->empresa  = $this->config->item('empresa');
        $this->table    = "empresa";
        $this->table_sector = "sector";             
    }

    public function seleccionar($filter=''){
       $arreglo = array(""=>':: Seleccione ::');
       foreach($this->read($filter) as $indice=>$valor){
            $arreglo[$valor->EMPRP_Codigo] = $valor->EMPRC_RazonSocial;
       }
       return $arreglo;
    }        

    public function read($filter="",$number_items='',$offset='')
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_sector.' as d','d.SECTORP_Codigo=c.SECTORP_Codigo','inner');
        if(isset($filter->empresa) && $filter->empresa!='')    $this->db->where(array("p.EMPRP_Codigo"=>$filter->empresa));        
        if(isset($filter->sector) && $filter->sector!='')      $this->db->where(array("p.SECTORP_Codigo"=>$filter->sector));             
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }   
        if(isset($filter->empresa))        $this->db->where(array("c.EMPRP_Codigo"=>$filter->empresa));
        $this->db->limit($number_items, $offset);  
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id)
    {
            $this->db->select('*',FALSE);
            $this->db->from('empresa');
            $this->db->where('EMPRP_Codigo', $id); 
            $query = $this->db->get();
            return $query->row();
    }        

    public function insert($data){
      $this->db->insert($this->table,$data);
      return $this->db->insert_id();
   }

    public function update($id,$filter){
        $this->db->where("EMPRP_Codigo",$id);
        $this->db->update($this->table,(array)$filter);
    }

    public function delete($filter){
        if(isset($filter->empresa) && $filter->empresa!='')  $this->db->where(array("EMPRP_Codigo"=>$filter->empresa));        
        $this->db->delete($this->table); 
    }

    public function search($filter,$number_items='',$offset='')
    {       
        if(isset($filter->EMPRC_Ruc) && $filter->EMPRC_Ruc!="")
            $this->db->where('EMPRC_Ruc',$filter->EMPRC_Ruc);
        if(isset($filter->EMPRC_RazonSocial) && $filter->EMPRC_RazonSocial!="")
            $this->db->like('EMPRC_RazonSocial',$filter->EMPRC_RazonSocial);
        if(isset($filter->EMPRC_Telefono) && $filter->EMPRC_Telefono!="")
            $this->db->like('EMPRC_Telefono',$filter->EMPRC_Telefono)->or_like('EMPRC_Movil',$filter->EMPRC_Telefono);

        $query = $this->db->order_by('EMPRC_RazonSocial')
                          ->where('EMPRC_FlagEstado','1')
                          ->get('cji_empresa',$number_items='',$offset='');
        if($query->num_rows>0){
            foreach($query->result() as $fila){
                    $data[] = $fila;
            }
            return $data;
        }
    }        
        
}