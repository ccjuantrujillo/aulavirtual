<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tarea_model extends CI_Model{
    var $usuario;
    var $table;
    var $empresa;
    
    public function __construct(){
        parent::__construct();
        $this->usuario     = $this->session->userdata('codusu');
        $this->table       = "ant_tarea";
        $this->table_tipotarea = "ant_tipotarea";        
        $this->table_leccion   = "ant_leccion";    
        $this->table_seccion   = "ant_seccion";    
        $this->table_ciclo = "ant_ciclo";
        $this->table_curso = "ant_curso";
        $this->empresa     = $this->session->userdata('empresa');
    }
	
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor){
            $indice1   = $valor->TAREAP_Codigo;
            $valor1    = $valor->TAREAC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not="",$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as c");
        $this->db->join($this->table_tipotarea.' as d','d.TIPOTAREAP_Codigo=c.TIPOTAREAP_Codigo','inner');    
        $this->db->join($this->table_leccion.' as e','e.LECCIONP_Codigo=c.LECCIONP_Codigo','inner'); 
        $this->db->join($this->table_seccion.' as f','f.SECCIONP_Codigo=e.SECCIONP_Codigo','inner'); 
        $this->db->join($this->table_curso.' as g','g.CURSOP_Codigo=f.CURSOP_Codigo','inner'); 
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));   
        if(isset($filter->tarea) && $filter->tarea!='')       $this->db->where(array("c.TAREAP_Codigo"=>$filter->tarea));
        if(isset($filter->curso) && $filter->curso!='')       $this->db->where(array("g.CURSOP_Codigo"=>$filter->curso));
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
            $resultado = $listado;
        else if(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = new stdClass ();
        return $resultado;
    }

    public function insertar($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("TAREAP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array('TAREAP_Codigo' => $codigo));        
    }
}
?>