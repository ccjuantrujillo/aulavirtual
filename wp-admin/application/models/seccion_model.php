<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seccion_model extends CI_Model{
    var $table;    
    var $empresa;  

    public function __construct(){
        parent::__construct();
        $this->table         = "ant_seccion";
        $this->table_periodo = "ant_periodo";
        $this->empresa     = $this->session->userdata('empresa');
    }
	
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->SECCIONP_Codigo;
            $valor1    = $valor->SECCIONC_Orden." - ".$valor->SECCIONC_Descripcion;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not="",$number_items='',$offset=''){
        $this->db->select('*,DATE_FORMAT(c.SECCIONC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table.' as c');
        $this->db->join($this->table_periodo.' as q','q.PERIODP_Codigo=c.PERIODP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));          		
        if(isset($filter->seccion))  $this->db->where(array("c.SECCIONP_Codigo"=>$filter->seccion));	
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }   
        $this->db->limit($number_items, $offset); 
        $query = $this->db->get();
        $resultado = array();
        //if($query->num_rows>0){
            $resultado = $query->result();
        //}
        return $resultado;
    }
    
    public function obtener($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1){
            $resultado = "Existe mas de un resultado";
        }
        else
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }

    public function insertar($data){
       $data["EMPRP_Codigo"] = $this->empresa;         
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("SECCIONP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array('SECCIONP_Codigo' => $codigo));        
    }
}
?>