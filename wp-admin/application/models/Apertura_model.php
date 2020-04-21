<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Apertura_model extends CI_Model
{
    var $compania;
    var $table;  
    public function __construct(){
        parent::__construct();
        $this->compania = $this->session->userdata('compania');
        $this->table              = "ant_apertura";
        $this->t_tipoestudio      = "ant_tipoestudio";
        $this->t_tipoestudiociclo = "ant_tipoestudiociclo";
        $this->table_aula         = "ant_aula";
        $this->table_local        = "ant_local";
        $this->table_ciclo        = "ant_ciclo";
        $this->table_turno        = "ant_turno";
        $this->table_modulo       = "ant_modulo";
    }
    
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->APERTUP_Codigo;
            $valor1    = $valor->AULAC_Nombre." ".$valor->TURNOC_Descripcion;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
	$this->db->join($this->t_tipoestudiociclo.' as d','d.TIPCICLOP_Codigo=c.TIPCICLOP_Codigo','inner');
        $this->db->join($this->t_tipoestudio.' as e','e.TIPP_Codigo=d.TIPP_Codigo','inner');
        $this->db->join($this->table_ciclo.' as h','h.CICLOP_Codigo=d.CICLOP_Codigo','inner');
        $this->db->join($this->table_aula.' as f','f.AULAP_Codigo=c.AULAP_Codigo','inner');
        $this->db->join($this->table_local.' as g','g.LOCP_Codigo=f.LOCP_Codigo','inner');
        $this->db->join($this->table_turno.' as i','i.TURNOP_Codigo=c.TURNOP_Codigo','inner');
        $this->db->join($this->table_modulo.' as j','j.MODULOP_Codigo=c.MODULOP_Codigo','inner');
        if(isset($filter->ciclo))             $this->db->where(array("d.CICLOP_Codigo"=>$filter->ciclo));
        if(isset($filter->apertura))          $this->db->where(array("c.APERTUP_Codigo"=>$filter->apertura));
        if(isset($filter->turno))             $this->db->where(array("c.TURNOP_Codigo"=>$filter->turno));
        if(isset($filter->aula))              $this->db->where(array("c.AULAP_Codigo"=>$filter->aula));
        if(isset($filter->estado))            $this->db->where(array("c.APERTUC_FlagEstado"=>$filter->estado));
        if(isset($filter->tipoestudiociclo))  $this->db->where(array("c.TIPCICLOP_Codigo"=>$filter->tipoestudiociclo));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }                 
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
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("APERTUP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($filter){
        if(isset($filter->apertura))   $this->db->where(array("APERTUP_Codigo"=>$filter->apertura));
        $this->db->delete($this->table);        
    }
}
?>