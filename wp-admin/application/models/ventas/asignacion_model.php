<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Asignacion_model extends CI_Model
{
    var $compania;
    public function __construct(){
        parent::__construct();
        $this->table        = "ant_asignacion";
        $this->table_prof   = "ant_profesor";
        $this->table_per    = "ant_persona";
        $this->table_tipoestudiociclo  = "ant_tipoestudiociclo";
        $this->table_aula   = "ant_aula";
        $this->table_ciclo  = "ant_ciclo";
        $this->table_curso  = "ant_curso";
        $this->table_course = "course";
        $this->table_apertura = "ant_apertura";
        $this->table_aula     = "ant_aula";
        $this->table_modulo   = "ant_modulo";
    }
    
    public function seleccionar($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->listar($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->PERSP_Codigo;
            $valor1    = $valor->PERSC_ApellidoPaterno." ".$valor->PERSC_ApellidoMaterno." ".$valor->PERSC_Nombre;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    
    public function listar($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*,DATE_FORMAT(c.ASIGC_Fecha,"%d/%m/%Y") AS fecha',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_prof.' as d','d.PROP_Codigo=c.PROP_Codigo','inner');
        $this->db->join($this->table_per.' as e','e.PERSP_Codigo=d.PERSP_Codigo','inner');
	$this->db->join($this->table_curso.' as i','i.PROD_Codigo=d.PROD_Codigo','inner');
        $this->db->join($this->table_ciclo.' as h','h.CICLOP_Codigo=c.CICLOP_Codigo','inner');
        $this->db->join($this->table_course.' as j','j.id=c.course_id','inner');
        $this->db->join($this->table_apertura.' as k','k.APERTUP_Codigo=j.APERTUP_Codigo','inner');
        $this->db->join($this->table_modulo.' as l','l.MODULOP_Codigo=k.MODULOP_Codigo','inner');
        if(isset($filter->ciclo) && $filter->ciclo!='')            $this->db->where(array("c.CICLOP_Codigo"=>$filter->ciclo));
        if(isset($filter->curso) && $filter->curso!='')            $this->db->where(array("d.PROD_Codigo"=>$filter->curso));
        if(isset($filter->asignacion) && $filter->asignacion!='')  $this->db->where(array("c.ASIGP_Codigo"=>$filter->asignacion));
        if(isset($filter->profesor) && $filter->profesor!='')      $this->db->where(array("c.PROP_Codigo"=>$filter->profesor));  
        if(isset($filter_not->persona) && $filter_not->persona!=''){
            if(is_array($filter_not->persona) && count($filter_not->persona)>0){
                $this->db->where_not_in('c.ASIGP_Codigo',$filter_not->persona);
            }
            else{
                $this->db->where('c.ORDENP_Codigo !=',$filter_not->persona);
            }            
        }            
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
    
    public function rpt_asignacion_aulas($filter,$filter_not='',$number_items='',$offset=''){
      $this->db->select('*,DATE_FORMAT(c.ASIGC_Fecha,"%d/%m/%Y") AS fecha',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_course.' as j','j.id=c.course_id','inner');
        $this->db->join($this->table_apertura.' as k','k.APERTUP_Codigo=j.APERTUP_Codigo','inner');
        $this->db->join($this->table_aula.' as l','l.AULAP_Codigo=k.AULAP_Codigo','inner');
        $this->db->join($this->table_tipoestudiociclo.' as m','m.TIPCICLOP_Codigo=k.TIPCICLOP_Codigo','inner');
        if(isset($filter->ciclo) && $filter->ciclo!='')              $this->db->where(array("c.CICLOP_Codigo"=>$filter->ciclo));
        if(isset($filter->curso) && $filter->curso!='')              $this->db->where(array("d.PROD_Codigo"=>$filter->curso));
        if(isset($filter->asignacion) && $filter->asignacion!='')    $this->db->where(array("c.ASIGP_Codigo"=>$filter->asignacion));
        if(isset($filter->profesor) && $filter->profesor!='')        $this->db->where(array("c.PROP_Codigo"=>$filter->profesor));  
        if(isset($filter->tipoestudio) && $filter->tipoestudio!='')  $this->db->where(array("m.TIPP_Codigo"=>$filter->tipoestudio));  
        if(isset($filter->modulo))            $this->db->where(array("k.MODULOP_Codigo"=>$filter->modulo));  
        if(isset($filter->turno) && $filter->turno!='')              $this->db->where(array("k.TURNOP_Codigo"=>$filter->turno));  
        if(isset($filter_not->persona) && $filter_not->persona!=''){
            if(is_array($filter_not->persona) && count($filter_not->persona)>0){
                $this->db->where_not_in('c.ASIGP_Codigo',$filter_not->persona);
            }
            else{
                $this->db->where('c.ORDENP_Codigo !=',$filter_not->persona);
            }            
        }            
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }                 
        $query = $this->db->get();
        $resultado = array();
        if($query->num_rows > 0){
            $resultado = $query->row();
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
        $this->db->where("ASIGP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($codigo){
        $this->db->delete($this->table,array('ASIGP_Codigo' => $codigo));        
    }
}
?>