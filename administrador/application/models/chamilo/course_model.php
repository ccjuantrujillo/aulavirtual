<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course_model extends CI_Model{
    var $compania;
    var $table;

    public function __construct(){
        parent::__construct();
        $this->compania = $this->session->userdata('compania');
        $this->table   = "course";
        $this->table_curso      = "ant_curso";
        $this->table_cursociclo = "ant_cursociclo";
        $this->table_apertura   = "ant_apertura";
        $this->table_aula       = "ant_aula";
        $this->table_tipoestudiociclo = "ant_tipoestudiociclo";
        $this->table_tipoestudio = "ant_tipoestudio";
        $this->table_modulo      = "ant_modulo";
    }
    
    public function seleccionar($default='',$filter="",$filter_not='',$number_items='',$offset=''){   
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not='',$number_items='',$offset='') as $indice=>$valor)
        {
            $indice1   = $valor->id;
            $valor1    = $valor->title;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter="",$filter_not="",$number_items="",$offset=""){
        $this->db->select('*');
        $this->db->from($this->table." as a",$number_items,$offset);
        $this->db->join($this->table_cursociclo.' as b','b.CURSOCIP_Codigo=a.CURSOCIP_Codigo','inner');
        $this->db->join($this->table_curso.' as c','c.PROD_Codigo=b.PROD_Codigo','inner');
        $this->db->join($this->table_apertura.' as d','d.APERTUP_Codigo=a.APERTUP_Codigo','inner');
        $this->db->join($this->table_aula.' as e','e.AULAP_Codigo=d.AULAP_Codigo','inner');
        $this->db->join($this->table_tipoestudiociclo.' as f','f.TIPCICLOP_Codigo=d.TIPCICLOP_Codigo','inner');
        $this->db->join($this->table_tipoestudio.' as g','g.TIPP_Codigo=f.TIPP_Codigo','inner');
        $this->db->join($this->table_modulo.' as h','h.MODULOP_Codigo=d.MODULOP_Codigo','inner');
        if(isset($filter->course))    $this->db->where(array("a.id"=>$filter->course));
        if(isset($filter->curso))    $this->db->where(array("c.PROD_Codigo"=>$filter->curso));
        if(isset($filter->apertura))  $this->db->where(array("a.APERTUP_Codigo"=>$filter->apertura));
        if(isset($filter->asignado))  $this->db->where(array("a.flgAsignado"=>$filter->asignado));
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
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    
    public function modificar($codigo,$data){
        $this->db->where("id",$codigo);
        $this->db->update($this->table,$data);
    }
    
    public function eliminar($filter){
        if(isset($filter->course))   $this->db->where(array("id"=>$filter->course));
        if(isset($filter->apertura))   $this->db->where(array("APERTUP_Codigo"=>$filter->apertura));
        $this->db->delete($this->table);
    }
}
?>