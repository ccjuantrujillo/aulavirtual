<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Alumno_model extends CI_Model{
    var $table;
    var $empresa;

    public function __construct(){
        parent::__construct();
        $this->table_persona = "ant_persona";
        $this->table_ciclo = "ant_ciclo";
        $this->table       = "ant_alumno";
        $this->empresa     = $this->session->userdata('empresa');
    }

    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->ALUMP_Codigo;
            $valor1    = $valor->PERSC_ApellidoPaterno." ".$valor->PERSC_ApellidoMaterno." ".$valor->PERSC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }

    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->alumno) && $filter->alumno!='')  $this->db->where(array("c.ALUMP_Codigo"=>$filter->alumno));
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
        $this->db->where("ALUMP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($codigo){
        $this->db->delete($this->table,array('ALUMP_Codigo' => $codigo));
    }
}
?>