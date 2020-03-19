<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo_model extends CI_Model
{
    var $compania;
    public function __construct(){
        parent::__construct();
        $this->table_modulo = "ant_modulo";
        $this->table_turno  = "ant_turno";
        $this->table_tipoestudio  = "ant_tipoestudio";
    }
    
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->MODULOP_Codigo;
            $valor1    = $valor->MODULOC_Descripcion;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*',FALSE);
        $this->db->from($this->table_modulo." as c",$number_items,$offset);
        $this->db->join($this->table_turno.' as d','d.TURNOP_Codigo=c.TURNOP_Codigo','inner');
        $this->db->join($this->table_tipoestudio.' as e','e.TIPP_Codigo=c.TIPP_Codigo','inner');
        if(isset($filter->turno) && $filter->turno!='')    $this->db->where(array("c.TURNOP_Codigo"=>$filter->turno));
        if(isset($filter->tipoestudio))    $this->db->where(array("c.TIPP_Codigo"=>$filter->tipoestudio));
        if(isset($filter->modulo) && $filter->modulo!='')              $this->db->where(array("c.MODULOP_Codigo"=>$filter->modulo));         
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }                 
        $query = $this->db->get();
        $resultado = array();
        if($query->num_rows > 0){
            $resultado = $query->result();
        }
        return $resultado; 
    }

    public function obtener($filter,$filter_not='',$number_items='',$offset=''){
        $listado = $this->listar($filter,$filter_not='',$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        elseif(count($listado)==1)
            $resultado = (object)$listado[0];
        else 
            $resultado = (object)array();
        return $resultado;
    }

    public function insertar($data){
       $this->db->insert($this->table_modulo,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("MODULOP_Codigo",$codigo);
        $this->db->update($this->table_modulo,$data);
    }

    public function eliminar($codigo){
        $this->db->delete($this->table_modulo,array('MODULOP_Codigo' => $codigo));        
    }
}
?>