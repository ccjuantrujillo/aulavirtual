<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leccion_model extends CI_Model {

        var $title;
        var $content;
        var $date;
        var $empresa;
        var $tabla;

        public function __construct(){
            $this->tabla   = "leccion";
            $this->tabla_seccion = "seccion";
            $this->tabla_curso   = "curso";
            $this->empresa =  $_SESSION["empresa"];
        }

        public function read($filter="")
        {
            $this->db->select('*',FALSE);
            $this->db->from($this->tabla." as c");
            $this->db->join($this->tabla_seccion.' as d','d.SECCIONP_Codigo=c.SECCIONP_Codigo','inner');
            $this->db->join($this->tabla_curso.' as e','e.CURSOP_Codigo=d.CURSOP_Codigo','inner');
            $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
            if(isset($filter->curso))    $this->db->where(array("d.CURSOP_Codigo"=>$filter->curso));
            if(isset($filter->seccion))  $this->db->where(array("c.SECCIONP_Codigo"=>$filter->seccion));
            if(isset($filter->leccion))  $this->db->where(array("c.LECCIONP_Codigo"=>$filter->leccion));
            if(isset($filter->estadoseccion))  $this->db->where(array("d.SECCIONC_FlagEstado"=>$filter->estadoseccion));
            /*if(isset($filter->order_by) && count($filter->order_by)>0){
                foreach($filter->order_by as $indice=>$value){
                    $this->db->order_by($indice,$value);
                }
            } */              
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