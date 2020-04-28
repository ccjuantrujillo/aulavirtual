<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Periodo_model extends CI_Model{
    var $table;
    var $empresa;    
    
    public function __construct(){
        parent::__construct();
        $this->table       = "ant_periodo";
        $this->table_ciclo = "ant_ciclo";
        $this->empresa     = $this->session->userdata('empresa');  
    }
	
    public function seleccionar($default="",$filter="",$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->PERIODP_Codigo;
            $valor1    = $valor->PERIODC_DESCRIPCION;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
	
    public function listar($filter="",$filter_not='',$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as c",$number_items,$offset);  
        $this->db->join($this->table_ciclo.' as e','e.CICLOP_Codigo=c.CICLOP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));        
        $this->db->where(array("c.PERIODC_FLAGESTADO"=>1));  
        if(isset($filter->estado) && $filter->estado!='')  $this->db->where(array("c.PERIODC_FLAGESTADO"=>$filter->estado));  
        if(isset($filter->periodo) && $filter->periodo!='')  $this->db->where(array("c.PERIODP_Codigo"=>$filter->periodo));
        if(isset($filter->ciclo))  $this->db->where(array("c.CICLOP_Codigo"=>$filter->ciclo));
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
            $resultado = "Existe mas de un resultado";
        else
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }
	
    public function insertar($data){
       $data["EMPRP_Codigo"] = $this->empresa; 
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }
	
    public function modificar($id,$filter){
        $this->db->where("PERIODP_Codigo",$id);
        $this->db->update($this->table,(array)$filter);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array('PERIODP_Codigo' => $codigo));
    }
}
?>