<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Area_model extends CI_Model{
    var $table;
    var $entidad;
    public function __construct(){
        parent::__construct();
        $this->table   = "ant_area";
        $this->empresa     = $this->session->userdata('empresa');  
    }
    
    public function seleccionar($filter,$default="",$value=''){
        $arreglo = array();
        foreach($this->listar($filter) as $indice=>$valor){
            $indice1   = $valor->AREAP_Codigo;
            $valor1    = $valor->AREAC_Descripcion;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }   
    
    public function listar($filter,$order_by='',$number_items='',$offset='')
    {            
       $this->db->select('*,DATE_FORMAT(c.AREAC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->area) && $filter->area!='')    $this->db->where(array("c.AREAP_Codigo"=>$filter->area));
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
    
    public function obtener($codigo)
    {
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
	
    public function modificar($codigo,$data)
    {
        $this->db->where("AREAP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($codigo)
    {
        $this->db->delete($this->table,array('AREAP_Codigo' => $codigo));   
    }
}
?>