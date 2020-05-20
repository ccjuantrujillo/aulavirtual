<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {
    var $title;
    var $content;
    var $date;
    var $table;
    var $empresa;

    public function __construct(){
        $this->table   = "curso";
        $this->empresa = $_SESSION["empresa"];
    }

    public function read()
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->table." as c");
        $this->db->where(array("c.EMPRP_Codigo"=>$this->empresa,"c.CURSOC_FlagEstado"=>1));
        if(isset($filter->profesor))   $this->db->where(array("c.PROP_Codigo"=>$this->profesor)); 
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
        $this->db->from($this->table);
        $this->db->where('CURSOP_Codigo', $id); 
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