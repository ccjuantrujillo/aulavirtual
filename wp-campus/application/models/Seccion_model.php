<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seccion_model extends CI_Model {
    var $title;
    var $content;
    var $date;
    var $empresa;
    var $tabla;

    public function __construct(){
        $this->tabla = "seccion";
        $this->tabla_curso = "curso";
        $this->empresa =  $_SESSION["empresa"];
    }

    public function read($filter="")
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        $this->db->join($this->tabla_curso.' as d','d.CURSOP_Codigo=c.CURSOP_Codigo','inner');
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
        if(isset($filter->curso))    $this->db->where(array("c.CURSOP_Codigo"=>$filter->curso));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }                
        $query = $this->db->get();
        return $query->result();
    }

    public function get($id)
    {
            $this->db->select('*',FALSE);
            $this->db->from($this->tabla." as c");
            $this->db->join($this->tabla_curso.' as d','d.CURSOP_Codigo=c.CURSOP_Codigo','inner');
            $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa));
            $this->db->where(array("c.SECCIONP_Codigo"=>$id));
            $query = $this->db->get();
            return $query->row();
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