<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Archivos_model extends CI_Model{
    var $table;
    var $empresa;
    
    public function __construct(){
        parent::__construct();
        $this->table         = "ant_archivos";
        $this->table_periodo = "ant_periodo";
        $this->table_leccion = "ant_leccion";
        $this->table_seccion = "ant_seccion";
        $this->table_curso   = "ant_curso";
        $this->empresa     = $this->config->item('empresa');        
    }
	
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->ARCHIVP_Codigo;
            $valor1    = $valor->ARCHIVC_Descripcion;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not="",$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table.' as c');           
        $this->db->join($this->table_leccion.' as h','h.LECCIONP_Codigo=c.LECCIONP_Codigo','inner'); 
        $this->db->join($this->table_seccion.' as i','i.SECCIONP_Codigo=h.SECCIONP_Codigo','inner'); 
        $this->db->join($this->table_curso.' as j','j.CURSOP_Codigo=i.CURSOP_Codigo','inner'); 
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));         
        if(isset($filter->curso) && $filter->curso!='')   $this->db->where(array("i.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->archivo) && $filter->archivo!='')     $this->db->where(array("c.ARCHIVP_Codigo"=>$filter->archivo));
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
       $data["EMPRP_Codigo"] = $this->empresa;  
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("ARCHIVP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array('ARCHIVP_Codigo' => $codigo));        
    }
}
?>