<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calificacion_model extends CI_Model{
    var $tabla;
    var $empresa;
    
    public function __construct() {
        parent::__construct();
        $this->table     = "calificacion";
        $this->table_mat = "matricula";
        $this->table_tar = "tarea";
        $this->table_alu = "alumno";
        $this->table_per = "persona";
        $this->table_cur = "curso";
        $this->table_lec = "leccion";
        $this->empresa   = $_SESSION["empresa"];
    }
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_mat.' as d','d.MATRICP_Codigo=c.MATRICP_Codigo','inner');
        $this->db->join($this->table_tar.' as e','e.TAREAP_Codigo=c.TAREAP_Codigo','inner');
        $this->db->join($this->table_alu.' as f','f.ALUMP_Codigo=d.ALUMP_Codigo','inner');
        $this->db->join($this->table_per.' as g','g.PERSP_Codigo=f.PERSP_Codigo','inner');
        $this->db->join($this->table_cur.' as h','h.CURSOP_Codigo=d.CURSOP_Codigo','inner');
        $this->db->join($this->table_lec.' as i','i.LECCIONP_Codigo=e.LECCIONP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->alumno))       $this->db->where(array("f.ALUMP_Codigo"=>$filter->alumno));   
        if(isset($filter->matricula))    $this->db->where(array("d.MATRICP_Codigo"=>$filter->matricula));  
        if(isset($filter->calificacion)) $this->db->where(array("c.CALIFICAP_Codigo"=>$filter->calificacion));  
        if(isset($filter->curso))        $this->db->where(array("h.CURSOP_Codigo"=>$filter->curso));    
        if(isset($filter->tarea))        $this->db->where(array("e.TAREAP_Codigo"=>$filter->tarea)); 
        if(isset($filter->periodo))      $this->db->where(array("i.PERIODP_Codigo"=>$filter->periodo)); 
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }
        //$this->db->limit($number_items, $offset);         
        $query = $this->db->get();
        $resultado = array();
        //if($query->num_rows > 0){
            $resultado = $query->result();
        //}
        return $resultado; 
    }
    
    public function obtener(){
        
    }
    
    public function insertar(){
        
    }
    
    public function modificar($codigo,$data){
        $this->db->where("CALIFICAP_Codigo",$codigo);
        return $this->db->update($this->table,$data);
    }
    
    public function eliminar($codigo){
        $this->db->delete($this->table,array('CALIFICAP_Codigo'=>$codigo));  
    }
}
