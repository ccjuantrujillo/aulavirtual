<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Persona_model extends CI_Model
{
    var $table;  
    
    public function __construct(){
        parent::__construct();
        $this->table   = "ant_persona";    
        $this->empresa = $this->config->item('empresa');          
    }
    
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->PERSP_Codigo;
            $valor1    = $valor->PERSC_ApellidoPaterno." ".$valor->PERSC_ApellidoMaterno." ".$valor->PERSC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));        
        if(isset($filter->persona) && $filter->persona!='')            $this->db->where(array("c.PERSP_Codigo"=>$filter->persona));
        if(isset($filter_not->persona) && $filter_not->persona!=''){
            if(is_array($filter_not->persona) && count($filter_not->persona)>0){
                $this->db->where_not_in('p.PERSP_Codigo',$filter_not->persona);
            }
            else{
                $this->db->where('p.PERSP_Codigo !=',$filter_not->persona);
            }            
        }            
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }           
        $this->db->limit($number_items, $offset);         
        $query = $this->db->get();
        $resultado = array();
        //if($query->num_rows > 0){
            $resultado = $query->result();
        //}
        return $resultado; 
    }     
    
    public function obtener($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else
            $resultado = (object)$listado[0];
        return $resultado;
    }

    public function insertar($data){
       $data["EMPRP_Codigo"] = $this->empresa;        
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("PERSP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($codigo){
        return $this->db->delete($this->table,array('PERSP_Codigo' => $codigo));        
    }
}
?>