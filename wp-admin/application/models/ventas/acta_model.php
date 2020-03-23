<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Acta_model extends CI_Model{
    var $usuario;
    var $table;
    
    public function __construct(){
        parent::__construct();
        $this->usuario     = $this->session->userdata('codusu');
        $this->table       = "ant_acta";
        $this->table_profe = "ant_profesor";
        $this->table_pers  = "ant_persona";
        $this->table_tipoestudiociclo = "ant_tipoestudiociclo";
        $this->table_tipoestudio      = "ant_tipoestudio";
        $this->table_ciclo            = "ant_ciclo";
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
        $this->db->select('*,DATE_FORMAT(p.ACTAC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as p");
        $this->db->join($this->table_profe.' as e','e.PROP_Codigo=p.PROP_Codigo','inner');
        $this->db->join($this->table_pers.' as f','f.PERSP_Codigo=e.PERSP_Codigo','inner');
        $this->db->join($this->table_tipoestudiociclo.' as g','g.TIPCICLOP_Codigo=p.TIPCICLOP_Codigo','inner');
        $this->db->join($this->table_tipoestudio.' as h','h.TIPP_Codigo=g.TIPP_Codigo','inner');
        $this->db->join($this->table_ciclo.' as i','i.CICLOP_Codigo=g.CICLOP_Codigo','inner');
        if(isset($filter->acta) && $filter->acta!='')         $this->db->where(array("p.ACTAP_Codigo"=>$filter->acta));
        if(isset($filter->curso) && $filter->curso!='')       $this->db->where(array("e.PROD_Codigo"=>$filter->curso));
        if(isset($filter->profesor) && $filter->profesor!='') $this->db->where(array("p.PROP_Codigo"=>$filter->profesor));
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
            $resultado = (object)$listado[0];
        return $resultado;
    }

    public function insertar($data){
       $data['USUA_Codigo'] = $this->usuario; 
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("ACTAP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($filter){
        if(isset($filter->acta) && $filter->acta!='') $this->db->where(array("ACTAP_Codigo"=>$filter->acta));
        $this->db->delete($this->table);           
    }
}
?>