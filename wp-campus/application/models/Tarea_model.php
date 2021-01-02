<?php 
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarea_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct(){
        parent::__construct();
        $this->table     = "tarea";
        $this->table_tip = "tipotarea";
        $this->table_lec = "leccion";
        $this->table_sec = "seccion";
        $this->table_ciclo  = "ciclo";
        $this->table_cur = "curso";
        $this->table_per = "periodo";
        $this->empresa = $_SESSION["empresa"];
    }
    
    public function select($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->TAREAP_Codigo;
            $valor1    = $valor->TAREAC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }    
    
    public function seleccionar($filter,$default=""){
        $arreglo = array();
        //$arreglo = array(($default!="")?$default:""=>':: Seleccione ::');
        $tareas = $this->listar($filter);
        if(count($tareas)>0){
            $periodo_ant = "";
            foreach($tareas as $item=>$value){
                if($periodo_ant!=$value->PERIODP_Codigo){
                    $arreglo[$value->PERIODP_Codigo."_0"] = $value->PERIODC_DESCRIPCION;
                }
                $arreglo[$value->PERIODP_Codigo."_".$value->TAREAP_Codigo] = "&nbsp&nbsp&nbsp<em>".$value->TAREAC_Nombre."</em>";
                $periodo_ant = $value->PERIODP_Codigo;
            }
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select("*",FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_lec." as d","d.LECCIONP_Codigo=c.LECCIONP_Codigo","inner");
        $this->db->join($this->table_sec." as e","e.SECCIONP_Codigo=d.SECCIONP_Codigo","inner");
        $this->db->join($this->table_cur." as f","f.CURSOP_Codigo=d.CURSOP_Codigo","inner");
        $this->db->join($this->table_per." as g","g.PERIODP_Codigo=d.PERIODP_Codigo","inner");
        $this->db->join($this->table_tip." as h","h.TIPOTAREAP_Codigo=c.TIPOTAREAP_Codigo","inner");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->tarea))    $this->db->where(array("c.TAREAP_Codigo"=>$filter->tarea));  
        if(isset($filter->leccion))  $this->db->where(array("d.LECCIONP_Codigo"=>$filter->leccion));  
        if(isset($filter->seccion))  $this->db->where(array("e.SECCIONP_Codigo"=>$filter->seccion));  
        if(isset($filter->curso))    $this->db->where(array("f.CURSOP_Codigo"=>$filter->curso));  
        if(isset($filter->periodo))  $this->db->where(array("g.PERIODP_Codigo"=>$filter->periodo));  
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }
        //$this->db->limit($number_items, $offset);         
        $query = $this->db->get();
        $resultado = array();
        //if($query->num_rows > 0){
            $resultado = $query->result();
        //}
        return $resultado;         
    }
    
    public function get($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = $listado;
        else if(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = new stdClass ();
        return $resultado;
    }

    public function insert($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function update($codigo,$data){
        $this->db->where("TAREAP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function delete($data){
        $resultado = false;
        if(count($data)>0){
            $resultado = $this->db->delete($this->table,$data);            
        }
        return $resultado;
    }
}
