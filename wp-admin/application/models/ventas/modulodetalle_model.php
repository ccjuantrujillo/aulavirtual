<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulodetalle_model extends CI_Model
{
    var $compania;
    var $table;  
    public function __construct(){
        parent::__construct();
        $this->table_modelodetalle = "ant_modulodetalle";
        $this->table_modelo        = "ant_modulo";
        $this->table_curso         = "ant_curso";
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
        $this->db->select('*',FALSE);
        $this->db->from($this->table_modelodetalle." as c",$number_items,$offset);
        $this->db->join($this->table_modelo.' as d','d.MODULOP_Codigo=c.MODULOP_Codigo','inner');
        $this->db->join($this->table_curso.' as e','e.PROD_Codigo=c.PROD_Codigo','inner');
        if(isset($filter->modulo))                 $this->db->where(array("c.MODULOP_Codigo"=>$filter->modulo));
        if(isset($filter->dia))                    $this->db->where(array("c.MODULODETC_Dia"=>$filter->dia));
        if(isset($filter->curso))                  $this->db->where(array("c.PROD_Codigo"=>$filter->curso));
        if(isset($filter->turno))                  $this->db->where(array("d.TURNOP_Codigo"=>$filter->turno));
        if(isset($filter->modulodetalle) && $filter->modulodetalle!='')   $this->db->where(array("c.MODULODETP_Codigo"=>$filter->modulodetalle));
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
        else
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }

    public function insertar($data){
       $this->db->insert($this->table_modelodetalle,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("MODULODETP_Codigo",$codigo);
        $this->db->update($this->table_modelodetalle,$data);
    }

    public function eliminar($filter){
        if(isset($filter->modulo) && $filter->modulo!='')               $this->db->where(array("MODULOP_Codigo"=>$filter->modulo));
        if(isset($filter->modulodetalle) && $filter->modulodetalle!='') $this->db->where(array("MODULODETP_Codigo"=>$filter->modulodetalle));
        $this->db->delete($this->table_modelodetalle);           
    }
}
?>