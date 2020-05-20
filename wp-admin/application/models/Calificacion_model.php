<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calificacion_model extends CI_Model{
    var $table;     
    var $empresa;
    
     public function __construct(){
        parent::__construct();
        $this->table         = "ant_calificacion";
        $this->table_mat     = "ant_matricula";
        $this->table_tarea   = "ant_tarea";
        $this->table_alumno  = "ant_alumno";
        $this->table_persona = "ant_persona";
        $this->table_curso   = "ant_curso";
        $this->empresa       = $this->session->userdata('empresa');     
    }
    
    public function seleccionar(){
        
    }
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_mat.' as d','d.MATRICP_Codigo=c.MATRICP_Codigo','inner');
        $this->db->join($this->table_tarea.' as g','g.TAREAP_Codigo=c.TAREAP_Codigo','inner');
        $this->db->join($this->table_alumno.' as h','h.ALUMP_Codigo=d.ALUMP_Codigo','inner');
        $this->db->join($this->table_persona.' as i','i.PERSP_Codigo=h.PERSP_Codigo','inner');
        $this->db->join($this->table_curso.' as j','j.CURSOP_Codigo=d.CURSOP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($_SESSION["ciclo"]))     $this->db->where(array("j.CICLOP_Codigo"=>$_SESSION["ciclo"]));//(**)  
        if(isset($filter->calificacion))    $this->db->where(array("c.CALIFICAP_Codigo"=>$filter->calificacion));   
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
            $resultado = $listado;
        elseif(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = new stdClass ();
        return $resultado;
    }
    
    public function insertar($data){
        $data["EMPRP_Codigo"] = $this->empresa;
        return $this->db->insert($this->table,$data);
    }
    
    public function modificar($codigo,$data){
        $this->db->where("CALIFICAP_Codigo",$codigo);
        return $this->db->update($this->table,$data);
    }
    
    public function eliminar($codigo){
        $data = array("CALIFICAP_Codigo"=>$codigo);
        return $this->db->delete($this->table,$data);
    }
}
