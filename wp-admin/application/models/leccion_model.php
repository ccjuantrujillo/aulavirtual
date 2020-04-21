<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leccion_model extends CI_Model{
    var $table;
    
    public function __construct(){
        parent::__construct();
        $this->table   = "ant_leccion";
        $this->table_seccion = "ant_seccion";
        $this->table_curso   = "ant_curso";
        $this->empresa     = $this->config->item('empresa');  
    }
	
    public function seleccionar($default="",$filter="",$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->LECCIONP_Codigo;
            $valor1    = $valor->LECCIONC_Orden." ".$valor->LECCIONC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
	
    public function listar($filter="",$filter_not='',$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as c",$number_items,$offset);  
        $this->db->join($this->table_seccion.' as d','d.SECCIONP_Codigo=c.SECCIONP_Codigo','inner');
        $this->db->join($this->table_curso.' as e','e.CURSOP_Codigo=d.CURSOP_Codigo','inner');        
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa)); 
        if(isset($filter->leccion))  $this->db->where(array("c.LECCIONP_Codigo"=>$filter->leccion));    
        if(isset($filter->seccion))  $this->db->where(array("c.SECCIONP_Codigo"=>$filter->seccion));   
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }           
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
        $this->db->where("LECCIONP_Codigo",$id);
        $this->db->update($this->table,(array)$filter);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array("LECCIONP_Codigo"=>$codigo));
    }
}
?>