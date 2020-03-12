<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Asignaciondetalle_model extends CI_Model
{
    var $compania;
    var $table;  
    public function __construct(){
        parent::__construct();
        $this->compania = $this->session->userdata('compania');
        $this->table       = "ant_asignaciondetalle";
        $this->table_det   = "ant_asignacion";
        $this->table_prof  = "ant_profesor";
        $this->table_per   = "ant_persona";
        $this->table_tipoestudio  = "ant_tipoestudio";
        $this->table_tipoestudiociclo  = "ant_tipoestudiociclo";
        $this->table_aula   = "ant_aula";
        $this->table_local  = "ant_local";
        $this->table_course = "course";
        $this->table_apertura = "ant_apertura";
        $this->table_cursociclo = "ant_cursociclo";
        $this->table_curso = "ant_curso";
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
        $this->db->select('*,DATE_FORMAT(c.ASIGDETC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_det.' as d','d.ASIGP_Codigo=c.ASIGP_Codigo','inner');
//        $this->db->join($this->table_tipoestudiociclo.' as e','e.TIPCICLOP_Codigo=c.TIPCICLOP_Codigo','inner');
//        $this->db->join($this->table_tipoestudio.' as m','m.TIPP_Codigo=e.TIPP_Codigo','inner');
//        $this->db->join($this->table_aula.' as f','f.AULAP_Codigo=c.AULAP_Codigo','inner');
//        $this->db->join($this->table_local.' as g','g.LOCP_Codigo=f.LOCP_Codigo','inner');
        if(isset($filter->asignacion) && $filter->asignacion!='')   $this->db->where(array("c.ASIGP_Codigo"=>$filter->asignacion));
        if(isset($filter->asignaciondetalle) && $filter->asignaciondetalle!='')   $this->db->where(array("c.ASIGDETP_Codigo"=>$filter->asignaciondetalle));
//        if(isset($filter->aula) && $filter->aula!='')               $this->db->where(array("c.AULAP_Codigo"=>$filter->aula));  
//        if(isset($filter->tipoestudio) && $filter->tipoestudio!='') $this->db->where(array("c.TIPP_Codigo"=>$filter->tipoestudio));            
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }                 
        $query = $this->db->get();
        $resultado = array();
        if($query->num_rows > 0){
            $resultado = $query->result();
        }
        return $resultado; 
    }

    public function rpt_horario_curso($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*,DATE_FORMAT(c.ASIGDETC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_det.' as d','d.ASIGP_Codigo=c.ASIGP_Codigo','inner');
        $this->db->join($this->table_course.' as e','e.id=d.course_id','inner');
        $this->db->join($this->table_apertura.' as f','f.APERTUP_Codigo=e.APERTUP_Codigo','inner');
        $this->db->join($this->table_cursociclo.' as g','g.CURSOCIP_Codigo=e.CURSOCIP_Codigo','inner');
        $this->db->join($this->table_curso.' as h','h.PROD_Codigo=g.PROD_Codigo','inner');
        $this->db->join($this->table_prof.' as i','i.PROP_Codigo=d.PROP_Codigo','inner');
        $this->db->join($this->table_per.' as j','j.PERSP_Codigo=i.PERSP_Codigo','inner');
        if(isset($filter->asignacion) && $filter->asignacion!='')   $this->db->where(array("c.ASIGP_Codigo"=>$filter->asignacion));
        if(isset($filter->asignaciondetalle) && $filter->asignaciondetalle!='')   $this->db->where(array("c.ASIGDETP_Codigo"=>$filter->asignaciondetalle));  
        if(isset($filter->aula))   $this->db->where(array("f.AULAP_Codigo"=>$filter->aula));  
        if(isset($filter->dia))    $this->db->where(array("c.ASIGDETC_Dia"=>$filter->dia));  
        if(isset($filter->ciclo))  $this->db->where(array("d.CICLOP_Codigo"=>$filter->ciclo)); 
        if(isset($filter->curso))  $this->db->where(array("h.PROD_Codigo"=>$filter->curso)); 
        if(isset($filter->modulo)) $this->db->where(array("f.MODULOP_Codigo"=>$filter->modulo)); 
        if(isset($filter->turno)) $this->db->where(array("f.TURNOP_Codigo"=>$filter->turno)); 
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
    
    public function rpt_horario_curso2($filter,$filter_not='',$number_items='',$offset=''){
        $this->db->select('*,DATE_FORMAT(c.ASIGDETC_FechaRegistro,"%d/%m/%Y") AS fechareg',FALSE);
        $this->db->from($this->table." as c",$number_items,$offset);
        $this->db->join($this->table_det.' as d','d.ASIGP_Codigo=c.ASIGP_Codigo','inner');
        $this->db->join($this->table_course.' as e','e.id=d.course_id','inner');
        $this->db->join($this->table_apertura.' as f','f.APERTUP_Codigo=e.APERTUP_Codigo','inner');
        $this->db->join($this->table_cursociclo.' as g','g.CURSOCIP_Codigo=e.CURSOCIP_Codigo','inner');
        $this->db->join($this->table_curso.' as h','h.PROD_Codigo=g.PROD_Codigo','inner');
        $this->db->join($this->table_prof.' as i','i.PROP_Codigo=d.PROP_Codigo','inner');
        $this->db->join($this->table_per.' as j','j.PERSP_Codigo=i.PERSP_Codigo','inner');
        if(isset($filter->asignacion) && $filter->asignacion!='')   $this->db->where(array("c.ASIGP_Codigo"=>$filter->asignacion));
        if(isset($filter->asignaciondetalle) && $filter->asignaciondetalle!='')   $this->db->where(array("c.ASIGDETP_Codigo"=>$filter->asignaciondetalle));  
        if(isset($filter->aula))   $this->db->where(array("f.AULAP_Codigo"=>$filter->aula));  
        if(isset($filter->dia))    $this->db->where(array("c.ASIGDETC_Dia"=>$filter->dia));  
        if(isset($filter->ciclo))  $this->db->where(array("d.CICLOP_Codigo"=>$filter->ciclo)); 
        if(isset($filter->curso))  $this->db->where(array("h.PROD_Codigo"=>$filter->curso)); 
        if(isset($filter->modulo)) $this->db->where(array("f.MODULOP_Codigo"=>$filter->modulo)); 
        if(isset($filter->turno)) $this->db->where(array("f.TURNOP_Codigo"=>$filter->turno)); 
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }                 
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
            $resultado = isset($listado[0])?(object)$listado[0]:"";
        return $resultado;
    }

    public function insertar($data){
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();
    }

    public function modificar($codigo,$data){
        $this->db->where("ASIGDETP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }

    public function eliminar($filter){
        if(isset($filter->asignacion) && $filter->asignacion!='')               $this->db->where(array("ASIGP_Codigo"=>$filter->asignacion));
        if(isset($filter->asignaciondetalle) && $filter->asignaciondetalle!='') $this->db->where(array("ASIGDETP_Codigo"=>$filter->asignaciondetalle));
        $this->db->delete($this->table);           
    }
}
?>