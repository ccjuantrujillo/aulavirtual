<?php
/* *********************************************************************************
Autor: Martín Trujillo
Dev: 
/* ******************************************************************************** */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarioempresa_model extends CI_Model {
    var $tabla;
    var $tabla_persona;

    public function __construct(){
        $this->tabla = "ant_usuarioempresa";
        $this->tabla_usuario = "ant_usuario";
        $this->tabla_empresa = "ant_empresa";
        $this->tabla_rol     = "ant_rol";
        $this->empresa       = $this->session->userdata('empresa'); 
    }

    public function read($filter="")
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        $this->db->join($this->tabla_usuario.' as d','d.USUAP_Codigo=c.USUAP_Codigo','inner');
        $this->db->join($this->tabla_empresa.' as e','e.EMPRP_Codigo=c.EMPRP_Codigo','inner');

        $this->db->join($this->tabla_rol.' as f','f.ROL_Codigo=c.ROL_Codigo','inner');

        if(isset($filter->usuario))    $this->db->where(array("d.USUAC_usuario"=>$filter->usuario));

        if(isset($filter->clave))      $this->db->where(array("d.USUAC_Password"=>$filter->clave));
        if(isset($filter->rol))        $this->db->where(array("c.ROL_Codigo"=>$filter->rol));
        if(isset($filter->empresa))    $this->db->where(array("c.EMPRP_Codigo"=>$filter->empresa));
        if(isset($filter->defecto))    $this->db->where(array("c.USUCOMC_Default"=>$filter->defecto));
        $query = $this->db->get();
        return $query->result();
    }

    public function get($filter)
    {
        $listado = $this->read($filter);
        if(count($listado)>1)
            $resultado = "Existe mas de un resultado";
        else if(count($listado)==1)
            $resultado = (object)$listado[0];
        else
            $resultado = 0;
        return $resultado;
    }               

    public function insert($data)
    {
       $data["EMPRP_Codigo"] = $this->empresa;       
       $this->db->insert($this->tabla,$data);
       return $this->db->insert_id();        
    }

    public function update()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();
        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}