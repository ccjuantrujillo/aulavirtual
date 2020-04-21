<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Asistencia_model extends CI_Model{
    var $usuario;
    var $table;
    
    public function __construct(){

        $this->usuario     = $this->session->userdata('codusu');
        $this->table       = "asistencia";
        $this->table_cab   = "cabasistencia";
        $this->table_mat   = "matricula";
        $this->table_alu   = "alumno";
        $this->table_pers  = "persona";
        $this->table_curs  = "curso";
        $this->empresa   = $this->config->item('empresa');
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
        $this->db->select('*');
        $this->db->from($this->table." as c");
        $this->db->join($this->table_mat.' as d','c.MATRICP_Codigo=d.MATRICP_Codigo','inner');
        $this->db->join($this->table_alu.' as e','e.ALUMP_Codigo=d.ALUMP_Codigo','inner');
        $this->db->join($this->table_pers.' as f','f.PERSP_Codigo=e.PERSP_Codigo','inner');
        $this->db->join($this->table_curs.' as g','g.CURSOP_Codigo=d.CURSOP_Codigo','inner');
        $this->db->join($this->table_cab.' as h','h.CABASISTP_Codigo=c.CABASISTP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));

        if(isset($filter->asistencia))    $this->db->where(array("c.ASISTP_Codigo"=>$filter->asistencia));
        if(isset($filter->curso))         $this->db->where(array("d.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }     

        //$this->db->limit($number_items, $offset); 
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
        elseif(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = array();
        return $resultado;
    }

    public function insertar($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }    
    
    public function modificar($codigo,$data){
        $this->db->where("ASISTP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
	
    public function eliminar($codigo){
        $this->db->delete($this->table,array('ASISTP_Codigo'=>$codigo));        
    }
}
?>