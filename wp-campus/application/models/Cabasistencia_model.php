<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cabasistencia_model extends CI_Model{
    var $usuario;
    var $table;
    
    public function __construct(){
        parent::__construct();
        $this->usuario     = $this->session->userdata('codusu');
        $this->table       = "cabasistencia";
        $this->table_curs  = "curso";
        $this->empresa     =  $_SESSION["empresa"];
    }
    
    public function seleccionar($filter,$default="",$value=''){
        $arreglo = array();
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter) as $indice=>$valor){
            $indice1   = $valor->CABASISTP_Codigo;
            $valor1    = date_sql($valor->CABASISTC_Fecha);
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }        
    
    public function listar($filter,$filter_not="",$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as c");
        $this->db->join($this->table_curs.' as d','d.CURSOP_Codigo=c.CURSOP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->curso))         $this->db->where(array("c.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->asistencia))    $this->db->where(array("c.ASISTP_Codigo"=>$filter->asistencia));
        if(isset($filter->cabasistencia)) $this->db->where(array("c.CABASISTP_Codigo"=>$filter->cabasistencia));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }     
        //$this->db->limit($number_items, $offset); 
        $query = $this->db->get();
        $resultado = array();
        //if($query->num_rows>0){
            $resultado = $query->result();
        //}
        return $resultado;
    }
    
    public function obtener($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = $listado;
        elseif(count($listado)==1)
            $resultado = $listado;
        else 
            $resultado = array();
        return $resultado;
    }

    public function insertar($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("CABASISTP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array('CABASISTP_Codigo'=>$codigo));        
    }
}
?>