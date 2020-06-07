<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol_model extends CI_Model {
    var $empresa;
    var $tabla;

    public function __construct(){
        $this->tabla = "rol";
    }

    public function seleccionar($filter=''){
       foreach($this->read($filter) as $indice=>$valor){
            $arreglo[$valor->ROL_Codigo] = $valor->ROL_Descripcion;
       }
       return $arreglo;
    }

    public function read($filter="")
    {
        $this->db->select('*',FALSE);
        $this->db->from($this->tabla." as c");
        if(isset($filter->rol))        $this->db->where(array("c.ROL_Codigo"=>$filter->rol));
        if(isset($filter->order_by) && count($filter->order_by)>0){
            foreach($filter->order_by as $indice=>$value){
                $this->db->order_by($indice,$value);
            }
        }         
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