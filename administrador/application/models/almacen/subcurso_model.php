<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subcurso_model extends CI_Model{
    var $table;
    public function __construct(){
        parent::__construct();
        $this->table       = "ant_subcurso";
        $this->table_curso = "ant_curso";
    }
	
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->SUBCURSOP_Codigo;
            $valor1    = $valor->SUBCURSOC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not="",$number_items='',$offset=''){
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as p");
        $this->db->join($this->table_curso.' as q','q.PROD_Codigo=p.PROD_Codigo','inner');   
        if(isset($filter->curso) && $filter->curso!='')             $this->db->where(array("p.PROD_Codigo"=>$filter->curso));
        if(isset($filter->subcurso) && $filter->subcurso!='')       $this->db->where(array("p.SUBCURSOP_Codigo"=>$filter->subcurso));
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
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }

    public function insertar($data){
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("SUBCURSOP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array('SUBCURSOP_Codigo' => $codigo));        
    }
}
?>