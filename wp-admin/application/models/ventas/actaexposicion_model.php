<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Actaexposicion_model extends CI_Model{
    var $usuario;
    var $table;
    
    public function __construct(){
        parent::__construct();
        $this->usuario     = $this->session->userdata('codusu');
        $this->table_acta  = "ant_acta";
        $this->table_actaexposicion  = "ant_actaexposicion";
        $this->table_profe = "ant_profesor";
        $this->table_pers  = "ant_persona";
        $this->table_curso = "ant_curso";
        $this->table_tema = "ant_tema";
    }
	
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->ACTAP_Codigo;
            $valor1    = $valor->ACTAC_Numero;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not="",$number_items='',$offset=''){
        $this->db->select('*,c.PROP_Codigo as codprofesor');
        $this->db->from($this->table_actaexposicion." as c");
        $this->db->join($this->table_profe.' as d','d.PROP_Codigo=c.PROP_Codigo','inner');
        $this->db->join($this->table_pers.' as f','f.PERSP_Codigo=d.PERSP_Codigo','inner');
        $this->db->join($this->table_curso.' as g','g.PROD_Codigo=d.PROD_Codigo','inner');
        $this->db->join($this->table_acta.' as e','e.ACTAP_Codigo=c.ACTAP_Codigo','inner');        
        $this->db->join($this->table_tema.' as h','h.PRODATRIBDET_Codigo=c.PRODATRIBDET_Codigo','inner'); 
        $this->db->where(array("d.PROC_FlagBorrado"=>1));		
        if(isset($filter->profesor) && $filter->profesor!='') $this->db->where(array("d.PROP_Codigo"=>$filter->profesor));
        if(isset($filter->curso))                             $this->db->where(array("g.PROD_Codigo"=>$filter->curso));
        if(isset($filter->acta))                              $this->db->where(array("e.ACTAP_Codigo"=>$filter->acta));  
        if(isset($filter->actaexposicion))                    $this->db->where(array("c.ACTAEXPOSP_Codigo"=>$filter->actaexposicion));  
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }           
        $this->db->limit($number_items, $offset); 
        $query = $this->db->get();
        $resultado = array();
        if($query->num_rows>0){
            $resultado = $query->result();
        }
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
       $this->db->insert($this->table_actaexposicion,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("ACTAPROFP_Codigo",$codigo);
        $this->db->update($this->table_actaexposicion,$data);
    }
	
    public function eliminar($filter){
        if(isset($filter->acta) && $filter->acta!='')                   $this->db->where(array("ACTAP_Codigo"=>$filter->acta));
        if(isset($filter->actaexposicion) && $filter->actaexposicion!='')   $this->db->where(array("ACTAEXPOSP_Codigo"=>$filter->actaexposicion));
        $this->db->delete($this->table_actaexposicion);        
    }
}
?>