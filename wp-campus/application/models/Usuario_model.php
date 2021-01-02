<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    var $empresa;
    var $tabla;
    var $tabla_persona;

    public function __construct(){
        $this->tabla = "usuario";
        $this->tabla_persona = "persona";
    }

    public function select($default='',$filter='',$filter_not='',$number_items='',$offset=''){
        if($default!="") $arreglo = array($default=>':: Seleccione ::');
        foreach($this->read($filter,$filter_not,$number_items,$offset) as $indice=>$valor)
        {
            $indice1   = $valor->USUA_Codigo;
            $valor1    = $valor->USUA_usuario;
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }    
    
    public function read($filter="")
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        $this->db->join($this->tabla_persona.' as d','d.PERSP_Codigo=c.PERSP_Codigo','inner');
        if(isset($filter->usuario))    $this->db->where(array("c.USUAC_usuario"=>$filter->usuario));
        if(isset($filter->clave))      $this->db->where(array("c.USUAC_Password"=>$filter->clave));
        if(isset($filter->rol))        $this->db->where(array("c.ROL_Codigo"=>$filter->rol));
        $query = $this->db->get();
        return $query->result();
    }
    
    public function listar_usuarioprofesor($filter='',$filter_not='',$number_items='',$offset=''){
        $this->db->select('*');
        $this->db->from($this->table." as c");
        $this->db->join($this->table_rol.' as e','e.ROL_Codigo=c.ROL_Codigo','inner');
        if(isset($filter->usuario) && $filter->usuario!='')            $this->db->where(array("c.USUAP_Codigo"=>$filter->usuario));    
        if(isset($filter->rol) && $filter->rol!='')                    $this->db->where(array("c.ROL_Codigo"=>$filter->rol));          
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

    public function get($filter,$number_items='',$offset='')
    {
        $listado = $this->read($filter,$number_items='',$offset='');
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else if(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = 0;
        return $resultado;
    }        

    public function login($filter)
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        $this->db->join($this->tabla_persona.' as d','d.PERSP_Codigo=c.PERSP_Codigo','inner');
        if(isset($filter->usuario))    $this->db->where(array("c.USUAC_usuario"=>$filter->usuario));
        if(isset($filter->clave))      $this->db->where(array("c.USUAC_Password"=>$filter->clave));
        $query = $this->db->get();
        $listado = $query->result();
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else if(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = 0;
        return $resultado;
    }               

    public function insert($data){
       $data["EMPRP_Codigo"] = $this->empresa;
       $this->db->insert($this->table,$data);
       return $this->db->insert_id();    
    }

    public function update($codigo,$data){
        $this->db->where("USUAP_Codigo",$codigo);
        $this->db->update($this->table,$data);
    }
        
    public function eliminar($codigo){
        $this->db->delete($this->table,array('USUAP_Codigo' => $codigo));     
    }        

}