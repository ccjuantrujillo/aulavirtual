<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profesor_model extends CI_Model{
    var $table;
    var $empresa;

    public function __construct(){
        parent::__construct();
        $this->table      = "ant_profesor";
        $this->table_rol  = "ant_rol";
        $this->empresa     = $this->config->item('empresa');  
    }

    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->PROP_Codigo;
            $valor1    = $valor->PROC_Nombre." ".$valor->PROC_ApellidoPaterno;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }

    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*,DATE_FORMAT(c.PROC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->profesor))        $this->db->where(array("c.PROP_Codigo"=>$filter->profesor));
        if(isset($filter->borrado))         $this->db->where(array("c.PROC_FlagBorrado"=>$filter->borrado));
        if(isset($filter->flgcoordinador))  $this->db->where(array("c.PROC_FlagCoordinador"=>$filter->flgcoordinador));
        if(isset($filter_not->profesor) && $filter_not->profesor!=''){
            if(is_array($filter_not->profesor) && count($filter_not->profesor)>0){
                $this->db->where_not_in('c.PROP_Codigo',$filter_not->profesor);
            }
            else{
                $this->db->where('c.PROP_Codigo !=',$filter_not->profesor);
            }
        } 
        /*if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }*/
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
        $resultado = new stdClass();
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        elseif(count($listado)==1)
            $resultado = (object)$listado[0];
        return $resultado;
    }

    public function insertar($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("PROP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($codigo){
        $this->db->delete($this->table,array('PROP_Codigo' => $codigo));
    }
}
?>