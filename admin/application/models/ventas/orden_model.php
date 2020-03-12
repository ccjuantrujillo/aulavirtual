<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orden_model extends CI_Model
{
    var $compania;
    var $table;  
    public function __construct(){
        parent::__construct();
        $this->compania = $this->session->userdata('compania');
        $this->table      = "orden";
        $this->table_cli  = "cliente";
        $this->table_prod = "producto";
        $this->table_per  = "persona";
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
        $where = array("c.COMPP_Codigo"=>$this->compania);
        if(isset($filter->orden) && $filter->orden!='')     $where = array_merge($where,array("c.ORDENP_Codigo"=>$filter->orden));
        if(isset($filter->cliente) && $filter->cliente!='') $where = array_merge($where,array("c.CLIP_Codigo"=>$filter->cliente));
        if(isset($filter->producto) && $filter->producto!='') $where = array_merge($where,array("c.PROD_Codigo"=>$filter->producto));
        $this->db->select('*,DATE_FORMAT(c.ORDENC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_cli.' as d','d.CLIP_Codigo=c.CLIP_Codigo','inner');
        $this->db->join($this->table_per.' as e','e.PERSP_Codigo=d.PERSP_Codigo','inner');
        $this->db->join($this->table_prod.' as f','f.PROD_Codigo=c.PROD_Codigo','inner');
        $this->db->where($where);    
        if(isset($filter_not->persona) && $filter_not->persona!=''){
            if(is_array($filter_not->persona) && count($filter_not->persona)>0){
                $this->db->where_not_in('c.ORDENP_Codigo',$filter_not->persona);
            }
            else{
                $this->db->where('c.ORDENP_Codigo !=',$filter_not->persona);
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
            $resultado = (object)$listado[0];
        return $resultado;
    }

    public function insertar($data){
       $data['COMPP_Codigo'] = $this->compania; 
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("ORDENP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($codigo){
        $this->db->delete($this->table,array('ORDENP_Codigo' => $codigo));        
    }
}
?>