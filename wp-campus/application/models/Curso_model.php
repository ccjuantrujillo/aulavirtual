<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {

        var $title;
        var $content;
        var $date;
        var $empresa;

        public function __construct(){
                $this->empresa = $_SESSION["empresa"];
        }

        public function read()
        {
                $this->db->select('*',FALSE);
                $this->db->from('curso');
                $this->db->where(array("EMPRP_Codigo"=>$this->empresa));
                $query = $this->db->get();
                return $query->result();
        }

        public function get($id)
        {
                $this->db->select('*',FALSE);
                $this->db->from('curso');
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