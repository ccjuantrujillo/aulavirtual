<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
        var $empresa;
        var $tabla;
        var $tabla_persona;

        public function __construct(){
            $this->tabla = "usuario";
            $this->tabla_persona = "persona";
            $this->empresa =  isset($_SESSION["empresa"])?$_SESSION["empresa"]:"";
        }

        public function read($filter="")
        {
            $this->db->select('*',FALSE);
            $this->db->from($this->tabla." as c");
            $this->db->join($this->tabla_persona.' as d','d.PERSP_Codigo=c.PERSP_Codigo','inner');
            $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
            if(isset($filter->usuario))    $this->db->where(array("c.USUAC_usuario"=>$filter->usuario));
            if(isset($filter->clave))      $this->db->where(array("c.USUAC_Password"=>$filter->clave));
            if(isset($filter->rol))        $this->db->where(array("c.ROL_Codigo"=>$filter->rol));
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

        public function ingresar($filter)
        {
            $this->db->select('*',FALSE);
            $this->db->from($this->tabla." as c");
            $this->db->join($this->tabla_persona.' as d','d.PERSP_Codigo=c.PERSP_Codigo','inner');
            if(isset($filter->usuario))    $this->db->where(array("c.USUAC_usuario"=>$filter->usuario));
            if(isset($filter->clave))      $this->db->where(array("c.USUAC_Password"=>$filter->clave));
            if(isset($filter->empresa))    $this->db->where(array("c.EMPRP_Codigo"=>$filter->empresa));
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
        
        public function insert()
        {
            $this->title    = $_POST['title']; // please read the below note
            $this->content  = $_POST['content'];
            $this->date     = time();
            $this->db->insert('entries', $this);
        }

        public function update()
        {
            $this->title    = $_POST['title'];
            $this->content  = $_POST['content'];
            $this->date     = time();
            $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}