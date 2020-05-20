<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Matricula_model extends CI_Model{
    var $table;     
    var $empresa;
 
    public function __construct(){
        parent::__construct();
        $this->table       = "ant_matricula";
        $this->table_alu   = "ant_alumno";
        $this->table_curso = "ant_curso";
        $this->table_aula  = "ant_aula";
        $this->table_pers  = "ant_persona";
        $this->empresa     = $this->session->userdata('empresa');     
    }
    
    public function seleccionar($filter,$default="",$value=''){
        $arreglo = array();
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter) as $indice=>$valor){
            $indice1   = $valor->MATRICP_Codigo;
            $valor1    = $valor->PERSC_ApellidoPaterno." ".$valor->PERSC_ApellidoPaterno." ".$valor->PERSC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }       
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*,DATE_FORMAT(c.MATRICC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_alu.' as d','d.ALUMP_Codigo=c.ALUMP_Codigo','inner');
        $this->db->join($this->table_pers.' as g','g.PERSP_Codigo=d.PERSP_Codigo','inner');
        $this->db->join($this->table_curso.' as e','e.CURSOP_Codigo=c.CURSOP_Codigo','inner');
        $this->db->join($this->table_aula.' as f','f.AULAP_Codigo=c.AULAP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($_SESSION["ciclo"]))     $this->db->where(array("e.CICLOP_Codigo"=>$_SESSION["ciclo"]));//(**)       
        if(isset($filter->alumno))    $this->db->where(array("c.ALUMP_Codigo"=>$filter->alumno));   
        if(isset($filter->matricula)) $this->db->where(array("c.MATRICP_Codigo"=>$filter->matricula));  
        if(isset($filter->curso))     $this->db->where(array("c.CURSOP_Codigo"=>$filter->curso));    
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
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("MATRICP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($codigo){
        $this->db->delete($this->table,array('MATRICP_Codigo' => $codigo));        
    }
}
?>